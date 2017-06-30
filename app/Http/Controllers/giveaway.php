<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use RedditAPI;
use App\Winner;
use Illuminate\Support\Collection;




class giveaway extends Controller
{
    public function requestFromAPI(Request $request){

      $this->validate($request, [
          'code' => 'required|min:6|max:6|alpha_num',
          'number' => 'required|numeric',
      ]);


      $id = $request->code;
      $number_of_winners = $request->number;
      $keyword = strtolower ( $request->keyword );
      $karma = $request->karma;
      $age = $request->age;

      $ReditAPI = json_decode( file_get_contents('https://api.pushshift.io/reddit/search?link_id='.$id), true);
      $results = $ReditAPI["metadata"]["results"];

      $n = 0;
      while ($n < $number_of_winners) {
        $w = new Winner([
          "age"         => $age,
          "contestants" => $results,
          "item"        => $ReditAPI["data"],
          "karma"       => $karma,
          "keyword"     => $keyword

        ]);
        $n = $w->count();
      }

      $winners = $w->get();

      // $top = RedditAPI::getTop();
      // dd($top);
      return View::make('layouts.result', compact('winners'));





    }
}
