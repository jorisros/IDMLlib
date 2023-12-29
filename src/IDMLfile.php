<?php

namespace JorisRos\IDMLlib;

class IDMLfile
{
    private $arr_accepted_mime_types = array(
        'application/zip; charset=binary',
        'application/octet-stream; charset=binary');

    private $structure = array();

    public function __construct($location)
    {
        $this->open($location);
    }

    /**
     * Returns the content of the file
     * @param $file
     * @return SimpleXMLElement
     * @throws Exception
     */
    public function getContentFile($file, $xml = false)
    {
        $content = '';

        if (isset($this->structure[$file])) {
            if ($xml) {
                return simplexml_load_string($this->structure[$file]);
            } else {
                return $this->structure[$file];
            }
        } else {
            throw new \Exception('Location not found');
        }

        return simplexml_load_string($this->structure[$file]);
    }

    public function saveAs()
    {
        //@TODO save file as
    }

    /**
     * Open the location of idml file
     * @param $location
     * @throws Exception
     */
    private function open($location)
    {
        if (file_exists($location)) {
            if ($this->checkMimeType($location)) {
                $zip = new \ZipArchive();
                $zip->open($location);

                for ($i = 0; $i < $zip->numFiles; $i++) {
                    $this->structure[$zip->getNameIndex($i)] = $zip->getFromIndex($i);
                }
            }
        } else {
            throw new \Exception('File not found');
        }
    }

    /**
     * Checks the mimetype of the IDML file
     *
     * @param $location
     * @return bool
     * @throws Exception
     */
    private function checkMimeType($location)
    {
        $mime = $this->getMimeType($location);

        if (in_array($mime, $this->arr_accepted_mime_types)) {
            return true;
        } else {
            throw new \Exception('No correct mimetype');
            return false;
        }
    }

    /**
     * Returns the mimetype of the file
     * @param $location
     * @return string
     */
    private function getMimeType($location)
    {
        $finfo = new \finfo(FILEINFO_MIME);
        $type = $finfo->file($location);

        return $type;
    }
}
