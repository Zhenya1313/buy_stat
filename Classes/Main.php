<?php

require_once ($_SERVER["DOCUMENT_ROOT"].'/settings.php');

class Main
{
    public static function registerUser($data){
        if (!$data){
            return false;
        }

        $username = $data['username'];
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $date = date('Y-m-d');

        $query = "INSERT INTO users (username, email, password, register) VALUES ('$username', '$email', '$password', '$date')";

        if(!DB()->query($query)){
            echo  json_encode(['status'=> false, 'msg' => 'Register failed']);
        } else {
            echo json_encode(['status'=> true]);
        }
    }

    public static function logInUser($data){
        if (!$data){
            return false;
        }

        $email = $data['email'];
        $password = $data['password'];

        $query = "SELECT * FROM users WHERE email='$email'";
        $result = DB()->query($query);
        if($result->num_rows == 1) {
            $select = "SELECT * FROM `users` WHERE email = '$email'";
            $user = DB()->query($select)->fetch_object();

            if(password_verify($password, $user->password)) {
                $_SESSION['user_id'] = $user->id;
                if ($_SESSION['user_id']) {
                    echo json_encode(['status' => true]);
                }
            } else {
                echo json_encode(['status'=>false,'msg'=>'Login fails.']);
            }
        } else {
            echo json_encode(['status'=>false,'msg'=>'User not found']);
        }
    }

    public static function logOut(){
        session_start();
        session_destroy();
        header('Location: login.php');
        exit();
    }

    public static function buyCow(){
        $date = date('Y-m-d');

        $query = "SELECT * FROM order_cow WHERE date = '$date'";
        $user_id = $_SESSION['user_id'];
        $result = DB()->query($query);
        if($result->num_rows > 0) {
            $update = "UPDATE order_cow SET buy_count = buy_count + 1 WHERE date = '$date'";
            DB()->query($update);
        } else {
            $insert = "INSERT INTO order_cow (date, buy_count) VALUES ('$date', 1)";
            DB()->query($insert);
        }
        echo json_encode(['status' => true]);
    }

    public static function downloadFile(){
        $date = date('Y-m-d');

        $user_id = $_SESSION['user_id'];

        $query = "SELECT * FROM download WHERE user_id = '$user_id'";

        $result = DB()->query($query);
        if($result->num_rows > 0) {
            $update = "UPDATE download SET download_count = download_count + 1 WHERE date = '$date'";
            DB()->query($update);
        } else {
            $insert = "INSERT INTO download (date, download_count, user_id) VALUES ('$date', 1, '$user_id')";
            DB()->query($insert);
        }
        echo json_encode(['status' => true]);
    }

    public static function isAdmin(){
        if (self::isAuth()) {
            $id = $_SESSION['user_id'];
            $query = "SELECT * FROM users WHERE id='$id'";
            $user = DB()->query($query)->fetch_object();
            if ($user->group == 'admin'){
                return true;
            }
        }

        return false;
    }

    public static function isAuth(){
        if ($_SESSION['user_id']){
            return true;
        }
        return false;
    }

    public static function pageViews($page_name){
        $date = date('Y-m-d');

        $user_id = $_SESSION['user_id'];

        $query = "SELECT * FROM page_views WHERE user_id = '$user_id' AND page_name = '$page_name'";

        $result = DB()->query($query);
        if($result->num_rows > 0) {
            $update = "UPDATE page_views SET views = views + 1 WHERE date = '$date' AND page_name = '$page_name'";
            DB()->query($update);
        } else {
            $insert = "INSERT INTO page_views (date, page_name, views, user_id) VALUES ('$date', '$page_name', 1, '$user_id')";
            DB()->query($insert);
        }
    }

    public static function reportsPage($sql){
        $result = DB()->query($sql);

        if ($result->num_rows > 0) {
            $data = [];
            while($row = $result->fetch_object()) {
                $data['date'][] = $row->date;
                $data['views'][] = $row->views?:$row->buy_count?:$row->download_count;
            }

            return $data;
        } else {
            return false;
        }
    }
}