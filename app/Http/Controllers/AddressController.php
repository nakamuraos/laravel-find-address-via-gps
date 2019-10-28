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

    public function index(){
        $addresses = Address::orderBy("created_at", "desc")->paginate(8);
        return view('admin.address.index',compact('addresses'));
    }
    public function getAddressDetail($id){
        $addresstypes = Type::all();
        foreach($addresstypes as $key => $value) {
            $addresstypes[$key]['name'] = \Lang::get('addresstypes.'.$value['name']);
        } 
        $address = Address::where("id",$id)->first();
        return view('admin.address.detail',compact('address','addresstypes'));
    }
    public function update(Request $request,$id)
    {
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
    public function destroy($id)
    {
        $address = Address::find($id);
        $address->types()->detach();
        $address->delete();
        session()->flash("success", "Delete successfully");
        return redirect('/manageaddress');
    }
    
    public function getRegisterAddress(){
        $addresstypes = Type::all();
        foreach($addresstypes as $e) {
            $e->name = __('addresstypes.'.$e->name);
        }
        return view('pages.address.register',compact('addresstypes'));
    }
    public function postRegisterAddress(registerAddress $request) {
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
     public function getListAddress(){
        $addresstypes = Type::all();
        foreach($addresstypes as $e) {
            $e->name = __('addresstypes.'.$e->name);
        }
        $data = Address::where("user_id",Auth::user()->id);
        $addresses = $data->paginate(5);
        $notification = $addresses->where(['verified' => 2]);
        return view('pages.address.index',compact('addresses','addresstypes','notification'));
     }
     public function getAddressDetailById($id){
        $addresstypes = Type::all();
        foreach($addresstypes as $e) {
            $e->name = __('addresstypes.'.$e->name);
        }
         $address = Address::where("id",$id)->first(); 
        //  dd($address);
         return view('pages.address.detailById',compact('address','addresstypes'));
     }
     public function changeStatus($id,$status){
            $address = Address::find($id);
            $address->verified  = $status;
            $address->verified_by = Auth::user()->id;
            $address->verified_time = Carbon::now();
            $address->save();
            return back();
     }
}
