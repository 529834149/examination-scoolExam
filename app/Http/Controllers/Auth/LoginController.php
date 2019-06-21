<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
	protected $request;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
		$this->request = $request;
        $this->middleware('guest')->except('logout');
    }
	
	
       // 判断用户名是否是邮箱
	protected function nameIsEmail()
	{
		if (strpos($this->request->post('name'), '@') > 0) {

			return true;
		}
		return false;
	}

    // 覆盖 AuthenticatesUsers validateLogin 方法
    // 在此可以完成我们要做的验证
	protected function validateLogin(Request $request)
	{
		if ($this->nameIsEmail()) {

			$this->validate($request, [
				'name' => 'required|string|email:users,email',
				'password' => 'required|string',
			]);
		}

		$this->validate($request, [
			'name' => 'required|string',
			'password' => 'required|string',
		]);

	}

    // 覆盖 AuthenticatesUsers credentials 方法
    // 注意这里的返回值是数组，这个数组中的数据将用来和数据库做字段对比
	protected function credentials(Request $request)
	{
		if ($this->nameIsEmail()) {

			return array(
				'email' => $this->request->post('name'), // 注意下标为 email，对应数据表中的 email 字段
				'password' => $this->request->post('password')
			);
		}

		return array(
			'name' => $this->request->post('name'), // 注意下标为 name ， 对应数据表中的 name 字段
			'password' => $this->request->post('password')
		);
	}
}
