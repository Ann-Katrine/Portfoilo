/*let arrayRouting = ["overskiftType", "projektType", "Sprog"];
let arrayId = ["hvilkePro", "hvilkeProType", "HvilkeSprog"];

let arrayShowOpgaver = ["box", "underbox", "sprogBox"];


function opretCheckbox(routing, id, overskrift, showOpgave){
	$.get("PHP/index.php?choice=" + routing, function(data){
		let array = data.split("£");
		//console.log(array);
		
		let li = document.createElement("li");
		li.className = "nav-item";
		let Temp1 = document.getElementById(id);
		Temp1.appendChild(li);
		
		let p = document.createElement("p");
		p.className = "tekst";
		let overskrift = document.createTextNode(overskrift);
		p.appendChild(overskrift);
		li.appendChild(p);
		
		let tal = 1;
		array.forEach(function(index){
			let value = index.split("'");
			
			let input = document.createElement("input");
			input.setAttribute("type", "checkbox");
			input.setAttribute("id", "box" +tal);
			input.setAttribute("onclick", "showAlleOpgaver('" + showOpgave + tal + "')");
			li.appendChild(input);
			
			let a = document.createElement("a");
			a.className = "maginMagic";
			let tekst = document.createTextNode(value[0])
			a.appendChild(tekst);
			li.appendChild(a);
			
			let pause = document.createElement("br");
			li.appendChild(pause);
			tal++;
		});
	});
}
*/
// test -------------------------------------
/*
let arrayProSprog = [];
let arrayProSprogTilstand = [false, false, false, false, false, false];
function programmeringSprog(id){
	let antal = arrayCheckBoxSprog.length;
	for(let i = 0; i < antal; i++){
		if(getDGEBI(arrayCheckBoxSprog[i]) && getDGEBI(arrayCheckBoxSprog[i]).checked === true && id == arrayCheckBoxSprog[i]){
			if(arrayProSprogTilstand[i] == false)
			{
				arrayProSprog.push(arraySprog[i]);
				arrayProSprogTilstand[i] = true;
				console.log(arrayProSprog);
			}
		}
		else if(LastId == arrayCheckBoxSprog[i] && getDGEBI(arrayCheckBoxSprog[i]).checked === false){
			delete arrayProSprog[i];
			arrayProSprogTilstand[i] = false;
			arrayProSprog = arrayProSprog.filter(function() { return true });
			
		}
	}	
}

*/
// test slut --------------------------------------

function htmlOpager(){
	hide();
	sidebar();
	hjemCSharp();
	showAlleOpgaver(0);
}

function hjemCSharp(){
	Opgaver("hjemmesideOpgaver", "start");
	Opgaver("cSharpOpgaver", "start1")
}

var objSidebarProjekt = [
	{
	checkboxId: 'box0',
	stedId: 'start',
	routing: 'hjemmesideOpgaver',
	omraade: 'projekter',
	oprettet: 'false',
	tilstand: 'false'
	}, 
	{
	checkboxId: 'box1',
	stedId: 'start1',
	routing: 'cSharpOpgaver',
	omraade: 'projekter',
	oprettet: 'false',
	tilstand: 'false'
	}
];

var objSidebarType = [
	{
	checkboxId: 'underbox0',
	stedId: 'alene',
	routing: 'aleneOpgaver',
	omraade: 'type',
	oprettet: 'false',
	tilstand: 'false'
	},
	{
	checkboxId: 'underbox1',
	stedId: 'gruppe',
	routing: 'gruppeOpgaver',
	omraade: 'type',
	oprettet: 'false',
	tilstand: 'false'
	}
	];

var objSidebarSprog = [
	{
	checkboxId: 'sprogBox0',
	stedId: 'sprog',
	routing: 'sprog',
	omraade: 'sprog',
	oprettet: 'false',
	tilstand: 'false',
	sprog: 'Csharp'
	},
	{
	checkboxId: 'sprogBox1',
	stedId: 'sprog',
	routing: 'sprog',
	omraade: 'sprog',
	oprettet: 'false',
	tilstand: 'false',
	sprog: 'HTML'
	},
	{
	checkboxId: 'sprogBox2',
	stedId: 'sprog',
	routing: 'sprog',
	omraade: 'sprog',
	oprettet: 'false',
	tilstand: 'false',
	sprog: 'CSS'
	},
	{
	checkboxId: 'sprogBox3',
	stedId: 'sprog',
	routing: 'sprog',
	omraade: 'sprog',
	oprettet: 'false',
	tilstand: 'false',
	sprog: 'PHP'
	},
	{
	checkboxId: 'sprogBox4',
	stedId: 'sprog',
	routing: 'sprog',
	omraade: 'sprog',
	oprettet: 'false',
	tilstand: 'false',
	sprog: 'Javascript'
	},
	{
	checkboxId: 'sprogBox5',
	stedId: 'sprog',
	routing: 'sprog',
	omraade: 'sprog',
	oprettet: 'false',
	tilstand: 'false',
	sprog: 'MySQL'
	}];

