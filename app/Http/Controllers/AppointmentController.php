<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\User;
use App\Patient;
use App\Appointment;
use App\Setting;
use Redirect;
use Nexmo;

class AppointmentController extends Controller
{

	public function __construct(){
        $this->middleware('auth');
    }

    public function create(){

    	$patients = User::where('role','patient')->get();
	    return view('appointment.create', ['patients' => $patients]);
    }

    public function checkslots($date){

    	return $this->getTimeSlot($date);
    }


    public function available_slot($date,$start,$end){
    	$check = Appointment::where('date',$date)->where('time_start', $start)->where('time_end', $end)->where('visited', '!=', '2')->count();
    	if($check == 0){
        	return 'available';
    	}else{
        	return 'unavailable';
    	}
    }


    public function getTimeSlot($date) {

    $day = date("l", strtotime($date));
  	$day_from =  strtolower($day.'_from');
  	$day_to =  strtolower($day.'_to');

    $start = Setting::get_option($day_from);
    $end = Setting::get_option($day_to);
    $interval = Setting::get_option('appointment_interval');

    $start = new DateTime($start);
    $end = new DateTime($end);
    $start_time = $start->format('H:i'); // Get time Format in Hour and minutes
    $end_time = $end->format('H:i');

    $i=0;
    $time = [];
    while(strtotime($start_time) <= strtotime($end_time)){
        $start = $start_time;
        $end = date('H:i',strtotime('+'.$interval.' minutes',strtotime($start_time)));
        $start_time = date('H:i',strtotime('+'.$interval.' minutes',strtotime($start_time)));
        $i++;
        if(strtotime($start_time) <= strtotime($end_time)){
            $time[$i]['start'] = $start;
            $time[$i]['end'] = $end;
            $time[$i]['available'] = $this->available_slot($date, $start, $end);
        }
    }

    return $time;

	}

	public function store(Request $request){


		$validatedData = $request->validate([
        	'patient' => ['required','exists:users,id'],
            'rdv_time_date' => ['required'],
            'rdv_time_start' => ['required'],
            'rdv_time_end' => ['required'],
            'send_sms' => ['boolean'],

    	]);

    	$appointment = new Appointment();
		$appointment->user_id = $request->patient;
		$appointment->date = $request->rdv_time_date;
		$appointment->time_start = $request->rdv_time_start;
		$appointment->time_end = $request->rdv_time_end;
        $appointment->visited = 0;
        $appointment->reason = $request->reason;
		$appointment->save();


        if($request->send_sms == 1){

            $user = User::findOrFail($request->patient);
            $phone = $user->Patient->phone;

            Nexmo::message()->send([
                'to'   => $phone,
                'from' => '213794616181',
                'text' => 'You have an appointment on '.$request->rdv_time_date.' at '.$request->rdv_time_start.' at Doctorino'
            ]);

        }

		return Redirect::route('appointment.all')->with('success', 'Rendez-vous créé avec succès !');

	}

    public function store_edit(Request $request){

        $validatedData = $request->validate([
            'rdv_id' => ['required','exists:appointments,id'],
            'rdv_status' => ['required','numeric'],
        ]);

        $appointment = Appointment::findOrFail($request->rdv_id);
        $appointment->visited = $request->rdv_status;
        $appointment->hours = $request->hours;
        $appointment->save();

        return Redirect::back()->with('success', 'Rendez-vous mis à jour avec succès !');
    }

    public function all()
    {
        $lastpatient = session('lastpatient');

        $appointments = Appointment::orderBy('id', 'DESC')
            ->when($lastpatient, function ($query) use ($lastpatient) {
                return $query->where('user_id', $lastpatient);
            })
            ->paginate(10);

        return view('appointment.all', ['appointments' => $appointments]);
    }

    public function calendar(){

        $appointments = Appointment::orderBy('id','DESC')->paginate(10);
        return view('appointment.calendar', ['appointments' => $appointments]);
    }

    public function pending(){

        $appointments = Appointment::where('visited', 3)->orderBy('hours', 'ASC')->paginate(10);

        return view('appointment.pending', ['appointments' => $appointments]);
    }


    public function day(){

        $currentDate = now()->format('Y-m-d'); // Get the current date in 'Y-m-d' format
        $appointments = Appointment::whereDate('date', $currentDate)->orderBy('id','DESC')->paginate(10);

        return view('appointment.day', ['appointments' => $appointments]);

    }

    public function dayfilter(Request $request){
        $startDate = $request->input('datefilter');
//        $currentDate = now()->format('Y-m-d'); // Get the current date in 'Y-m-d' format
        $appointments = Appointment::whereDate('date', $startDate)->orderBy('id','DESC')->paginate(10);

        return view('appointment.dayfilter', ['appointments' => $appointments,'startDate'=>$startDate]);

    }



    public function destroy($id){

        Appointment::destroy($id);
        return Redirect::route('appointment.all')->with('success', 'Rendez-vous supprimé avec succès !');

    }


}
