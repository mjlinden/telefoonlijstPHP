<?php
namespace nl\mondriaan\ict\ao\telefoonlijst\models;
class Contact 
{
    private $id;
    private $gebruikersnaam;
    private $wachtwoord;
    private $voornaam;
    private $tussenvoegsel;
    private $achternaam;
    private $intern;
    private $extern;
    private $email;
    private $recht;
    
    public function getId()
    {
        return $this->id;
    }
    public function getVoornaam()
    {
        return $this->voornaam;
    }
    
    public function getTussenvoegsel()
    {
        return $this->tussenvoegsel;
    }
    
    public function getAchternaam()
    {
        return $this->achternaam;
    }

    public function getNaam()
    {
        return "$this->voornaam $this->tussenvoegsel $this->achternaam";
    }
    
    public function getIntern()
    {
        return $this->intern;
    }
    
    public function getExtern()
    {
        return $this->extern;
    }
    
    public function getEmail()
    {
        return $this->email;
    } 
    
     public function getRecht()
    {
        return $this->recht;
    } 
    public function getGebruikersnaam()
    {
        return $this->gebruikersnaam;
    }
    public function getWachtwoord()
    {
        return $this->wachtwoord;
    }
}
