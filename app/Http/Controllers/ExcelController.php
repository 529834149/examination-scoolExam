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
		ini_set('max_execution_time', '0');//设置永不超时，无限执行下去直到结束
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
		if(!in_array($extension,array("xls","xlsx"))){
			exit(json_encode(array('code'=>1,'msg'=>'上传文件不合法')));
		}
		
		$info = $file->move($upload_path, $filename);// 移动文件到指定目录 没有则创建
		$img = $folder_name.'/'.$filename;
		exit(json_encode(array('code'=>200,'data'=>$img)));


    }
	public function import(Request $request)
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
		try{
			$filePath = $request->input('file');	
			$urls = config('app.url').'/'.$filePath;//获取主域名
			//ini_set('max_execution_time', '0');//设置永不超时，无限执行下去直到结束
			$param = array(
				'grade'=>$request->input('grade'),
				'class'=>$request->input('class'),
				'teacher'=>$request->input('teacher'),
				'month'=>$request->input('month'),
				'file'=>$request->input('file'),
			);
			
			Excel::load($filePath, function($reader) use($param) {
		
				$reader = $reader->getSheet(0);//excel第一张sheet
				$results = $reader->toArray();
				unset($results[0]);//去除表头
				unset($results[1]);
				//数据库
				$data = [];
				foreach($results as $k=>$v){
				
					if($v['2']){
						$data[$k]['student_name'] = $v['0'];
						$data[$k]['chinese'] = intval($v['1']);//语文
						$data[$k]['mathematics'] = intval($v['2']);//数学
						$data[$k]['english'] = intval($v['3']);//英语
						$data[$k]['politics'] = intval($v['4']);//政治
						$data[$k]['history'] = intval($v['5']);//历史
						$data[$k]['biology'] = intval($v['6']);//生物
						$data[$k]['physics'] = intval($v['7']);//物理
						$data[$k]['total'] = intval($v['8']);//总分  
						$data[$k]['year'] =intval(date('Y'));//年  
						$data[$k]['grade_name'] =intval($param['grade']);//年级  
						$data[$k]['class_name'] =intval($param['class']);//班级  
						$data[$k]['position_name'] ='学生';//职位  
						$data[$k]['school_id'] =1;//学校  
						$data[$k]['teacher_id'] =intval($param['teacher']);
						$data[$k]['month'] =intval($param['month']);
					}
					continue;
				}
				$datas = \DB::table('record')->insert($data);
			});
			return response()->json(['code' => 200,'msg'=>' 导入成功']);
		}catch ( \Exception $e){
			if($e->getCode() ==0){
				return response()->json(['code' => 400,'msg'=>' 网络错误']);
			}
		}
		
		
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
