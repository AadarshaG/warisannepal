<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = ['title','description'];

    public function getRules($act = 'add'){
        $rules = [
            'title'=>'required|string',
            'description'=>'sometimes|string'
        ];
        if($act != 'add'){
            $rules['title'] = 'required|string';
        }
        return $rules;
    }
}
