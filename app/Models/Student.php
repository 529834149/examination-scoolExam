<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';//关联的表名称
    protected $primaryKey='id';//表中主键名称user_id
    public $timestamps = false;
}
