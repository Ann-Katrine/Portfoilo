function test(){
	hide();
	sidebar();
	hjemCSharp();
	showAlleOpgaver(0);
}

function hjemCSharp(){
	Opgaver("hjemmesideOpgaver", "start");
	Opgaver("cSharpOpgaver", "start1")
}

var LastId = 0;

/* checkbox  i HTML-filen */
let arrayCheckbox = ["box1", "box2", "underbox0", "underbox1"]; /* GEM DEN! -----------------------*/

/* sprog i HTML-filen */
let arrayCheckBoxSprog = ["sprogBox0", "sprogBox1", "sprogBox2", "sprogBox3", "sprogBox4", "sprogBox5"];

/* id i HTML-filen */

let arrayId = ["start", "start1", "alene", "gruppe", "aleneHjem", "aleneCSharp", "gruppeHjem", "gruppeCSharp", "sprog"];

/*let arrayId = ["start", "start1", "alene", "gruppe"];*/

/* område i HTML-filen */
let arrayOmraade = ["projekter", "type", "sprog"];

let arraySprog = ["C#", "HTML", "CSS", "PHP", "Javascript", "MySQL"];

let arrayOprettet = [0, 0, 0, 0, 0, 0, 0, 0];

function getDGEBI(checbox){
	return document.getElementById(checbox);	
}

