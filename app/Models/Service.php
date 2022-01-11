<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['title','image','description','enabled'];

    public function getRules($act = 'add'){
        $rules = [
            'title'=>'required|string',
            'description'=>'nullable|string',
            'image'=>'nullable|image|max:1024'
        ];
        if($act != 'add'){
            $rules['title'] = 'required|string';
        }
        return $rules;
    }
}
