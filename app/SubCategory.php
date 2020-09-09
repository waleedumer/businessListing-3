<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    protected $fillable=['category_id','icon_class','name','slug','thumbnail'];
}
