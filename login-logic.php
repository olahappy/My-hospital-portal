<?php


include ('config/db.php');
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $password =$_POST['password'];

    $sql = "SELECT * FROM patients WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

            $_SESSION['username'] = $row['username'];

               $user_id =  $row['username'];
               $_SESSION['login'] = $_POST['username'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['is_admin'] = $row['is_admin'];
            if($row['is_admin'] == 1){
              
              header('Location: hms/dashboard.php');
              exit();
            } 
            elseif($row['is_admin'] == 0){
              header("Location: index.php" ); 
              
              exit();  
            }
        }else{
          $_SESSION['signin'] = "user not found!";
        }        
        if(isset($_SESSION['signin'])){
                  $_SESSION['signin-data'] = $_POST;
                  header('location:  login.php'); 
                  die();
              }
    }else{
      header('location:  login.php'); 
        // header("Location: login.php?error=Incorect User name or password");
        exit();

    }
?>