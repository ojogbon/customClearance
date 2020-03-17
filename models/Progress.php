<?php error_reporting( E_ALL ); ?>
<?php

/**
 *
 */
class Progress extends MainModel
{


    public function getInfo () {
  $infos = $this->selectALl("contact");

  foreach ($infos as $info) {
    // code...
    //echo $info["id"];
  }
}

public function saveProgress($table,$values)
{
    $insert = $this->insertToTables($table,$values);
    if ($insert) {
      // code...
      return $insert;
    }
    return false;
}




    public function getAllProgress()
    {
        $sql = "select * from progress ";

        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAllProgressBySql($sql)
    {
        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getProgressById($id)
    {
        $sql = "select * from  progress where id = '".$id."'";
        $result = $this->db->getOne($sql);
            return $result;
    }

    public function UpdateProgress ($sql){

         $update = $this->UpdateAll($sql);
          $update;
    }




}


 ?>
