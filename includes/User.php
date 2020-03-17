<?php
    include "init.php";

    include ($_SERVER['DOCUMENT_ROOT']. '/customClearance/models/User.php');
    include ($_SERVER['DOCUMENT_ROOT']. '/customClearance/models/Logistic.php');

    $user = new User();
    $logistic = new Logistic();

$key = "";
$methods = "";

if (!empty($_GET)) {
    // code...
    $key = $_GET["key"];
    $methods = $_GET["method"];
}else {
    // code...
    $key = "";
    $methods = "";

}





if ($methods == "insert" || $methods == "post"){
    $type = $_GET["type"];
    if($type =="logistic") {
        insertUserLogistic($key, $user);
    } elseif($type =="customer") {
        insertUserCustomer($key, $user);
    }
}
elseif ($methods == "selectall" || $methods == "getall"){
     $username = $_GET["username"];
    $password = $_GET["password"];
    $sql = "select id from customer where email='".$username."' and password ='".$password."'";
    if(count($user->getAllUserBySql($sql)[0]) > 0){
        $_SESSION["customer_user_id"] =  $user->getAllUserBySql($sql)[0]["id"];
        echo 1;
    }else{
        echo 0;
    }
}elseif ($methods == "select" || $methods == "get"){
    $id = $_GET["id"];
    if (!empty($id)) {
        echo json_encode($user->getUserById($id));
    }else{
        echo "Not there!";
    }
}


/***
 *  this is the controller method for inserting all school
 * into the database (dbname = add_new_school).
 * it check key value for auth, then also test for fields emptiness, then
 * send to mainModel for the real insertion. this method
 * then return success or failure after all process.
 * @Param Key,Logistic object
 ***/

function insertUserLogistic($key,$user){

    if ($key == "1234567opiuyt") {

        $Name = $_POST["name"];
        $companyName = $_POST["companyName"];
        $PhoneNumber = $_POST["PhoneNumber"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $address = $_POST["address"];


//        $documentPath = "";
//        $document = "";
//        $count_size = count($_FILES["myFiles"]["tmp_name"]);
//        $counts = 0;
//        foreach ($_FILES["myFiles"]["tmp_name"] as $myFile => $value) {
//            $targePath = "../models/forAllImage/".basename($_FILES["myFiles"]["name"][$myFile]);
//            $counts ++;
//            if($counts == $count_size){
//                $documentPath .= $targePath ;
//                $document .= basename($_FILES["myFiles"]["name"][$myFile]) ;
//            }else {
//                $documentPath .= $targePath . ",";
//                $document .= basename($_FILES["myFiles"]["name"][$myFile]) . ",";
//            }
//            move_uploaded_file($value, $targePath);
//        }

        if (
            empty($Name)
            ||empty($companyName)
            || empty($email)
            || empty($pass)
            || empty($confirmPassword)
            || empty($PhoneNumber)
            || empty($address)
        ){
            echo "Fields can't be empty";
        }else{
            if ($pass != $confirmPassword ){
                echo "Please check Password Confirmation";
            }else {
                if($user->saveUser("`logistic`(`id`, `name`, `companyName`, `phoneNumber`, `email`,`password`, `date`, `status`, `address`,`pricePerkg`) ",
                    "VALUES (null,'$Name','$companyName','$PhoneNumber','$email','$pass',now(),'0','$address','')")){
                    echo "Successful";
                }else{
                    echo "Failed";
                }
            }
        }
    }

}



/***
 *  this is the controller method for inserting all customer
 * into the database (dbname = user).
 * it check key value for auth, then also test for fields emptiness, then
 * send to mainModel for the real insertion. this method
 * then return success or failure after all process.
 * @Param Key,Logistic object
 ***/

function insertUserCustomer($key,$user){

    if ($key == "1234567opiuyt") {

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $companyName = $_POST["companyName"];
        $PhoneNumber = $_POST["PhoneNumber"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];


//        $documentPath = "";
//        $document = "";
//        $count_size = count($_FILES["myFiles"]["tmp_name"]);
//        $counts = 0;
//        foreach ($_FILES["myFiles"]["tmp_name"] as $myFile => $value) {
//            $targePath = "../models/forAllImage/".basename($_FILES["myFiles"]["name"][$myFile]);
//            $counts ++;
//            if($counts == $count_size){
//                $documentPath .= $targePath ;
//                $document .= basename($_FILES["myFiles"]["name"][$myFile]) ;
//            }else {
//                $documentPath .= $targePath . ",";
//                $document .= basename($_FILES["myFiles"]["name"][$myFile]) . ",";
//            }
//            move_uploaded_file($value, $targePath);
//        }

        if (
            empty($firstname)
            ||empty($lastname)
            ||empty($companyName)
            || empty($email)
            || empty($pass)
            || empty($confirmPassword)
            || empty($PhoneNumber)
        ){
            echo "Fields can't be empty";
        }else{
            if ($pass != $confirmPassword ){
                echo "Please check Password Confirmation";
            }else {
                if($user->saveUser("`customer`(`id`, `firstName`, `lastName`, `email`, `phoneNumber`, `companyName`,`password`, `date`, `status`) ",
                    "VALUES (null,'$firstname','$lastname','$email','$PhoneNumber','$companyName','$pass',now(),'0')")){
                    echo "Successful";
                }else{
                    echo "Failed";
                }
            }
        }
    }
}




?>
