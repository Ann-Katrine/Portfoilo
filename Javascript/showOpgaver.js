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

// test ------------------------------------

/*let arrayId = ["projekter","type", .....];
let arrayCheckboc = ["box1", "box2", ..., "alene"...];


					 
if(hejbik(arrayCheckboc[1]).checked === true){
	hejbik(arrayCheckboc[7]).checked = false;
}

function hejbik(checbox){
	return document        .getElementById(checbox);	
}


for(let i = 0; i < arrayCheckboc.length(); i++){
	let checkbox = hejbik(arrayCheckboc[i]);
	
	for(let j = 0; j < arrayCheckboc.length(); j++){
		if(arrayCheckboc[i] === arrayCheckboc[j])
		{
			continue;	
		}
		
	}
}*/

// test slut --------------------------------------

let arrayCheckbox = ["box1", "box2", "underbox0", "underbox1", "SprogBox0", "SprogBox1", "SprogBox2", "SprogBox3", "SprogBox4", "SprogBox5"];
	/* id */
	let arrayId = ["projekter","type", "sprog", "start", "start1", "alene", "gruppe", "alenehjem", "aleneCSharp", "gruppehjem", "gruppeCSharp"];

function getDGEBI(checbox){
	return document.getElementById(checbox);	
}

function showAlleOpgaver(id){
	/*console.log(id);*/
	
	if(getDGEBI(arrayCheckbox[1]) && getDGEBI(arrayCheckbox[1]).checked === true && id == "box2")
	{
		if(getDGEBI(arrayCheckbox[2]).checked === true){
			console.log(" c# alene");
			getDGEBI(arrayCheckbox[0]).checked = false;
			/*Opgaver("AleneCSharp", "aleneCSharp");
			clearGruppe.checked = false;
			clearAleneCSharp.classList.remove("forsvind");
			clearAleneHjem.className = "forsvind";
			clearHjemmeside.className = "forsvind";
			clearGruppe.className = "forsvind";
			clearAlene.className = "forsvind";*/
		}
		else if(getDGEBI(arrayCheckbox[3]).checked === true){
			console.log(" c# gruppe");
			getDGEBI(arrayCheckbox[0]).checked = false;
		}
		else{
			console.log("C#");
			getDGEBI(arrayCheckbox[0]).checked = false;
			getDGEBI(arrayId[4]).classList.remove("forsvind");
			getDGEBI(arrayId[3]).className = "forsvind";
		}
	}
	else if(getDGEBI(arrayCheckbox[0]) && getDGEBI(arrayCheckbox[0]).checked === true && id == "box1")
	{
		if(getDGEBI(arrayCheckbox[2]).checked === true ){
			console.log(" hjemmeside alene");
			getDGEBI(arrayCheckbox[1]).checked = false;
			/*Opgaver("AleneHjem", "aleneHjem");
			clearGruppe.checked = false;
			clearAleneHjem.classList.remove("forsvind");
			clearHjemmeside.className = "forsvind";
			clearGruppe.className = "forsvind";
			clearAlene.className = "forsvind";*/
		}
		else if(getDGEBI(arrayCheckbox[3]).checked === true){
			console.log(" hjemmside gruppe");
			getDGEBI(arrayCheckbox[1]).checked = false;
		}
		else{
			console.log("hjemmeside");
			getDGEBI(arrayCheckbox[1]).checked = false;
			getDGEBI(arrayId[3]).classList.remove("forsvind");
			getDGEBI(arrayId[4]).className = "forsvind";
		}
	}
	else if(getDGEBI(arrayCheckbox[2]) && getDGEBI(arrayCheckbox[2]).checked === true && id == "underbox0")
	{
		if(getDGEBI(arrayCheckbox[1]).checked === true)
		{
			console.log("alene c#");
			getDGEBI(arrayCheckbox[3]).checked = false;
			getDGEBI(arrayId[4]).classList.remove("forsvind");
			getDGEBI(arrayId[3]).className = "forsvind";
		}
		else if(getDGEBI(arrayCheckbox[0]).checked === true)
		{
			console.log("alene html");
			getDGEBI(arrayCheckbox[3]).checked = false;
			getDGEBI(arrayId[3]).classList.remove("forsvind");
			getDGEBI(arrayId[4]).className = "forsvind";
		}
		else
		{
			console.log("alene");
			Opgaver("AlleOpgaverAlene", "alene");
			getDGEBI(arrayCheckbox[3]).checked = false;
			getDGEBI(arrayId[1]).classList.remove("forsvind");
			getDGEBI(arrayId[5]).classList.remove("forsvind");
			getDGEBI(arrayId[0]).className = "forsvind";
			getDGEBI(arrayId[2]).className = "forsvind";
			getDGEBI(arrayId[6]).className = "forsvind";
		}
	}
	else if(getDGEBI(arrayCheckbox[3]) && getDGEBI(arrayCheckbox[3]).checked === true && id == "underbox1")
	{
		if(getDGEBI(arrayCheckbox[0]).checked === true)
		{
		    console.log("gruppe c#");
			getDGEBI(arrayCheckbox[2]).checked = false;
		}
		else if(getDGEBI(arrayCheckbox[1]).checked === true){
			console.log("gruppe html");
			getDGEBI(arrayCheckbox[2]).checked = false;
		}
		else
		{
			console.log("gruppe");
			Opgaver("AlleOpgaverGruppe", "gruppe");
			getDGEBI(arrayCheckbox[2]).checked = false;
			getDGEBI(arrayId[1]).classList.remove("forsvind");
			getDGEBI(arrayId[6]).classList.remove("forsvind");
			getDGEBI(arrayId[0]).className = "forsvind";
			getDGEBI(arrayId[2]).className = "forsvind";
			getDGEBI(arrayId[5]).className = "forsvind";
		}
	} 
	else if(getDGEBI(arrayCheckbox[1]) && getDGEBI(arrayCheckbox[1]).checked === true && LastId == "box2")
	{
		if(getDGEBI(arrayCheckbox[2]).checked === true){
			console.log(" c# alene");
			getDGEBI(arrayCheckbox[0]).checked = false;
			/*Opgaver("AleneCSharp", "aleneCSharp");
			clearGruppe.checked = false;
			clearAleneCSharp.classList.remove("forsvind");
			clearAleneHjem.className = "forsvind";
			clearHjemmeside.className = "forsvind";
			clearGruppe.className = "forsvind";
			clearAlene.className = "forsvind";*/
		}
		else if(getDGEBI(arrayCheckbox[3]).checked === true){
			console.log(" c# gruppe");
			getDGEBI(arrayCheckbox[0]).checked = false;
		}
		else{
			console.log("C#");
			getDGEBI(arrayCheckbox[0]).checked = false;
			getDGEBI(arrayId[4]).classList.remove("forsvind");
			getDGEBI(arrayId[3]).className = "forsvind";
		}
	}
	else if(getDGEBI(arrayCheckbox[0]) && getDGEBI(arrayCheckbox[0]).checked === true && LastId == "box1")
	{
		if(getDGEBI(arrayCheckbox[2]).checked === true ){
			console.log(" hjemmeside alene");
			getDGEBI(arrayCheckbox[1]).checked = false;
			/*Opgaver("AleneHjem", "aleneHjem");
			clearGruppe.checked = false;
			clearAleneHjem.classList.remove("forsvind");
			clearHjemmeside.className = "forsvind";
			clearGruppe.className = "forsvind";
			clearAlene.className = "forsvind";*/
		}
		else if(getDGEBI(arrayCheckbox[3]).checked === true){
			console.log(" hjemmside gruppe");
			getDGEBI(arrayCheckbox[1]).checked = false;
		}
		else{
			console.log("hjemmeside");
			getDGEBI(arrayCheckbox[1]).checked = false;
			getDGEBI(arrayId[3]).classList.remove("forsvind");
			getDGEBI(arrayId[4]).className = "forsvind";
		}
	}
	else if(getDGEBI(arrayCheckbox[2]) && getDGEBI(arrayCheckbox[2]).checked === true && LastId == "underbox0")
	{
		if(getDGEBI(arrayCheckbox[1]).checked === true)
		{
			console.log("alene c#");
			getDGEBI(arrayCheckbox[3]).checked = false;
			getDGEBI(arrayId[4]).classList.remove("forsvind");
			getDGEBI(arrayId[3]).className = "forsvind";
		}
		else if(getDGEBI(arrayCheckbox[0]).checked === true)
		{
			console.log("alene html");
			getDGEBI(arrayCheckbox[3]).checked = false;
			getDGEBI(arrayId[3]).classList.remove("forsvind");
			getDGEBI(arrayId[4]).className = "forsvind";
		}
		else
		{
			console.log("alene");
			Opgaver("AlleOpgaverAlene", "alene");
			getDGEBI(arrayCheckbox[3]).checked = false;
			getDGEBI(arrayId[1]).classList.remove("forsvind");
			getDGEBI(arrayId[5]).classList.remove("forsvind");
			getDGEBI(arrayId[0]).className = "forsvind";
			getDGEBI(arrayId[2]).className = "forsvind";
			getDGEBI(arrayId[6]).className = "forsvind";
		}
	}
	else if(getDGEBI(arrayCheckbox[3]) && getDGEBI(arrayCheckbox[3]).checked === true && LastId == "underbox1")
	{
		if(getDGEBI(arrayCheckbox[0]).checked === true)
		{
		   console.log("gruppe c#")
			getDGEBI(arrayCheckbox[2]).checked = false;
		}
		else if(getDGEBI(arrayCheckbox[1]).checked === true){
			console.log("gruppe html")
			getDGEBI(arrayCheckbox[2]).checked = false;
		}
		else
		{
			console.log("gruppe");
			Opgaver("AlleOpgaverGruppe", "gruppe");
			getDGEBI(arrayCheckbox[2]).checked = false;
			getDGEBI(arrayId[1]).classList.remove("forsvind");
			getDGEBI(arrayId[6]).classList.remove("forsvind");
			getDGEBI(arrayId[0]).className = "forsvind";
			getDGEBI(arrayId[2]).className = "forsvind";
			getDGEBI(arrayId[5]).className = "forsvind";
		}
	}
	else 
	{
		if(getDGEBI(arrayCheckbox[0]) && getDGEBI(arrayCheckbox[0]).checked && LastId == "underbox0" || getDGEBI(arrayCheckbox[0]) && getDGEBI(arrayCheckbox[0]).checked && LastId == "underbox1" ){
			console.log("kun hjemmeside");
			getDGEBI(arrayCheckbox[1]).checked = false;
		}
		else if(getDGEBI(arrayCheckbox[1]) && getDGEBI(arrayCheckbox[1]).checked && LastId == "underbox0" || getDGEBI(arrayCheckbox[1]) && getDGEBI(arrayCheckbox[1]).checked && LastId == "underbox1"){
			console.log("kun C#");
			getDGEBI(arrayCheckbox[0]).checked = false;
		}
		else if(getDGEBI(arrayCheckbox[2]) && getDGEBI(arrayCheckbox[2]).checked && LastId == "box1" || getDGEBI(arrayCheckbox[2]) && getDGEBI(arrayCheckbox[2]).checked && LastId == "box2"){
			console.log("kun alene");
			getDGEBI(arrayCheckbox[3]).checked = false;
		}
		else if(getDGEBI(arrayCheckbox[3]) && getDGEBI(arrayCheckbox[3]).checked && LastId == "box1" || getDGEBI(arrayCheckbox[3]) && getDGEBI(arrayCheckbox[3]).checked && LastId == "box2"){
			console.log("kun Gruppe");
			getDGEBI(arrayCheckbox[2]).checked = false;
		}
		else{
			console.log("start");
			getDGEBI(arrayId[3]).classList.remove("forsvind");
			getDGEBI(arrayId[4]).classList.remove("forsvind");
			getDGEBI(arrayId[0]).classList.remove("forsvind");
			getDGEBI(arrayId[1]).className = "forsvind"; /* husk */	
		}
	}
	// sprogbox
	/*if(spCSharp && spCSharp.checked === true)
	{
		console.log("sprog c#");
		html.checked = false;
	}
	if(html && html.checked === true)
	{
		console.log("sprog html");	
		spCSharp.checked = false;
	}*/
	
	LastId = id;
	console.log(LastId + " = lastid");
	console.log("_____________");
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