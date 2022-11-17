<?php
 class crud{
     private $con;


     public function __construct()
     {
       $this->con = new mysqli("localhost","root","","batch03"); 
     }



     public function insert($name,$email,$status){

        $_insert = $this->con->query("INSERT INTO tbl_info(name,email,status) VALUES ('$name','$email','$status')");

        if($_insert == TRUE){
            return '<span class="alert alert-success">Data saved</span>';
        }else{
            return '<span class="alert alert-success">Not saved</span>';
        }
    }



    public function show(){
        $_show = $this->con->query("SELECT *FROM tbl_info");
       return $_show;
    }


    function delete($id){
        $_delete = $this->con->query("DELETE FROM tbl_info WHERE id='$id'");
        
        if($_delete){
            header("location: index.php");
            return true;
        }else{
            return false;
        }
    }


    function edit($id){
        $_edit = $this->con->query("SELECT *FROM tbl_info WHERE id='$id' LIMIT 1");
        
        return $_edit;
    }

    function update($data,$id){
        $name = $data['name'];
        $email = $data['email'];
        $status = $data['status'];

        $_update =  $this->con->query("UPDATE tbl_info SET  name='$name', email='$email', status='$status' WHERE id='$id'");

        if($_update){
        header("location: index.php");
        }

    }

}

?>

