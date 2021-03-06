<?php
/**
* SPRINT 01
*
* @author: Kilian Kraus
* @Matrikel:
* Datum: 08.04.2015
*
* User­Story (Nr. 20 ): Als Dozent möchte ich mich zur Verwaltung meiner Daten online einloggen können. (42 Points)
* Zeit: 1
*/
?>

<?php

/**
 * @author Kilian Kraus
 * Dieses Ding startet die ganze Anwendung.
 */
 
 // Die ganzen require ließen sich mit dem Composer schöner handeln.
 require '../application/core/request.php';
 require '../application/core/config.php';
 require '../application/core/controller.php';
 require '../application/core/session.php';
 require '../application/core/view.php';
 require '../application/model/loginmodel.php';
 require '../application/core/redirect.php';
 require '../application/model/usermodel.php';
 require '../application/core/databasefactory.php';
 require '../application/core/auth.php';


 
class Application
{
    /** @var mixed Instanzen des Controllers*/
    private $controller;

    /** @var array URL Parameter der Controller Funktionen/Methoden */
    private $parameters = array();

    /** @var string Controller Name, falls man in der View eine Abfrage machen möchte wo man ist. */
    private $controller_name;

    /** @var string Controller Methode, falls man in der View eine Abfrage machen möchte wo man ist. */
    private $action_name;

    /**
	 * @author Kilian Kraus
	 * Startet die Anwendung. 
     */
    public function __construct()
    {
        $this->split();

	    $this->createController();

        // überprüft ob controller besteht.
        if (file_exists(Config::get('PATH_CONTROLLER') . $this->controller_name . '.php')) {

            // lädt den pfad des Controller aus der Config und erstellt den Controller
            require Config::get('PATH_CONTROLLER') . $this->controller_name . '.php';
            $this->controller = new $this->controller_name();

            // überprüft, ob die Methode im entsprechenden Controller vorhanden ist.
            if (method_exists($this->controller, $this->action_name)) {
                if (!empty($this->parameters)) {
                    call_user_func_array(array($this->controller, $this->action_name), $this->parameters);
                } else {                   
                    $this->controller->{$this->action_name}();
                }
            } else {
            }
        } else {
        }
    }

    /**
     * @author Kilian Kraus
	 * Macht Bananasplit aus URL
     */
    private function split()
    {
        if (Request::get('url')) {

            $url = trim(Request::get('url'), '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            $this->controller_name = isset($url[0]) ? $url[0] : null;
            $this->action_name = isset($url[1]) ? $url[1] : null;

            unset($url[0], $url[1]);

            $this->parameters = array_values($url);
        }
    }

	/**
	 * @author Kilian Kraus
	 * setzt den Controller auf den richtigen Namen. Default wenn nichts gefunden (index/index).
	 */
	private function createController()
	{
		// Default falls kein Controller
		if (!$this->controller_name) {
			$this->controller_name = Config::get('DEFAULT_CONTROLLER');
		}

		// Default falls keine Funktion/Ereignis gefunden
		if (!$this->action_name OR (strlen($this->action_name) == 0)) {
			$this->action_name = Config::get('DEFAULT_ACTION');
		}

		// Hängt and den Controllername "Controller" ran, da diese Files so heißen ("xxxController.php")
		$this->controller_name = ucwords($this->controller_name) . 'Controller';
	}
}
