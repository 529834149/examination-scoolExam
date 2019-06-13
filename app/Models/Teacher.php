<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $connection = 'mysql';
    protected $table = 'teacher';
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'id';//定义主键
	
	public static function get_teacher(){
       $data = \DB::connection('mysql')->table('teacher')->get();
	   return $data;
    }
}
