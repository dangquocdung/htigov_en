<?php

namespace Botble\Backup\Providers;

use App;
use Botble\Support\Providers\SupportServiceProvider;
use Schema;
use Illuminate\Support\ServiceProvider;
use File;

class BackupServiceProvider extends ServiceProvider
{
    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * @author Sang Nguyen
     */
    public function register()
    {
        $this->app->register(SupportServiceProvider::class);
        $this->autoloadHelpers(__DIR__ . '/../../helpers');
    }

    /**
     * @author Sang Nguyen
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/backup.php', 'backup');
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'backup');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'backup');

        if (App::VERSION() >= '5.3.31') {
            $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
            if (App::VERSION() >= '5.4.0') {
                Schema::defaultStringLength(191);
            }
        } else {
            require_once __DIR__ . '/../../routes/web.php';
        }

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../../resources/views' => resource_path('views/vendor/backup')], 'views');
            $this->publishes([__DIR__ . '/../../resources/lang' => resource_path('lang/vendor/backup')], 'lang');
            $this->publishes([__DIR__ . '/../../config/backup.php' => config_path('backup.php')], 'config');
            $this->publishes([__DIR__ . '/../../resources/assets' => resource_path('assets/backup')], 'resources');
            $this->publishes([__DIR__ . '/../../public/assets' => public_path('vendor/backup')], 'assets');
        }
    }

    /**
     * Load module's helpers
     * @param $directory
     * @author Sang Nguyen
     * @since 2.0
     */
    public function autoloadHelpers($directory)
    {
        $helpers = File::glob($directory . '/*.php');
        foreach ($helpers as $helper) {
            File::requireOnce($helper);
        }
    }
}
