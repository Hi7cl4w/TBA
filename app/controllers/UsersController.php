<?php


/**
 * UsersController Class
 *
 * Implements actions regarding user management
 */
class UsersController extends Controller
{

    /**
     * Displays the form for account creation
     *
     * @return  Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('pages.signup');
    }

    /**
     * Stores new account
     *
     * @return  Illuminate\Http\Response
     */
    public function staff_store()
    {
        $rules = array(
            'email' => 'required|email',// password can only be alphanumeric and has to be greater than 3 characters
            'username' => 'required|alphaNum|min:3',
            'FirstName' => 'required|alphaNum',
            'LastName' => 'required|alphaNum',
            'TeleNo' => 'required|alphaNum',
            'DOB' => 'required|alphaNum',
            'Gender' => 'required|alphaNum',
            'Address' => 'required|alphaNum|min:3',
            'City' => 'required|alphaNum|min:3',
            'Country' => 'required|alphaNum|min:3',
            'City' => 'required|alphaNum|min:3',
            'Pin' => 'required|alphaNum|min:3',
            'TeleNo' => 'required|alphaNum|min:3'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            $error = $validator->errors()->all(':message');
            return Redirect::action('UsersController@create')
                ->withErrors($validator)// send back all errors to the login form
                ->withInput(Input::except('password'))
                ->with('error', $error);// send back the input (not the password) so that we can repopulate the form
        } else {
            $repo = App::make('UserRepository');
            $user = $repo->signup_customer(Input::all());
            echo $user;

            if ($user->id) {

                if (Config::get('confide::signup_email')) {
                    Mail::queueOn(
                        Config::get('confide::email_queue'),
                        Config::get('confide::email_account_confirmation'),
                        compact('user'),
                        function ($message) use ($user) {
                            $message
                                ->to($user->email, $user->username)
                                ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
                        }
                    );
                }

                return Redirect::action('UsersController@login')
                    ->with('notice', Lang::get('confide::confide.alerts.account_created'));
            } else {
                $error = $user->errors()->all(':message');

                return Redirect::action('UsersController@create')
                    ->withInput(Input::except('password'))
                    ->with('error', $error);
            }
        }
    }

    /**
     * Stores new account
     *
     * @return  Illuminate\Http\Response
     */
    public function admin_store()
            {
                $rules = array(
                    'email' => 'required|email',// password can only be alphanumeric and has to be greater than 3 characters
                    'username' => 'required|alphaNum|min:3',
                    'FirstName' => 'required|alphaNum|min:3',
                    'LastName' => 'required|alphaNum|min:3',
                    'TeleNo' => 'required|alphaNum|min:3',
                    'DOB' => 'required|alphaNum|min:3',
                    'Gender' => 'required|alphaNum',
                    'Address' => 'required|alphaNum|min:3',
                    'City' => 'required|alphaNum|min:3',
                    'Country' => 'required|alphaNum|min:3',
                    'City' => 'required|alphaNum|min:3',
                    'Pin' => 'required|alphaNum|min:3',
                    'TeleNo' => 'required|alphaNum|min:3',
                    'g-recaptcha-response' => 'required|recaptcha'
                );

                // run the validation rules on the inputs from the form
                $validator = Validator::make(Input::all(), $rules);

                // if the validator fails, redirect back to the form
                if ($validator->fails()) {
                    $error = $validator->errors()->all(':message');
                    return Redirect::action('UsersController@create')
                        ->withErrors($validator)// send back all errors to the login form
                        ->withInput(Input::except('password'))
                        ->with('error', $error);// send back the input (not the password) so that we can repopulate the form
        } else {
            $repo = App::make('UserRepository');
            $user = $repo->signup_customer(Input::all());
            echo $user;

            if ($user->id) {

                if (Config::get('confide::signup_email')) {
                    Mail::queueOn(
                        Config::get('confide::email_queue'),
                        Config::get('confide::email_account_confirmation'),
                        compact('user'),
                        function ($message) use ($user) {
                            $message
                                ->to($user->email, $user->username)
                                ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
                        }
                    );
                }

                return Redirect::action('UsersController@login')
                    ->with('notice', Lang::get('confide::confide.alerts.account_created'));
            } else {
                $error = $user->errors()->all(':message');

                return Redirect::action('UsersController@create')
                    ->withInput(Input::except('password'))
                    ->with('error', $error);
            }
        }
    }







