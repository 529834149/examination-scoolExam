@extends('layouts.app')
@section('title', '首页')

@section('content')
	
<!--工具-->
	
	<table class="layui-table" id="table" lay-filter="test"></table>
	
@stop
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{ asset('default/layui-v2.5.4/layui/layui.js') }}?{{time()}}"></script>
<script>
 var addButton = '<button class=\"layui-btn layui-btn-xs\" onclick=\'openDetial(\"新增编辑\", [\"600px\", \"550px\"], \"./editor.html\", \"ApplicationSave\", null)\'>新增</button>';

layui.use('table', function(){
	var table = layui.table;
	  //第一个实例
	table.render({
		elem: '#table'
		,height: 750
		,even: true 
		,limit: 50
		,url: '/student' //数据接口
		,page: true //开启分页
		//,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
		,cols: [
			[ //表头
				{field: 'id', title: '学号', width:80, sort: true, fixed: 'left'}
				,{field: 'student_name', title: '学生名字', width:120}
				,{field: 'chinese', title: '语文', width:80, sort: true}
				,{field: 'mathematics', title: '数学', width:80} 
				,{field: 'english', title: '英语', width: 80}
				,{field: 'politics', title: '政治', width: 80, sort: true}
				,{field: 'history', title: '历史', width: 80, sort: true}
				,{field: 'biology', title: '生物', width: 80}
				,{field: 'physics', title: '物理', width:80}
				,{field: 'total', title: '总分', width: 80, sort: true}
			 // ,{field: 'year', title: '年份', width: 80, sort: true}
				,{field: 'month', title: '月份', width: 80, sort: true}
			//  ,{field: 'grade_name', title: '年级组', width: 80, sort: true}
			 // ,{field: 'class_name', title: '班级组', width: 80, sort: true}
			 // ,{field: 'position_name', title: '职位', width: 80, sort: true}
			 // ,{field: 'teacher_id', title: '所属老师', width: 80, sort: true}
			  ,{toolbar:'#cellHandle', title: '操作', width: 180}
			]
		]
		,done: function(res, curr, count) { //表格数据加载完后的事件
			
			//如果是异步请求数据方式，res即为你接口返回的信息。
			//如果是直接赋值的方式，res即为：{data: [], count: 99} data为当前页数据、count为数据总长度
			console.log(res);

			//得到当前页码
			console.log(curr);

			//得到数据总量
			console.log(count);
		},
		
		
	});
	//监听工具条
	table.on('tool(test)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
		
		var data = obj.data; //获得当前行数据
		var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
		var tr = obj.tr; //获得当前行 tr 的DOM对象

		if(layEvent === 'statistics'){ //查看
			//页面层
			layer.open({
				closeBtn: 0,
				scrollbar: false,// 屏蔽浏览器滚动
				anim: 1,
				shade: 0.5,
				
				resize:true,
				type: 2,
				title: ['成绩分布图','background-color:#009688;border-bottom:0px solid #eee;color:red;'],
				maxmin: false,
				shadeClose: true, //点击遮罩关闭层
				area : ['700' , '500'],
				content: '/eacharts/'+data.id,
				
				moveOut: true, //是否允许拖动操作
				cancel: function(index, layero){ 
					
				},
				success: function(layero){
					
					
					
				},
			});
			//do somehing
		} else if(layEvent === 'del'){ //删除
			layer.confirm('真的删除行么', function(index){
				obj.del(); //删除对应行（tr）的DOM结构，
				
				layer.close(index);
				//向服务端发送删除指令
			});
		} else if(layEvent === 'polygonal'){ //成绩分布折线图
			//页面层
			layer.open({
				closeBtn: 0,
				scrollbar: false,// 屏蔽浏览器滚动
				anim: 1,
				shade: 0.5,
				resize:true,
				type: 2,
				title: ['成绩分布图','background-color:#009688;border-bottom:0px solid #eee;color:red;'],
				maxmin: false,
				shadeClose: true, //点击遮罩关闭层
				area : ['700' , '500'],
				content: '/polygonal/'+data.id,
				
				moveOut: true, //是否允许拖动操作
				cancel: function(index, layero){ 
					
				},
				success: function(layero){
					
					
					
				},
			});
		}
	});
  
});
</script>

<script type="text/html" id="cellHandle">
	<!--操作工具-->
	<a class=' layui-btn layui-btn-xs' lay-event="statistics" >成绩柱状图</a>
	<a class=' layui-btn layui-btn-xs' lay-event="polygonal" >历史记录</a>
</script>
