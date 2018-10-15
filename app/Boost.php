<?php

namespace App;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Boost extends Model
{
  protected $fillable = [
      'user_id',
      'cooldown'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function isAvailable()
  {
    $last = $this->user->boost->updated_at;
    $cooldown = $this->user->boost->cooldown;
    $now = Carbon::now();
    $next = $last->addHours($cooldown);

    if ($now->gte($next)){
      return true;
    } else {
      return false;
    }
  }

  public function nextBoostAvailable()
  {
    $last = $this->user->boost->updated_at;
    $cooldown = $this->user->boost->cooldown;
    $now = Carbon::now();

    $next = $last->addHours($cooldown);

    if ($next->gt($now)) {
      return 'Idući Boost za ' . $next->diffInHours() . ' sati';
    } else {
      return null;
    }

  }

}
