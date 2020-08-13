<?php
	//forbind til database
	$mysqli = new mysqli("localhost", "xann06.skp-dp", "z523qzk4", "xann06_skp_dp_sde_dk");
	if($mysqli->connect_error)
	{
		exit('Could not connect');
	}
	$mysqli -> set_charset("utf8");

	//Får data fra database
	$sql = "SELECT * FROM `Portfolie_Projekt` ORDER BY ProjektId DESC LIMIT 3";

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
?>