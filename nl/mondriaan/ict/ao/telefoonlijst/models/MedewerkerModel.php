<?php
namespace nl\mondriaan\ict\ao\telefoonlijst\models;

class MedewerkerModel {
    
    protected $db;
    private  $dsn = 'mysql:dbname=telefoonlijst;host=127.0.0.1';
    private  $user = 'root';
    private  $password = '';
   
    public function __construct()
    {  
            
       $this->db = new \PDO($this->dsn, $this->user, $this->password);
       $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
       $this->startSessie();
    }
    
   
    
    
    private function startSessie()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
    }
    public function aanpassenGebruiker()
    {
         
             $sql="UPDATE `contacten` SET wachtwoord=:ww, voornaam=:vn,tussenvoegsel=:tv,achternaam=:an,extern=:extern,intern=:intern,email=:email
                WHERE gebruikersnaam=:gn";
            
                $stmnt=$this->db->prepare($sql);
                $stmnt->bindParam(':gn',$_REQUEST['gn']);
                $stmnt->bindParam(':ww',$_REQUEST['ww']);
                $stmnt->bindParam(':vn',$_REQUEST['vn']);
                $stmnt->bindParam(':tv',$_REQUEST['tv']);
                $stmnt->bindParam(':an',$_REQUEST['an']);
                $stmnt->bindParam(':extern',$_REQUEST['extern']);
                $stmnt->bindParam(':intern',$_REQUEST['intern']);
                $stmnt->bindParam(':email',$_REQUEST['email']);
         
                 
                 return   $stmnt->execute();
                
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
    
    public function isGerechtigd()
    {
        //controleer of er ingelogd is. Ja, kijk of de gerbuiker de deze controller mag gebruiken 
        if(isset($_SESSION['gebruiker'])&&!empty($_SESSION['gebruiker']))
        {
            $gebruiker=$_SESSION['gebruiker'];
            if ($gebruiker->getRecht() == "medewerker")
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        
        return false;
        
        
   }
   public function getGebruiker()
   {
       return $_SESSION['gebruiker'];
   }
   public function uitloggen()
   {
       $_SESSION = array();
       session_destroy();
   }
 
}
