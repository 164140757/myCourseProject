<!--文档说明
Author：白皓天(Haotian Bai)
Goal：构建动态网站(Building Dynamic Websites)
The Document is written for course project, building dynamic websites.

2019.1.31-2019.2.20
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>homepage</title>
    <meta charset="UTF-8"/>
    <script src="../js/echarts.min.js" type="text/javascript" charset="UTF-8"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript" charset="UTF-8  "></script>
    <link href="../css/diy.css" type="text/css" rel="stylesheet">

</head>
<body>
<div class="header" >
    <div class="header_audio">
        <audio  controls >
            <source src="../audio/Lana%20Del%20Rey%20-%20Young%20And%20Beautiful.mp3" type="audio/mpeg"/>
        </audio>
    </div>
</div>
<h1 align="center">欢迎来到我的测试</h1>

<div id="container" style="width:600px;height:400px;"></div>
<br/>
<script type="text/javascript" >
    function getdata() {
        $.ajax({
            type: "post",
            async: false,
            url: "sub_homepage.php",
            data: {},
            dataType: "json",
            success: function (result) {
                if (result) {
                    for (let i = 0; i < result.length; i++) {
                        products.push(result[i].product);
                        product_ID.push(result[i].product_ID);
                        amount.push(result[i].amount);
                    }

                }
            },
            error: function (errmsg) {
                alert("Ajax data is wrong！" + errmsg);
            }
        });
        // return products, amount;
    }
</script>
<!--    getdata()-->
<script>
//Get data from $varible ->array (js)
var products =[],product_ID=[],amount=[];
//examples like this -> 实现了php变量到js array的转化。

getdata();
// get a echart!

var myChart = echarts.init(document.getElementById('container'));
var options ={
title : {
text:'Fake information for practices'
},
tooltip:{},
legend:{
data:['Numbers']
},
xAxis:{
data:products,
name:"products"
},
yAxis:{},
series:[{
name:'Amount',
type:'bar',/*柱状图*/
data:amount
}]
};

myChart.setOption(options);
</script>
</body>
</html>