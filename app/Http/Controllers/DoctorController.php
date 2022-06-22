<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

class DoctorController extends Controller
{
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
}
