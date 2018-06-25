<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getDashboard()
    {
        $jmlStudent = Student::count();
        $jmlUser = User::count();
        return view('dashboard',[
            'studentCount' => $jmlStudent,
            'userCount' => $jmlUser
        ]);
    }

    public  function getLogin(){
        return view('auth.login');
    }

    public  function getRegister(){
        return view('auth.register');
    }

    public function getAdminPage()
    {
        $users = User::all();
        return view('user.admin', ['users' => $users]);
    }

    public function postAdminAssignRoles(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if ($request['role_user']) {
            $user->roles()->attach(Role::where('name', 'user')->first());
        }

        if ($request['role_admin']) {
            $user->roles()->attach(Role::where('name', 'admin')->first());
        }

        return redirect()->back();
    }
    public function postSignUp(Request $request)
    {
        $role_user = Role::where('name','user')->first();
        $role_admin = Role::where('name','admin')->first();

        $this->validate($request,[
            'name' => 'required|max:120',
            'email' => 'email|unique:users',
            'password' => 'required|min:4',
            'role' => 'required|max:1'
        ]);
    	$name = $request['name'];
    	$email = $request['email'];
    	$password = bcrypt($request['password']);

    	$user = new User();
    	$user->name = $name;
    	$user->email = $email;
    	$user->password = $password;

        Auth::login($user);    
    	$user->save();
    	if ($request['role'] == "1"){
    	    $user->roles()->attach($role_admin);
        } else {
    	    $user->roles()->attach($role_user);
        }

    	return redirect()->route('dashboard');
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);
        if( Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('messageLogin','Incorrect email or password!');
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }
}
