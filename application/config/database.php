<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['dsn']      The full DSN string describe a connection to the database.
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database driver. e.g.: mysqli.
|			Currently supported:
|				 cubrid, ibase, mssql, mysql, mysqli, oci8,
|				 odbc, pdo, postgre, sqlite, sqlite3, sqlsrv
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Query Builder class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['encrypt']  Whether or not to use an encrypted connection.
|
|			'mysql' (deprecated), 'sqlsrv' and 'pdo/sqlsrv' drivers accept TRUE/FALSE
|			'mysqli' and 'pdo/mysql' drivers accept an array with the following options:
|
|				'ssl_key'    - Path to the private key file
|				'ssl_cert'   - Path to the public key certificate file
|				'ssl_ca'     - Path to the certificate authority file
|				'ssl_capath' - Path to a directory containing trusted CA certificates in PEM format
|				'ssl_cipher' - List of *allowed* ciphers to be used for the encryption, separated by colons (':')
|				'ssl_verify' - TRUE/FALSE; Whether verify the server certificate or not
|
|	['compress'] Whether or not to use client compression (MySQL only)
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|	['ssl_options']	Used to set various SSL options that can be used when making SSL connections.
|	['failover'] array - A array with 0 or more data for connections if the main should fail.
|	['save_queries'] TRUE/FALSE - Whether to "save" all executed queries.
| 				NOTE: Disabling this will also effectively disable both
| 				$this->db->last_query() and profiling of DB queries.
| 				When you run a query, with this setting set to TRUE (default),
| 				CodeIgniter will store the SQL statement for debugging purposes.
| 				However, this may cause high memory usage, especially if you run
| 				a lot of SQL queries ... disable this to avoid that problem.
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $query_builder variables lets you determine whether or not to load
| the query builder class.
*/
$custom_var = @file_get_contents('./project_version.txt');
{
	switch ($custom_var) 
	{
		case '1.15.42.30':
			{
				$active_group = '1.15.42.30';
				break;
			}
			
		case '3.24.1801.1':
			{
				$active_group = '3.24.1801.1';
				break;
			}
		
		default:
			break;
	}
}
$query_builder = TRUE;

$db['1.15.42.30'] = array(

	// This Is 1.15.42.30 Database Configuration.
	/**
	 * Note:
	 * 
	 * @param host Must Be Ip Address. example => 127.0.0.1
	 * @param port Must Be Int. example => 5432.
	 * @param user Example => postgres.
	 * @param password Example => 123456.
	 * @param dbname Example => darkblowproject
	 */
	'dsn'	=> 'host=127.0.0.1 port=5432 user=postgres password=123456 dbname=darkblowproject',

	// Do Not Change This Line
	'hostname' => 'localhost',
	// Do Not Change This Line
	'username' => '',
	// Do Not Change This Line
	'password' => '',
	// Do Not Change This Line
	'database' => '',
	// Do Not Change This Line
	'dbdriver' => 'postgre',
	// Do Not Change This Line
	'dbprefix' => '',
	// Do Not Change This Line
	'pconnect' => FALSE,
	// Do Not Change This Line
	'db_debug' => FALSE,
	// Do Not Change This Line
	'cache_on' => FALSE,
	// Do Not Change This Line
	'cachedir' => '',
	// Do Not Change This Line
	'char_set' => 'utf8',
	// Do Not Change This Line
	'dbcollat' => 'utf8_general_ci',
	// Do Not Change This Line
	'swap_pre' => '',
	// Do Not Change This Line
	'encrypt' => FALSE,
	// Do Not Change This Line
	'compress' => FALSE,
	// Do Not Change This Line
	'stricton' => FALSE,
	// Do Not Change This Line
	'failover' => array(),
	// Do Not Change This Line
	'save_queries' => TRUE,
	// Do Not Change This Line
	'port' => 5432
);

$db['3.24.1801.1'] = array(

	// This Is Project Version 3.24.1801.1 Database Configuration.
	/**
	 * Note:
	 * 
	 * @param host Must Be Ip Address. example => 127.0.0.1
	 * @param port Must Be Int. example => 5432.
	 * @param user Example => postgres.
	 * @param password Example => 123456.
	 * @param dbname Example => darkblowproject
	 */
	'dsn'	=> 'host=127.0.0.1 port=5432 user=postgres password=123456 dbname=darkblowproject_evo',

	// Do Not Change This Line
	'hostname' => 'localhost',
	// Do Not Change This Line
	'username' => '',
	// Do Not Change This Line
	'password' => '',
	// Do Not Change This Line
	'database' => '',
	// Do Not Change This Line
	'dbdriver' => 'postgre',
	// Do Not Change This Line
	'dbprefix' => '',
	// Do Not Change This Line
	'pconnect' => FALSE,
	// Do Not Change This Line
	'db_debug' => FALSE,
	// Do Not Change This Line
	'cache_on' => FALSE,
	// Do Not Change This Line
	'cachedir' => '',
	// Do Not Change This Line
	'char_set' => 'utf8',
	// Do Not Change This Line
	'dbcollat' => 'utf8_general_ci',
	// Do Not Change This Line
	'swap_pre' => '',
	// Do Not Change This Line
	'encrypt' => FALSE,
	// Do Not Change This Line
	'compress' => FALSE,
	// Do Not Change This Line
	'stricton' => FALSE,
	// Do Not Change This Line
	'failover' => array(),
	// Do Not Change This Line
	'save_queries' => TRUE,
	// Do Not Change This Line
	'port' => 5432
);
