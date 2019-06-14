<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'LaraBBS') - Laravel 进阶教程</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('default/layui-v2.5.4/layui/css/layui.css') }}" media="all">
	@yield('style')
</head>
<body>
    <div id="app" class="{{ route_class() }}-page">
        @include('layouts._header')
        <div class="container">
            @yield('content')
        </div>
        @include('layouts._footer')
    </div>
</body>
@yield('script')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="{{ asset('default/js/echarts.common.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
	var test = window.location.pathname;
	if(test.indexOf("show_student_chart") != -1){
		var dom = document.getElementById("charts");
		var myChart = echarts.init(dom);
		var app = {};
		option = null;
		app.title = '柱状图分数划分';
		var namedate = ['数学', '语文', '英语', '政治', '历史', '生物', '物理'];
		var chinese = $('input[name="chinese"]').val()
		var mathematics = $('input[name="mathematics"]').val()
		var english = $('input[name="english"]').val()
		var politics = $('input[name="politics"]').val()
		var history1 = $('input[name="history"]').val()
		var biology = $('input[name="biology"]').val()
		var physics = $('input[name="physics"]').val()
		
		var numdate = [chinese, mathematics, english, politics, history1, biology, physics];
		var colorlist = [];
		numdate.forEach(element => {
			if (element <90) {
				colorlist.push(["red", "red"])
			} else if (element >= 90 && element < 100) {
				colorlist.push(["green", "green"])
			} else {
				colorlist.push(["black", "black"])
			}
		});
		option = {

			tooltip: {
				trigger: 'axis',
				axisPointer: {            // 坐标轴指示器，坐标轴触发有效
					type: 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
				}
			},
			grid: {
				left: '3%',
				right: '4%',
				bottom: '3%',
				containLabel: true
			},
			xAxis: [
				{
					type: 'category',
					data: namedate,
					axisTick: {
						alignWithLabel: true
					},
					axisLine: {
						lineStyle: {
							color: "#4dd1c4",
							width: 1
						}
					},
					axisLabel: {
						show: true,
						textStyle: {
							color: '#999'
						}
					}
				}
			],
			yAxis: [
				{
					type: 'value',
					axisLabel: {
						formatter: '{value} 分',
						show: true,
						textStyle: {
							color: '#999'
						}
					},
					axisLine: {
						lineStyle: {
							color: "#4dd1c4",
							width: 1
						}
					},
					splitLine: {
						show: true,
						lineStyle: {
							type: 'dashed',
							color: '#ddd'
						}
					}

				}
			],
			series: [
				{
					name: '考试分数',
					type: 'bar',
					barWidth: '60%',
					data: numdate,
					itemStyle: {
						normal: {
							// color: new echarts.graphic.LinearGradient(
							//     0, 0, 0, 1,
							//     [
							//         {offset: 1, color: 'red'},
							//         {offset: 0, color: 'orange'}
							//     ]
							// )
							color: function (params) {
								// var colorList = colorlist;
								// return colorList[params.dataIndex];
								var colorList = colorlist

								var index = params.dataIndex;
								// if(params.dataIndex >= colorList.length){
								//         index=params.dataIndex-colorList.length;
								// }
								return new echarts.graphic.LinearGradient(0, 0, 0, 1,
									[
										{ offset: 1, color: colorList[index][0] },
										{ offset: 0, color: colorList[index][1] }
									]);


							}
						}
					}
				}
			]
		};
		;
		if (option && typeof option === "object") {
			myChart.setOption(option, true);
		}
	}	
</script>
</html>