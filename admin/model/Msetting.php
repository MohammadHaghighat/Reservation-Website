<?php

class setting
{
    function __construct()
    {
        global $db;
        $this->db = $db;
        $this->dbTable = $this->db->settingTable;
    }

    public function setting($option = 0)
    {
        if ($option) {
            $whereStr = "WHERE site_option='$option'";
        } else {
            $whereStr = "";
        }
        $sql = "SELECT * FROM $this->dbTable $whereStr";
        $result = $this->db->query($sql);
        $row = $result->fetchAll(2);
        if ($option)
            return $row[0];
        else
            return $row;
    }

    public function setting_edit($data, &$errMsg = null)
    {
        $logoChanged = false;
        $file = $_FILES['image'];
        if (!empty($file['name'])) {
            $logoChanged = true;
            $data['logo'] = uploadFile($file, "setting", $errMsg, 'logo');
            if ($errMsg)
                return false;
        }elseif(empty($data['image_path'])){
            $logoChanged = true;
            $data['logo'] = '';
        }
        $options = [
            'title',
            'address',
            'footer',
            'logo',
            'tel',
            'fax',
        ];
        $id = 0;
        foreach ($options as $val) {
            if ($val === 'logo') {
                if (!$logoChanged)
                    break;
            }
            $id++;
            $sql = "UPDATE $this->dbTable SET site_option='$val'  , value = '$data[$val]' WHERE id=$id";
            if (!$this->db->query($sql)) {
                $errMsg = " اطلاعات ویرایش نشدند : " . $this->db->errorInfo()[2];
                return false;
            }
        }
        return true;
    }
}

?>