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
Route::get('/test', function () {
    return View::make('test');
});
Route::get('foo', array('https', function()
{
    return View::make('pages.search');
}));
Route::get('/test2', 'TicketController@search');
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

        Route::get('/ticket/rating', 'TicketController@rating');
        Route::get('/staff/create', 'UsersController@create_staff');
        Route::post('/staff/create', 'UsersController@staff_store');
        Route::post('/ticket/create', 'TicketController@store');
        Route::post('/ticket', 'TicketController@store');
        Route::get('/ticket', 'TicketController@paging');
        Route::get('/ticket/{id}', 'TicketController@index');
        Route::get('/ticket/{id}', 'TicketController@index');
        Route::get('/comments', 'TicketController@comments');
        Route::post('/comments/post', 'TicketController@post');

        /*product*/
        Route::get('/products/register', 'ProductsController@create');
        Route::post('/products/register', 'ProductsController@store');
        Route::get('/products', 'ProductsController@view');
        Route::get('/products/table', 'ProductsController@table');
        Route::get('/products/list', 'ProductsController@getlist');
        Route::get('/products/delete', 'ProductsController@delete');
        Route::post('/products/delete', 'ProductsController@deleteperform');
        /*purchases*/
        Route::get('/purchases/register', 'PurchasesController@create');
        Route::post('/purchases/register', 'PurchasesController@store');
        Route::get('/purchases/table', 'PurchasesController@table');
        Route::get('/purchases', 'PurchasesController@view');
        Route::get('/purchases/get', 'PurchasesController@get');
        Route::get('/purchases/delete', 'PurchasesController@delete');
        Route::post('/purchases/delete', 'PurchasesController@deleteperform');

    });
});
Route::get('/logout', 'UsersController@logout');





/*API*/
/*
Route::group(array('prefix' => 'api/v1', 'before' => 'auth.mobile'), function()
{
    Route::resource('url', 'UrlController');
});*/
Route::group(array('prefix' => 'api/v1', 'before' => 'auth.mobile'), function()
{
    Route::get('/logout', 'MobileController@logout');
    Route::get('/type', 'MobileController@type');
    Route::get('/verify', 'MobileController@verify');
    Route::get('/location', 'MobileController@verify');

    Route::resource('ticket', 'MobileController');

});

//



