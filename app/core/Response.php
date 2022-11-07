<?php
    class Response {
        public function redirect($uri) {
            $url = ROOT.'/index.php/'.$uri;
            header("Location: $url");
            exit;
        }
    }
?>