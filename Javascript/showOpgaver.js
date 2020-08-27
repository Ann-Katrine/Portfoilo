/***************************************/
/*   html-siden bliver f5/går ind på   */
/***************************************/
function htmlOpager(){
	hide();
	sidebar();
	hjemCSharp();
}

/*********************************************/
/*   til forsiden vil kun have 3 opgaver     */
/*********************************************/
function htmlIndex(){
	Opgaver("kun3Opgaver", "3opgaver");
}

/***************************************/
/*      til starten ved htmlOpaver     */
/***************************************/
function hjemCSharp(){
	Opgaver("test&q=hjemmesideOpgaver", "start");
	Opgaver("test&q=csharpOpgaver", "start1");
}

/***************************************/
/*              objecter               */
/***************************************/
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

// array's til at finde ud af hvad der skal vises på siden
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
            getDGEBI(objSidebarProjekt[1].checkboxId).checked = false;
            projekter(id, 0);
            break;
        case "box1":
            getDGEBI(objSidebarProjekt[0].checkboxId).checked = false;
            projekter(id, 1);
            break;
        case "underbox0":
            getDGEBI(objSidebarType[1].checkboxId).checked = false;
            type(id, 0);
            break;
        case "underbox1":
            getDGEBI(objSidebarType[0].checkboxId).checked = false;
            type(id, 1);
            break;
        case "sprogBox0":
            sprog(id, 0);
            break;
        case "sprogBox1":
            sprog(id, 1);
            break;
        case "sprogBox2":
            sprog(id, 2);
            break;
        case "sprogBox3":
            sprog(id, 3);
            break;
        case "sprogBox4":
            sprog(id, 4);
            break;
        case "sprogBox5":
            sprog(id, 5);
            break;
    }
    
    // opretter projekterne
    opretOpgaver();
    
    console.log(arrayProjket + " = arrayProjket");
    console.log(arrayType + " = arrayType");
    console.log(arraySprog + " = arraySprog");
    console.log(arrayAlt + " = arrayAlt");
    console.log("____________________________");
}

// variabler med længder på objecter jeg bruger mange steder
let antalProjekt = objSidebarProjekt.length;
let antalType = objSidebarType.length;
let antalSprog = objSidebarSprog.length;