function showAlleOpgaver(id){
	// C#
	if(getDGEBI(arrayCheckbox[1]) && getDGEBI(arrayCheckbox[1]).checked === true && id == "box2")
	{
		if(getDGEBI(arrayCheckbox[2]).checked === true ){
			console.log(" c# alene");
			projekterAndType(id, 1, arrayId[5]); 
			getDGEBI(arrayCheckbox[0]).checked = false; //
			if(arrayOprettet[5] == 0){
				Opgaver("AleneCSharp", "aleneCSharp");
				arrayOprettet[5] = 1;
			} //
		}
		else if(getDGEBI(arrayCheckbox[3]).checked === true){
			console.log(" c# gruppe");
			projekterAndType(id, 1, arrayId[7]);
			getDGEBI(arrayCheckbox[0]).checked = false;
			if(arrayOprettet[7] == 0){
				Opgaver("gruppeCSharp", "gruppeCSharp");
				arrayOprettet[7] = 1;
			}
		}
		else{
			console.log("C#");
			projekterAndType(id, 0, arrayId[1]);
			getDGEBI(arrayCheckbox[0]).checked = false;	
			//getDGEBI(arrayCheckbox[1]).checked = true|false;
		}
	}
	// hjemmeside
	else if(getDGEBI(arrayCheckbox[0]) && getDGEBI(arrayCheckbox[0]).checked === true && id == "box1")
	{
		if(getDGEBI(arrayCheckbox[2]).checked === true ){
			console.log(" hjemmeside alene");
			projekterAndType(id, 1, arrayId[4]);
			getDGEBI(arrayCheckbox[1]).checked = false;
			if(arrayOprettet[4] == 0){
				Opgaver("AleneHjem", "aleneHjem");
				arrayOprettet[4] = 1;
			}
		}
		else if(getDGEBI(arrayCheckbox[3]).checked === true){
			console.log(" hjemmside gruppe");
			getDGEBI(arrayCheckbox[1]).checked = false;
			projekterAndType(id, 1, arrayId[6]);
			if(arrayOprettet[6] == 0){
				Opgaver("gruppeHjem", "gruppeHjem");
				arrayOprettet[6] = 1;
			}
		
		}
		else{
			console.log("hjemmeside");
			getDGEBI(arrayCheckbox[1]).checked = false;
			projekterAndType(id, 0, arrayId[0]);
		}
	}
	//alene
	else if(getDGEBI(arrayCheckbox[2]) && getDGEBI(arrayCheckbox[2]).checked === true && id == "underbox0")
	{
		if(getDGEBI(arrayCheckbox[1]).checked === true)
		{
			console.log("alene c#");
			getDGEBI(arrayCheckbox[3]).checked = false;
			projekterAndType(id, 1, arrayId[5]);
			if(arrayOprettet[5] == 0){
				Opgaver("AleneCSharp", "aleneCSharp");
				arrayOprettet[5] = 1;
			}
		}
		else if(getDGEBI(arrayCheckbox[0]).checked === true)
		{
			console.log("alene html");
			getDGEBI(arrayCheckbox[3]).checked = false;
			projekterAndType(id, 1, arrayId[4]);
			if(arrayOprettet[4] == 0){
				Opgaver("AleneHjem", "aleneHjem");
				arrayOprettet[4] = 1;
			}
		}
		else
		{
			console.log("alene");
			projekterAndType(id, 1, arrayId[2]);
			getDGEBI(arrayCheckbox[3]).checked = false;
			if(arrayOprettet[2] == 0){
				Opgaver("AlleOpgaverAlene", "alene");
				arrayOprettet[2] = 1;
			}
		}
	}
	// gruppe
	else if(getDGEBI(arrayCheckbox[3]) && getDGEBI(arrayCheckbox[3]).checked === true && id == "underbox1")
	{
		if(getDGEBI(arrayCheckbox[0]).checked === true)
		{
		    console.log("gruppe c#");
			getDGEBI(arrayCheckbox[2]).checked = false;
			projekterAndType(id, 1, arrayId[7]);
		}
		else if(getDGEBI(arrayCheckbox[1]).checked === true){
			console.log("gruppe html");
			getDGEBI(arrayCheckbox[2]).checked = false;
			projekterAndType(id, 1, arrayId[6]);
		}
		else
		{
			console.log("gruppe");
			getDGEBI(arrayCheckbox[2]).checked = false;
			projekterAndType(id, 1, arrayId[3]);
			if(arrayOprettet[3] == 0){
				Opgaver("AlleOpgaverGruppe", "gruppe");
				arrayOprettet[3] = 1;
			}
		}
	} 
	// C#
	else if(getDGEBI(arrayCheckbox[1]) && getDGEBI(arrayCheckbox[1]).checked === true && LastId == "box2")
	{
		if(getDGEBI(arrayCheckbox[2]).checked === true){
			console.log(" c# alene");
			getDGEBI(arrayCheckbox[0]).checked = false;
			projekterAndType(id, 1, arrayId[5]);
		}
		else if(getDGEBI(arrayCheckbox[3]).checked === true){
			console.log(" c# gruppe");
			getDGEBI(arrayCheckbox[0]).checked = false;
			projekterAndType(id, 1, arrayId[7]);
		}
		else{
			console.log("C#");
			getDGEBI(arrayCheckbox[0]).checked = false;
			projekterAndType(id, 0, arrayId[1]);
		}
	}
	// hjemmside
	else if(getDGEBI(arrayCheckbox[0]) && getDGEBI(arrayCheckbox[0]).checked === true && LastId == "box1")
	{
		if(getDGEBI(arrayCheckbox[2]).checked === true ){
			console.log(" hjemmeside alene");
			getDGEBI(arrayCheckbox[1]).checked = false;
			projekterAndType(id, 1, arrayId[4]);
		}
		else if(getDGEBI(arrayCheckbox[3]).checked === true){
			console.log(" hjemmside gruppe");
			getDGEBI(arrayCheckbox[1]).checked = false;
			projekterAndType(id, 1, arrayId[6]);
		}
		else{
			console.log("hjemmeside");
			getDGEBI(arrayCheckbox[1]).checked = false;
			projekterAndType(id, 0, arrayId[0]);
		}
	}
	// alene
	else if(getDGEBI(arrayCheckbox[2]) && getDGEBI(arrayCheckbox[2]).checked === true && LastId == "underbox0")
	{
		if(getDGEBI(arrayCheckbox[1]).checked === true)
		{
			console.log("alene c#");
			getDGEBI(arrayCheckbox[3]).checked = false;
			projekterAndType(id, 1, arrayId[5]);
			if(arrayOprettet[5] == 0){
				Opgaver("AleneCSharp", "aleneCSharp");
				arrayOprettet[5] = 1;
			}
		}
		else if(getDGEBI(arrayCheckbox[0]).checked === true)
		{
			console.log("alene html");
			getDGEBI(arrayCheckbox[3]).checked = false;
			projekterAndType(id, 1, arrayId[4]);
			if(arrayOprettet[4] == 0){
				Opgaver("AleneHjem", "aleneHjem");
				arrayOprettet[4] = 1;
			}
		}
		else
		{
			console.log("alene");
			getDGEBI(arrayCheckbox[3]).checked = false;
			projekterAndType(id, 1, arrayId[2]);
			if(arrayOprettet[2] == 0){
				Opgaver("AlleOpgaverAlene", "alene");
				arrayOprettet[2] = 1;
			}
		}
	}
	// gruppe
	else if(getDGEBI(arrayCheckbox[3]) && getDGEBI(arrayCheckbox[3]).checked === true && LastId == "underbox1")
	{
		if(getDGEBI(arrayCheckbox[0]).checked === true)
		{
		   console.log("gruppe c#")
			getDGEBI(arrayCheckbox[2]).checked = false;
			projekterAndType(id, 1, arrayId[7]);
		}
		else if(getDGEBI(arrayCheckbox[1]).checked === true){
			console.log("gruppe html")
			getDGEBI(arrayCheckbox[2]).checked = false;
			projekterAndType(id, 1, arrayId[6]);
		}
		else
		{
			console.log("gruppe");
			getDGEBI(arrayCheckbox[2]).checked = false;
			projekterAndType(id, 1, arrayId[3]);
			if(arrayOprettet[3] == 0){
				Opgaver("AlleOpgaverGruppe", "gruppe");
				arrayOprettet[3] = 1;
			}
		}
	}
	else 
	{
		// hjemmeside
		if(getDGEBI(arrayCheckbox[0]) && getDGEBI(arrayCheckbox[0]).checked && LastId == "underbox0" || getDGEBI(arrayCheckbox[0]) && getDGEBI(arrayCheckbox[0]).checked && LastId == "underbox1" ){
			console.log("kun hjemmeside");
			getDGEBI(arrayCheckbox[1]).checked = false;
			projekterAndType(id, 0, arrayId(0));
		}
		// C#
		else if(getDGEBI(arrayCheckbox[1]) && getDGEBI(arrayCheckbox[1]).checked && LastId == "underbox0" || getDGEBI(arrayCheckbox[1]) && getDGEBI(arrayCheckbox[1]).checked && LastId == "underbox1"){
			console.log("kun C#");
			getDGEBI(arrayCheckbox[0]).checked = false;
			projekterAndType(id, 0, arrayId(1));
		}
		// alene
		else if(getDGEBI(arrayCheckbox[2]) && getDGEBI(arrayCheckbox[2]).checked && LastId == "box1" || getDGEBI(arrayCheckbox[2]) && getDGEBI(arrayCheckbox[2]).checked && LastId == "box2"){
			console.log("kun alene");
			getDGEBI(arrayCheckbox[3]).checked = false;
			projekterAndType(id, 1, arrayId[2]);
			if(arrayOprettet[2] == 0){
				Opgaver("AlleOpgaverAlene", "alene");
				arrayOprettet[2] = 1;
			}
		}
		// gruppe
		else if(getDGEBI(arrayCheckbox[3]) && getDGEBI(arrayCheckbox[3]).checked && LastId == "box1" || getDGEBI(arrayCheckbox[3]) && getDGEBI(arrayCheckbox[3]).checked && LastId == "box2"){
			console.log("kun Gruppe");
			getDGEBI(arrayCheckbox[2]).checked = false;
			projekterAndType(id, 1, arrayId[3]);
			if(arrayOprettet[3] == 0){
				Opgaver("AlleOpgaverGruppe", "gruppe");
				arrayOprettet[3] = 1;
			}
		}
		else if(getDGEBI(arrayCheckBoxSprog[0]) && getDGEBI(arrayCheckBoxSprog[0]).checked === true && id == "sprogBox0" || getDGEBI(arrayCheckBoxSprog[1]) && getDGEBI(arrayCheckBoxSprog[1]).checked === true && id == "sprogBox1" || getDGEBI(arrayCheckBoxSprog[2]) && getDGEBI(arrayCheckBoxSprog[2]).checked === true && id == "sprogBox2" || getDGEBI(arrayCheckBoxSprog[3]) && getDGEBI(arrayCheckBoxSprog[3]).checked === true && id == "sprogBox3" || getDGEBI(arrayCheckBoxSprog[4]) && getDGEBI(arrayCheckBoxSprog[4]).checked === true && id == "sprogBox4" || getDGEBI(arrayCheckBoxSprog[5]) && getDGEBI(arrayCheckBoxSprog[5]).checked === true && id == "sprogBox5"){
			programmeringSprog(id);
		}
		else{
			
			console.log("start");
			/* find mulig fix */
			getDGEBI(arrayId[0]).classList.remove("forsvind");
			getDGEBI(arrayId[1]).classList.remove("forsvind");
			getDGEBI(arrayOmraade[0]).classList.remove("forsvind");
			getDGEBI(arrayOmraade[1]).className = "forsvind";
			getDGEBI(arrayOmraade[2]).className = "forsvind";
		}
	}
	
	LastId = id;
	console.log(LastId + " = lastid");
	console.log("_____________");
}

