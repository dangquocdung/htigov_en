<?php


Route::group([
    'namespace' => 'DungThinh\DtPoll'
], function () {
    Route::get('timezones/{timezone}',  'DtPollController@index');

});