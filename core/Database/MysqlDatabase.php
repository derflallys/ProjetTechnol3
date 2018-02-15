<?php
/**
 * Created by PhpStorm.
 * User: ABOUBACAR
 * Date: 15/01/2017
 * Time: 23:49
 */

namespace core\Database;
use \PDO;


class MysqlDatabase extends Database
{
    private $dbname;
    private $dbuser;
    private $dbpass;
    private $dbhost;
    private $pdo;
    public function __construct($dbname,$dbuser='root',$dbpass='',$dbhost='localhost')
    {
        $this->dbname=$dbname;
        $this->dbuser=$dbuser;
        $this->dbpass=$dbpass;
        $this->dbhost=$dbhost;

    }
    private function getPDO()
    {
        if($this->pdo===null) {
            $pdo = new PDO("mysql:dbname=projetTech;host=localhost", 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        } 
            return $this->pdo;
    }
    public function query($stat,$class=null,$one=false)
    {
        $req= $this->getPDO()->query($stat);

        if(strpos($stat,'INSERT') === 0 || strpos($stat,'UPDATE') === 0 || strpos($stat,'DELETE') === 0){
            return $req;
        }

        if ($class==null)
        {
            $req->setFetchMode(PDO::FETCH_OBJ);
        }
        else
        {
            $req->setFetchMode(PDO::FETCH_CLASS,$class);
        }
        if($one)
        {
            $data=$req->fetch();
        }
        else
        {
            $data=$req->fetchAll();
        }
        return $data;
    }

    public function prepare($stat,$value,$class=null,$one=false)
    {
        //setfetchmode pour choisir le mode de fetch  genre pdo fetch class or obj kw
        $req = $this->getPDO()->prepare($stat);
        $res = $req->execute($value);

        if(strpos($stat,'INSERT') === 0 || strpos($stat,'UPDATE') === 0 || strpos($stat,'DELETE') === 0){
            return $res;
        }

        if ($class==null)
        {
            $req->setFetchMode(PDO::FETCH_OBJ);
        }
        else
        {
            $req->setFetchMode(PDO::FETCH_CLASS,$class);
        }
        if($one)
        {
            $data=$req->fetch();
        }
        else
        {
            $data=$req->fetchAll();
        }
        return $data;
    }

    public function lastInsertId(){
        return $this->getPDO()->lastInsertId();
    }
}