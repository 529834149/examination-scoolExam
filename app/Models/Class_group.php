<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Class_group extends Model
{
    protected $connection = 'mysql';
    protected $table = 'class_group';
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'class_id';//定义主键
	public static function get_class(){
       $data =DB::connection('mysql')->table('class_group')->get();
	   return $data;
    }
}
