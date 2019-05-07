<?php

namespace Botble\Backup\Http\Controllers;

use Botble\Backup\Http\Requests\CreateBackupRequest;
use Botble\Backup\Http\Requests\UpdateBackupRequest;
use Botble\Backup\Supports\Backup;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BackupController extends Controller
{

    /**
     * @var Backup
     */
    protected $backup;

    /**
     * BackupController constructor.
     * @param Backup $backup
     * @author Sang Nguyen
     */
    public function __construct(Backup $backup)
    {
        $this->backup = $backup;
    }

    /**
     * @return string
     * @throws \Throwable
     * @author Sang Nguyen
     */
    public function getCreate()
    {
        return view('backup::partials.create')->render();
    }

    /**
     * @param CreateBackupRequest $request
     * @return array
     * @author Sang Nguyen
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \Exception
     * @throws \Throwable
     */
    public function postCreate(CreateBackupRequest $request)
    {
        try {
            $this->backup->createBackupFolder($request);
            $this->backup->backupDb();
            $this->backup->backupFolder();

            return [
                'error' => false,
                'message' => __('Created successfully!'),
                'data' => $this->getBackupListHtml(),
            ];
        } catch (Exception $ex) {
            return [
                'error' => true,
                'message' => $ex->getMessage(),
            ];
        }
    }

    /**
     * @return string
     * @throws \Throwable
     * @author Sang Nguyen
     */
    public function getEdit($key)
    {
        $backup = $this->backup->getBackup($key);
        return view('backup::partials.edit', compact('backup'))->render();
    }

    /**
     * @param $id
     * @param UpdateBackupRequest $request
     * @return array
     * @author Sang Nguyen
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \Throwable
     */
    public function postEdit($key, UpdateBackupRequest $request)
    {
        $this->backup->editBackup($key, $request);
        return [
            'error' => false,
            'message' => __('Updated successfully!'),
            'data' => $this->getBackupListHtml(),
        ];
    }

    /**
     * @return string
     * @throws \Throwable
     * @author Sang Nguyen
     */
    public function getDelete($key)
    {
        $backup = $this->backup->getBackup($key);
        return view('backup::partials.delete', compact('backup'))->render();
    }

    /**
     * @param $id
     * @return array
     * @author Sang Nguyen
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \Throwable
     */
    public function postDelete($key)
    {
        $this->backup->deleteFolderBackup($key);
        return [
            'error' => false,
            'message' => __('Deleted successfully!'),
            'data' => $this->getBackupListHtml(),
        ];
    }

    /**
     * @param $id
     * @return array
     * @author Sang Nguyen
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \Throwable
     */
    public function postDeleteMany(Request $request)
    {
        foreach ($request->input('ids', []) as $key) {
            $this->backup->deleteFolderBackup($key);
        }
        return [
            'error' => false,
            'message' => __('Deleted selected item(s) successfully!'),
            'data' => $this->getBackupListHtml(),
        ];
    }

    /**
     * @return string
     * @throws \Throwable
     * @author Sang Nguyen
     */
    public function getRestore($key)
    {
        $backup = $this->backup->getBackup($key);
        return view('backup::partials.restore', compact('backup'))->render();
    }

    /**
     * @param $folder
     * @throws \Exception
     * @author Sang Nguyen
     */
    public function postRestore($key)
    {
        $path = $this->backup->getBackupRoot() . DIRECTORY_SEPARATOR . $key;
        foreach (scan_folder($path) as $file) {
            if (str_contains(basename($file), 'database')) {
                $this->backup->restoreDb($path . DIRECTORY_SEPARATOR . $file, $path);
            }

            if (str_contains(basename($file), 'public-storage')) {
                $this->backup->restore($path . DIRECTORY_SEPARATOR . $file, storage_path('app/public'));
            }
        }

        return [
            'error' => false,
            'message' => __('Restore successfully!'),
        ];
    }

    /**
     * @param $folder
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse|boolean
     * @author Sang Nguyen
     */
    public function getDownloadDatabase($key)
    {
        $path = $this->backup->getBackupRoot() . DIRECTORY_SEPARATOR . $key;
        foreach (scan_folder($path) as $file) {
            if (str_contains(basename($file), 'database')) {
                return response()->download($path . DIRECTORY_SEPARATOR . $file);
            }
        }
        return true;
    }

    /**
     * @param $folder
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse|boolean
     * @author Sang Nguyen
     */
    public function getDownloadUploadFolder($key)
    {
        $path = $this->backup->getBackupRoot() . DIRECTORY_SEPARATOR . $key;
        foreach (scan_folder($path) as $file) {
            if (str_contains(basename($file), 'public-storage')) {
                return response()->download($path . DIRECTORY_SEPARATOR . $file);
            }
        }
        return true;
    }

    /**
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \Throwable
     * @author Sang Nguyen
     */
    protected function getBackupListHtml()
    {
        $backups = $this->backup->getBackupList();
        return view('backup::partials.backup-items', compact('backups'))->render();
    }
}