function showAlleOpgaver(id){
console.log(id + " = id");
	let antal = objSidebarProjekt.length;
	for(let i = 0; i < antal; i++){
        console.log(i + " = i");
        console.log(antal + " = antal");
		let antalJ = objSidebarSprog.length;
		for(let j = 0; j < antalJ;j++){
			/* projket */
            if(objSidebarProjekt[i].checkboxId === id && getDGEBI(objSidebarProjekt[i].checkboxId).checked === true){
                for(let a  = 0; a < antal; a++){
                    if((objSidebarType[a].checkboxId).checked === true){
                        
                    }
                    else if((objSidebarSprog[j].checkboxId).checked === true){
                        
                    }
                    else{
                        forsvind("projekter", id);
                        console.log("du  rher :D"); 
                    }
                }
            }
			/*if(objSidebarProjekt[i].checkboxId && getDGEBI(objSidebarProjekt[i].checkboxId).checked === true && id == objSidebarProjekt[i].checkboxId){
                
                console.log(objSidebarProjekt[i].checkboxId);
                for(let a = 0; a < antal; a++){
                    if(getDGEBI((objSidebarType[a]).checkboxId).checked === true){
                        if(getDGEBI(objSidebarSprog[j].checkboxId).checked === true){
                            CheckedProjektAndType(id, "projekter");
                            forsvind(getDGEBI(objSidebarSprog[j]).omraade, id);
                            Sprog(id);
                        }
                        else{
                            CheckedProjektAndType(id, "projekter");
                            forsvind(getDGEBI(objSidebarProjekt[i].omraade), id);
                            if(getDGEBI(objSidebarType[i].oprettet) == false){
                                Opgaver(getDGEBI(objSidebarType[i].routing), getDGEBI(objSidebarType[i].stedId));
                                getDGEBI(objSidebarType[i].oprettet) = true;
                            } // fix
                        }
                    }
                    else if(getDGEBI(objSidebarSprog[j].checkboxId).checked === true){
                        if(getDGEBI(objSidebarType[j].checkboxId).checked === true){
                            CheckedProjektAndType(id, "projekter");
                            forsvind(objSidebarProjekt[i].omraade, id);
                            if(getDGEBI(objSidebarType[i].oprettet) == false){
                                Opgaver(getDGEBI(objSidebarType[i].routing), getDGEBI(objSidebarType[i].stedId));
                                getDGEBI(objSidebarType[i].oprettet) = true;
                            } // fix
                        }
                        else{
                            CheckedProjektAndType(id, "projekter");
                            forsvind(getDGEBI(objSidebarSprog[j]).omraade, id);
                            Sprog(id);
                        }
                    }
                    else{
                        CheckedProjektAndType(id, "projekter");	
                        console.log(a + " = a");
                        forsvind("projekter", id);
                        i = objSidebarProjekt.length + 1;
                        //a = objSidebarProjekt.length + 1;
                        console.log("her!");
                        //console.log(i + " = sidste i");
                    }   
                }
			}*/
			/* type */
			else if(getDGEBI(objSidebarType[i].checkboxId) && getDGEBI(objSidebarType[i].checkboxId).checked === true && id == objSidebarType[i].checkboxId){

				if(getDGEBI(objSidebarProjekt[i].checkboxId).checked === true){
					if(getDGEBI(objSidebarSprog[i]).checked === true){
						CheckedProjektAndType(id, "type");
						forsvind(getDGEBI(objSidebarSprog[j]).omraade, id);
						Sprog(id);
					}
					else{
						CheckedProjektAndType(id, "type");
						forsvind(getDGEBI(objSidebarType[i].omraade), id);
						if(getDGEBI(objSidebarType[i].oprettet) == false){
							Opgaver(getDGEBI(objSidebarType[i].routing), getDGEBI(objSidebarType[i].stedId));
							getDGEBI(objSidebarType[i].oprettet) = true;
						} // fix
					}
				}
				else if(getDGEBI(objSidebarSprog[j].checkboxId).checked === true){
					if(getDGEBI(objSidebarProjekt[i].checkboxId).checked === true){
						CheckedProjektAndType(id, "type");
						forsvind(getDGEBI(objSidebarType[i].omraade), id);
						if(getDGEBI(objSidebarType[i].oprettet) == false){
							Opgaver(getDGEBI(objSidebarType[i].routing), getDGEBI(objSidebarType[i].stedId));
							getDGEBI(objSidebarType[i].oprettet) = true;
						} // fix
					}
					else{
						CheckedProjektAndType(id, "type");
						forsvind(getDGEBI(objSidebarSprog[j]).omraade, id);
						Sprog(id);
					}
				}
				else{
					CheckedProjektAndType(id, "type");
					forsvind(objSidebarProjekt[i].omraade, id);
					if(getDGEBI(objSidebarType[i].oprettet) == false){
						Opgaver(getDGEBI(objSidebarType[i].routing), getDGEBI(objSidebarType[i].stedId));
						getDGEBI(objSidebarType[i].oprettet) = true;
					} // fix
                    i = objSidebarProjekt.length;
				}
			}
			/* sprog */
			else if(getDGEBI(objSidebarSprog[j].checkboxId) && getDGEBI(objSidebarSprog[j].checkboxId).checked === true && id == objSidebarSprog[j].checkboxId){

				if(getDGEBI(objSidebarProjekt[i]).checked === true){
					if(getDGEBI(objSidebarType[i]).checked === true){
						CheckedProjektAndType(id, "sprog");
						forsvind(getDGEBI(objSidebarType[i].omraade), id);
						if(getDGEBI(objSidebarType[i].oprettet) == false){
							Opgaver(getDGEBI(objSidebarType[i].routing), getDGEBI(objSidebarType[i].stedId));
							getDGEBI(objSidebarType[i].oprettet) = true;
						} // fix
					}
					else{
						CheckedProjektAndType(id, "sprog");
						forsvind(getDGEBI(objSidebarProjekt[i]).omraade, id);
						Sprog(id);
					}
				}
				else if(getDGEBI(objSidebarType[i]).checked === true){
					if(getDGEBI(objSidebarProjekt[i]).checked === true){
						CheckedProjektAndType(id, "sprog");
						forsvind(getDGEBI(objSidebarProjekt[i]).omraade, id);
						Sprog(id);
					}
					else{
						CheckedProjektAndType(id, "sprog");
						forsvind(getDGEBI(objSidebarType[i].omraade), id);
						if(getDGEBI(objSidebarType[i].oprettet) == false){
							Opgaver(getDGEBI(objSidebarType[i].routing), getDGEBI(objSidebarType[i].stedId));
							getDGEBI(objSidebarType[i].oprettet) = true;
						} // fix
					}
				}
				else{
					forsvind(objSidebarSprog[j].omraade, id);
					Sprog(id);
				}
			}
			else{
				/* projekt */
				if(getDGEBI(objSidebarProjekt[i].checkboxId) && getDGEBI(objSidebarProjekt[i].checkboxId).checked && LastId == objSidebarType[i].checkboxId || getDGEBI(objSidebarProjekt[i].checkboxId) && getDGEBI(objSidebarProjekt[i].checkboxId).checked && LastId == objSidebarSprog[j].checkboxId){
					CheckedProjektAndType(id, "projekter");
					forsvind(objSidebarProjekt[i].omraade, id);
				}
				/* type */
				else if(getDGEBI(objSidebarType[i].checkboxId) && getDGEBI(objSidebarType[i].checkboxId).checked && LastId == objSidebarProjekt[i].checkboxId || getDGEBI(objSidebarType[i].checkboxId) && getDGEBI(objSidebarType[i].checkboxId).checked && LastId == objSidebarSprog[j].checkboxId ){
					CheckedProjektAndType(id, "type");
					forsvind(objSidebarProjekt[i].omraade, id);
					if(getDGEBI(objSidebarType[i].oprettet) == false){
						Opgaver(getDGEBI(objSidebarType[i].routing), getDGEBI(objSidebarType[i].stedId));
						getDGEBI(objSidebarType[i].oprettet) = true;
					} // fix
				}
				/* sprog */
				else if(getDGEBI(objSidebarSprog[j].checkboxId) && getDGEBI(objSidebarSprog[j].checkboxId).checked && LastId == objSidebarProjekt[j].checkboxId || getDGEBI(objSidebarSprog[i].checkboxId) && getDGEBI(objSidebarSprog[i].checkboxId).checked && LastId == objSidebarType[i].checkboxId){
					forsvind(objSidebarSprog[j].omraade, id);
					Sprog(id);
				}
				else{
                    console.log("start");
					CheckedProjektAndType(id, "projekter");
					forsvind("start", "start");
				}
			}
		}
		
	}
		LastId = id;
		console.log(LastId + " = lastid");
		console.log("_____________");
	
}

