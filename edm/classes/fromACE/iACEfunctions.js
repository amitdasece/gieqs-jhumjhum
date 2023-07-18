//js file containing common iACE functions



function determineSERT (SizeRaw, Dysplasia, IPBleed) {
    
	if ((SizeRaw === null) || (Dysplasia === null) || (IPBleed ===null)){
		
		SERT = '-';
		return SERT;
		
	}else{
		
		var HGD = +Dysplasia;
			var Size = +SizeRaw;
			var IPB = +IPBleed;
			var SERT = null;
			var SERTHGD = null;
			var SERTIPB = null;
			var SizeSERT = null;
		
			if (isNaN(HGD) || isNaN(Size) || isNaN(IPB)){

				SERT = '-';
				return SERT;

			}else{
		
		
					if (HGD === 2 || HGD === 3) {
							SERTHGD = 1;
						} else if (HGD === 1 || HGD === 0) {
							SERTHGD = 0;}

						if (IPB === 1) {
							SERTIPB = 1;
						}else {
							SERTIPB = 0;
						}  //change this in the lesion file

						// convert size to 0 <40 1 >=40
						if (Size < 40) {
							SizeSERT = 0; }
						else if (Size >= 40){SizeSERT = 2;}


							SERT = (SERTHGD + SizeSERT + SERTIPB);

					return SERT;
			}
	}
};

