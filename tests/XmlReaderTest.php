<?php

namespace Tests;

use Whmcs\XmlReader\Exceptions\NotSupportedFileException;
use Whmcs\XmlReader\Exceptions\FileNotFoundException;
use Whmcs\XmlReader\Reader\XmlReader;
use PHPUnit\Framework\TestCase;

class XmlReaderTest extends TestCase
{
    private string $file;

    public function setUp(): void
    {
        $this->file = __DIR__;
    }
    /** @test */
    public function xml_read_not_supported()
    {
        $this->expectException(NotSupportedFileException::class);
        $this->file .= '/Samples/example.xmal'; 
        XmlReader::read($this->file);
    }

    /** @test */
    public function xml_read_file_not_found()
    {
        $this->expectException(FileNotFoundException::class);
        $this->file .= '/Samples/example1.xml';
        XmlReader::read($this->file);
    }

    /** @test */
    public function xml_read_file_success()
    {
        $this->file .= '/Samples/example.xml';
        $xml = XmlReader::read($this->file);
        $this->assertEquals(5, $xml->get_data()->count());
        $this->assertIsObject($xml);
    }
}
