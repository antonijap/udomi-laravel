<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{

  use Notifiable;

  protected $fillable = [
      'name',
      'email',
      'password',
      'username'
  ];

  public function clean($name)
  {
    $query = str_replace("Č", "c", $name);
    $query = str_replace("č", "c", $query);
    $query = str_replace("Ć", "c", $query);
    $query = str_replace("ć", "c", $query);
    $query = str_replace("Ž", "z", $query);
    $query = str_replace("ž", "z", $query);
    $query = str_replace("Đ", "d", $query);
    $query = str_replace("đ", "d", $query);
    $query = str_replace("Š", "s", $query);
    $query = str_replace("š", "s", $query);
    $query = str_replace(" ", "-", $query);
    $query = str_replace('"', '', $query);
    $query = stripslashes($query);
    return preg_replace('/[^A-Za-z0-9\-]/', '', Str::lower($query));
  }

  public function ads()
  {
    return $this->hasMany(Ad::class);
  }

  public function boost()
  {
    return $this->hasOne(Boost::class);
  }
}
