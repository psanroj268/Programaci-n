<?php

	/**
	 * Muestra en pantalla un objeto u array de manera
	 * preformateada.
	 * @param  $url
	 * @return
	 */
	function ponerBonito(array $url) {
		echo "<pre>", print_r($url, true),"</pre>" ;
		die() ;
	}

    function comprobarCSRF(string $_csrf, string $url) {

	    if ($_SESSION["_csrf"] != $_csrf)
            exit(header("location: {$url}")) ;
    }