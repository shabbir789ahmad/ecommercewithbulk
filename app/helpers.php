<?php

use Illuminate\Support\Facades\Auth;

  function imagehelper()
  {
  	$request=app('request');
     if($request->hasfile('image'))
       {
         $images=[ 'category_image'=>$this->image()];
       }
  }
?>