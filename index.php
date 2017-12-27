<?php
session_start();
$na=$_POST['user'];
$user=filter_var($na,FILTER_SANITIZE_STRING);
   if ($user!=="") {
       if ($_SERVER['REQUEST_METHOD'] == "POST") {

           $_SESSION['name'] = $user;
           if ($_SESSION['name']=="admin"){
               header("Refresh:5,url=adminpanel.php");
               echo "<h2 >Are You Ready !!!!" . $user . " You Are Redirect To Admin Pannel</h2>";
           }else {
            header("Refresh:5,url=quez.php");

               echo "<h2 >Are You Ready !!!!" . $user . " You Are Redirect To Quez</h2>";
           }

       } else {
           echo "Go To The Page <a href='index.html' >LogIn</a> TO Sign In";
       }
   }else
   {
       header("Refresh:5,url=index.html");
       echo "<h3>Pleaze Enter Your Name You Are Are Redirect To Sign Page To Enter Your Name</h3>";
    
   }

/*

[

  [

   'question' => 'what is is ?',
   'correctAnswer' => 'b',
   'answers' => [
       'a' => 'hopa',
       'b' => 'na',

   ] ,


  [

   'question' => 'what is is ?',
   'correctAnswer' => 'b',
   'answers' => [
       'a' => 'hopa',
       'b' => 'na',

   ]

  ] 
*/