<?php

class TicketSeeder extends Seeder{
    public function run()
    {

        $string= "<H1>This is a Header</H1>
<H2>This is a Medium Header</H2>
    Send me mail at
<P> This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!  This is a new paragraph!
<P> <B>This is a new paragraph!</B>
<BR> <B><I>This is a new sentence without a paragraph break, in bold italics.</I></B>
<HR>";


        for($i=0;$i<100;$i++)
        {

            DB::table('ticket')->insert(array(array(
                'prefix' => "TI",
                'Customer_id' => rand(3, 4),
                'Staff_id' => 2,
                'Subject' => "Subject " . rand(10000, 500000),
                'Description' => $string,
                'Status' => "Pending",
                'Product_id' => rand(1, 200),
                'Purchase_id' => "e44700f4-0958-47ab-9b00-a7171068d6e1",
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            )));
        }
    }
}