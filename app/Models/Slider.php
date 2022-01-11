<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['title','link','enabled','description','image','logo_image'];
    public function getRules($act='add'){
        $rules = [
            'title'=>'required|string',
            'link'=>'nullable|string',
            'description'=>'nullable|string',
            'image'=>'nullable|image|max:2048',
            'logo_image'=>'nullable|image|max:1024'
        ];
        if($act != 'add'){
            $rules['title']='required|string';
        }
        return $rules;
    }
}
