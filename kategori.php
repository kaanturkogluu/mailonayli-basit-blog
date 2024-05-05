<?php
require_once 'admin/PatternsCombine.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

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
</head>

<body>
<!-- Preloader -->
<div class="preloader-container" id="preloader">
    <div class="preloader"></div>
</div>
<!----->
<div class="header-instagra">
    <div class="container-fluid p-0">
        <div class="row no-gutters" id="instafeed">
        </div>
    </div>
</div>

<header class="header-top bg-dark  navigation-dark">
    <nav class="navbar navbar-expand-lg navigation">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul id="menu " class="menu navbar-nav ">

                    <?php if ($_SESSION['status'] == 1) {
                        echo '<li class="nav-item"><a href="index.php" class="nav-link">ana sayfa</a></li>';

                    } else {
                        echo '<li class="nav-item"><a href="guest.php" class="nav-link">ana sayfa</a></li>';
                    } ?>
                    <li class="nav-item dropdown  pl-0">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Diller
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php

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
                        <li class="nav-item ml-auto " style="text-align: end;"><a href="giris.html" id="giris"
                                                                                  class="nav-link"
                                                                                  style="text-align: end;">Giriş/Kayıt</a>
                        </li>


                    <?php } else { ?>
                        <li class="nav-item ml-auto " style="text-align: end;"><a
                                    href="admin/routes/logoutroutes.php?out=1"
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


<section class="section-padding pt-4">
    <div class="container">
        <div class="row col-12">
            <div class=" akis   col-lg-9 col-md-8  rounded" style=" text-align:center;">


                <style>.row {
                        display: flex;
                        flex-wrap: wrap;
                    }

                    .post-grid {
                        width: 100%; /* Sütunun genişliğini ayarlayın, örneğin yüzde olarak veya piksel olarak */
                        display: flex;
                        flex-direction: column;
                    }

                    .post-thumb img {
                        width: 100%; /* Resmi sütunun genişliğine sığdırın */
                        max-height: 400px; /* Resmin maksimum yüksekliğini ayarlayın */
                        object-fit: cover; /* Resmi orantılı olarak sığdırın */
                    }
                </style>
                <div class="row">
                    <div class="gonderi mb-5 container mt-2 rounded  ">

                    </div>
                    <?php

                    $conn = DataBaseConnection::getInstance()->getConnection();
                    $article = new ArticleMap($conn);
                    $articleClass = new Article();
                    $articleClass->setCategoryId($_GET['categoryid']);

                    $data = $article->getCategoriedrticle($articleClass);

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

                    if (count($data) > 0) {

                        foreach ($data as $dt) {
                            $image->setArticleImageId($dt['textImageId']);
                            $imagePath = $imageMap->getImageById($image);
                            $imagePath = substr_replace($imagePath, 'admin', 0, 2);
                            $title->setArticleTitleId($dt['textTitleId']);
                            $titleContent = $titleMap->getTitleById($title);
                            $text->setArticleTextId($dt['textId']);

                            $textcontent = $textMap->getTextById($text); // getTextBYID yerine getTextById düzeltildi

                            $category->setCategoryId($dt['categoryId']);
                            $cat = $categoryMap->getCategoryById($category);
                            ?>
                            <div class="col-lg-9">
                                <article class="post-grid mb-5">
                                    <a class="post-thumb mb-4 d-block" href="detay.php?postid=<?= $dt['id'] ?>">
                                        <img src="<?= str_replace('../admin/', '', $imagePath); ?>" alt=""
                                             class="img-fluid">

                                    </a>
                                    <span class="font-sm text-color letter-spacing text-uppercase post-meta font-extra"> <?= $cat ?></span>
                                    <h3 class="post-title mb-1 mt-2"><a
                                                href="detay.php?postid=<?= $dt['id'] ?>"><?= $titleContent ?></a></h3>
                                    <div class="post-content mt-4">
                                        <p>
                                            <?php
                                            // İlk 10 kelimeyi al
                                            $words = explode(' ', $textcontent);
                                            $firstTenWords = implode(' ', array_slice($words, 0, 10));

                                            // Eğer toplam kelime sayısı 10'dan büyükse sonuna "..." ekleyin
                                            echo (count($words) > 10) ? $firstTenWords . '...' : $firstTenWords;
                                            ?>
                                        </p>
                                    </div>
                                </article>
                            </div>
                        <?php }
                    }else{ ?>
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Özür Dileriz</h5>
                                        <p class="card-text">Henüz paylaşım yapılmamıştır. Lütfen daha sonra tekrar kontrol ediniz.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>


            </div>

            <div class="kprofil mt-5 h-25 col-lg-3 col-md-4 col-sm-12 col-xs-12">
                <div class="sidebar sidebar-right">
                    <div class="sidebar-wrap mt-5 mt-lg-0">
                        <div class="sidebar-widget about mb-5 text-center p-3">
                            <div class="about-author">
                                <img src="images/author.jpg" alt="" class="img-fluid">
                            </div>
                            <h4 class="mb-0 mt-4">Mustafa Dirlikli</h4>
                            <p>Yazılım Mühendsiliği</p>
                            <p>Sadece Okulu bitirmeye çalışıyoruz </p>
                            <blockquote>
                                <i class="ti-quote-left mr-2"></i>Nolur Bizi Mezun Edin<i
                                        class="ti-quote-right ml-2"></i>
                            </blockquote>
                        </div>

                        <div class="sidebar-widget follow mb-5 text-center">
                            <h4 class="text-center widget-title">Follow Me</h4>
                            <div class="follow-socials">
                                <a href="#"><i class="ti-facebook"></i></a>
                                <a href="#"><i class="ti-twitter"></i></a>
                                <a href="#"><i class="ti-instagram"></i></a>
                                <a href="#"><i class="ti-youtube"></i></a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
                            <li class="nav-item ml-auto " style="text-align: end;"><a href="giris.php" id="giris"
                                                                                      class="nav-link"
                                                                                      style="text-align: end;">Giriş/Kayıt</a>
                            </li>


                        <?php } else { ?>
                            <li class="nav-item ml-auto " style="text-align: end;"><a
                                        href="admin/routes/logoutroutes.php?out=1"
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
<!---preloading-->
<script>
    // Sayfa yüklendiğinde preloader'ı gizle ve içeriği göster
    window.addEventListener('load', function () {
        document.getElementById("preloader").style.display = "none";
        document.getElementById("content").style.display = "block";
    });
    window.onbeforeunload = function () {
        document.getElementById("preloader").style.display = "flex";
        document.getElementById("content").style.display = "none";
    };
</script>
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
<!---->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>