<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    public $table = 'messages';

    public function MessageSender (){
        return $this->belongsTo('App\Users','sender_id','id');
    }

    public function MessageRecipient (){
        return $this->belongsTo('App\Users','recipient_id','id');
    }
}
