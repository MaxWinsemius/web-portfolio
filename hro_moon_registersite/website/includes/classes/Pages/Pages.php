<?php namespace moonconsultancy\Pages;


class Pages {

    private $pages = [], $currentPage;

    public function __construct()
    {
        $this->currentPage = isset($_GET['page']) ? (empty($_GET['page']) ? 0 : $_GET['page']) : 0;
    }

    /**
     * Sets the currentPage
     */
    public function setPages($rawPages) {
        foreach($rawPages as $rawPage) {
            $this->pages[] = new Page($rawPage->name, $rawPage->link, $rawPage->title);
        }
    }

    public function getPage() {
        require_once PAGE_PATH . $this->pages[$this->currentPage]->link;
    }

    public function getTitle() {
        return $this->pages[$this->currentPage]->title . " || Moonconsultancy";
    }
}