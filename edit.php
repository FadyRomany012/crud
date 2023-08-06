<?php
include_once 'classes/Register.php';
$re= new Register();
if(isset($_GET['id'])){
    $id=base64_decode($_GET['id']);
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $register =$re->updateStudent($_POST,$_FILES, $id);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.css"
    />
  </head>
  <body>
    
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-7">
          <div class="card shadow">
            <?php 
if(isset($register)){
  ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong><?=$register?></strong> You should check in on some of those fields below.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  <?php
}
            ?>
            <div class="card-header">
              <h2>edite shahbander</h2>
            </div>
            <div class="card-body">
                <?php
                $getStd = $re->getStdById($id);
                if($getStd){
                    while($row = mysqli_fetch_assoc($getStd)){
                        ?>
            <form method="POST"  enctype="multipart/form-data"  action=" "   >
                <label for=""> Name </label>
                <input
                  type="text"
                  name="name"
                  id=""
                  placeholder="Enter Your Name"
                  class="form-control"
                  value="<?=$row['name']?>"
                />
                <label for=""> Email </label>
                <input
                  type="text"
                  name="email"
                  id=""
                  placeholder="Enter Your Email"
                  class="form-control"
                  value="<?=$row['email']?>"
                />
                <label for=""> Phone </label>
                <input
                  type="text"
                  name="phone"
                  id=""
                  placeholder="Enter Your Phone"
                  class="form-control"            
                  value="<?=$row['phone']?>"

                />
                <label for=""> Photo </label>
                <input
                  type="file"
                  name="photo"
                  id=""
                  placeholder="Enter Your Photo "
                  class="form-control"
                  value="<?=$row['photo']?>"
                />
                <img src="<?=$row['photo']?>" class="img-thumbnail">
                <label for=""> Address </label>
                <textarea
                  name="address"
                  id=""
                  placeholder="Enter Your Address "
                  class="form-control"
                  value="<?=$row['photo']?>"
                >
            <?=$row['address']?>
            </textarea>
                <br />
                <input
                  type="submit"
                  value="Register"
                  class="btn btn-success form-control"
                />
              </form>
                        <?php
                    }
                }

                ?>
     
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  </body>
</html>
