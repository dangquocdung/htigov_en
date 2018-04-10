<?php

namespace Botble\Backup\Supports;

use Carbon\Carbon;
use DB;
use Exception;
use File;
use Illuminate\Http\Request;
use ZipArchive;
use Botble\Backup\Supports\PclZip as Zip;
use Illuminate\Filesystem\Filesystem;

class Backup
{

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $file;

    /**
     * @var string
     */
    protected $folder;

    /**
     * @var string
     */
    protected $backup_root;

    /**
     * @author Sang Nguyen
     */
    public function __construct()
    {
        $this->file = new Filesystem();
        $this->backup_root = config('backup.disks.' . config('backup.default') . '.root');
    }

    /**
     * @param $path
     * @return $this
     * @author Sang Nguyen
     */
    public function setBackupRoot($path)
    {
        $this->backup_root = $path;
        return $this;
    }

    /**
     * @return \Illuminate\Config\Repository|mixed|string
     * @author Sang Nguyen
     */
    public function getBackupRoot()
    {
        return $this->backup_root;
    }

    /**
     * @param $request
     * @return array
     * @author Sang Nguyen
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function createBackupFolder(Request $request)
    {
        $backupFolder = $this->createFolder($this->backup_root);
        $now = Carbon::now()->format('Y-m-d-h-i-s');
        $this->folder = $this->createFolder($backupFolder . DIRECTORY_SEPARATOR . $now);

        $data = [
            'key' => $now,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'date' => Carbon::now()->toDateTimeString(),
        ];

        $file = $this->folder . '/backup.json';
        save_file_data($file, $data);
        return [
            'key' => $now,
            'data' => $data['key'],
        ];
    }

    /**
     * @param $key
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @author Sang Nguyen
     */
    public function getBackup($key)
    {
        $file = storage_path('app/backup/' . $key . '/backup.json');
        if (File::exists($file)) {
            $data = get_file_data($file);
            if (!empty($data) && is_array($data)) {
                return $data;
            }
        }

        return [];
    }

    /**
     * @return array|bool|mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function getBackupList()
    {
        $backups = scan_folder($this->backup_root);
        $list = [];
        foreach ($backups as $backup) {
            $file = storage_path('app/backup/' . $backup . '/backup.json');
            if (File::exists($file)) {
                $data = get_file_data($file);
                if (!empty($data) && is_array($data)) {
                    $list[$data['key']] = $data;
                }
            }
        }
        return $list;
    }

    /**
     * @param $folder
     * @return mixed
     * @author Sang Nguyen
     */
    public function createFolder($folder)
    {
        if (!$this->file->isDirectory($folder)) {
            $this->file->makeDirectory($folder);
            chmod($folder, 0777);
        }
        return $folder;
    }

    /**
     * @return bool
     * @author Sang Nguyen
     * @throws Exception
     */
    public function backupDb()
    {
        $file = 'database-' . Carbon::now()->format('Y-m-d-h-i-s');
        $path = $this->folder . DIRECTORY_SEPARATOR . $file;

        $sql = 'mysqldump --user=' . env('DB_USERNAME','root') . ' --password=' . env('DB_PASSWORD','k9Qx5-LxWs6') . ' --host=' . env('DB_HOST','127.0.0.1') . ' ' . env('DB_DATABASE','htigov_en') . ' > ' . $path . '.sql';

        system($sql);
        $this->compressFileToZip($path, $file);
        if (file_exists($path . '.zip')) {
            chmod($path . '.zip', 0777);
        }
        return true;
    }

