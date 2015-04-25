<?php
class Ticket extends Eloquent {

    protected $table = 'ticket';
    public function usercustomer(){
        return $this->belongsTo('User','Customer_id','customer_id');
    }
    public function userstaff(){
        return $this->belongsTo('User','Staff_id','staff_id');
    }public function usercustomerd(){
        return $this->belongsTo('Customer','Customer_id','customer_id');
    }public function userstaffd(){
        return $this->belongsTo('Staff','Staff_id','staff_id');
    }
    public function comments(){
        return $this->hasMany('Comments','id','ticket_id');
    }

}
