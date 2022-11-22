<?php

class Database
{
    //is de PDO connectie
    private $connection;

    //wordt aangeroepen als je een nieuw database object aanmaakt
    public function __construct()
    {
        $dns = "mysql:host=" . config('database.host') . ";" .
            "port=" . config('database.port') . ";" .
            "dbname=" . config('database.dbname') . ";" .
            "charset=" . config('database.charset');

        try { //probeer een verbinding te maken
            $this->connection = new PDO($dns, config('database.user'), config('database.password'), [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (Exception $e) { //als het niet lukt dan...
            $this->showException($e);
        }
    }

    public function query($sql, $params = [])
    {
        try { //probeer de query uit te voeren

            //aanmaken van een query
            $query = $this->connection->prepare($sql);

            //query uitvoeren
            $query->execute($params);

            return $query;
        } catch (Exception $e) { //als het niet lukt dan ...
            $this->showException($e);
        }
    }

    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }

    //tonen van een mislukking
    private function showException($exception)
    {
        //pas aan voor een productie omgeving
        dd($exception->getMessage());

        //productie
        //echo "Er is een fout opgetreden, ga <a href='/'>terug</a> naar de website";
        //die();
    }
}