<?php
/**
 * Created by PhpStorm.
 * User: Manu
 * Date: 22-Jan-15
 * Time: 12:10 AM
 */


class TicketRespository
{


    public function ticket_create($input)
    {
        $t = new Ticket;
        $t->prefix = "TI";
        $user=Auth::user();
        $t->Customer_id = $user->id;
        $t->Staff_id = array_get($input, 'Staff_id ');
        $t->Subject = array_get($input, 'Subject');
        $t->Description = array_get($input, 'Description');
        $t->Status = "Pending";
        $t->Closing_date = null;
        $t->Remark = null;
        $t->Priority = 1;
        $t->GeoLocation = null;
        $t->Coordinates = null;
        $t->Product_id = array_get($input, 'Product_id');
        $t->Purchase_id = array_get($input, 'Purchase_id');
        $t->Rating = null;
        $t->Feedback = null;
        $t->save();
        return $t;

    }
    public function product_create($input)
    {
        $t = new Product;
        $t->product_id = array_get($input, 'Staff_id ');
        $t->Name = array_get($input, 'Name');
        $t->Catagory = array_get($input, 'Catagory');
        $t->save();
        return $t;
    }
    public function purchase_register($input)
    {
        $t = new Purchases;
        $t->Name=array_get($input, 'Name');;
        $t->email=array_get($input, 'email');
        $t->product_id = array_get($input, 'product_id');
	    $t->Purchase_code = "UUID()";
        $t->save();
        return $t;
    }
    public function test($s)
    {

        echo $s;
        return $s;
    }



}