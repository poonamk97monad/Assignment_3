<?php

include_once 'Connection.php';

class UserData extends User implements UserFieldInterface
{
    /**
     * To get list of all fields for user
     * @return array - $arrStrFields
     */
    public function getAllFields() {
        $query = "SELECT * FROM users ORDER BY id DESC";
        $result = $this->objConnection->query($query);
        if ($result == false) {
            return false;
        }
         $arrStrFields = array();
        while ($row = $result->fetch_assoc()) {
            $arrStrFields[] = $row;
        }
        return $arrStrFields;

    }

    /**
     * To get list of all fields for user
     * @return array - $arrStrFields
     */
    public function getFields() {
        return [];
    }
}



