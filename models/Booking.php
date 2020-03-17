<?php error_reporting( E_ALL ); ?>
<?php

/**
 *
 */
class Booking extends MainModel
{

public function getInfo () {
  $infos = $this->selectALl("contact");

  foreach ($infos as $info) {
    // code...
    //echo $info["id"];
  }
}

public function saveBooking($table,$values)
{
    $insert = $this->insertToTables($table,$values);
    if ($insert) {
      // code...
      return $insert;
    }
    return false;
}



public function getAllBooking()
    {
        $sql = "select * from bookings";

        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getAllBookingBySql($sql)
    {
        $result = $this->db->getAll($sql);
            return $result;
    }

    public function getBookingById($id)
    {
        $sql = "select * from bookings where id = '".$id."'";
        $result = $this->db->getOne($sql);
            return $result;
    }

    public function UpdateBooking ($sql){

        $update = $this->UpdateAll($sql);
        $update;
    }




}


 ?>
