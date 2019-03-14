<?php

include('Connection.php');
session_start();
  if(!isset($_SESSION['userid'])) {
      # redirect to the login page
      header('Location: index.php?msg=' . urlencode('Login first.'));
      exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type = "text/javascript">
        $(function() {
            $('.usertype').change(function() {
                var data= $(this).val();
                if(data == "Student") {
                    $(".teacher").hide();
                    $(".student").show();
                }
                if(data == "Teacher") {
                    $(".student").hide();
                    $(".teacher").show();
                }
                if(data == null) {
                    $(".student").hide();
                    $(".teacher").hide();
                }
            });
            $('.usertype')
                .val('two')
                .trigger('change');
        });
    </script>
<link rel="stylesheet" type ="text/css" href="index.css">
</head>
  <body>
    <div class="header">
    </div>
    <div class="topnav">
    </div>
    <div class="row">
      <div class="leftcolumn" >
        <div class="card card1">
          <h2>WelCome</h2>
            <div class="fakeimg fakeimg2">
              <center>
              <img src="monad.png" arl="monad_infotech" width="80%" height="100%" ">
              </center>
            </div>
        </div>
      </div>
      <div class="rightcolumn">
      <!--Login form-->

        <div class="card">
          <h3> Update Data</h3>
          <div class="fakeimg fakeimg3">
          <!--  Regetation form -->
           <p><span class="error">* required field</span></p>

             <form method="post" action="check.php" onsubmit="return validRegisterForm()" name="registerform" id="registerform">
                <input type="text" value="<?php echo $_GET['id']?>" class="uphidden" name="id">
                <div class="input-group">
                  <label>First name:</label>
                  <input type="text" name="fname" value="<?php echo $_GET['fname'];?>" placeholder="your 1st name" id="fname" >
                  <span class = "error">*<?php echo $strFirstNameErr;?></span>
                </div>
                <div class="input-group">
                  <label>Last name :</label>
                  <input type="text" name="lname" value="<?php echo $_GET['lname']; ?>"  placeholder="your last name" id="lname">
                  <span class = "error">*<?php echo $strLastNameErr;?></span>
                </div>
                <div class="input-group">
                  <label>Email_id:</label>
                  <input type="email" name="email" value="<?php echo $_GET['email']; ?>"  placeholder="someone@gmail.com" id="email">
                  <span class = "error">*<?php echo $strEmailErr;?></span>
                </div>
                <div class="input-group">
                  <label>Moblie_no.:</label>
                  <input type="text" name="phone" value="<?php echo $_GET['phone']; ?>" placeholder="99999888888" id="phone">
                  <span class = "error">*<?php echo $strPhoneErr;?></span>
                </div>
                <div class="input-group">
                  <label>About:</label>
                  <textarea name="about" rows="3" cols="57" id="about" placeholder="write something about you"><?php echo $_GET['about']; ?></textarea>
                </div>
                <div class="input-group uphidden">
                  <label>Password:</label>
                  <input type="password" name="password" value="<?php echo $password; ?>" placeholder="min lenght 8 "  id="password">
                </div>
                <div class="input-group uphidden">
                  <label>Confirm Password:</label>
                  <input type="password" name="repassword" value="<?php echo $repassword; ?>" placeholder="re-enter password"  id="repassword">
                </div>
                 <div class="input-group">
                     <label>User Type:</label>
                     <select id="user_type" name="usertype" class="usertype">
                         <option value="Student" id="stu_id" class="stu_id" >Student</option>
                         <option value="Teacher" id="tea_id" class="tea_id" >Teacher</option>
                     </select>
                 </div>
                 <!--teacher-->
                 <p  id="teacher" class="teacher">
                     <label>Deparment_name:</label>
                     <input type="text" name="deparment_name" value=NUll  placeholder="department_name" id="">
                     <label>Are you HOD:</label>
                     <input type="radio" name="is_hod" value="yes"> YES
                     <input type="radio" name="is_hod" value="no" checked> NO
                     <label>Teaching Subjects:</label>
                     <input type="text" name="teaching_subjects" value=NUll placeholder="teaching_subjects" id="">

                 </p>
                 <!--student-->
                 <p  id="student" class="student">
                     <label>Class Name:</label>
                     <input type="text" name="class_name" value=NUll  placeholder="class_name" id="">
                     <label>Are you MONITOR:</label>
                     <input type="radio" name="is_monitor" value="yes" > YES
                     <input type="radio" name="is_monitor" value="no" checked> NO
                     <label>Studying Subjects:</label>
                     <input type="text" name="studying_subjects" value=NUll placeholder="studying_subjects" id="">
                 </p>
                 <div class="input-group">
                        <?php

                          if(isset($_GET['id'])){
                          echo '<input class="btn" type="submit" value="UPDATE" name="update"/>';
                          }
                          else{
                          echo'<input class="btn"  type="submit" value="SAVE" id="regi"  name="save"/>';
                          }

                        ?>
                 </div>
              </form>
          </div>
        </div>
      <div class="card">
        <h3>Follow</h3>
      </div>
      </div>
    </div>
    <div class="footer">
      <h2>Footer</h2>
    </div>
  </body>
</html>
