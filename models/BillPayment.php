<?php error_reporting( E_ALL ); ?>
<?php

/**
 *
 */
class BillPayment extends MainModel
{

public function getInfo () {
  $infos = $this->selectALl("contact");

  foreach ($infos as $info) {
    // code...
    //echo $info["id"];
  }
}

public function saveBillPayment($table,$values)
{
    $insert = $this->insertToTables($table,$values);
    if ($insert) {
      // code...
      return $insert;
    }
    return false;
}



public function getAllBillPayment()
    {
        $sql = "select * from bill_payment";

        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAllBillPaymentBySql($sql)
    {
        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getBillPaymentById($id)
    {
        $sql = "select * from bill_payment where id = '".$id."'";
        $result = $this->db->getOne($sql);
            return $result;
    }

    public function UpdateBillPayment ($sql){

        $update = $this->UpdateAll($sql);
        $update;
    }




}


 ?>
