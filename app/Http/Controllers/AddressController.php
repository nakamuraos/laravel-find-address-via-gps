<?php

namespace App\Http\Controllers;
use App\Models\Address;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\registerAddress;
use Auth;
use Carbon\Carbon;
class AddressController extends Controller
{

    public function index(Request $request) {
        if(isset($request->verified) && in_array($request->verified, [0, 1, 2])) {
            $addresses = Address::where('verified', $request->verified)->orderBy("created_at", "desc")->paginate(12);
        } else {
            $addresses = Address::orderBy("created_at", "desc")->paginate(12);
        }
        return view('admin.address.index',compact('addresses'));
    }

    public function show($id) {
        $addresstypes = Type::all();
        foreach($addresstypes as $key => $value) {
            $addresstypes[$key]['name'] = \Lang::get('addresstypes.'.$value['name']);
        }
        $address = Address::where("id", $id)->first();
        return view('admin.address.detail',compact('address','addresstypes'));
    }

    public function update(Request $request,$id) {
        $address = Address::find($id);
        $address->name = $request->name;
        $address->detail = $request->detail;
        $address->location = $request->location;
        $photos = $this->uploadPhotos($request);
        if(is_array($photos)) {
            $address->photos = $photos;
        } else {
            return $photos;
        }
        $address->user_id = Auth::user()->id;
        $address->verified = "0";
        // $address->verified_by = "1";
        // $address->verified_time = "2019-01-01 00:00:00";
        $address->save();
        $address->types()->sync($request->addresstype_id) ;
        session()->flash("success", "Update Successfully");
        return redirect("/manager/address");
    }

    public function destroy($id) {
        $address = Address::find($id);
        $address->types()->detach();
        $address->delete();
        session()->flash("success", "Delete successfully");
        return redirect('/manager/address');
    }
    
    public function create() {
        $addresstypes = Type::all();
        foreach($addresstypes as $e) {
            $e->name = __('addresstypes.'.$e->name);
        }
        $maps = false;
        return view('pages.address.register', compact('addresstypes', 'maps'));
    }

    public function store(Request $request) {
        $address = new Address();
        $address->name = $request->name;
        $address->detail = $request->detail;
        $address->location = $request->location;
        $photos = $this->uploadPhotos($request);
        if(is_array($photos)) {
            $address->photos = $photos;
        } else {
            return $photos;
        }
        $address->user_id = Auth::user()->id;
        
        // $address->verified_by = "1";
        // $address->verified_time = "2019-01-01 00:00:00";
        $address->save();
        $address->types()->attach($request->addresstype_id);
        session()->flash("success", "Insert Successfully");
        return redirect("/");
    }

    public function getListAddress() {
        $addresstypes = Type::all();
        foreach($addresstypes as $e) {
            $e->name = __('addresstypes.'.$e->name);
        }
        $data = Address::where("user_id",Auth::user()->id)->orderBy('created_at', 'desc');
        $addresses = $data->paginate(5);
        $notifications = $addresses->where('verified',2);
        $maps = false;
        return view('pages.address.index',compact('addresses','addresstypes','notifications','maps'));
}

    public function showByUser($id) {
        $addresstypes = Type::all();
        foreach($addresstypes as $e) {
            $e->name = __('addresstypes.'.$e->name);
        }
        $address = Address::where([
            ['id', '=', $id],
            ['user_id', '=', Auth::user()->id]
        ])->first();
        if(empty($address)) return abort(404);
        return view('pages.address.detail', compact('address','addresstypes'));
    }

    public function changeVerifyCode($id, $verify_code) {
        $address = Address::find($id);
        $address->verified  = $verify_code;
        $address->verified_by = Auth::user()->id;
        $address->verified_time = Carbon::now();
        $address->save();
        return back();
    }
    // public function getNotification(){
    //     $data = Address::where("user_id",Auth::user()->id);
    //     $addresses = $data->paginate(5);
    //     $notification = $addresses->where(['verified' => 2]);
    //     return view('layouts.app',compact('notification'));
    // }
}
