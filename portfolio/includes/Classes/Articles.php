<?php namespace portfolio;


class Articles
{
    private $db;

    /**
     * Articles constructor.
     * @param $pdo
     */
    public function __construct($pdo) {
        $this->db = $pdo;
    }

    /**
     * @return mixed
     * Returns list of all articles with ID, Title, Image Link, Under construction bool and Old version Bool,
     * ordered
     * by the date.
     */
    public function getArticlesList() {
        return $this->db->receiveQuery("SELECT `ID`,`Title`,`ImageLink`,`UnderConstruction`,`OldVersion` FROM `Portf_Artic` ORDER BY `Date` DESC");
    }

    /**
     * @param $id
     * @return mixed
     * Returns identified article, with ID, Title, Article, Under construction bool and Old version bool.
     */
    public function getArticle($id) {
        return $this->db->receiveQuery("SELECT `ID`,`Title`,`Article`,`UnderConstruction`,`OldVersion` FROM `Portf_Artic` WHERE `ID`='" . $id . "'");
    }
}