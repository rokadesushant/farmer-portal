<?php

include('database.php');
    
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($link,"select username from buyer where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];

   $sesid = mysqli_query($link,"select buyerid from buyer where username = '$user_check'");

   $row1=mysqli_fetch_array($sesid,MYSQLI_ASSOC);

   $rowid=$row1['buyerid'];




   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>