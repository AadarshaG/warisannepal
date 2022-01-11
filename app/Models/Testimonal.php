<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonal extends Model
{
    protected $fillable = ['title','description','image'];

    public function getRules($act = 'add'){
        $rules = [
            'title'=>'required|string',
            'description'=>'nullable|string',
            'image'=>'nullable|image|max:2048',
        ];
        if($act != 'add'){
            $rules['title'] = 'required|string';
        }
        return $rules;
    }
}
