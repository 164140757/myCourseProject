
<!DOCTYPE html>
<html lang="en">
<head>
    <title>homepage</title>
    <meta charset="UTF-8"/>
    <script src="../js/echarts.min.js" type="text/javascript" charset="UTF-8"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript" charset="UTF-8  "></script>
</head>
<body>
<div id="container" style="width:600px;height:400px;"></div>

<script type="text/javascript">
    //Get data from $varible ->array (js)
    var products =[],product_ID=[],amount=[];
    //examples like this -> 实现了php变量到js array的转化。

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
           data:products
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