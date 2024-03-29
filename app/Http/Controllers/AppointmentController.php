<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function view()
    {
        if(Auth::id() && Auth::user()->user_type == 0)
        {
            $userId = Auth::user()->id;

            $appointments = Appointment::with('doctor')->where('user_id', $userId)->all();
            
            return view('appointment.view', compact('appointments'));
        }
        else{
            return redirect()->back();
        }
        
    }

    public function viewList()
    {
        if(Auth::id() && Auth::user()->user_type == 1)
        {
            $appointments = Appointment::with('doctor')->get();
                
            return view('appointment.list', compact('appointments'));
        }
        else{
            return redirect()->back();
        }
    }

    public function submit(Request $request)
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

    public function delete($id)
    {
        $appointment = Appointment::find($id);

        $appointment->delete();

        return redirect()->back()->with('message', 'Appointment deleted succesfully.');
    }

    public function approve($id)
    {
        $appointment = Appointment::find($id);

        $appointment->status="Approved";
        $appointment->save();

        return redirect()->back()->with('message', 'Appointment approved succesfully.');
    }

    public function reject($id)
    {
        $appointment = Appointment::find($id);

        $appointment->status="Rejected";
        $appointment->save();

        return redirect()->back()->with('message', 'Appointment rejected succesfully.');
    }
}
