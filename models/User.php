<?php error_reporting( E_ALL ); ?>
<?php

/**
 *
 */
class User extends MainModel
{

public function getInfo () {
  $infos = $this->selectALl("contact");

  foreach ($infos as $info) {
    // code...
    //echo $info["id"];
  }
}

public function saveUser($table,$values)
{
    $insert = $this->insertToTables($table,$values);
    if ($insert) {
      // code...
      return $insert;
    }
    return false;
}



public function getAllUser()
    {
        $sql = "select * from customer";

        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAllUserBySql($sql)
    {
        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getUserById($id)
    {
        $sql = "select * from customer where id = '".$id."'";
        $result = $this->db->getOne($sql);
            return $result;
    }

    public function UpdateClientRequestNow ($id, $request_id){

         $update = $this->UpdateClientRequest($id, $request_id);
          $update;
    }

    public function insertNewReasonNew($reason, $request_id){
                  $insert = $this->insertNewReason($reason, $request_id);
    }

}


 ?>
