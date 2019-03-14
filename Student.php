<?php

include_once 'Connection.php';

class Student extends UserData
{
    /**
     * To get list of student fields for user
     * @return array - $arrStrFields
     */
    public function getFields() {
        $query = "SELECT id,class_name,is_monitor,studying_subjects FROM users";
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

    public function update_student() {

        $intId             = $_POST['id'];
        $strClassName      = $_POST['class_name'];
        $strMonitor        = $_POST['is_monitor'];
        $strStudySubjects  = $_POST['studying_subjects'];

        $arrSql = "update users SET class_name = '$strClassName',is_monitor = '$strMonitor',studying_subjects = '$strStudySubjects' where id = '$intId'";
        $arrObjResult = mysqli_query($this->objConnection, $arrSql);
        if (!$arrObjResult) {
            die("record not update");
        }
        else {
            ?>
            <script type="text/javascript">
                alert("record update succesfully");
                window.location = "view.php";
            </script>
            <?php
        }

    }

}

