<?php

class page
{
    function __construct()
    {
        global $db;
        $this->db = $db;
        $this->dbTable = $this->db->pagesTable;
    }

    public function page_list()
    {
        $sql = "SELECT * FROM $this->dbTable ";
        $result = $this->db->query($sql);
        $row = $result->fetchAll(2);
        return $row;
    }

    public function page_detail($id,$status='')
    {
        if($status){
            $statusWhere="and status='$status'";
        }
        $sql = "SELECT * FROM $this->dbTable WHERE id=$id $statusWhere";
        $result = $this->db->query($sql);
        if($result){
            $row = $result->fetch(2);
            return $row;
        }
    }

    public function page_edit($data, $id, &$errMsg = null)
    {
        $sql = "UPDATE $this->dbTable SET title='$data[title]' , text = '$data[text]' , status = '$data[status]' WHERE id=$id";
        if ($this->db->query($sql)) {
            return true;
        } else {
            $errMsg = "برگه ویرایش نشد : " . $this->db->errorInfo()[2];
            return false;
        }
    }

    public function page_add($data, &$errMsg = null)
    {
        $sql = "INSERT INTO $this->dbTable (title,text,status) VALUES ('$data[title]','$data[text]','$data[status]')";
        if ($this->db->query($sql)) {
            return true;
        } else {
            $errMsg = "برگه اضافه نشد : " . $this->db->errorInfo()[2];
            return false;
        }
    }

    public function page_delete($id)
    {
        $sql = "DElETE FROM $this->dbTable WHERE id=$id";
        if ($this->db->query($sql)) {
            return true;
        } else
            return false;
    }

    public function published_page_list()
    {
        $sql = "SELECT * FROM $this->dbTable where status='published'";
        $result = $this->db->query($sql);
        $row = $result->fetchAll(2);
        return $row;
    }

}

?>