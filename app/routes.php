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

Route::get('/', function()
{
    return View::make('pages.login');
});
Route::get('hello', function()
{
    return View::make('hello');
});
Route::get('/test', function()
{
    return View::make('pages.admin.profile');
});
Route::get('reg', function()
{
    return View::make('pages.register');
});
Route::filter('auth', function()
{
     if (Auth::guest()) return Redirect::guest('login');
});
Route::get('/profile', function()
{
	return View::make('pages.admin.profile');
})->before('auth');
// route to show the login form
	Route::get('/login', array('uses' => 'HomeController@showLogin'))->before('guest');

	// route to process the form
    Route::post('/login', 'HomeController@doLogin');
    Route::get('/Redirect', 'HomeController@doCheck');
	Route::get('/logout', 'HomeController@doLogout');


Route::get('/start', function()
{
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
 $user1 = User::where('id','=','1')->first();
    
 
 
    $user1->attachRole($admin);
 
    return 'Woohoo!';
});
Route::get('/add', function()
{
    
 $admin = Role::where('name','=','Administrator')->get()->first();
 $edit = Permission::where('name','=','manage_users')->get()->first();
 echo $admin."\n";
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
Route::get('/secret', function()
{
    //Auth::loginUsingId(1);
 
    $user = Auth::user();
 
    if ($user->hasRole('Administrator'))
    {
        return 'Redheads party the hardest!';
    }
 
    return 'Many people like to party.';
});