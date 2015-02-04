<?php

class Comments extends Eloquent{
    protected $table="comments";
    public function user(){
        return $this->belongsTo('User','user_id','id');
    }
    public function ticket(){
        $this->belongsTo('User','ticket_id','id');
    }

}