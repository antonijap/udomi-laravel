<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model

{
  protected $fillable = [
      'name',
      'description',
      'user_id',
      'sex',
      'age',
      'type',
      'castration',
      'sterilization',
      'invalidity',
      'slug',
      'location',
      'vaccines',
      'chip',
      'fileuploader-list-files',
      'is_adopted'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function photos()
  {
    return $this->hasMany(AdPhotos::class);
  }
}
