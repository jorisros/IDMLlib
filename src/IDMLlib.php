<?php

require_once 'IDMLfile.class.php';
require_once 'IDMLcontentColletion.class.php';
require_once 'IDMLtagCollection.class.php';

class IDMLlib
{
  private $file;

  public function __construct(IDMLfile $file)
  {
    $this->file = $file;

    $this->init();
  }

  private function init()
  {


  }
  /**
   * returns the content of a tag by the selecting name
   * @param $name
   * @param bool $html
   */
  public function getContentByTagName($name, $html = true)
  {
    $arr = array();
    $stories = $this->file->getContentFile('Stories/Story_udc.xml');

    $collection = new IDMLcontentCollection($this->file, $stories);

    return $collection->getContentByTagName($name);

  }

  /**
   * get content by tag
   * @param IDMLtagCollection $tag
   * @param bool $html
   */
  public function getContentByTag(IDMLtagCollection $tag, $html = true)
  {

  }

  /**
   * Returns the content tags
   * @return array
   */
  public function getContentTags()
  {
    $arr = array();
    $content = $this->file->getContentFile('XML/Tags.xml', true);
    $tag = new IDMLtagCollection($this->file, $content);

    $tags = $tag->getTags();
    /** @var IDMLtag $tag */
    foreach($tags as $tag)
    {
      $arr[] = $tag->getName();
    }
    return $arr;
  }
}
