<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Appointment\FormValidation;
use App\Models\Appointment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function appointment(FormValidation $request)
    {
        $data = $request->merge([
            'user_id' => auth()->id(),
        ])->only(
            'title',
            'appointment_date',
            'appointment_time',
            'description',
            'user_id'
        );
        Appointment::create($data);
        \Session::flash('alert-success', 'Created Successfully.');
        return redirect()->back();
    }
}
