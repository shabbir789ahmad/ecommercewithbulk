<?php
namespace App\Http\Traits;
use App\Models\User;

trait UserTrait{

  function user($id)
  {
  	$user=User::findorfail($id);

  	return $user;
  }
}
?>