    /**
     * Stores new account
     *
     * @return  Illuminate\Http\Response
     */
    public function store()
    {
        $rules = array(
            'email' => 'required|email',// password can only be alphanumeric and has to be greater than 3 characters
            'username' => 'required|alphaNum|min:3',
            'FirstName' => 'required|alphaNum|min:3',
            'LastName' => 'required|alphaNum|min:3',
            'TeleNo' => 'required|alphaNum|min:3',
            'DOB' => 'required|alphaNum|min:3',
            'Gender' => 'required|alphaNum',
            'Address' => 'required|alphaNum|min:3',
            'City' => 'required|alphaNum|min:3',
            'Country' => 'required|alphaNum|min:3',
            'City' => 'required|alphaNum|min:3',
            'Pin' => 'required|alphaNum|min:3',
            'TeleNo' => 'required|alphaNum',
            'g-recaptcha-response' => 'required|recaptcha'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            $error = $validator->errors()->all(':message');
            return Redirect::action('UsersController@create')
                ->withErrors($validator)// send back all errors to the login form
                ->withInput(Input::except('password'))
                ->with('error', $error);// send back the input (not the password) so that we can repopulate the form
        } else {
            $repo = App::make('UserRepository');
            $user = $repo->signup_customer(Input::all());
            echo $user;

            if ($user->id) {

                if (Config::get('confide::signup_email')) {
                    Mail::queueOn(
                        Config::get('confide::email_queue'),
                        Config::get('confide::email_account_confirmation'),
                        compact('user'),
                        function ($message) use ($user) {
                            $message
                                ->to($user->email, $user->username)
                                ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
                        }
                    );
                }

                return Redirect::action('UsersController@login')
                    ->with('notice', Lang::get('confide::confide.alerts.account_created'));
            } else {
                $error = $user->errors()->all(':message');

                return Redirect::action('UsersController@create')
                    ->withInput(Input::except('password'))
                    ->with('error', $error);
            }
        }
    }

    /**
     * Displays the login form
     *
     * @return  Illuminate\Http\Response
     */
    public function login()
    {
        if (Confide::user()) {
            return Redirect::to('/');
        } else {
            return View::make('pages.login');
        }
    }

    /**
     * Attempt to do login
     *
     * @return  Illuminate\Http\Response
     */
    public function doLogin()
    {
        $repo = App::make('UserRepository');

        $input = Input::all();

        if ($repo->login($input)) {
            $user = Auth::user();
            return Redirect::intended('/profile/' . $user->username);
        } else {
            if ($repo->isThrottled($input)) {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            } elseif ($repo->existsButNotConfirmed($input)) {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            } else {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

            return Redirect::action('UsersController@login')
                ->withInput(Input::except('password'))
                ->with('error', $err_msg);
        }
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string $code
     *
     * @return  Illuminate\Http\Response
     */
    public function confirm($code)
    {
        if (Confide::confirm($code)) {
            $notice_msg = Lang::get('confide::confide.alerts.confirmation');
            return Redirect::action('UsersController@login')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
            return Redirect::action('UsersController@login')
                ->with('error', $error_msg);
        }
    }

    /**
     * Displays the forgot password form
     *
     * @return  Illuminate\Http\Response
     */
    public function forgotPassword()
    {
        return View::make('pages.forgot');
    }

    /**
     * Attempt to send change password link to the given email
     *
     * @return  Illuminate\Http\Response
     */
    public function doForgotPassword()
    {

        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'g-recaptcha-response' => 'required|recaptcha' // password can only be alphanumeric and has to be greater than 3 characters
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('forgot')
                ->withErrors($validator)// send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            if (Confide::forgotPassword(Input::get('email'))) {
                $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
                return Redirect::action('UsersController@login')
                    ->with('notice', $notice_msg);
            } else {
                $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
                return Redirect::action('UsersController@doForgotPassword')
                    ->withInput()
                    ->with('error', $error_msg);
            }
        }
    }

    /**
     * Shows the change password form with the given token
     *
     * @param  string $token
     *
     * @return  Illuminate\Http\Response
     */
    public function resetPassword($token)
    {
        return View::make('pages.reset')
            ->with('token', $token);
    }

    /**
     * Attempt change password of the user
     *
     * @return  Illuminate\Http\Response
     */
    public function doResetPassword()
    {
        $repo = App::make('UserRepository');
        $input = array(
            'token' => Input::get('token'),
            'password' => Input::get('password'),
            'password_confirmation' => Input::get('password_confirmation'),
        );

        // By passing an array with the token, password and confirmation
        if ($repo->resetPassword($input)) {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');
            return Redirect::action('UsersController@login')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
            return Redirect::action('UsersController@resetPassword', array('token' => $input['token']))
                ->withInput()
                ->with('error', $error_msg);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @return  Illuminate\Http\Response
     */
    public function logout()
    {
        Confide::logout();

        return Redirect::to('/login');
    }
}
