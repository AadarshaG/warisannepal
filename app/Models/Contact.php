<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['address','phone','landline','mail'];

    public function getRules($act = 'add'){
        $rules = [
            'address'=>'required|string',
            'phone'=>'nullable|string',
            'landline'=>'nullable|string',
            'mail'=>'nullable|string'
        ];
        if($act != 'add'){
            $rules['address'] = 'required|string';
        }
        return $rules;
    }
}
