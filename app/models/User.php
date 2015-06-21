<?php


use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements ConfideUserInterface {
	use ConfideUser;
	use HasRole;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	public function ticketcustomer(){
		return $this->hasMany('Ticket','id','Customer_id');
	}
	public function ticketstaff(){
		return $this->hasMany('Ticket','Staff_id','id');
	}
	public function roles()
	{
		return $this->belongsToMany('Role','assigned_roles');
	}
	public function comments(){
		return $this->hasMany('Comments','id','user_id');
	}

}
