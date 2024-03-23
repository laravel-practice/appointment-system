<?php

use Carbon\Carbon;

if(! function_exists('convertDate')) {
    function convertDate($date): string
    {
        return Carbon::parse($date)->format('d M Y');
    }


    if (!function_exists('convertToAmPm')) {
        function convertToAmPm($time): string
        {
            return Carbon::createFromFormat('H:i', $time)->format('h:i A');
        }
    }

}

