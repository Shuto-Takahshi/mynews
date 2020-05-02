<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //
    protected $guarded = ['id'];
    
    public static $rules = [
      'news_id' => 'required',
      'edited_at' => 'required',
    ];
}
