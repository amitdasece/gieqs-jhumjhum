<!DOCTYPE html>
<html lang="en">

<?php require '../../assets/includes/config.inc.php';?>
<?php /*require  BASE_URI . "/assets/scrips/vcard.php";
$vCard = new vCard('Example3.0.vcf'); */
?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="At GIEQs we aim to make everyday endoscopy better.  Endoscopy is performed by a team of doctors and nurses.  Both parts of the team are important and so a nursing symposium is part of GIEQs.">
    <meta name="author" content="gieqs">
    <title>Ghent International Endoscopy Symposium</title>
    <!-- Favicon -->
    <link rel="icon" href="<?php echo BASE_URL;?>/assets/img/brand/favicongieqs.png" type="image/png">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/swiper/dist/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <!-- Purpose CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/purpose.css" id="stylesheet">

    <style>
      .modal-backdrop
      {
          opacity:0.75 !important;
      }
      @media screen and (max-width: 400px) {
        
        
        .scroll{

          font-size: 1em;

          }

          .h5{

          font-size: 1em;
          }

          .tiny {
          font-size: 0.75em;

          }

          .btn {

            padding: 0.25rem 1.00rem;
            margin-bottom: 0.75rem;
          }
      }
    

    </style>
</head>

<body>
<div class="container">

<?php

// error_reporting(-1);

$folder = 'https://' . $_SERVER['HTTP_HOST'] . '/studyserver/PROSPER/';

$page_title='Administration GIEQs';

?>

<p class="h5">iACE - Admin - Dashboard Data Mail Generator</p>

<?php
// include ($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/simple_header.php');
//use the referring id as the user id to change the password for
//alternatively use a randomly generated string

//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/lib/SendGrid.php');

//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/sendgrid-php.php');

require(BASE_URI.'/vendor/autoload.php');

//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/phpmailer/PHPMailer.php');



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//require($_SERVER['DOCUMENT_ROOT'].'/studyserver/PROSPER/scripts/phpmailer/SMTP.php');

function Mailer ($email, $subject, $filename){
		
		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
				try {
					//Server settings
					$mail->SMTPDebug = 3;                                 // Enable verbose debug output
					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'n3plcpnl0016.prod.ams3.secureserver.net';  // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'admin@gieqs.com';                 // SMTP username
					$mail->Password = 'Nel67fnvr2';                           // SMTP password
					$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 465;                                    // TCP port to connect to

					//Recipients
					$mail->setFrom('admin@gieqs.com', 'Ghent International Endoscopy Quality Symposium');
					$mail->addAddress('admin@gieqs.com');
					foreach ($email as $key=>$value){
						
						$mail->addBCC($value);
						
					}
					
					     // Add a recipient
					//$mail->addAddress('ellen@example.com');               // Name is optional
					$mail->addReplyTo('admin@gieqs.com', 'Ghent International Endoscopy Quality Symposium');
					//$mail->addCC('cc@example.com');
					//$mail->addBCC('bcc@example.com');

					//Attachments
					//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
					//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

					//Content
					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = $subject;
                    
                    $mail->msgHTML(file_get_contents(BASE_URI . $filename), __DIR__);
                    // $mail->Body    = $txt;
					//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					$mail->send();
					echo 'Message has been sent';
					//$this->setAccommodationUpdateDone($guestid);
				} catch (Exception $e) {
					echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				}

		
		
		
}

?>

	
 <?php

$subject = "An invitation to the 1st Ghent International Endoscopy Quality Symposium, 7 / 8 October 2020";

$emailString = "Hans Van Vlierberghe <hans.vanvlierberghe@uzgent.be>, Lobke Desomer <lobkedesomer@gmail.com>, Pieter Hindryckx <pieter.hindryckx@uzgent.be>, Tania Helleputte <tania.helleputte@uzgent.be>, Helena Degroote <helena.degroote@ugent.be>, Danny De Looze <danny.delooze@uzgent.be>, Ewoud <edemunter@hotmail.com>";
$emailArray = explode(',', $emailString);
//print_r($myArray);

