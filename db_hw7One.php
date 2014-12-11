<html>
<head>
  <link href="db_hw7.css" rel="stylesheet" type="text/css" >
  <title>Pokemon UI</title>
</head>
<body>
<h3>Pokemon - RESULTS TWO</h3>
<hr />
    <?php
		
		
        $sort = $_POST['sortKeyOne'];
    	$ordering = $_POST['orderOne'];
    	$sortArtist = $_POST['sortKeyphp'];
    	
    	//print("<p>Pokemon Under Construction</p>\n");
    	/*set up config file */
    	include('/home/spv224/scrolls/poke_security_config.php');

/*
		$db_type           = "mysql";
		$db_server         = "your_database_host_name";
		$db_name           = "your_database_name";
		$db_user           = "your_cims_login";
		$db_password       = "your_database_password";*/

		
    	$db_link= mysqli_connect($db_server,$db_user,$db_password,$db_name);
    	    	

 	   if (!$db_link){    		
    		die("Cannot connect!!!".mysqli_error());
    	}
    	else{
    		print("<p>Welcome to the Pokemon Pricing database</p>");
	
		if($sort=='allPsa'){
			$pokemon_number='pokemon_id';
	    	$q = "SELECT pokemon_id,pokemon_image,pokemon_name,pokemon_setName,pokemon_year,CONCAT(artist_firstName,'--',artist_lastName) AS Artist,psa_nine_price,psa_ten_price
	   					FROM pokemon_english_basefirstedition_Table,priceTable,artistTable
	   					WHERE pokemon_english_basefirstedition_Table.pokemon_id=priceTable.price_id
	   					AND pokemon_english_basefirstedition_Table.pokemon_id=artistTable.artist_id
    				ORDER BY $pokemon_number $ordering";	
	    	// print the query for testing purposes
    		//print("<p>Query: $q</p>\n");
    		$r = mysqli_query($db_link, $q);
			$n = mysqli_num_rows($r); 	
    		//print("<p>$n rows found.</p>\n");
    		
    		/*//////////////////PHP FORM////////////////////*/
    		print("<p>Sort By Artist</p>");
    		print("<form action='db_hw7One.php' method='post'>");
				print("<select name='sortKeyphp'>");
					print("<option value='ken'>Ken Sugimori</option>");
					print("<option value='mit'>Mitsuhiro Arita</option>");
				print("</select>");
				print("<input type='submit' value='Submit'>");
				print("<input type='reset' value='Cancel'>");
			print("</form>");
			/*//////////////////PHP FORM////////////////////*/


			$counter=0;	
			print("<table class='pokeOne'>");
			while ($row = mysqli_fetch_row($r))   {
				print("<td>$row[0]</td>\n");
				print("<td><img src='$row[1]'></td>\n");
				print("<td>$row[2]</td>\n");
				print("<td>$row[3]</td>\n");
				print("<td>$row[4]</td>\n");
				print("<td>PSA 9: $$row[5]</td>\n");
				print("<td>PSA 10: $$row[6]</td><tr>\n");
 			}
 			print("</table>");
 			print("<p><a href='db_hw7.html'>Homepage</a></p>");

			}
			
		else if($sort=='psaTen'){
			$pricing='psa_ten_price';
	    	$q = "SELECT pokemon_id,pokemon_image,pokemon_name,pokemon_setName,pokemon_year,CONCAT(artist_firstName,'--',artist_lastName) AS Artist,psa_ten_price
	   					FROM pokemon_english_basefirstedition_Table,priceTable,artistTable
	   					WHERE pokemon_english_basefirstedition_Table.pokemon_id=priceTable.price_id
	   					AND pokemon_english_basefirstedition_Table.pokemon_id=artistTable.artist_id
    				ORDER BY $pricing $ordering";	
	    	// print the query for testing purposes
	    	
	    	    		/*//////////////////PHP FORM////////////////////*/
    		print("<p>Sort By Artist</p>");
    		print("<form action='db_hw7One.php' method='post'>");
				print("<select name='sortKeyphp'>");
					print("<option value='ken'>Ken Sugimori</option>");
					print("<option value='mit'>Mitsuhiro Arita</option>");
				print("</select>");
				print("<input type='submit' value='Submit'>");
				print("<input type='reset' value='Cancel'>");
			print("</form>");
			/*//////////////////PHP FORM////////////////////*/
			
    		//print("<p>Query: $q</p>\n");
    		$r = mysqli_query($db_link, $q);
			$n = mysqli_num_rows($r); 	
    		//print("<p>$n rows found.</p>\n");

			$counter=0;	
			print("<table class='pokeOne'>");			
			while ($row = mysqli_fetch_row($r))   {
				print("<td>$row[0]</td>\n");
				print("<td><img src='$row[1]'></td>\n");
				print("<td>$row[2]</td>\n");
				print("<td>$row[3]</td>\n");
				print("<td>$row[4]</td>\n");
				print("<td>$row[5]</td>\n");
				print("<td>PSA 10: $$row[6]</td><tr>\n");
 			}
 			print("</table>");
 			print("<p><a href='db_hw7.html'>Homepage</a></p>");	
			}	
			
		else if($sort=='psaNine'){
			$pricing='psa_nine_price';
	    	$q = "SELECT pokemon_id,pokemon_image,pokemon_name,pokemon_setName,pokemon_year,CONCAT(artist_firstName,'--',artist_lastName) AS Artist,psa_nine_price
	   					FROM pokemon_english_basefirstedition_Table,priceTable,artistTable
	   					WHERE pokemon_english_basefirstedition_Table.pokemon_id=priceTable.price_id
	   					AND pokemon_english_basefirstedition_Table.pokemon_id=artistTable.artist_id
    				ORDER BY $pricing $ordering";	
	    	// print the query for testing purposes
	    	
	    	    		/*//////////////////PHP FORM////////////////////*/
    		print("<p>Sort By Artist</p>");
    		print("<form action='db_hw7One.php' method='post'>");
				print("<select name='sortKeyphp'>");
					print("<option value='ken'>Ken Sugimori</option>");
					print("<option value='mit'>Mitsuhiro Arita</option>");
				print("</select>");
				print("<input type='submit' value='Submit'>");
				print("<input type='reset' value='Cancel'>");
			print("</form>");
			/*//////////////////PHP FORM////////////////////*/
			
    		//print("<p>Query: $q</p>\n");
    		$r = mysqli_query($db_link, $q);
			$n = mysqli_num_rows($r); 	
    		//print("<p>$n rows found.</p>\n");

			$counter=0;	
			print("<table class='pokeOne'>");			
			while ($row = mysqli_fetch_row($r))   {
				print("<td>$row[0]</td>\n");
				print("<td><img src='$row[1]'></td>\n");
				print("<td>$row[2]</td>\n");
				print("<td>$row[3]</td>\n");
				print("<td>$row[4]</td>\n");
				print("<td>$row[5]</td>\n");
				print("<td>PSA 9: $$row[6]</td><tr>\n");
 			}
 			print("</table>");
 			print("<p><a href='db_hw7.html'>Homepage</a></p>");	
			}	
		
		else if($sortArtist=='ken'){
			print("<p>Your results are specified to Pokemon Illustrator Ken Sugimori</p>");
			
	    	$q = "SELECT pokemon_id,pokemon_image,pokemon_name,pokemon_setName,pokemon_year,CONCAT(artist_firstName,'--',artist_lastName) AS Artist,psa_nine_price,psa_ten_price
	   					FROM pokemon_english_basefirstedition_Table,priceTable,artistTable
	   					WHERE pokemon_english_basefirstedition_Table.pokemon_id=priceTable.price_id
	   					AND pokemon_english_basefirstedition_Table.pokemon_id=artistTable.artist_id
	   					AND artistTable.artist_firstName='ken'
    				";	
	    	// print the query for testing purposes
    		//print("<p>Query: $q</p>\n");
    		$r = mysqli_query($db_link, $q);
			$n = mysqli_num_rows($r); 	
    		//print("<p>$n rows found.</p>\n");
    		
    		/*//////////////////PHP FORM////////////////////*/
    		print("<p>Sort By Artist</p>");
    		print("<form action='db_hw7One.php' method='post'>");
				print("<select name='sortKeyphp'>");
					print("<option value='ken'>Ken Sugimori</option>");
					print("<option value='mit'>Mitsuhiro Arita</option>");
				print("</select>");
				print("<input type='submit' value='Submit'>");
				print("<input type='reset' value='Cancel'>");
			print("</form>");
			/*//////////////////PHP FORM////////////////////*/

			$counter=0;	
			print("<table class='pokeOne'>");			
			while ($row = mysqli_fetch_row($r))   {
				print("<td>$row[0]</td>\n");
				print("<td><img src='$row[1]'></td>\n");
				print("<td>$row[2]</td>\n");
				print("<td>$row[3]</td>\n");
				print("<td>$row[4]</td>\n");
				print("<td>$row[5]</td>\n");
				print("<td>PSA 9: $$row[6]</td>\n");
				print("<td>PSA 10: $$row[7]</td><tr>\n");
 			}
 			print("</table>");	
			print("<p><a href='db_hw7.html'>Homepage</a></p>");
			
		}
		
		else if($sortArtist=='mit'){
			print("<p>Your results are specified to Pokemon Illustrator Mitsuhiro Arita</p>");
			
	    	$q = "SELECT pokemon_id,pokemon_image,pokemon_name,pokemon_setName,pokemon_year,CONCAT(artist_firstName,'--',artist_lastName) AS Artist,psa_nine_price,psa_ten_price
	   					FROM pokemon_english_basefirstedition_Table,priceTable,artistTable
	   					WHERE pokemon_english_basefirstedition_Table.pokemon_id=priceTable.price_id
	   					AND pokemon_english_basefirstedition_Table.pokemon_id=artistTable.artist_id
	   					AND artistTable.artist_firstName='mitsuhiro'
    				";	
	    	// print the query for testing purposes
    		//print("<p>Query: $q</p>\n");
    		$r = mysqli_query($db_link, $q);
			$n = mysqli_num_rows($r); 	
    		//print("<p>$n rows found.</p>\n");
    		
    		/*//////////////////PHP FORM////////////////////*/
    		print("<p>Sort By Artist</p>");
    		print("<form action='db_hw7One.php' method='post'>");
				print("<select name='sortKeyphp'>");
					print("<option value='ken'>Ken Sugimori</option>");
					print("<option value='mit'>Mitsuhiro Arita</option>");
				print("</select>");
				print("<input type='submit' value='Submit'>");
				print("<input type='reset' value='Cancel'>");
			print("</form>");
			/*//////////////////PHP FORM////////////////////*/

			$counter=0;	
			print("<table class='pokeOne'>");			
			while ($row = mysqli_fetch_row($r))   {
				print("<td>$row[0]</td>\n");
				print("<td><img src='$row[1]'></td>\n");
				print("<td>$row[2]</td>\n");
				print("<td>$row[3]</td>\n");
				print("<td>$row[4]</td>\n");
				print("<td>$row[5]</td>\n");
				print("<td>PSA 9: $$row[6]</td>\n");
				print("<td>PSA 10: $$row[7]</td><tr>\n");
 			}
 			print("</table>");	
			print("<p><a href='db_hw7.html'>Homepage</a></p>");
			
		}	
			
    	}
	
    mysqli_free_result($r);	
	mysqli_close($db_link);
 	
    ?>

</body>
</html>