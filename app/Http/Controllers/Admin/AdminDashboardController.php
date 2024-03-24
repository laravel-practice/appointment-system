<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
            return response()->json(['error' => 'Failed to load appointment data.'.$e->getMessage()]);
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
                ->rawColumns(['created_at'])
                ->toJson();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch User data.'.$e->getMessage()]);
        }
    }
}
