<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title','image'];

    public function getRules($act = 'add'){
        $rules = [
            'title'=>'required|string',
            'image'=>'nullable|image|max:1024'
        ];
        if($act != 'add'){
            $rules['title'] = 'required|string';
        }
        return $rules;
    }

    public function partner()
    {
        return $this->belongsToMany('App\Models\Partner');
    }
}
