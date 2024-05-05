<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluate extends Model
{
    protected $table = 'evaluates';

    public $timestamps = false;

    protected $fillable = [
        'userId', 'content', 'numberStar', 'createdDate'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }


}
