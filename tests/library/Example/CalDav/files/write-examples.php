<?php

$format = 'Ymd\THis\Z';
$begin = gmdate($format, strtotime('7/14/2012 5:00 pm'));
$end = gmdate($format, strtotime('7/15/2012 3:59:59 am'));

$event = <<<__EVENT__
BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
BEGIN:VEVENT
UID:uid1@example.com
DTSTAMP:20110714T170000Z
ORGANIZER;CN=John Doe:MAILTO:john.doe@example.com
DTSTART:$begin
DTEND:$end
SUMMARY:Bastille Day Party
END:VEVENT
END:VCALENDAR
__EVENT__;

$filename = realpath(dirname(__FILE__)) . '/bastille-day.ics';
file_put_contents($filename, $event);

$begin = gmdate($format, strtotime('7/4/2012 5 pm'));
$end = gmdate($format, strtotime('7/4/2012 11:00 pm'));

$event = <<<__EVENT__
BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
BEGIN:VEVENT
UID:uid2@example.com
DTSTAMP:20110714T170000Z
ORGANIZER;CN=Jeremy Kendall:MAILTO:jeremy.kendall@example.com
DTSTART:$begin
DTEND:$end
SUMMARY:4th of July Cookout
END:VEVENT
END:VCALENDAR
__EVENT__;

$filename = realpath(dirname(__FILE__)) . '/independence-day.ics';
file_put_contents($filename, $event);