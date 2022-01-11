<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = ['category_id','title','phone','email','website','address',
        'description','services','offers','image','photo'];

    public function getRules($act = 'add'){
        $rules = [
            'category_id'=>'nullable|exists:categories,id',
            'title'=>'required|string',
            'phone'=>'nullable|string',
            'email'=>'nullable|string',
            'website'=>'nullable|string',
            'address'=>'nullable|string',
            'offers'=>'nullable|string',
            'description'=>'nullable|string',
            'services'=>'nullable|string',
            'image'=>'nullable|image|max:1024',
            'photo.*'=>'nullable|image|max:1024',
            //'photo.*'=>'nullable|image|max:1024'
        ];
        if($act != 'add'){
            $rules['title'] = 'required|string';
        }
        return $rules;
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
    public function getAll()
    {
        return $this->with('category')->orderBy('id','desc')->get();
    }
}
