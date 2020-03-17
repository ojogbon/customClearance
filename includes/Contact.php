<?php
    include "init.php";

    include ($_SERVER['DOCUMENT_ROOT']. '/lab_health/models/Contact.php');

    $contact = new Contact();


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
        insertContact($key,$contact);
    }
    elseif ($methods == "selectall" || $methods == "getall"){
        $contact->getAllContact();
    }elseif ($methods == "select" || $methods == "get"){
            $id = $_GET["id"];
            if (!empty($id)) {
                echo json_encode($contact->getContactById($id));
            }else{
                echo "Not there!";
            }
    }


    /***
     *  this is the controller method for inserting all contact
     * into the database (dbname = contactus).
     * it check key value for auth, then also test for fields emptiness, then
     * send to mainModel for the real insertion. this method
     * then return success or failure after all process.
     * @Param Key,Logistic object
    ***/

function insertContact($key,$contact){

    if ($key == "1234567opiuyt") {

          $name = $_POST["name"];
          $email = $_POST["email"];
          $phoneNumber = $_POST["phoneNumber"];
          $message = $_POST["message"];


         if (empty($name)
            || empty($email)
             || empty($phoneNumber)
             || empty($message)
           ){
                    echo "Fields can't be empty";
            }else{
                            if($contact->saveContact("`contactus`(`id`, `name`, `email`, `phoneNumber`, `message`, `date`, `status`) ",
                            "VALUES (null,'$name','$email','$phoneNumber','$message',now(),'0')")){
                                echo "Successful";
                            }else{
                                echo "Failed";
                            }
        }
    }
}




?>
