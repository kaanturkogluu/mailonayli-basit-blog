<?php


class ArticleText
{
    private $articleText;
    private $articleTextId;

    function getArticleTextId()
    {
        return $this->articleTextId;
    }

    function setArticleTextId($id)
    {
        $this->articleTextId = $id;
    }

    function getArticleText()
    {
        return $this->articleText;
    }

    function setArticleText($article)
    {
        $this->articleText = $article;
    }
}




class ArticleTextMap
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    function add(ArticleText $article)
    {
        try {

            // SQL sorgusunu hazırla
            $addstatement = $this->db->prepare('INSERT INTO articletext(text_content) VALUES(:at)');
            // Parametreleri bağla


            $addstatement->bindValue(':at', $article->getArticleText(), PDO::PARAM_STR);
            // Sorguyu çalıştır
            $addstatement->execute();
            // PDO işlemi tamamlandı, değişiklikleri kaydet




            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            // Hata durumunda işlemleri geri al

            // Hata mesajını göster
            echo $e->getMessage();
            return false;
        }
    }//return lastinsertId

    function delete(ArticleText $article) // return bool
    {
        try {
            $this->db->beginTransaction();

            // SQL sorgusunu hazırla
            $deleteStatement = $this->db->prepare('DELETE FROM articletext WHERE id=:id');

            // Parametreleri bağla
            $deleteStatement->bindValue(':id', $article->getArticleTextId(), PDO::PARAM_INT);

            // Sorguyu çalıştır
            $deleteStatement->execute();

            // PDO işlemi tamamlandı, değişiklikleri kaydet
            $this->db->commit();

            return true;
        } catch (PDOException $e) {
            // Hata durumunda işlemleri geri al
            $this->db->rollBack();

            // Hata mesajını göster
            echo $e->getMessage();

            return false;
        }

    }

    function update(ArticleText $article) //return bool
    {
        try {
            $this->db->beginTransaction();

            // SQL sorgusunu hazırla
            $updateStatement = $this->db->prepare('UPDATE articleText SET text_content=:at WHERE id=:id');

            // Parametreleri bağla
            $updateStatement->bindValue(':at', $article->getArticleText(), PDO::PARAM_STR);
            $updateStatement->bindValue(':id', $article->getArticleTextId(), PDO::PARAM_INT);

            // Sorguyu çalıştır
            $updateStatement->execute();

            // PDO işlemi tamamlandı, değişiklikleri kaydet
            $this->db->commit();

            return true;
        } catch (PDOException $e) {
            // Hata durumunda işlemleri geri al
            $this->db->rollBack();

            // Hata mesajını göster
            echo $e->getMessage();

            return false;
        }
    }
    function getTextBYID(ArticleText $article)
    {
        // SQL sorgusunu hazırla
        $getStatement = $this->db->prepare('SELECT text_content FROM articletext WHERE id = :id');
        $getStatement->bindValue(':id',$article->getArticleTextId(), PDO::PARAM_INT);


        $getStatement->execute();


        $results = $getStatement->fetchColumn();


        return $results;

    }
}

