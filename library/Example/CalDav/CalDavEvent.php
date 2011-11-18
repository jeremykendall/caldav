<?php

/**
 * Description of CalDavEvent
 *
 * @category    Example
 * @package     Example_CalDav
 * @version     $Id$
 */

/**
 * Creates calDAV events
 * 
 * @category    Example
 * @package     Example_CalDav
 */
class Example_CalDav_CalDavEvent
{

    private $_options = array();
    
    public function __construct(array $options) 
    {
        $options['eventBegin'] = $this->_convertToIcalTimestamp($options['eventBegin']);
        $options['eventEnd'] = $this->_convertToIcalTimestamp($options['eventEnd']);
        $this->_options = $options;
    }
    
    public function save($filename = null)
    {
        $event = <<<__EVENT__
BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
BEGIN:VEVENT
UID:{$this->_options['uid']}
DTSTAMP:20110714T170000Z
ORGANIZER;CN={$this->_options['organizer']}:MAILTO:{$this->_options['organizerEmail']}
DTSTART:{$this->_options['eventBegin']}
DTEND:{$this->_options['eventEnd']}
SUMMARY:{$this->_options['summary']}
END:VEVENT
END:VCALENDAR
__EVENT__;

        if (is_null($filename)) {
            return $event;
        }

        return file_put_contents($filename, $event);
    }
    
    private function _convertToIcalTimestamp($date)
    {
        return gmdate('Ymd\THis\Z', strtotime($date));
    }
    
}
