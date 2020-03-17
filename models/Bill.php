<?php error_reporting( E_ALL ); ?>
<?php

/**
 *
 */
class Bill extends MainModel
{

public function getInfo () {
  $infos = $this->selectALl("contact");

  foreach ($infos as $info) {
    // code...
    //echo $info["id"];
  }
}

public function saveBill($table,$values)
{
    $insert = $this->insertToTables($table,$values);
    if ($insert) {
      // code...
      return $insert;
    }
    return false;
}



public function getAllBill()
    {
        $sql = "select * from bill";

        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAllBillBySql($sql)
    {
        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getBillById($id)
    {
        $sql = "select * from bill where id = '".$id."'";
        $result = $this->db->getOne($sql);
            return $result;
    }

    public function UpdateBill ($sql){

        $update = $this->UpdateAll($sql);
        $update;
    }




}


 ?>
