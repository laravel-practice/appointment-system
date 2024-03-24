<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Appointment\FormValidation;
use App\Models\Appointment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('frontend.index');
    }

    /**
     * @param FormValidation $request
     * @return RedirectResponse
     */
    public function appointment(FormValidation $request): RedirectResponse
    {
        try {
            $user = Auth::user();
            if (!$user) {
                throw new \Exception("User not authenticated.");
            }

            $data = $request->merge([
                'user_id' => $user->id,
            ])->only([
                'title',
                'appointment_date',
                'appointment_time',
                'description',
                'user_id',
            ]);

            Appointment::create($data);

            return redirect()->back()->with('alert-success', 'Created Successfully.');
        } catch (\Exception $e) {
            Log::error('Error in HomeController@appointment: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
    }
}
