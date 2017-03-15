<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [ 'name', 'detail', 'image', 'type', 'private_email', 'user_id'];

    public static $rules = [
        'name' => 'required|max:255',
        'detail' => 'required',
        'type' => 'required|in:public,private'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
