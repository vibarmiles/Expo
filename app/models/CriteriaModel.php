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
                        <td class='col-sm-6'>$row[criteria]"; 
                        
                        if(!empty($row['description'])) {
                            echo " ($row[description])";
                        }

                    echo "</td>
                        <td class='col-sm-4'>$row[percentage]</td>
                        <td class='col-sm-2 text-center'><a class='btn btn-warning' style='margin-right:10px' href='admin?editCri=$row[id]&cri=$row[criteria]&desc=$row[description]&perc=$row[percentage]'>Edit</a><a class='btn btn-danger' href='admin?delCri=$row[id]'>Delete</a></td>
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