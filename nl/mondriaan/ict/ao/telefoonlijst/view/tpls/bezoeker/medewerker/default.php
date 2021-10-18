<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Telefoonlijst</title>
        <link rel="STYLESHEET" href="css/telefoonlijst.css" type="text/css">
        <title>Toevoegen medewerker</title>
    </head>
    <body>
        
        <div id="content">
            <div id="invoer">
                <form action="." method="post">
                    <input type='hidden' name="action" value="aanpassen">
                    <input type='hidden' name="control" value="medewerker">
                    <h1>Aanpassen medewerker</h1>
                        <table>
                    
                            <tr>
                                <td class="lbl">Gebuikersnaam:</td>
                                <td>
                                        <input type="text"  name="gn" value='<?php echo $gebruiker->getGebruikersnaam();?>' readonly>
                                </td>
                            </tr>

                            
                     
                            <tr >
                               <td class="lbl">Wachtwoord:</td>
                               <td>
                                       <input type="text" name="ww" value='<?php echo $gebruiker->getWachtwoord();?>' required="required" >
                               </td>
                           </tr>
                           
                            <tr>
                                <td class="lbl">Voornaam:</td>
                               <td>
                                       <input type="text" name="vn" value='<?php echo $gebruiker->getVoornaam();?>' required="required" >
                               </td>
                            </tr>
                            
                            <tr>
                                <td class="lbl">tussenvoegsel:</td>
                               <td>
                                       <input type="text" name="tv" value='<?php echo $gebruiker->getTussenvoegsel();?>' required="required" >
                               </td>
                            </tr>
                            
                            <tr>
                                <td class="lbl">Achternaam:</td>
                               <td>
                                       <input type="text" name="an"  value='<?php echo $gebruiker->getAchternaam();?>' required="required" >
                               </td>
                            </tr>
                            
                            <tr>
                                <td class="lbl">intern:</td>
                               <td>
                                       <input type="text" name="intern"  value='<?php echo $gebruiker->getIntern();?>' required="required" >
                               </td>
                            </tr>
                            
                            <tr>
                                <td class="lbl">extern:</td>
                               <td>
                                       <input type="text" name="extern" value='<?php echo $gebruiker->getExtern();?>'  required="required" >
                               </td>
                            </tr>
                            
                            <tr>
                                <td class="lbl">email:</td>
                               <td>
                                       <input type="text" name="email" value='<?php echo $gebruiker->getEmail();?>'  required="required" >
                               </td>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td>
                                      <input type="submit" value="aanpassen"> </form>  
                                      <form action="." method="post">
                                            <input type='hidden' name="action" value="uitloggen">
                                            <input type='hidden' name="control" value="medewerker">
                                            <input type="submit" value="annuleren"> 
                                        </form> 
                                </td>
                                
                            </tr>
                           
                    </table>
            </div>
        
            
       </div>
    </body>
</html>
