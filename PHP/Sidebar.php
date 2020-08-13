<?php
	//projekt - skal projekter
	if($_GET["opg"] == "skal_opgaver")
	{
		//forbind til database
		$mysqli = new mysqli("localhost", "xann06.skp-dp", "z523qzk4", "xann06_skp_dp_sde_dk");
		if($mysqli->connect_error)
		{
			exit('Could not connect');
		}

		//gør sådan at der ikke er spørgsmålstegn hvor der er æ,ø,å  
		$mysqli -> set_charset("utf8");

		//Får data fra database
		$sql = "SELECT * FROM Portfolie_Projekt WHERE ProjektType = 1";

		//Viser det data vi får fra databasen	
		$result = $mysqli->query($sql);
		if($result->num_rows > 0)
		{
			$x = 0;
			while($row = $result->fetch_assoc())
			{
				echo $row["link"], "'";
				echo $row["Billede"], "'";
				echo $row["Navn"], "'";
				$x++;
				if($x == ($result->num_rows))
				{
					echo $row["Beskrivelse"];	
				}
				else
				{
					echo $row["Beskrivelse"], ":";	
				}
			}
		}
		else
		{
			echo "0 results";
		}
	}
	
	//projekt - mine projekter
	if($_GET["opg"] == "mine_opgaver")
	{
		//forbind til database
		$mysqli = new mysqli("localhost", "xann06.skp-dp", "z523qzk4", "xann06_skp_dp_sde_dk");
		if($mysqli->connect_error)
		{
			exit('Could not connect');
		}

		//gør sådan at der ikke er spørgsmålstegn hvor der er æ,ø,å  
		$mysqli -> set_charset("utf8");

		//Får data fra database
		$sql = "SELECT * FROM Portfolie_Projekt WHERE ProjektType = 2";

		//Viser det data vi får fra databasen	
		$result = $mysqli->query($sql);
		if($result->num_rows > 0)
		{
			$x = 0;
			while($row = $result->fetch_assoc())
			{
				echo $row["link"], "'";
				echo $row["Billede"], "'";
				echo $row["Navn"], "'";
				$x++;
				if($x == ($result->num_rows))
				{
					echo $row["Beskrivelse"];	
				}
				else
				{
					echo $row["Beskrivelse"], ":";	
				}
			}
		}
		else
		{
			echo "0 results";
		}	
	}
?>