<?php
header("Content-type=text/json;charset=UTF-8");
/*connect and query*/
if(($connect = mysqli_connect("localhost","root","717398Bht","project"))===false)
{
    printf("Connect failed:%s\n",mysqli_connect_error());
    exit();
}
$query =  "SELECT * FROM products";
$result = mysqli_query($connect,$query);
$data =array();
/*Get data from database*/
Class User{
    public $product;
    public $product_ID;
    public $amount;
}
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $user = new User();
    $user->product_ID = $row['Product_ID'];
    $user->product = $row['Product'];
    $user->amount = $row['Amount'];
    $data[] =$user;
}
mysqli_close($connect);
//check whether data has been imported
echo json_encode($data);
//echo "<br/>";
/*{"product":"Chairs","product_ID":"1","amount":"58"}为json数组中的一个单元*/
?>

