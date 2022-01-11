<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Partner;
use App\Models\Rightimage;
use App\Models\Sale;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    protected $partner = null;
    public function __construct(Partner $partner)
    {
        $this->partner = $partner;
    }

    public function index()
    {
        $slider = Slider::select('*')->where('enabled','=','1')->get();
        $rightimage = Rightimage::select('*')->where('enabled','=','1')->paginate(3);
        $about = About::select('*')->first();
        $sale = Sale::select('*')->first();
        $partners =  Partner::select('*')->latest()->paginate(4);
        return view('front.index')->with([
            'sliders'=>$slider,
            'rightimages'=>$rightimage,
            'about'=>$about,
            'sale'=>$sale,
            'partners'=>$partners
        ]);
    }

    public function search(Request $request)
    {
        $this->partner = $this->partner;
        if(isset($request->search)){
            $keywords = $request->search;
            $this->partner = $this->partner->where('title','LIKE','%'.$keywords.'%');
        }
        if(isset($request->location)){
            $keyword = $request->location;
            $this->partner = $this->partner->where('address','LIKE','%'.$keyword.'%');
        }
        $this->partner = $this->partner->orderBy('id','desc')->paginate(16);

        return view('front.searchresult')->with([
            'results'=>$this->partner
        ]);
    }

    public function notFound()
    {
        return view('front.notfound');
    }
}
