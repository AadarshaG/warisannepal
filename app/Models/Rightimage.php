<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rightimage extends Model
{
    protected $fillable = ['title','image','link','enabled'];

    public function getRules($act = 'add'){
        $rules = [
            'title'=>'required|string',
            'link'=>'nullable|string',
            'image'=>'nullable|image|max:1024'
        ];
        if($act != 'add'){
            $rules['title'] = 'required|string';
        }
        return $rules;
    }
}
