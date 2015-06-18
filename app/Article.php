<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [  //these are the fields taht are mass assigned - all otehrs are restricted.
        'title', 
        'body',
        'published_at'
        ];
}
