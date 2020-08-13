function toggleSidebar() {
	$(".side1").toggleClass("hide");
}

function hide(){
	if($(".side1").hasClass("hide"))
	{
		$(".hide_and_seek").show();
		$(".hide_and_seek1").hide(); 
	}
	else
	{
	   $(".hide_and_seek").hide();
	   $(".hide_and_seek1").show();
	}
	
	
}

let arrayOverskrift = ["Hvilket projekt", "Hvilket projekt type", "Hvilket sprog"];

function sidebar(){
	let Newline = document.createElement("ul");
	Newline.className = "nav flex-column";
	let Temp = document.getElementById("sidebar");
	Temp.appendChild(Newline);	

	let div = document.createElement("div");
	div.setAttribute("id", "hvilkePro");
	Newline.appendChild(div);
	
	opretCheckbox("overskiftType", "hvilkePro", arrayOverskrift[0] , "box");
	
	let li = document.createElement("li");
	li.className = "nav-item";
	Newline.appendChild(li);
	
	let linje = document.createElement("hr");
	li.appendChild(linje);
	
	let div1 = document.createElement("div");
	div1.setAttribute("id", "hvilkeProType");
	Newline.appendChild(div1);
	
	opretCheckbox("projektType", "hvilkeProType", arrayOverskrift[1], "underbox");
	
	let li1 = document.createElement("li");
	li1.className = "nav-item";
	Newline.appendChild(li1);
	
	let linje1 = document.createElement("hr");
	li1.appendChild(linje1);
	
	let div2 = document.createElement("div");
	div2.setAttribute("id", "HvilkeSprog");
	Newline.appendChild(div2);
	
	opretCheckbox("Sprog", "HvilkeSprog", arrayOverskrift[2], "sprogBox");
}

function opretCheckbox(routing, id, overskriftText, showOpgave){
	$.get("PHP/index.php?choice=" + routing, function(data){ // her
		let array = data.split("£");
		//console.log(array);
		
		let li = document.createElement("li");
		li.className = "nav-item";
		let Temp1 = document.getElementById(id); // her
		Temp1.appendChild(li);
		
		let p = document.createElement("p");
		p.className = "tekst";
		let overskrift = document.createTextNode(overskriftText); // her
		p.appendChild(overskrift);
		li.appendChild(p);
		
		let tal = 0;
		array.forEach(function(index){
			let value = index.split("'");
			
			let input = document.createElement("input");
			input.setAttribute("type", "checkbox");
			input.setAttribute("id", showOpgave +tal);
			input.setAttribute("onclick", "showAlleOpgaver('" + showOpgave +  tal + "')"); // her
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