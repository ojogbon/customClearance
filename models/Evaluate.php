<?php error_reporting( E_ALL ); ?>
<?php

/**
 *
 */
class Evaluate extends MainModel
{


    public function getInfo () {
  $infos = $this->selectALl("contact");

  foreach ($infos as $info) {
    // code...
    //echo $info["id"];
  }
}

public function saveEvaluate($table,$values)
{
    $insert = $this->insertToTables($table,$values);
    if ($insert) {
      // code...
      return $insert;
    }
    return false;
}




    public function getAllEvaluate()
    {
        $sql = "select * from evaluation ";

        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAllEvaluateBySql($sql)
    {
        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getEvaluateById($id)
    {
        $sql = "select * from  evaluation where id = '".$id."'";
        $result = $this->db->getOne($sql);
            return $result;
    }

    public function UpdateEvaluate ($sql){

         $update = $this->UpdateAll($sql);
          $update;
    }




}


 ?>
