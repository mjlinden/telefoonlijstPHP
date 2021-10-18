<?php
namespace nl\mondriaan\ict\ao\telefoonlijst\models;

class SecretaresseModel {
    
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
    public function verwijderContact()
    {
          $id = filter_var($_REQUEST['id'], FILTER_VALIDATE_INT);
            if($id!=false)
            {
                $sql = 'DELETE FROM `contacten` WHERE `id`=:id';
                
               
                $stmnt = $this->db->prepare($sql);
                $stmnt->bindParam(':id',$id);
                $stmnt->execute();
                
            } 
    }
    
    public function toevoegenContact()
    {
         
             $sql="INSERT IGNORE INTO `contacten` (gebruikersnaam,wachtwoord,voornaam,tussenvoegsel,achternaam,extern,intern,email,recht)
                VALUES(:gn,:ww,:vn,:tv,:an,:extern,:intern,:email,\"medewerker\")";
            
                $stmnt=$this->db->prepare($sql);
                $stmnt->bindParam(':gn',$_REQUEST['gn']);
                $stmnt->bindParam(':ww',$_REQUEST['ww']);
                $stmnt->bindParam(':vn',$_REQUEST['vn']);
                $stmnt->bindParam(':tv',$_REQUEST['tv']);
                $stmnt->bindParam(':an',$_REQUEST['an']);
                $stmnt->bindParam(':extern',$_REQUEST['extern']);
                $stmnt->bindParam(':intern',$_REQUEST['intern']);
                $stmnt->bindParam(':email',$_REQUEST['email']);
            
               $stmnt->execute();
               
               if($stmnt->rowCount()==0)
               {
                   return false;
               }
               else
               {
                    return true;
               }
         
        
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
            if ($gebruiker->getRecht() == "secretaresse")
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