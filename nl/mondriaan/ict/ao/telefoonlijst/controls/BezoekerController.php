<?php
    namespace nl\mondriaan\ict\ao\telefoonlijst\controls;
    use nl\mondriaan\ict\ao\telefoonlijst\models as MODELS;
    use nl\mondriaan\ict\ao\telefoonlijst\view as VIEW;

class BezoekerController  
{
    private $action;
    private $control;
    private $view;
    private $model;
    
    public function __construct($control,$action)
    {
        $this->control = $control;
        $this->action = $action;

        $this->view=new VIEW\View();     
        $this->model = new MODELS\BezoekerModel();       
    }

   

    /**
    *execute vertaalt de action variable dynamisch naar een handler van de specifieke controller.
    * als de handler niet bestaat wordt de default als action ingesteld en
    * wordt de taak overgedragen aan de defaultAction handler. defauktAction bestaat altijd wel.
    * In de interface is zijn bestaan vastgelegd.
    */
    public function execute() 
    {
        $opdracht = $this->action.'Action';
        if(!method_exists($this,$opdracht))
        {
            $opdracht = 'defaultAction';
            $this->action = 'default';
        }
        $this->$opdracht();
        $this->view->setAction($this->action);
        $this->view->setControl($this->control);
        $this->view->toon();
    }
    
    private function forward($action, $control=null)
    {
            if($control===null)
            {
                $this->action = $action;
                $controller = $this;
            }
            else
            {
                $klasseNaam = __NAMESPACE__.'\\'.ucFirst($control).'Controller';
                $controller = new $klasseNaam($control,$action);
            }
            $controller->execute(); 
            exit();
    }
    
    private function inloggenAction()
    {
        if($this->model->isPostLeeg())
        {
           $this->view->set("boodschap","Vul uw gegevens in");
        }
        else
        {   
            $resultInlog=$this->model->controleerInloggen();
            switch($resultInlog)
            {
                case "MEDEWERKER":  //redirect
                            $this->forward("default", "medewerker");
                            break;
                case "SECRETARESSE":  //redirect
                            $this->forward("default", "secretaresse");
                            break;
                case "MISLUKT":
                            $this->view->set("boodschap","inloggen mislukt");
                            break;
                case "ONVOLLEDIG":
                            $this->view->set("boodschap","niet alle gegevens ingevuld");
                            break;
            }
        }
    }
    private function defaultAction()
    {
       $contacten=$this->model->getContacten();
       $this->view->set("contacten",$contacten);
    }
}
