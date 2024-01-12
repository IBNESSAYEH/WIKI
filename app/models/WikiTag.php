<?php

namespace App\models;

use Core\Database;
use PDO;

class WikiTag
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }

    public function createWikiTag($idWiki, $idTag)
    {
        try {
            $query = $this->connection->getConnection()->prepare("INSERT INTO wikiTag (id_wiki, id_tag) VALUES (:idWiki, :idTag)");
            $query->bindValue(':idWiki', $idWiki);
            $query->bindValue(':idTag', $idTag);
            $query->execute();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteWikiTag($id)
    {
        try {
            $query = $this->connection->getConnection()->prepare("DELETE FROM wikiTag WHERE id_wiki = :id OR id_tag = :id");
            $query->bindValue(':id', $id);
            $query->execute();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function editWikiTag($id, $tag)
    {
        try {
            $query = $this->connection->getConnection()->prepare("UPDATE `wikitag` SET `id_wiki` = :id, `id_tag`= :id_tag  WHERE id = :id");
            $query->bindValue(':id', $id);
            $query->bindValue(':id_tag', $tag);
            $query->execute();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Add other methods as needed for your application

    // For example, you might want to retrieve tags associated with a particular wiki:
    // public function getTagsForWiki($idWiki)
    // {
    //     try {
    //         $query = $this->connection->getConnection()->prepare("SELECT t.* FROM wikiTag wt
    //                                                             JOIN tag t ON wt.id_tag = t.id
    //                                                             WHERE wt.id_wiki = :idWiki");
    //         $query->bindValue(':idWiki', $idWiki);
    //         $query->execute();
    //         $result = $query->fetchAll(PDO::FETCH_OBJ);
    //         return !empty($result) ? $result : false;
    //     } catch (\PDOException $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }
}

?>
