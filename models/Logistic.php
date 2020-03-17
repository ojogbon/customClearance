<?php error_reporting( E_ALL ); ?>
<?php

/**
 *
 */
class Logistic extends MainModel
{


    public function getInfo () {
  $infos = $this->selectALl("contact");

  foreach ($infos as $info) {
    // code...
    //echo $info["id"];
  }
}

public function saveLogistic($table,$values)
{
    $insert = $this->insertToTables($table,$values);
    if ($insert) {
      // code...
      return $insert;
    }
    return false;
}




    public function getAllLogistic()
    {
        $sql = "select * from logistic ";

        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAllLogisticBySql($sql)
    {
        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getLogisticById($id)
    {
        $sql = "select * from  logistic where id = '".$id."'";
        $result = $this->db->getOne($sql);
            return $result;
    }

    public function UpdateLogistic ($sql){

         $update = $this->UpdateAll($sql);
          $update;
    }




}


 ?>
