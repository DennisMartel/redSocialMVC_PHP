<?php
    //ini_set('error_reporting', 0);
    session_start();
    class Base {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $db = DB_NAME;

        private $dbh;
        private $stmt;
        private $error;

        public function __construct()
        {
            $dns = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
            $opciones = [PDO::ATTR_ERRMODE => true,
                        PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
                        ];
            try {
                $this->dbh = new PDO($dns, $this->user, $this->pass, $opciones);
                $this->dbh->exec('set names utf8');
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                print('error de conexion' . $this->error);
            }
        }

        public function query($sql) {
            $this->stmt = $this->dbh->prepare($sql);
        }

        public function bind($parametros, $valor, $tipo = null) {
            if (is_null($tipo)) {
                switch (true) {
                    case is_int($valor):
                        $tipo = PDO::PARAM_INT;
                        break;
                    case is_bool($valor):
                        $tipo = PDO::PARAM_BOOL;
                        break;
                    case is_null($valor):
                        $tipo = PDO::PARAM_NULL;
                        break;
                    default:
                       $tipo = PDO::PARAM_STR;
                        break;
                }
            }
            return $this->stmt->bindValue($parametros, $valor, $tipo);
        }

        public function execute() {
            return $this->stmt->execute();
        }

        public function register() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        public function registers() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function rowCount() {
            return $this->stmt->rowCount();
        }
    }