<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$pagenNum=$request->input('page');
        $limit=$request->input('limit');
        $count=Record::count();
        $page=$pagenNum-1;
            if ($page != 0) {
                $page = $limit * $page;
                $limit=$limit*$pagenNum;
            }
        $get_recond = Record::offset($page)->limit($limit)->get()->toArray();
		$data = [];
		foreach($get_recond as $k=>$v){
			$data[$k]['record_id'] = $v['record_id'];
			$data[$k]['student_name'] = $v['student_name'];
			$data[$k]['chinese'] = $v['chinese'];
			$data[$k]['mathematics'] = $v['mathematics'];
			$data[$k]['english'] = $v['english'];
			$data[$k]['politics'] = $v['politics'];
			$data[$k]['history'] = $v['history'];
			$data[$k]['biology'] = $v['biology'];
			$data[$k]['physics'] = $v['physics'];
			$data[$k]['total'] = $v['total'];
			$data[$k]['year'] = $v['year'];
			$data[$k]['month'] = $v['month'];
			$data[$k]['grade_name'] = $v['grade_name'];
			$data[$k]['class_name'] = $v['class_name'];		
		}
		$list['code'] = 0;
		$list['msg'] = '';
		$list['count'] =Record::count();
		$list['data'] = $data;

		return response()->json($list);
    }
	public function chart(Request $request,$id)
	{	
		$record = Record::select('chinese','mathematics','english','politics','history','biology','physics')->find($id);
		$data = [];
		array_push($data,$record['chinese']);
		array_push($data,$record['mathematics']);
		array_push($data,$record['english']);
		array_push($data,$record['politics']);
		array_push($data,$record['history']);
		array_push($data,$record['biology']);
		array_push($data,$record['physics']);
		return view('pages.chart',compact('data'));
	}
	
}
