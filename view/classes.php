<?php

class crud{
    private $con;

    function __construct()
    {
       $this->con = new mysqli("localhost","root","","student");
    }

    function insert($name,$email,$status){
        $insert = $this->con->query("INSERT INTO std_info(name,email,status) VALUES('$name','$email','$status')");

        if($insert){
            return '<span class="alert alert-success">Data saved</span>';
        }
        else{
            return '<span class="alert alert-success">Data not saved</span>';
        }

    }

    function show(){
        $show = $this->con->query("SELECT *FROM std_info");
        return $show;
    }

    function delete($id){
        $delete = $this->con->query("DELETE FROM std_info WHERE id='$id'");
        if($delete){
            header("location: index.php");
            return true;
        }
        else{
            return false;
        }
    }

    function edit($id){
        $edit = $this->con->query("SELECT *FROM std_info WHERE id='$id' LIMIT 1");
        return $edit;

    }
    function update($data,$id){
        $name = $data['name'];
        $email = $data['email'];
        $status = $data['status'];

        $update = $this->con->query("UPDATE std_info SET name='$name', email='$email', status = '$status' WHERE id='$id' ");
        if($update){
        header("location: index.php");
        }

    }
}

