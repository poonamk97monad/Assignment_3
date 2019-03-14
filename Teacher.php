<?php

include_once 'Connection.php';

class Teacher extends UserData
{
    /**
     * To get list of Teacher fields for user
     * @return array - $arrStrFields
     */
    public function getFields() {
        $query = "SELECT id,deparment_name,is_hod,teaching_subjects FROM users ";
        echo $query;
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
        $strDeparmentName  = $_POST['deparment_name'];
        $strHod            = $_POST['is_hod'];
        $strTeachSubjects  = $_POST['teaching_subjects'];

        $arrSql = "update users SET deparment_name= '$strDeparmentName',is_hod= '$strHod',teaching_subjects= '$strTeachSubjects' where id = '$intId'";
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

