<?php

define( "DB_DSN", "mysql:host=localhost;dbname=world" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "mypatrick" );
require_once "My_pagination.php";


function handleException( $exception ) {
  echo  $exception->getMessage();
}

set_exception_handler( 'handleException' );
?>