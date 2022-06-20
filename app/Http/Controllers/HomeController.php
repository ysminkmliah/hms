<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Doctor;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        else
        {
            $doctors = Doctor::all();
            return view('index', compact('doctors'));
        }    
    }
    
    public function home()
    {
        if(Auth::id())
        {
            if(Auth::user()->user_type=='0')
            {
                $doctors = Doctor::all();
                return view('user.home', compact('doctors'));
            }
            else
            {
                return view('admin.home');
            }
        }
        else
        {
            return redirect()->back();
        }
    }
}
