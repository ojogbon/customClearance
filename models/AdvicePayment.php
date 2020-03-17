<?php error_reporting( E_ALL ); ?>
<?php

/**
 *
 */
class AdvicePayment extends MainModel
{

public function getInfo () {
  $infos = $this->selectALl("contact");

  foreach ($infos as $info) {
    // code...
    //echo $info["id"];
  }
}

public function saveAdvicePayment($table,$values)
{
    $insert = $this->insertToTables($table,$values);
    if ($insert) {
      // code...
      return $insert;
    }
    return false;
}



public function getAllAdvicePayment()
    {
        $sql = "select * from advice_payment";

        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAllAdvicePaymentBySql($sql)
    {
        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAdvicePaymentById($id)
    {
        $sql = "select * from advice_payment where id = '".$id."'";
        $result = $this->db->getOne($sql);
            return $result;
    }

    public function UpdateAdvicePayment ($sql){

        $update = $this->UpdateAll($sql);
        $update;
    }




}


 ?>
