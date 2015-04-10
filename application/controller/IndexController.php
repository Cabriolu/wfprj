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
class IndexController extends Controller
{
    /**
     * @author Kilian Kraus
	 * Erstellt ein Objekt der "Controller"-Klasse.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @author Kilian Kraus
	 * Diese Funktion steuert was passiert, wennn jemand zu index/index aufruft
     */
    public function index()
    {
        $this->View->render('index/index');
    }
}
