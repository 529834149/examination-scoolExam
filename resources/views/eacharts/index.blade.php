<!DOCTYPE html>
<head>
    <meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ECharts</title>
</head>
<body>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="height:400px"></div>
	<input type="hidden" name="student_id" id="student_id" value="{{$id}}">
    <!-- ECharts单文件引入 -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="http://echarts.baidu.com/build/dist/echarts.js"></script>
    <script type="text/javascript">

        // 路径配置
        require.config({
            paths: {
                echarts: 'http://echarts.baidu.com/build/dist'
            }
        });
        
        // 使用
        require(
            [
                'echarts',
                'echarts/chart/bar' // 使用柱状图就加载bar模块，按需加载
            ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                var myChart = ec.init(document.getElementById('main')); 
				// myChart.showLoading({
					// text: '正在努力的读取数据中...',    //loading话术
				// });
                var option = {
					
                    tooltip: {
                        show: true
                    },
                    legend: {
                          data:['分数']
                    },
                    xAxis : [
                        {
                            type : 'category',
                            data : ["语文","数学","英语","政治","历史","生物","物理"]
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value'
                        }
                    ],
                    series : [
                        {
							name:'分数',
							type:'bar',
							data : (function(){
								var arr=[];
								$.ajax({
									type : "post",
									async : false, //同步执行
									url : "/eacharts",
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
							})() 

                        }
                    ]
                };
        
                // 为echarts对象加载数据 
                myChart.setOption(option); 
            }
        );
    </script>
</body>