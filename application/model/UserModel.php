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
 * Model f�r den Nutzer. In diesem fall nur um Nutzerdaten anhand des Nutzernames zu bekommen.
 */
class UserModel
{
    /**
     * @author Kilian Kraus
     *
     * @param $user_name string Nutzername
     *
     * @return mixed Gibts false zur�ck, wenn Nutzer nicht besteht. Ansonsten Objekt mit den Nutzerdaten zur�ck.
     */
    public static function getUserData($user_name)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

       $sql = "SELECT user_id, user_name, user_email, user_password_hash, user_role               
                 FROM user
                 WHERE (user_name = :user_name)   
                 LIMIT 1";
        $query = $database->prepare($sql);

        $query->execute(array(':user_name' => $user_name));

        return $query->fetch();
    }


}
