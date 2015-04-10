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

<?php

/**
 * @author Kilian Kraus
 * �berpr�ft ob ein Nutzer eingeloggt ist, ansonsten wird er zur Login-Seite verlinkt.
 * Sollte am Anfang eines Controllers verwendet werden, wenn dieser nur f�r eingeloggte Nutzer sichtbar sein sollte.
 */
class Auth
{
    public static function checkAuthentication()
    {
        // Initialisiert eine Session, falls noch keine Vorhanden ist.
        Session::init();

        // Falls Nutzer nicht eingeloggt ist.
        if (!Session::userIsLoggedIn()) {
            Session::destroy();
            header('location: ' . Config::get('URL') . 'login');
            exit();
        }
    }
	
}
