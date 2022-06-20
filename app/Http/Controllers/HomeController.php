<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

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

    public function submitAppointment(Request $request)
    {
        $appointment = new Appointment;

        $appointment->first_name = $request->fname;
        $appointment->last_name = $request->lname;
        $appointment->phone = $request->phone;
        $appointment->email = $request->email;
        $appointment->doctor_id = $request->doctor;
        $appointment->date = $request->date;
        $appointment->message = $request->message;
        $appointment->status = 'In Progress';
        if(Auth::id())
        {
            $appointment->user_id = Auth::user()->id;
        }

        $appointment->save();
        return redirect()->back()->with('message', 'Appointment request is successful. We will contact you soon.');
    }
}
