<?php

class TicketController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function paging() {
		$tickets = Ticket::paginate(10);
		$user=Auth::user();
		return View::make('pages.ticket', compact('tickets'))->with('user', $user);
	}

	public function index()
	{
		//
	}
public function search()
	{


		$search=Input::get('query');

		$q = "%".$search."%";

		$tickets = Ticket::where('id', 'like', $q)->orWhere('subject', 'like', $q)->orderBy('id', 'asc')->with('usercustomer')->with('userstaff')->paginate(8);



		//$tickets= Ticket::paginate(10);
		$ticket = [
			'tickets'   => $tickets->getItems(),
			'pagination' => [
				'total'        => $tickets->getTotal(),
				'per_page'     => $tickets->getPerPage(),
				'current_page' => $tickets->getCurrentPage(),
				'last_page'    => $tickets->getLastPage(),
				'from'         => $tickets->getFrom(),
				'to'           => $tickets->getTo()
			]
		];
		return Response::json($ticket);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user=Auth::user();
		return View::make('pages.ticket')->with('user', $user);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(

			'Subject' => 'required|min:3',
			'Description' => 'required',
			'Purchase_id' => 'required',
			'g-recaptcha-response' => 'required|recaptcha',
			'terms' => 'required'

		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			$error = $validator->errors()->all(':message');
			$user=Auth::user();
			return Redirect::to('/profile/'.$user->username.'/ticket')
				->withErrors($validator)// send back all errors to the login form
				->withInput(Input::except('password'))
				->with('error', $error);// send back the input (not the password) so that we can repopulate the form
		} else {
			$repo = App::make('TicketRespository');
			$ticket = $repo->ticket_create(Input::all());
			if ($ticket->id) {
				if ($repo->isThrottled($input)) {
					$err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
				} elseif ($repo->existsButNotConfirmed($input)) {
					$err_msg = Lang::get('confide::confide.alerts.not_confirmed');
				} else {
					$err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
				}

				return Redirect::action('Ticket@Controller@create')
					->withInput(Input::except('password'))
					->with('error', $err_msg);

			}

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
