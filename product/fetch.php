<?php
  session_start();
  if(!isset($_SESSION['login']) || $_SESSION['login']!==true){
      header("location:login.php");
      exit;
  }
//  require_once('query.php');
  require_once('../class/Operation.php');
$name = "";
  $flag = 1;
  $id = $_SESSION['id'];
  $obj = new operation();
$result = $obj->getData('product','*',['userid'=>$id]);

if($_SERVER ['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['dropdown'];
    $flag = 0;
   // echo $name;
    
   

}


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
<?php require_once("../view/nav3.php"); ?>
</div>
<div class="container">
    <!-- product according to category -->
    <form action="fetch.php" method="post">
    <label for="productCategory">Product Category</label>
                  <select name = "dropdown" required>
                    <!-- <?php //while ($row = $result->fetch(PDO::FETCH_ASSOC)) {?> -->
                       <?php $res = $obj->getData('category','*',['userid'=>$id]);
                            while ($row1 = $res->fetch(PDO::FETCH_ASSOC)){
                       ?>
                        <option value = "<?php echo $row1['name']?>" selected><?php echo $row1['name']?></option>
                    <?php } ?>
                    <input class=" btn-primary" type="submit" name="create" value="Select">
                   
                  </select><br><br>

    </form>
</div>
<div>

    <table align="center" border="1px" width="800px">
<tr>
   <tr> <th colspan="8" ><h2>Product table</h2></th></tr>
    <th ><h2>S.n</h2></th>
    <th ><h2>userid</h2></th>
    <th><h2>Product-Name</h2></th>
    <th><h2>Product-category</h2></th>
    <th><h2>Product-price</h2></th>
    <th><h2>Product-Image</h2></th>
    <th><h2>Action</h2></th>

    
</tr>
<?php
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
        $res =  $obj->getData('category','*',['id'=>$row['category']]);
        $row1 = $res->fetch(PDO::FETCH_ASSOC);
        if($flag == 1 || $name == $row1['name']){
        echo"
        <tr>
            <td>".$row['id']."</td>
            <td>".$row['userid']."</td>
            <td>".$row['name']."</td>
            <td>".$row1['name']."</td>
            <td>".$row['price']."</td>
            <td>".$row['image']."</td>
            
            <td><a href='delete.php ? i=$row[id]'>Delete <a href='update.php ? i=$row[id]&j=$row[category]'>Update </td>
        </tr> ";         
            

     }}
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
