// test -------------------------------------

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


// test slut --------------------------------------

var objSidebarProjekt = [
	{
	checkboxId: 'box1',
	stedId: 'start',
	omraade: 'projekter',
	oprettet: 'false',
	tilstand: 'false'
	}, 
	{
	checkboxId: 'box2',
	stedId: 'start1',
	omraade: 'projekter',
	oprettet: 'false',
	tilstand: 'false'
	}
];

var objSidebarType = [
	{
	checkboxId: 'underbox0',
	stedId: 'alene',
	omraade: 'type',
	oprettet: 'false',
	tilstand: 'false'
	},
	{
	checkboxId: 'underbox1',
	stedId: 'gruppe',
	omraade: 'type',
	oprettet: 'false',
	tilstand: 'false'
	}
	];

var objSidebarSprog = [
	{
	checkboxId: 'sprogBox0',
	stedId: 'sprogBox0',
	omraade: 'sprog',
	oprettet: 'false',
	tilstand: 'false'
	},
	{
	checkboxId: 'sprogBox1',
	stedId: 'sprogBox1',
	omraade: 'sprog',
	oprettet: 'false',
	tilstand: 'false'
	},
	{
	checkboxId: 'sprogBox2',
	stedId: 'sprogBox2',
	omraade: 'sprog',
	oprettet: 'false',
	tilstand: 'false'
	},
	{
	checkboxId: 'sprogBox3',
	stedId: 'sprogBox3',
	omraade: 'sprog',
	oprettet: 'false',
	tilstand: 'false'
	},
	{
	checkboxId: 'sprogBox4',
	stedId: 'sprogBox4',
	omraade: 'sprog',
	oprettet: 'false',
	tilstand: 'false'
	},
	{
	checkboxId: 'sprogBox5',
	stedId: 'sprogBox5',
	omraade: 'sprog',
	oprettet: 'false',
	tilstand: 'false'
	}];


let antal = objSidebar.length;
for(let i = 0; i < antal; i++){
	if(getDGEBI(arrayCheckbox[i]) && getDGEBI(arrayCheckbox[i]).checked === true && id == i){
		
		if(getDGEBI(arrayCheckbox[i]) && i != 1 && 1 != 2){
			projekterAndType(id, objSidebar[i].omraade, objSidebar[i].stedId);
			getDGEBI
		}
	}
}