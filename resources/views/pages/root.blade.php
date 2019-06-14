@extends('layouts.app')

@section('title', '首页')

@section('style')

	
@stop
@section('content')

	<h3>昌隆镇七年二班成绩</h3>
	<table id="student"  lay-filter="test"></table>
	<blockquote>
	 <p> 注意：本网站只适用于昌隆一贯制学校七年二班学生成绩报表，如需要联系版主:qq：529834149另需开发</p>
	</blockquote>
@stop
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{ asset('default/layui-v2.5.4/layui/layui.js') }}"></script>
<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-xs" lay-event="chart">统计</a>
 <!-- <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>-->
  

</script>
<script>
layui.use('table', function(){
	var table = layui.table;
	  //第一个实例
	table.render({
		elem: '#student'
		,height: 700
		,limit :15
		,url: '/get_student_data' //数据接口
		,page: true //开启分页
		,cols: [[ //表头
			{field: 'record_id', title: '学号', width:80, fixed: 'left'}
			,{field: 'student_name', title: '学生名字', width:80}
			,{field: 'chinese', title: '语文', width:80, sort: true}
			,{field: 'mathematics', title: '数学', width:80,sort: true} 
			,{field: 'english', title: '英语', width: 80,sort: true}
			,{field: 'politics', title: '政治', width: 80, sort: true}
			,{field: 'history', title: '历史', width: 80, sort: true}
			,{field: 'biology', title: '生物', width: 80,sort: true}
			,{field: 'physics', title: '物理', width: 80, sort: true}
			,{field: 'total', title: '总成绩', width: 80, sort: true}
			,{field: 'year', title: '年份', width: 80, sort: true}
			,{field: 'month', title: '月份', width: 80, sort: true}
			,{field: 'grade_name', title: '年级组', width: 80}
			,{field: 'class_name', title: '班级组', width: 80}
			,{fixed: 'right', width:150,title: '操作', align:'center', toolbar: '#barDemo'}
		]]
	  });							
		table.on('tool(test)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
			var data = obj.data; //获得当前行数据
		
			var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
		 
			var tr = obj.tr; //获得当前行 tr 的DOM对象
		 
		if(layEvent === 'chart'){ //统计图
				//主要处理当前学生与上个月成绩曲线图
			//进行弹框显示
			window.location.href= 'show_student_chart/'+data.record_id;
			// layer.confirm('上个月与本月成绩是否生成图标', function(index){
				// layer.open({
					// closeBtn: 0,
					// scrollbar: false,// 屏蔽浏览器滚动
					// anim: 1,
					// shade: 0.5,
					// resize:false,
					// type: 2,
					// title: ['成绩分布图','background-color:#004F8E;border-bottom:0px solid #eee;;'],
					// maxmin: false,
					// shadeClose: false, //点击遮罩关闭层
					// area : ['100%' , '100%'],
					// content: 'show_student_chart/'+data.record_id,
					// //closeBtn: 0,//关闭当前按钮
					// //moveOut: true, 是否允许拖动操作
					// //弹出时成功回调
					 // // success: function(layero, index){
						// // console.log(layero, index);
					  // // }
					// cancel: function(index, layero){ 
					  
					// },
					// success: function(layero){
						// //$('#lookReport').css('display','block');
						// //layero.find('.layui-layer-min').remove();
						// //layero.find('.layui-layer-max').remove();
						// //layero.find('.layui-layer-title').remove();
						// // layui-layer-title  background-color:#004F8E;      /* border-bottom: 1px solid #eee; */
						
					// },
				// });
				
				// layer.close(index);
			  // //向服务端发送删除指令
			// });
			//do somehing
		} else if(layEvent === 'del'){ //删除
				layer.confirm('真的删除行么', function(index){
				layer.close(index);
			  
				//向服务端发送删除指令
			});
		} else if(layEvent === 'edit'){ //编辑
			//do something
			
			//同步更新缓存对应的值
			obj.update({
			  username: '123'
			  ,title: 'xxx'
			});
		}
	});
      
});
 
</script>

