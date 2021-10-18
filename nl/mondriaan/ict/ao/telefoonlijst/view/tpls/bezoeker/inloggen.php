<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Calculator</title>
        <link rel="STYLESHEET" href="css/telefoonlijst.css" type="text/css">
        <title>inloggen</title>
    </head>
    <body>
        
        <div id="content">
            <div id="invoer">
                <form action="." method="post">
                    <input type='hidden' name="action" value="inloggen">
                    <input type='hidden' name="control" value="bezoeker">
                    <h1>Inloggen</h1>
                        <table>
                    
                            <tr>
                                <td class="lbl">Gebuikersnaam:</td>
                                <td>
                                        <input type="text" placeholder="vul uw gebuikersnaam in" name="gn" value='<?php if (isset($gn)) {echo $gn;} else {echo "";} ?>' required="required">
                                </td>
                            </tr>

                            
                     
                            <tr >
                               <td class="lbl">Wachtwoord:</td>
                               <td>
                                       <input type="password" name="ww" placeholder="vul uw wachtwoord in" required="required" >
                               </td>
                           </tr>
                            <tr>
                                <td> Opmerking:</td>
                                <td>
                                     <?php echo $boodschap; ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                      <input type="submit" value="inloggen"> </form>
 
                                      <form action="." method="post">
                                            <input type='hidden' name="action" value="default">
                                            <input type='hidden' name="control" value="bezoeker">
                                            <input type="submit" value="annuleren"> 
                                      </form> 
                                </td>
                            </tr>
                     
                    </table>
                </form>
            </div>
        
            
       </div>
    </body>
</html>
