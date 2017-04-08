<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable = ['user_id', 'name', 'email', 'company', 'phone', 'mobile', 'linkedin', 'twitter', 'facebook', 'website', 'address', 'dob', 'notes', 'relation_ship','country_id', 'state_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
