<?php

/**
 * database class
 */
class Database
{
    private function db_connect()
    {
        $DBHOST = "localhost";
        $DBNAME = "pos_db";
        $DBUSER = "root";
        $DBPASS = "";
        $DBDRIVER = "mysql";

        try {
            $con = new PDO("$DBDRIVER:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
            return $con;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function query($query, $data = array())
    {
        $con = $this->db_connect();
        if ($con !== null) {
            $smt = $con->prepare($query);
            $check = $smt->execute($data);

            if ($check) {
                $result = $smt->fetchAll(PDO::FETCH_ASSOC);
                if (is_array($result) && count($result) > 0) {
                    return $result;
                }
            }
        }

        return false;
    }
}

// Crear una instancia de la clase Database
$database = new Database();

