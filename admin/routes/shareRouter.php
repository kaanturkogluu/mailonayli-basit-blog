<?php
include '../patterns/ArticleTitleMap.php';
include '../patterns/ArticleTextMap.php';
include '../patterns/ArticleImageMap.php';
include '../patterns/ArticleMap.php';
include "../patterns/DataBaseConnection.php";

try {
    if (isset($_POST['share'])) {
        // Veritabanı bağlantısını al
        $conn = DataBaseConnection::getInstance()->getConnection();






        // Gerekli verileri al
        $title = $_POST['title'];
        $content = $_POST['content'];
        $categoryId = $_POST['category'];

        // İçerik yazısı için gerekli işlemler
        $articleText = new ArticleText();
        $articleTextMap = new ArticleTextMap($conn);
        $articleText->setArticleText($content);
        $articleTextId = $articleTextMap->add($articleText);


        // Başlık eklenmesi için gerekli işlemler
        $titleclass = new ArticleTitle();
        $titleclass->setArticleTitle($title);
        $titleMap = new ArticleTitleMap($conn);
        $titleId = $titleMap->add($titleclass);


        // Article sınıfını oluştur ve değerleri ayarla
        $article = new Article();
        $article->setTextId($articleTextId);
        $article->setCategoryId($categoryId);
        $article->setTextTitleId($titleId);

        // Eğer resim yüklenmişse, resim işlemlerini yap
        if (isset($_FILES['image'])) {
            $image = $_FILES['image']; // Dosya bilgisini $_FILES dizisinden al

            // Resim eklenmesi için gerekli işlemler
            $imageclass = new ArticleImage();
            $imageclass->setImage($image);
            $imageclass->setImageName('a');
            $imageMap = new ArticleImageMap($conn);
            $imageId = $imageMap->uploadImage($imageclass);

            $article->setTextImageId($imageId);
        }

        // ArticleMap sınıfını oluştur ve makaleyi ekle
        $articleMap = new ArticleMap($conn);
        $articleMap->add($article);

       header('Location: ../../index.php?share=1');
    }
} catch (Exception $e) {
    echo "Hata oluştu: " . $e->getMessage();
}
?>
