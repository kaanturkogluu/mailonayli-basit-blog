<?php

class  Categories
{
    private $categoryId;
    private $category;

    function getCategory()
    {
        return $this->category;

    }

    function getCategoryId()
    {
        return $this->categoryId;
    }

    function setCategory($category)

    {
        $this->category = $category;

    }

    function setCategoryId($catid)
    {
        $this->categoryId = $catid;
    }
}



class CategoriesMap
{

    private $db;

    public function __construct( $dbConnection)
    {
        $this->db = $dbConnection;
    }
    function add(Categories $article)
    {
        try {
            $this->db->beginTransaction();

            // SQL sorgusunu hazırla
            $addStatement = $this->db->prepare('INSERT INTO categories(categoryName) VALUES(:at)');

            // Parametreleri bağla
            $addStatement->bindValue(':at', strtoupper($article->getCategory()), PDO::PARAM_STR);

            // Sorguyu çalıştır
            $addStatement->execute();

            // PDO işlemi tamamlandı, değişiklikleri kaydet
            $this->db->commit();

            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            // Hata durumunda işlemleri geri al
            $this->db->rollBack();

            // Hata mesajını göster
            echo $e->getMessage();

            return false;
        }
    }
    function getCategoryById(Categories $article)
    {
        // SQL sorgusunu hazırla
        $getStatement = $this->db->prepare('SELECT categoryName FROM categories WHERE id = :id');
        $getStatement->bindValue(':id',$article->getCategoryId(), PDO::PARAM_INT);


        $getStatement->execute();


        $results = $getStatement->fetchColumn();


        return $results;

    }
    function delete(Categories $article)
    {
        try {
            $this->db->beginTransaction();

            // SQL sorgusunu hazırla
            $deleteStatement = $this->db->prepare('DELETE FROM categories WHERE id=:id');

            // Parametreleri bağla
            $deleteStatement->bindValue(':id', $article->getCategoryId(), PDO::PARAM_INT);

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

    function update(Categories $article)
    {
        try {
            $this->db->beginTransaction();

            // SQL sorgusunu hazırla
            $updateStatement = $this->db->prepare('UPDATE categories SET categoryName=:at WHERE id=:id');

            // Parametreleri bağla
            $updateStatement->bindValue(':at', $article->getCategory(), PDO::PARAM_STR);
            $updateStatement->bindValue(':id', $article->getCategoryId(), PDO::PARAM_INT);

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


    function getAllCategories()
    {
        try {
            $query = "SELECT * FROM categories";

            // Sorguyu çalıştır
            $statement = $this->db->prepare($query);
            $statement->execute();

            // Sonuçları al
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch (PDOException $e) {
            return false;
        }

    }
}
