<?php include './includes/db.php';
include "./includes/functions.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
    <title>Story</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/post_style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="index.php" class="navbar-brand"><img class="logo" src="images/logo.png" alt="" /></a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navIcon">
                <i class="bi bi-three-dots"></i>
            </button>

            <div class="collapse navbar-collapse" id="navIcon">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link">হোম</a></li>
                    <li class="nav-item"><a href="" class="nav-link">গল্পগুচ্ছ</a></li>
                    <li class="nav-item">
                        <a href="" class="nav-link">বৈজ্ঞানিক কল্পকাহিনি</a>
                    </li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">যোগাযোগ</a></li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link"><i class="bi bi-person"></i> সাইন ইন</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>