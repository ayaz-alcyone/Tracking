<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\GroupRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Traits\UserTrait;
use App\Models\Users;
use Response;
use Auth;
use Hash;
// use Request;

class UsersController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request){
        $this->request = $request;
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */

    public function is_admin() {
        $id = \Auth::user()->id;
        $user = Users::where('id',$id)->first();
        if(isset($user->user_type) and $user->user_type ==1){
            session()->put('adminInfo', $user);
            return 1;
        }else{
            session()->put('userInfo', $user);
            return 0;
        }
    }
    
    // For logout process for admin.
    public function admin_logout() {
        Auth::logout(); // log the user out of our application
        Session::flush();
		return Redirect('/admin/users/login');
    }

    // Forgot password for user.
    public function forgotpassword() {
        return view('users.forgotpassword');
    }

    // For user logout
    public function logout(Request $request) {
        // Auth::logout(); // log the user out of our application
        Session::flush();
		return Redirect('/');
    }

    // Redirect to admin dashboard.
    public function admin_dashboard() {
        if($this->is_admin() == 0){
            redirect('/admin/users/logout');
        }
        return view('users.admin_dashboard');
    }

    // Login view for admin.
    public function user_login() {
        return view('auth.login');
    }

    // Login process for admin.
    public function post_admin_login(Request $request) {
		$data = $request->input();
		$user = Users::where('email', $request->email)->first();
		if(!empty($user)){
			if(isset($user->user_type) and $user->user_type != '1'){
				return redirect('admin/users/login')->with('error','Not authorized.');
			}else{
				$userdata = array(
					'email'     => $request->email,
					'password'  => $request->password,
				);
				if (Auth::attempt($userdata)) {
					return redirect('admin/users/dashboard');
				}else{
					return redirect('admin/users/login')->with('error','Incorrect email or password.');
				}
			}
		}else{
			return redirect('admin/users/login')->with('error','Incorrect email or password.');
		}
    }
    
    // Login process for users.
    public function post_user_login(Request $request) {
        $config = array(
            'url' => 'https://x4bixbcudi.execute-api.us-east-1.amazonaws.com/dev/arms/traking/login',
            'key' => 'X76gmAuPjU66xj7t073311JUODPz6rei3nORKoD2'
        );
        $data = array(
            'correo' => "$request->email",
            'password' => "$request->password"
        );
        $headers = array(
            'Content-Type: application/json',
            'X-API-Key: '.$config['key']
        );
        $options = array(
            CURLOPT_URL => $config['url'],
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_POST => TRUE,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => $headers,
        );
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        $result = json_decode($result);
        
        if ($result->status == true) {      
            $id = $result->resultado->id;
            $company_name = $result->resultado->company;
            $user_name = $result->resultado->user;

            $user_info = array(
                'email' => "$request->email",
                'password' => "$request->password",
                'company_id' => "$id",
                'company_name' => "$company_name",
                'user_name' => "$user_name"
            );
            session()->put('user', $user_info);    
            if ($request->session()->has('user')) {
                // Get all data of company
                $config = array(
                    'url' => 'https://x4bixbcudi.execute-api.us-east-1.amazonaws.com/dev/arms/viajes/obtener-viaje-mock',
                    'key' => 'X76gmAuPjU66xj7t073311JUODPz6rei3nORKoD2'
                );
                $data = array(
                    'idEmpresa' => 16,
                );
                $headers = array(
                    'Content-Type: application/json',
                    'X-API-Key: '.$config['key']
                );
                $options = array(
                    CURLOPT_URL => $config['url'],
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_POST => TRUE,
                    CURLOPT_POSTFIELDS => json_encode($data),
                    CURLOPT_HTTPHEADER => $headers,
                );
                $ch = curl_init();
                curl_setopt_array($ch, $options);
                $response = curl_exec($ch);
                $response = json_decode($response);
                session()->put('company_info', $response);
                return redirect('/home');
            }
        } else{
            return redirect('/login')->with('error', $result->resultado);
        }
    }

    // All views for users
    public function home(){
        return view('users.tracking');
    }

    public function route() {
        return view('users.route');
    }

    public function photos() {
        return view('users.photos');
    }
    public function invoices(Request $request) {
        
        return view('users.invoices');
    }

    // For language change
    public function changeLanguage(Request $request) {
        $locale = request()->segment(2);
        $page = request()->segment(3);
        Session::put('locale', $locale);
        return Redirect($page);
    }
}