

Change all the timezones in Docker-Compose.yml to UTC, aswell as change both line 10/11 in Config.php to "UTC"

also add this to DbObject.php

   /**
     * https://www.php.net/manual/en/timezones.php
     * Converts Unix Timestamp to readable DateTime, With the timezone chosen
     */
    public function DateFormatter($dateTime, string $TimeZoneString){
        $db_object = new DateTime(formatDate($dateTime, "Y-m-d H:i:s"));
        if ($TimeZoneString != ""){
            return $db_object->setTimezone(new DateTimeZone($TimeZoneString));
        } else
        {
            return $db_object->setTimezone(new DateTimeZone("utc"));
        }
    }


