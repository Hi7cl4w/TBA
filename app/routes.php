<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function () {
    return Redirect::to('/login');
   // return View::make('test');
});
Route::get('/authtest', array('before' => 'auth.username', function()
{
    return View::make('test');
}));


Route::get('hello', function () {
    return View::make('hello');
});
Route::get('/test', function () {
    return View::make('pages.search');
});
Route::get('/getdata', function () {
    $term= Input::get('term');
    $r=[];
    for($i=0;$i<8;$i++)
    $r[]=['value'=> rand() ];
    return Response::json($r);
});
Route::get('reg2', function () {
    return View::make('pages.register');
});






Route::get('/start', function () {
    $customer = new Role();
    $customer->name = 'Customer';
    $customer->save();

    $admin = new Role();
    $admin->name = 'Staff';
    $admin->save();

    $admin = new Role();
    $admin->name = 'Administrator';
    $admin->save();

    // $read = new Permission();
    //$read->name = 'can_read';
    // $read->display_name = 'Can Read Posts';
    // $read->save();

    //$edit = new Permission();
    //$edit->name = 'can_edit';
    // $edit->display_name = 'Can Edit Posts';
    // $edit->save();
    //
    //  $subscriber->attachPermission($read);
    //  $author->attachPermission($read);
    //   $author->attachPermission($edit);
    //$user1 = User::where('id','=','1')->first();


    $user1->attachRole($admin);

    return 'Woohoo!';
});
Route::get('/add', function () {

    $admin = Role::where('name', '=', 'Administrator')->get()->first();
    $edit = Permission::where('name', '=', 'manage_users')->get()->first();
    echo $admin . "\n";
    echo $edit;
    // $read = new Permission();
    // $read->name = 'read_ticket';
    // $read->display_name = 'Read Ticket';
    // $read->save();

    // $edit = new Permission();
    // $edit->name = 'manage_users';
    // $edit->display_name = 'Manage Users';
    // $edit->save();
    //$user = Auth::user();
    //$user->attachPermission($read);$user->roles()->attach( $admin->id );


    $admin->perms()->sync(array($edit->id));

    //  $owner->perms()->sync(array($managePosts->id,$manageUsers->id));
//$admin->perms()->sync(array($managePosts->id));


    return 'Woohoo!';
});
Route::get('/secret', function () {
    //Auth::loginUsingId(1);

    $user = Auth::user();

    if ($user->hasRole('Administrator')) {
        return 'Redheads party the hardest!';
    }

    return 'Many people like to party.';
});
Route::get('/mail', function () {
    //Auth::loginUsingId(1);

    //$user = Auth::user();
    //echo $user['email'];
    Mail::send('test', array('key' => 'value'), function ($message) {
        $user = Auth::user();
        $message->to($user->email, 'John Smith')->subject('Welcome!');
    });


    return 'sented.';
});
//

// Confide routes
//Route::get('users/create', 'UsersController@create');
//Route::post('users', 'UsersController@store');
Route::get('users/confirm/{code}', 'UsersController@confirm');


Route::get('/sitemap', function () {
    $file = public_path(). "/assets/sitemap.xml";  // <- Replace with the path to your .xml file
    // check if the file exists
    if (file_exists($file)) {
        // read the file into a string
        $content = file_get_contents($file);
        // create a Laravel Response using the content string, an http response code of 200(OK),
        //  and an array of html headers including the pdf content type
        return Response::make($content, 200, array('content-type'=>'application/xml'));
    }
});

Route::get('/login', 'UsersController@login')->before('guest');
// route to process the form
Route::post('/login', 'UsersController@doLogin');
Route::get('/forgot', 'UsersController@forgotPassword');
Route::post('/forgot', 'UsersController@doForgotPassword');
Route::get('/reset_password/{token}', 'UsersController@resetPassword');
Route::post('/reset_password', 'UsersController@doResetPassword');
Route::get('/signup', 'UsersController@create');
Route::post('/', 'UsersController@store');

/*profile page auth only*/
Route::group(array('prefix' => 'profile','before' => 'auth'), function() {
    $user = Auth::user();
    Route::group(array('prefix' => $user['username'],'before' => 'auth' ), function() {
        Route::get('/profile2', function () {
            return View::make('pages.dashboard2');
        });
        /*user dashboard*/
        Route::get('/', function () {
            $user = Auth::user();

                return View::make('pages.dashboard')->with('user', $user);

        });
        /*ticket*/
        Route::get('/ticket/create', 'TicketController@create');
        Route::post('/ticket/create', 'TicketController@store');
        Route::post('/ticket', 'TicketController@store');
        Route::get('/ticket', 'TicketController@paging');
        /*product*/
        Route::get('/products/create', 'ProductsController@create');
        Route::post('/products/create', 'ProductsController@store');
        Route::post('/products', 'ProductsController@view');
        Route::post('/products/list', 'ProductsController@getlist');
        /*purchases*/
        Route::get('/purchases/create', 'PurchasesController@create');
        Route::post('/purchases/create', 'PurchasesController@store');
        Route::post('/purchases', 'PurchasesController@view');
        Route::get('/purchases', 'PurchasesController@view');


    });
});
Route::get('/logout', 'UsersController@logout');
/*API*/


Route::group(array('prefix' => 'api/v1', 'before' => 'auth.mobile'), function()
{
    Route::resource('url', 'UrlController');
});

//



