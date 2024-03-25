<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Throwable;

class AdminDashboardController extends Controller
{
    /**
     * @var Appointment
     */
    protected $appointment;

    /**
     * @var User
     */
    protected $user;

    /**
     * AdminDashboardController constructor.
     * @param Appointment $appointment
     * @param User $user
     */
    public function __construct(Appointment $appointment, User $user)
    {
        $this->appointment = $appointment;
        $this->user = $user;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function appointment()
    {
        return view('admin.appointment');
    }

    /**
     * @return JsonResponse
     * @throws Throwable
     */
    public function appointmentData(): JsonResponse
    {
        try {
            $appointments = Appointment::with('user')->get();
            return datatables()
                ->of($appointments)
                ->editColumn('appointment_date', function ($appointment) {
                    return convertDate($appointment->appointment_date);
                })
                ->editColumn('appointment_time', function ($appointment) {
                    return convertToAmPm($appointment->appointment_time);
                })
                ->editColumn('users.name', function ($appointment) {
                    return $appointment->user->name;
                })
                ->editColumn('action', function ($record) {
                    return view('admin.common.action', compact('record'))->render();
                })
                ->rawColumns(['appointment_date', 'action', 'appointment_time', 'user.name'])
                ->toJson();
        } catch (\Exception $e) {
            Log::error('Error in AdminDashboardController@appointmentData: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch appointment data.'.$e->getMessage()]);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function appointmentLoadData(Request $request): JsonResponse
    {
        try {
            $id = $request->get('id');
            $appointment = Appointment::with('user')->where('id', $id)->first();
            if ($appointment) {
                $html = view('admin.common.appointment-modal-data', ['appointment' => $appointment])->render();
                return response()->json(['html' => $html]);
            }
            return response()->json(['html' => null]);
        } catch (\Exception $e) {
            Log::error('Error in AdminDashboardController@appointmentLoadData: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to load appointment data.'.$e->getMessage()]);
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        try {
            $appointment = Appointment::findOrFail($id);
            $appointment->delete();
            return redirect()->back()->with('alert-success', 'Record Deleted Successfully.');
        } catch (\Exception $e) {
            Log::error('Error in AdminDashboardController@destroy: ' . $e->getMessage());
            return redirect()->back()->with('alert-danger', 'An error occurred while deleting the record.');
        }

    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroyUser($id): RedirectResponse
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->back()->with('alert-success', 'Record Deleted Successfully.');
        } catch (\Exception $e) {
            Log::error('Error in AdminDashboardController@destroyUser: ' . $e->getMessage());
            return redirect()->back()->with('alert-danger', 'An error occurred while deleting the record.');
        }
    }

    /**
     * @param $id
     * @return Application|Factory|RedirectResponse|View
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('admin.user-edit', compact('user'));
        } catch (\Exception $e) {
            Log::error('Error in AdminDashboardController@edit: ' . $e->getMessage());
            return redirect()->back()->with('alert-danger', 'An error occurred while fetching the record.');
        }

    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {

        try{
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'mobile' => ['required', 'digits:10'],
                'address' => ['required', 'string', 'max:100'],
                'password' => ['required', 'string'],
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $user = User::findOrFail($id);
            $user->name = $request->get('name');
            $user->mobile = $request->get('mobile');
            $user->address = $request->get('address');
            $user->password = $request->get('password');
            $user->save();
            return redirect()->back()->with('alert-success', 'Record Update Successfully.');
        } catch (\Exception $e) {
            Log::error('Error in AdminDashboardController@update: ' . $e->getMessage());
            return redirect()->back()->with('alert-danger', 'An error occurred while updating the record.');
        }
    }

    /**
     * @return Application|Factory|View
     */
    public function user()
    {
        return view('admin.user');
    }

    /**
     * @return JsonResponse
     */
    public function userData(): JsonResponse
    {
        try {
            $users = $this->user->where('role', 0);
            return datatables()
                ->of($users)
                ->editColumn('created_at', function ($user) {
                    return convertDate($user->created_at);
                })
                ->editColumn('action', function ($record) {
                    return view('admin.common.user-action', compact('record'))->render();
                })
                ->rawColumns(['created_at','action'])
                ->toJson();
        } catch (\Exception $e) {
            Log::error('Error in AdminDashboardController@userData: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch User data.'.$e->getMessage()]);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function userLoadData(Request $request): JsonResponse
    {
        try {
            $id = $request->get('id');
            $user = User::where('id', $id)->first();
            if ($user) {
                $html = view('admin.common.user-modal-data', ['user' => $user])->render();
                return response()->json(['html' => $html]);
            }
            return response()->json(['html' => null]);
        } catch (\Exception $e) {
            Log::error('Error in AdminDashboardController@userLoadData: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to load user data.'.$e->getMessage()]);
        }
    }
}
