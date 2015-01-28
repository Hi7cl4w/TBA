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
			$tickets = Ticket::where('Customer_id', '=', $user->id);
			return Response::json(array(
					'error' => true,
					'tickets' => $tickets),
				200
			);
		}
		elseif ($user->hasRole('Staff')){
			$tickets = Ticket::where('Staff_id', '=', $user->id);
			return Response::json(array(
					'error' => true,
					'tickets' => $tickets),
				200
			);
		}
		else
			return Response::json(array(
					'error' => true,
					'message' => 'Sorry,User unable to access'),
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
