<?php

function TimeZoneFixSend_GET(Web $w){

    $timezoneFixDB = new timezonefixInput($w);

    $form = [
        'TimeZone Input'=> [ 
            [
                (new \Html\Form\InputField([
                    "id|name"        => "time_input",
                    "value"            => $timezoneFixDB->dt_DateTimeTable,
                    "pattern"        => "^(0?[0-9]|1[0-9]|2[0-3]):[0-5][0-9](\s+)?(AM|PM|am|pm)?$",
                    "placeholder"    => "12hr format: 11:30pm or 24hr format: 23:30",
                    "required"        => "true"
                ]))->setLabel('TimeZone Input')
            ]
        ]
    ];
    $w->out(Html::multiColForm($form, "/timezonefix/TimeZoneFixSend", 'POST'));
}
function TimeZoneFixSend_POST(Web $w){

    $timezoneFixDB = new timezonefixInput($w);

    $DateTimeObj = new DateTime($_POST['time_input'], new DateTimeZone('utc'));
    $timezoneFixDB->dt_DateTimeTable = $DateTimeObj->getTimestamp();
    $timezoneFixDB->insertOrUpdate();
    $w->redirect("/timezonefix");
}