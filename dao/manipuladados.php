<?php
    include_once('conexao.php');

    class ManipularDados extends Conexao{
        private $table;
        private $fields;
        private $dados;
        private $fieldPk;
        private $valuePk;

        public function getTable() {
            return $this -> table;
        }

        public function setTable($table){
            $this -> table = $table;
        }

        public function getFields() {
            return $this->fields;
        }
        
        public function setFields($fields) {
            $this->fields = $fields;
        }

        public function getDados() {
            return $this -> dados;
        }

        public function setDados($dados) {
            $this->dados = $dados;
        }

        public function getFieldPk () {
            return $this->fieldPk;
        }

        public function setFieldPk($fieldPk) {
            $this->fieldPk = $fieldPk;
        }

        public function getValuePk () {
            return $this->valuePk;
        }

        public function setValuePk ($valuePk) {
            $this->valuePk = $valuePk;
        }

        public function getStatus(){
            return $this->status;
        }

        //Metodos De Consulta

        public function validarLogin($login, $password) {
            $this -> sql = "SELECT * FROM $this->table where nome = '$login' and senha='$password'";
            $this -> qr = self::execSQL($this->sql);
            $linhas = self::countData($this->qr);
            return $linhas;
        }

        public function getAllDataTable() {
            $this -> sql = "SELECT * FROM $this->table";
            $this -> qr = self::execSQL($this->sql);

            $dados = array();
            while($row = self::listQr($this->qr)) {
                array_push($dados, $row);
            }
            return $dados;
        }

        //Personalizados:
        public function findById($id) {
            //Constroi a consulta SQL
            $sql =  "SELECT * FROM $this->table WHERE id = ?";
            $stm = $this-> connect()->prepare($sql);
            $stm->bind_param("i", $id);


            // Verifica se a consulta foi bem-sucedida
            if ($stm->execute()) {
                $result = $stm->get_result();
                if($result->num_rows >0) {
                    return $result->fetch_assoc();
                }
            } else {
                // Se houver um erro na consulta, registra o erro e define a mensagem de status como uma mensagem de erro genérica
                $error_message = "Erro ao executar query: " . mysqli_error($this->connect());
                $error_message .= "\nQuery: " . $sql;
                error_log($error_message);
                $this->status = "Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente mais tarde.";
                return false;
            }
        }

        public function insert() {
            // Verifica se a tabela e os dados estão definidos
            if (empty($this->table) || empty($this->dados)) {
                $this->status = "Erro: Tabela ou dados não estão definidos:";
                return false;
            }
        
        
            // Constrói a consulta SQL com a tabela e os valores fornecidos
            $sql = "INSERT INTO $this->table ($this->fields) VALUES ($this->dados)";
        
            // Executa a consulta SQL
            $result = self::execSQL($sql);
        
            // Verifica se a consulta foi bem-sucedida
            if ($result) {
                $this->status = "Cadastrado com sucesso!";
                return true;
            } else {
                // Se houver um erro na consulta, registra o erro e define a mensagem de status como uma mensagem de erro genérica
                $error_message = "Erro ao executar query: " . mysqli_error($this->connect());
                $error_message .= "\nQuery: " . $sql;
                error_log($error_message);
                $this->status = "Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente mais tarde.";
                return false;
            }
        }

        public function update() {
        
        
            // Constrói a consulta SQL com a tabela e os valores fornecidos
            $this->sql = "UPDATE $this->table SET $this->fields  WHERE $this->fieldPk = '$this->valuePk'";
        
            // Executa a consulta SQL
            $result = self::execSQL($this->sql);
        
            // Verifica se a consulta foi bem-sucedida
            if ($result) {
                $this->status = "Alterado com sucesso!";
                return true;
            } else {
                // Se houver um erro na consulta, registra o erro e define a mensagem de status como uma mensagem de erro genérica
                $error_message = "Erro ao executar query: " . mysqli_error($this->connect());
                $error_message .= "\nQuery: " . $this->sql;
                error_log($error_message);
                $this->status = "Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente mais tarde.";
                return false;
            }
        }

    }


?>