<?php
session_start();
define('ROOT_URL', 'http://localhost/Hospital_portal/');
$connect = mysqli_connect('localhost', 'root', 'secret', 'hospital_portal');
if(isset($_SESSION['user_id'])) {
    $id = filter_var($_SESSION['user_id'], FILTER_SANITIZE_NUMBER_INT) ;
$query = "SELECT file  FROM patients where id = $id ";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0){
$avatar = mysqli_fetch_assoc($result);
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arima:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/styles.css">
    <title>Hospital Management System</title>
</head>
<body>
<nav>
        <div class="container navcont">
                <a href="<?= ROOT_URL ?>index.php" class="logo">Hospital website</a>
                <ul class="nav-items">
                    <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
                    <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
                    <li><a href="<?= ROOT_URL ?>hms/patient_profile.php">My Profile</a></li>
                    <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li>
                    <?php if(isset($_SESSION['user_id'])) :  ?>     
                            <ul>
                                <li><a href="<?= ROOT_URL ?>hms/dashboard.php">Dashboard</a></li>
                                <li><a href="<?= ROOT_URL ?>logout.php">Log out</a></li>
                            </ul>
                    </li>
                    <?php else: ?>
                        <li><a href="<?= ROOT_URL ?>login.php">Signin</a></li>
                    <?php endif ?>     
                </ul>
                <button id="open"></button>
                <button id="close"></button>
        </div>
    </nav>

