<?php

class PurchasesController extends \BaseController {

	public function get(){
		$id=Input::get('value');
		$product=null;
		if($p= Purchases::find($id))
		$product = Products::find($p->product_id);

		return Response::json($product);
	}



	public function index()
	{
		//
	}

	public function create()
	{
		$user=Auth::user();
		return View::make('pages.PurchaseRegister')->with('user', $user);
	}

	public function store()
	{
		$rules = array(

			'Name' => 'required',
			'email' => 'required|email',
			'product_id' => 'required',
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			$error = $validator->errors()->all(':message');
			$user = Auth::user();
			return Redirect::action('PurchasesController@create')
				->withErrors($validator)// send back all errors to the login form
				->with('error', $error);// send back the input (not the password) so that we can repopulate the form
		} else {
			$repo = App::make('TicketRespository');
			$ticket = $repo->purchase_register(Input::all());
			if ($ticket) {
				return Redirect::action('PurchasesController@create')
					->with('notice', "Purchase is successfully registered <br>Purchase Verification ID is " .$ticket->id);
			}
			else
				return Redirect::action('PurchasesController@create')
					->with('notice', "failed already exist");
		}
	}

	public function view(){
		$user=Auth::user();
		return View::make('pages.Purchases')->with('user', $user);

}
	public function table()
	{
		$user=Auth::user();
		$d=Purchases::select(array('Name','email','product_id','id'));;
		return Datatables::of($d)->add_column('operations', ' <button id="{{ $id }}" class="btn btn-danger btn-xs delete" >DELETE</i></button>
                ')->make();

	}

}
