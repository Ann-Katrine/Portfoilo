function Show_opgaver(){
	$.get("PHP/Show_C.php?q=d", function(data){
		var $array = data.split(":");
		var x = 0;
		var y = 0;
		$array.forEach(function(index)
		{
			var $temp = index.split("'");
			if((x % 3) == 0)
			{
				y++;
				NewLine = document.createElement("div");
				NewLine.setAttribute("id", "divflex"+x);
				var Temp = document.getElementById("start1");
				Temp.appendChild(NewLine);
				NewDiv = document.createElement("div");
				NewDiv.className = "clearfix";
				NewDiv.setAttribute("id", "divrow"+y);
				NewLine.appendChild(NewDiv);
			}
			
			var div = document.createElement("div");
			div.className = "flex-item";
			var temp =  document.getElementById("divrow"+(y));
			temp.appendChild(div);
			
			var img = document.createElement("img");
			img.className = "img";
			img.setAttribute("src", $temp[0]);
			img.setAttribute("alt", "en opgave" +x);
			div.appendChild(img);
			
			var p1 = document.createElement("p");
			var node = document.createTextNode($temp[1]);
			p1.appendChild(node);
			div.appendChild(p1);
			
			var p2 = document.createElement("p");
			var node = document.createTextNode($temp[2]);
			p2.appendChild(node);
			div.appendChild(p2);
			x++;
			
		});
	});
}

function Show_opgave1(){
	$.get("PHP/Show_hjemmeside.php?q=d", function(data){
		var $array = data.split(":");
		var x = 0;
		var y = 0;
		$array.forEach(function(index)
		{
			var $temp = index.split("'");
			if((x % 3) == 0)
			{
				y++;
				NewLine = document.createElement("div");
				NewLine.setAttribute("id", "divflex"+x);
				var Temp = document.getElementById("start");
				Temp.appendChild(NewLine);
				NewDiv = document.createElement("div");
				NewDiv.className = "clearfix";
				NewDiv.setAttribute("id", "divrow"+y);
				NewLine.appendChild(NewDiv);
			}
			
			/* Må ikke slettet eller skal du give en eller anden den størreste is du kan finde */
			if($temp[0] === "http")
				return true;
			
			var div = document.createElement("div");
			div.className = "flex-item";
			var temp =  document.getElementById("divrow"+(y));
			temp.appendChild(div);
			
			var a = document.createElement("a");
			a.setAttribute("href", $temp[0]);
			div.appendChild(a);			
			
			var img = document.createElement("img");
			img.className = "img";
			img.setAttribute("src", $temp[1]);
			img.setAttribute("alt", "en opgave" +x);
			a.appendChild(img);
			
			var p1 = document.createElement("p");
			var node = document.createTextNode($temp[2]);
			p1.appendChild(node);
			div.appendChild(p1);
			
			var p2 = document.createElement("p");
			var node = document.createTextNode($temp[3]);
			p2.appendChild(node);
			div.appendChild(p2);
			x++;
		});
	});
}

function Show_3_opgaver(){
	$.get("PHP/Show_3_opgaver.php?q=d", function(data){
		var $array = data.split(":");
		var x = 0;
		var y = 0;
		$array.forEach(function(index)
		{
			var $temp = index.split("'");
			if((x % 3) == 0)
			{
				y++;
				NewLine = document.createElement("div");
				NewLine.setAttribute("id", "divflex"+x);
				var Temp = document.getElementById("3opgaver");
				Temp.appendChild(NewLine);
				NewDiv = document.createElement("div");
				NewDiv.className = "clearfix";
				NewDiv.setAttribute("id", "divrow"+y);
				NewLine.appendChild(NewDiv);
			}
			
			/* Må ikke slettet eller skal du give en eller anden den størreste is du kan finde */
			if($temp[0] === "http")
				return true;
			
			var div = document.createElement("div");
			/*div.className = "flex-item";*/
			div.setAttribute("class", "flex-item color1");
			var temp =  document.getElementById("divrow"+(y));
			temp.appendChild(div);
			
			var a = document.createElement("a");
			a.setAttribute("href", $temp[0]);
			div.appendChild(a);
			
			var img = document.createElement("img");
			img.className = "img";
			img.setAttribute("src", $temp[1]);
			img.setAttribute("alt", "en opgave" +x);
			a.appendChild(img);
			
			var p1 = document.createElement("p");
			var node = document.createTextNode($temp[2]);
			p1.appendChild(node);
			div.appendChild(p1);
			
			var p2 = document.createElement("p");
			var node = document.createTextNode($temp[3]);
			p2.appendChild(node);
			div.appendChild(p2);
			x++;
			
		});
	});
}

