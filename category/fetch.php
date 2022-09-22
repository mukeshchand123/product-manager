<?php
  session_start();
  if(!isset($_SESSION['login']) || $_SESSION['login']!==true){
      header("location:login.php");
      exit;
  }
  if($_SESSION['flag']==1){

    echo '<script type="text/javascript">
   
                 window.onload = function () { alert("Cannot delete category associated with product."); }
   
                 </script>';
                 $_SESSION['flag']=0;             
  }
//  require_once('query.php');
  require_once('../class/Operation.php');
  $id = $_SESSION['id'];
  $obj = new operation();
$result = $obj->getData('category','*',['userid'=>$id]);


?>

<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<title>PHP|CRUD</title>
</head>
<body>


<div>
<div>
<a href="../view/category.php">Category</a>
         <a href="../view/product.php">Product</a>
         <a href="add.php">Add Category</a>
         <a href="fetch.php">View Category</a>
         <a href="../view/logout.php">Logout</a><br><br>
    </div>

</div>
<div>

    <table align="center" border="1px" width="800px">
<tr>
   <tr> <th colspan="8" ><h2>Category table</h2></th></tr>
    <th ><h2>S.n</h2></th>
    <th ><h2>userid</h2></th>
    <th><h2>Cat-Name</h2></th>
    <th><h2>Cat-Description</h2></th>
    <th><h2>Action</h2></th>

    
</tr>
<?php
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
        echo"
        <tr>
            <td>".$row['id']."</td>
            <td>".$row['userid']."</td>
            <td>".$row['name']."</td>
            <td>".$row['description']."</td>
            
            <td><a href='delete.php ? i=$row[id]'>Delete <a href='update.php ? i=$row[id]'>Update </td>
        </tr> ";         
            

     }
     ?>
</tablw>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
