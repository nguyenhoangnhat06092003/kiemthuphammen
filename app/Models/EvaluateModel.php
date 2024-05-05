<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class EvaluateModel extends Model
{
    protected $table = "evaluates";
    public $timestamps = false;
    protected $fillale = [
        'userID', 'content', 'numberStar', 'createdDate'
    ];
}
