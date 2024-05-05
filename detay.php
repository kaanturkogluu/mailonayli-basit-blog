<?php require_once 'admin/PatternsCombine.php';
require_once 'admin/patterns/Specification.php';
require_once 'admin/patterns/CommandsMap.php'; ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET['invalidComment']) && $_GET['invalidComment'] == 1) {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            sureliBasarisizMesajiGoster('Yorum Yapmak için Oturum Acın / Cıkıs Yapıp Tekrardan Oturum Acın', 3000);
        });
    </script>
    <?php
}
if (isset($_GET['validComment']) && $_GET['validComment'] == 1) {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            bilgiMesaji('Yorum Başarıyla Eklendi');
        });
    </script>
    <?php
}

?>
<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Revolve - Personal Magazine blog Template</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

    <!-- THEME CSS
	================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <!-- Themify -->
    <link rel="stylesheet" href="plugins/themify/css/themify-icons.css">
    <link rel="stylesheet" href="plugins/slick-carousel/slick-theme.css">
    <link rel="stylesheet" href="plugins/slick-carousel/slick.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="plugins/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="plugins/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="plugins/magnific-popup/magnific-popup.css">
    <!-- manin stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sweetalert2.css">
    <script src="js/sweetalert2.all.min.js"></script>
</head>

<body>


<header class="header-top bg-dark  navigation-dark">
    <nav class="navbar navbar-expand-lg navigation">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul id="menu " class="menu navbar-nav ">


                    <?php if($_SESSION['status']==1){
                        echo'<li class="nav-item"><a href="index.php" class="nav-link">ana sayfa</a></li>';

                    }else{
                        echo'<li class="nav-item"><a href="guest.php" class="nav-link">ana sayfa</a></li>';
                    } ?>

                    <li class="nav-item dropdown  pl-0">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Diller
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            if(session_status()===PHP_SESSION_NONE){
                                session_start();
                            }
                            require_once 'admin/patterns/DataBaseConnection.php';

                            require_once 'admin/patterns/CategoriesMap.php';
                            $conn = DataBaseConnection::getInstance()->getConnection();
                            $categoryMap = new CategoriesMap($conn);
                            $allCategories = $categoryMap->getAllCategories();
                            if ($allCategories) {
                                foreach ($allCategories as $category) {
                                    echo '<a class="dropdown-item"  style="border-bottom: 1px solid white;" href="kategori.php?categoryid=' . $category['id'] . '"> ' . $category['categoryName'] . '</a>';

                                }
                            }

                            ?>

                        </div>
                    </li>


                    <?php
                    if (!isset($_SESSION['userId'])) {
                        ?>
                        <li class="nav-item ml-auto " style="text-align: end;"><a href="giris.php" id="giris"
                                                                                  class="nav-link"
                                                                                  style="text-align: end;">Giriş/Kayıt</a>
                        </li>


                    <?php }else{ ?>
                        <li class="nav-item ml-auto " style="text-align: end;"><a href="admin/routes/logoutroutes.php?out=1"
                                                                                  class="nav-link"
                                                                                  style="text-align: end;">Çıkış Yap</a>
                        </li>
                    <?php }


                    ?>

                </ul>


            </div>


        </div>
    </nav>
</header>

<!--search overlay start-->
<div class="search-wrap">
    <div class="overlay">
        <form action="#" class="search-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-9">
                        <input type="text" class="form-control" placeholder="Search..."/>
                    </div>
                    <div class="col-md-2 col-3 text-right">
                        <div class="search_toggle toggle-wrap d-inline-block">
                            <i class="ti-close"></i>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--search overlay end-->

