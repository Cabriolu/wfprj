<?php
/*
* HS�Ulm, WF5, SS2015, Prof. Klippel, Wirtschaftsinformatik�Projekt
* Projekt: Lehrveranstaltungssoftware
* Name: Kilian Kraus
* Gruppe: 01
* Version: 1
* Datum: 08.04.2015
*
* User�Story (Nr. 20 ): Als Dozent m�chte ich mich zur Verwaltung meiner Daten online einloggen k�nnen. (42 Points)
* Zeit: 0.5
*/
?>
<!--TODO HTML5 umsetzen-->

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/style.css" />
</head>

<body>
	<div ></div>
    <div class="wrapper">
        <ul  class="navigation">
            <li  >
                <a href="<?php echo Config::get('URL'); ?>index/index">Start</a>
            </li>
				<?php if (!Session::userIsLoggedIn()) : ?>
				<li>
                <a href="<?php echo Config::get('URL'); ?>login/index">Einloggen</a>
				</li>  
				<?php endif; ?>
				<?php if(Session::userIsLoggedIn()) : ?> 
				<li>
                <a href="<?php echo Config::get('URL'); ?>login/logout">Ausloggen</a>
				</li>
				<?php   endif  ?>
 
        </ul>
