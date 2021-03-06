<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    public function users(){
        return $this->belongsToMany(\App\User::class);
    }

    public function image() {
        return asset('img/badges/') . '/' . $this->img_path;
    }

    public static function assign($user_id, $badge_id) {
        $user = \App\User::find($user_id);
        $badge = \App\Badge::find($badge_id);

        $user->badges()->attach($badge_id);

        $message = new \App\Message();
        $message->sender_id = null;
        $message->receiver_id = $user_id;
        $message->subject = 'You have earned a badge!!!';
        $message->content = "<p> This is so awesome. You earned the badge: </p> 
                             <h5> $badge->title </h5>
                             <img src='{$badge->image()}' alt='$badge->title'>
                             <p>$badge->description</p>";

        $message->save();

    }
}
