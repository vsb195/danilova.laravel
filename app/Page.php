<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{    
    protected $table="pages";
	protected $fillable=['title', 'content', 'meta_description', 'meta_keywords', 'public'];
}