$string = "	aglaja.depauw@ugent.be
an pieters	an_pieters@hotmail.com
andre beckers	a.beckers@azsav.be
Andre Beckers	andre.beckers@skynet.be
andre elewaut	andre.elewaut@skynet.be
andre mast	andre.m.mast@gmail.com
andrew crape	andrew.crape@telenet.be
Andrew Crape	andrew.crape@ziekenhuiswaregem.be
anesthesie brigitta + hilde	secretariaat.anesthesie@ugent.be
anja geerts	anja.geerts@ugent.be
Ann De Knibber	ann.deknibber@telenet.be
ann elewaut	ann.elewaut@skynet.be
Ann Elewaut	ann.elewaut@azgroeninge.be
ann reekmans	ann.reekmans@asz-aalst.be
anneleen de both	anneleen.deboth@gmail.com
Annelien Van Driessche	annelien_van_driessche@hotmail.com
annelies holvoet	anneliesholvoet@yahoo.com
astrid de zutter	astrid.dezutter@ugent.be
barbara claerhout	barbara.claerhout@azalma.be
barbara dhooghe	barbara1dhooghe@gmail.com
Barbara Willandt	willandt.barbara@hotmail.com
bart sierens	bart.sierens@azalma.be
bart van besien	bart.vanbesien@yperman.net
bart van imschoot	bartvanimschoot@telenet.be
Bart Van Imschoot	bart.vanimschoot@azglorieux.be
bart van overberghe	bart.vanoverberghe@sezz.be
Bea Berghmans	bea.berghmans@sezz.be
beatrijs strubbe	beatrijs_strubbe@yahoo.com
Beatrijs Strubbe	beatrijs.strubbe@olvz-aalst.be
Benoit Nolf	benoit.nolf@asz-aalst.be
benoit nolf	b_nolf@hotmail.com
bieke lambert	bieke.lambert@ugent.be
bjorn ghillemijn	bjorn.ghillemijn@werken-glorieux.be
bruno vanduyfhuys	bruno.vanduyfhuys@azalma.be
bruno vermeersch	bruno.vermeersch@azalma.be
Bruno Waked	bruno.waked@ugent.be
Carolien Beyls	carolien.beyls@azoudenaarde.be
Celine Debeuckelaere	celine.debeuckelaere@gmail.com
Chantal Baertsoen	chantal.baertsoen@sintandriestielt.be
chantal baertsoen	talltje@hotmail.com
Charlotte De Vloo	charlotte.devloo@azdelta.be
chris braxel	chris.braxel@telenet.be
christian feys	christian.feys@yperman.net
christophe george	christophe.george@azgroeninge.be
Christophe Schoonjans	christophe.schoonjans@ugent.be
christophe snauwaert	christophe.snauwaert@hotmail.com
christophe van steenkiste	ccvsteen@hotmail.com
Christophe Van Steenkiste	christophe.vansteenkiste@azmmsj.be
clara thienpont	clara.thienpont@zna.be
claude cuvelier	claude.cuvelier@ugent.be
danny de looze	danny.delooze@ugent.be
david tate	david.tate@uzgent.be
De Bruyne Ruth	Ruth.DeBruyne@UZGENT.be
De Man Marc	Marc.DeMan@UZGENT.be
Decruyenaere Johan	Johan.Decruyenaere@uzgent.be
Defreyne Luc	luc.defreyne@uzgent.be
Delrue Louke	Louke.Delrue@UZGENT.be
Denis Marichal	denis.marichal@azstlucas.be
denis marichal	dmarichal@yahoo.com
didier baert	didier.baert@azmmsj.be
diederik dooremont	diederikdooremont@yahoo.com
Diederik Persyn	diederik_persyn@hotmail.com
dirk de pooter	dirk.de.pooter@skynet.be
dirk van de putte	dirkvdputte@skynet.be
dirk van gysegem	dirk.van.gysegem@telenet.be
dirk voet	dirk.voet@ugent.be
dominiek de wulf	dominiek.de.wulf@telenet.be
Dominiek De Wulf	Dominiek.dewulf@azdelta.be
donald claeys	donald.claeys@azmmsj.be
eduard callebout	eduard.callebout@uzgent.be
elisabeth vandekerckhove	elisabeth.vandekerckhove@ugent.be
els monsaert	elsmonsaert@yahoo.com
Els Monsaert	els.monsaert@azmmsj.be
Ercan Cesmeli	ercan.cesmeli@telenet.be
ercan cesmeli	ercan.cesmeli@azstlucas.be
eric halet	ehalet@hotmail.com
erik vanderstraeten	erik.vanderstraeten@azmmsj.be
evelien christiaens	evelien.christiaens@olvz-aalst.be
Evelyne De Decker	evelynededecker@hotmail.com
filip baert	filip.baert@azdelta.be
filip de maeyer	filip.demaeyer@ugent.be
filip sermon	filip.sermon@olvz-aalst.be
filip van der meersch	filip.vandermeersch@asz-aalst.be
florence ann�	florence.anne@ugent.be
Francis Weyn	francis.weyn@azlokeren.be
francois d'heygere	francois.dheygere@azgroeninge.be
francois marolleau	fmarolleau@hotmail.com
frank huble	frankhuble@yahoo.com
frank van fraeyenhove	f.vanfraeyenhove@yahoo.com
freddy vandenbussche	f.vandenbussche@azsav.be
frederick dochy	frederick.dochy@ugent.be
frederik berrevoet	frederik.berrevoet@ugent.be
Frederik De Clerck	fdclerck@hotmail.com
Geboes Karen	Karen.Geboes@UZGENT.be
Geertrui Coppens	geertruic@hotmail.com
geertrui coppens	geertrui.coppens@olvz-aalst.be
georges blinder	georges.blinder@zna.be
Gilbert Ghillebert	gilbert.ghillebert@azdelta.be
gilbert ghillebert	gghillebert@azdelta.be
Godelieve Du Ville	lieve.du.ville@olvz-aalst.be
godelieve du ville	lieveduville@skynet.be
Goedele Eeckhout	dr.eeckhout@telenet.be
gudrun cornelis	gudrun.cornelis@gmail.com
guido de schrijver	guido.de.schrijver@telenet.be
Guido Deboever	gdeboever@azdamiaan.be
guido spanoghe	guido.spanoghe@aznikolaas.be
guy coutant	guy.coutant@skynet.be
hannes ruymbeke	hannes.ruymbeke@ugent.be
Hannes Vanwynsberghe	hannesvanwynsberghe@hotmail.com
hans orlent	hans.orlent@azsintjan.be
hans van vlierberghe	hans.vanvlierberghe@ugent.be
harald naessens	naessens.neven@skynet.be
harald peeters	harald.peeters@azstlucas.be
helena degroote	helena.degroote@ugent.be
hendrik pennoit	hendrik.pennoit@telenet.be
hendrik reynaert	hendrik.reynaert@uzbrussel.be
hubert piesevaux	hubert.piessevaux@uclouvain.be
ingrid bruggeman	ingrid.bruggeman@janpalfijngent.be
ingrid buytaert	ingrid.buytaert@telenet.be
Isabelle Colle	isabelle.colle@ASZ.be
isabelle de kock	isabelle.dekock@uzgent.be
isabelle ruytjens	isabelle.ruytjens@zna.be
Ivo Duysburgh	ivo.duysburgh@aznikolaas.be
ivo duysburgh	ivo.duysburgh@pandora.be
jacques huyghe	jacques.huyghe@skynet.be
jacques lagae	jacquesmialagae@telenet.be
jacques vanhuysse	jacques.vanhuysse@azsintjan.be
jan beyls	jan.beyls@sintandriestielt.be
jan hulstaert	jan.hulstaert@pandora.be
jan proesmans	proesmans.suy@skynet.be
jean-louis coenegrachts	jean-louis.coenegrachts@jessazh.be
Jef Dewyspelaere	jef.dewyspelaere@azdelta.be
jeoffrey schouten	jeoffrey.schouten@aznikolaas.be
jeroen geldof	jeroen.geldof@ugent.be
jeroen lenz	jeroen.lenz@zna.be
Jochen Decaestecker	jdecaestecker@azdelta.be
jochen decaestecker	jochen.decaestecker@azdelta.be
johan van ongeval	johan.vanongeval@azstlucas.be
johan vandervoort	jo.vandervoort@olvz-aalst.be
Johan Verhofstadt	johan.verhofstadt@azsintblasius.be
Joris Arts	jar@stlucas.be
joris dutre	dutrejoris@hotmail.com
joris stubbe	joris.stubbe@azsintjan.be
Jurgen Almey	jurgen.almey@uzgent.be
karel de keyser	keizerkarel@skynet.be
Karel De Keyser	karel.dekeyser@aznikolaas.be
katrien de keukeleire	dekeukeleirekatrien@mac.com
katrien lecluyse	katrien.lecluyse@azoudenaarde.be
katrien van renterghem	katrien.vanrenterghem@ugent.be
katrien vandenbroucke	katrien.vandenbroucke@sjki.be
kenny vlaemynck	kennyvlaemynck@hotmail.com
Koen Gorleer	koen.gorleer@aznikolaas.be
koen hendrickx	koen.hendrickx@olvz-aalst.be
koen rasquin	koen.rasquin@azmmsj.be
koen thorrez	koen.thorrez@yperman.net
koen van dycke	koen.van.dycke@azzeno.be
Kruse Vibeke	vibeke.kruse@uzgent.be
lara crape	lara.crape@ugent.be
laura coremans	laura.coremans@ugent.be
laure nuytemans	laure.nuytemans@ugent.be
Laurent Stephanie	Stephanie.Laurent@UZGENT.be
leo van alsenoy	leo.vanalsenoy@aznikolaas.be
liesbeth ferdinande	liesbeth.ferdinande@ugent.be
lieselot baert	lieselot.baert@ugent.be
Lieven Allaert	allaert.lieven@yperman.net
Lieven Vandeputte	lieven.vandeputte@azsintjan.be
lieven vandeputte	dr.vandeputte@belgacom.net
lisa crape	lisa.crape@ugent.be
Lisbeth Vandenabeele	vandenabeele.lisbeth@gmail.com
lobke desomer	lobkedesomer@gmail.com
louis verbist	louis.verbist@zna.be
louise krott	louise.krott@ugent.be
luc botelberge	botelberge@skynet.be
Luc Harlet	luc.harlet@azdelta.be
luc lepoutre	luc.lepoutre@olvz-aalst.be
Luc Lepoutre	luc.lepoutre@skynet.be
luc terriere	luc.terriere@skynet.be
luc verstraete	luc.verstraete@sezz.be
lynn debels	lynn_debels@hotmail.com
maaike pauwels	maaike.pauwels@ugent.be
maarten dekeyser	maartenmlk@hotmail.com
maggy osselaer	maggy.osselaer@zna.be
marc cardon	marc.cardon@skynet.be
marc delatere	marc.delatere@telenet.be
Marc Delatere	marc.delatere@vzwgo.be
marc hamerijck	marc.hamerijck@werken-glorieux.be
marc kint	marc.kint@azstlucas.be
marc peeters	marc.peeters@uza.be
marc simoens	marc.simoens@zna.be
marc van outryve	marc.van.outryve@skynet.be
marc verhamme	marc.verhamme@telenet.be
Marc Verhamme	marc.verhamme@azgroeninge.be
maridi aerts	maridi.aerts@uzbrussel.be
marijke paelinck	marijkepaelinck@hotmail.com
Mark Remery	mark.remery@azoudenaarde.be
marleen hanssens	marleen.hanssens@sezz.be
marleen praet	marleen.praet@ugent.be
martine de vos	martine.devos@ugent.be
Matthyssens Lucas	Lucas.Matthyssens@UZGENT.be
michael fried	michael.fried@zna.be
michel deruyttere	michel.deruyttere@skynet.be
micheline tresinie	micheline.tresinie@azsintjan.be
mieke deceuninck	mieke.deceuninck@azstvdeinze.be
Mike Cool	mcool@azdamiaan.be
miranda withofs	miranda.withofs@jessazh.be
monique mussche	moni.mussche@gmail.com
myriam van winckel	myriam.vanwinckel@ugent.be
nadia struyf	nadia.struyf@klina.be
nancy van damme	nancyvandamme@hotmail.com
natalie stoens	nataliestoens@belgacom.net
nathalie meireson	nathalie.meireson@yahoo.com
Nele Deprez	nele.deprez@ugent.be
pascal peeters	pascal.peeters@jessazh.be
patrick borgers	patrickborgers@belgacom.net
patrick pauwels	patrick.pauwels@uza.be
patrick schoenaers	patrick.schoenaers@azalma.be
paul desmidt	paul.desmidt@janpalfijngent.be
paul hoste	paul.hoste@azalma.be
peter burvenich	peter.burvenich@azmmsj.be
peter buydens	peter.buydens@asz-aalst.be
philippe cochez	p.cochez@azsav.be
philippe potvin	dr.potvin@sjk.be
Philippe Van Hootegem	philippe.van.hootegem@stlucas.be
philippe van hootegem	pvanhootegem@stlucas.be
philippe vanbiervliet	philippe.vanbiervliet@azoudenaarde.be
philippe vergauwe	philippe.vergauwe@azgroeninge.be
pierre gigase	pierre.gigase@zna.be
Pierre Laukens	gastro-enterologie@azsintjan.be
Piet Baetens	piet.baetens@asz-aalst.be
piet baetens	piet_baetens@telenet.be
piet pattyn	piet.pattyn@ugent.be
piet steger	pietsteger@telenet.be
pieter dewint	pieterdewint@hotmail.com
pieter dobbels	dobbelspieter@hotmail.com
pieter hindryckx	pieter.hindryckx@ugent.be
Pieter Pletinckx	pieter.pletinckx@azmmsj.be
pieter van der spek	pieter.van.der.spek@olvz-aalst.be
Pieter Vandecandelaere	pieter.vandecandelaere@azdelta.be
Renaat Schoonjans	renaat.schoonjans@azglorieux.be
renaat schoonjans	renaat.schoonjans@werken-glorieux.be
roberto troisi	roberto.troisi@ugent.be
roger fils	rogerfils@skynet.be
Rogiers Xavier	Xavier.Rogiers@UZGENT.be
Roland Casneuf	roland.casneuf@skynet.be
Roland Vermeeren	roland.vermeeren@telenet.be
ronald milo	ronald.milo@skynet.be
sander lefere	sander.lefere@ugent.be
sander smeets	sander.smeets@ugent.be
sarah raevens	sarah.raevens@ugent.be
sebastien kindt	sebastien.kindt@sezz.be
serge naegels	serge.naegels@zna.be
sigrid mareels	sigrid.mareels@vzwgo.be
Smeets Peter	Peter.Smeets@UZGENT.be
Sofie Decock	sofie_decock11@hotmail.com
sofie gosse	sofiegosse@gmail.com
sofie rogge	sofie.rogge@azstlucas.be
sofie rogge	sofie_rogge@hotmail.com
stefan bourgeois	stefan.bourgeois@zna.be
Stefan Van Langendonck	stefan.vanlangendonck@gmail.com
stephaan pollet	stephaan.pollet@skynet.be
stephanie vanbiervliet	stephanie.vanbiervliet@ugent.be
Steven De Coninck	steven.de.coninck@sintandriestielt.be
steven de coninck	steven.deconinck@sintandriestielt.be
steven debeuckelaere	steven.debeuckelaere@asz-aalst.be
steven sas	steven.sas@janpalfijngent.be
steven van avermaet	steven.vanavermaet@azsintjan.be
stijn vandenbranden	stijnvandenbranden@gmail.com
suzane ribeiro moura	suzane.ribeiromoura@uzgent.be
sybile van lierde	sybile.vanlierde@sezz.be
tania helleputte	tania.helleputte@uzgent.be
Thibaud Lamiroy	thibaud.lamiroy@ugent.be
thomas botelberge	thomas.botelberge@gza.be
Thomas Malfait	thomas.malfait@azdelta.be
thomas vanwolleghem	thomas.vanwolleghem@uza.be
tim rondou	timrondou@hotmail.com
tom boterberg	tom.boterberg@ugent.be
tom holvoet	t.holvoet@ugent.be
triana lobaton	triana.lobatonortega@uzgent.be
Vanlangenhove Peter	Peter.Vanlangenhove@UZGENT.be
veerle casneuf	veerlecasneuf@hotmail.com
Veerle Casneuf	veerle.casneuf@olvz-aalst.be
veronique buyse	veroniquebuyse@hotmail.com
veronique verdonck	dr.verdonck@sjk.be
vincent bouderez	vincentbouderez@hotmail.com
Vincent Bouderez	vincent.bouderez@azmmsj.be
vincent de wilde	vincent.dewilde@azsintjan.be
Vincent Van Maele	vincent.van.maele@telenet.be
walter pauwels	walter.pauwels@azstlucas.be
willem van ganse	willem.van.ganse@skynet.be
willy deloof	willy.deloof@skynet.be
willy van germeersch	rietvangermeersch@skynet.be
wim ceelen	wim.ceelen@ugent.be
Wouter Van Moerkercke	wouter.vanmoerkercke@azgroeninge.be
xavier verhelst	xavierverhelst@gmail.com
Xavier Verhelst	xavier.verhelst@ugent.be
yves van nieuwenhove	yves.vannieuwenhove@ugent.be
yves-paul van de wynckel	yvespaul.vandewynckel@ugent.be
zuzana plankova	zuzana.plankova@ugent.be
Nele coulier nele.coulier@seauton-international.be


