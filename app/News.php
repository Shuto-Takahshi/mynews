<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
  protected $guarded = array('id'); //$guarded: 更新するときに変更してはいけない(id)
  public static $rules = array(
    'title' => 'required',
    'body' => 'required',
  ); // $rules: 入力時の必須項目
  
  public function user()
  {
    return $this->belongsTo('App\User');
  }
  
  public function histories()
  {
    // newsテーブルに関連づいているhistoriesテーブルを全て取得するというメソッド
    return $this->hasMany('App\History');
  }
}
