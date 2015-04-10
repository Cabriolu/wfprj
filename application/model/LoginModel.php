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
* Zeit: 1.5
*/
?>
<?php
/**
 * @author Kilian Kraus
 * Das LoginModel stellt Funktionen f�r den Loginvorgang bereit.
 */

class LoginModel
{
    /**
     * @author Kilian Kraus
	 * Model f�r den Login
	 *
     * @param $user_name string Nutzername
     * @param $user_password string Passwort
     *
     * @return bool Status des Login
     */
    public static function login($user_name, $user_password)
    {
        // falls Nutzername oder Passwort leer sind
        if (empty($user_name) OR empty($user_password)) {
            return false;
        }

	    // falls Benutzer nicht in der DB besteht
	    $result = self::validateAndGetUser($user_name, $user_password);

	    if (!$result) {
		    return false;
	    }

        // setzt Timestamp des letzten Login 
        self::saveTimestamp($result->user_name);

        // falls Nutzer erfolgreich eingeloggt ist, dann werden notwendige Parameter in die Session Variablen geschrieben
		// Loggt Nutzer final ein
        self::doLogin(
            $result->user_id, $result->user_name, $result->user_role
        );

		// gibt letztendlich true zur�ck f�r erfolgreichen login
        return true;
    }

	/**
	 * @author Kilian Kraus
	 * �berp�ft ob der Login erfolgreich war.
	 *
	 * @param $user_name
	 * @param $user_password
	 *
	 * @return bool mixed
	 */
	private static function validateAndGetUser($user_name, $user_password)
	{
		// holt sich die Daten des Nutzers
		$result = UserModel::getUserData($user_name);

		// �berpr�ft ob der Nutzer besteht.
		if (!$result) {
			return false;
		}

		// falls der in der Datenbank gespeicherte Hash nicht mit dem Hash des Passworts �bereinstimmt.
		if (!password_verify($user_password, $result->user_password_hash)) {
			return false;
		}

		return $result;
	}

    

    /**
     * @author Kilian Kraus
	 * L�scht Session
     */
    public static function logout()
    {
        Session::destroy();
    }

    /**
     * @author Kilian Kraus
	 * Diese Funktion macht den richtigen Login. Initialisiert die Session und schreibt Werte in die Session.
     *
     * @param $user_id
     * @param $user_name 
     * @param $user_role
     */
    public static function doLogin($user_id, $user_name, $user_role)
    {
        Session::init();
        Session::set('user_id', $user_id);
        Session::set('user_name', $user_name);
		Session::set('user_role', $user_role);
        Session::set('user_logged_in', true);
    }

    /**
     * @author Kilian Kraus
	 * Schreibt einen Timestamp des Login in die Datenbank.
     *
     * @param $user_name 
     */
    public static function saveTimestamp($user_name)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE user SET user_last_login_timestamp = :user_last_login_timestamp
                WHERE user_name = :user_name LIMIT 1";
        $sth = $database->prepare($sql);
        $sth->execute(array(':user_name' => $user_name, ':user_last_login_timestamp' => time()));
    }


    /**
     * @author Kilian Kraus
	 * gibt true zur�ck, falls Nutzer eingeloggt ist
     *
     * @return bool Status des Login
     */
    public static function isUserLoggedIn()
    {
        return Session::userIsLoggedIn();
    }
	
}
