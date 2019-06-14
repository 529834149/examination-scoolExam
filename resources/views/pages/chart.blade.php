@extends('layouts.app')

@section('title', '首页')

@section('content')
<h3>学生本次成绩统计</h3>
<div id="charts" style=" width: 600px;height: 300px;"></div>
<input  type="hidden"  name="chinese" value="{{$data[0]}}">
<input  type="hidden"  name="mathematics" value="{{$data[1]}}">
<input  type="hidden"  name="english" value="{{$data[2]}}">
<input  type="hidden"  name="politics" value="{{$data[3]}}">
<input  type="hidden"  name="history" value="{{$data[4]}}">
<input  type="hidden"  name="biology" value="{{$data[5]}}">
<input  type="hidden"  name="physics" value="{{$data[6]}}">
@stop
@section('script')
	
	
	
@stop


