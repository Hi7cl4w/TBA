<?php
class Ticket extends Eloquent {

    protected $table = 'ticket';
    public function usercustomer(){
        return $this->belongsTo('User','Customer_id','id');
    }
    public function userstaff(){
        return $this->belongsTo('User','Staff_id','id');
    }

}