<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [];
        $id = Auth::id();
        $data['appointment'] = Appointment::where('user_id',$id)->get();
        return view('user.index',compact('data'));
    }
}
