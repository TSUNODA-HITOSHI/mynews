<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    //PHP/Laravel 14課題5
   public static $rules = array(
        '名前(name)' => 'required',
        '性別(gender)' => 'required',
        '趣味(hobby)' => 'required',
        '自己紹介(introduction)',
        );
}
