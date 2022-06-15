<?php

namespace Whmcs\XmlReader\Reader;

use Whmcs\XmlReader\Exceptions\NotSupportedFileException;
use Whmcs\XmlReader\Exceptions\FileNotFoundException;

class File
{
    public static function get_contents(string $file): string
    {
        $fileData = explode('.', $file);
        $extension = end($fileData);
        if ($extension !== 'xml') {
            throw new NotSupportedFileException();
        }
        if(!file_exists($file)){
            throw new FileNotFoundException();
        }
        return file_get_contents($file);
    }
}