/***************************************/
/*             projekter               */
/***************************************/
function projekter(id, tal){
    // Hvis projekt's checkboxid er id'et og checkbox er checked
    if(objSidebarProjekt[tal].checkboxId === id && getDGEBI(objSidebarProjekt[tal].checkboxId).checked === true){
        // for at køre igennem alle i projekt
        for(let i = 0; i < antalProjekt; i++){
            if(getDGEBI(objSidebarType[i].checkboxId).checked === true){
                console.log("type!");
                if(objSidebarProjekt[tal].oprettet === true){
                    objSidebarProjekt[tal].tilladelse = true;  // sætter tilladelse til true, så man ikke kan oprette flere projekter 
                }
            }
        }
        
        if(objSidebarProjekt[tal].tilladelse === false){
            console.log("du er her :D, projekter");
            if(objSidebarProjekt[tal].oprettet === false){
                console.log("noget til true projekt");
                arrayProjket.push(objSidebarProjekt[tal].routing); // tilføjer hvilken den skal printe ud
                objSidebarProjekt[tal].oprettet = true;     // sætter oprettet til true, så man ikke kan oprette flere projekter 
                objSidebarProjekt[tal].firstTime = true;    // ja..
                deleteAlt("projekter", tal);
            }      
        }
    }
    // Hvis projekt's checkbox ikke er checked
    else if(getDGEBI(objSidebarProjekt[tal].checkboxId).checked === false){ 
        // så vi køre igennem alle projekter
        for(let i = 0; i < antalProjekt; i++){
            if(getDGEBI(objSidebarType[tal].checkboxId).checked === true && objSidebarProjekt[i].checkboxId === id && objSidebarProjekt[i].firstTime === true|| getDGEBI(objSidebarType[i].checkboxId).checked === true && objSidebarProjekt[i].checkboxId === id && objSidebarProjekt[i].firstTime === true){
                console.log("type");
            }
            // Hvis det ovenover ikke passer, så får man standdart siden
            else{
                for(let i = 0; i < antalProjekt; i++){
                    delete arrayProjket[i];
                    objSidebarProjekt[tal].oprettet = false;    // sætter oprettet til false, så man kan oprettet projekter igen
                    objSidebarProjekt[tal].firstTime = false;   // ja...
                }
                arrayProjket = arrayProjket.filter(function() {return true });
                objSidebarProjekt[tal].tilladelse = false;  // sætter tilladelse til false, så man kan oprette projekter igen
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
    // Hvis type's checkboxid = id'et og checkbox er checked
    if(objSidebarType[tal].checkboxId === id && getDGEBI(objSidebarType[tal].checkboxId).checked === true){
        // for at køre igennem alle projekter
        for(let i = 0; i < antalProjekt; i++){
            if(getDGEBI(objSidebarProjekt[i].checkboxId).checked === true){
                console.log("projekt");
                // hvis man allerede har oprettet 
                if(objSidebarType[tal].oprettet === true){
                    objSidebarType[tal].tilladelse = true;  // sætter tilladelse til true, så man ikke opretter flere projekter  
                }
            }
        }
        
        if(objSidebarType[tal].tilladelse === false){
            console.log("du er her :D, type:D");
            if(objSidebarType[tal].oprettet === false){
                console.log("noget til true type");
                arrayType.push(objSidebarType[tal].routing); // tilføjer hvilken den skal printe ud
                objSidebarType[tal].oprettet = true;    // sætter oprettet til true, så man ikke opretter flere projekter 
                objSidebarType[tal].firstTime = true;   // ja..
                deleteAlt("type", tal);
            }      
        }
    }
    // Hvis type checkbox ikke er checked
    else if(getDGEBI(objSidebarType[tal].checkboxId).checked === false){
        for(let i = 0; i < antalType; i++){
            if(getDGEBI(objSidebarProjekt[tal].checkboxId).checked === true && objSidebarType[i].checkboxId === id && objSidebarType[i].firstTime === true|| getDGEBI(objSidebarProjekt[i].checkboxId).checked === true && objSidebarType[i].checkboxId === id && objSidebarType[i].firstTime === true){
                console.log("projket");
                
            }
            // for hvis det ovenover ikke er sandt går den til standdart siden
            else{
                for(let i = 0; i < antalType; i++){
                    console.log("hej");
                    delete arrayType[i];    // sletter den der er på plads arrayType[i]
                    objSidebarType[tal].oprettet = false;   // sætter oprettet til flase, så man kan opretter projekter igen
                }
                deleteAlt("type", tal);
                arrayType = arrayType.filter(function() {return true}); // hvis der er ' ' i array'et så bliver det fjernet
                objSidebarType[tal].tilladelse = false; // sætter tilladelse til flase, så man kan opretter projekter igen
                objSidebarType[tal].firstTime = false;  // ja
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
    // Hvis sprog checkboxid = id'et og checkboc er checked
    if(objSidebarSprog[tal].checkboxId === id && getDGEBI(objSidebarSprog[tal].checkboxId).checked === true){
        
        if(objSidebarSprog[tal].tilladelse === false){
            console.log("du er her, sprog");
            if(objSidebarSprog[tal].oprettet === false){
                console.log("noget til true sporg");
                arraySprog.push(objSidebarSprog[tal].routing); // tilføjer hvilken den skal printe ud
                objSidebarSprog[tal].oprettet = true;   // sætter oprettet til true, for at man ikke kan oprettet flere
                objSidebarSprog[tal].firstTime = true;  // ja...
                deleteAlt("sprog", tal);
                console.log(arraySprog);
            }
        }
    }
    // Hvis sprog checkbox ikke er checked
    else if(getDGEBI(objSidebarSprog[tal].checkboxId).checked === false){
        // for at gå igennem alle projekter og typer
        for(let i = 0; i < antalProjekt; i++){
            // for at gå igennem alle sprog
            for(let j = 0; j < antalSprog; j++){
                if(getDGEBI(objSidebarType[i].checkboxId).checked === true && objSidebarSprog[j].checkboxId === id && objSidebarProjekt[i].firstTime === true|| getDGEBI(objSidebarType[i].checkboxId).checked === true && objSidebarProjekt[i].checkboxId === id && objSidebarSprog[j].firstTime === true){
                console.log("type");
                }
                else if(getDGEBI(objSidebarProjekt[i].checkboxId).checked === true && objSidebarType[i].checkboxId === id && objSidebarSprog[i].firstTime === true|| getDGEBI(objSidebarProjekt[i].checkboxId).checked === true && objSidebarType[i].checkboxId === id && objSidebarSprog[i].firstTime === true){
                    console.log("projket");
                }
                // Hvis intet af det er sandt går den til standdart siden 
                else{
                    if(objSidebarSprog[tal].firstTime === true){
                        console.log(arraySprog);
                        let sted = arraySprog.indexOf(objSidebarSprog[tal].routing) // får hvilken plads sprog er på
                        delete arraySprog[sted];    // sletter det der er på plads arraySprog[sted]
                        objSidebarSprog[tal].oprettet = false;  // sætter oprettet til false, så man kan oprette projekter igen
                        objSidebarSprog[tal].firstTime = false; // ja...
                        arraySprog = arraySprog.filter(function() {return true}); // hvis der er ' ' i array'et bliver det fjernet
                        objSidebarSprog[tal].tilladelse = false;    // sætter tilladelse til false, så man kan oprette projekter igen
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
    // Hvis omraade er sprog
    if(omraade === objSidebarSprog[tal].omraade){
        for(let i = 0;  i < antalSprog; i++){
            if(arraySprog[i] != objSidebarSprog[tal].routing){
                if(getDGEBI(objSidebarSprog[i].checkboxId).checked === false){
                    console.log("sporg slet");
                    delete arraySprog[i];   // sletter det er der på plads arraySprog[i]
                    arraySprog = arraySprog.filter(function() {return true}); // i arrayAlt hvis der er ' ' i arrayet vil det blive fjernet 
                    objSidebarSprog[i].oprettet = false;    // sætter opretteet til false, så man kan oprette sproget igen en anden gang
                }
            }
        }
    }
    // Hvis omraade er type
    else if(omraade === objSidebarType[tal].omraade){
        for(let i = 0; i < antalType; i++){
            if(arrayType[i] != objSidebarType[tal].routing){
                console.log("type slet");
                delete arrayType[i];    // sletter det er der på plads arrayType[i]
                arrayType = arrayType.filter(function() {return true}); // i arrayAlt hvis der er ' ' i arrayet vil det blive fjernet
                objSidebarType[i].oprettet = false; // sætter opretteet til false, så man kan oprette sproget igen en anden gang
            }
        }
    }
    // Hvis omraade er projekter
    else if(omraade == objSidebarProjekt[tal].omraade){
        for(let i = 0; i < antalPro; i++){
            if(arrayProjket[i] != objSidebarProjekt[tal].routing){
                console.log("projet slet");
                delete arrayProjket[i]; // sletter det er der på plads arrayProjekt[i]
                arrayProjket = arrayProjket.filter(function() {return true });  // i arrayAlt hvis der er ' ' i arrayet vil det blive fjernet
                objSidebarProjekt[i].oprettet = false;  // sætter opretteet til false, så man kan oprette sproget igen en anden gang
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
    
    // elementet bliver slettes men ikke på en god måde
    let slet = document.getElementsByClassName('slet');
    let antalslet = slet.length;
    console.log(slet);
    console.log(antalslet);
    for(let i = 0; i < antalslet; i++){
        console.log(slet[i]);
        let sletter = document.getElementById("slet");
        sletter.remove();
    }
    
    // for at finde ud af hvad den skl vise på skærmen
    if(arrayAlt == "hjemmesideOpgaver" || arrayAlt == "csharpOpgaver" || arrayAlt.length == 0){ 
        console.log("har hjemmesideOpgaver eller ikke noget");
        // Hvis intet er i arrayAlt
        if(arrayAlt.length == 0){
            hjemCSharp();
            console.log("går forkert");
        }
        // Hvis hjemmesideOpgaver eller csharpOpgaver
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
        // arrayAlt kun indhold aleneOpgaver eller gruppeOpgaver
        if(sprogene == "test&q=aleneOpgaver" || sprogene == "test&q=gruppeOpgaver"){
            Opgaver(sprogene, "typer");
            console.log("her");
        }
        // hvis den indholder alt andet
        else{
            Opgaver(sprogene, "sprog");
            console.log("forkert sted");
        }
        console.log("har mere end hjem og c#");
    }
}

/***************************************/
/*             lave opgaver            */
/***************************************/
function Opgaver(projekt, plads){
//    console.log(projekt + " = projekt");
	$.get("PHP/index.php?choice=" + projekt, function(data){
        // Hvis man ikke får et proejkt fra databasen men for en besked tilbage
        if(data.includes("Der er ingen tilgængelig match, fra det vælgte søgresultat")){
           // mangler: så der kommer tekst     
            let array = data.split("£");

            let newLine = document.createElement("div");
            let Temp = document.getElementById(plads);
            Temp.appendChild(newLine);
            let newDiv = document.createElement("div");
            newLine.appendChild(newDiv);
            
            array.forEach(function(index){
                let tekst = document.createElement("p");
                tekst.setAttribute("id", "slet");
                tekst.className = "slet";
                let teksten = document.createTextNode(index);
                tekst.appendChild(teksten);
                newDiv.appendChild(tekst);
            });
            
            
            
            console.log("er ved ikke noget i søgeresultatet");
        }
        // Hvis man har fået projekter fra databasen
        else{
            console.log("er ved, har lavet opgaver");
           let array = data.split("£");
            console.log(plads);
		  
            let newLine = document.createElement("div");
            let Temp = document.getElementById(plads);
            Temp.appendChild(newLine);
            let newDiv = document.createElement("div");
            newDiv.className = "clearfix";
            newLine.appendChild(newDiv);

            console.log(Temp);
            
            // Til et regnestykke til hvordan opgaverne skal vises
            let answer = 0;
            let consttal = 3;
            let tallet = 0;
            let tal = 0;
            
            // regner tingene ud
            tallet = array.length;
            answer = tallet % consttal;
            
            console.log(tallet + "ikke tilføjet");
            // tilføjer til array'et hbis nødvendigt
            if(answer == 1){
                array.push("");
                array.push("");
            }
            else if(answer == 2){
                array.push("");
            }
            tallet = array.length;
            console.log(tallet + "tilføjet");

            let y = 0;
            array.forEach(function(index){
                let temp = index.split("'");
                
                // gør for at der kun er 3 projekter på linje
                /*if((tal % 3) == 0){
                    y++;
                    console.log("kommer her til");
                    let div1 = document.createElement("div");
                    div1.setAttribute("id", "test" + y);
                    div1.className = "clearfix";
                    newDiv.appendChild(div1);
                }*/
                
                // hvis projekt er ligemed kun3Opgaver
                if(projekt == "kun3Opgaver"){
                    let div = document.createElement("div");
                    div.className = "flex-item color1";
                    newDiv.appendChild(div);

                    addTheRestTooOpgaver(temp, div);
                }
                // hvis det er alle andre
                else{
                    console.log(tal);
                    let div = document.createElement("div");
                    div.setAttribute("id", "slet");
                    div.className = "flex-item slet";
//                    let tempp =  document.getElementById("test" + y);
//                    tempp.appendChild(div);
                    newDiv.appendChild(div);
                    
                    // hvis tallet er 1
                    if(tallet == 1){
                        console.log(tal + " tal");
                        if(tal == tallet){
                            console.log("to væk");
                            div.className = "slet test";

                        }
                        else if(tal == tallet){
                            div.className = "slet test";
                        }
                        else{
                            addTheRestTooOpgaver(temp, div);
                        }
                    }
                    // hvis tallet er 2
                    else if(tallet == 2){
                        console.log("nope");
                        if(tal == tallet){
                            console.log("en væk");
                            div.className = "slet test";
                        }
                        else{
                            addTheRestTooOpgaver(temp, div);
                        }
                    }
                    else{
                        addTheRestTooOpgaver(temp, div);
                    }
                }
                tal++;
            });
        }
	});
}

/***************************************/
/*     til at hjælpe lave opgaver      */
/***************************************/
function addTheRestTooOpgaver(temp, div){
    let img = document.createElement("img");
    img.className = "img";
    img.setAttribute("src", temp[0]);
    img.setAttribute("alt", temp[1]);
    div.appendChild(img);

    let overskrift = document.createElement("p");
    let navn = document.createTextNode(temp[2]);
    overskrift.appendChild(navn);
    div.appendChild(overskrift);

    let dato = document.createElement("p");
    dato.className = "dato mellemrum";
    let dagensDato = document.createTextNode(temp[3]);
    dato.appendChild(dagensDato);
    div.appendChild(dato);

    let tekst = document.createElement("p");
    let alTekst = document.createTextNode(temp[4]);
    tekst.appendChild(alTekst);
    div.appendChild(tekst);
}