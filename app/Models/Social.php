<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    public $timestamps = false;
    protected $fillable = [
          'provider_userID',  'provider',  'user'
    ];
    protected $primaryKey = 'userID';
    protected $table = 'social';

}
