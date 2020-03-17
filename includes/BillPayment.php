<?php
    include "init.php";

    include ($_SERVER['DOCUMENT_ROOT']. '/customClearance/models/Bill.php');
    include ($_SERVER['DOCUMENT_ROOT']. '/customClearance/models/BillPayment.php');
    include ($_SERVER['DOCUMENT_ROOT']. '/customClearance/models/Booking.php');
    include ($_SERVER['DOCUMENT_ROOT']. '/customClearance/models/Logistic.php');
    include ($_SERVER['DOCUMENT_ROOT']. '/customClearance/models/User.php');

    $bill = new Bill();
    $billPayment = new BillPayment();
    $logistic = new Logistic();
    $booking = new Booking();
    $user = new User();


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
    insertBillPayment($key,$bill);
}
if ($methods == "update" ){
    $id = $_GET["id"];
    $val = $_GET["value"];
    updateBill($key,$id,$val,$bill);
}
elseif ($methods == "selectall" || $methods == "getall"){
     $username = $_GET["username"];
    $password = $_GET["password"];
    $sql = "select id from users where email='".$username."' and password ='".$password."'";
    if(count($bill->getAllBillBySql($sql)[0]) > 0){
        $_SESSION["user_id"] =  $doctor->getAllBillBySql($sql)[0]["id"];
        echo 1;
    }else{
        echo 0;
    }
}elseif ($methods == "select" || $methods == "get"){
    $id = $_GET["id"];
    if (!empty($id)) {
        echo json_encode($bill->getBillById($id));
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

function insertBill($key,$bill){

//    if ($key == "1234567opiuyt") {
//
//        $userCode = $_POST["UserCode"];
//        $firstName = $_POST["firstName"];
//        $lastName = $_POST["lastName"];
//        $email = $_POST["email"];
//        $pass = $_POST["pass"];
//        $confirmPass = $_POST["confirmPass"];
//        $phoneNumber = $_POST["phoneNumber"];
//
//
////        $documentPath = "";
////        $document = "";
////        $count_size = count($_FILES["myFiles"]["tmp_name"]);
////        $counts = 0;
////        foreach ($_FILES["myFiles"]["tmp_name"] as $myFile => $value) {
////            $targePath = "../models/forAllImage/".basename($_FILES["myFiles"]["name"][$myFile]);
////            $counts ++;
////            if($counts == $count_size){
////                $documentPath .= $targePath ;
////                $document .= basename($_FILES["myFiles"]["name"][$myFile]) ;
////            }else {
////                $documentPath .= $targePath . ",";
////                $document .= basename($_FILES["myFiles"]["name"][$myFile]) . ",";
////            }
////            move_uploaded_file($value, $targePath);
////        }
//
//        if (
//            empty($userCode)
//            ||empty($firstName)
//            || empty($lastName)
//            || empty($email)
//            || empty($pass)
//            || empty($confirmPass)
//            || empty($phoneNumber)
//        ){
//            echo "Fields can't be empty";
//        }else{
//            if ($pass != $confirmPass ){
//                echo "Please check Password Confirmation";
//            }else {
//                if($user->saveUser("`users`(`id`, `firstname`, `lastname`,`userCode`, `email`, `password`, `phonenumber`, `date`, `status`) ",
//                    "VALUES (null,'$firstName','$lastName','$userCode','$email','$pass','$phoneNumber',now(),'0')")){
//                    echo "Successful";
//                }else{
//                    echo "Failed";
//                }
//            }
//        }
//    }
}

/***
 *  this is the controller method for updating appointments
 * into the database (dbname = appointment table).
 * @Param Key
 * @param id
 * @param type
 * @param Logistic object
 ***/

function updateBill($key,$id,$val,$bill){

    if ($key == "1234567opiuyt") {

        if (empty($id) || empty($val)){
            echo "Fields can't be empty";
        }elseif ($val == "close"){
            $sql = "UPDATE `bill_payment` SET `status` = '".$val."', `billcode`='0' WHERE id ='".$id."'";
            if($bill->UpdateBill($sql) == ""){
                echo "Successful";
            }else{
                echo "Failed";
            }
        }
        else{
            $billcode = "BiL".rand(0000,9999)."5t6yfge3ws";
            $sql = "UPDATE `bill_payment` SET `status` = '".$val."', `billcode`='".$billcode."' WHERE id ='".$id."'";
            if($bill->UpdateBill($sql) == ""){
                echo "Successful";
            }else{
                echo "Failed";
            }

        }
    }
}


?>
