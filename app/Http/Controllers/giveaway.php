<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class giveaway extends Controller
{
    public function requestFromAPI(Request $request){

      $this->validate($request, [
          'code' => 'required|min:6|max:6|alpha_num',
          'number' => 'required|numeric',
      ]);

        $code = $request->input('code');
        $number = $request->input('number');
        $keyword = strtolower ( $request->input('keyword') );
        $errors = 0;

        $winners = array();
        $BodyWinners = array();//Initial, empty, arrays
        $Winners = array();

        $initialrequest = file_get_contents('https://api.pushshift.io/reddit/search?link_id='.$code);
        //$file = '/Users/Olly/Desktop/comments.php';
        //$initialrequest = file_get_contents($file);
        $request_decoded = json_decode($initialrequest, true);

        for($i = 0; $i < $number; $i++){
            //Create random Integer. Then convert the body to lowercase and add a space.
            $results = $request_decoded["metadata"]["results"];
            $random   = random_int (0 ,  $results - 1);
            $post     = $request_decoded["data"][$random];
            $HTMLBody = $post["body"];
            $HTMLBody = strtolower ($HTMLBody);
            $HTMLBody = substr_replace ( $HTMLBody , " " , 0, 0);


            if($errors > $results * 2){ // If we encounter *2 as many errors as there are total results, we assume an error.
              return View::make('layouts.result')->with('status', 'Sorry, we encountered an error!');
            }else{
              if($keyword == null){ //If no keyword is submitted, winners are based off only the random int
                array_push($winners, $post);
                // array_push($BodyWinners, $post["body"]);
                // array_push($Winners, $post["author"]);
              }else{
                if(strpos ($HTMLBody, $keyword)){// Uses a lowerscase version of the body and checks if the keyword is present
                  if(in_array($post/*["author"]*/, $winners)){// Checks if this winner has already been chose, if so, redo.
                    $i -= 1;
                  }else{
                    array_push($winners, $post);
                    // array_push($BodyWinners, $post["body"]);
                    // array_push($Winners, $post["author"]);
                  }
                }else{ //If keyword is not found in body, redo
                    $i -= 1;
                    $errors += 1;
                }
              }
            }
        }
        return View::make('layouts.result', compact('winners'));
    }
}
