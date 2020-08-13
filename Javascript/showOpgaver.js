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

function showAlleOpgaver(id){
	/* chekbox */
	let hjemmeside = document.getElementById("box1"); 
	let cSharp = document.getElementById("box2");
	let alene = document.getElementById("underbox0");
	let gruppe = document.getElementById("underbox1");
	let spCSharp = document.getElementById("SprogBox0");
	let html = document.getElementById("SprogBox1");
	
	/* id */
	let clearProjekter = document.getElementById("projekter");
	let clearType = document.getElementById("type");
	let clearSprog = document.getElementById("sprog");
	let clearHjemmeside = document.getElementById("start");
	let clearCSharp = document.getElementById("start1");
	let clearAlene = document.getElementById("alene") ;
	let clearGruppe = document.getElementById("gruppe");
	let clearSpCSharp = document.getElementById("cSharp");
	let clearHtml = document.getElementById("html");
	
	/*console.log(id);*/
	
	
	if(cSharp && cSharp.checked === true && id == "box2" )
	{
		if(alene.checked === true){
			console.log(" c# alene");
			clearGruppe.checked = false;
		}
		else if(gruppe.checked === true){
			console.log(" c# gruppe");
			clearAlene.checked = false;
		}
		else{
			console.log("C#");
			hjemmeside.checked = false;
			clearCSharp.classList.remove("forsvind");
			clearHjemmeside.className = "forsvind";
		}
	}
	else if(hjemmeside && hjemmeside.checked === true && id == "box1")
	{
		console.log("hjemmeside");
		cSharp.checked = false;
		clearHjemmeside.classList.remove("forsvind");
		clearCSharp.className = "forsvind";
	}
	else if(alene && alene.checked === true && id == "underbox0")
	{
		if(cSharp.checked === true)
		{
			console.log("alene c#");
			clearHjemmeside.classList.remove("forsvind");
			clearCSharp.className = "forsvind";
		}
		else if(hjemmeside.checked === true)
		{
			console.log("alene html");
			clearHjemmeside.classList.remove("forsvind");
			clearCSharp.className = "forsvind";
		}
		else
		{
			console.log("kun alene");
			Opgaver("AlleOpgaverAlene", "alene");
			clearType.classList.remove("forsvind");
			clearProjekter.className = "forsvind";
			clearSprog.className = "forsvind";
		}
	}
	else if(gruppe && gruppe.checked === true && id == "underbox1")
	{
		console.log("gruppe");
	}
	else 
	{
		console.log("start");
		clearHjemmeside.classList.remove("forsvind");
		clearCSharp.classList.remove("forsvind");
		clearProjekter.classList.remove("forsvind");
		clearType.className = "forsvind"; /* husk */
	}
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