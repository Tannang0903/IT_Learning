<?php
    class Route {
        function __construct()
        {
        }

        function handleRoute($url) {
            global $routes;
            $url = trim($url, '/');
            if (!empty($routes)) {
                foreach ($routes as $key => $value) {
                    if ($key == $url) return $value;
                }
            }
            return $url;
        }
    }
?>