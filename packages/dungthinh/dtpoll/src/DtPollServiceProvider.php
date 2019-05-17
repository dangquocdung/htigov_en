<?php

namespace DungThinh\DtPoll;

use Illuminate\Support\ServiceProvider;

class DtPollServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__ . '/routes.php';
        $this->app->make('DungThinh\DtPoll\DtPollController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
