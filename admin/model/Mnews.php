<?php

class news
{
    function __construct()
    {
        global $db;
        $this->db = $db;
        $this->dbTable = $this->db->newsTable;
    }

    public function news_list()
    {
        $sql = "SELECT * FROM $this->dbTable";
        $result = $this->db->query($sql);
        $row = $result->fetchAll(2);
        return $row;
    }
    public function news_detail($id)
    {
        $sql = "SELECT * FROM $this->dbTable WHERE id=$id";
        $result = $this->db->query($sql);
        $row = $result->fetch(2);
        return $row;
    }
    public function news_edit($data,$file, $id, &$errMsg = null)
    {
        $whereStr = '';
        $file = $file['image'];
        if (!empty($file['name'])) {
            $image_path = uploadFile($file, 'news', $errMsg, $data['title']);
            $whereStr .= " , image = '$image_path'";
        }
        elseif (empty($data['image'])){
            $whereStr .= " , image = ''";
        }
        $sql = "UPDATE $this->dbTable SET title='$data[title]' , body = '$data[body]' ,  category = '$data[category]' , status = '$data[status]' $whereStr WHERE id=$id";
        if ($this->db->query($sql)) {
            return true;
        } else {
            $errMsg = "خبر ویرایش نشد : " . $this->db->errorInfo()[2];
            return false;
        }
    }

    public function news_add($data,$file, &$errMsg = null)
    {
        $data['image'] = "";
        $file = $_FILES['image'];
        if (!empty($file['name'])) {
            $data['image'] = uploadFile($file, "news", $errMsg, $data['title']);
            if ($errMsg)
                return false;
        }
        $data['release_date']=date("Y/m/d h:m:s");
        $sql = "INSERT INTO $this->dbTable (title,image,body,release_date,category,status) VALUES ('$data[title]','$data[image]','$data[body]','$data[release_date]','$data[category]','$data[status]')";
        if ($this->db->query($sql)) {
            return true;
        } else {
            $errMsg = "خبر اضافه نشد : " . $this->db->errorInfo()[2];
            return false;
        }
    }

    public function news_delete($id)
    {
        $sql = "DElETE FROM $this->dbTable WHERE id=$id";
        if ($this->db->query($sql)) {
            return true;
        } else
            return false;
    }

    public function published_news_list()
    {
        $sql = "SELECT * FROM $this->dbTable where status='published'";
        $result = $this->db->query($sql);
        $row = $result->fetchAll(2);
        return $row;
    }

}

?>