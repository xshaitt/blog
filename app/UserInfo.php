<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    public $fillable = ['user_id','profile_photo','nickname','birthday','tag','hobby'];
    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = strtotime($value);
    }
}
