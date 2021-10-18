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
                    <input type='hidden' name="action" value="toevoegen">
                    <input type='hidden' name="control" value="secretaresse">
                    <h1>Toevoegen medewerker</h1>
                        <table>
                    
                            <tr>
                                <td class="lbl">Gebuikersnaam:</td>
                                <td>
                                        <input type="text" placeholder="gebuikersnaam" name="gn" value='<?php if (isset($gn)) {echo $gn;} else {echo "";} ?>' required="required">
                                </td>
                            </tr>

                            
                     
                            <tr >
                               <td class="lbl">Wachtwoord:</td>
                               <td>
                                       <input type="text" name="ww" placeholder="wachtwoord" required="required" >
                               </td>
                           </tr>
                           
                            <tr>
                                <td class="lbl">Voornaam:</td>
                               <td>
                                       <input type="text" name="vn" placeholder="voornaam" required="required" >
                               </td>
                            </tr>
                            
                            <tr>
                                <td class="lbl">tussenvoegsel:</td>
                               <td>
                                       <input type="text" name="tv" placeholder="tussenvoegsel" required="required" >
                               </td>
                            </tr>
                            
                            <tr>
                                <td class="lbl">Achternaam:</td>
                               <td>
                                       <input type="text" name="an" placeholder="achternaam" required="required" >
                               </td>
                            </tr>
                            
                            <tr>
                                <td class="lbl">intern:</td>
                               <td>
                                       <input type="text" name="intern" placeholder="intern" required="required" >
                               </td>
                            </tr>
                            
                            <tr>
                                <td class="lbl">extern:</td>
                               <td>
                                       <input type="text" name="extern" placeholder="extern" required="required" >
                               </td>
                            </tr>
                            
                            <tr>
                                <td class="lbl">email:</td>
                               <td>
                                       <input type="text" name="email" placeholder="email" required="required" >
                               </td>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td>
                                      <input type="submit" value="voeg toe"> </form>
                                        <form action="." method="post">
                                            <input type='hidden' name="action" value="default">
                                            <input type='hidden' name="control" value="secretaresse">
                                            <input type="submit" value="annuleren"> 
                                      </form> 
                                </td>
                            </tr>
                        </table>            
                    
            </div>
        
            
       </div>
    </body>
</html>
