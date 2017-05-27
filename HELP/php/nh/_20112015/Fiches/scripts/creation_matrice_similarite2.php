<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
//$table = 'datatables_demo';
$table = $_GET["fiche"];
$Depcom = $_GET["Depcom"];

// Table's primary key
$primaryKey = 'code';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => 'libéllé', 'dt' => 0 ),
	array( 'db' => 'lib_epci',  'dt' => 1 ),
	array( 'db' => 'dep',   'dt' => 2 ),
	array( 'db' => 'lib_reg',     'dt' => 3 ),
	array( 'db' => 'lib_typologie',     'dt' => 4 ),
	array( 'db' => 'code',     'dt' => 5 ),
	array( 'db' => 'latlong',     'dt' => 6 ),
	array( 'db' => 'similarité',  'dt' => 7 ),
	array( 'db' => 'comp1',   'dt' => 8 ),
	array( 'db' => 'comp2',   'dt' => 9 ),
	array( 'db' => 'comp3',   'dt' => 10 ),
	array( 'db' => 'comp4',   'dt' => 11 ),
	array( 'db' => 'comp5',   'dt' => 12 ),
	array( 'db' => 'comp6',   'dt' => 13 ),
	array( 'db' => 'comp7',   'dt' => 14 ),
	array( 'db' => 'comp8',   'dt' => 15 ),
	array( 'db' => 'comp9',   'dt' => 16 ),
	array( 'db' => 'comp10',   'dt' => 17 ),
	array( 'db' => 'comp11',   'dt' => 18 ),
	array( 'db' => 'comp12',   'dt' => 19 ),
	array( 'db' => 'comp13',   'dt' => 20 ),
	array( 'db' => 'comp14',   'dt' => 21 ),
	array( 'db' => 'comp15',   'dt' => 22 ),
	array( 'db' => 'comp16',   'dt' => 23 ),
	array( 'db' => 'comp17',   'dt' => 24 ),
	array( 'db' => 'comp18',   'dt' => 25 ),
	array( 'db' => 'comp19',   'dt' => 26 ),
	array( 'db' => 'comp20',   'dt' => 27 ),
	array( 'db' => 'comp21',   'dt' => 28 ),
	array( 'db' => 'comp22',   'dt' => 29 ),
	array( 'db' => 'comp23',   'dt' => 30 ),
	array( 'db' => 'comp24',   'dt' => 31 ),
	array( 'db' => 'comp25',   'dt' => 32 )

);


// SQL server connection information
$sql_details = array(
	'user' => 'opensustmod2',
	'pass' => 'dsidd2015',
	'db'   => 'opensustmod2',
	'host' => 'opensustmod2.mysql.db'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

$whereResult=null;
//$whereResult = " `code` not like '".$Depcom."'";

echo json_encode(
	//SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
	SSP::	complex ( $_GET, $sql_details, $table, $primaryKey, $columns, $whereResult, $whereAll=null )
);


