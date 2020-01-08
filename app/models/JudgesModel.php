<?php
    require_once 'app/models/Database.php';

    class JudgesModel extends DB {
        function __construct() {
            parent::__construct();
        }

        function showData() {
            parent::select("*", "contestants", function() {

                while($row = $this->result->fetch_assoc()) {
                    $key = 0;
                    $query = $this->conn->query("SELECT percentage FROM contest");
                    $query2 = $this->conn->query("SELECT scores FROM scores WHERE judgeId=$_SESSION[judgeId] AND id=$row[id]");

                    if(!$query2->fetch_assoc()) {
                        echo "<tr class='row'>
                            <td class='col-sm-2'>$row[lastName], $row[firstName]</td>
                            <form action='judges' method='POST'>";

                        while($row2 = $query->fetch_assoc()) {
                                echo "<td class='col-sm'><input class='form-control' type='text' name='value[]'><input type='hidden' value='".implode("",$row2)."' name='percent$key'></td>";
                            $key++;
                        }

                        echo "<td class='col-sm-1'><input type='hidden' value='$row[id]' name='id'><input type='submit' value='Submit' name='submit'></td></form></tr>";
                    } 
                }
            });
        }

        function header() {
            echo "<tr class='row'><td class='col-sm-2'>Contestant</td>";

            parent::select("*", "contest", function() {
                while($row = $this->result->fetch_assoc()) {
                    echo "<td class='col-sm'>$row[criteria] ($row[description]) $row[percentage]%</td>";
                }

                echo "<td class='col-sm-1'><a href='dashboard' class='btn btn-primary'>Home</a></td>";
            });

            echo "<tr>";
        }

        function addScore($id, $value, $judgeId) {
            parent::insert("id, scores, judgeId", "scores", NULL, "?, ?, ?", "iii", array($id, $value, $judgeId));
        }

        function perc() {
            parent::select("percentage", "contest");
        }

        function __destruct() {
            parent::__destruct();
        }
    }
?>