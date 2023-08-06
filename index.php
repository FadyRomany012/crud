<?php
include_once 'classes/Register.php';
$re= new Register();
if($_SERVER['REQUEST_METHOD']=='POST'){
  $register =$re->addRegister($_POST,$_FILES);
}

if(isset($_GET['delStd'])){
    $id = base64_decode($_GET['delStd']);
    $delStudent = $re->$delStudent($id);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.css"
    />
  </head>
  <body>
    
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-10">
          <div class="card shadow">
         
            <div class="card-header">
              <h2>all shahbander data</h2>
              <div class="row">
                <div class="col-md-6">
                    <a href="addsh.php" class="btn btn-info">add shahbender</a>
                </div>

                <div class="col-md-6"></div>
            </div>
            </div>
            <div class="card-body">
 <table class="table">
    <thead>
        <tr>
            <th>name</th>
            <th>email</th>         
               <th>phone</th>

            <th>photo</th>
            <th>address</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $allStd = $re->allStudent();
        if ($allStd){
            while ($row = mysqli_fetch_assoc($allStd)){
?>
        <tr>
            <td ><?=$row['name']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['phone']?></td>          
            <td><img src="<?=$row['photo']?>" class="img-fluid" ></td>
            <td><?=$row['address']?></td>         
               <td>
                <a href="edit.php?id=<?=base64_encode($row['id'])?>" class="btn btn-warning"> edit</a>           
                     <a href="?delStd=<?=base64_encode($row['id'])?>" onclick="return confirm('Are you sere to delete')" class="btn btn-danger"> delete</a>

               </td>

        </tr>
<?php
            }
        }
        ?>
     
        <tr>
            <td scope="row"></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
 </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  </body>
</html>
