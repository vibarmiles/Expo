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
                        <td class='col-sm-6'>$row[lastName], $row[firstName]</td>
                        <td class='col-sm-4'>$row[id]</td>
                        <td class='col-sm-2 text-center'><a class='btn btn-warning' style='margin-right:10px' href='admin?editCon=$row[id]&fname=$row[firstName]&lname=$row[lastName]'>Edit</a><a class='btn btn-danger' href='admin?delCon=$row[id]'>Delete</a></td>
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