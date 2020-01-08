<?php 
    require_once 'app/models/Database.php';

    class Dashboard extends DB {
        function __construct() {
            parent::__construct();
        }

        function data() {
            parent::select("*", "contestants", function() {
                while($row = $this->result->fetch_assoc()) {
                    $query = $this->conn->query("SELECT * FROM scores WHERE id = $row[id]");
                    $row2 = $query->fetch_assoc();

                    echo "<tr class='row'><td class='col-sm-2'>$row[id]</td><td class='col-sm'>$row[lastName], $row[firstName]</td><td class='col-sm-1'>$row2[scores]</td></tr>";
                }
            });
        }

        function event() {
            return parent::select("*", "info");
        }

        function __destruct() {
            parent::__destruct();
        }
    }
?>