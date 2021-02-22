<?php 
        function getVille($id){
            global $con;
            
            $query="SELECT lib_ville FROM `ville` WHERE `id_ville` = '$id'";
            $stmt=$con->prepare($query);
            $stmt->execute();
            $row = $stmt->fetchColumn();
            return $row;
        }
        function getID($name){
            global $con;
            $getID = $con->prepare("SELECT ID FROM users WHERE Username='$name'");
            $getID->execute();
            $row = $getID->fetchColumn();
            return $row;
        }
        
        function getVilles(){
            global $con;
            $query = $con->prepare("SELECT * FROM ville");
            $query->execute();
            $rows = $query->fetchAll();
            return $rows;
        }
        function getInfo($nom){
            global $con;
            $query = $con->prepare("SELECT * FROM contact WHERE nom='$nom' LIMIT 1");
            $query->execute();
            $row = $query->fetch();
            return $row;
        }

     ?>