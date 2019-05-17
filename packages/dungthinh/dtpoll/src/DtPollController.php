<?php

namespace DungThinh\DtPoll;
 
use App\Http\Controllers\Controller;
use Carbon\Carbon;
 
class DtPollController extends Controller
{
    public function index($timezone)
    {
        echo Carbon::now($timezone)->toDateTimeString();
    }

}