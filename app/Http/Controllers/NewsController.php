<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facade\HTML;
use App\News;

class NewsController extends Controller
{
    //
    public function index(Request $request)
    {
      // News::all()はEloquentを使った、全てのnewsテーブルを取得するというメソッド
      // sortByDesc();はカッコの中の値（キー）でソートするためのメソッド
      // sortBy(‘xxx’)：xxxで昇順に並べ換える
      // sortByDesc(‘xxx’)：xxxで降順に並べ換える
      // News::all()->sortByDesc('updated_at')は、「投稿日時順に新しい方から並べる」という意味
      $posts = News::all()->sortByDesc('updated_at');
      
      
      // shift()メソッドは、配列の最初のデータを削除し、その値を返すメソッド
      // $headline = $posts->shift();では、一番最新の記事を変数$headlineに代入し、$postsは代入された最新の記事以外の記事が格納されていること
      if (count($posts) > 0) {
        $headline = $posts->shift();
      } else {
        $headline = null;
      }
      
      
      // news/index.blade.php ファイルを渡している
      // また View テンプレートに headline、 posts、という変数を渡している
      return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
