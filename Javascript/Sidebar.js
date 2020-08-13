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

function Choice() {
	var checkbox2 = document.getElementById("box1");
	
	//projekt - mine projekter
	if(checkbox2.checked === true)
	{
		/*alert("virker");*/
		$(".123").hide();
		
		$.get("PHP/Sidebar.php?opg=mine_opgaver", function(data){
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
					var Temp = document.getElementById("pro");
					Temp.appendChild(NewLine);
					NewDiv = document.createElement("div");
					NewDiv.className = "clearfix";
					NewDiv.setAttribute("id", "divrow"+y);
					NewLine.appendChild(NewDiv);
				}

				/* Må ikke slettet eller skal du give en eller anden den størreste is du kan finde inde for 1 km */
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
	else 
	{
		$(".hide_alt1").html("");
		$(".123").show();
	}	
}

function Choice1(){
	var checkbox1 = document.getElementById("box");
	
	// projekt - skal projekter
	if(checkbox1.checked === true)
	{
		/*alert("virker");*/
		$(".123").hide();
		
		$.get("PHP/Sidebar.php?opg=skal_opgaver", function(data){
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
					var Temp = document.getElementById("projekter");
					Temp.appendChild(NewLine);
					NewDiv = document.createElement("div");
					NewDiv.className = "clearfix";
					NewDiv.setAttribute("id", "divrow"+y);
					NewLine.appendChild(NewDiv);
				}

				/* Må ikke slettet eller skal du give en eller anden den størreste is du kan finde inde for 1 km */
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
	else
	{
		$(".hide_alt").html("");
		$(".123").show();
	}
}
