<?php
    require_once 'app/models/Database.php';

    class CriteriaModel extends DB {
        function __construct() {
            parent::__construct();
        }

        function data() {
            parent::select("*", "contest", function() {
                while($row = $this->result->fetch_assoc()) {
                    echo "<tr class='row'>
                        <td class='col-lg-8'>$row[criteria]"; 
                        
                        if(!empty($row['description'])) {
                            echo " ($row[description])";
                        }

                    echo "</td>
                        <td class='col-lg-2'>$row[percentage]</td>
                        <td class='col-lg-2 text-center'><div class='row justify-content-around pl-2 pr-2'><a class='btn btn-warning col-5' href='admin?editCri=$row[id]&cri=$row[criteria]&desc=$row[description]&perc=$row[percentage]'>Edit</a><a class='btn btn-danger col-5' href='admin?delCri=$row[id]'>Delete</a></td>
                    </tr>";
                }
            });
        }
        
        function add($cri, $desc, $perc) {
            return parent::insert("criteria, description, percentage", "contest", NULL, "?, ?, ?", "ssi", array($cri, $desc, $perc));
        }

        function edit($cri, $desc, $perc, $id) {
            return parent::update("criteria=?, description=?, percentage=?", "contest", NULL, "id=?", "ssii", array($cri, $desc, $perc, $id));
        }

        function remove($id) {
            return parent::delete("contest", NULL, "id=?", "i", $id);
        }

        function checkTotal() {
            $row = parent::sum("percentage", "contest");
            return $row['sum'];
        }

        function __destruct() {
            parent::__destruct();
        }
    }
?>