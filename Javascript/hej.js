/***************************************/
/*   html-siden bliver f5/går ind på   */
/***************************************/
function htmlOpager(){
	hide();
	sidebar();
	hjemCSharp();
	//showAlleOpgaver(0);
}

/***************************************/
/*      til starten ved htmlOpaver     */
/***************************************/
function hjemCSharp(){
	Opgaver("test&q=hjemmesideOpgaver", "start");
	Opgaver("test&q=csharpOpgaver", "start1");
    //start();
}

var objSidebarProjekt = [
	{
	checkboxId: 'box0',
	stedId: 'start',
	routing: 'hjemmesideOpgaver',
	omraade: 'projekter',
	oprettet: false,
	tilladelse: false,
    firstTime: false
	}, 
	{
	checkboxId: 'box1',
	stedId: 'start1',
	routing: 'csharpOpgaver',
	omraade: 'projekter',
	oprettet: false,
	tilladelse: false,
    firstTime: false
	}
];

var objSidebarType = [
	{
	checkboxId: 'underbox0',
	stedId: 'typer',
	routing: 'aleneOpgaver',
	omraade: 'type',
	oprettet: false,
	tilladelse: false,
    firstTime: false
	},
	{
	checkboxId: 'underbox1',
	stedId: 'typer',
	routing: 'gruppeOpgaver',
	omraade: 'type',
	oprettet: false,
	tilladelse: false,
    firstTime: false
	}
	];

var objSidebarSprog = [
	{
	checkboxId: 'sprogBox0',
	stedId: 'sprogene',
	routing: 'CCSharp',
	omraade: 'sprog',
	oprettet: false,
	tilladelse: false,
    firstTime: false
	},
	{
	checkboxId: 'sprogBox1',
	stedId: 'sprogene',
	routing: 'HTML',
	omraade: 'sprog',
	oprettet: false,
	tilladelse: false,
    firstTime: false
	},
	{
	checkboxId: 'sprogBox2',
	stedId: 'sprogene',
	routing: 'PHP',
	omraade: 'sprog',
	oprettet: false,
	tilladelse: false,
    firstTime: false
	},
	{
	checkboxId: 'sprogBox3',
	stedId: 'sprogene',
	routing: 'SQL',
	omraade: 'sprog',
	oprettet: false,
	tilladelse: false,
    firstTime: false
	},
	{
	checkboxId: 'sprogBox4',
	stedId: 'sprogene',
	routing: 'Javascript',
	omraade: 'sprog',
	oprettet: false,
	tilladelse: false,
    firstTime: false
	},
	{
	checkboxId: 'sprogBox5',
	stedId: 'sprogene',
	routing: 'CSS',
	omraade: 'sprog',
	oprettet: false,
	tilladelse: false,
    firstTime: false
	}
];


let arrayProjket = [];
let arrayType = [];
let arraySprog = [];
let arrayAlt = [];

