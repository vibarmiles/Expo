<?php 
    class DB {
        public $conn;
        private $stmt;
        private $sql;
        private $host = "localhost";
        private $user = "root";
        private $pass = "";
        private $dbname = "expo_project";
        
        protected function __construct() {
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
            return $this->conn;
        }

        protected function select($columns, $table, $function = NULL, $cond = "1", $type = NULL, $param = NULL) {
            $this->sql = "SELECT $columns FROM $table WHERE $cond";
            $this->stmt = $this->conn->prepare($this->sql);

            if($type != NULL && $param != NULL) {
                if(is_array($param)) {
                    $this->stmt->bind_param($type, ...$param);
                } else {
                    $this->stmt->bind_param($type, $param);
                }
            }

            $this->stmt->execute();
            $this->result = $this->stmt->get_result();

            if($function != NULL) {
                $function->__invoke();
            } else {
                return $this->result->fetch_assoc();
            }
        }

        protected function insert($column, $table, $function = NULL, $value, $type = NULL, $param = NULL) {
            $this->sql = "INSERT INTO $table ($column) VALUES ($value)";
            $this->stmt = $this->conn->prepare($this->sql);
            
            if($type != NULL && $param != NULL) {
                if(is_array($param)) {
                    $this->stmt->bind_param($type, ...$param);
                } else {
                    $this->stmt->bind_param($type, $param);
                }
            }

            $this->stmt->execute();

            if($function != NULL) {
                $function->__invoke();
            }
        }

        protected function update($columnAndValue, $table, $function = NULL, $cond = "id=1", $type = NULL, $param = NULL) {
            $this->sql = "UPDATE $table SET $columnAndValue WHERE $cond";
            $this->stmt = $this->conn->prepare($this->sql);
            
                if($type != NULL && $param != NULL) {
                    if(is_array($param)) {
                        $this->stmt->bind_param($type, ...$param);
                    } else {
                        $this->stmt->bind_param($type, $param);
                    }
                }

            $this->stmt->execute();

            if($function != NULL) {
                $function->__invoke();
            }
        }

        protected function delete($table, $function = NULL, $cond = "1", $type = NULL, $param = NULL) {
            $this->sql = "DELETE FROM $table WHERE $cond";
            $this->stmt = $this->conn->prepare($this->sql);

            if($type != NULL && $param != NULL) {
                if(is_array($param)) {
                    $this->stmt->bind_param($type, ...$param);
                } else {
                    $this->stmt->bind_param($type, $param);
                }
            }

            $this->stmt->execute();

            if($function != NULL) {
                $function->__invoke();
            }
        }

        protected function sum($column, $table, $function = NULL, $cond = "1", $type = NULL, $param = NULL) {
            $this->sql = "SELECT SUM($column) AS sum FROM $table WHERE $cond";
            $this->stmt = $this->conn->prepare($this->sql);

            if($type != NULL && $param != NULL) {
                if(is_array($param)) {
                    $this->stmt->bind_param($type, ...$param);
                } else {
                    $this->stmt->bind_param($type, $param);
                }
            }

            $this->stmt->execute();
            $this->result = $this->stmt->get_result();
            
            if($function != NULL) {
                $function->__invoke();
            } else {
                return $this->result->fetch_assoc();
            }
        }

        protected function join() {
            
        }

        protected function __destruct() {
            $this->conn->close();
        }
    }
?>