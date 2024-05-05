<?php

// Data Map pattern Design
class ArticleImage
{
    private $image;
    private $articleImageId;
    private $articleImagePath;
    private $imageName;

    function getImageName()
    {
        return $this->imageName;
    }

    function getImage()
    {
        return $this->image;
    }

    function setImage($img)
    {
        $this->image = $img;
    }


    function getImagePath()
    {
        return $this->articleImagePath;

    }

    function getArticleImageId()
    {
        return $this->articleImageId;
    }

    function setArticleImagePath($imgpath)
    {
        $this->articleImagePath = $imgpath;

    }

    function setArticleImageId($imgId)
    {
        $this->articleImageId = $imgId;
    }

    function setImageName($imgName)
    {
        $this->imageName = $imgName;
    }

}

class  ArticleImageMap
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    function add(ArticleImage $articleImage)
    {
        try {


            // SQL sorgusunu hazırla
            $addStatement = $this->db->prepare('INSERT INTO image(imagePath,imageName) VALUES(:path,:imgName)');

            // Parametreleri bağla
            $addStatement->bindValue(':path', $articleImage->getImagePath(), PDO::PARAM_STR);
            $addStatement->bindValue(':imgName', $articleImage->getImageName(), PDO::PARAM_STR);

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

    function update(ArticleImage $articleImage)
    {
        try {
            $this->db->beginTransaction();

            // SQL sorgusunu hazırla
            $updateStatement = $this->db->prepare('UPDATE image SET imagePath=:path , imageName=:imgName WHERE id=:id');

            // Parametreleri bağla
            $updateStatement->bindValue(':path', $articleImage->getImagePath(), PDO::PARAM_STR);
            $updateStatement->bindValue(':imgName', $articleImage->getImageName(), PDO::PARAM_STR);
            $updateStatement->bindValue(':id', $articleImage->getArticleImageId(), PDO::PARAM_INT);

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

    function delete(ArticleImage $articleImage)
    {
        try {
            $this->db->beginTransaction();

            // SQL sorgusunu hazırla
            $deleteStatement = $this->db->prepare('DELETE FROM image WHERE id=:id');

            // Parametreleri bağla
            $deleteStatement->bindValue(':id', $articleImage->getArticleImageId(), PDO::PARAM_INT);

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

    function uploadImage(ArticleImage $articleImage)
    {
        try {


            $uploadDir = '../assets/img/'; // Yüklenecek dosyanın dizini

            // Rasgele bir dosya adı oluştur
            $randomFileName = md5(uniqid(rand(), true)) . '.' . pathinfo($articleImage->getImage()['name'], PATHINFO_EXTENSION);
            // Yüklenen dosyayı belirlenen dizine taşı
            if (move_uploaded_file($articleImage->getImage()['tmp_name'], $uploadDir . $randomFileName)) {

                // SQL sorgusunu hazırla
                $addStatement = $this->db->prepare('INSERT INTO image(imagePath, imageName) VALUES(:path, :imgName)');

                // Parametreleri bağla
                $addStatement->bindValue(':path', $uploadDir . $randomFileName, PDO::PARAM_STR);
                $addStatement->bindValue(':imgName', $randomFileName, PDO::PARAM_STR);

                // Sorguyu çalıştır
                $addStatement->execute();

                // PDO işlemi tamamlandı, değişiklikleri kaydet


                return $this->db->lastInsertId();
            } else {
                echo "Dosya yüklenirken bir hata oluştu.\n";
                return false;
            }
        } catch (PDOException $e) {
            // Hata durumunda işlemleri geri al
            $this->db->rollBack();

            // Hata mesajını göster
            echo $e->getMessage();

            return false;
        }
    }

    function getImageById(ArticleImage $imageId)
    {
        // SQL sorgusunu hazırla
        $getStatement = $this->db->prepare('SELECT imagePath FROM image WHERE id = :id');
        $getStatement->bindValue(':id', $imageId->getArticleImageId(), PDO::PARAM_INT);


        $getStatement->execute();


        $results = $getStatement->fetchColumn();


        return $results;

    }


}