/***************************************/
/*          rutevejligning             */
/***************************************/
function showAlleOpgaver(id){
    // hvilken den skal gå hen til af functionerne
    switch(id){
        case "box0":
            getDGEBI(objSidebarProjekt[0].stedId).classList.remove("forsvind");
            getDGEBI(objSidebarProjekt[1].stedId).className = "forsvind";
            getDGEBI(objSidebarProjekt[1].checkboxId).checked = false;
            projekter(id, 0);
            break;
        case "box1":
            getDGEBI(objSidebarProjekt[1].stedId).classList.remove("forsvind");
            getDGEBI(objSidebarProjekt[0].stedId).className = "forsvind";
            getDGEBI(objSidebarProjekt[0].checkboxId).checked = false;
            projekter(id, 1);
            break;
        case "underbox0":
            getDGEBI(objSidebarType[0].stedId).classList.remove("forsvind");
            //getDGEBI(objSidebarType[1].stedId).className = "forsvind";
            getDGEBI(objSidebarType[1].checkboxId).checked = false;
            type(id, 0);
            break;
        case "underbox1":
            getDGEBI(objSidebarType[1].stedId).classList.remove("forsvind");
            //getDGEBI(objSidebarType[0].stedId).className = "forsvind";
            getDGEBI(objSidebarType[0].checkboxId).checked = false;
            type(id, 1);
            break;
        case "sprogBox0":
            getDGEBI(objSidebarSprog[0].stedId).classList.remove("forsvind");
            sprog(id, 0);
            break;
        case "sprogBox1":
            getDGEBI(objSidebarSprog[0].stedId).classList.remove("forsvind");
            sprog(id, 1);
            break;
        case "sprogBox2":
            getDGEBI(objSidebarSprog[0].stedId).classList.remove("forsvind");
            sprog(id, 2);
            break;
        case "sprogBox3":
            getDGEBI(objSidebarSprog[0].stedId).classList.remove("forsvind");
            sprog(id, 3);
            break;
        case "sprogBox4":
            getDGEBI(objSidebarSprog[0].stedId).classList.remove("forsvind");
            sprog(id, 4);
            break;
        case "sprogBox5":
            console.log("*******************");
            getDGEBI(objSidebarSprog[0].stedId).classList.remove("forsvind");
            sprog(id, 5);
            break;
        /*default:
            deleteAlt("start", 0);
            console.log("start");
            break;*/
    }
    
    // opretter projekterne
    opretOpgaver();
    
    console.log(arrayProjket + " = arrayProjket");
    console.log(arrayType + " = arrayType");
    console.log(arraySprog + " = arraySprog");
    console.log(arrayAlt + " = arrayAlt");
    console.log("____________________________");
}

let antalProjekt = objSidebarProjekt.length;
let antalType = objSidebarType.length;
let antalSprog = objSidebarSprog.length;

/***************************************/
/*             projekter               */
/***************************************/
function projekter(id, tal){
    getDGEBI(objSidebarProjekt[tal].omraade).classList.remove("forsvind");
    
    if(objSidebarProjekt[tal].checkboxId === id && getDGEBI(objSidebarProjekt[tal].checkboxId).checked === true){
        for(let i = 0; i < antalProjekt; i++){
            if(getDGEBI(objSidebarType[i].checkboxId).checked === true){
                console.log("type!");
                if(objSidebarProjekt[tal].oprettet === true){
                    objSidebarProjekt[tal].tilladelse = true;   
                }
            }
        }
        
        if(objSidebarProjekt[tal].tilladelse === false){
            console.log("du er her :D, projekter");
            if(objSidebarProjekt[tal].oprettet === false){
                console.log("noget til true projekt");
                arrayProjket.push(objSidebarProjekt[tal].routing); // tilføjer hvilken den skal printe ud
                objSidebarProjekt[tal].oprettet = true;
                objSidebarProjekt[tal].firstTime = true;
                deleteAlt("projekter", tal);
            }      
        }
    }
    else if(getDGEBI(objSidebarProjekt[tal].checkboxId).checked === false){ 
        for(let i = 0; i < antalProjekt; i++){
            if(getDGEBI(objSidebarType[tal].checkboxId).checked === true && objSidebarProjekt[i].checkboxId === id && objSidebarProjekt[i].firstTime === true|| getDGEBI(objSidebarType[i].checkboxId).checked === true && objSidebarProjekt[i].checkboxId === id && objSidebarProjekt[i].firstTime === true){
                console.log("type");
            }
            else{
                for(let i = 0; i < antalProjekt; i++){
                    getDGEBI(objSidebarProjekt[i].stedId).classList.remove("forsvind");
                    delete arrayProjket[i];
                    objSidebarProjekt[tal].oprettet = false;
                    objSidebarProjekt[tal].firstTime = false;
                }
                arrayProjket = arrayProjket.filter(function() {return true });
                //start();
                objSidebarProjekt[tal].tilladelse = false;
                console.log("start");
            }
        }
    }
    console.log(objSidebarProjekt[tal].tilladelse + " tilladelse");
    console.log(objSidebarProjekt[tal].firstTime + " firstTime");
    console.log(objSidebarProjekt[tal].oprettet + " oprettelse");
}

