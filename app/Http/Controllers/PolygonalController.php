<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class PolygonalController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		
        return view('eacharts.polygonal',compact('id'));
    }
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$id = intval($request->input('id'));
		$get_sorce = Student::select('chinese','mathematics','english','politics','history','biology','physics')->where('id',$id)->get()->toarray();
	
		$data[0]['value'] = $get_sorce[0]['chinese'];
		$data[1]['value'] = $get_sorce[0]['mathematics'];
		$data[2]['value'] = $get_sorce[0]['english'];
		$data[3]['value'] = $get_sorce[0]['politics'];
		$data[4]['value'] = $get_sorce[0]['history'];
		$data[5]['value'] = $get_sorce[0]['biology'];
		$data[6]['value'] = $get_sorce[0]['physics'];
		
		$data[0]['name'] = '语文';
		$data[1]['name'] = '数学';
		$data[2]['name'] = '英语';
		$data[3]['name'] = '政治';
		$data[4]['name'] = '历史';
		$data[5]['name'] = '生物';
		$data[6]['name'] = '物理';

		return response()->json(['code'=>200,'data'=>$data]);
       
    }

}
