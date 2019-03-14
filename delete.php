<?php

include ('Connection.php');
include ('User.php');

   $objUser = new User();
    if(isset($_GET['idd'])) {

      $obj = $objUser->delete();
    }
?>
