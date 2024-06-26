<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\Seller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(500);
    }

    public function root()
    {
        //return Auth::user()->role;
        if(Auth::user()->status==0)
        { 
            Auth::logout();
            return redirect('/');
           
        }
        else{
            return view('index');
        }
       
    }


    public function user_master()
    {
        return view('user_master');
    }

    public function client_master()
    {
        return view('client_master');
    }
     public function insurance_master()
    {
        return view('insurance_master');
    }
     public function bonds_master()
    {
        return view('bonds_master');
    }
     public function mutualfund_master()
    {
        return view('mutualfund_master');
    }
     

        public function life_master()
    {
        return view('life_master');
    }

    public function medical_master()
    {
        return view('medical_master');
    }
     public function general_master()
    {
        return view('general_master');
    }
     public function bond_user_entry_master()
    {
        return view('bond_user_entry_master');
    }
     public function mf_master()
    {
        return view('mf_master');
    }
     public function data_to_import_master()
    {
        return view('data_to_import_master');
    }
     public function report1_master()
    {
        return view('report1_master');
    }
     public function report2_master()
    {
        return view('report2_master');
    }
     public function user_dashboard($id)
    {
        return view('user_dashboard')->with('id',$id);
    }

    
    public function edit_restaurant($id)
    {
        return view('seller_form')->with('status',1)->with('title','Edit');
    }


    public function tables()
    {
        return view('tables');
    }

    public function add_table()
    {
        return view('table_addedit')->with('id',0)->with('title','Add');
    }

    public function edit_table($id)
    {
        return view('table_addedit')->with('id',$id)->with('title','Edit');
    }

    public function product()
    {
        return view('product');
    }

    public function add_product()
    {
        return view('product_addedit')->with('id',0)->with('title','Add');
    }

    public function edit_product($id)
    {
        return view('product_addedit')->with('id',$id)->with('title','Edit');
    }


    public function currentorders()
    {
        return view('currentorders');
    }

    public function orders_billed()
    {
        return view('billed');
    }
    public function orders_details($id)
    {
        return view('orders_details')->with('id',$id);
    }

    public function restaurants()
    {
        return view('sellers');
    }

    public function users()
    {
        return view('users');
    }

    public function add_users()
    {
        return view('product_addedit')->with('id',0)->with('title','Add');
    }

    public function category()
    {
        return view('category');
    }
    
    public function customers()
    {
        return view('customers');
    }

    public function section()
    {
        return view('section');
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->file('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
            $user->avatar =  $avatarName;
        }

        $user->update();
        if ($user) {
            Session::flash('message', 'User Details Updated successfully!');
            Session::flash('alert-class', 'alert-success');
            // return response()->json([
            //     'isSuccess' => true,
            //     'Message' => "User Details Updated successfully!"
            // ], 200); // Status code here
            return redirect()->back();
        } else {
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
            // return response()->json([
            //     'isSuccess' => true,
            //     'Message' => "Something went wrong!"
            // ], 200); // Status code here
            return redirect()->back();

        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return response()->json([
                'isSuccess' => false,
                'Message' => "Your Current password does not matches with the password you provided. Please try again."
            ], 200); // Status code
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->update();
            if ($user) {
                Session::flash('message', 'Password updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Password updated successfully!"
                ], 200); // Status code here
            } else {
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Something went wrong!"
                ], 200); // Status code here
            }
        }
    }
}