function determineSMSA (lesionID) {
			var Size = $("#Size").val();  //data.[x].Size where lesionID is _k_lesion
			var Morphology = $("#Paris").val(); //data.[x].Paris where lesionID is _k_lesion
			var Access = $("#Access").val();	//data.[x].Access where lesionID is _k_lesion
			var Site = $('#Location').val();	//data.[x].Location where lesionID is _k_lesion


			if (Size < 10) {
				var SMSA_size = 1;
			}else if(Size >= 10 && Size < 20) {
				var SMSA_size = 3;	
			}else if(Size >= 20 && Size < 30) {
				var SMSA_size = 5;	
			}else if(Size >= 30 && Size < 40) {
				var SMSA_size = 7;	
			}else if(Size >= 40) {
				var SMSA_size = 9;	
			}

			if (Morphology == 3) {
				var SMSA_morphology = 3;
			}else if (Morphology != null){
				var SMSA_morphology = 2;
			}

			if (Site < 5){
				var SMSA_site = 1;
			}else if(Site >= 5) {
				var SMSA_site = 2;	
			}

			if (Access == 0){
				var SMSA_access = 1;
			}else if(Access == 1 || Access == 2 || Access == 3) {
				var SMSA_access = 3;	
			}


				var smsaScore = +SMSA_size + +SMSA_morphology + +SMSA_site + +SMSA_access;

				if (smsaScore == 4 || smsaScore == 5){ var smsaGroup = 1;}
				if (smsaScore > 5 && smsaScore < 10){ var smsaGroup = 2;}
				if (smsaScore > 8 && smsaScore < 13){ var smsaGroup = 3;}
				if (smsaScore > 12){ var smsaGroup = 4;}

				//$('#SMSA').html('SMSA score is '+smsaScore);
				//$('#AdminMorphError').html('SMSA group is '+smsaGroup);

				//console.log(smsaScore);


			if (smsaScore != null) {
				
			  // maybe return array SMSA=>1 , smsaGroup=>etc
				return smsaScore;
			}
			else {
				return null;
			}
	
	
    }; 

		function determineCOVERT (location, morphology, paris) {
			
			if ((location === null) || (morphology === null) || (paris ===null)){
		
				COVERT = '-';
				return COVERT;

			}else{
				
				
				var locationInt = +location;
				var morphologyInt = +morphology;
				var parisInt = +paris;
				
				
				if (isNaN(locationInt) || isNaN(morphologyInt) || isNaN(parisInt)){

				COVERT = '-';
				return COVERT;

				}else{
				
				
				var locationCategory;
				var morphologyCategory;

				//need colon site
				//need morphology
				//need paris

				//convert to the required format

				//location proximal 9-13 others distal //category 1 distal 2 proximal

				
				if (locationInt < 9){
					locationCategory = 1;
				}else{
					locationCategory = 2;
				}
					
				if (morphologyInt == 1){
					
					morphologyCategory = 1; //granular
				}else if (morphologyInt == 2){
					
					morphologyCategory = 2; // non-granular
					
				}else if (morphologyInt > 2){  //can't calculate the score as serrated and mixed not supported
					
					COVERT = '-';
					return COVERT;
					
				}
					
					
				if (parisInt == 2){
					
					parisCategory = 1; // 0-IIa
					
				}else if (parisInt == 6){
					
					parisCategory = 2; // 0-IIa/Is
					
				}else if (parisInt == 1){
					
					parisCategory = 3; //0-Is
					
				}else{ // unsupported Paris class
					
					COVERT = '-';
					return COVERT;
				}	
			
			
				//now have categorical variables available only if they are correct type for this score	
					
				if (locationCategory == 2 && morphologyCategory == 1 && parisCategory == 1){
					
					COVERT = '0.7%';
				}else if (locationCategory == 1 && morphologyCategory == 1 && parisCategory == 1){
					
					COVERT = '1.2%';
				}else if (locationCategory == 2 && morphologyCategory == 1 && parisCategory == 2){
					
					COVERT = '4.2%';
				}else if (locationCategory == 1 && morphologyCategory == 1 && parisCategory == 2){
					
					COVERT = '10.1%';
				}else if (locationCategory == 2 && morphologyCategory == 1 && parisCategory == 3){
					
					COVERT = '2.3%';
				}else if (locationCategory == 1 && morphologyCategory == 1 && parisCategory == 3){
					
					COVERT = '5.7%';
				}else if (locationCategory == 2 && morphologyCategory == 2 && parisCategory == 1){
					
					COVERT = '3.8%';
				}else if (locationCategory == 1 && morphologyCategory == 2 && parisCategory == 1){
					
					COVERT = '6.4%';
				}else if (locationCategory == 2 && morphologyCategory == 2 && parisCategory == 2){
					
					COVERT = '12.7%';
				}else if (locationCategory == 1 && morphologyCategory == 2 && parisCategory == 2){
					
					COVERT = '15.9%';
				}else if (locationCategory == 2 && morphologyCategory == 2 && parisCategory == 3){
					
					COVERT = '12.3%';
				}else if (locationCategory == 1 && morphologyCategory == 2 && parisCategory == 3){
					
					COVERT = '21.4%';
				}				
					
				return COVERT;	
					
				}
			
			}
			
			//surely there should be a version involving size...
		}

	
	
	function inPROSPER (lesionArray) {
		
		if (lesionArray.inPROSPER == '1'){
			return 'Yes';
		}else {
			return 'No';
		}
		
	}
	
	function inCLIP (lesionArray) {
		
		if (lesionArray.CLIP_category == '1'){
			return 'Yes, Active Arm';
		}else if (lesionArray.CLIP_category == '2') {
			return 'Yes, Null Arm';
		}else{
			
			return '';
		}
		
	}
	
	function determineSMSAEMR () {
		
		
		
		
		
		
	}
	
	function determineBleedScore () {
		
		
		
		
		
		
	}
	
	function determineGastricESDCategory (LesionSize, Ulceration, R0, Histology, Differentiation, SMI, SMIDepth, LVI, MarginHorizPos, MarginVerticalPos) {
		
		
		/*
			
			
			Ulceration 1 0 
			R0 1 0
			Histology 1 LGD 2 HGD/IMC 3 Invasive
			Differentiation 1 Poor 2 Well
			SMI 0 no 1 yes
			SMIDepth 1 sm1 2 sm2 3 sm3
			LVI 0 no 1 yes
			MarginHorizPos 0 no 1 yes
			MarginVerticalPos 0 no 1 yes
			
			
			
			*/
		
		//ensure none of the variables are missing, if they are exit
		
		if (arguments.length < 10){
			
			return 'Please supply correct number of arguments';
			
		}
		
		var HistologyCriteria = '';
		var Size = +LesionSize;
		
		
		
		if ((Size <= 20) && (Ulceration == '0') && (R0 == '1') && (Histology == '2') && (Differentiation == '2') && (SMI == '0') && (LVI == '0')){
			
			HistologyCriteria = 1;
			
		}
		
		if ((Histology > 1) && (Ulceration == '0' || (Ulceration == '1' && Size <= 30)) && (R0 == '1' || (R0 == '0' && MarginVerticalPos == '0' && MarginHorizPos == '1')) && (Differentiation == '2' || (Differentiation == '1' && Size <= 20)) && (SMI == '0' || (SMI == '1' && SMIDepth == '1' && Size <= 30)) && (LVI == '0') && (HistologyCriteria == '')){
			
			HistologyCriteria = 2;
			
		}
		
		if ((Histology == 1) && (HistologyCriteria == '')){
			
			
			HistologyCriteria = 3;
			
		}
		
		if (HistologyCriteria == '') {
			
			HistologyCriteria =4;
			
		}
		
		return HistologyCriteria;
		
		
		//determine each ESD category in turn
		
		// Absolute criteria is the strictest		
		
		
		
		
		
	}
	
	function surveillanceCheck (cellText, column, ProcedureDate, calcSurvDate){
		
		var returnText = '';
		
		//2w check FollowUp2Weeks
		
		if (column == 'FollowUp2Weeks'){
			
			if (cellText == '' || cellText == '0' || cellText == null){
				
				if (dateDifferenceDue(thirtyDay(ProcedureDate)) == 1){
					
					returnText += '<span style="color:red">'+thirtyDay(ProcedureDate)+' </span>';
					
				}else if (dateDifferenceDue(thirtyDay(ProcedureDate)) == 0){
					
					returnText += thirtyDay(ProcedureDate);
					
				}
				
				//if predicted date less than date today write Due in red
				// else due
				
			}else if (cellText == '1' || cellText == '2'){
				
				returnText += 'done';
				
			}
			
			
			
		}
		if (column == 'DelayedBleed'){
			
			if (cellText == '' || cellText == null){
				
				if (dateDifferenceDue(thirtyDay(ProcedureDate)) == 1){
					
					returnText += '<span style="color:red">'+thirtyDay(ProcedureDate)+' </span>';
					
				}else if (dateDifferenceDue(thirtyDay(ProcedureDate)) == 0){
					
					returnText += thirtyDay(ProcedureDate);
					
				}
				
				//if predicted date less than date today write Due in red
				// else due
				
			}else {
				
				returnText += 'done';
				
			}
			
			
			
		}
		if (column == 'FirstFU'){
			
			if (cellText == '' || cellText == '0' || cellText == null){
				
				if (dateDifferenceDue(calcSurvDate) == 1){
					
					returnText += '<span style="color:red">'+calcSurvDate+' </span>';
					
				}else if (dateDifferenceDue(calcSurvDate) == 0){
					
					returnText += calcSurvDate;
					
				}
				
				//if predicted date less than date today write Due in red
				// else due
				
			}else {
				
				returnText += 'done';
				
			}
			
			
			
		}
		
		//if FirstFU is missing
		
		//display due date
		
		// else display done
		
		
		return returnText;
		
		
		
	}
	
	function monthAdd(date, month) {
		
		date = new Date(date);
		var temp = date;
		temp = new Date(date.getFullYear(), date.getMonth(), 1);
		temp.setMonth(temp.getMonth() + (month + 1));
		temp.setDate(temp.getDate() - 1); 

		if (date.getDate() < temp.getDate()) { 
			temp.setDate(date.getDate()); 
		}

		return temp;    
	}
	
	
	function dateDifference (targetDate) {
		
		
		dateDiff = dateToday - targetDate;
		
		return dateDiff;  //months until surveillance
		
		
	}
	
	
	function dateDifferenceDue (targetDate) {
		//surveillance due?
		
		 var d = new Date();
		
		 targetDate = new Date(targetDate);
		
		dateDiff = targetDate - d;
		//console.log(dateDiff);
		
		if (dateDiff >= 0){
			
			//surveillance not due
			return '0';
			
		} else if (dateDiff < 0){
			
			//surveillance due
			return '1';
			
		}
		
		
	}
	
	function calculateSurveillanceDate (ProcedureDate, intervalMonths){
		
		
		targetDate = monthAdd(ProcedureDate, intervalMonths);
		
		
		
	}
	
	
	function thirtyDay (ProcedureDate){
		
		
		
			
			
				
				var thirtyDaydate = monthAdd(ProcedureDate, 1);
				
		
		try {
		return moment(thirtyDaydate).format("D MMM YYYY");
		}
		catch(err){
		return 'Cannot determine';	
		}
		
		
	}
	
	function calculateSC1 (ProcedureDate, inPROSPER, SERT){
		
		
		if (inPROSPER == '1'){
			
			if (+SERT > 0){
				
				var SC1date = monthAdd(ProcedureDate, 6);
				
			}else if (+SERT == 0){
				
				var SC1date = monthAdd(ProcedureDate, 18);
			}
			
			
		}else {
			
			
			var SC1date = monthAdd(ProcedureDate, 6);
			
		}
		
		try {
		return moment(SC1date).format("D MMM YYYY");
		}
		catch(err){
			
		return 'Cannot determine';	
		}
		
		
	}
	
	function calculateSC2 (ProcedureDate, inPROSPER, SERT){
		
		
		if (inPROSPER == '1'){
			
			if (+SERT > 0){
				
				var SC2date = monthAdd(ProcedureDate, 18);
				
			}else if (+SERT == 0){
				
				var SC2date = monthAdd(ProcedureDate, 36);
			}
			
			
		}else {
			
			
			var SC2date = monthAdd(ProcedureDate, 18);
			
		}
		
		try {
		return moment(SC2date).format("D MMM YYYY");
		}
		catch(err){
			
		return 'Cannot determine';	
		}
		
		//return SC2date;
		
	}
	
	function calculateSC3 (ProcedureDate, inPROSPER, SERT){
		
		
		if (inPROSPER == '1'){
			
			if (+SERT > 0){
				
				var SC3date = monthAdd(ProcedureDate, 48);
				
			}else if (+SERT == 0){
				
				var SC3date = monthAdd(ProcedureDate, 72);
			}
			
			
		}else {
			
			
			var SC3date = monthAdd(ProcedureDate, 48);
			
		}
		
		try {
		return moment(SC3date).format("D MMM YYYY");
		}
		catch(err){
			
		return 'Cannot determine';	
		}
		
		//return SC3date;
		
	}
	
	function calculateSC4 (ProcedureDate, inPROSPER, SERT){
		
		
		if (inPROSPER == '1'){
			
			if (+SERT > 0){
				
				var SC4date = monthAdd(ProcedureDate, 108);
				
			}else if (+SERT == 0){
				
				var SC4date = monthAdd(ProcedureDate, 132);
			}
			
			
		}else {
			
			
			var SC4date = monthAdd(ProcedureDate, 108);
			
		}
		
		try {
		return moment(SC4date).format("D MMM YYYY");
		}
		catch(err){
			
		return 'Cannot determine';	
		}
		
		//return SC4date;
		
	}
