<?php

namespace App\Http\Controllers;
use App\Models\Address;
use App\Models\Type;
use Illuminate\Http\Request;
use Image;
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
        return view('admin.address.addressdetail',compact('address','addresstypes'));
    }
    public function update(Request $request,$id)
    {
        $address = Address::find($id);
        $address->name = $request->name;
        $address->detail = $request->detail;
        $address->location = $request->location;
        if($request->hasFile('file'))
        {
            $img = $request->file('file');

            $filename = time().'.'.$img->getClientOriginalExtension();

            Image::make($img)->resize(800, 600)->save(public_path('/client/assets/img/'.$filename));
            $address->photos = ['/client/assets/img/' . $filename];

        }
        $address->user_id = Auth::user()->id;
        $address->verified = "0";
        // $address->verified_by = "1";
        // $address->verified_time = "2019-01-01 00:00:00";
        $address->save();
        $address->types()->sync($request->addresstype_id) ;
        session()->flash("success", "Update Successfully");
        return redirect("/addressinfo");
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
        return view('client.registeraddress',compact('addresstypes'));
    }
    public function postRegisterAddress(registerAddress $request) {
        $address = new Address();
        $address->name = $request->name;
        $address->detail = $request->detail;
        $address->location = $request->location;
        if($request->hasFile('file'))
        {
            $img = $request->file('file');

            $filename = time().'.'.$img->getClientOriginalExtension();

            Image::make($img)->resize(800, 600)->save(public_path('/client/assets/img/'.$filename));
            $address->photos = ['/client/assets/img/' . $filename];

        }
        $address->user_id = Auth::user()->id;
        
        // $address->verified_by = "1";
        // $address->verified_time = "2019-01-01 00:00:00";
        $address->save();
        $address->types()->attach($request->addresstype_id) ;
        session()->flash("success", "Insert Successfully");
        return redirect("/");
     }
     public function getAddressInfo(){
        $addresstypes = Type::all();
        foreach($addresstypes as $e) {
            $e->name = __('addresstypes.'.$e->name);
        }
         $data = Address::where("user_id",Auth::user()->id);
         $addresses = $data->get();
         $notification = $data->where(['verified' => 2])->get();
         return view('client.addressinfo',compact('addresses','addresstypes','notification'));
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
