<?php

namespace campers\Files;

class Files {
    private $css = [], $js = [], $content = [], $currentPage;

    /**
     * Set the files given in files.json
     */
    public function setFiles() {
        //get json data
        $rawFiles = json_decode(file_get_contents(DATA_PATH . "files.json"));

        //set css files
        foreach($rawFiles->css as $cssFile) {
            $this->css[] = new FunctionFile($cssFile->name, $cssFile->description, $cssFile->link, $cssFile->contentVisibility);
        }

        //set js files
        foreach($rawFiles->js as $jsFile) {
            $this->js[] = new FunctionFile($jsFile->name, $jsFile->description, $jsFile->link, $jsFile->contentVisibility);
        }

        //Set content files
        foreach($rawFiles->content as $contentFile) {
            $this->content[] = new Content($contentFile->name, $contentFile->description, $contentFile->link, $contentFile->title);
        }

        //get current page -> checks if set -> checks if empty -> check if page exists -> load page / load 404 / load home
        $this->currentPage = (isset($_GET['page']) ? (!empty($_GET['page']) ? ($_GET['page'] <= (count($this->content) - 1) ? $_GET['page'] : NOT_FOUND_FILE ) : INDEX_FILE) : INDEX_FILE);
    }

    /**
     * Get the content of the given page
     *
     * @param $pageId
     */
    public function getContent($pageId) {
        require_once PAGES_PATH . $this->content[$pageId]->link;
    }

    /**
     * Get the title of the given page
     *
     * @param $pageId
     * @return string
     */
    public function getTitle($pageId) {
        return $this->content[$pageId]->title . MAIN_TITLE;
    }

    /**
     * Return html to load the current CSS files
     *
     * @return string
     */
    public function getCurrentCss()
    {
        $return = "";
        foreach($this->css as $css) {
            if( in_array("*", $css->contentVisibility) || in_array($this->currentPage, $css->contentVisibility) ) {
                $return .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . CSS_PATH . $css->link . "\"> \r\n";
            }
        }

        return $return;
    }

    /**
     * Return html to load the current JS files
     *
     * @return string
     */
    public function getCurrentJs()
    {
        $return = "";
        foreach($this->js as $js) {
            if( in_array("*", $js->contentVisibility) || in_array($this->currentPage, $js->contentVisibility) ) {
                $return .= "<script src=\"" . JS_PATH . $js->link . "\"></script>\r\n";
            }
        }
        return $return;
    }

    /**
     * Return the title as string
     *
     * @return string
     */
    public function getCurrentPagetitle()
    {
        return $this->getTitle($this->currentPage);
    }

    /**
     * Print the current page with header and footer
     */
    public function getCurrentContent()
    {
//        $this->getContent(0);
        $this->getContent($this->currentPage);
//        $this->getContent(1);
    }
}

