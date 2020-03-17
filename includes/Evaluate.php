<?php
    include "init.php";
//
include ($_SERVER['DOCUMENT_ROOT']. '/customClearance/models/BillPayment.php');
include ($_SERVER['DOCUMENT_ROOT']. '/customClearance/models/Progress.php');
include ($_SERVER['DOCUMENT_ROOT']. '/customClearance/models/Booking.php');
    include ($_SERVER['DOCUMENT_ROOT']. '/customClearance/models/User.php');
    include ($_SERVER['DOCUMENT_ROOT']. '/customClearance/models/Evaluate.php');

    $billPayment = new BillPayment();
    $doctor = new Booking();
    $user = new User();
    $evaluate = new Evaluate();


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
        insertevaluate($key,$evaluate);
    }
    elseif ($methods == "selectall" || $methods == "getall"){
        $evaluate->getAllEvaluate();
    }
    elseif ($methods == "select" || $methods == "get"){
            $id = $_GET["id"];
            if (!empty($id)) {
                echo json_encode($evaluate->getEvaluateById($id));
            }else{
                echo "Not there!";
            }
    }
    elseif ($methods == "updateInsert"){
            $id = $_GET["customerid"];
            $good_ids = $billPayment->getBillPaymentById($id)["goodId"];
            if (!empty($id) && !empty($good_ids)) {
                if ($evaluate->saveEvaluate("`evaluation`(`id`, `customer_id`, `officer_incharge`, `goodsID`, `state`,`evaluateCode`, `date`, `status`)",
                        "VALUES (null,'$id','0','$good_ids','0','0',now(),'0')")) {
                        echo "Successful";
                    } else {
                        echo "Failed";
                    }
            }else{
                echo "Not there!";
            }
    }
    elseif ($methods == "updateAdmin"){
            $id = $_GET["id"];
            $officer = $_GET["officer"];
        $sql = "UPDATE `evaluation` SET `state` = '1', `officer_incharge`='".$officer."' WHERE id ='".$id."'";
        if($evaluate->UpdateEvaluate($sql) == ""){
            echo "Successful";
        }else{
            echo "Failed";
        }
    }
    elseif ($methods == "update"){
            $id = $_GET["id"];
            $value = $_GET["value"];
            $sql = "";
            if($value == 7){
                $evaluateCode = "4$323&4".rand(11111,99999)."v?ere";
                $sql = "UPDATE `evaluation` SET `state` ='".$value."',`evaluateCode`='".$evaluateCode."'  WHERE id ='".$id."'";
            }else{
                $sql = "UPDATE `evaluation` SET `state` ='".$value."' WHERE id ='".$id."'";
            }

        if($evaluate->UpdateEvaluate($sql) == ""){
            echo "Successful";
        }else{
            echo "Failed";
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

function insertevaluate($key,$evaluate){
//    $user_id = $_SESSION["user_id"];
//    if ($key == "1234567opiuyt") {
//
//
//        $note = $_POST["note"];
//        $amountPaid = $_POST["amountPaid"];
//
//
//
//        $documentPath = "";
//        $document = "";
//        $counts = 0;
//        $file_size = count($_FILES["myFiles"]["tmp_name"]);
//        foreach ($_FILES["myFiles"]["tmp_name"] as $myFile => $value) {
//            $counts++;
//            $targePath = "../models/forAllImage/".basename($_FILES["myFiles"]["name"][$myFile]);
//
//            if($file_size == $counts){
//                $document .=basename($_FILES["myFiles"]["name"][$myFile]);
//                $documentPath .=$targePath;
//            }else{
//                $document .=basename($_FILES["myFiles"]["name"][$myFile]).",";
//                $documentPath .=$targePath.",";
//            }
//
//            move_uploaded_file($value, $targePath);
//        }
//
//
//        if (empty($note)
//            || empty($amountPaid)
//            || empty($document)
//          ) {
//                    echo "Fields can't be empty";
//            }else{
//                if (empty($user_id)){
//                    echo "Please Login";
//                }else {
//
//                    if ($transaction->saveTransaction("`thrifttransaction`(`id`, `user_id`, `officer_in_charge`, `amount_paid`, `evidence_of_payment`, `path`, `date`, `status`, `deleted`, `note`)",
//                        "VALUES (null,'$user_id','0','$amountPaid','$document','$documentPath',now(),'0','0','$note')")) {
//                        echo "Successful";
//                    } else {
//                        echo "Failed";
//                    }
//                }
//        }
//    }
}




?>
