<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
class ExcelController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @msg 导入成绩单
     */
	public function import(Request $request)
	{
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
        //
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
