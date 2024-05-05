
<?php 
class Config{
    private static $dbConfig = array(
        'host'=>'localhost', 
        'username'=>'root',
        'password'=>'',
        'database'=>'blog'

    );
    public static function getDbConfig(){
        return self::$dbConfig;
    }
}

?>