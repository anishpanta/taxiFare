<?php namespace App\Http\Controllers;
	use Auth;
	use App\User;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Facades\Session;
	use Illuminate\Support\Facades\Input;
	use App\Fare;
	use Illuminate\Support\Facades\DB;
class AdminController extends Controller {

	public function getLogin(){	
		return view('login');
	}
	public function postLogin(){
		if(Auth::attempt(['username'=>Input::get('Username'), 'password'=>Input::get('password')]))
			return redirect('/admin');

		else
			return redirect('/login')->with('error','Invalid Username Or Password');

	}
	public function getIndex(){
		if(Auth::check()){
			$farerate=Fare::where('active',true)->first();
			return view('home')->with('farerate',$farerate);
		}
		else{
			return redirect('/login');
		}
	}
	public function postIndex(){
		if(Auth::check()){
			$oldfare=Fare::where('active',true)->first();
		$oldfare->active=false;
		$oldfare->save();

		$newfare=new Fare();
		$newfare->upto5=Input::get('upto5');
		$newfare->fiveto15=Input::get('fiveto15');
		$newfare->fifteento100=Input::get('fifteento100');
		$newfare->above100=Input::get('above100');
		$newfare->pickup=Input::get('pickup');
		$newfare->active=true;
		$newfare->save();
		return redirect('/admin')->with('success','Fare Rates Updated');	
		}
		else{
			return redirect('/login');
		}
		

	}
	public function getLogout(){
		
		Auth::logout();
		return redirect('/login');
	}
}
