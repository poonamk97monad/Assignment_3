<?php

include('Connection.php');
include('User.php');
session_start();

    if(!isset($_SESSION['userid'])) {
        # redirect to the login page
        header('Location: index.php?msg=' . urlencode('Login first.'));
        exit();
    }
 $objUser = new User();
 //fetching data
 $result = $objUser->getData();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>view</title>
        <link rel="stylesheet" type="text/css" href="index.css">
        <link rel="stylesheet" type="text/css" href="home.css">
    </head>
    <body>
      <div class="header">
      </div>
      <div class="topnav">
        <!-- logout  -->
        <form action="check.php" method="POST" class="formright">
          <input type="submit" name="logout" value="LOGOUT" >
        </form>
      </div>
      <div class="row">
        <div class="leftcolumn">
          <div class="card">
            <h2>Records</h2>
              <div class="viewimg">
                <center>
                <!--View data -->
                  <table  width="100%">
                    <tr>
                       <table width="100%">
                           <tr>
                               <th> ID</th>
                               <th> First Name</th>
                               <th> Last Name</th>
                               <th> Emai_ID</th>
                               <th> Mobile</th>
                               <th> About</th>
                               <th> User Type</th>
                               <th colspan="2"> Action</th>
                           </tr>
                           <?php
                             foreach ($result as $key => $res) {
                               echo'<tr>';
                               echo'<td>'.$res['id'].'</td>';
                               echo'<td>'.$res['fname'].'</td>';
                               echo'<td>'.$res['lname'].'</td>';
                               echo'<td>'.$res['email'].'</td>';
                               echo'<td>'.$res['phone'].'</td>';
                               echo'<td>'.$res['about'].'</td>';
                               echo'<td>'.$res['usertype'].'</td>';
                               echo'<td ><a name="delete" class="delbtn" href="check.php?idd='.$res["id"].'"> Delete</a></td>';
                               echo'<td ><a class="editbtn" href="update.php?id='.$res["id"].'&fname='.$res["fname"].'&lname='.$res["lname"].'&email='.$res["email"].'&phone='.$res["phone"].'&about='.$res["about"].'&usertype='.$res["usertype"].'&class_name='.$res["class_name"].'&is_monitor='.$res["is_monitor"].'&studying_subjects='.$res["studying_subjects"].'&deparment_name='.$res["deparment_name"].'&is_hod='.$res["is_hod"].'&teaching_subjects='.$res["teaching_subjects"].'">Edit</a></td>';
                               echo'</tr>';
                               }
                      ?>
                      </table>
                    </tr>
                  </table>
                </center>
            </div>
          </div>
        </div>
        <div class="rightcolumn">
          <div class="card">
            <h3>Follow</h3>
          </div>
        </div>
      </div>
      <div class="foot">
       <h2>Footer</h2>
      </div>
    </body>
</html>
