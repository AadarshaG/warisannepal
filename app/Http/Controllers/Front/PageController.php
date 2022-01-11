<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Aboutdata;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Policy;
use App\Models\Service;
use App\Models\Testimonal;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $about = About::select('*')->first();
        $datas = Aboutdata::select('*')->get();
        return view('front.aboutus')->with([
            'about'=>$about,
            'datas'=>$datas
        ]);
    }

    public function services()
    {
        $services = Service::select('*')->where('enabled','=','1')->get();
        return view('front.services')->with([
            'services'=>$services
        ]);
    }

    public function vendors()
    {
        $partners = Partner::select('*')->latest()->paginate(12);
        return view('front.vendors')->with([
            'partners'=>$partners
        ]);
    }
    public function vendorsid($id)
    {
        $category = Category::select('*')->where('id',$id)->first();
        $partners = Partner::select('*')->where('category_id',$category->id)->latest()->paginate(12);
        return view('front.select.allvendors')->with([
            'partners'=>$partners
        ]);
    }

    public function singleVendor($id)
    {
        $partner = Partner::select('*')->where('id',$id)->first();
        return view('front.singlevendor')->with([
            'vendor'=>$partner
        ]);
    }

    public function client()
    {
        $clients = Testimonal::select('*')->latest()->paginate(6);
        return view('front.clients',compact('clients'));
    }

    public function associates(){
        $associate = Policy::select('*')->where('id','=','1')->first();
        return view('front.associates',compact('associate'));
    }
    public function helpcenter(){
        $help = Policy::select('*')->where('id','=','2')->first();
        return view('front.helpcenter',compact('help'));
    }
    public function safetycenter(){
        $safety = Policy::select('*')->where('id','=','3')->first();
        return view('front.safetycenter',compact('safety'));
    }
    public function guidelines(){
        $guideline = Policy::select('*')->where('id','=','4')->first();
        return view('front.guidelines',compact('guideline'));
    }
    public function cookies(){
        $cookies = Policy::select('*')->where('id','=','5')->first();
        return view('front.cookies',compact('cookies'));
    }
    public function privacy(){
        $privacy = Policy::select('*')->where('id','=','6')->first();
        return view('front.privacy',compact('privacy'));
    }
    public function terms(){
        $term = Policy::select('*')->where('id','=','7')->first();
        return view('front.terms',compact('term'));
    }
    public function law(){
        $law = Policy::select('*')->where('id','=','8')->first();
        return view('front.laws',compact('law'));
    }
}
