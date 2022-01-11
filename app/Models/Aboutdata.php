<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aboutdata extends Model
{
    protected $fillable = ['description','image'];

    public function getRules($act = 'add'){
        $rules = [
            'description'=>'required|string',
            'image'=>'nullable|image|max:2048'
        ];
        if($act != 'add'){
            $rules['description'] = 'required|string';
        }
        return $rules;
    }
}
