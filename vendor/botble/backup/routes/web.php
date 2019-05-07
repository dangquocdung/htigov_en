<?php

Route::group([
        'namespace' => 'Botble\Backup\Http\Controllers',
        'middleware' => config('backup.route.middleware'),
        'prefix' => config('backup.route.prefix')
    ], function () {
        Route::get('/create', 'BackupController@getCreate')->name('backup.create');
        Route::post('/create', 'BackupController@postCreate')->name('backup.create.post');

        Route::get('/edit/{key}', 'BackupController@getEdit')->name('backup.edit');
        Route::post('/edit/{key}', 'BackupController@postEdit')->name('backup.edit.post');

        Route::get('/delete/{key}', 'BackupController@getDelete')->name('backup.delete');
        Route::delete('/delete/{key}', 'BackupController@postDelete')->name('backup.delete.post');
        Route::delete('/delete-many', 'BackupController@postDeleteMany')->name('backup.delete.many.post');

        Route::get('/restore/{key}', 'BackupController@getRestore')->name('backup.restore');
        Route::post('/restore/{key}', 'BackupController@postRestore')->name('backup.restore.post');

        Route::get('/download/database/{key}', 'BackupController@getDownloadDatabase')->name('backup.download.database');
        Route::get('/download/uploads-folder/{key}', 'BackupController@getDownloadUploadFolder')->name('backup.download.media.folder');
    });
