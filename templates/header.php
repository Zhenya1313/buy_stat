<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Buy Cow</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/init.js"></script>
</head>
<body>
<?require_once($_SERVER["DOCUMENT_ROOT"].'/Classes/Main.php');?>
<?include ($_SERVER["DOCUMENT_ROOT"].'/templates/menu.php')?>
<? if(strpos($_SERVER['REQUEST_URI'], 'admin') && !Main::isAdmin()){
    header("Location: /");
    die();
};?>
<div class="container">
