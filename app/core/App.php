<?php

class App
{

    protected $Controller = 'history';
    protected $action = 'index';
    protected $params = [];

    public function __construct()
    {
        $this->prepareURL();

        # check if the controller file exist 
        if (file_exists(CONTROLLER . $this->Controller . ".php")) {
            $this->Controller = new $this->Controller;
            //$this->controller->index();
            if (method_exists($this->Controller, $this->action)) {
                call_user_func_array([$this->Controller, $this->action], $this->params);
            }
        } else {
            echo "File does not exist";
        }

    }

    # prepare request

    function prepareURL()
    {
        $request = trim($_SERVER['REQUEST_URI'], '/');

        if (!empty($request)) {

            $url = explode("/", $request);
            $this->Controller = isset($url[0]) ? $url[0] : "history";
            $this->action = isset($url[1]) ? $url[1] : "index";
            unset($url[0], $url[1]);
            $this->params = !empty($url) ? array_values($url) : [];

        }

    } // end of function

} // end of class