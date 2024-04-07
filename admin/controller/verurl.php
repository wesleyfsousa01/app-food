<?php
    Class VerUrl {
        function trocarUrl($url) {
            if(empty($url)) {
                $url = "secoes/cadastrarrestaurante.php";
            }
            else {
                $url = "secoes/$url.php";
            }
            include_once($url);
        }
    }
?>