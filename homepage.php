<!DOCTYPE html>
<html lang="en">
<head>
    <title>homepage</title>
    <meta charset="UTF-8"/>
    <script src="../js/echarts.min.js" type="text/javascript" charset="UTF-8"></script>
    <script src="../js/jquery/test/data/jquery-1.9.1.js" type="text/javascript" charset="UTF-8  "></script>
</head>
<body>
<div id="container" style="width=600px;height=400px;"></div>

<script type="text/javascript">
    //Get data from $varible ->array (js)
    let products =[],product_ID=[],amount=[];
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
        return products, amount;
    }
getdata();

    // get a echart!
    const myChart = echarts.init(document.getElementById('container'));
    const options ={
        title : {
            text:'Fake information for practices'
        },
        tooltip:{},
        legend:{
            data:['Numbers']
        },
        xAxis:{
            data:[{name:products}]
        },
        series:{
            name:'Amount',
            type:'bar',/*柱状图*/
            data:[{value:amount}]
        }
    };

    myChart.setOption(options);
</script>


</body>
</html>