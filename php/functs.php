<?php
/* these Php classes are going to be useful for not having to have ugly SQL code inlined with the web interface code.
*/ 

/*This first class will have implementation of all funcitons outlined in part 2 of the project and deal with all of the databse connections so I don't have to see it mixed in with the web code and will implement all funcitons associated with item database itself. Also lets us change dbms easier if we have two*/

class lostandfound //horrible name ikr.
{
	//Class Member variable declaration
	
	//Do some minor connecting to the databse and what have you
	function __construct()
	{
		#$this->open($dbfilepath) or die("could not create database");
		return $this;
	}
	//As Outlined by Phase 2, add an entry entity to the database with all attributes.
	//This is going to take a hash table with all the attributes indexed by their respective names.
	//Fields of the hash table
	//username:Stored username.
	//userid:Web input username.
	//type:item type description string.
	//color:item color description string.
	//date:item datestring
	//building:item buildingstring.
	//room: item roomstring.
	public function addEntry($parameters)
	{
		//item ids will go in order, each next Iid will just be the previous one +1
		$newid = getLargestEid();
		//create huge query string
		$str = <<<EOD
		INSERT INTO Item_Entry Values($newid);
		INSERT INTO Finds Values($newid,${parameters['username']});
		INSERT INTO Submitted_by Values(${parameters['userid']},$newid);
		INSERT INTO Describes Values($newid);
		INSERT INTO Description Values(${parameters['type']},${parameters['color']},$newid);
		INSERT INTO Discovery_event Values($newid,${parameters['username']},${parameters['date']},${parameters['building']},${parameters['room']});
EOD;
		echo $str;

	}
	//As Outlined by Phase 2, delete an entry entity from db.
	//take an entry id and purges it from the database.
	public function deleteEntry($e_id,$userinfo)
	{
		$delstring = <<<EOD
		DELETE FROM Item_Entry WHERE entry_id = $e_id;
		DELETE FROM Finds WHERE find_id = $e_id;
		DELETE FROM Submitted_by WHERE Submit_id = $e_id;
		DELETE FROM Describes WHERE desc_id = $e_id;
		DELETE FROM Description WHERE d_id = $e_id;
		DELETE FROM Discovery_event WHERE entry_id = $e_id;
		INSERT INTO Non_Recoverable Values($e_id);
		INSERT INTO Item_Claimed Values(${userinfo['fname']},${userinfo['mname']},${userinfo[lname]},${userinfo['date']},${userinfo['uname']},$e_id);
EOD;
		echo $delstring;
	}

	//As Outlined by P2, edit an existing entry.
	//
	public function editEntry()
	{

	}
	//As Outlined by P2, returns results of a query.
	//performs a SELECT Query on the existing table.
	//Parameters table is much like the add parms table
	//Fields:
	//type
	//color 
	//begindate
	//enddate
	//building
	//room 
	//should all be prett self explanatory
	public function searchItem($search)
	{
		$querystring = <<<EOD
		SELECT Type,date_found,Bldg,user_name,color
		FROM Description JOIN Finds JOIN Discovery_event JOIN Submitted_by
		WHERE ${search['type']} LIKE Type AND ${search['color']} LIKE color
		AND (${search[begindate]} < date_found AND ${search['enddate']} > date_found)
		AND (${search['building']} = Bldg AND ${search['room']} = room);

EOD;

	}
	//closes database connection cleanly when out of scope.
	//returns current largest entry id in database.
	private function getLargestEid()
	{
		return 1;
	}

	function __destruct()
	{
		//$dbhandle->close();
	}

}

class UIstuff //This class will do boring html rendering.
{
	function __construct()
	{
		return $this;
	}
	//perform user login and verification, takes trusted staff username and login database handle as parameter.
	//returns admin info.
	function login($tstaffdb,$postdata)
	{
		
	}
	//render the UI for the normal user interface, takes map of user info as parameter, calls search functions based on web input from here.
	function userInterface($userinfo)
	{

	}
	//render UI for administrative users interface, takes hmap of admin info, calls search and modify functions based on web input from here. 
	function adminInterface($admininfo)
	{

	}
	
}

echo "Begin testing classes.\n";

$db = new lostandfound();
$ui = new UIstuff();


$testparms['username'] = "bokkw4";
$testparms['userid'] = "00000000";
$testparms['type'] = "Backpack";
$testparms['color'] = "RED";
$testparms['date'] = "2016:11:11";
$testparms['building'] = "McNutt";
$testparms['room'] = "101";

$lostandfound->addEntry($testparms);