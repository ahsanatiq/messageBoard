<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [ 'name', 'detail', 'menu_name', 'status', 'user_id'];

    public static $rules = [
        'name' => 'required|max:255',
        'detail' => 'required',
        'menu_name' => 'required|max:25',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
