<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['title','description','image','vendor_number','country',
        'users','discount'];

    public function getRules($act = 'add'){
        $rules = [
            'title'=>'required|string',
            'description'=>'nullable|string',
            'image'=>'nullable|image|max:2048',
            'vendor_number'=>'nullable|string',
            'country'=>'nullable|string',
            'users'=>'nullable|string',
            'discount'=>'nullable|string'
        ];
        if($act != 'add'){
            $rules['title'] = 'required|string';
        }
        return $rules;
    }
}
