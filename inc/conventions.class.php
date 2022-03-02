<?php

class PluginPdfConventions {

   static $Header = ['nl_NL' =>  'Gebruikersovereenkomst ICT-materiaal',
                     'fr_FR' =>  'Convention d’utilisation de matériel ICT'];

   static $Person = ['nl_NL' =>  '<p></p>
                                 <p>Mijnheer / mevrouw:..............................................................................</p>
                                 <p>Met als verblijfplaats:..........................................................................</p>
                                 <p>gsm-nummer:......................................................................................</p>
                                 <p>E-mailadres:.....................................................................................</p>
                                 <p>Hierna «gebruiker» genoemd, bevestigt dat de</p>
                                 <p>werkgever/organisatie vzw Dienen, Maurice Lemonnierlaan 171, 1000 Brussel</p>
                                 <p>hem/haar het volgende materiaal onder de volgende voorwaarden ter beschikking stelde:</p>',
                     'fr_FR' =>  '<p></p>
                                 <p>M./Mme:..........................................................................................</p>
                                 <p>Domicilié(e) à:..................................................................................</p>
                                 <p>Numéro de mobile:................................................................................</p>
                                 <p>E-mail:..........................................................................................</p>
                                 <p>Ci-dessous appelé «utilisateur», reconnaît que</p>
                                 <p>l’employeur/organisation ASBL Dienen, Boulevard Maurice Lemonnier 171, 1000 Brussel</p>
                                 <p>a mis sa disposition le matériel suivant aux conditions suivantes:</p>'];

   static $Table = ['nl_NL' => '<b>1. Soort en kenmerken</b>',
                    'fr_FR' => '<b>1. Nature et caractéristiques</b>'];
   
   static $itemLaptop = ['nl_NL' => '<b>2. Voorwerp en inwerkingtreding</b>
                                    <p>De gebruiker ontvangt het onder punt 1 bedoelde materiaal exclusief voor het uitoefenen van zijn functies, vanaf .../.../........</p>
                                    <p>De gebruiker kan het onder punt 1 bedoelde materiaal gebruiken om zijn taken in het kader van zijn functie gemakkelijker uit te voeren.</p>
                                    <p>De gebruiker wordt verzocht de gebruiksvoorschriften van het materiaal na te leven.</p>
                                    <p>De gebruiker bevestigt een exemplaar van deze overeenkomst te hebben ontvangen en verbindt er zich toe alle afspraken na te leven.</p>',
                         'fr_FR' => '<b>2. Objet – prise de l’effet</b>
                                    <p>L’utilisateur reçoit le matériel visé au point 1. pour l’exercice de ses fonctions exclusivement, à partir du .../.../........ </p>
                                    <p>L’utilisateur a la jouissance du matériel visé au point 1   pour faciliter l’exécution des tâches dans le cadre de sa fonction. </p>
                                    <p>Chaque utilisateur est prié de respecter  les directives  d’utilisation du matériel.</p>
                                    <p>L’utilsateur  reconnait avoir reçu un exemplaire de la présente convention et s’engage à en respecter toutes les dispositions.</p>'];
   static $itemGSM = ['nl_NL' => '<b>2. Voorwerp en inwerkingtreding</b>
                                 <p>De gsm is prioritair bedoeld voor professioneel gebruik. De gebruiker mag de gsm voor persoonlijke doeleinden gebruiken.</p>
                                 <p>Elke telefonische communicatie die geen verband houdt met het uitoefenen van zijn functie wordt als privécommunicatie beschouwd.</p>
                                 <p>Het voordeel dat voortspruit uit het privégebruik van de gsm wordt geschat op 3 euro per maand of 12 euro per maand (met abonnement) en volgens de instructies van de RSZ voor de evaluatie van het voordeel.</p>',
                      'fr_FR' => '<b>2. Objet – prise de l’effet</b>
                                 <p>Le téléphone portable est destiné a un usage prioritairement professionnel. L’utilisateur est autorisé à utiliser le téléphone portable à des fins privées.</p>
                                 <p>Toute communication téléphonique qui est sans rapport avec l’exercice de la fonction est considérée comme une communication privée.</p>
                                 <p>L’avantage qui résulte de l’utilisation privée du téléphone portable est évalué à 3€  par mois ou 12 euro par mois ( avec abonnement) et suivant les instructions de l’onss pour l’évaluation de l’avantage.</p>'];

   static $Duration = ['nl_NL' =>'<b>3. Termijn van gebruik</b>
                                 <p> Het onder punt 1 bedoelde materiaal wordt ter beschikking gesteld van de gebruiker voor een duur van ......................maand(en)/ onbeperkte duur</p>
                                 <p> De gebruiker zal het voornoemde materiaal onmiddellijk teruggeven:</p>
                                 <ul>
                                    <li>wanneer de gebruiker niet langer de functie uitoefent waarvoor het gebruik van het materiaal uit punt 1 is bedoeld, de terbeschikkingstelling van de laptop eindigt dan van rechtswege.</li>
                                    <li>als de gebruiker deze overeenkomst niet naleeft.</p>
                                 </ul>',
                       'fr_FR' =>'<b>3. Durée de la présente convention</b>
                                 <p> Le matériel  visé au point 1, de la présente convention est mis à la disposition de l’utilisateur pour une durée de ……………………………mois /[pour une durée indéterminée.</p>
                                 <p> L’utilisateur restituera immédiatement ledit matériel: </p>
                                 <ul>
                                    <li>Lorsque l’utilisateur n’exerce plus la fonction donnant lieu à l’usage du matériel visé au point 1, la mise à disposition de l’ordinateur portable  prend alors fin de plein droit.</li>
                                    <li>En cas de constat que l’utilisateur ne respecte pas la présente convention.</li>
                                 </ul>'];

   static $Retraction = ['nl_NL' => '<b>4. Intrekking van het onder punt 1 bedoelde materiaal wanneer de uitoefening van de functie wordt opgeschort</b>
                                    <p>De gebruiker mag het onder punt 1 bedoelde materiaal in geval van opschorting van de uitoefening van zijn functie blijven gebruiken.   Als de opschorting evenwel langer dan 90 dagen duurt, moet de gebruiker het materiaal teruggeven vanaf de 91e dag.</p>',
                         'fr_FR' => '<b>4. Retrait du matériel visé au point 1.  en cas de suspension de l’exécution de la fonction</b>
                                    <p>L’utilisateur conserve la jouissance du matériel visé au point 1. en cas de suspension de l’exercice de la fonction.  Toutefois, si la suspension dure plus de 90 jours, l’utilisateur doit restituer le matériel à partir du 91e jour.</p>'];

   static $Usage = ['nl_NL' =>  '<b>5. Gebruik van het onder punt 1 bedoelde materiaal</b>
                                 <p> De gebruiker zal het onder punt 1 bedoelde materiaal gebruiken als een "goede huisvader" / " goede huismoeder" en erover waken dat het gebruikt wordt in optimale veiligheidsomstandigheden.</p>
                                 <p> Rechten en plichten:</p>
                                 <ul>
                                    <li>De gebruiker moet alle voorzorgsmaatregelen nemen om beschadiging, verlies of diefstal van het materiaal te voorkomen.</li>
                                    <li>De gebruiker bevestigt het materiaal in goede staat te hebben ontvangen en verbindt zich ertoe het niet aan derden door te geven.</li>
                                    <li>De gebruiker is verantwoordelijk voor het in goede staat houden van het materiaal. </li>
                                    <li>Updaten van de software of software installeren gebeurt door de informaticadienst van de werkgever; de gebruiker verbindt er zich toe de richtlijnen en instructies van de informaticadienst te volgen. </li>
                                    <li>Het is de gebruiker verboden het materiaal te gebruiken voor illegale activiteiten die in strijd zijn met de waarden van de werkgever of die zijn imago kunnen schaden. </li>
                                    <li>De gebruiker mag zonder toestemming van de werkgever de instellingen niet wijzigen.</li>
                                    <li>Het is de gebruiker verboden illegale software te installeren. </li>
                                    <li>Bij het behandelen van persoonlijke gegevens verbindt de gebruiker er zich toe het beleid van de werkgever te respecteren wat betreft vertrouwelijkheid en de bescherming van het privéleven. </li>
                                    <li>De gebruiker zorgt ervoor dat het antivirussysteem altijd up-to-date is. Hij moet voldoende maatregelen nemen om de gegevens op dat materiaal te beveiligen, zoals: regelmatig het wachtwoord veranderen, virus scannen, firewall, enz. </li>
                                    <li>De gebruiker verwittigt onmiddellijk, en in elk geval binnen de 24 uur, de bevoegde informaticadienst bij verlies of beschadiging van het materiaal.  </li>
                                    <li>In geval van diefstal legt de gebruiker zonder uitstel klacht neer bij de politie en zendt het proces verbaal naar de bevoegde informaticadienst. </li>
                                    <li>De gebruiker mag de gegevens die op de laptop staan of materiaal dat hem werd ter beschikking gesteld noch geheel noch gedeeltelijk kopiëren op een andere computer die hij bezit of waar hij toegang toe heeft, of welk ander reproductiemiddel ook, of aan wie dan ook doorsturen (langs elektronische weg of anders), of die nu al dan niet een vertrouwelijk karakter hebben(zoals een bestand of een dossier).</li>
                                    <li>De gebruiker moet het materiaal zo snel mogelijk teruggeven op de laatste dag waarop hij zijn functie uitoefent, of, als het om een wijziging van functie gaat, op de laatste werkdag in het kader van zijn oude functie.</li>
                                 </ul>',
                     'fr_FR' =>  '<b>5. Utilisation du matériel visé au point 1.</b>
                                 <ul>
                                    <li>L’utilisateur doit prendre toutes ses précautions pour éviter les dommages ainsi que la perte ou le vol du matériel.</li>
                                    <li>L’utilisateur reconnaît avoir reçu le matériel en bon état et s’engage à ne pas le mettre à disposition de tiers.</li>
                                    <li>L’utilisateur est responsable du maintien en bon état du matériel.</li>
                                    <li>Les mises à jour de logiciel ou l’installation des logiciel sont garanties par le service informatique de l’employeur, l’utilisateur s’engage à suivre les directives et les instructions du service informatique.</li>
                                    <li>Il est interdit à l’utilisateur d’utiliser le matériel à des activités illégales, en conflit avec les valeurs de l’employeur  ou susceptibles de nuire à son image.</li>
                                    <li>Il n’est pas permis à l’utilisateur d’apporter sans autorisation des modifications à la configuration du matériel.</li>
                                    <li>Il est interdit à l’utilisateur d’installer du logiciel illégal.</li>
                                    <li>Lors du traitement de données personnelles, l’utilisateur s’engage à respecter la politique de l’employeur quant à la confidentialité et à la protection de la vie privée.</li>
                                    <li>L’utilisateur fait en sorte que le système antivirus soit toujours à jour. Il doit prendre des mesures de protection suffisantes des données sur ce matériel, comme : changement régulier de mots de passe, scanner de virus, firewall, etc. </li>
                                    <li>L’utilisateur informe immédiatement, et dans tous les cas, endéans les 24h, le service informatique, compétent en cas de perte ou de dommage du matériel.</li>
                                    <li>En cas de vol, l’utilisateur  dépose plainte sans délai à la police et communique le procès-verbal au service informatique compétent.</li>
                                    <li>Utilisateur ne pourra copier sur un autre ordinateur lui appartenant ou auquel il a accès ou tout  moyen de reproduction de l’information, ou transmettre à quiconque (par voie électronique ou autre) tout ou partie des données figurant sur l’ordinateur portable ou auxquelles il a accès au départ de l’ordinateur portable ou du matériel mis à disposition, que celles-ci aient ou non un caractère confidentiel( comme un fichier ou dossier).</li>
                                    <li>L’utilisateur doit restituer le matériel au plus tard le dernier jour de l’exercice de sa fonction , s’il s’agit d’un changement de fonction, le dernier jour de prestation dans le cadre de l’ancienne fonction.</li>
                                 </ul>'];

   static $Agreement = ['nl_NL' =>'<p> Door ondertekening van deze overeenkomst verklaart de gebruiker dat hij gevolgen van deze overeenkomst heeft begrepen en zich daarmee akkoord verklaart.</p>
                                 <p>Aldus verklaard, opgemaakt in tweevoud en ondertekend</p>
                                 <p>te [<i>plaats</i>]............................. op .../.../........</p>
                                 <p>Handtekening</p>',
                        'fr_FR' =>'<p>En signant cette convention, l’utilisateur déclare avoir compris les termes de cette convention et se déclare d’accord avec elles.</p>
                                 <p>Ainsi déclaré, établi en double exemplaire et signé</p>
                                 <p>à [<i>lieu</i>]................................ le .../.../........</p>
                                 <p>Signature</p>'];
   
}