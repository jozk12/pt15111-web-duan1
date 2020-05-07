<?php
    define('BASE_URL','http://localhost/pt15111-web-duan1/');
    define('ADMIN_URL', BASE_URL. 'admin/');
    define('PUBLIC_URL', BASE_URL. 'public/');
    define('ADMIN_ASSET_URL', BASE_URL . 'public/admin/');
    define('THEME_ASSET_URL', BASE_URL . 'public/grandium/');
    define('LOGIN_THEME_ASSET_URL', BASE_URL . 'public/logintheme/');
    define('REG_THEME_ASSET_URL',BASE_URL.'public/registertheme');
    define('DEFAULT_IMAGE', BASE_URL . 'public/images/default-image.jpg');
    define('AUTH', 'AUTH_SESSION');
    define('BOOK', 'BOOK_SESSION');

    function getdbConn(){
        try{
            $host = "127.0.0.1";
            $dbname = "duan1_db";
            $dbusername = "root";
            $dbpass = "";

            $connect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$dbusername,$dbpass);
            return $connect;
        } catch(Exception $ex){
            var_dump($ex->getMessage());
            die;
        }
    }

    function queryExecute($sql, $fetchAll = false){
        $conn = getdbConn();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if($fetchAll){
            $data = $stmt->fetchAll();
        }else{
            $data = $stmt->fetch();
        }
        return $data;
    }

    function checkAdminLoggedIn(){
        if(!isset($_SESSION[AUTH]) || $_SESSION[AUTH] == null || count($_SESSION[AUTH]) == 0){
            header('location: '.BASE_URL . 'login.php?msg=Hãy đăng nhập');
            die;
        }
        if($_SESSION[AUTH]['role_id'] < 2){
            header('location: '. BASE_URL . 'index.php?msg=Bạn không có quyền truy cập');
            die;
        }
    }

    function dd($data){
        echo "<pre>";
        var_dump($data);
        die;
    }