    /**
     * @param $source
     * @return bool
     * @author Sang Nguyen
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function backupFolder()
    {
        $source = config('backup.folder_to_backup');
        if (empty($source) || !File::isDirectory($source)) {
            return false;
        }

        $file = $this->folder . DIRECTORY_SEPARATOR . 'public-storage-' . Carbon::now()->format('Y-m-d-H-i-s') . '.zip';

        // set script timeout value
        ini_set('max_execution_time', 5000);

        if (class_exists('ZipArchive', false)) {
            $zip = new ZipArchive();
            // create and open the archive
            if ($zip->open($file, ZipArchive::CREATE) !== true) {
                $this->deleteFolderBackup($this->folder);
            }
        } else {
            $zip = new Zip($file);
        }
        $arr_src = explode(DIRECTORY_SEPARATOR, $source);
        $path_length = strlen(implode(DIRECTORY_SEPARATOR, $arr_src) . DIRECTORY_SEPARATOR);
        // add each file in the file list to the archive
        $this->recurseZip($source, $zip, $path_length);
        if (class_exists('ZipArchive', false)) {
            $zip->close();
        }
        if (file_exists($file)) {
            chmod($file, 0777);
        }
        return true;
    }

    /**
     * @param $path
     * @param $file
     * @return bool
     * @author Sang Nguyen
     * @throws Exception
     */
    public function restoreDb($file, $path)
    {
        $this->restore($file, $path);
        $file = $path . DIRECTORY_SEPARATOR . File::name($file) . '.sql';

        if (!file_exists($file)) {
            return false;
        }
        // Force the new login to be used
        DB::purge();
        DB::unprepared('USE `' . env('DB_DATABASE','htigov_en') . '`');
        DB::connection()->setDatabaseName(env('DB_DATABASE','htigov_en'));
        DB::unprepared(file_get_contents($file));

        $this->deleteFile($file);
        return true;
    }

    /**
     * @param $fileName
     * @param $pathTo
     * @return bool
     * @author Sang Nguyen
     */
    public function restore($fileName, $pathTo)
    {
        if (class_exists('ZipArchive', false)) {
            $zip = new ZipArchive;
            if ($zip->open($fileName) === true) {
                $zip->extractTo($pathTo);
                $zip->close();
                return true;
            }
        } else {
            $archive = new Zip($fileName);
            $archive->extract(PCLZIP_OPT_PATH, $pathTo, PCLZIP_OPT_REMOVE_ALL_PATH);
            return true;
        }

        return false;
    }

    /**
     * @param $src
     * @param $zip
     * @param $pathLength
     * @author Sang Nguyen
     */
    public function recurseZip($src, &$zip, $pathLength)
    {
        foreach (scan_folder($src) as $file) {
            if ($this->file->isDirectory($src . DIRECTORY_SEPARATOR . $file)) {
                $this->recurseZip($src . DIRECTORY_SEPARATOR . $file, $zip, $pathLength);
            } else {
                if (class_exists('ZipArchive', false)) {
                    /**
                     * @var ZipArchive $zip
                     */
                    $zip->addFile($src . DIRECTORY_SEPARATOR . $file, substr($src . DIRECTORY_SEPARATOR . $file, $pathLength));
                } else {
                    /**
                     * @var Zip $zip
                     */
                    $zip->add($src . DIRECTORY_SEPARATOR . $file, PCLZIP_OPT_REMOVE_PATH, substr($src . DIRECTORY_SEPARATOR . $file, $pathLength));
                }
            }
        }
    }

    /**
     * @param $path
     * @param $name
     * @author Sang Nguyen
     * @throws Exception
     */
    public function compressFileToZip($path, $name)
    {
        $filename = $path . '.zip';

        if (class_exists('ZipArchive', false)) {
            $zip = new ZipArchive();
            if ($zip->open($filename, ZipArchive::CREATE) == true) {
                $zip->addFile($path . '.sql', $name . '.sql');
                $zip->close();
            }
        } else {
            $archive = new Zip($filename);
            $archive->add($path . '.sql', PCLZIP_OPT_REMOVE_PATH, $filename);
        }
        $this->deleteFile($path . '.sql');
    }

    /**
     * @param $file
     * @throws Exception
     * @author Sang Nguyen
     */
    public function deleteFile($file)
    {
        if ($this->file->exists($file)) {
            $this->file->delete($file);
        }
    }

    /**
     * @param $path
     * @author Sang Nguyen
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function deleteFolderBackup($key)
    {
        $path = $this->backup_root . DIRECTORY_SEPARATOR . $key;
        foreach (scan_folder($path) as $item) {
            $this->file->delete($path . DIRECTORY_SEPARATOR . $item);
        }
        $this->file->deleteDirectory($path);

        if (empty($this->file->directories($this->backup_root))) {
            $this->file->deleteDirectory($this->backup_root);
        }
    }

    /**
     * @param $key
     * @param Request $request
     * @return bool
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @author Sang Nguyen
     */
    public function editBackup($key, Request $request)
    {
        $backup = $this->getBackup($key);
        if (!empty($backup)) {
            $backup['name'] = $request->input('name');
            $backup['description'] = $request->input('description');
            save_file_data($this->getBackupRoot() . DIRECTORY_SEPARATOR . $key . '/backup.json', $backup);
            return true;
        }
        return false;
    }
}
