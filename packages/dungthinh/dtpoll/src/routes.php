<?php


Route::get('timezones/{timezone}',  function($timezone){

    echo Carbon::now($timezone)->toDateTimeString();

});