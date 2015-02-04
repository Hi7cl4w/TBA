<?php

class ProductsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function view()
	{
		$user=Auth::user();
		return View::make('pages.Products')->with('user', $user);
	}
	public function table()
	{
		if(Request::ajax()) {
			$user = Auth::user();
			$d = Products::select(array('id', 'Name', 'Vendor'));;
			return Datatables::of($d)->add_column('operations', ' <button id="{{ $id }}" class="btn btn-danger btn-xs delete" >DELETE</i></button>')
				->make();
			//return View::make('pages.Products')->with('user', $user);
		}
		App::abort(404);
	}
	public function getlist()
	{
		$term= DB::table('products')->orderBy('Vendor', 'asc')->get();
		return Response::json($term);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user=Auth::user();
		return View::make('pages.ProductRegister')->with('user', $user);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(

			'id' => 'required',
			'Name' => 'required',
			'Vendor' => 'required',
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			$error = $validator->errors()->all(':message');
			$user = Auth::user();
			return Redirect::action('ProductsController@create')
				->withErrors($validator)// send back all errors to the login form
				->with('error', $error);// send back the input (not the password) so that we can repopulate the form
		} else {
			$repo = App::make('TicketRespository');
			$ticket = $repo->product_create(Input::all());
			if ($ticket) {
					return Redirect::action('ProductsController@create')
					->with('notice', "Product successfully registered");
			}
			else
				return Redirect::action('ProductsController@create')
					->with('notice', "failed already exist");
		}
	}

	public function delete()
	{
		if(Request::ajax()) {
			$input = Input::all();
			$user = Auth::user();
			$id = array_get($input, 'id');
			$head = "Delete";
			$url =  URL::to('/profile/'.$user->username."/products/delete");
			$body = "WARNING: ALL TICKETS AND PURCHASES BELONG TO THIS WILL BE DELETED <br>Do you want to delete " . $id . " ?";
			$message = array(
				'head' => $head,
				'url' => $url,
				'body' => $body,
				'id'   => $id,
			);

			return View::make('pages.delete')->with('message', $message);
		}
		App::abort('404');
	}
	public function deleteperform()
	{

		$input = Input::all();
		$user = Auth::user();
		$id = array_get($input, 'id');
		Products::destroy($id);

		return Redirect::action('ProductsController@view')
			->with('notice', "Product ".$id." successfully deleted");

	}

}
