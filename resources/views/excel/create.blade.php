@extends('layouts.app')

@section('title', '首页')

@section('style')

	
@stop
@section('content')

<form class="layui-form">

	<div class="layui-form-item">
		<label class="layui-form-label">年级组</label>
		<div class="layui-input-block">
			<select name="grade" lay-verify="required">
				@if(!count($get_grade))
					<option value="">暂无信息</option>
				@else
					<><option value="">请选择</option>
					@foreach($get_grade as $k=>$v)
						<option value="{{$v->grade_group_id}}">{{$v->grade_name}}</option>
					@endforeach
				@endif
				
			</select>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">班级</label>
		<div class="layui-input-block">
			<select name="class" lay-verify="required">
				@if(!count($get_class))
					<option value="">暂无信息</option>
				@else
					<option value="">请选择</option>
					@foreach($get_class as $k=>$v)
						<option value="{{$v->class_id}}">{{$v->class_name}}</option>
					@endforeach
				@endif
				
			</select>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">班主任</label>
		<div class="layui-input-block">
			<select name="teacher" lay-verify="required">
				@if(!count($get_teacher))
					<option value="">暂无信息</option>
				@else
					<option value="">请选择</option>
					@foreach($get_teacher as $k=>$v)
						<option value="{{$v->id}}">{{$v->teacher_name}}</option>
					@endforeach
				@endif
				
			</select>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">月考</label>
		<div class="layui-input-block">
			<select name="month" lay-verify="required">
				<option value="">请选择</option>
				<option value="1">一月</option>
				<option value="2">二月</option>
				<option value="3">三月</option>
				<option value="4">四月</option>
				<option value="5">五月</option>
				<option value="6">六月</option>
				<option value="7">七月</option>
				<option value="8">八月</option>
				<option value="9">九月</option>
				<option value="10">十月</option>
				<option value="11">十一月</option>
				<option value="12">十二月</option>
				<option value="13">期中</option>
				<option value="14">期末</option>
			</select>
		</div>
	</div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="layui-form-item">
		<label class="layui-form-label">图片</label>
		<div class="layui-input-block">
			<button class="layui-btn layui-btn-sm" onclick="return false;" id="upload">
				<i class="layui-icon">&#xe67c;</i>上传成绩单(xls文件)
			</button><span id="statu" style="color:green;display:none"><i class="layui-icon">&#xe605;</i></span>
			<input type="hidden" name="file" value="" id="preview" lay-verify="required">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">下载</label>
		<div class="layui-input-block">
			<button class="layui-btn-norma layui-btn-sm">
				<i class="layui-icon">&#xe601</i><a href="{{ asset('default/excel/import/demo.xls') }}">下载案例模版(xls文件)</a>
			</button>
		</div>
	</div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="submit_data" id="commit" onclick="return false">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>

@stop
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{ asset('default/layui-v2.5.4/layui/layui.js') }}"></script>
<script>

 layui.use(['form', 'layer', 'upload'], function(){
	var form = layui.form; 
	var $ = layui.jquery;
	var upload = layui.upload;
	var layer = layui.layer;
	upload.render({
		elem: '#upload',
		url: '/upload_file',
		accept:'file',
		auto: true,//选择文件后不自动上传
		bindAction: '#commit',
		//上传前的回调
		before: function () {
			this.data = {
				_token: $('input[name="_token"]').val()
			}
			
		},
		//选择文件后的回调
		choose: function (obj) {
			obj.preview(function (index, file, result) {
				$('#preview').attr('value', result);
			})
		},
		//操作成功的回调
		done: function (res, index, upload) {
			if(res.code ==200){
				$('#preview').attr('value', res.data);
				$('#statu').html('上传成功');
				$('#statu').css('display','block');
			}	
		},
		//上传错误回调
		error: function (index, upload) {
			layer.alert('上传失败！');
		} 
	});
	// //监听提交
	form.on('submit(submit_data)', function(data){
		var data = data.field;
		$.ajax({
			url:'/excel/import',
			method:'post',
			 headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data:data,
			dataType:'json',
			beforeSend:function(){
				// 加载层
				var index = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
			},
			success:function(res){
				
				if(res.code ==400){
					layer.closeAll('loading'); 
					layer.msg(res.msg);
					setTimeout(function() {
						parent.window.location.reload();
					}, 2000);
					return false;
				}else{
					layer.closeAll('loading'); 
					layer.msg("导入成功...",function(){
					  window.location.href="/teachers/manage/students" 
					},2000);
				}
				
			},
			
		})
		
	});
});
</script>

