<?php

namespace campers\Files;

class Content extends File {
    public $title;

    public function __construct($name, $description, $link, $title)
    {
        $this->name = $name;
        $this->description = $description;
        $this->link = $link;
        $this->title = $title;
    }
}