function getDGEBI(checbox){
	return document.getElementById(checbox);	
}

let arraySprog = [];

function Sprog(id){
	let antal = objSidebarSprog.length;
	for(let i = 0; i < antal; i++){
		if(getDGEBI(objSidebarProjekt[i].stedId) && getDGEBI(objSidebarProjekt[i].stedId).checked === true && id == objSidebarProjekt[i].stedId){
			arraySprog.push(objSidebarSprog[i].sprog);
			let antalSprog = arraySprog.length;
			let sprog = "&q=";
			for(let j = 0; j < antalSprog; j++){
				sprog = sprog + objSidebarSprog[j].sprog + ",";
			}
			sprog = sprog.substring(0, sprog.length-1);
			
			//getDGEBI(objSidebarSprog[j].stedId).innerHTML = "";
			
			Opgaver(objSidebarSprog[j].sprog + sprog, objSidebarSprog[j].checkboxId);
			
			
		}
		else if(LastId == objSidebarSprog[j].checkboxId && getDGEBI(objSidebarSprog[j].sprog).checked === true){
			delete arraySprog[j];
			objSidebarSprog[j].tilstand = false;
			arraySprog = arraySprog.filter(function() { return true});
		}
		
	}
}

/*
id: er det man for sendt med fra når man trykker på en af checkboxene
omraade: er der hvor de høre til altså projekt eller type
*/ // hjælp til parameter
function CheckedProjektAndType(id, omraade){
   // console.log(id + " id & omraade " + omraade);
    //console.log("her"); --------------------------- når så langt
	let antal = objSidebarSprog.length;
	for(let i = 0; i < antal; i++){
        //console.log("for i");
		let antalJ = objSidebarProjekt.length;
		for(let j = 0; j < antalJ; j++){
			if(getDGEBI(objSidebarProjekt[j].omraade) == omraade){
			     console.log("if");
                if(getDGEBI(objSidebarProjekt[j].checkboxId) == id){
                    getDGEBI(objSidebarProjekt[j].checkboxId) = true;
                }
                else{
                    objSidebarProjekt[j].checkboxId = false;
                    //getDGEBI(objSidebarProjekt[j].checkboxId) = false;
                }
            }
            else if(getDGEBI(objSidebarType[j].omraade) == omraade){
                console.log("else");
                if(getDGEBI(objSidebarType[j].checkboxId) == id){
                    getDGEBI(objSidebarType[j].checkboxId) = true;
                }
                else{
                    getDGEBI(objSidebarType[j].checkboxId) = false;
                }
            }
		}
	}
}

