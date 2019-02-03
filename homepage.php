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
/*echo json_encode($data);
echo "<br/>";*/
/*{"product":"Chairs","product_ID":"1","amount":"58"}为json数组中的一个单元*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>homepage</title>
    <meta charset="UTF-8"/>
    <script src="../js/echarts/echarts.simple.js" type="text/javascript"></script>
    <script src="../js/jquery/test/jquery.js" type="text/javascript"></script>
</head>
<body>
    <div id="container" style="width=600px;height=400px;"></div>

        <script type="text/javascript">
          Get data from $varible ->array (js)
            let products =[],product_ID=[],amount=[];


            //examples like this -> 实现了php变量到js array的转化。
  function getusers() {
            $.ajax({
                type: "post",
                async: false,
                url: "process.php",
                data: {},
                dataType: "json",
                success: function (result) {
                    if (result) {
                        for (var i = 0; i < result.length; i++) {
                            names.push(result[i].username);
                            ages.push(result[i].age);
                            salaries.push(result[i].salary);
                        }
                    }
                },
                error: function (errmsg) {
                    alert("Ajax data is wrong！" + errmsg);
                }
            });
            return names, ages;
        }*/

// get a echart!
            const myChart = echarts.init(document.getElementById('container'));
            const options ={
                title : {
                  text:'Fake information for practices'
                },
                tooltip:{},
                legend:{
                    data:['Numbers','ID']
                },
                xAxis:{
                    data:{}
                }
            }
        </script>


</body>
</html>