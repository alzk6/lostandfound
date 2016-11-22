<?php
/* these Php classes are going to be useful for not having to have ugly SQL code inlined with the web interface code.
*/ 

/*This first class will have implementation of all funcitons outlined in part 2 of the project and deal with all of the databse connections so I don't have to see it mixed in with the web code and will implement all funcitons associated with item database itself. Also lets us change dbms easier if we have two*/

class lostandfound//horrible name ikr.
{
	//Class Member variable declaration
	
	private static $dbhandle;
	//Do some minor connecting to the databse and what have you
	function __construct($dbfilepath)
	{
		
	}
	public function test()
	{
		echo 'Hello!';
		if(isset($dbhandle)) echo "\nDbconnection is good";
		$result = $dbhandle->query("SELECT * FROM Item_Entry;");
		var_dump($result);
	}
	//As Outlined by Phase 2, add an entry entity to the database with all attributes.
	//This is going to take a hash table with all the attributes indexed by their respective names.

	public function addEntry($parameters)
	{

	}
	//As Outlined by Phase 2, delete an entry entity from db.
	//take an entry id and purges it from the database.
	public function deleteEntry($entry_id)
	{

	}
	//As Outlined by P2, edit an existing entry.
	//not too sure how to implement this..
	public function editEntry()
	{

	}
	//As Outlined by P2, returns results of a query.
	//performs a SELECT Query on the existing table.
	public function searchItem()
	{

	}
	//closes database connection cleanly when out of scope.

	function __destruct()
	{
		//$dbhandle->close();
	}

}
class UIstuff //This class will do boring html rendering.
{
	function __construct()
	{

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
$db = new SQLite3("./test.db");
$results = $db->query("SELECT * FROM Trusted_Staff;");
echo "========\n";
var_dump($results);
echo "========\n";
