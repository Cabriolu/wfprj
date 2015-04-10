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
 * Das ist der Basis Controller. 
 */
class Controller
{
    /** @var View Variable f�r ein Objekt der View */
    public $View;

    /**
	 * Erstellt den Basis Controller (Konstruktor)
     */
    function __construct()
    {
        // Session erstellen
        Session::init();

        // Erstellt ein View Objekt
        $this->View = new View();
    }
}
