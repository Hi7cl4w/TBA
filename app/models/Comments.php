<?php

class Comments extends Eloquent{
    protected $table="comments";
    public function user(){
        $this->hasOne('Users','user_id','id');
    }

}