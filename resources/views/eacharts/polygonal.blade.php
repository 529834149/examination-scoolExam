<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
    <!-- 引入 echarts.js -->
    <!-- 这里是加载刚下好的echarts.min.js，注意路径 -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/default/js/echarts.min.js"></script>
</head>
<body>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="height:500px;"></div>
	
	<input type="hidden" name="student_id" id="student_id" value="{{$id}}"> 
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        var option={
            backgroundColor: '#2c343c',
            textStyle: {
                        color: 'rgba(255, 255, 255, 0.3)'
                    },
            series : [
                {
                    name: '访问来源',
                    type: 'pie',
                    radius: '30%',
                    // data:[
                        // {value:400, name:'搜索引擎'},
                        // {value:335, name:'直接访问'},
                        // {value:310, name:'邮件营销'},
                        // {value:274, name:'联盟广告'},
                        // {value:235, name:'视频广告'}
                    // ],
					data : (function(){
						var arr=[];
						$.ajax({
							type : "post",
							async : false, //同步执行
							url : "/polygonal",
							data : {
								id:$('#student_id').val()
							},
							dataType : "json", //返回数据形式为json
							success : function(msg) {
								var result = msg.data;
								if (msg.code == 200) {
									for(var i=0;i<result.length;i++){
										arr.push(result[i]);
									}    
								}
													
							},
							error : function(errorMsg) {
								alert("不好意思,图表请求数据失败啦!");
								 myChart.hideLoading();
							}
						})
						return arr;
					})() ,
                    roseType: 'angle',

                    itemStyle: {
                        emphasis: {
                            shadowBlur: 200,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    },
                    label: {
                        normal: {
                            textStyle: {
                                color: 'rgba(255, 255, 255, 0.3)'
                            }
                        }
                    },
                    labelLine: {
                        normal: {
                            lineStyle: {
                                color: 'rgba(255, 255, 255, 0.3)'
                            }
                        }
                    }

                }
            ]
        }


        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);

    </script>
</body>
</html>