function forsvind(omraade, id){
	//console.log(omraade);
	let antal = objSidebarSprog.length;
	for(let i = 0; i < antal; i++){
		let antalJ = objSidebarProjekt.length;
		for(let j = 0; j < antalJ; j++){
			// projekter
			if(objSidebarProjekt[j].omraade == omraade && id == objSidebarProjekt[j].checkboxId){
				getDGEBI(objSidebarProjekt[j].omraade).classList.remove("forsvind");
				getDGEBI(objSidebarProjekt[j].stedId).classList.remove("forsvind");
				//console.log("opgavet");
			}
			else{
				if(id == "box0" || id == "box1"){
                    getDGEBI(objSidebarProjekt[j].stedId).className = "forsvind";
                }
                else{
                    getDGEBI(objSidebarProjekt[j].omraade).className = "forsvind";
				    getDGEBI(objSidebarProjekt[j].stedId).className = "forsvind";
                }
			}
			// type
			if(objSidebarType[j].omraade == omraade && id == objSidebarType[j].checkboxId){
				getDGEBI(objSidebarType[j].omraade).classList.remove("forsvind");
				getDGEBI(objSidebarType[j].stedId).classList.remove("forsvind");
			}
			else{
                if(id == "underbox0" || id == "underbox1"){
                    getDGEBI(objSidebarType[j].stedId).className = "forsvind"; 
                }
                else{
                    getDGEBI(objSidebarType[j].omraade).className = "forsvind";
				    getDGEBI(objSidebarType[j].stedId).className = "forsvind";   
                }
			}
			// sprog
			if(objSidebarSprog[j].omraade == omraade && id == objSidebarSprog[j].checkboxId){
				getDGEBI(objSidebarSprog[i].omraade).classList.remove("forsvind");
				getDGEBI(objSidebarSprog[i].stedId).classList.remove("forsvind");
			}
			else{
                if(id == "sprogBox0" || id == "sprogBox1" || id == "sprogBox2" || id == "sprogBox3" || id == "sprogBox4" || id == "sprogBox5"){
				    getDGEBI(objSidebarSprog[i].stedId).className = "forsvind";
                }
                else{
                    getDGEBI(objSidebarSprog[i].omraade).className = "forsvind";
				    getDGEBI(objSidebarSprog[i].stedId).className = "forsvind";
                }
			}
            // intet af det
			if(id == "start"){
				getDGEBI(objSidebarProjekt[j].omraade).classList.remove("forsvind");
				getDGEBI(objSidebarProjekt[j].stedId).classList.remove("forsvind");
			}
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