let arrayProSprog = [];
let arrayProSprogTilstand = [false, false, false, false, false, false];

let arraySprogId = ["sprogBox0"];

function programmeringSprog(id){
	let antalCheckbox = arrayCheckBoxSprog.length;
	for(let i = 0; i < antalCheckbox; i++){
		if(getDGEBI(arrayCheckBoxSprog[i]) && getDGEBI(arrayCheckBoxSprog[i]).checked === true && id == arrayCheckBoxSprog[i]){
			if(arrayProSprogTilstand[i] == false)
			{
				arrayProSprog.push(arraySprog[i]);
				arrayProSprogTilstand[i] = true;
				let antalOpret = arrayProSprog.length;
				let sprog = "&q=";
				for(let j = 0; j < antalOpret; j++){
					sprog = sprog + arrayCheckbox[j] + ",";
				}
				sprog = sprog.substring(0, sprog.length-1);
				
				//$("#sprogBox0").empty()
				
				getDGEBI(arraySprogId[i]).innerHTML = "<div id='" + getDGEBI(arrayCheckBoxSprog[i]) + "'></div>";
				
				Opgaver("sprogBox" + sprog, arrayCheckBoxSprog[i]);
				console.log(arrayProSprog);
				
				//projekterAndType(id, 2, "sprogBox");
				console.log("hej");
			}
		}
		else if(LastId == arrayCheckBoxSprog[i] && getDGEBI(arrayCheckBoxSprog[i]).checked === false){
			delete arrayProSprog[i];
			arrayProSprogTilstand[i] = false;
			arrayProSprog = arrayProSprog.filter(function() { return true });
			
		}
	}	
}