";

preg_match_all("(\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b)",
    $string,
    $out);

//print_r($out[0]);

$emailList = new emailList;

$emails = $out[0];

//print_r($emails);



//preregister add

$preRegister = new preRegister;

$preRegisterOutput = $preRegister->Load_records_limit(70, $x=0);

print_r($preRegisterOutput);

foreach ($preRegisterOutput as $key=>$value){


  
  

    //echo $value;
    //$emailList->New_emailList($value['name'],null,$value['email']);
  echo $emailList->prepareStatementPDO();

  
  //$emailList->New_emailList(null,null,$value);
  //echo $emailList->prepareStatementPDO();


}


//foreach loop to add to database //TODO

//UZG Mail list as array below

//Array ( [0] => Array ( [0] => aglaja.depauw@ugent.be [1] => an_pieters@hotmail.com [2] => a.beckers@azsav.be [3] => andre.beckers@skynet.be [4] => andre.elewaut@skynet.be [5] => andre.m.mast@gmail.com [6] => andrew.crape@telenet.be [7] => andrew.crape@ziekenhuiswaregem.be [8] => secretariaat.anesthesie@ugent.be [9] => anja.geerts@ugent.be [10] => ann.deknibber@telenet.be [11] => ann.elewaut@skynet.be [12] => ann.elewaut@azgroeninge.be [13] => ann.reekmans@asz-aalst.be [14] => anneleen.deboth@gmail.com [15] => annelien_van_driessche@hotmail.com [16] => anneliesholvoet@yahoo.com [17] => astrid.dezutter@ugent.be [18] => barbara.claerhout@azalma.be [19] => barbara1dhooghe@gmail.com [20] => willandt.barbara@hotmail.com [21] => bart.sierens@azalma.be [22] => bart.vanbesien@yperman.net [23] => bartvanimschoot@telenet.be [24] => bart.vanimschoot@azglorieux.be [25] => bart.vanoverberghe@sezz.be [26] => bea.berghmans@sezz.be [27] => beatrijs_strubbe@yahoo.com [28] => beatrijs.strubbe@olvz-aalst.be [29] => benoit.nolf@asz-aalst.be [30] => b_nolf@hotmail.com [31] => bieke.lambert@ugent.be [32] => bjorn.ghillemijn@werken-glorieux.be [33] => bruno.vanduyfhuys@azalma.be [34] => bruno.vermeersch@azalma.be [35] => bruno.waked@ugent.be [36] => carolien.beyls@azoudenaarde.be [37] => celine.debeuckelaere@gmail.com [38] => chantal.baertsoen@sintandriestielt.be [39] => talltje@hotmail.com [40] => charlotte.devloo@azdelta.be [41] => chris.braxel@telenet.be [42] => christian.feys@yperman.net [43] => christophe.george@azgroeninge.be [44] => christophe.schoonjans@ugent.be [45] => christophe.snauwaert@hotmail.com [46] => ccvsteen@hotmail.com [47] => christophe.vansteenkiste@azmmsj.be [48] => clara.thienpont@zna.be [49] => claude.cuvelier@ugent.be [50] => danny.delooze@ugent.be [51] => david.tate@uzgent.be [52] => Ruth.DeBruyne@UZGENT.be [53] => Marc.DeMan@UZGENT.be [54] => Johan.Decruyenaere@uzgent.be [55] => luc.defreyne@uzgent.be [56] => Louke.Delrue@UZGENT.be [57] => denis.marichal@azstlucas.be [58] => dmarichal@yahoo.com [59] => didier.baert@azmmsj.be [60] => diederikdooremont@yahoo.com [61] => diederik_persyn@hotmail.com [62] => dirk.de.pooter@skynet.be [63] => dirkvdputte@skynet.be [64] => dirk.van.gysegem@telenet.be [65] => dirk.voet@ugent.be [66] => dominiek.de.wulf@telenet.be [67] => Dominiek.dewulf@azdelta.be [68] => donald.claeys@azmmsj.be [69] => eduard.callebout@uzgent.be [70] => elisabeth.vandekerckhove@ugent.be [71] => elsmonsaert@yahoo.com [72] => els.monsaert@azmmsj.be [73] => ercan.cesmeli@telenet.be [74] => ercan.cesmeli@azstlucas.be [75] => ehalet@hotmail.com [76] => erik.vanderstraeten@azmmsj.be [77] => evelien.christiaens@olvz-aalst.be [78] => evelynededecker@hotmail.com [79] => filip.baert@azdelta.be [80] => filip.demaeyer@ugent.be [81] => filip.sermon@olvz-aalst.be [82] => filip.vandermeersch@asz-aalst.be [83] => florence.anne@ugent.be [84] => francis.weyn@azlokeren.be [85] => francois.dheygere@azgroeninge.be [86] => fmarolleau@hotmail.com [87] => frankhuble@yahoo.com [88] => f.vanfraeyenhove@yahoo.com [89] => f.vandenbussche@azsav.be [90] => frederick.dochy@ugent.be [91] => frederik.berrevoet@ugent.be [92] => fdclerck@hotmail.com [93] => Karen.Geboes@UZGENT.be [94] => geertruic@hotmail.com [95] => geertrui.coppens@olvz-aalst.be [96] => georges.blinder@zna.be [97] => gilbert.ghillebert@azdelta.be [98] => gghillebert@azdelta.be [99] => lieve.du.ville@olvz-aalst.be [100] => lieveduville@skynet.be [101] => dr.eeckhout@telenet.be [102] => gudrun.cornelis@gmail.com [103] => guido.de.schrijver@telenet.be [104] => gdeboever@azdamiaan.be [105] => guido.spanoghe@aznikolaas.be [106] => guy.coutant@skynet.be [107] => hannes.ruymbeke@ugent.be [108] => hannesvanwynsberghe@hotmail.com [109] => hans.orlent@azsintjan.be [110] => hans.vanvlierberghe@ugent.be [111] => naessens.neven@skynet.be [112] => harald.peeters@azstlucas.be [113] => helena.degroote@ugent.be [114] => hendrik.pennoit@telenet.be [115] => hendrik.reynaert@uzbrussel.be [116] => hubert.piessevaux@uclouvain.be [117] => ingrid.bruggeman@janpalfijngent.be [118] => ingrid.buytaert@telenet.be [119] => isabelle.colle@ASZ.be [120] => isabelle.dekock@uzgent.be [121] => isabelle.ruytjens@zna.be [122] => ivo.duysburgh@aznikolaas.be [123] => ivo.duysburgh@pandora.be [124] => jacques.huyghe@skynet.be [125] => jacquesmialagae@telenet.be [126] => jacques.vanhuysse@azsintjan.be [127] => jan.beyls@sintandriestielt.be [128] => jan.hulstaert@pandora.be [129] => proesmans.suy@skynet.be [130] => jean-louis.coenegrachts@jessazh.be [131] => jef.dewyspelaere@azdelta.be [132] => jeoffrey.schouten@aznikolaas.be [133] => jeroen.geldof@ugent.be [134] => jeroen.lenz@zna.be [135] => jdecaestecker@azdelta.be [136] => jochen.decaestecker@azdelta.be [137] => johan.vanongeval@azstlucas.be [138] => jo.vandervoort@olvz-aalst.be [139] => johan.verhofstadt@azsintblasius.be [140] => jar@stlucas.be [141] => dutrejoris@hotmail.com [142] => joris.stubbe@azsintjan.be [143] => jurgen.almey@uzgent.be [144] => keizerkarel@skynet.be [145] => karel.dekeyser@aznikolaas.be [146] => dekeukeleirekatrien@mac.com [147] => katrien.lecluyse@azoudenaarde.be [148] => katrien.vanrenterghem@ugent.be [149] => katrien.vandenbroucke@sjki.be [150] => kennyvlaemynck@hotmail.com [151] => koen.gorleer@aznikolaas.be [152] => koen.hendrickx@olvz-aalst.be [153] => koen.rasquin@azmmsj.be [154] => koen.thorrez@yperman.net [155] => koen.van.dycke@azzeno.be [156] => vibeke.kruse@uzgent.be [157] => lara.crape@ugent.be [158] => laura.coremans@ugent.be [159] => laure.nuytemans@ugent.be [160] => Stephanie.Laurent@UZGENT.be [161] => leo.vanalsenoy@aznikolaas.be [162] => liesbeth.ferdinande@ugent.be [163] => lieselot.baert@ugent.be [164] => allaert.lieven@yperman.net [165] => lieven.vandeputte@azsintjan.be [166] => dr.vandeputte@belgacom.net [167] => lisa.crape@ugent.be [168] => vandenabeele.lisbeth@gmail.com [169] => lobkedesomer@gmail.com [170] => louis.verbist@zna.be [171] => louise.krott@ugent.be [172] => botelberge@skynet.be [173] => luc.harlet@azdelta.be [174] => luc.lepoutre@olvz-aalst.be [175] => luc.lepoutre@skynet.be [176] => luc.terriere@skynet.be [177] => luc.verstraete@sezz.be [178] => lynn_debels@hotmail.com [179] => maaike.pauwels@ugent.be [180] => maartenmlk@hotmail.com [181] => maggy.osselaer@zna.be [182] => marc.cardon@skynet.be [183] => marc.delatere@telenet.be [184] => marc.delatere@vzwgo.be [185] => marc.hamerijck@werken-glorieux.be [186] => marc.kint@azstlucas.be [187] => marc.peeters@uza.be [188] => marc.simoens@zna.be [189] => marc.van.outryve@skynet.be [190] => marc.verhamme@telenet.be [191] => marc.verhamme@azgroeninge.be [192] => maridi.aerts@uzbrussel.be [193] => marijkepaelinck@hotmail.com [194] => mark.remery@azoudenaarde.be [195] => marleen.hanssens@sezz.be [196] => marleen.praet@ugent.be [197] => martine.devos@ugent.be [198] => Lucas.Matthyssens@UZGENT.be [199] => michael.fried@zna.be [200] => michel.deruyttere@skynet.be [201] => micheline.tresinie@azsintjan.be [202] => mieke.deceuninck@azstvdeinze.be [203] => mcool@azdamiaan.be [204] => miranda.withofs@jessazh.be [205] => moni.mussche@gmail.com [206] => myriam.vanwinckel@ugent.be [207] => nadia.struyf@klina.be [208] => nancyvandamme@hotmail.com [209] => nataliestoens@belgacom.net [210] => nathalie.meireson@yahoo.com [211] => nele.deprez@ugent.be [212] => pascal.peeters@jessazh.be [213] => patrickborgers@belgacom.net [214] => patrick.pauwels@uza.be [215] => patrick.schoenaers@azalma.be [216] => paul.desmidt@janpalfijngent.be [217] => paul.hoste@azalma.be [218] => peter.burvenich@azmmsj.be [219] => peter.buydens@asz-aalst.be [220] => p.cochez@azsav.be [221] => dr.potvin@sjk.be [222] => philippe.van.hootegem@stlucas.be [223] => pvanhootegem@stlucas.be [224] => philippe.vanbiervliet@azoudenaarde.be [225] => philippe.vergauwe@azgroeninge.be [226] => pierre.gigase@zna.be [227] => gastro-enterologie@azsintjan.be [228] => piet.baetens@asz-aalst.be [229] => piet_baetens@telenet.be [230] => piet.pattyn@ugent.be [231] => pietsteger@telenet.be [232] => pieterdewint@hotmail.com [233] => dobbelspieter@hotmail.com [234] => pieter.hindryckx@ugent.be [235] => pieter.pletinckx@azmmsj.be [236] => pieter.van.der.spek@olvz-aalst.be [237] => pieter.vandecandelaere@azdelta.be [238] => renaat.schoonjans@azglorieux.be [239] => renaat.schoonjans@werken-glorieux.be [240] => roberto.troisi@ugent.be [241] => rogerfils@skynet.be [242] => Xavier.Rogiers@UZGENT.be [243] => roland.casneuf@skynet.be [244] => roland.vermeeren@telenet.be [245] => ronald.milo@skynet.be [246] => sander.lefere@ugent.be [247] => sander.smeets@ugent.be [248] => sarah.raevens@ugent.be [249] => sebastien.kindt@sezz.be [250] => serge.naegels@zna.be [251] => sigrid.mareels@vzwgo.be [252] => Peter.Smeets@UZGENT.be [253] => sofie_decock11@hotmail.com [254] => sofiegosse@gmail.com [255] => sofie.rogge@azstlucas.be [256] => sofie_rogge@hotmail.com [257] => stefan.bourgeois@zna.be [258] => stefan.vanlangendonck@gmail.com [259] => stephaan.pollet@skynet.be [260] => stephanie.vanbiervliet@ugent.be [261] => steven.de.coninck@sintandriestielt.be [262] => steven.deconinck@sintandriestielt.be [263] => steven.debeuckelaere@asz-aalst.be [264] => steven.sas@janpalfijngent.be [265] => steven.vanavermaet@azsintjan.be [266] => stijnvandenbranden@gmail.com [267] => suzane.ribeiromoura@uzgent.be [268] => sybile.vanlierde@sezz.be [269] => tania.helleputte@uzgent.be [270] => thibaud.lamiroy@ugent.be [271] => thomas.botelberge@gza.be [272] => thomas.malfait@azdelta.be [273] => thomas.vanwolleghem@uza.be [274] => timrondou@hotmail.com [275] => tom.boterberg@ugent.be [276] => t.holvoet@ugent.be [277] => triana.lobatonortega@uzgent.be [278] => Peter.Vanlangenhove@UZGENT.be [279] => veerlecasneuf@hotmail.com [280] => veerle.casneuf@olvz-aalst.be [281] => veroniquebuyse@hotmail.com [282] => dr.verdonck@sjk.be [283] => vincentbouderez@hotmail.com [284] => vincent.bouderez@azmmsj.be [285] => vincent.dewilde@azsintjan.be [286] => vincent.van.maele@telenet.be [287] => walter.pauwels@azstlucas.be [288] => willem.van.ganse@skynet.be [289] => willy.deloof@skynet.be [290] => rietvangermeersch@skynet.be [291] => wim.ceelen@ugent.be [292] => wouter.vanmoerkercke@azgroeninge.be [293] => xavierverhelst@gmail.com [294] => xavier.verhelst@ugent.be [295] => yves.vannieuwenhove@ugent.be [296] => yvespaul.vandewynckel@ugent.be [297] => zuzana.plankova@ugent.be ) )


//Mailer(array(0 => 'david.tate@uzgent.be'), $subject, '/assets/email/emailTemplateInline.html');

//UNCOMMENT THIS LINE TO SEND

//Mailer($emails, $subject, '/assets/email/emailTemplateInline.html');
//Mailer($emailArray, $subject, '/assets/email/emailTemplateInline.html');
//then can use myArray here











	
?>

</div>
    </body>
    </html>


