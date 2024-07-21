<?php
$servername = "localhost";
$username="root";
$password="";
$database="transfers";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{ echo"<script>alert('cannot connect to the database');
    </script>";
    exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Money Transfer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Sender name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="sen">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Reciever name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="rec">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Amount</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="amo">
    <div id="emailHelp" class="form-text">Enter the amount you want to transfer</div>
  </div>
 
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
<?php
if (isset($_POST['submit'])) {
    if(!empty($_POST['sen'])&& !empty($_POST['rec'])&&!empty($_POST['amo'])){
      $sender=$_POST['sen'];
      $reciever=$_POST['rec'];
      $amount=$_POST['amo'];
      $query="INSERT INTO `recent` (`sender`, `reciever`, `amount`) VALUES ('$sender', '$reciever', '$amount')";
      $run=mysqli_query($conn,$query);
      $sqls="SELECT * FROM `customer` WHERE `name`='$sender'";
      $results=mysqli_query($conn,$sqls);
      $sqlr="SELECT * FROM `customer` WHERE `name`='$reciever'";
      $resultr=mysqli_query($conn,$sqlr);
      $rows=mysqli_fetch_assoc($results);
      $rows1=$rows['balance']-$amount;
      $rowr=mysqli_fetch_assoc($resultr);
      $rowr1=$rowr['balance']+$amount;
      $sqls1="UPDATE `customer` SET `balance`='$rows1' WHERE `name`='$sender'";
      $results1=mysqli_query($conn,$sqls1);
      $sqlr1="UPDATE `customer` SET `balance`='$rowr1' WHERE `name`='$reciever'";
      $resultr1=mysqli_query($conn,$sqlr1);

}
    else
    {
      echo"<script>alert('All fields are required');
    </script>";
    }
  }
?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>