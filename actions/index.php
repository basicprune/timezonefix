<?php

function index_ALL(Web $w)
{
    $w->ctx("title", "TimeZone Module");

    $loggedinUser = AuthService::getInstance($w)->user();
    $timezoneService = timezonefixService::getInstance($w)->getTimeZoneTables($loggedinUser->id);
    $timezoneDT = new timezonefixInput($w);
   

    $DateTimes_table = [];
    $DateTimes_table_headers = ['creator_id','id','time'];
    if (!empty($timezoneService)) {
        foreach ($timezoneService as $timezoneDT) {
       
            $row = [];
            $row[] = $timezoneDT->creator_id;
            $row[] = $timezoneDT->id;
            $row[] = $timezoneDT->DateFormatter($timezoneDT->dt_DateTimeTable, 'australia/Sydney')->format("d:m:Y H:i");
            $DateTimes_table[] = $row;
        }
    }
    $w->ctx('DateTimes_table', Html::table($DateTimes_table, null, "tablesorter", $DateTimes_table_headers));
    
}


