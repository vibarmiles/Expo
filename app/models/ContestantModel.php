<?php
    require_once 'Database.php';

    class ContestantModel extends DB {
        function __construct() {
            parent::__construct();
        }

        function data() {
            parent::select("*", "contestants", function() {
                while($row = $this->result->fetch_assoc()) {
                    echo "<tr class='row'>
                        <td class='col-lg-8'>$row[lastName], $row[firstName]</td>
                        <td class='col-lg-2'>$row[id]</td>
                        <td class='col-lg-2 text-center'><div class='row justify-content-around pl-2 pr-2'><a class='btn btn-warning col-5' href='admin?editCon=$row[id]&fname=$row[firstName]&lname=$row[lastName]'>Edit</a><a class='btn btn-danger col-5' href='admin?delCon=$row[id]'>Delete</a></div></td>
                    </tr>";
                }
            });
        }

        function add($fname, $lname, $snum) {
            return parent::insert("firstName, lastName, id", "contestants", NULL, "?, ?, ?", "ssi", array($fname, $lname, $snum));
        }

        function edit($fname, $lname, $snum, $id) {
            return parent::update("firstName=?, lastName=?, id=?", "contestants", NULL, "id=?", "ssii", array($fname, $lname, $snum, $id));
        }

        function remove($id) {
            return parent::delete("contestants", NULL, "id=?", "i", $id);
        }

        function delScores($id) {
            return parent::delete("scores", NULL, "id=?", "i", $id);
        }

        function __destruct() {
            parent::__destruct();
        }
    }
?>