<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Grade_group extends Model
{
    protected $connection = 'mysql';
    protected $table = 'grade_group';
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'grade_group_id';//定义主键
	
	public static function get_grade(){
       $data = DB::connection('mysql')->table('grade_group')->get();
	   return $data;
    }
}
