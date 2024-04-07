<?php 
    abstract class Conexao {
        protected $host;
        protected $user;
        protected $pass;
        protected $dba;
        protected $conn;
        protected $sql;
        protected $qr;
        protected $data;
        protected $status;
        protected $totalFields;
        protected $error;

        public function __construct() {
            $this -> host = "localhost";
            $this -> user = "root";
            $this -> pass = "";
            $this -> dba = "db_ifood";
            self::connect();
        }

        public function connect() {
            $this -> conn = @mysqli_connect($this -> host, $this -> user, $this -> pass)
            or die("<ins><center>Erro ao acessar o banco de dados:</center></ins></br>" 
            . mysqli_error($this->conn));

            $this -> dba = @mysqli_select_db($this -> conn, $this -> dba)
            or die("<ins><center>Erro na conexao banco de dados:</center></ins></br>" 
            . mysqli_connect_error());
            mysqli_set_charset($this -> conn, 'utf8');

            return $this -> conn; 
        }

        //  Função refatorada para log de erro mais completo.
        protected function execSQL($sql) {
            $this->qr = @mysqli_query($this->conn, $sql);
            if (!$this->qr) {
                $error_message = "Erro ao executar query: " . mysqli_error($this->conn);
                $error_message .= "\nQuery: " . $sql; // Adiciona a consulta SQL ao log de erro
                // Exibe o erro diretamente no navegador
                echo "<ins><center>$error_message</center></ins>";
                die("<ins><center>Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente mais tarde.</center></ins>");
            }
            return $this->qr;
        }

        protected function listQr($qr) {
            $this->data = @mysqli_fetch_assoc($qr);
            return $this->data;
        }

        protected function countData($qr) {
            $this -> totalFields = @mysqli_num_rows($qr);
            return $this -> totalFields;
        }

    }
?>