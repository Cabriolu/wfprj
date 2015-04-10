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
* Zeit: 1
*/
?>


<?php
/**
 * @author Kilian Kraus
 * Unsere Session Klasse. Damit kann eine Session erstellt bzw geschlossen werden, Session-Variablen gesetzt und ausgelesen werden. 
 */
class Session
{
    /**
     * Initialisiert eine Session.
     */
    public static function init()
    {
        if (session_id() == '') {
            session_start();
        }
    }

    /**
     * @author Kilian Kraus
     *
     * @param mixed $key Schl�ssel
     * @param mixed $value Wert
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @author Kilian Kraus
     *
     * @param mixed $key Schl�ssel
     */
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }else{
			return "noValue";
		}
    }

	 /**
     * @author Kilian Kraus
     * F�gt einem Schl�ssel einen Wert hinzu
	 *
     * @param mixed $key Schl�ssel
	 * @param mixed $value Wert
     */
    public static function add($key, $value)
    {
        $_SESSION[$key][] = $value;
    }

    /**
	 * @author Kilian Kraus
     * Schlie�t die Session
     */
    public static function destroy()
    {
        session_destroy();
    }

    /**
     * @author Kilian Kraus
	 * �berpr�ft ob der User eingeloggt ist
     *
     * @return bool true=eingeloggt false=nicht eingeloggt
     */
    public static function userIsLoggedIn()
    {
        if(Session::get('user_logged_in')&&Session::get('user_role')==1){
        return true;
		}else{
		return false;
		}
    }
	
}
