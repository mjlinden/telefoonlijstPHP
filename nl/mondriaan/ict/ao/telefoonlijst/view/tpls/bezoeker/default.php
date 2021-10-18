<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Telefoonlijst</title>
        <link rel="STYLESHEET" href="css/telefoonlijst.css" type="text/css">
        <title></title>
    </head>
    <body>
        
        <div id="content">
            <div id="invoer">
                
                     <a href="./?control=bezoeker&action=inloggen">inloggen</a>
                     <h1>Telefoonlijst</h1>
                   
            </div>
        
            <div id="contacten">
                <table>
                  <caption>Contacten</caption>

                  <thead>
                      <tr>
                          <th scope="col" >nummer</th>
                          <th scope="col" >naam</th>
                          <th scope=col"  >functie</th>
                          <th scope="col" >intern</th>
                          <th scope="col" >extern</th>
                          <th scope="col" >email</th>
                           
                      </tr>
                  </thead>


                  <tbody>
                       <?php for ($teller=0;$teller<count($contacten);$teller++):?>
                        <tr>
                            <th scope="row" ><?php echo $teller+1; ?></th>
                            <td><?php echo $contacten[$teller]->getnaam();?></td> 
                            <td><?php echo $contacten[$teller]->getRecht();?></td>
                            <td><?php echo $contacten[$teller]->getIntern();?></td>
                            <td><?php echo $contacten[$teller]->getExtern();?></td>
                            <td><?php echo $contacten[$teller]->getEmail();?></td>
                            
                        </tr>
                       <?php  endfor;?>
                  </tbody>
                  
                </table>
               
            </div>
       </div>
    </body>
</html>