/***************************************/
/*               type                  */
/***************************************/
function type(id, tal){
    getDGEBI(objSidebarType[tal].omraade).classList.remove("forsvind");
    
    if(objSidebarType[tal].checkboxId === id && getDGEBI(objSidebarType[tal].checkboxId).checked === true){
        for(let i = 0; i < antalProjekt; i++){
            if(getDGEBI(objSidebarProjekt[i].checkboxId).checked === true){
                console.log("projekt");
                // hvis man allerede har oprettet 
                if(objSidebarType[tal].oprettet === true){
                    objSidebarType[tal].tilladelse = true;   
                }
            }
        }
        
        if(objSidebarType[tal].tilladelse === false){
            console.log("du er her :D, type:D");
            if(objSidebarType[tal].oprettet === false){
                console.log("noget til true type");
                arrayType.push(objSidebarType[tal].routing); // tilføjer hvilken den skal printe ud
                objSidebarType[tal].oprettet = true;
                objSidebarType[tal].firstTime = true;
                deleteAlt("type", tal);
            }      
        }
    }
    else if(getDGEBI(objSidebarType[tal].checkboxId).checked === false){
        for(let i = 0; i < antalType; i++){
            if(getDGEBI(objSidebarProjekt[tal].checkboxId).checked === true && objSidebarType[i].checkboxId === id && objSidebarType[i].firstTime === true|| getDGEBI(objSidebarProjekt[i].checkboxId).checked === true && objSidebarType[i].checkboxId === id && objSidebarType[i].firstTime === true){
                console.log("projket");
            }
            else{
                for(let i = 0; i < antalType; i++){
                    console.log("hej");
                    getDGEBI(objSidebarProjekt[i].stedId).classList.remove("forsvind");
                    delete arrayType[i];
                    objSidebarType[tal].oprettet = false;
                }
                deleteAlt("type", tal);
                arrayType = arrayType.filter(function() {return true});
                getDGEBI(objSidebarProjekt[tal].omraade).classList.remove("forsvind");
                //start();
                objSidebarType[tal].tilladelse = false;
                objSidebarType[tal].firstTime = false;
            }
        }
    }
    console.log(objSidebarType[tal].tilladelse + " Tilladelse");
    console.log(objSidebarType[tal].firstTime + "firstTime");
    console.log(objSidebarType[tal].oprettet + " oprettet");
}

