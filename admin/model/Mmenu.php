<?php

class menu
{
    function __construct()
    {
        global $db;
        $this->db = $db;
        $this->dbTable = $this->db->menusTable;
    }

    public function menu_list($id = 0)
    {
        if ($id) {
            $whereStr = "WHERE id=$id";
        } else {
            $whereStr = "";
        }
        $sql = "SELECT * FROM $this->dbTable $whereStr";
        $result = $this->db->query($sql);
        $row = $result->fetchAll(2);
        if ($id)
            return $row[0];
        else
            return $row;
    }

    public function menu_edit($data, $id, &$errMsg = null)
    {
        $sql = "UPDATE $this->dbTable SET title='$data[title]'  , url='$data[url]'  , parent_id = $data[parent_id] , status = $data[status] , sort = $data[sort] WHERE id=$id";
        if ($this->db->query($sql)) {
            return true;
        } else {
            $errMsg = "منو ویرایش نشد : " . $this->db->errorInfo()[2];
            return false;
        }
    }

    public function menu_add($data, &$errMsg = null)
    {
        $sql = "INSERT INTO $this->dbTable (title,url,parent_id,sort,status) VALUES ('$data[title]','$data[url]',$data[parent_id],$data[sort],$data[status])";
        if ($this->db->query($sql)) {
            return true;
        } else {
            $errMsg = "منو اضافه نشد : " . $this->db->errorInfo()[2];
            return false;
        }
    }

    public function menu_delete($id)
    {
        $sql = "DElETE FROM $this->dbTable WHERE id=$id";
        if ($this->db->query($sql)) {
            return true;
        } else
            return false;
    }

    public function sorted_menu_list()
    {
        $sql = "SELECT * FROM $this->dbTable where status=1 and parent_id=0 order by sort asc ";
        $result = $this->db->query($sql);
        $row = $result->fetchAll(2);
        if ($row)
            return $row;
        else
            return false;
    }
    public function sorted_submenu_list($id)
    {
        $sql = "SELECT * FROM $this->dbTable WHERE status=1 and parent_id=$id order by sort asc";
        $result = $this->db->query($sql);
        $row = $result->fetchAll(2);
        if ($row)
            return $row;
        else
            return false;
    }
}

?>