<?php

class Router
{
    /**
     * L'ensemble des routes de l'application (La table des routes | Routing Table)
     *
     * @var array
     */
    protected $routes = [];

    /**
     * L'ensemble des paramètres de la route actuelle
     * 
     * @var array
     */
    protected $params = [];

    /**
     * Permet d'ajouter une route à la table des routes
     *
     * @param string $url L'url à ajouter
     * @param array $params L'ensemble des paramètres de la route
     * 
     * @return void
     */
    public function add($url, $params = [])
    {
        // remplacer les / par des \/
        $route = preg_replace("~\/~", "\/", $url);
        // remplacer les string par des regex
        $route = preg_replace("/\{([a-z-]+)\}/", "(?'\\1'[a-z-]+)", $route);
        $route = preg_replace("/\{([a-z-]+):([^\}]+)\}/", "(?'\\1'\\2)", $route);
        // ajouter des délimiteurs
        $route = "/^" . $route . "\$/i";

        $this->routes[$route] = $params;
    }

    /**
     * Permet de matcher une route
     *
     * @param string $url URL à rechercher dans la table des routes 
     * @return boolean
     */
    public function match($url)
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                echo("<pre>");
                    print_r($this->params = $params);
                echo("</pre>");
                return true;
            }
        }
        return false;
    }


    /**
     * Renvoi toutes les routes
     *
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }
    /**
     * Renvoi tous les paramètres
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Exécute la méthode du controller correspondant à la route
     * @param $url l'URL de la route à dispatcher
     * @return void
     */
    function dispatch($url) {
        //var_dump($url);
        # retirer la chaîne de requête
        $url = $this->removeQueryStringVariables($url);
        
        if ($this->match($url)) {
            $controller = $this->params["controller"];
            $controller = $this->convertToPascalCase($controller);
            //var_dump($controller);
            if (class_exists($controller)) {
                $controller_object = new $controller();

                $action = $this->convertToCamelCase($this->params["action"]);
                if (method_exists($controller_object, $action)) {
                    $controller_object->$action();
                } else {
                    echo "Méthode \"$action\" inexistante dans le controlleur \"$controller\"";
                }
            } else {
                echo "Class \"$controller\" inexistante";
            }

        } else {
            echo "Route inexistante pour la route \"$url\"";
            // header("Location:/$url");
        }
    }

    /**
     * Transforme une chaine de caractère en PascalCase|StudlyCase
     * @var string $str La variable à transformer
     * @return string
     */
    function convertToPascalCase($str) {
        return preg_replace("/-/","", ucwords($str, "-"));
    }

    /**
     * Transforme une chaine de caractère en camelCase
     * @var string $str La variable à transformer
     * @return string
     */
    function convertToCamelCase($str) {
        return lcfirst($this->convertToPascalCase($str));
    }

   
       /**
     * Fonction qui retire la chaine de requête d'une url pour retourn la route uniquement
     * @param string $url - URL à parser
     * @return string
     */
    protected function removeQueryStringVariables($url) {
        if ($url !== '') { # si l'url n'est pas vide
            # séparer l'url en tableau de longeur 2 (nous obtenons ainsi la route 
            # à gauche, puis la chaine de requête à droite)
            $parts = explode('&', $url, 2); 

            if(strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }

        return $url;
    }

}
