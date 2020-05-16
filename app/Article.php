<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'name', 
        'image', 
        'description', 
        'user_id',
        'category_id'
    ];

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function category() {
    	return $this->belongsTo('App\Category');
    }

    public function scopeNames($articles, $q) {
        if(trim($q)) {
            $articles->where('name', 'LIKE', "%$q%");
        }
    }
    
}
