<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = [];
        $id = Auth::id();
        $data['user'] = User::findOrFail($id);
        $data['appointment'] = Appointment::where('user_id',$id)->orderBy('id','desc')->get();
        return view('user.index',compact('data'));
    }
}
