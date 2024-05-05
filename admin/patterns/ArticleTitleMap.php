<?php

class ArticleTitle
{
    private $articleTitle;
    private $articleTitleId;

    function getArticleTitleId()
    {
        return $this->articleTitleId;
    }

    function setArticleTitleId($id)
    {
        $this->articleTitleId = $id;
    }

    function getArticleTitle()
    {
        return $this->articleTitle;
    }

    function setArticleTitle($article)
    {
        $this->articleTitle = $article;
    }
}



class ArticleTitleMap
{
    private $db;

    public function __construct( $dbConnection)
    {
        $this->db = $dbConnection;
    }


    function add(ArticleTitle $article)
    {
        try {

            // SQL sorgusunu hazırla
            $addstatement = $this->db->prepare('INSERT INTO articletitle(title_content) VALUES(:at)');
            // Parametreleri bağla
            $addstatement->bindValue(':at', $article->getArticleTitle(), PDO::PARAM_STR);
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

    function delete(ArticleTitle $article) // return bool
    {
        try {
            $this->db->beginTransaction();

            // SQL sorgusunu hazırla
            $deleteStatement = $this->db->prepare('DELETE FROM articletitle WHERE id=:id');

            // Parametreleri bağla
            $deleteStatement->bindValue(':id', $article->getArticleTitleId(), PDO::PARAM_INT);

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

    function update(ArticleTitle $article) //return bool
    {
        try {
            $this->db->beginTransaction();

            // SQL sorgusunu hazırla
            $updateStatement = $this->db->prepare('UPDATE articletitle SET title_content=:at WHERE id=:id');

            // Parametreleri bağla
            $updateStatement->bindValue(':at', $article->getArticleTitle(), PDO::PARAM_STR);
            $updateStatement->bindValue(':id', $article->getArticleTitleId(), PDO::PARAM_INT);

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


    function getTitleById(ArticleTitle $article)
    {
        // SQL sorgusunu hazırla
        $getStatement = $this->db->prepare('SELECT title_content FROM articletitle WHERE id = :id');
        $getStatement->bindValue(':id',$article->getArticleTitleId(), PDO::PARAM_INT);


        $getStatement->execute();


        $results = $getStatement->fetchColumn();


        return $results;

    }
}


