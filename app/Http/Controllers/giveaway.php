<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class giveaway extends Controller
{
    public function requestFromAPI(Request $request){
        //$FMWK = file_get_contents('https://www.reddit.com/user/FMWK/about.json');
        //$FMWK_decoded = json_decode($FMWK, true);
        $this->validate($request, [
            'code' => 'required|min:6|max:6|alpha_num',
            'number' => 'required|numeric',
        ]);

        $code = $request->input('code');
        $number = $request->input('number');
        $keyword = strtolower ( $request->input('keyword') );
        $karma = $request->input('karma');
        $age = $request->input('age');
        $errors = 0;

        $winners = array();
        $BodyWinners = array();//Initial, empty, arrays
        $Other_info = array();

        $initialrequest = file_get_contents('https://api.pushshift.io/reddit/search?link_id='.$code);
        //$file = '/Users/Olly/Desktop/comments.php';
        //$initialrequest = file_get_contents($file);
        $request_decoded = json_decode($initialrequest, true);

        if(isset($_POST['enable_adv'])){
          if($karma != null && $age != null){
            for($i = 0; $i < $number; $i++){
              //Create random Integer. Then convert the body to lowercase and add a space.
              $results   = $request_decoded["metadata"]["results"];
              $random    = random_int (0 ,  $results - 1);
              $post      = $request_decoded["data"][$random];
              $author    = $post["author"];
              if($author != '[deleted]'){
                $U_info    = file_get_contents('https://www.reddit.com/user/'. $author . '/about.json');
                $U_Decoded = json_decode($U_info, true);
                $HTMLBody  = $post["body"];
                $HTMLBody  = strtolower ($HTMLBody);
                $HTMLBody  = substr_replace ( $HTMLBody , " " , 0, 0);
                $userKarma = $U_Decoded["data"]["comment_karma"];
                $userAge   = $U_Decoded["data"]["created_utc"];
                $now = time();
                $resulting_days = round((($now - $userAge)/86400), 0, PHP_ROUND_HALF_UP);  //If this value is above >= 0 the account is viable

                if($resulting_days >= $age && $userKarma >= $karma){
                  if($errors > $results * 2){ // If we encounter *2 as many errors as there are total results, we assume an error.
                    return View::make('layouts.result')->with('status', 'Sorry, we encountered an error with your advanced options');
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
                }else{
                  $i -= 1;
                  $errors += 1;
                }
              }else{
                $i -= 1;
              }
            }
            return View::make('layouts.result', compact('winners'));
          }else if ($karma != null){
            for($i = 0; $i < $number; $i++){
              //Create random Integer. Then convert the body to lowercase and add a space.
              $results   = $request_decoded["metadata"]["results"];
              $random    = random_int (0 ,  $results - 1);
              $post      = $request_decoded["data"][$random];
              $author    = $post["author"];
              if($author != '[deleted]'){
                $U_info    = file_get_contents('https://www.reddit.com/user/'. $author . '/about.json');
                $U_Decoded = json_decode($U_info, true);
                $HTMLBody  = $post["body"];
                $HTMLBody  = strtolower ($HTMLBody);
                $HTMLBody  = substr_replace ( $HTMLBody , " " , 0, 0);
                $userKarma = $U_Decoded["data"]["comment_karma"];

                if($userKarma >= $karma){
                  if($errors > $results * 2){ // If we encounter *2 as many errors as there are total results, we assume an error.
                    return View::make('layouts.result')->with('status', 'Sorry, we encountered an error with your karma option');
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
                }else{
                  $i -= 1;
                  $errors += 1;
                }
              }else{
                $i -= 1;
              }
            }
            return View::make('layouts.result', compact('winners'));
          }else if ($age != null){
            for($i = 0; $i < $number; $i++){
              //Create random Integer. Then convert the body to lowercase and add a space.
              $results   = $request_decoded["metadata"]["results"];
              $random    = random_int (0 ,  $results - 1);
              $post      = $request_decoded["data"][$random];
              $author    = $post["author"];
              if($author != '[deleted]'){
                $U_info    = file_get_contents('https://www.reddit.com/user/'. $author . '/about.json');
                $U_Decoded = json_decode($U_info, true);
                $HTMLBody  = $post["body"];
                $HTMLBody  = strtolower ($HTMLBody);
                $HTMLBody  = substr_replace ( $HTMLBody , " " , 0, 0);
                $userAge   = $U_Decoded["data"]["created_utc"];
                $now = time();
                $resulting_days = round((($now - $userAge)/86400), 0, PHP_ROUND_HALF_UP);  //If this value is above >= 0 the account is viable

                if($resulting_days >= $age){
                  if($errors > $results * 2){ // If we encounter *2 as many errors as there are total results, we assume an error.
                    return View::make('layouts.result')->with('status', 'Sorry, we encountered an error with your account age option');
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
                }else{
                  $i -= 1;
                  $errors += 1;
                }
              }else{
                $i -= 1;
              }
            }
            return View::make('layouts.result', compact('winners'));
          }else{
            return View::make('layouts.result')->with('status', 'Sorry, we encountered an error with your advanced options');
          }

        }else{ // Do this if adv options is NOT ticked

          for($i = 0; $i < $number; $i++){
              //Create random Integer. Then convert the body to lowercase and add a space.
              $results  = $request_decoded["metadata"]["results"];
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
        }
        return View::make('layouts.result', compact('winners'));
    }
}
