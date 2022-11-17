<?php
    include "classes.php";
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-md-4 offset-md-3">

            <?php
            $obj = new crud;
            if(isset($_POST['save'])){
                $name = $_POST["name"];
                $email = $_POST['email'];
                $status = $_POST['status'];
    
                if(empty($name)){
                    echo '<span class="alert alert-success">Name field must be required</span>';
                }
                elseif(empty($email)){
                    echo '<span class="alert alert-success">Email field must be required</span>';
                }
                else{
                    $data = $obj->insert($name,$email,$status);
                    echo $data;
                }
            }

            if(isset($_GET['uid'])){
                $id = $_GET["uid"];
                if($obj->delete($id)){
                  echo '<span class="alert alert-success">Data deleted</span>';
                }else{
                  echo '<span class="alert alert-danger">Data not deleted</span>';
                }
              }
            
            ?>
            <form action="" method="POST" class="mt-4">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="1">----------Status-----------</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary form-control" name="save">Save</button>
            </form>
        </div>
    </div>
    <div class="row">
    <div class="col-md-6 offset-md-3 mt-5">
    <table class="table table-striped" border="1">
    <thead>
        <tr>
            <th>Sl No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $std = $obj->show();
        $sl = 1; 
        while($data = $std->fetch_assoc()){
            echo '   <tr>
            <td>'.$sl.'</td>
            <td>'.$data["name"].'</td>
            <td>'.$data["email"].'</td>
            <td>'.$data["status"].'</td>
            <td>
            <a href="edit.php?uid='.$data["id"].'" class="btn btn-info btn-sm" ><i class="fas fa-edit"></i></a>
            <a href="#" data-toggle="modal" data-target="#delete'.$data["id"].'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
            </td>
        </tr>';

        $sl++;
        ?>



<!-- Modal -->
<div class="modal fade" id="delete<?php echo $data['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation message</h5>
      </div>
      <div class="modal-body">
        Are you sure want to delete this user?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
       <form action="" method="GET">
        <button class="btn btn-danger" name="uid" value="<?php echo $data['id'];?>">Delete</button>
       </form>
      </div>
    </div>
  </div>
</div>
<?php
        }
        ?>
    </tbody>

    </table>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/fontawesome.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>