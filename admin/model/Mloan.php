<?php

class loan
{
    function __construct()
    {
        global $db;
        $this->db = $db;
        $this->dbTable = $this->db->loansTable;
    }
    public function loans_list()
    {
        $db = $this->db;
        $sql = "SELECT $this->dbTable.* FROM $this->dbTable ORDER BY id desc";
        $result = $this->db->query($sql);
        $row = $result->fetchAll(2);
        return $row;
    }
    public function loan_detail($id)
    {
        $db = $this->db;
        $sql = "SELECT $this->dbTable.* FROM $this->dbTable where id=$id ORDER BY id desc";
        $result = $this->db->query($sql);
        $row = $result->fetch(2);
        return $row;
    }
    public function loan_add($data, &$errMsg = null)
    {
        $sql = "INSERT INTO $this->dbTable (bank,title,count,total_price,each_price,first_price,bank_address,profs,status,winners,description) VALUES ('$data[bank]','$data[title]',$data[count],$data[total_price],$data[each_price],$data[first_price],'$data[bank_address]',$data[profs],'$data[status]',$data[winners],'$data[description]')";
        if ($this->db->query($sql)) {
            return true;
        } else {
            $errMsg = "وام مورد نظر اضافه نشد : " . $this->db->errorInfo()[2];
            return false;
        }
    }
    public function loan_edit($data, $id, &$errMsg = null)
    {
        $sql = "UPDATE $this->dbTable SET  bank='$data[bank]' , title='$data[title]' , count = $data[count] , total_price = $data[total_price] , each_price = $data[each_price] , first_price = $data[first_price] , bank_address = '$data[bank_address]' , profs = $data[profs] , status='$data[status]' , winners=$data[winners],description='$data[description]' WHERE id=$id";
        if ($this->db->query($sql)) {
            return true;
        } else {
            $errMsg = "وام مورد نظر ویرایش نشد : " . $this->db->errorInfo()[2];
            return false;
        }
    }
    public function loan_delete($id)
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