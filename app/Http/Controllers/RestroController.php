<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Register;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RestroController extends Controller
{
    //
    function index(){
        return view('home');
    }
    function list(){
        $data = Restaurant::all();
        return view('list',["data"=>$data]);
    }
    function add(Request $req){
        $data = new Restaurant();
        $data->name = $req->name;
        $data->email = $req->email;
        $data->address = $req->address;
        $data->save();
        $req->session()->flash('status','Restaurant name entered successfully');
        return redirect('list');
    }
    function delete($id){
        Restaurant::find($id)->delete();
        //$data->delete();
        //Session::flash('status','Restaurant is deleted successfully');
        session()->flash('status','Restaurant is deleted successfully');
        return redirect('list');
    }
    function retrieve($id){
        $data = Restaurant::find($id);
        return view('update',['data'=>$data]);
    }
    function update(Request $req){
        $data = Restaurant::find($req->id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->address = $req->address;
        $data->save();
        $req->session()->flash('status','Restaurant name updated successfully');
        return redirect('list');
    }
    /*
    function search($name){
        $result = Restaurant::where("name","like","%".$name."%")->get();
        if(count($result)){
            return view('searchlist',['result'=>$result]);
        }
        else{
            //return ["Result"=>"No data is found"];
            return view('searchlist',['result'=>"No results"]);
        }
    }*/
    function register(Request $req){

        $data = new Register();
        $data->name = $req->name;
        $password = $req->password;
        $hashed = Hash::make($password);
        $data->password = $hashed;
        $req->validate([
            'name' => 'required',
            'password' => 'required|min:6',
        ]);
        $data->save();
        $req->session()->flash('status','Registered successfully');
        return view('login');
           
    }
    function login(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        /*
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            //return redirect()->intended('dashboard')
                        //->withSuccess('You have Successfully loggedin');
        }*/
        $user= Register::where('name', $request->name)->first();
        // print_r($data);
        if (!$user || !Hash::check($request->password, $user->password)) {
            //return redirect("login")->('Oppes! You have entered invalid credentials');
            //$request->session()->put('user',$data);
            $request->session()->flash('status','You have entered invalid credentials');
            return redirect('login');
        }
        $request->session()->put('user',$user->name);
        $request->session()->flash('status','Logged in successfully ');
        return redirect('/');
        
    }
    function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
        /*
        if(session()->has('user')){
            session()->pull('user');
        }
        return redirect('login');*/
    }
}
