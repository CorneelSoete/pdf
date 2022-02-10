<?php

class PluginPdfConventions {

   static $Header = ['nl_NL' =>  'Gebruikersovereenkomst ICT-materiaal',
                     'fr_FR' =>  'Convention d’utilisation de matériel ICT'];

   static $Person = ['nl_NL' =>  '<p>Naam:............................................................................................</p>
                                 <p>Adres:...........................................................................................</p>
                                 <p>Mobiel Telefoonnummer:...........................................................................</p>
                                 <p>E-mail:..........................................................................................</p>
                                 <p>Hierna "gebruiker" genoemd, verklaart hierbij dat hij of zij het volgende materiaal ter beschikking heeft gekregen van de PVDA onder de voorwaarden die verder worden opgesomd</p>',
                     'fr_FR' =>  '<p>Nom:.............................................................................................</p>
                                 <p>Adresse:.........................................................................................</p>
                                 <p>Numéro de mobile:................................................................................</p>
                                 <p>E-mail:..........................................................................................</p>
                                 <p>Ci-dessous appelé «utilisateur», reconnaît que le PTB à mis sa disposition le matériel suivant aux conditions qui suivent:'];

   static $Rights = ['nl_NL' =>  '<b>2. Rechten en plichten van de gebruiker</b>
                                 <ul>
                                    <li>De gebruiker verklaart de apparatuur in goede staat te hebben ontvangen en zal deze niet aan derden ter beschikking stellen.</li>
                                    <li>De gebruiker is verantwoordelijk voor het in goede staat houden van de apparatuur en zal updates van de software installeren volgens de aanbevelingen van de ICT dienst.</li>
                                    <li>Het is de gebruiker verboden de apparatuur te gebruiken voor activiteiten die illegaal zijn, in strijd zijn met het DNA van de partij (https://www.pvda.be/ons_dna) of die het imago van de partij kunnen schaden.</li>
                                    <li>Het is de gebruiker niet toegestaan zonder toestemming wijzigingen in de configuratie van de apparatuur aan te brengen.</li>
                                    <li>Het is de gebruiker niet toegestaan illegale software te installeren.</li>
                                    <li>De gebruiker zal bij de verwerking van persoonsgegevens op deze apparatuur het beleid van de PVDA op het vlak van privacy (https://www.pvda.be/privacy) naleven.</li>
                                 </ul>',
                     'fr_FR' =>  '<b>2. Droits et devoirs de l’utilisateur</b>
                                 <ul>
                                    <li>L’utilisateur reconnaît avoir reçu le matériel en bon état et s’engage à ne pas le mettre à disposition de tiers.</li>
                                    <li>L’utilisateur est responsable du maintien en bon état du matériel et s’engage à installer les mises à jour de logiciel selon les instructions du service ICT.</li>
                                    <li>Il est interdit à l’utilisateur d’utiliser le matériel à des activités illégales, en conflit avec l’ADN du parti (https://www.ptb.be/notre_adn) ou susceptibles de nuire à l’image du parti.</li>
                                    <li>Il n’est pas permis à l’utilisateur d’apporter sans autorisation des modifications à la configuration du matériel.</li>
                                    <li>Il est interdit à l’utilisateur d’installer du logiciel illégal.</li>
                                    <li>Lors du traitement de données personnelles, l’utilisateur s’engage à respecter la politique du PTB quant à la confidentialité et à la protection de la vie privée (https://www.ptb.be/vieprivee).</li>
                                 </ul>'];
   static $Theft = ['nl_NL' =>   '<b>3. Diefstal en beschadiging </b>
                                 <ul>
                                    <li>De gebruiker dient afdoende beschermingsmaatregelen te treffen, zoals periodieke wachtwoorden, virusscanner, firewall en dergelijke ter bescherming van data op de apparatuur.</li>
                                    <li>De gebruiker dient alle zorgvuldigheid in acht te nemen ter voorkoming van beschadiging, diefstal of verlies van de apparatuur.</li>
                                    <li>In geval van schade of diefstal van de apparatuur is de gebruiker verplicht dit zo spoedig mogelijk, doch uiterlijk binnen 24 uur te melden bij de ICT dienst.</li>
                                 </ul>',
                    'fr_FR' =>      '<b>3. Vol et accidents</b>
                                 <ul>
                                    <li>L’utilisateur doit prendre des mesures de protection suffisantes des données sur ce matériel, comme : changement régulier de mots de passe, scanner de virus, firewall, etc. </li>
                                    <li>L’utilisateur doit prendre toutes ses précautions pour éviter les dommages ainsi que la perte ou le vol du matériel.</li>
                                    <li>En cas de dommage ou de vol du matériel, l’utilisateur est tenu d’en avertir le service ICT le plus rapidement possible et en tout cas dans les 24 h.</li>
                                 </ul>'];
   static $Duration = ['nl_NL' =>'<b>4. Termijn van gebruik</b>
                                 <ul>
                                    <li>De gebruiker dient de apparatuur binnen de afgesproken bruikleentermijn dan wel bij beëindiging van het dienstverband of functieverandering terug te brengen.</li>
                                 </ul>',
                       'fr_FR' =>'<b>4. Terme de la convention</b>
                                 <ul>
                                    <li>L’utilisateur doit rendre le matériel au terme convenu ou bien en cas de changement de fonction ou de fin de la relation de travail.</li>
                                 </ul>'];
   static $Agreement = ['nl_NL' =>'<p> Door ondertekening van deze overeenkomst verklaart de gebruiker dat hij gevolgen van deze overeenkomst heeft begrepen en zich daarmee akkoord verklaart.</p>
                                 <p>Aldus verklaard, opgemaakt in tweevoud en ondertekend</p>
                                 <p>te [<i>plaats</i>].......................................................................................</p>
                                 <p><i>gebruiker</i></p>
                                 <p>Naam:............................................................................................</p>
                                 <p>Datum: .../.../........</p>
                                 <p>Handtekening</p>',
                        'fr_FR' =>'<p>En signant cette convention, l’utilisateur déclare avoir compris les termes de cette convention et se déclare d’accord avec elles.</p>
                                 <p>Ainsi déclaré, établi en double exemplaire et signé</p>
                                 <p>à [<i>lieu</i>].......................................................................................</p>
                                 <p><i>utilisateur</i></p>
                                 <p>Nom:............................................................................................</p>
                                 <p>Date: .../.../........</p>
                                 <p>Signature</p>'];
   
}