<?php
ob_start();
$host = "localhost";
$user = "root";
 $password ="";
 $database ="labhealth";
$mycon=mysqli_connect($host,$user,$password);
if (!$mycon){
    echo 'error'.  die();
}  else {
   // echo 'alert...';
    $getdb = mysqli_select_db($mycon,$database);
    if (!$getdb){
    echo 'error'.  die();

} else {
    // echo 'alert...oooo';
}
}
