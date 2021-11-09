#!/bin/bash

cd caldav-calendar-import/

while true
do
    /app/download_calendar.sh
    /app/format_ics.sh
    php calendar_import.php
    sleep "$REFRESH_RATE"h
done