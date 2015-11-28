<?php


class IDMLfile
{
  const ACCEPTED_MIME_TYPE = 'application/zip; charset=binary';

  private $resource = null;

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
  public function getContentFile($file)
  {
    $content = '';
    if(isset($this->structure[$file]))
    {
      return simplexml_load_string($this->structure[$file]);
    }else{
      throw new Exception('Location not found');
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
    if(file_exists($location))
    {
      if($this->checkMimeType($location))
      {
        $this->resource = zip_open($location);

        while ($zip_entry = zip_read($this->resource))
        {
          $this->structure[zip_entry_name($zip_entry)] = zip_entry_read($zip_entry);
        }
      }
    }else{
      throw new Exception('File not found');
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

    if($mime == IDMLfile::ACCEPTED_MIME_TYPE)
    {
      return true;
    }else{
      throw new Exception('No correct mimetype');
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
    $finfo = new finfo(FILEINFO_MIME);
    $type = $finfo->file($location);

    return $type;
  }

  public function __destruct()
  {
    zip_close($this->resource);
  }
}