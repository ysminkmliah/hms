<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Doctor;

class DoctorController extends Controller
{
    public function viewList()
    {
        if(Auth::id() && Auth::user()->user_type == 1)
        {
            $doctors = Doctor::all();
                
            return view('doctor.list', compact('doctors'));
        }
        else{
            return redirect()->back();
        }
    }

    public function add()
    {
        return view('doctor.add');
    }

    public function submit(Request $request)
    {
        $doctor = new Doctor;

        $doctor->name = $request->doctor_name;
        $doctor->phone = $request->doctor_phone;
        $doctor->room = $request->doctor_room;
        $doctor->department = $request->doctor_department;

        //uploaded image
        $image = $request->doctor_image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->doctor_image->move('doctorimage', $imagename);
        $doctor->image = $imagename;

        $doctor->save();

        return redirect()->back()->with('success', 'Doctor Added Successfully!');

    }

    public function update($id)
    {
        $doctor = Doctor::find($id);

        return view('doctor.update', compact('doctor'));
    }

    public function delete($id)
    {
        $doctor = Doctor::find($id);

        $doctor->delete();

        return redirect()->back()->with('message', 'Doctor deleted succesfully.');
    }

}