/***************************************/
/*                sprog                */
/***************************************/
function sprog(id, tal){
    getDGEBI(objSidebarSprog[tal].omraade).classList.remove("forsvind");
    
    if(objSidebarSprog[tal].checkboxId === id && getDGEBI(objSidebarSprog[tal].checkboxId).checked === true){
        for(let i = 0; i < antalProjekt; i++){
            if(getDGEBI(objSidebarProjekt[i].checkboxId).checked === true){
                if(getDGEBI(objSidebarType[i].checkboxId).checked === true){
                    
                }
                else{
                    
                }
            }
            else if(getDGEBI(objSidebarType[i].checkboxId).checked === true){
                if(getDGEBI(objSidebarProjekt[i].checkboxId).checked === true){
                    
                }
                else{
                    
                }
            }
        }
        
        if(objSidebarSprog[tal].tilladelse === false){
            console.log("du er her, sprog");
            if(objSidebarSprog[tal].oprettet === false){
                console.log("noget til true sporg");
                arraySprog.push(objSidebarSprog[tal].routing); // tilføjer hvilken den skal printe ud
                objSidebarSprog[tal].oprettet = true;
                objSidebarSprog[tal].firstTime = true;
                deleteAlt("sprog", tal);
                console.log(arraySprog);
            }
        }
    }
    else if(getDGEBI(objSidebarSprog[tal].checkboxId).checked === false){
        for(let i = 0; i < antalProjekt; i++){
            for(let j = 0; j < antalSprog; j++){
                if(getDGEBI(objSidebarType[i].checkboxId).checked === true && objSidebarSprog[j].checkboxId === id && objSidebarProjekt[i].firstTime === true|| getDGEBI(objSidebarType[i].checkboxId).checked === true && objSidebarProjekt[i].checkboxId === id && objSidebarSprog[j].firstTime === true){
                console.log("type");
                }
                else if(getDGEBI(objSidebarProjekt[i].checkboxId).checked === true && objSidebarType[i].checkboxId === id && objSidebarSprog[i].firstTime === true|| getDGEBI(objSidebarProjekt[i].checkboxId).checked === true && objSidebarType[i].checkboxId === id && objSidebarSprog[i].firstTime === true){
                    console.log("projket");
                }
                else{
                    if(objSidebarSprog[tal].firstTime === true){
                        
                        /***************************************/
                        /*             arbejdt her             */
                        /***************************************/
                        let tallet = 0;
                        for(let j = 0; j < antalSprog; j++){
                            if(getDGEBI(objSidebarSprog[j].checkboxId).checked === true){
                                tallet++;
                            }
                        }
                        getDGEBI(objSidebarSprog[i].stedId).classList.remove("forsvind");
                        console.log(arraySprog);
                        let sted = arraySprog.indexOf(objSidebarSprog[tal].routing)
                        delete arraySprog[sted];
                        objSidebarSprog[tal].oprettet = false;
                        objSidebarSprog[tal].firstTime = false;
                        arraySprog = arraySprog.filter(function() {return true});
                        if(tallet > 1){
                            //start();   
                        }
                        objSidebarSprog[tal].tilladelse = false;
                        console.log("start");
                    }
                }   
            }
        }
    }
    console.log(objSidebarSprog[tal].tilladelse + " tilladelse");
    console.log(objSidebarSprog[tal].firstTime + " firstTime");
    console.log(objSidebarSprog[tal].oprettet + " oprettelse");
}

/***************************************/
/*             starten                 */ /// bruger ikke lige nu
/***************************************/
function start(){
    getDGEBI(objSidebarType[1].omraade).className = "forsvind";
    getDGEBI(objSidebarSprog[1].omraade).className = "forsvind";
}

/***************************************/
/*         getElementById              */
/***************************************/
function getDGEBI(checbox){
	return document.getElementById(checbox);	
}

/***************************************/
/*             slet alt               */
/***************************************/
function deleteAlt(omraade, tal){
    let antalPro = arrayProjket.length;
    let antalType = arrayType.length;
    if(omraade === objSidebarSprog[tal].omraade){
        for(let i = 0;  i < antalSprog; i++){
            if(arraySprog[i] != objSidebarSprog[tal].routing){
                if(getDGEBI(objSidebarSprog[i].checkboxId).checked === false){
                    console.log("sporg slet");
                    delete arraySprog[i];
                    arraySprog = arraySprog.filter(function() {return true});
                    objSidebarSprog[i].oprettet = false;   
                }
            }
        }
    }
    else if(omraade === objSidebarType[tal].omraade){
        for(let i = 0; i < antalType; i++){
            if(arrayType[i] != objSidebarType[tal].routing){
                console.log("type slet");
                delete arrayType[i];
                arrayType = arrayType.filter(function() {return true});
                objSidebarType[i].oprettet = false;
            }
        }
    }
    else if(omraade == objSidebarProjekt[tal].omraade){
        for(let i = 0; i < antalPro; i++){
            if(arrayProjket[i] != objSidebarProjekt[tal].routing){
                console.log("projet slet");
                delete arrayProjket[i];
                arrayProjket = arrayProjket.filter(function() {return true });
                objSidebarProjekt[i].oprettet = false;
            }
        }
    }
}

