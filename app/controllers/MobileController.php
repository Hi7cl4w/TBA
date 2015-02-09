<?php

class MobileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		if ($user->hasRole('Customer')) {
			$tickets = Ticket::where('Customer_id', '=', $user->id)->get();
			return Response::json(array(
					'error' => false,
					'tickets' => $tickets->toArray()),
				200
			);
		}
		elseif ($user->hasRole('Staff')){
			$tickets = Ticket::where('Staff_id', '=', $user->id)->get();
			return Response::json(array(
					'error' => false,
					'tickets' => $tickets->toArray()),
				200
			);
		}
		else
			return Response::json(array(
					'error' => true,
					'message' => 'Sorry, This user is unauthorised to access API'),
				200
			);


	}

	public function logout()
	{
		Confide::logout();
		return Response::json(array(

				'message' => 'Logged out successfully'),
			200
		);
	}
	public function type()
	{
		$user = Auth::user();
		$users = User::with('roles')->find($user->id);
		return Response::json(array(
				'error' => false,
				'user_details' => $users),
			200
		);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function insert()
	{
		$rules = array(
			'Subject' => 'required|min:3',
			'Description' => 'required',
			'Purchase_id' => 'required'
		);
		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);
		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			$error = $validator->errors()->all(':message');
			$user = Auth::user();
			return Response::json(array(
					'error' => true,
					'message' => 'Failed to create',
					'validator'=> $error
				),
				200
			);// send back the input (not the password) so that we can repopulate the form
		} else {
			$repo = App::make('TicketRespository');
			$ticket = $repo->ticket_create(Input::all());
			if ($ticket->id) {


				/*	Mail::laterOn('ticket', 5, 'emails.ticket.admin', array('key' => 'value'), function ($message) use ($ticket) {
                        $customer = User::find($ticket->Customer_id);
                        $e = $customer->email;
                        if ($ticket->Staff_id)
                            $staff = User::find($ticket->Staff_id);
                        $message->to($e, 'no-replay')->subject('Welcome!');
                    });
                    Mail::laterOn('ticket', 5, 'emails.ticket.admin', array('key' => 'value'), function ($message) use ($ticket) {
                        //$customer = User::find($ticket->Customer_id);

                        if ($ticket->Staff_id)
                        $staff = User::find($ticket->Staff_id);
                        $e = $staff->email;
                        $message->to($e, 'no-replay2')->subject('Welcome!');
                    });//http://mainproject.manuknarayanan.in/api/v1/ticket/new?Subject=sjdakbsjbc&Description=desdesdesd&Purchase_id=4870940a-df7b-446c-8b0b-9063a83a5bf2&Product_id=pr1135
    */
				return Response::json(array(
						'error' => false,
						'message' => 'Ticket Successfully Created TICKET ID: '.$ticket->id,
						'validator'=> null,
				),
					200
				);

			}
			return Response::json(array(
					'error' => true,
					'message' => 'Failed to create',
					'validator'=> null,
				),
				200
			);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}
	public function verify()
	{
		$input=Input::all();
		$pid=array_get($input,'pid');
		$pids=Purchases::find($pid);
		if($pids)
		{
			$product=Products::where('id','=',$pids->product_id)->first();
			return Response::json(array(
					'error' => false,
					'product' => $product),
				200
			);

		}
		else
			return Response::json(array(
					'error' => true,
					'message' => "invalid purchase id"),
				200
			);
	}

	public function rating($id)
	{
		$input = Input::all();
		$user = Auth::user();
		$rate = array_get($input, 'rate');
		$ticket = Ticket::find($id);
		$ticket->Rating = $rate;
		$ticket->update();

		return Response::json(array(
				'error' => false,
				'message' => "Rating is successful for Ticket id:".$ticket->id),
			200
		);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function feedback($id)
	{
		$input = Input::all();
		$user = Auth::user();
		$feed = array_get($input, 'value');
		$ticket = Ticket::find($id);
		$ticket->Feedback = $feed;
		$ticket->update();
		return Response::json(array(
			'error' => false,
			'message' => "Feedback is received for Ticket id:".$ticket->id),
		200
	);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function get($id)
	{

		$ticket = Ticket::with('userstaff')->find($id);
		return Response::json(array(
				'error' => false,
				'ticket' => $ticket),
			200
		);
	}
	public function location($id){
		$input = Input::all();
		$long = array_get($input, 'long');
		$lat = array_get($input, 'lat');
		$ticket = Ticket::find($id);
		$ticket->Latitude = $lat;
		$ticket->Longitude = $long;
		if ($ticket->Latitude && $ticket->Longitude) {
			try {

				$latitude = $ticket->Latitude;
				$longitude = $ticket->Longitude;
				$geocode = Geocoder::reverse($latitude, $longitude);
				// The GoogleMapsProvider will return a result
				//var_dump($geocode);
				echo "<br>Last Updated Location : " . $geocode->getcounty() . "," . $geocode->getregion();
			} catch (\Exception $e) {
				// No exception will be thrown here
				echo $e->getMessage();
			}
		} else {
			echo "Last Updated Location : Not Updated Yet";
		}
		$ticket->GeoLocation= $geocode->getcounty()." , ". $geocode->getregion();

		$ticket->update();
		return Response::json(array(
				'error' => false,
				'message' => "Updated Ticket ID".$ticket->id,
				'ticket' => $ticket),
			200
		);

	}
	public function remark($id)
	{
		$input = Input::all();
		$user = Auth::user();
		$remark = array_get($input, 'remark');
		$ticket = Ticket::find($id);
		$ticket->Remark = $remark;
		$ticket->update();

		return Response::json(array(
				'error' => false,
				'message' => "Remark is successful for Ticket id:".$ticket->id),
			200
		);
	}
	public function changestatus($id)
	{
		$input = Input::all();
		$user = Auth::user();
		$status = array_get($input, 'status');
		$ticket = Ticket::find($id);
		$ticket->Status = $status;
		$ticket->update();

		return Response::json(array(
				'error' => false,
				'message' => "Remark is successful for Ticket id:".$ticket->id),
			200
		);
	}


}
