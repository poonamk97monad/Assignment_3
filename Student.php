<?php

include_once 'Connection.php';

class Student extends UserData
{
    /**
     * To get list of student fields for user
     * @return array - $arrStrFields
     */
    public function getFields() {
        $arrStrFields = array(',class_name',',is_monitor',',studying_subjects');
        return $arrStrFields;
    }
    /**
     * To update All fields
     * @return void
     */
    public function update_student() {

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

        $arrStrAllFields = $this->getAllFields();
        $arrStrFields = $this->getFields();

        $strQueryBuild = "";
        foreach ($arrStrAllFields as $strField) {

            if(isset($_POST[$strField])) {
                $strQueryBuild.= $strField.'="'.$_POST[$strField].'"';
            }
        }
        foreach ($arrStrFields as $strField) {

            if(isset($_POST[$strField])) {
                $strQueryBuild .= $strField.'= "'.$_POST[$strField].'"';


            }
        }

        /*$text = implode(",", $strQueryBuild);*/

//        $strQueryBuild = "fname = '$strFirstName',lname = '$strLastName', email = '$strEmailId',phone = '$intPhoneNumber',about = '$strAbout',usertype = '$strUserType',class_name = '$strClassName',is_monitor = '$strMonitor',studying_subjects = '$strStudySubjects',deparment_name= null ,is_hod= null ,teaching_subjects= null where id = '$intId'";

        $arrSql = "update users SET $strQueryBuild where id = '$intId'";
         echo $arrSql;
            $arrObjResult = mysqli_query($this->objConnection, $arrSql);
            if (!$arrObjResult) {
                die("record not update");
            } else {
                ?>
                <script type = "text/javascript">
                    alert('upadate data');
                    window.location = "view.php";
                </script>
                <?php
           }

    }

}

