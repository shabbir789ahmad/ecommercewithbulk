<?php
namespace App\Http\Traits;
trait ImageTrait{

  function getimage()
  { 
     
  	 $req=app('request');
      
  	if($req->hasfile('image'))
    {
      $file=$req->file('image');
       $ext=$file->getClientOriginalExtension();
       $filename=time(). '.' .$ext;
       $file->move('uploads/img/', $filename);
       $image=$filename;
     
    }

    return $image;
  }

 
}
?>