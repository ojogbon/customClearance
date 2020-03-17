<?php error_reporting( E_ALL ); ?>
<?php

/**
 *
 */
class Advice extends MainModel
{

public function getInfo () {
  $infos = $this->selectALl("contact");

  foreach ($infos as $info) {
    // code...
    //echo $info["id"];
  }
}

public function saveAdvice($table,$values)
{
    $insert = $this->insertToTables($table,$values);
    if ($insert) {
      // code...
      return $insert;
    }
    return false;
}



public function getAllAdvice()
    {
        $sql = "select * from advice";

        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAllAdviceBySql($sql)
    {
        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAdviceById($id)
    {
        $sql = "select * from advice where id = '".$id."'";
        $result = $this->db->getOne($sql);
            return $result;
    }

    public function UpdateAdvice ($sql){

        $update = $this->UpdateAll($sql);
        $update;
    }




}


 ?>
