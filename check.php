<?php

  include('Connection.php');
  include('Auth.php');
  include('User.php');
  include('Validation.php');

  $objAuth       = new Auth();
  $objUser       = new User();
  $objValidation = new Validation();

  if(isset($_POST["save"])) {
      $strMsg              = $objValidation->check_empty($_POST, array('fname','lname','email','phone','about','password','repassword','usertype'));
      $strCheckPhone       = $objValidation->is_phone_valid($_POST['phone']);
      $strCheckEmail       = $objValidation->is_email_valid($_POST['email']);
      $strCheckPassword    = $objValidation->is_password_correct($_POST['password'],$_POST['repassword']);
      if($strMsg != null) {
            echo $strMsg;
            //link to the previous page
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
      } elseif (!$strCheckPhone) {
            echo 'Please provide proper phone no..';
            //link to the previous page
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
      } elseif (!$strCheckEmail) {
            echo 'Please provide proper email.';
            //link to the previous page
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
      }
        elseif (!$strCheckPassword) {
            echo 'Please check your password';
            //link to the previous page
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
      }
        else {
            // To insert with mysqli database
            $objRegister = $objUser->register();
      }
  }
  else {
    if(isset($_POST["login"])) {
        /** @var object $obj */
        $objLogin = $objAuth->login();
    }
  }

?>
<?php

   if(isset($_POST["logout"])) {

       $objLogout = $objAuth->logout();
   }

?>
<?php

    if(isset($_POST["update"])) {

         $strMsg            = $objValidation->check_empty($_POST, array('fname','lname','email','phone','about','usertype'));
         $strCheckPhone     = $objValidation->is_phone_valid($_POST['phone']);
         $strCheckEmail     = $objValidation->is_email_valid($_POST['email']);
         $strUserType       = $_POST['usertype'];
        if($strMsg != null) {
            echo $strMsg;
            //link to the previous page
            echo "<br/><a href = 'javascript:self.history.back();'>Go Back</a>";
        } elseif (!$strCheckPhone) {
            echo 'Please provide proper phone no..';
            //link to the previous page
            echo "<br/><a href = 'javascript:self.history.back();'>Go Back</a>";
        } elseif (!$strCheckEmail) {
            echo 'Please provide proper email.';
            //link to the previous page
            echo "<br/><a href = 'javascript:self.history.back();'>Go Back</a>";
        }
        else {
            $arrMixAllFields = $objUser->update();
            
        }

    }


?>
