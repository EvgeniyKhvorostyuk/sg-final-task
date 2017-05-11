<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'name', 'lastname', 'birth_date', 'e_mail', 'phone_number', 'git_link', 'address', 'about', 'image,'
    ];

    public function user()
    {
    	return $this->belongsTo(\App\User::class);
    }
}
