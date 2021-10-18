<?php
    namespace nl\mondriaan\ict\ao\telefoonlijst\controls;
    use nl\mondriaan\ict\ao\telefoonlijst\models as MODELS;
    use nl\mondriaan\ict\ao\telefoonlijst\view as VIEW;

class MedewerkerController  
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
        $this->model = new MODELS\MedewerkerModel();
        
        $isGerechtigd = $this->model->isGerechtigd();
        
        if($isGerechtigd!=true)
        {
            
            $this->forward('default','bezoeker');
        }
    }

    /**
    *execute vertaalt de action variable dynamisch naar een handler van de specifieke controller.
    * als de handler niet bestaat wordt de default als action ingesteld en
    * wordt de taak overgedragen aan de defaultAction handler. defauktAction bestaat altijd wel
    */
    public function execute() 
    {
        $gerechtigd = $this->model->isGerechtigd();
        if(!$gerechtigd)
        {
            $this->model->uitloggen();
            $this->forward('default', 'bezoeker');
        }
        
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
    
    private function uitloggenAction()
    {
        $this->model->uitloggen();
        $this->forward('default','bezoeker');
    }
 
    private function defaultAction()
    {
      // $contacten=$this->model->geefContact();
       $gebruiker = $this->model->getGebruiker();
       $this->view->set("gebruiker",$gebruiker);
    }
    
    private function aanpassenAction()
    {
        $this->model->aanpassenGebruiker();
        $this->forward('uitloggen');
    }
}
