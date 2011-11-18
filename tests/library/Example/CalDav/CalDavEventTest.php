<?php

class CalDavEventTest extends PHPUnit_Framework_TestCase
{

    public function testSaveBastilleDayParty()
    {
        $input = array(
            'uid' => 'uid1@example.com',
            'organizer' => 'John Doe',
            'organizerEmail' => 'john.doe@example.com',
            'eventBegin' => '7/14/2012 5:00 pm',
            'eventEnd' => '7/15/2012 3:59:59 am',
            'summary' => 'Bastille Day Party'
        );

        $event = new Example_CalDav_CalDavEvent($input);
        $filename = dirname(__FILE__) . '/files/bastille-test.ics';
        $event->save($filename);

        $this->assertFileExists($filename);
        $this->assertFileEquals(dirname(__FILE__) . '/files/bastille-day.ics', $filename);
    }
    
    public function testSaveFourthOfJulyCookout()
    {
        $input = array(
            'uid' => 'uid2@example.com',
            'organizer' => 'Jeremy Kendall',
            'organizerEmail' => 'jeremy.kendall@example.com',
            'eventBegin' => '7/4/2012 5:00 pm',
            'eventEnd' => '7/4/2012 11:00 pm',
            'summary' => '4th of July Cookout'
        );
        
        $event = new Example_CalDav_CalDavEvent($input);
        $filename = dirname(__FILE__) . '/files/independence-test.ics';
        $event->save($filename);
        $this->assertFileEquals(dirname(__FILE__) . '/files/independence-day.ics', $filename);
    }

}
