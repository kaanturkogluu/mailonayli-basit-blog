<?php
if(isset($_GET['out']) && $_GET['out']==1){


    $_SESSION=array();
    session_destroy();
    header('Location: ../../giris.php?out=1');

}