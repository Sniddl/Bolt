<?php

namespace App;
use App\Account;
use Exception;

class Winner{
  use SniddlObjects;

  public function __construct(Array $a){
    $random     = random_int(0, $a['contestants'] - 1);
    $this->res  = $a['item'][$random];
    $continue   = true;
    $account = new Account($this->res['author']);
    dd($account);
    $this->res['account'] = $account->res;

      if ( !empty($a['age']) && $continue){
        $requiredAge = time() - $a['age']*24*60*60;
        $continue = $account->res['created'] <= $requiredAge;
      }
      if ( !empty($a['karma']) && $continue){
        $continue = $account->res['comment_karma'] >= $a['karma'];
      }
      if (!empty($a['keyword']) && $continue){
        $body = $this->res['body'];
        $body = strtolower($body);
        $body = substr_replace($body, " ", 0, 0);
        $continue = strpos($body, $a['keyword']) ;
      }

      $continue ? Winner::save($this->res) : null;

  }



}
