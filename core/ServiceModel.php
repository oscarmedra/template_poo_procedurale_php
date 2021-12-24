<?php
    class ServiceModel
    {
        // tout les methode de cette classe les reproduire si necessaire ...
        public $table;

        function __cosntruct($table)
        {
            $this->table = $table;
        }

        public function get()
        {
            global $bd;
            $sql = "select * from $this->table;";
            return $bd->query($sql)->fetchAll(2);
        }

        public function add($infos)
        {
            global $bd;

            $sql = "insert into $this->table (";
            foreach($infos as $key=>$value):
                    $sql .= "$key, ";
            endforeach;
            $sql = substr($sql, 0, -2);
            $sql.= ") values (";
            foreach($infos as $key=>$value):
                $sql .= "'$value', ";
            endforeach;
            $sql = substr($sql, 0, -2);
            $sql .= ");";

            return $bd->exec($sql);
        }

         function edit($infos)
        {
            global $bd;
            $sql = "update $this->table set";
            foreach($infos as $key=>$value):
                if($key !='id')
                    $sql .= " $key = '$value', ";
            endforeach;
            $sql = substr($sql, 0, -2);
            $sql .= " where id=". $infos['id']. ";";

            return $bd->exec($sql);
        }

        public function delete($id)
        {
            global $bd;
            $sql = "delete from $this->table where id=$id";
            return $bd->exec($sql);
        }

        public function executer($sql)
        {
            global $bd;
            return $bd->query($sql)->fetchAll(2);
        }

        function getById($id)
        {
            global $bd;
            return $bd->query("select * from $this->table where id=$id limit 1").fetch();
        }


        public function recherche($donnees = array()) {
            global $bd;

            $champs = '*';
            $conditions = '1=1';
            $order = 'id DESC';
            $limit = '1';

            if (!empty($donnees['champs'])) {
                $champs = $donnees['champs'];
            }
            if (!empty($donnees['conditions'])) {
                $conditions = $donnees['conditions'];
            }
            if (!empty($donnees['order'])) {
                $order = $donnees['order'];
            }
            if (!empty($donnees['limit'])) {
                $limit = $donnees['limit'];
            }

            $req = "SELECT $champs FROM " . $this->table . " WHERE $conditions ORDER BY $order LIMIT $limit";

            $execution = $bd->query($req);

            $resultat = array();

            while ($res = $execution->fetch()) {
                $resultat[] = $res;
            }

            return $resultat;
        }


        public function executerReq($sql) {
            global $bd;

            $execution = $bd->query($sql);
            error_log($sql);
            $resultat = array();
            if ($execution) {
                while ($res = $execution->fetch(PDO::FETCH_ASSOC)) {
                    $resultat[] = $res;
                }
            } else {
                error_log($sql);
                error_log($bd->errorInfo()[2]);
            }

            return $resultat;
        }

    }


    // this ServiceModel is the main CRUD Service for any table from our databases ... .

?>
