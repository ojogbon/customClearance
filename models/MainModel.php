<?php
//include 'Dbh.php';
include "DbHandler.php";
/**
 *
 */
class MainModel
{

    public $db = null;
    public function __construct()
    {
        $this->db = new DbHandler();
    }

    public function login($username, $password, $table)
    {
    $sql = "SELECT * FROM $table WHERE `email` = '$username'";
    $user = $this->db->getOne($sql);

    //If $row is FALSE.
    if($user === false){
        die('Incorrect username / password combination!');
    } else{
        $validPassword = password_verify($password, $user['password']);

        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            return $user;


        }
      }
  }

protected function insertToTables($table,$values) {
     $sql = " INSERT INTO ".$table.$values;
     $insert = $this->db->executeGetId($sql);
     if ($insert) {
       return true;
     }else {
       return false;
    }
  }

  protected function insertNewNanny($full_name, $previous_name, $marital_status, $sex, $day, $month, $year, $lga, $religion,
                                    $education, $languages, $phone, $email, $medical_exam, $availability,
                                    $work_specs, $nanny_id, $photo, $id_card, $other_id, $cv,
                                    $status=0, $approved=0, $guarantor_name, $guarantor_occupation, $guarantor_email,
                                    $guarantor_address, $guarantor_relationship, $guarantor_phone, $guarantor_name_2,
                                    $guarantor_occupation_2, $guarantor_email_2, $guarantor_address_2,
                                    $guarantor_relationship_2, $guarantor_phone_2)
  {
    $sql = "INSERT INTO nanny (`full_name`, `previous_name`, `marital_status`, `sex`, `day`, `month`, `year`, `lga`, `religion`,
                                `education`, `languages`, `phone`, `email`, `medical_exam`, `availability`,
                                `work_specs`, `nanny_unique_id`, `photo`, `id_card`, `other_id`, `cv`, `status`, `approved`, `created_at`)
              VALUES ('$full_name', '$previous_name', '$marital_status', '$sex', '$day', '$month', '$year', '$lga', '$religion',
                      '$education', '$languages', '$phone', '$email', '$medical_exam', '$availability',
                      '$work_specs', '$nanny_id', '$photo', '$id_card', '$other_id', '$cv', '$status', '$approved', now());";

    $sql .= "INSERT INTO nanny_guarantor (`guarantor_name`, `guarantor_occupation`, `guarantor_email`,
                                  `guarantor_address`, `guarantor_relationship`, `guarantor_phone`,
                                  `guarantor_name_2`, `guarantor_occupation_2`, `guarantor_email_2`,
                                  `guarantor_address_2`, `guarantor_relationship_2`, `guarantor_phone_2`,
                                  `nanny_id`)
              VALUES ('$guarantor_name', '$guarantor_occupation', '$guarantor_email', '$guarantor_address',
              '$guarantor_relationship', '$guarantor_phone', '$guarantor_name_2', '$guarantor_occupation_2',
              '$guarantor_email_2', '$guarantor_address_2','$guarantor_relationship_2', '$guarantor_phone_2', last_insert_id())";
              echo $sql." kkkkk>>> ";
    $insert = $this->db->getOne($sql);

    if ($insert) {
      echo "Nanny inserted";
      return true;
    }else {
      echo "Nanny not inserted";
      return false;
    }

  }

  public function insertNewUser($first_name, $last_name, $gender, $email, $phone, $address, $password, $role_id)
  {
      $hashPassword = password_hash($password, PASSWORD_DEFAULT);
      $checkUser = $this->db->getOne("select * from users where email = ? ",array($email));


      if (!empty($checkUser)) {
          return "taken";
          exit;
      } else {

      $sql = "INSERT INTO users (`first_name`, `last_name`, `gender`, `email`, `phone`, `address`, `password`, `role_id`,
                                `created_at`)
            VALUES ('$first_name', '$last_name', '$gender', '$email', '$phone', '$address', '$hashPassword',
                    '$role_id', now())";

      $lastId = $this->db->executeGetId($sql);

//      $insert = $this->db->execute($sql);
//      print_r($insert);
      return $lastId;
  }
  }
  public function updateUserProfile($first_name, $last_name, $gender, $email, $phone, $address, $password, $image,$path,$user_id)
  {
    echo $user_id;
      $hashPassword = password_hash($password, PASSWORD_DEFAULT);
      $checkUser = $this->db->getOne("select * from users where email = ? ",array($email));

      // print_r($checkUser);
      if (empty($checkUser)) {
        echo "<><><><><";
          return "taken";
          exit;
      } else {
        echo "cool";

        $sql = "UPDATE users set `first_name`='".$first_name."',
        `last_name` = '".$last_name."', `gender` = '".$gender."', `email` = '".$email."',
         `phone` = '".$phone."', `address`= '".$address."', `password` = '".$hashPassword."', `image` = '".$image."',
                                  `path`='".$path."' where id = '".$user_id."'";

      $lastId = $this->db->execute($sql);

//      $insert = $this->db->execute($sql);
//      print_r($insert);
      return $lastId;
  }
  }

  public function activateUser($id, $token)
  {
      $sql = "UPDATE users SET activated = 2, token = '$token' WHERE id = '$id'";
      $user = $this->db->execute($sql);

      return $user;
  }

    public function allCountries()
    {
        $sql = "SELECT * FROM `countries`";
        $countries = $this->db->getAll($sql);

        return $countries;
    }

    public function statesNigeria()
    {
        $sql = "SELECT * FROM `states` where `country_id`= 160";
        $states = $this->db->getAll($sql);

        return $states;
    }

    public function UpdateAll($sql)
    {

        $users = $this->db->execute($sql);

        return $users;
    }

    public function insertNewReason($reason, $request_id)
    {


        $sql = "INSERT INTO `reasons`(`id`, `reason`, `request_id`, `date`, `status`)
                VALUES (null,'$reason','$request_id',now(),'0')";

        $lastId = $this->db->executeGetId($sql);

  //      $insert = $this->db->execute($sql);
  //      print_r($insert);
        return $lastId;

    }

}


 ?>
