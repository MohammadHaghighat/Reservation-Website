<?php

class user
{
    function __construct()
    {
        global $db;
        $this->db = $db;
        $this->dbTable = $this->db->usersTable;
    }

    public function isRegistered($data)
    {
        $data['password'] = $this->hashPass($data['password']);
        $sql = "select * from $this->dbTable where code_melli='$data[username]' and password='$data[password]'";
        $result = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            if (isset($data['remember-me']) and !empty($data['remember-me'])){
                $this->doLogin($result,1);
            }else{
                $this->doLogin($result);
            }
            return true;
        } else
            return false;

    }

    private function hashPass($password)
    {
        return hash('sha1', $password);
    }

    public function isAdmin($id)
    {
        $sql = "select * from $this->dbTable where id=$id";
        $result = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
        if ($result['role'] == "admin")
            return true;
        else
            return false;
    }

    public function doLogin($data,$rememberMe=0)
    {
        $sql = "select * from $this->dbTable where code_melli='$data[code_melli]'";
        $result = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
        $userFullName = $result['fname'] . " " . $result['lname'];
        $userId = $result['id'];
        $userIp = $_SERVER['REMOTE_ADDR'];
        if ($rememberMe) {
            setcookie('store-user-login',$userFullName.'-'.$userId,time()+(60*60),'/');
        }
        $_SESSION['loginStatus'] = true;
        $_SESSION['userFullName'] = $userFullName;
        $_SESSION['userId'] = $userId;
        $_SESSION['userIp'] = $userIp;
    }

    public function logout()
    {
        // این دستور پایین به منظور حذف کوکی می باشد
        setcookie('store-user-login','',1,'/');
//        unset($_COOKIE['store-user-login']); این روش کار نمیکنه
        unset($_SESSION['loginStatus']);
        unset($_SESSION['userFullName']);
        unset($_SESSION['userId']);
        unset($_SESSION['userIp']);
        return true;
    }

    public function isLogin()
    {
        if (isset($_COOKIE['store-user-login'])){
            $data = explode('-',$_COOKIE['store-user-login']);
            $userFullName =$data[0] ;
            $userId = $data[1];
            $userIp = $_SERVER['REMOTE_ADDR'];
            $_SESSION['loginStatus'] = true;
            $_SESSION['userFullName'] = $userFullName;
            $_SESSION['userId'] = $userId;
            $_SESSION['userIp'] = $userIp;
            return true;

        }
        else if(isset($_SESSION['loginStatus'])) {
            if ($_SESSION['loginStatus'])
                return true;
        } else
            return false;
    }

    public function isCorrectCaptcha($captcha)
    {
        if (isset($_SESSION['captcha'])) {
            if ($_SESSION['captcha'] === $captcha)
                return true;
        } else
            return false;
    }

    public function addUser($data, &$errMsg = null)
    {
        if ($this->codeMelliExist($data['codeMelli'])) {
            $errMsg .= "کد ملی وارد شده وجود دارد";
            return false;
        }
        if ($data['password'] !== $data['repassword']) {
            $errMsg .= "گذارواژه ها باهم مطابقت ندارد";
            return false;
        }
        $data['password'] = $this->hashPass($data['password']);
        $data['image_path'] = "";
        $role = (isset($data['role'])) ? $data['role'] : 'user';
        $file = $_FILES['image'];
        if (!empty($file['name'])) {
            $data['image_path'] = uploadFile($file, "users", $errMsg, $data['email']);
            if ($errMsg)
                return false;
        }
        $sql = "INSERT INTO $this->dbTable (fname, lname, father_name, code_melli, password,grade,image_path, birth_date,role)
    VALUES ('$data[fname]','$data[lname]', '$data[fatherName]', '$data[codeMelli]','$data[password]','$data[grade]','$data[image_path]','$data[birth_date]','$role')";
        $result = $this->db->query($sql);
        if ($result) {
            return true;
        }
        $errMsg .= $this->db->errorInfo()[2];
    }

    private function codeMelliExist($codeMelli)
    {
        $sql = "select * from $this->dbTable where codeMelli='$codeMelli'";
        $result = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
        if ($result)
            return true;
        else
            return false;
    }

    public function getUser($id)
    {
        $sql = "select * from $this->dbTable where id=$id";
        $result = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else
            return false;
    }

    public function userEdit($id, $data, $file, &$errMsg = null)
    {
        $whereStr = '';
        if (!empty($data['password'])) {
            if ($data['password'] !== $data['repassword']) {
                $errMsg .= "گذارواژه ها باهم مطابقت ندارد";
                return false;
            } else {
                $password = $this->hashPass($data['password']);
                $whereStr .= ", password = '$password'";
            }
        }
        $file = $file['image'];
        if (!empty($file['name'])) {
            $image_path = uploadFile($file, 'users', $errMsg, $data['email']);
            $whereStr .= " , image_path = '$image_path'";
        }
        elseif (empty($data['image_path'])){
            $whereStr .= " , image_path = ''";
        }
        $role = "";
        if (isset($data['role'])){
            $role = ", role='$data[role]'";
        }
        $sql = "UPDATE $this->dbTable SET fname='$data[fname]' , lname='$data[lname]' , code_melli = '$data[codeMelli]', father_name = '$data[fatherName]', grade = '$data[grade]' , birth_date='$data[birth_date]' $whereStr $role WHERE id=$id";
        if ($this->db->query($sql)) {
            return true;
        } else {
            $errMsg .= "پروفایل ویرایش نشد : " . $this->db->errorInfo()[2];
            return false;
        }
    }

    public function getUsers()
    {
        $sql = "select * from $this->dbTable";
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else
            return false;
    }

    public function userDelete($id)
    {
        $sql = "DElETE FROM $this->dbTable WHERE id=$id";
        if ($this->db->query($sql)) {
            return true;
        } else
            return false;
    }
    public function usersCount()
    {
        $sql = "select count(id) from $this->dbTable";
        $result = $this->db->query($sql)->fetch();
        if ($result) {
            return $result[0];
        } else
            return false;
    }
}

?>