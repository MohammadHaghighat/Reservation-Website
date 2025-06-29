<?php

class location
{
    function __construct()
    {
        global $db;
        $this->db = $db;
        $this->dbTable = $this->db->locationsTable;
    }
    public function locations_list()
    {
        $db = $this->db;
        $sql = "SELECT $this->dbTable.* FROM $this->dbTable ORDER BY id desc";
        $result = $this->db->query($sql);
        $row = $result->fetchAll(2);
        return $row;
    }
    public function location_detail($id)
    {
        $db = $this->db;
        $sql = "SELECT $this->dbTable.* FROM $this->dbTable where id=$id ORDER BY id desc";
        $result = $this->db->query($sql);
        $row = $result->fetch(2);
        return $row;
    }
    public function location_add($data, $files, &$errMsg = null)
    {
        $files_path = array();
        if (!empty($files['fileUploader1']['name'])) {
            foreach ($files as $file) {
                if (!empty($file['name']))
                    if ($files_path[] = uploadFile($file, "locations", $errMsg, $data['title']))
                        continue;
                    else
                        if ($errMsg) {
                            return false;
                        } else
                            break;
            }

        }

        $data['hasElevator'] = (isset($data['hasElevator']))? 1: 0;
        $data['hasParking'] = (isset($data['hasParking']))? 1: 0;
        $data['hasResturant'] = (isset($data['hasResturant']))? 1: 0;
        $data['hasKitchen'] = (isset($data['hasKitchen']))? 1: 0;
        $cover = ($files_path)?$files_path[0]:'';
        $files_path = serialize($files_path);
        $sql = "INSERT INTO $this->dbTable (title,city,cover,images,address,tel,floors,has_elevator,has_parking,has_resturant,has_kitchen,description) VALUES ('$data[title]','$data[city]','$cover','$files_path','$data[address]','$data[tel]',$data[floors],$data[hasElevator],$data[hasParking],$data[hasResturant],$data[hasKitchen],'$data[description]')";
        if ($this->db->query($sql)) {
            return true;
        } else {
            $errMsg = "مکان مورد نظر اضافه نشد : " . $this->db->errorInfo()[2];
            return false;
        }
    }
    public function location_edit($data, $id, $files, &$errMsg = null)
    {
        $files_path = array();
        $i = 1;
        while (isset($data['fileOldPath' . $i])) {
            if (!empty($data['fileOldPath' . $i])) {
                $files_path[] = $data['fileOldPath' . $i];
            }
            $i++;
        }
        if (!empty($files['fileUploader' . $i]['name'])) {
            foreach ($files as $file) {
                if (!empty($file['name']))
                    if ($files_path[] = uploadFile($file, "locations", $errMsg, $data['title']))
                        continue;
                    else
                        if ($errMsg) {
                            return false;
                        } else
                            break;
            }

        }
        $data['hasElevator'] = (isset($data['hasElevator']))? 1: 0;
        $data['hasParking'] = (isset($data['hasParking']))? 1: 0;
        $data['hasResturant'] = (isset($data['hasResturant']))? 1: 0;
        $data['hasKitchen'] = (isset($data['hasKitchen']))? 1: 0;
        $cover = ($files_path)?$files_path[0]:'';
        $files_path = serialize($files_path);
        $sql = "UPDATE $this->dbTable SET title='$data[title]' , city = '$data[city]' , cover = '$cover' , images = '$files_path' , address='$data[address]' , tel='$data[tel]' , floors='$data[floors]',has_elevator=$data[hasElevator],has_parking=$data[hasParking],has_resturant=$data[hasResturant],has_kitchen=$data[hasKitchen],description='$data[description]' WHERE id=$id";
        if ($this->db->query($sql)) {
            return true;
        } else {
            $errMsg = "مکان مورد نظر ویرایش نشد : " . $this->db->errorInfo()[2];
            return false;
        }
    }
    public function location_delete($id)
    {
        $sql = "DElETE FROM $this->dbTable WHERE id=$id";
        if ($this->db->query($sql)) {
            return true;
        } else
            return false;
    }

    
    
    public function search($s, $cat = null)
    {
        $db = $this->db;
        if ($cat) {
            $whereStr = "and $db->procatTable.title='$cat'";
        } else {
            $whereStr = "";
        }
        $sql = "SELECT $this->dbTable.* , $db->procatTable.title as cat FROM $this->dbTable , $db->procatTable
        where $this->dbTable.title like '%$s%' and $this->dbTable.cat_id = $db->procatTable.id $whereStr order by id desc";
        $result = $this->db->query($sql);
        $row = $result->fetchAll(2);
        return $row;
    }
}

?>