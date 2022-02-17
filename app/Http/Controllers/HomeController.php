<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddAppointmentRequest;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    //====================== Redirect For User & Admin
    public function redirect()
    {
        $doctors = Doctor::all();
        // Check if user Logined

        if (Auth::id()) {
            // Check if it's a normal user
            if (Auth::user()->user_type == '0') {
                return view('user.home', compact('doctors'));
            }
            // Check if it's an Admin
            else {
                // $doctors = Doctor::paginate(5);
                return view('admin.home', compact('doctors'));
            }
        } else {
            return redirect()->back();
        }
    }

    //=================== Open Index view if routing to root /
    public function index()
    {
        $doctors = Doctor::all();
        if (Auth::id()) {
            return redirect('home', compact('doctors'));
        } else {
            return view('user.home', compact('doctors'));
        }
    }

    //================== Make Appointment
    public function createAppointment(AddAppointmentRequest $request)
    {
        $validated = $request->validated();
        $validated = $request
            ->safe()
            ->only(['name', 'email', 'phone', 'doctor', 'date', 'message']);
        if ($validated) {
            $appointment = new Appointment;

            $appointment->name = $request->name;
            $appointment->email = $request->email;
            $appointment->phone = $request->phone;
            $appointment->doctor = $request->doctor;
            $appointment->date = $request->date;
            $appointment->message = $request->message;
            $appointment->status = 'In-Progress';

            if (Auth::id()) {
                $appointment->user_id = Auth::user()->id;
            }

            $appointment->save();
            return redirect()->back()->with('message', 'Appointment Has Been Created Successfully');
        } else {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }
    }

    //================== Get my Appointments
    public function my_appointment()
    {
        if (Auth::id()) {

            $user_id = Auth::user()->id;

            $appointments = Appointment::where('user_id', $user_id)->get();

            return view('user.my_appointment', compact('appointments', $appointments));
        } else {
            return redirect()->back();
        }
    }

    //================== Get my Appointments
    public function cancel_appoint($id)
    {
        $appoint = Appointment::find($id);

        $appoint->delete();

        return redirect()->back();
    }
}