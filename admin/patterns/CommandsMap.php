<?php

class Commands
{
    private $commandId;
    private $commandUserId;
    private $commandArticleId;
    private $commandTextId;

    public function getCommandId()
    {
        return $this->commandId;
    }

    public function setCommandId($commandId)
    {
        $this->commandId = $commandId;
    }

    public function getCommandUserId()
    {
        return $this->commandUserId;
    }

    public function setCommandUserId($commandUserId)
    {
        $this->commandUserId = $commandUserId;
    }

    public function getCommandArticleId()
    {
        return $this->commandArticleId;
    }

    public function setCommandArticleId($commandArticleId)
    {
        $this->commandArticleId = $commandArticleId;
    }

    public function getCommandTextId()
    {
        return $this->commandTextId;
    }

    public function setCommandTextId($commandTextId)
    {
        $this->commandTextId = $commandTextId;
    }
}


class CommandsMap
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    public function add(Commands $commands)
    {
        try {
            $this->db->beginTransaction();

            // SQL sorgusunu hazırla
            $addStatement = $this->db->prepare('INSERT INTO comments(userId, articleId, commentTextId) VALUES(:userId, :articleId, :textId)');

            // Parametreleri bağla
            $addStatement->bindValue(':userId', $commands->getCommandUserId(), PDO::PARAM_INT);
            $addStatement->bindValue(':articleId', $commands->getCommandArticleId(), PDO::PARAM_INT);
            $addStatement->bindValue(':textId', $commands->getCommandTextId(), PDO::PARAM_INT);

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

    public function delete(Commands $commands)
    {
        try {
            $this->db->beginTransaction();

            // SQL sorgusunu hazırla
            $deleteStatement = $this->db->prepare('DELETE FROM comments WHERE id=:id');

            // Parametreleri bağla
            $deleteStatement->bindValue(':id', $commands->getCommandId(), PDO::PARAM_INT);

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

    public function update(Commands $commands)
    {
        try {
            $this->db->beginTransaction();

            // SQL sorgusunu hazırla
            $updateStatement = $this->db->prepare('UPDATE comments SET userId=:userId, articleId=:articleId, commentTextId=:textId WHERE id=:id');

            // Parametreleri bağla
            $updateStatement->bindValue(':userId', $commands->getCommandUserId(), PDO::PARAM_INT);
            $updateStatement->bindValue(':articleId', $commands->getCommandArticleId(), PDO::PARAM_INT);
            $updateStatement->bindValue(':textId', $commands->getCommandTextId(), PDO::PARAM_INT);
            $updateStatement->bindValue(':id', $commands->getCommandId(), PDO::PARAM_INT);

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

    public function getCommentsForArticle(Commands $commands)
    {
        $sql = "SELECT c.*, ct.commentText,u.name,u.surname FROM comments c 
            INNER JOIN commenttext ct ON c.commentTextId = ct.id
                           INNER JOIN users u ON c.userId =u.id 
            WHERE c.articleId = :articleId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':articleId', $commands->getCommandArticleId(), PDO::PARAM_INT);
        $stmt->execute();

        // FetchAll metodu ile tüm yorumları bir dizi olarak alabilirsiniz
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $comments;
    }


}



