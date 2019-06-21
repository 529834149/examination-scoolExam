<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class PagesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth', ['only' => ['root']]);
    }
	public function root()
    {
        return view('pages.root');
    }
}
