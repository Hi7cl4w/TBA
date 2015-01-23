aqeDFShweiSFJBWIJEBF
<?php
//echo Uuid::generate(4)."\n";
echo Uuid::generate(3,'test', Uuid::nsDNS);
echo Uuid::import('d3d29d70-1d25-11e3-8591-034165a3a613');
// Turn on output buffering
ob_start();
//Get the ipconfig details using system commond
system('ipconfig /all');

// Capture the output into a variable
$mycom=ob_get_contents();
// Clean (erase) the output buffer
ob_clean();

$findme = "Physical";
//Search the "Physical" | Find the position of Physical text
$pmac = strpos($mycom, $findme);
echo "<br>";
// Get Physical Address
$mac=substr($mycom,($pmac+36),17);
//Display Mac Address
echo $mac;
$t=new TicketRespository;
$t->test("se3ed3");