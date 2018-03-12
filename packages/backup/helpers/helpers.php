<?php

use Botble\Backup\Supports\Backup;

if (!function_exists('get_backup_size')) {
    /**
     * @param $key
     * @return int
     * @author Sang Nguyen
     */
    function get_backup_size($key)
    {
        $size = 0;

        foreach (File::allFiles(storage_path('app/backup/' . $key)) as $file) {
            $size += $file->getSize();
        }

        return $size;
    }
}

if (!function_exists('render_backup_list')) {
    /**
     * @return string
     * @throws Throwable
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    function render_backup_list()
    {
        $service = new Backup();
        $backups = $service->getBackupList();
        return view('backup::list', compact('backups'))->render();
    }
}