/*
checkbox: er en værdi fra id
omraade: er et tal fr 0 til 2, der er lig med hvilken værdi i arrayOmraade
id: er en værdi fra arrayId
*/ // hjælp til værdi'erne
function projekterAndType(checkbox, omraade, id){
	// sæt forsvind og fjern forsvind
	let antalId = arrayId.length;
	for(let j = 0; j < antalId; j++){
		if(arrayId[j] == id){
			getDGEBI(arrayId[j]).classList.remove("forsvind");
			getDGEBI(arrayOmraade[omraade]).classList.remove("forsvind");
		}
		else
		{
			getDGEBI(arrayId[j]).className = "forsvind";
			
		}
	}
}

function Opgaver(projekt, plads){
	$.get("PHP/index.php?choice=" + projekt /* her */, function(data){
		let array = data.split("£");
		
		let newLine = document.createElement("div");
		let Temp = document.getElementById(plads); /* her */
		Temp.appendChild(newLine);
		newDiv = document.createElement("div");
		newDiv.className = "clearfix";
		newLine.appendChild(newDiv);
		
		array.forEach(function(index){
			let temp = index.split("'");
			
			let div = document.createElement("div");
			div.className = "flex-item";
			newDiv.appendChild(div);
			
			let img = document.createElement("img");
			img.className = "img";
			img. setAttribute("src", temp[0]);
			img.setAttribute("alt", temp[1]);
			div.appendChild(img);
			
			let overskrift = document.createElement("p");
			let navn = document.createTextNode(temp[2]);
			overskrift.appendChild(navn);
			div.appendChild(overskrift);
			
			let dato = document.createElement("p");
			dato.className = "dato mellemrum";
			let dagensDato = document.createTextNode(temp[3])
			dato.appendChild(dagensDato);
			div.appendChild(dato);
			
			let tekst = document.createElement("p");
			let alTekst = document.createTextNode(temp[4]);
			tekst.appendChild(alTekst);
			div.appendChild(tekst);
		});
	});
}