<?php 
    class Restaurante {
        private $id;
        private $nome;
        private $descricao;
        private $categoria;
        private $url;

        public function getId() {
            return $this->id;
        }
        public function setId($id) {
            $this->id = $id;
        }
        
        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function getCategoria() {
            return $this->categoria;
        }

        public function setCategoria($categoria) {
            $this->categoria = $categoria;
        }

        public function getUrl() {
            return $this->url;
        }

        public function setUrl($url) {
            $this->url = $url;
        }
        
    
    }

?>