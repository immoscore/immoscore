<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use DateTime;
use DatePeriod;
use DateInterval;

class Controller extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    protected function getMonthName($start, $end) {
        $start = new DateTime($start);
        $start->modify('first day of this month');
        $end = new DateTime($end);
        $end->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 month');
        $period = new DatePeriod($start, $interval, $end);
        $dates = array();
        foreach ($period as $dt) {
            $dates[] = $dt->format("M-y");
        }
        return $dates;
    }

    protected function getFullMonthName($start, $end) {
        $start = new DateTime($start);
        $start->modify('first day of this month');
        $end = new DateTime($end);
        $end->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 month');
        $period = new DatePeriod($start, $interval, $end);
        $dates = array();
        foreach ($period as $dt) {
            $dates[] = $dt->format("Y-M");
        }
        return $dates;
    }

    protected function combinations($arrays = array(), $i = 0) {
        if (!isset($arrays[$i])) {
            return array();
        }
        if ($i == count($arrays) - 1) {
            return $arrays[$i];
        }
        // get combinations from subsequent arrays
        $tmp = $this->combinations($arrays, ($i + 1));
        $result = array();
        // concat each array from tmp with each element from $arrays[$i]
        foreach ($arrays[$i] as $v) {
            foreach ($tmp as $t) {
                $result[] = is_array($t) ?
                        array_merge(array($v), $t) :
                        array($v, $t);
            }
        }
        return $result;
    }

    protected function get_start_end_month($start, $end) {
        $start = new DateTime($start);
        $start->modify('first day of this month');
        $end = new DateTime($end);
        $end->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 month');
        $period = new DatePeriod($start, $interval, $end);
        $dates = array();
        foreach ($period as $dt) {
            $dates[] = array("start" => $dt->format("Y-m-d"), "end" => $dt->format("Y-m-t"));
        }
        return $dates;
    }

    protected function get_operators() {
        return array("=", ">", "<", ">=", "<=", "!=");
    }

    protected function get_reporting_level_location($userInfo) {
        $reporting_level_location = array("1" => "country_id", "2" => "region_id", "3" => "woreda_id", "4" => "kebele_id");
        return $userInfo->$reporting_level_location[$userInfo->reporting_level_id];
    }

    protected function combinations2($arrays = array(), $i = 0) {
//        dd($arrays);
        if (!isset($arrays[$i])) {
            return array();
        }
        if ($i == count($arrays) - 1) {
            return $arrays[$i];
        }
        // get combinations from subsequent arrays
        $tmp = $this->combinations($arrays, ($i + 1));
        $result = array();
        // concat each array from tmp with each element from $arrays[$i]
        foreach ($arrays[$i] as $v) {
            foreach ($tmp as $t) {
                $result[] = is_array($t) ?
                        array_merge(array($v), $t) :
                        array($v, $t);
            }
            unset($arrays[$i]);
        }
        return $result;
    }


    function pc_array_power_set($array) {
        // initialize by adding the empty set
        $results = array(array());

        foreach ($array as $element)
            foreach ($results as $combination)
                array_push($results, array_merge($combination,array($element) ));

        return $results;
    }

    function get_extensions() {
        $ext = array("pdf"=>"pdf.jpg","xls"=>"excel.png","doc"=>"word.png","xlsx"=>"excel.png","docx"=>"word.png");
        return $ext;

    }

}
