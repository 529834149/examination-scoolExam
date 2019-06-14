<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function root()
    {
        return view('pages.root');
    }
	/**
	* @msg 选择学校进入
	*/
	public function school()
	{
		return view('pages.school');
	}
}
