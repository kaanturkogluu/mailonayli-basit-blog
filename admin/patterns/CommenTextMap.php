<?php
class CommentText
{
    private $commentText;
    private $commentTextId;

    function getCommentText()
    {
        return $this->commentText;
    }

    function setCommentText($commentText)
    {
        $this->commentText = $commentText;
    }

    function getCommentTextId()
    {
        return $this->commentTextId;
    }

    function setCommentTextId($id)
    {
        $this->commentTextId = $id;
    }
}


class CommentTextMap
{
    private $db;

    public function __construct( $dbConnection)
    {
        $this->db = $dbConnection;
    }

    function add(CommentText $article)
    {
        try {


            // SQL sorgusunu hazırla
            $addStatement = $this->db->prepare('INSERT INTO commentText(commentText) VALUES(:at)');

            // Parametreleri bağla
            $addStatement->bindValue(':at', $article->getCommentText(), PDO::PARAM_STR);

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

    function delete(CommentText $article)
    {
        try {
            $this->db->beginTransaction();

            // SQL sorgusunu hazırla
            $deleteStatement = $this->db->prepare('DELETE FROM commenttext WHERE id=:id');

            // Parametreleri bağla
            $deleteStatement->bindValue(':id', $article->getCommentTextId(), PDO::PARAM_INT);

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

    function update(CommentText $article)
    {
        try {
            $this->db->beginTransaction();

            // SQL sorgusunu hazırla
            $updateStatement = $this->db->prepare('UPDATE commenttext SET commentText=:at WHERE id=:id');

            // Parametreleri bağla
            $updateStatement->bindValue(':at', $article->getCommentText(), PDO::PARAM_STR);
            $updateStatement->bindValue(':id', $article->getCommentTextId(), PDO::PARAM_INT);

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
}
