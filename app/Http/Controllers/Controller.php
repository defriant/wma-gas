<?php

namespace App\Http\Controllers;

use DateTime;
use DatePeriod;
use DateInterval;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function random($type, $length)
    {
        $result = "";
        if ($type == 'char') {
            $char = 'ABCDEFGHJKLMNPRTUVWXYZ';
            $max        = strlen($char) - 1;
            for ($i = 0; $i < $length; $i++) {
                $rand = mt_rand(0, $max);
                $result .= $char[$rand];
            }
            return $result;
        } elseif ($type == 'num') {
            $char = '0123456789';
            $max        = strlen($char) - 1;
            for ($i = 0; $i < $length; $i++) {
                $rand = mt_rand(0, $max);
                $result .= $char[$rand];
            }
            return $result;
        } elseif ($type == 'mix') {
            $char = 'aA1bB1cC2dD2eE3fF3gG4hH4iI5jJ5kK6lL6mM7nN7oO8pP8qQ9rR9sS0tT0uU1vV2wW3xX4yY5zZ';
            $max = strlen($char) - 1;
            for ($i = 0; $i < $length; $i++) {
                $rand = mt_rand(0, $max);
                $result .= $char[$rand];
            }
            return $result;
        } elseif ($type == 'mixUppercase') {
            $char = 'A1B1C2D2E3F3G4H4I5J5K6L6M7N7O8P8Q9R9S0T0U1V2W3X4Y5Z';
            $max = strlen($char) - 1;
            for ($i = 0; $i < $length; $i++) {
                $rand = mt_rand(0, $max);
                $result .= $char[$rand];
            }
            return $result;
        }
    }

    public function getDatesFromRange($start, $end, $format = 'Y-m-d')
    {
        $array = array();
        $interval = new DateInterval('P1D');
        $realEnd = new DateTime($end);
        $realEnd->add($interval);
        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

        foreach ($period as $date) {
            $array[] = $date->format($format);
        }

        return $array;
    }
}
