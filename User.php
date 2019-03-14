<?php

include_once 'Connection.php';

class User extends Connection
{
    /**
     * To insert data in database
     * @return void
     */
    public function register() {

        $strFirstName      = $_POST['fname'];
        $strLastName       = $_POST['lname'];
        $strEmailId        = $_POST['email'];
        $intPhoneNumber    = $_POST['phone'];
        $strAbout          = $_POST['about'];
        $strPassword       = $_POST['password'];
        $strUserType       = $_POST['usertype'];
        $strClassName      = $_POST['class_name'];
        $strMonitor        = $_POST['is_monitor'];
        $strStudySubjects  = $_POST['studying_subjects'];
        $strDeparmentName  = $_POST['deparment_name'];
        $strHod            = $_POST['is_hod'];
        $strTeachSubjects  = $_POST['teaching_subjects'];

        $arrSql = "insert into users(fname,lname,email,phone,about,password,usertype,class_name,is_monitor,studying_subjects,deparment_name,is_hod,teaching_subjects) values('$strFirstName ','$strLastName','$strEmailId','$intPhoneNumber','$strAbout','$strPassword','$strUserType','$strClassName','$strMonitor','$strStudySubjects','$strDeparmentName','$strHod','$strTeachSubjects')";
        $_SESSION['message'] = "Address saved";
        $arrObjResult = mysqli_query($this->objConnection, $arrSql);
        if (!$arrObjResult) {
            die("Not register");
        }
        else {
            ?>
            <script type = "text/javascript">
                alert("register successfully");
                window.location = "index.php";
            </script>
            <?php
        }
    }
    /**
     * To getdata form database
     * @return array
     */
    public function getData() {
        $query        = "SELECT * FROM users ORDER BY id DESC";
        $arrObjResult = $this->objConnection->query($query);

        if ($arrObjResult == false) {
            return false;
        }
        $arrStrFields = array();
        while ($row = $arrObjResult->fetch_assoc()) {
            $arrStrFields[] = $row;
        }
        return $arrStrFields;
    }

    /**
     * To delete user details in database
     * @return void
     */
    public function delete() {
        $intId  = $_GET['idd'];
        $arrSql = "delete from users where id = '$intId'";
        $arrObjResult = mysqli_query($this->objConnection, $arrSql);
        if (!$arrObjResult) {
            die("Not delete");
        } else {
            ?>
            <script type = "text/javascript">
                confirm('Are you sure you want to delete?');
                window.location = "home.php";
            </script>
            <?php
        }
    }

    /**
     * To update data in database
     * @return void
     */
    public function update() {
        $intId             = $_POST['id'];
        $strFirstName      = $_POST['fname'];
        $strLastName       = $_POST['lname'];
        $strEmailId        = $_POST['email'];
        $intPhoneNumber    = $_POST['phone'];
        $strAbout          = $_POST['about'];
        $strUserType       = $_POST['usertype'];
        $strClassName      = $_POST['class_name'];
        $strMonitor        = $_POST['is_monitor'];
        $strStudySubjects  = $_POST['studying_subjects'];
        $strDeparmentName  = $_POST['deparment_name'];
        $strHod            = $_POST['is_hod'];
        $strTeachSubjects  = $_POST['teaching_subjects'];

        $arrSql = "update users SET fname = '$strFirstName',lname = '$strLastName', email = '$strEmailId',phone = '$intPhoneNumber',about = '$strAbout',usertype = '$strUserType',class_name = '$strClassName',is_monitor = '$strMonitor',studying_subjects = '$strStudySubjects',deparment_name= '$strDeparmentName',is_hod= '$strHod',teaching_subjects= '$strTeachSubjects' where id = '$intId'";
        $arrObjResult = mysqli_query($this->objConnection, $arrSql);
        if (!$arrObjResult) {
            die("record not update");
        } else {
            ?>
            <script type="text/javascript">
                alert("record update succesfully");
                window.location = "view.php";
            </script>
            <?php
        }
    }

}


