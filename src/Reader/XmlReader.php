<?php

namespace Whmcs\XmlReader\Reader;

use SimpleXMLElement;

class XmlReader
{
    private $data;

    public static function read(string $file): XmlReader
    {
        $xml = new static();
        $xml->set_data(simplexml_load_string(File::get_contents($file)));
        return $xml;
    }

    public function set_data(SimpleXMLElement $data)
    {
        $this->data = $data;
    }

    public function get_data(): SimpleXMLElement
    {
        return $this->data;
    }
}
