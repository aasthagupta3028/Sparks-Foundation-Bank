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
    <title>Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
<table class="table table_border">
<thead>
        <tr>
            <th>Sno</th>
            <th>Name</th>
            <th>Balance</th>        
        </tr>

    </thead>
    <tbody>
        
        <?php
        $sel="SELECT * FROM customer";
        $query=$conn->query($sel);
        while($row=$query->fetch_assoc()){
            ?>
        <tr>
            
            <th><?php echo $row['sno'];?></th>
            <th><?php echo $row['name'];?></th>
            <th><?php echo $row['balance'];?></th>
        </tr>
        <?php
        }
        ?>
    </tbody>

</table>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>