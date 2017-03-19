<?php
namespace App;
use Exception;
use View;
use Carbon\Carbon;
use Illuminate\Routing\Redirector;

class Account
{
  use SniddlObjects;

  function __construct($account)
  {
    //dd('cats');
    if ($account != '[deleted]'){
      try {
          $ReditAPI = json_decode(file_get_contents('https://www.reddit.com/user/'. $account . '/about.json'), true);
          $this->res = $ReditAPI['data'];
          $this->res['age'] = Carbon::createFromTimestamp($this->res['created'])->diffForHumans(null, true);
          Account::save($this->res);
      } catch (Exception $e) {
        abort(403, "$e");
      }
    }

  }



}
