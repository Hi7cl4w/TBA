<?php

class TicketController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    //pagination
    public function paging()
    {
        $user = Auth::user();
        if ($user->hasRole('Customer')) {
            $tickets = Ticket::where('Customer_id','=',$user->id)->paginate(10);


        }
        else if ($user->hasRole('Staff')) {
            $tickets = Ticket::where('Staff_id','=',$user->id)->paginate(10);


        }
        else if ($user->hasRole('Administrator')) {
            $tickets = Ticket::paginate(10);


        }
        return View::make('pages.ticket', compact('tickets'))->with('user', $user);
    }

    public function index($id)
    {
        $user = Auth::user();

        if ($user->hasRole('Administrator')) {

            $tickets = Ticket::find($id);
            $user = Auth::user();

            if ($tickets!=null) {
                return View::make('pages.ticketview')
                    ->with(array(
                            'user' => $user,
                            'ticket' => $tickets
                        )
                    );
            }
            App::abort('404');
        } elseif ($user->hasRole('Staff')) {
            $user = Auth::user();
            $tickets = Ticket::where('Staff_id', '=', $user->id)->find($id);
            if ($tickets!=null) {
                return View::make('pages.ticketview')
                    ->with(array(
                            'user' => $user,
                            'ticket' => $tickets
                        )
                    );
            }
            App::abort('404');

        } elseif ($user->hasRole('Customer')) {
            $user = Auth::user();
            $tickets = Ticket::where('Customer_id', '=', $user->id)->find($id);;
            if ($tickets!=null) {
                return View::make('pages.ticketview')
                    ->with(array(
                            'user' => $user,
                            'ticket' => $tickets
                        )
                    );

            }
            App::abort('404');
        }
    }
    public function search()
    {


        $search = Input::get('query');

        $q = "%" . $search . "%";

        $tickets = Ticket::where('id', 'like', $q)->orWhere('subject', 'like', $q)->orderBy('id', 'asc')->with('usercustomer')->with('userstaff')->paginate(8);


        //$tickets= Ticket::paginate(10);
        $ticket = [
            'tickets' => $tickets->getItems(),
            'pagination' => [
                'total' => $tickets->getTotal(),
                'per_page' => $tickets->getPerPage(),
                'current_page' => $tickets->getCurrentPage(),
                'last_page' => $tickets->getLastPage(),
                'from' => $tickets->getFrom(),
                'to' => $tickets->getTo()
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
        $user = Auth::user();
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
            'g-recaptcha-response' => 'required',
            'terms' => 'required'

        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            $error = $validator->errors()->all(':message');
            $user = Auth::user();
            return Redirect::to('/profile/' . $user->username . '/ticket')
                ->withErrors($validator)// send back all errors to the login form
                ->withInput(Input::except('password'))
                ->with('error', $error);// send back the input (not the password) so that we can repopulate the form
        } else {
            $repo = App::make('TicketRespository');
            $ticket = $repo->ticket_create(Input::all());
            if ($ticket->id) {


                Mail::laterOn('ticket', 5, 'emails.ticket.admin', array('key' => 'value'), function ($message) use ($ticket) {
                    $customer = User::find($ticket->Customer_id);
                    $e = $customer->email;
                    if ($ticket->Staff_id)
                        $staff = User::find($ticket->Staff_id);
                    $message->to($e, 'no-replay')->subject('Welcome!');
                });
                Mail::laterOn('ticket', 5, 'emails.ticket.admin', array('key' => 'value'), function ($message) use ($ticket) {
                    $customer = User::find($ticket->Customer_id);
                    $e = $customer->email;
                    if ($ticket->Staff_id)
                        $staff = User::find($ticket->Staff_id);
                    $message->to($e, 'no-replay2')->subject('Welcome!');
                });

                return Redirect::action('TicketController@paging')
                    ->with('notice', "ticket created");
            }
            return Redirect::action('TicketController@paging')
                ->with('error', "ticket not created");
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function rating()
    {
            if(Request::ajax()) {
            $input = Input::all();
            $user = Auth::user();
            $id = array_get($input, 'id');
            $rate = array_get($input, 'value');
            $ticket = Ticket::find($id);
            $ticket->Rating = $rate;
            $ticket->update();

             return Response::json($ticket);
         }
        App::abort('404');
    }
    public function feedback(){
        if(Request::ajax()) {
            $input = Input::all();
            $user = Auth::user();
            $id = array_get($input, 'id');
            $head = "Feedback";
            $body = "Enter your feedback for ticket" . $id . " ?";
            $message = array(
                'head' => $head,
                'body' => $body,
                'id'   => $id,
            );

            return View::make('pages.feedback')->with('message', $message);
        }
        App::abort('404');
    }
    public function feedbackpost()
    {
        if(Request::ajax()) {
            $input = Input::all();
            $user = Auth::user();
            $id = array_get($input, 'id');
            $feed = array_get($input, 'value');
            $ticket = Ticket::find($id);
            $ticket->Feedback = $feed;
            $ticket->update();

            return Response::json($ticket);
        }
        App::abort('404');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function comments()
    {
 if(Request::ajax()) {
     $input = Input::all();
           $user = Auth::user();
       $id = array_get($input, 'id');

            // $data="<div class=\"user-profile-pic-wrapper\"><div class=\"user-profile-pic-normal\"><img width=\"35\" height=\"35\" data-src-retina=\"\" alt=\"\"></div></div><div class=\"info\"> Hi,<br><br> Thank you for reaching us, We are looking into this issue and will updateyou.<br><br>Manu K<br><p>Posted on 10/29/13 at 07:21</p><hr> </div>";
            $c = Comments::where('ticket_id', '=', $id)->orderBy('created_at', 'DESC')->with('user')->paginate(2);
            $data = [
                'comments' => $c->getItems(),
                'pagination' => [
                    'total' => $c->getTotal(),
                    'last_page' => $c->getLastPage(),
                ]
            ];

            return Response::json($data);
       }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function post()
    {
        if(Request::ajax()) {
            $input = Input::all();
            $user = Auth::user();
            $id = array_get($input, 'id');
            $c = array_get($input, 'comment');
            $comment=new Comments;
            $comment->user_id=$user->id;
            $comment->ticket_id=$id;
            $comment->comment=$c;
            $comment->save();
            $data="<div class=\"user-profile-pic-wrapper\"><div class=\"user-profile-pic-normal\"><img width=\"35\" height=\"35\" src=\"/assets/img/user.svg\" alt=\"\"> ".$user->fname." ".$user->lname."</div></div><div class=\"info\"> <br><br> ".$comment->comment."<br><p>Posted on ".$comment->updated_at."</p><hr> </div>";
            return Response::json($data);

        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
