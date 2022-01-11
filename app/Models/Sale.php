<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['title','image','description','cashback','discount','reward'];

    public function getRules($act = 'add'){
        $rules = [
            'title'=>'required|string',
            'description'=>'nullable|string',
            'discount'=>'nullable|string',
            'cashback'=>'nullable|string',
            'reward'=>'nullable|string',
            'image'=>'nullable|image|max:1024'
        ];
        if($act != 'add'){
            $rules['title'] = 'required|string';
        }
        return $rules;
    }
}
