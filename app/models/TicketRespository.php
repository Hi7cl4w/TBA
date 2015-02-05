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
        
        $t->Staff_id = "2";
        $t->Subject = array_get($input, 'Subject');
        $t->Description = array_get($input, 'Description');
        $t->Status = "Pending";
        $t->Closing_date = null;
        $t->Remark = null;
        $t->Priority = 1;
        $t->Product_id = array_get($input, 'Product_id');
        $t->Purchase_id = array_get($input, 'Purchase_id');
        $t->Rating = 0;
        $t->Feedback = null;
        $t->save();
        return $t;

    }
    public function product_create($input)
    {
        $check = Products::find(array_get($input, 'id'));
        if($check==null) {

            $t = new Products;
            $t->id = array_get($input, 'id');
            $t->Name = array_get($input, 'Name');
            $t->Vendor = array_get($input, 'Vendor');
            $t->save();
            return $t;
        }
        return false;
    }
    public function purchase_register($input)
    {
        $t = new Purchases;
        $t->Name=array_get($input, 'Name');;
        $t->email=array_get($input, 'email');
        $t->product_id = array_get($input, 'product_id');
	    $t->save();
        return $t;
    }
    public function test($s)
    {

        echo $s;
        return $s;
    }



}