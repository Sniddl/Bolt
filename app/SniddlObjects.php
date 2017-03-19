<?php

namespace App;
/**
 *
 */
trait SniddlObjects
{
  public static $all = array();

  public static function toObject($array){
    return (object) $array;
  }
  public static function save($data){
    self::$all[] = self::toObject($data);
  }

  public function get(){
    return self::toObject(self::$all);
  }
  public function count(){
    return count(self::$all);
  }
  public function first(){ //doesn't work properly
    return self::toObject(self::$all[0]);
  }
  public function find($n){//doesn't work properly
    try {
      $result = self::toObject(self::$all[$n-1]);
    } catch (Exception $e) {
      throw new Exception("Couldn't find object where index is: $n", 1);
    }
    return $result;
  }

}
