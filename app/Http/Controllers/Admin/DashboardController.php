<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registered()
    {

        $users = User::where('usertype' , '=' , 'user')->get();
        $payments = User::with('payments')->get();


        return view('admin.register' ,compact('users' ));

    }

    public function registeredit(Request $request, $id)
    {
        $users = User::findOrFail($id);
        return view('admin.register-edit')->with('users', $users);
    }
    public function registerupdate(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->surname = $request->input('surname');
        $users->phone = $request->input('phone');
        $users->usertype = $request->input('usertype');
        $users->time = ' ';
        $users->birthdate = ' ';
        $users->update();

        return redirect('/user-register')->with('status' , 'Your Data is Updated');
    }
    public function registerdelete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/user-register')->with('status' , 'Your Data is Deleted');
    }
    public function registerstore(Request $request)
    {
        $users = new User;

        $users->name = $request->input('username');
        $users->surname = $request->input('surname');
        $users->phone = $request->input('phone');
        $users->password = $request->input('phone');

        $users->save();




        return redirect('/user-register')->with('status','Data Added for Users');
    }
}
