<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AddDoctorRequest;

use App\Models\Doctor;


class AdminController extends Controller
{
    //=========== Redirect to Add Doctor
    public function addDoctor()
    {
        return view('admin.add_doctor');
    }

    //=========== Create Doctor
    public function createDoctor(AddDoctorRequest $request)
    {
        $validated = $request->validated();
        $validated = $request
            ->safe()
            ->only(['name', 'phone', 'spec', 'roomNo', 'docImg']);
        if ($validated) {
            $doctor = new Doctor;

            $image = $request->docImg;
            $imageName = time() . '.' . $image->getClientoriginalExtension();
            $request->docImg->move('doctorImg', $imageName);

            $doctor->image = $imageName;
            $doctor->name = $request->name;
            $doctor->phone = $request->phone;
            $doctor->roomNo = $request->roomNo;
            $doctor->specialization = $request->spec;

            $doctor->save();
            return redirect()->back()->with('message', 'Doctor Added Successfully');
        } else {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }
    }
}