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

function sidebar(){
	let Newline = document.createElement("ul");
	Newline.className = "nav flex-column";
	let Temp = document.getElementById("sidebar");
	Temp.appendChild(Newline);	

	let div = document.createElement("div");
	div.setAttribute("id", "hvilkePro");
	Newline.appendChild(div);
	
	hvilketProjekt();
	
	let li = document.createElement("li");
	li.className = "nav-item";
	Newline.appendChild(li);
	
	let linje = document.createElement("hr");
	li.appendChild(linje);
	
	let div1 = document.createElement("div");
	div1.setAttribute("id", "hvilkeProType");
	Newline.appendChild(div1);
	
	hvilkenProjektType();
	
	let li1 = document.createElement("li");
	li1.className = "nav-item";
	Newline.appendChild(li1);
	
	let linje1 = document.createElement("hr");
	li1.appendChild(linje1);
	
	let div2 = document.createElement("div");
	div2.setAttribute("id", "HvilkeSprog");
	Newline.appendChild(div2);
	
	HvilketSprog();
}

function hvilketProjekt(){
	$.get("PHP/index.php?choice=overskiftType", function(data){
		let array = data.split("£");
		//console.log(array);
		
		let li = document.createElement("li");
		li.className = "nav-item";
		let Temp1 = document.getElementById("hvilkePro");
		Temp1.appendChild(li);
		
		let p = document.createElement("p");
		p.className = "tekst";
		let overskrift = document.createTextNode("Hvilket projekt");
		p.appendChild(overskrift);
		li.appendChild(p);
		
		let tal = 1;
		array.forEach(function(index){
			let value = index.split("'");
			
			let input = document.createElement("input");
			input.setAttribute("type", "checkbox");
			input.setAttribute("id", "box" +tal);
			input.setAttribute("onclick", "showAlleOpgaver('box" + tal + "')");
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

function hvilkenProjektType(){
	$.get("PHP/index.php?choice=projektType", function(data){
		let array = data.split("£");
		
		let li = document.createElement("li");
		li.className = "nav-item";
		let Temp = document.getElementById("hvilkeProType");
		Temp.appendChild(li);
		
		let p = document.createElement("p");
		p.className = "tekst";
		let overskrift = document.createTextNode("Hvilket projekt type");
		p.appendChild(overskrift);
		li.appendChild(p);
		
		let tal = 0; 
		array.forEach(function(index){
			let value = index.split("'");
			
			let input = document.createElement("input");
			input.setAttribute("type", "checkbox");
			input.setAttribute("id", "underbox" +tal);
			input.setAttribute("onclick", "showAlleOpgaver('underbox" + tal + "')");
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

function HvilketSprog(){
	$.get("PHP/index.php?choice=Sprog", function(data){
		let array = data.split("£");
		
		let li = document.createElement("li");
		li.className = "nav-item";
		let Temp = document.getElementById("HvilkeSprog");
		Temp.appendChild(li);
		
		let p = document.createElement("p");
		p.className = "tekst";
		let overskrift = document.createTextNode("Hvilket sprog");
		p.appendChild(overskrift);
		li.appendChild(p);
		
		let tal = 0;
		array.forEach(function(index){
			let value = index.split("'");
			
			let input = document.createElement("input");
			input.setAttribute("type", "checkbox");
			input.setAttribute("id", "sprogBox" +tal);
			input.setAttribute("onclick", "showAlleOpgaver('sprogBox" + tal + "')");
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