<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        $users=User::paginate(5);

        return view('users.users',[
            'users' => $users
        ]);
    }


    public function store(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->is_admin;
        $user->save();

        return back()->with('message','User Saved Successfully');

    }


    public function update(Request $request){

        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->is_admin;
        $user->save();

        return back()->with('message','User Updated');



    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return back()->with('message','User deleted successfully');
    }


}
