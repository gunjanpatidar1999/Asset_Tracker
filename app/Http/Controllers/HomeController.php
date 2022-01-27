<?php

namespace App\Http\Controllers;

use App\Models\asset;
use App\Models\assettype;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('admin.dashboard');
    // }

    public function index(){
        $atype = assettype::all();
        $chartdata="";
        foreach($atype as $a)
        {
            $assettype = assettype::find($a->id);
           
              $assets = $assettype->asset;
            //  echo "$assets";
            $noofasset = count($assets);
            $chartdata.="['".$a->name."',".$noofasset."],";
        }
        $notactive = asset::select('is_active')->where('is_active',0)->count();
        $active = asset::select('is_active')->where('is_active',1)->count();
        $arr['chartdata']=rtrim($chartdata,",");
        return view('admin.dashboard',$arr,['active'=>$active])->with('notactive',$notactive);

        
    }
}
