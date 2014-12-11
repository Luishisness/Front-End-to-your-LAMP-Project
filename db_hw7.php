<html>
<head>
  <link href="db_hw7.css" rel="stylesheet" type="text/css" >
  <title>Pokemon UI</title>
</head>
<body>
<h3>Pokemon - RESULTS ONE</h3>
<hr />
    <?php
		
        $sort = $_POST['sortKey'];
    	$ordering = $_POST['order'];
    	
    	print("<p>Welcome to the Pokemon Database</p>\n");
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
    		//print("<p>We have connected to the database</p>");
	
			if( $sort==1999){
			$pokemon_number='pokemon_id';
	    	$q = "SELECT pokemon_id,pokemon_image,pokemon_name,pokemon_setName,pokemon_year,CONCAT(artist_firstName,'--',artist_lastName) AS Artist,pokemon_link
	   					FROM pokemon_english_basefirstedition_Table,artistTable
	   					WHERE pokemon_english_basefirstedition_Table.pokemon_id=artistTable.artist_id
    				ORDER BY $pokemon_number $ordering";	
	    	// print the query for testing purposes
    		// print("<p>Query: $q</p>\n");
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
 			     	print("<td><a href='$row[6]'>bulbapedia</a></td><tr>\n");
  
 				}
 			print("</table>");
 			print("<p><a href='db_hw7.html'>Homepage</a></p>");	
 			}
 			
 			else if( $sort==1996){
			$pokemon_number='pokemon_id';
	    	$q = "SELECT pokemon_id,pokemon_image,pokemon_name,pokemon_setName,pokemon_year,CONCAT(artist_firstName,'--',artist_lastName) AS Artist,pokemon_link
	   					FROM pokemon_japanese_baseerror_Table,artistTable
	   					WHERE pokemon_japanese_baseerror_Table.pokemon_id=artistTable.artist_id
    				ORDER BY $pokemon_number $ordering";	
	    	// print the query for testing purposes
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
 			     	print("<td><a href='$row[6]'>bulbapedia</a></td><tr>\n");
  
 				}
 			print("</table>");	
 			print("<p><a href='db_hw7.html'>Homepage</a></p>");
 			}
 			
 			else if( $sort=='allPokemon') {
 			$pokemon_number='pokemon_id';
			//$year='pokemon_year';
			
	    	$q = "SELECT pokemon_id,pokemon_image,pokemon_name,pokemon_setName,pokemon_year,CONCAT(artist_firstName,'--',artist_lastName) AS Artist,pokemon_link
	   					FROM pokemon_english_basefirstedition_Table,artistTable
	   					WHERE pokemon_english_basefirstedition_Table.pokemon_id=artistTable.artist_id
    				ORDER BY $pokemon_number $ordering";	
    				
    				$qOne = "SELECT pokemon_id,pokemon_image,pokemon_name,pokemon_setName,pokemon_year,artist_firstName,pokemon_link
	   					FROM pokemon_japanese_baseerror_Table,artistTable
	   					WHERE pokemon_japanese_baseerror_Table.pokemon_id=artistTable.artist_id
    				ORDER BY $pokemon_number $ordering";	
    				
	
	    	// print the query for testing purposes
    		//print("<p>Query: $q</p>\n");
    		
    		$r = mysqli_query($db_link, $q);
			$n = mysqli_num_rows($r); 
			$rOne = mysqli_query($db_link, $qOne);
			$nOne = mysqli_num_rows($rOne);	
			$rower=$n + $nOne;
    		//print("<p>$rower rows found.</p>\n");

				$counter=0;	
				print("<table class='pokeOne'>");			
				while ($row = mysqli_fetch_row($r))   {
					print("<td>$row[0]</td>\n");
					print("<td><img src='$row[1]'></td>\n");
 				 	print("<td>$row[2]</td>\n");
 			     	print("<td>$row[3]</td>\n");
 			     	print("<td>$row[4]</td>\n");
 			     	print("<td>$row[5]</td>\n");
 			     	print("<td><a href='$row[6]'>bulbapedia</a></td><tr>\n");
 			     	
 			     	while ($row = mysqli_fetch_row($rOne))   {
						print("<td>$row[0]</td>\n");
						print("<td><img src='$row[1]'></td>\n");
 				 		print("<td>$row[2]</td>\n");
 			     		print("<td>$row[3]</td>\n");
 			     		print("<td>$row[4]</td>\n");
 			     		print("<td>$row[5]</td>\n");
 			     		print("<td><a href='$row[6]'>bulbapedia</a></td><tr>\n");
  
 					}
  
 				}
 				
 			print("</table>");	
			print("<p><a href='db_hw7.html'>Homepage</a></p>");
 			
 			}

    	}
    	 
   // mysqli_free_result($rOne);			
    mysqli_free_result($r);	
	mysqli_close($db_link);
 	
    ?>

</body>
</html>