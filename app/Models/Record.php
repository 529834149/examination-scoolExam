<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $connection = 'mysql';
    protected $table = 'record';
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'record_id';//定义主键
}
