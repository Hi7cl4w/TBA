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
			return response()->json(array(
					'error' => false,
					'tickets' => $tickets->toArray()),
				200
			);
		}
		elseif ($user->hasRole('Staff')){
			$tickets = Ticket::where('Staff_id', '=', $user->id)->get();
			return response()->json(array(
					'error' => false,
					'tickets' => $tickets->toArray()),
				200
			);
		}
		else
			return response()->json(array(
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
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
