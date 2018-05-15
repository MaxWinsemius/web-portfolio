<?php

namespace campers\Files;

class FunctionFile extends File {
    public $contentVisibility;

    public function __construct($name, $description, $link, $contentVisibility)
    {
        $this->name = $name;
        $this->description = $description;
        $this->link = $link;
        $this->contentVisibility = $contentVisibility;
    }
}