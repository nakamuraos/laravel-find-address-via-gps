<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use Auth;
class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('created_at','desc')->where('role_id', '!=', 1)->paginate(8);
        return view('admin.users.index',compact('users'));
    }
    public function store(StoreUser $request)
    {
        $user = new User();
        $user->user_name = $request->user_name;
        $user->full_name = $request->full_name;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->verified = $request->verified;
        $user->status = 1;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        $user->save();

        session()->flash("success", "Add Successfully");
        return back();
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->status = $request->status;
        $user->role_id = $request->role_id;
        $user->save();
        session()->flash("success", "Update Successfully");
         return back();
    }
    public function getProfile(){
        $user = Auth::user();
        return view('pages.profile',compact('user'));
    }
    public function updateProfile( Request $request){
        $user = Auth::user();
        $user->user_name = $request->user_name;
        $user->full_name = $request->full_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();
        session()->flash("success", "Update Successfully");
         return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id, Request $request)
    // {
    //     $user = User::find($id);
    //     $user->delete();
    //     session()->flash("success", "Delete successfully");
    //     return back();
    // }
}

