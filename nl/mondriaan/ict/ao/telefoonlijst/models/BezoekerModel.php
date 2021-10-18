<?php
namespace nl\mondriaan\ict\ao\telefoonlijst\models;

class BezoekerModel 
{
    
    private $db;
    private  $dsn = 'mysql:dbname=telefoonlijst;host=127.0.0.1';
    private  $user = 'root';
    private  $password = '';
   
    public function __construct()
    {   
        
       $this->db = new \PDO($this->dsn, $this->user, $this->password);
       $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
    }
    
    function isPostLeeg()
    {
       if(empty($_POST))
       {
            return true;
       }
       else
       {
           return false;
       }
       // alternatief
      // return empty($_POST);
    }
    
    
    
    

    
    
    public function getContacten()
    {
       $sql = 'SELECT * FROM `contacten` ORDER BY achternaam';
       $stmnt = $this->db->prepare($sql);
       $stmnt->execute();
       $contacten = $stmnt->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\Contact');    
       return $contacten;
    }
    private function startSessie()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
    }
    public function controleerInloggen()
    {
        if (    (isset($_REQUEST['gn'])) && (!empty($_REQUEST['gn'])) && (isset($_REQUEST['ww']))  && (!empty($_REQUEST['ww']))   )
        {
             $gn = $_REQUEST['gn'];
             $ww = $_REQUEST['ww'];

             $sql = 'SELECT * FROM `contacten` WHERE `gebruikersnaam` = :gn AND `wachtwoord` = :ww';
             $sth = $this->db->prepare($sql);
             $sth->bindParam(':gn',$gn);
             $sth->bindParam(':ww',$ww);
             $sth->execute();
             
             $result = $sth->fetchAll(\PDO::FETCH_CLASS,__NAMESPACE__.'\Contact');
             
             if(count($result) === 1)
             {   
                 $this->startSessie();   
                 $_SESSION['gebruiker']=$result[0];
                    if($_SESSION['gebruiker']->getRecht()==="medewerker")
                    {
                         return 'MEDEWERKER';
                    }
                    else
                    {
                        return 'SECRETARESSE';
                    }
             }
             return 'MISLUKT';
        }
        return 'ONVOLLEDIG';
    }
  
}