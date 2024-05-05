<?php

// Spesifikasyon arayüzü
interface Specification
{
    public function isSatisfiedBy($item);

    public function getCondition();

    public function getParameters();
}

// ID'ye göre filtreleme spesifikasyonu
class IdSpecification implements Specification
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function isSatisfiedBy($item)
    {
        return $item['id'] == $this->id;
    }

    public function getCondition()
    {
        return "id = :id";
    }

    public function getParameters()
    {
        return [':id' => $this->id];
    }
}

// Article sınıfı
class SpecificationArticle
{
    private $id;
    private $title;
    private $content;
    private $image;
    private $category;
    private  $timestap;

    public function __construct($id, $title, $content,$image,$category,$timestap)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
        $this->category=$category;
        $this->timestap = $timestap;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getCategory()
    {
        return $this->category;
    }
    public  function  getTimeStap()
    {
        return $this->timestap;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }
}

// ArticleRepository sınıfı
class ArticleRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findArticlesBySpecification(Specification $specification)
    {
        $result = [];

        // PDO kullanarak veritabanından veri çekme işlemi
        $stmt = $this->pdo->prepare("SELECT * FROM article WHERE " . $specification->getCondition());
        $stmt->execute($specification->getParameters());
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            $article = new SpecificationArticle($row['id'], $row['textTitleId'], $row['textId'], $row['textImageId'], $row['categoryId'],$row['createdtime']);
            $result[] = $article;
        }

        return $result;
    }
}


?>
