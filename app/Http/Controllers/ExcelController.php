<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Models\Class_group;
use App\Models\Grade_group;
use App\Models\Teacher;
class ExcelController extends Controller
{
	
	/**
     * Display a listing of the resource.
     *
     * @msg 获取年级组班级组信息
     */
	public function show_web(Request $request)
	{
		$get_class = Class_group::get_class();
		$get_grade = Grade_group::get_grade();
		$get_teacher = Teacher::get_teacher();
		return view('excel/create',compact('get_class','get_grade','get_teacher'));   
	}
	/**
     * Display a listing of the resource.
     *
     * @msg 导入成绩单
     */
	public function import(Request $request)
	{
		return view('student/list');
		// ini_set('max_execution_time', '0');//设置永不超时，无限执行下去直到结束

        // $filePath = 'excel/import/'.iconv('UTF-8', 'GBK', 'knowledge').'.xlsx';
	
        // Excel::load($filePath, function($reader) {
            // $data = $reader->all();
			// //如果数据存在就自动清空
		// });	
            
	}
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('upload/file');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$file = request()->file('file'); // 获取上传的文件
		if($file==null){
			exit(json_encode(array('code'=>1,'msg'=>'未上传图片')));
		}
		$folder_name = "uploads/file/" . date("Ym/d", time());//文件目录
		$upload_path = public_path() . '/' . $folder_name;
		// 获取文件后缀
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);//后缀名

		$filename = 'file' . '_' . time() . '_' . str_random(10) . '.' . $extension;
	
		// 判断文件是否合法
		if(!in_array($extension,array("xls"))){
			exit(json_encode(array('code'=>1,'msg'=>'上传文件不合法')));
		}
		
		$info = $file->move($upload_path, $filename);// 移动文件到指定目录 没有则创建
		
		$img = $folder_name.'/'.$filename;
		exit(json_encode(array('code'=>200,'data'=>$img)));


    }
	public function import_excel_data(Request $request)
	{
		 $validator = \Validator::make(
		 [
			'grade'=>$request->input('grade'),
			'class'=>$request->input('class'),
			'teacher'=>$request->input('teacher'),
			'month'=>$request->input('month'),
			'file'=>$request->input('file'),
		],[
            'grade'=>'required',
            'class'=>'required',
            'teacher'=>'required',
            'month'=>'required',
            'file'=>'required',
        ]);
        if($validator->fails()){
            return response()->json(['code' => 400,'msg'=>'非法操作，请刷新页面重新填写']);
        }
		
		$filePath = $request->input('file');
		
		$urls = config('app.url').'/'.$filePath;//获取主域名
		Excel::load($filePath, function($reader) {
			$data = $reader->all();
			dd($data);
			
		});
		
		
		
		return response()->json(['code' => 200, 'msg' => '题目没有完全作答']);
		$all = $request->all();
		$file_path = $request->input('file');
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
