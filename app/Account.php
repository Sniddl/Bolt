<?php
namespace App;
use Exception;
use View;
use Carbon\Carbon;

class Account
{
  use SniddlObjects;

  function __construct($account)
  {
    try {
      $ReditAPI = ($account == '[deleted]') ?: json_decode(file_get_contents('https://www.reddit.com/user/'. $account . '/about.json'), true);
    } catch (Exception $e) {
      return View::make('layouts.error')->with('status', 'Sorry, we encountered an error with your karma option');
    }
    $this->res = $ReditAPI['data'];
    $this->res['age'] = Carbon::createFromTimestamp($this->res['created'])->diffForHumans(null, true);
    Account::save($this->res);
  }



}