<section class="single-block-wrapper section-padding">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <?php
                if (isset($_GET['postid'])) {

                    $conn = DataBaseConnection::getInstance()->getConnection();
                    $repository = new ArticleRepository($conn);
                    $article = new ArticleMap($conn);
                    $data = $article->getAllArticle();

                    // resim siniifi
                    $image = new ArticleImage();
                    $imageMap = new ArticleImageMap($conn);

                    //baslik sınıfı
                    $title = new ArticleTitle();
                    $titleMap = new ArticleTitleMap($conn);
                    //text sınıfı
                    $text = new ArticleText();
                    $textMap = new ArticleTextMap($conn);
                    // category
                    $category = new Categories();
                    $categoryMap = new CategoriesMap($conn);


                    $idSpecification = new IdSpecification($_GET['postid']);
                    $filteredArticles = $repository->findArticlesBySpecification($idSpecification);


                    foreach ($filteredArticles as $article) {
                        $image->setArticleImageId($article->getImage());
                        $imagePath = $imageMap->getImageById($image);

                        $imagePath = substr_replace($imagePath, 'admin', 0, 2);
                        $title->setArticleTitleId($article->getTitle());
                        $titleContent = $titleMap->getTitleById($title);
                        $text->setArticleTextId($article->getContent());

                        $textcontent = $textMap->getTextById($text); // getTextBYID yerine getTextById düzeltildi

                        $category->setCategoryId($article->getCategory());
                        $cat = $categoryMap->getCategoryById($category);

                        $inputDate = $article->getTimeStap();

// DateTime nesnesi oluştur
                        $dateTime = new DateTime($inputDate);

// Yeni tarih formatı
                        $formattedDate = $dateTime->format("F j, Y");

                        ?>
                        <div class="single-post">
                            <div class="post-header mb-5 text-center">
                                <div class="meta-cat">
                                    <a class="post-category font-extra text-color text-uppercase font-sm letter-spacing-1"
                                       href="#" onclick="event.preventDefault()"> <?= $cat ?></a>

                                </div>
                                <h2 class="post-title mt-2">
                                    <?= $titleContent ?>
                                </h2>

                                <div class="post-meta">
                                    <span class="text-uppercase font-sm letter-spacing-1 mr-3">Yazar : Mustafa Dirlikli</span>
                                    <span class="text-uppercase font-sm letter-spacing-1"><?= $formattedDate?></span>
                                </div>

                                <div class="post-featured-image mt-5">
                                    <img src="<?= $imagePath ?>" class="img-fluid w-100" alt="featured-image">
                                </div>

                            </div>
                            <div class="post-body">
                                <div class="entry-content">
                                    <p> <?= $textcontent ?></p>
                                </div>

                                <div class="post-tags py-4">
                                    <a href="#"># <?= $cat ?></a>

                                </div>
                                <div class="post-tags py-4">
                                    <a onclick="goBack()" class="btn btn-danger">GERİ DÖN</a>

                                    <script>
                                        function goBack() {
                                            window.history.back();
                                        }
                                    </script>
                                </div>

                            </div>
                        </div>
                        <?php

                    }
                }
                ?>


                <div class="comment-area my-5">
                    <?php
                    $comment = new Commands();
                    $commentMap = new CommandsMap(DataBaseConnection::getInstance()->getConnection());
                    $comment->setCommandArticleId($_GET['postid']);
                    $data = $commentMap->getCommentsForArticle($comment);

                    echo ' <h3 class="mb-4 text-center ">' . count($data) . ' YORUM</h3>';

                    foreach ($data as $dt) {
                        echo '   <div class="comment-area-box media border-bottom mb-1">  ';
                        echo '      <img alt="" src="images/blog-user-2.jpg" class="img-fluid float-left mr-3 mt-2">';

                        echo '      <div class="media-body ml-4">';
                        echo '          <h4 class="mb-0">' . ucfirst($dt['name']) . ' ' . ucfirst($dt['surname']) . ' </h4>';
                        echo '  <span class="date-comm font-sm text-capitalize text-color"><i';
                        echo '          class="ti-time mr-2"></i>June 7, 2019 </span>';
                        echo '   <div class="comment-content mt-3"> <p>' . $dt['commentText'] . '</p> </div>';
                        echo '  </div>';
                        echo ' </div>';
                    }
                    ?>


                </div>


                <form class="comment-form mb-5 gray-bg p-5" action="admin/routes/commentRoutes.php" method="post"
                      id="comment-form">
                    <h3 class="mb-4 text-center"> Yorum Yap</h3>
                    <div class="row">
                        <input type="hidden" name="postid" value="<?= $_GET['postid'] ?>">
                        <div class="col-lg-12">
                                <textarea class="form-control mb-3" name="comment" id="comment" cols="30" rows="5"
                                          placeholder="Düşüncelerinizi Bildirin"></textarea>
                        </div>


                        <input class="btn btn-primary" type="submit" name="commentshare" id="submit_contact"
                               value="Yorum Yap">
                </form>


            </div>


            <script src="js/mesaj.js"></script>

        </div>
    </div>
</section>
<!--footer start-->
<section class="footer-2 section-padding gray-bg pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="subscribe-footer text-center">
                    <div class="form-group mb-0">
                        <h2 class="mb-3">Gelişmelerden Haberdar Olmak İçin Takipte Kalın</h2>
                        <p class="mb-4">Daha Fazlası İçin Takipte Kalın
                        <p>

                    </div>
                </div>
            </div>
        </div>

        <div class="footer-btm mt-5 pt-4 border-top">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline footer-socials-2 text-center">
                        <li class="list-inline-item"><a href="#">Anasayfa</a></li>
                        <?php
                        if (!isset($_SESSION['userId'])) {
                            ?>
                            <li class="nav-item ml-auto " style="text-align: end;"><a href="giris.html" id="giris"
                                                                                      class="nav-link"
                                                                                      style="text-align: end;">Giriş/Kayıt</a>
                            </li>


                        <?php }else{ ?>
                            <li class="nav-item ml-auto " style="text-align: end;"><a href="admin/routes/logoutroutes.php?out=1"
                                                                                      class="nav-link"
                                                                                      style="text-align: end; color: red;">Çıkış Yap</a>
                            </li>
                        <?php }


                        ?>



                    </ul>
                </div>
            </div>
            <!--	<div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="copyright text-center ">
                        @ copyright all reserved to <a href="https://themefisher.com/">themefisher.com</a>-2019
                        Distribution <a href="https://themewagon.com">ThemeWagon.</a></p>
                    </div>-->
        </div>
    </div>
    </div>
    </div>
</section>
<!--footer end-->

<!-- THEME JAVASCRIPT FILES
================================================== -->
<!-- initialize jQuery Library -->
<script src="plugins/jquery/jquery.js"></script>
<!-- Bootstrap jQuery -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/bootstrap/js/popper.min.js"></script>
<!-- Owl caeousel -->
<script src="plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="plugins/slick-carousel/slick.min.js"></script>
<script src="plugins/magnific-popup/magnific-popup.js"></script>
<!-- Instagram Feed Js -->
<script src="plugins/instafeed-js/instafeed.min.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script src="plugins/google-map/gmap.js"></script>
<!-- main js -->
<script src="js/custom.js"></script>
<script src="js/mesaj.js.js"></script>


</body>

</html>