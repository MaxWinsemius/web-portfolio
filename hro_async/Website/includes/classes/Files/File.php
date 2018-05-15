<?php

namespace campers\Files;

class File {
    public $name, $description, $link;

    public function __construct($name, $description, $link)
    {
        $this->name = $name;
        $this->description = $description;
        $this->link = $link;
    }
}