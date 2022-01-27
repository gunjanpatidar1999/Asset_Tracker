<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

use App\Models\asset;
use App\Models\assettype;
use Illuminate\Http\Request;

use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class myadmin extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function create_asset_type()
    {
        return view('admin.create_asset_type');
    }

    public function store(Request $request)
    {
        $request->validate([

            'assettype' => 'required',
            'description' => 'required|min:2|max:500',
        ]);

        $assettype = new assettype;
        $assettype->name = $request->get('assettype');
        $assettype->description = $request->get('description');

        $assettype->save();

        return redirect('/show');
    }

    public function index()
    {
        //
        $assettype = assettype::all();

        return view('admin.index', compact('assettype'));
    }

    public function destroy($id)
    {
        //
        $assettype = assettype::find($id);
        $assettype->delete();

        return redirect('/show');
    }

    public function edit($id)
    {
        //
        $assettype = assettype::find($id);
        return view('admin.edit_asset_type', ['assettype' => $assettype]);
    }

    public function update(Request $request, $id)
    {
        //
        $request->validate([

            'assettype' => 'required',
            'description' => 'required|min:2|max:500',
        ]);

        $assettype = assettype::find($id);
        $assettype->name = $request->get('assettype');
        $assettype->description = $request->get('description');

        $assettype->save();

        return redirect('/show');
    }


    public function test()
    {

        $assets = DB::select('SELECT COUNT(asset_id) as number_of_items , assettypes.name as Asste_type_name FROM assets , assettypes WHERE assets.asset_type_id = assettypes.id GROUP BY asset_type_id');

        print_r($assets);
    }

    public function test1()
    {

        // $asset = DB::select('SELECT assets.*,assettypes.name as assettype from assets LEFT JOIN assettypes ON assets.asset_type_id = assettypes.id;');

        //    $asset = asset::paginate(3)->fragment('assets');
        //    return $assets;
        // return view('admin.index1', compact('asset'));

        // $asset = asset::all();
        $asset = asset::paginate(3)->fragment('assets');
        return view('admin.list', ['csv' => $asset]);
    }




    public function create_asset()
    {
        $asset_data = assettype::all();
        return view('admin.create_asset', ['asset_data' => $asset_data]);
    }

    public function store_asset(Request $req)
    {
        $validateData = $req->validate([

            'assetname' => 'required',
            'assetcode' => 'required|min:1|max:16',
            'assettype' => 'required',

        ]);

        if ($validateData) {

            $assetname = $req->assetname;
            $assetcode = $req->assetcode;
            $assettype = $req->assettype;
            $status = $req->isactive;
            $file = $req->file('assetimage');
            $dest = public_path('/uploads');
            $fname = "Image-" . rand() . "-" . time() . "." . $file->extension();


            //    return "$assetname -- $assetcode -- $assettype -- $status -- $file -- $fname";

            if ($file->move($dest, $fname)) {
                $admin = new asset;
                $admin->asset_name = $assetname;
                $admin->asset_code = $assetcode;
                $admin->assettype_id = $assettype;
                $admin->is_active = $status;
                $admin->asset_image = $fname;
                if ($admin->save()) {
                    return back()->with('success', "Data Added Succesfullly!");
                } else {
                    $path = public_path() . '/uploads' . $fname;
                    unlink($path);
                    return back()->with('errormsg', 'product Not Added');
                }
            }
        }
    }

    public function editasset($asset_id)
    {

        $catdata=asset::where('asset_id',$asset_id)->first();
         $data = assettype::all();
        // return view('admin.edit_asset_type',['assettype'=>$assettype]);
         return view("admin.editasset", ['catdata' => $catdata],['data'=>$data]);
        // return $catdata;
    }

    public function updateasset(Request $req)
    {
       $file = $req->images;
       $fname = "Image-" . rand() . "-" . time() . "." . $file->extension();
      $cat =  asset::where('asset_id',$req->asset_id)->update([
            'asset_name'=>$req->asset_name,
            'asset_code'=>$req->asset_code,
            'assettype_id'=>$req->type,
            'is_active'=>$req->radio,
            'asset_image'=>$fname,
            ]);


            $dest = public_path('/uploads');
            
            if ($file->move($dest, $fname)) {
                return redirect('showassets');
            }
    }



    public function index1()
    {
        //
        //    $asset = asset::all();

        $asset = DB::select('SELECT assets.*,assettypes.name as assettype from assets LEFT JOIN assettypes ON assets.assettype_id = assettypes.id;');

        //    $asset = asset::paginate(3)->fragment('assets');
        //    return $assets;
        return view('admin.index1', compact('asset'));
    }

    public function destroyasset($asset_id)
    {
        //


        //  $users = DB::table('assets')
        //     ->select('asset_id') 
        //     ->where('asset_id',$asset_id)
        //     ->get();

        // $aas = asset::find($users[0]);

        //  asset::find($asset_id)->delete();

        // $results = DB::select('select * from assets where asset_id ='. $asset_id);
        //     $results = DB::select('SELECT * from assets WHERE asset_id = ?', [$asset_id]);

        // //    $results->delete();

        //     $res = $results[0]->asset_id;

        asset::where('asset_id', $asset_id)->delete();


        // $cat=asset::find($asset_id);

        // $aas = asset::find($asset_id);

        // $aas->delete();

        // return $catdata;
        return redirect('/showassets');

        // print_r($aas);

    }

    public function exportdata()
    {
        return Excel::download(new dataexport, 'asset.csv');
    }


   
}

class dataexport implements FromCollection
{

    public function collection()
    {
        return asset::all();
    }
}