/***************************************/
/*        gøre klar til opgaver        */
/***************************************/
function opretOpgaver(){
    // gør at jeg sletter alt der allerede stå i arrayAlt
    let antal = arrayAlt.length;
    for(let i = 0; i < antal; i++){
        delete arrayAlt[i];
    }
    
    // gør at der ikke er nogen empty variabler i arrayet
    arrayAlt = arrayAlt.filter(function() {return true}); 
    
    // indsætter alt det de har ind i arrayAlt
    if(arrayProjket.length != 0){
        arrayAlt.push(arrayProjket);
    }
    if(arrayType.length != 0){
        arrayAlt.push(arrayType);
    }
    if(arraySprog.length != 0){
        arrayAlt.push(arraySprog);
    }
    
    // gør at alle de variabler der lægger i arrayAlt kommer til at være en lang string at sendes til routing og så for man det rigtige printet ud på siden
    let sprogene = "&q=";
    for(let i = 0; i < arrayAlt.length; i++){
        sprogene =  sprogene + arrayAlt[i] + ",";
    } 
    sprogene = sprogene.substring(0, sprogene.length-1);
    console.log(sprogene);
    
    
    /***************************************/
    /*             hjælp her               */
    /***************************************/
    // elementet bliver slettes men ikke på en god måde
//    let slettes = document.getElementById('slet');
    let kage = document.getElementsByClassName('slet');
    let antalkager = kage.length;
    console.log(kage);
    console.log(antalkager);
    for(let i = 0; i < antalkager; i++){
        console.log(kage[i]);
        let slet = document.getElementById("slet");
        slet.remove();
    }
//    slettes.remove(); 
    console.log("slet");
    
    if(arrayAlt == "hjemmesideOpgaver" || arrayAlt == "csharpOpgaver" || arrayAlt.length == 0){ 
        console.log("har hjemmesideOpgaver eller ikke noget");
        if(arrayAlt.length == 0){
            hjemCSharp();
            console.log("går forkert");
        }
        else{
            sprogene = "test" + sprogene;
            console.log(sprogene);
            if(sprogene == "test&q=hjemmesideOpgaver"){
                Opgaver(sprogene, "start");
                console.log("når her til");
            }
            else{
                Opgaver(sprogene, "start1");
                console.log("når helt klar forkert");
            }
        }
    }
    else{
        sprogene = "test" + sprogene;
        if(sprogene == "test&q=aleneOpgaver" || sprogene == "test&q=gruppeOpgaver"){
            Opgaver(sprogene, "typer");
            console.log("her");
        }else{
            Opgaver(sprogene, "sprog");
            console.log("forkert sted");
        }
        console.log("har mere end hjem og c#");
    }
} // ikke færdig her endnu

/***************************************/
/*             lave opgaver            */
/***************************************/
function Opgaver(projekt, plads){
    console.log(projekt + " = projekt");
	$.get("PHP/index.php?choice=" + projekt, function(data){
        if(data.includes("Der er ingen tilgængelig match, fra det vælgte søgresultat")){
           // mangler: så der kommer tekst        
            console.log("er ved ikke noget i søgeresultatet");
        }
        else{
            console.log("er ved, har lavet opgaver");
           let array = data.split("£");
		  
            let newLine = document.createElement("div");
            let Temp = document.getElementById(plads);
            Temp.appendChild(newLine);
            newDiv = document.createElement("div");
            newDiv.className = "clearfix";
            newLine.appendChild(newDiv);

            array.forEach(function(index){
                let temp = index.split("'");

                let div = document.createElement("div");
                div. setAttribute("id", "slet");
                div.className = "flex-item slet";
                newDiv.appendChild(div);

                let img = document.createElement("img");
                img.className = "img";
                img. setAttribute("src", temp[0]);
                img.setAttribute("alt", temp[1]);
                div.appendChild(img);

                let overskrift = document.createElement("p");
                let navn = document.createTextNode(temp[2] + "hej");
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
        }
	});
} // ikke færdig her endnu