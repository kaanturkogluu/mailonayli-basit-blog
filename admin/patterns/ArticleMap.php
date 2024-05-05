<?php

class Article
{
    private $articleId;
    private $textId;
    private $textImageId;
    private $textTitleId;
    private $categoryId;

    public function getArticleId()
    {
        return $this->articleId;
    }

    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;
    }

    public function getTextId()
    {
        return $this->textId;
    }

    public function setTextId($textId)
    {
        $this->textId = $textId;
    }

    public function getTextImageId()
    {
        return $this->textImageId;
    }

    public function setTextImageId($textImageId)
    {
        $this->textImageId = $textImageId;
    }

    public function getTextTitleId()
    {
        return $this->textTitleId;
    }

    public function setTextTitleId($textTitleId)
    {
        $this->textTitleId = $textTitleId;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }
}


class ArticleMap
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    public function getAllArticle()
    {

        // SQL sorgusunu hazırla
        $getStatement = $this->db->prepare('SELECT * FROM article ORDER BY id DESC');

// SQL sorgusunu çalıştır ve sonuçları al
        $getStatement->execute();

// Sonuçları fetchAll metodu ile bir dizi olarak al
        $results = $getStatement->fetchAll(PDO::FETCH_ASSOC);


// Sonuçları döndür
        return $results;


    }

    public function getCategoriedrticle(Article $article)
    {

        // SQL sorgusunu hazırla
        $getStatement = $this->db->prepare('SELECT * FROM article WHERE categoryId=:id ORDER BY id DESC');
        $getStatement->bindValue(':id', $article->getCategoryId(), PDO::PARAM_INT);
// SQL sorgusunu çalıştır ve sonuçları al
        $getStatement->execute();

// Sonuçları fetchAll metodu ile bir dizi olarak al
        $results = $getStatement->fetchAll(PDO::FETCH_ASSOC);


// Sonuçları döndür
        return $results;


    }

    public function add(Article $article)
    {
        try {


            // SQL sorgusunu hazırla
            $addStatement = $this->db->prepare('INSERT INTO article(textId, textImageId, textTitleId, categoryId) VALUES(:textId, :textImageId, :textTitleId, :categoryId)');
            // Parametreleri bağla
            $addStatement->bindValue(':textId', $article->getTextId(), PDO::PARAM_INT);
            $addStatement->bindValue(':textImageId', $article->getTextImageId(), PDO::PARAM_INT);
            $addStatement->bindValue(':textTitleId', $article->getTextTitleId(), PDO::PARAM_INT);
            $addStatement->bindValue(':categoryId', $article->getCategoryId(), PDO::PARAM_INT);
            // Sorguyu çalıştır
            $addStatement->execute();
            // PDO işlemi tamamlandı, değişiklikleri kaydet


            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            // Hata durumunda işlemleri geri al


            // Hata mesajını göster
            echo $e->getMessage();

            return false;
        }
    }

    public function delete(Article $art)
    {
        try {
            $this->db->beginTransaction();

            // SQL sorgusunu hazırla
            $deleteStatement = $this->db->prepare('DELETE FROM categories WHERE id=:id');

            // Parametreleri bağla
            $deleteStatement->bindValue(':id', $art->getArticleId(), PDO::PARAM_INT);

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

    //update fonksiyonu tamamlanacak
    public function update(Article $article)
    {
        try {
            $this->db->beginTransaction();

            // SQL sorgusunu hazırla
            $updateStatement = $this->db->prepare('UPDATE comments SET textId=:textid, textImageId=:imageid, categoryId=:category, textTitleId=:tid  WHERE id=:id');

            // Parametreleri bağla
            $updateStatement->bindValue(':textid', $article->getTextId(), PDO::PARAM_INT);
            $updateStatement->bindValue(':imageid', $article->getTextImageId(), PDO::PARAM_INT);
            $updateStatement->bindValue(':textTitleId', $article->getTextTitleId(), PDO::PARAM_INT);
            $updateStatement->bindValue(':category', $article->getCategoryId(), PDO::PARAM_INT);
            $updateStatement->bindValue(':tid', $article->getTextTitleId(), PDO::PARAM_INT);
            $updateStatement->bindValue(':id', $article->getTextTitleId(), PDO::PARAM_INT);


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


    // Diğer işlemleri (delete, update, getById vb.) de buraya ekleyebilirsiniz.
}

