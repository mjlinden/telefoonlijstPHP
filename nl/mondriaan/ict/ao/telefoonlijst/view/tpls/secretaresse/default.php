<!DOCTYPE html>
<html>
    <head>
        <title>Telefoonlijst</title>
        
        <link rel="STYLESHEET" href="css/telefoonlijst.css" type="text/css">
    </head>
    <body>
        <div id="content">
            <a href="./?control=secretaresse&action=uitloggen">uitloggen</a>
            <h1>Telefoonlijst</h1>
            <h2>Welkom Secretaresse <?php echo $gebruiker->getNaam()?></h2>
            <?php if (isset($toevoegen)) {echo $toevoegen;} ?>
            
            <div id='contacten'>
                <table >
                    <caption>Contacten</caption>
                    <thead> 
                       
                      <tr>
                           <th scope="col" >nummer</th>
                          <th scope="col" >naam</th>
                          <th scope="col" >gebruikersnaam</th>
                          <th scope="col" >wachtwoord</th>
                          
                          <th scope="col" >verwijder</th>
                      </tr>
                  </thead>
                    
                    
                    <tbody>
                        
                        
                        <?php for ($teller=0;$teller<count($contacten);$teller++):?>
                        <tr>
                            <th scope="row" ><?php echo $teller+1; ?></th>
                            <td><?php echo $contacten[$teller]->getnaam();?></td> 
                            <td><?php echo $contacten[$teller]->getGebruikersnaam();?></td>
                            <td><?php echo $contacten[$teller]->getWachtwoord();?></td>
                            
                            <td>
                                <a href=".?control=secretaresse&action=verwijder&id=<?php echo $contacten[$teller]->getId();?>">
                                    <img src="img/verwijder.png" title="verwijder "/>
                                </a>
                            </td>
                        </tr>
                       <?php  endfor;?>
                    
                    </tbody>
                    
               
                   
                </table>
                <a href=".?control=secretaresse&action=toevoegen">
                                    <img src="img/toevoegen.png" title="voegtoe"/>
                                </a>
            </div>
        </div>
    </body>
