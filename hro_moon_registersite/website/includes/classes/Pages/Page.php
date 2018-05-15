<?php namespace moonconsultancy\Pages;

/**
 * Class Page
 * @package moonconsultancy\Pages
 */
class Page {

    public $name, $link, $title;

    /**
     * Initialize object with given params
     *
     * @param $name
     * @param $link
     * @param $title
     */
    public function __construct($name,$link,$title) {
        $this->name = $name;
        $this->link = $link;
        $this->title = $title;
    }

}