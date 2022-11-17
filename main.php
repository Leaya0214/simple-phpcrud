<?php
include "class.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-3 ">
            <?php 
            $obj = new crud;
            if(isset($_POST['save'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $status = $_POST['status'];

                if($name == ""){
                    echo '<span class="alert alert-danger">Name field must be required</span>';
                   }elseif($email == ""){
                    echo '<span class="alert alert-danger">Name field must be required</span>';
                
                   }else{
                    
                    $msg = $obj->insert($name,$email,$status);
                    echo $msg;
                   }
            }
            
            ?>
            <form action="" method="POST" class="mt-5">
                <div class="form-group">
                <label for="" >Username</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                <label for="">Status</label>
                <select name="status" class="form-control">
                    <option value="1">------status------</option>
                    <option value="1">Active</option>
                    <option value="2">Pending</option>
                    <option value="3">Inactive</option>
                </select>
                </div>
                <button type="submit" name="save" class="form-control btn- btn-primary">Save</button>
            </form>
        </div>
    </div>
    </div>
        <div class="row mt-3">
            <div class="col-md-6 offset-md-3">
                <table class="table table-striped" border="1">
                    <tr>
                        <th>SL No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $result = $obj->show();
                        $sl = 1;
                         while($data = $result->fetch_assoc()){
                            echo ' <tr>
                            <th>'.$sl.'</th>
                            <th>'.$data['name'].'</th>
                            <th>'.$data['email'].'</th>
                            <th>'.$data['status'].'</th>
                            <td><a href="edit.php?uid='.$data["id"].'" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <a href="delete.php?uid='.$data['id'].'"class="btn btn-danger"><i class="fas fa-trash "></i></a></th>
                        </tr>' ;
                        $sl++;


                     
                         }
                    ?>
                </table>

            </div>
        </div>
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/fontawesome.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>