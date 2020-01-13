<?php require 'params.php';
session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style/main.css">
    <title>ShortLink</title>
</head>
<body>
<div id="header" class="bg-dark text-white">
    <a href="/"><h1 class="text-left text-white align-middle float-left ml-1">ShortLink</h1></a>
    <ul class="nav justify-content-end">
            <?php //nav-panel
             if(isset($_SESSION['login']) && isset($_SESSION['password'])){ 
            ?>
        <li class="nav-item">
                <a class="nav-link text-white mt-1" href="admin">Admin</a>
        </li>
        <li class="nav-item">
           <a class="nav-link text-white mt-1" href="?logout=logout">Log out</a> 
        </li>       
    <?php if(isset($_GET['logout'])){
            session_destroy();
            header('Location: /');
            } ?>
  <?php }else{ ?>
        <li class="nav-item">
            <a class="nav-link text-white mt-1" href="login">Sign in</a>
  <?php } ?>
            
        </li>
    </ul>
</div>
