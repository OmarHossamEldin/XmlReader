<?php

namespace Reneknox\XmlReader\Reader;

use Reneknox\XmlReader\Exceptions\NotSupportedFileException;
use Reneknox\XmlReader\Exceptions\FileNotFoundException;

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
