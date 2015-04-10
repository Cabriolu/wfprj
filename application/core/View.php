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
* Zeit: 0.1
*/
?>

<?php

/**
 * @author Kilian Kraus
 * Diese Klasse ist f�r den Output da.
 * view->render('Ordnername/Dateiname')
 */
class View
{
    public function render($filename, $data = null)
    {
		// l�dt den header
        require Config::get('PATH_VIEW') . '_templates/header.php';
		// l�dt den content
        require Config::get('PATH_VIEW') . $filename . '.php';
		// l�dt den footer
        require Config::get('PATH_VIEW') . '_templates/footer.php';
    }
 
}
