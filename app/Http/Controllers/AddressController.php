<?php

namespace App\Http\Controllers;
use App\Models\Address;
use App\Models\Type;
use Illuminate\Http\Request;
use Image;
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
        $address =  Address::find($id);
        $address->name = $request->name;
        $address->detail = $request->detail;
        if($request->hasFile('file'))
        {
            $img = $request->file('file');

            $filename = time().'.'.$img->getClientOriginalExtension();

            Image::make($img)->resize(500, 500)->save(public_path('/admin/assets/image'.$filename));
            $address->photos = ['/admin/assets/image' . $filename];

        }


        $address->save();
        //$address->verify = $request->verify;
        $address->location = $request->location;
        $address->user_id = $request->user_id;
        //$address->addresstype_id = $request->addresstype_id;
        session()->flash("success", "Update Successfully");
        return redirect("/manageaddress");
    }
    public function destroy($id)
    {
        $address = Address::find($id);
        $address->delete();
        session()->flash("success", "Delete successfully");
        return redirect('/manageaddress');
    }
    
    public function registerAddress(){
        return view('client.registeraddress');
    }
}
