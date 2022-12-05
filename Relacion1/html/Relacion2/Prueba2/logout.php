<?php

	/**
	 * Antonio J.Sánchez
	 * Logout
	 */

	session_start() ;

	$_SESSION = [] ;

	session_destroy() ;

	header("location: http://localhost/dwes") ;