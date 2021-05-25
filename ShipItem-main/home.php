<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="home.css">
</head>

<body>
			<!-- verifying the user and printing the first name after login -->
			<?php
			
			    include('dbconnection.php');


			   	//Variable Assignment
				$email= $_POST['email'];
				$password= $_POST['pass'];
				// echo $email;
				// echo $password;

				// echo "<h2>Welcome... $email, the Cust/Trav user!</h2>"."<br>";
				
				$query = "SELECT * FROM USER_INFO where EMAIL = '$email' and PASSWORD = '$password' " ;	
				$result = mysqli_query($conn,$query);
				$row = mysqli_fetch_assoc($result);
				$firstname = $row['FIRSTNAME'];
				$GLOBALS['userID'] = $row['USER_ID'];
				// echo $userID;
				


				if(!$result){
						die("Query Failed!");
					}
					else
						{
							// echo "query successful!";
						}

				// echo "EMAIL:". $row['EMAIL']."<br>"."PASSWORD:". $row['PASSWORD'];
			

				
					// SESSION STARTED
				session_start();

				if(isset($_SESSION['firstname'])){
    
					// echo "You are logged-in";
				}

				else{
				// *************************************************


				if($row['EMAIL']==$email && $row['PASSWORD']==$password){
			            // echo "<br>"."Hey ". $row['FIRSTNAME'].",";
						$_SESSION['firstname']=$firstname;
			        }
			   	else
			       	   {
			            echo "login Failure!";
				    	header("Location: error.html");
				    exit();
			        }
			    } 
			        // mysqli_close($conn);
			?> 


			<div class="tab">
			<button class="tablink" onclick="openPage('Home', this, 'orange')" id="defaultOpen">Home</button>
			<button class="tablink" onclick="openPage('travel-info', this, 'orange')" >Traveler Info</button>
			<button class="tablink" onclick="openPage('customer-info', this, 'orange')" >Customer Info</button>
			<button class="tablink" name="logout" onclick="window.location.href='logout.php'" >Log out</button>
			</div>
			<!-- <button class="tablink" onclick="openPage('Contact', this, 'blue')">Contact</button>
			<button class="tablink" onclick="openPage('About', this, 'orange')">About</button>
 -->
			<div id="Home" class="tabcontent">
			  	<?php
					include('dbconnection.php');
					if(isset($_POST['travelInfo'])){
									$GLOBALS['userID'] = $_POST['userid'];
									$query = "SELECT * FROM USER_INFO where USER_ID = '$userID'" ;	
									$result = mysqli_query($conn,$query);
									$row = mysqli_fetch_assoc($result);
									$firstname = $row['FIRSTNAME'];
									// $_COOKIE['userID'] = $row['USER_ID'];
							}

					 if(isset($_POST['customerInfo'])){
									$GLOBALS['userID'] = $_POST['userid'];
									$query = "SELECT * FROM USER_INFO where USER_ID = '$userID'" ;	
									$result = mysqli_query($conn,$query);
									$row = mysqli_fetch_assoc($result);
									$firstname = $row['FIRSTNAME'];
									// $_COOKIE['userID'] = $row['USER_ID'];
							}

				?>
			  	<h3><?php echo "<br>"."Hey ". $firstname.","; ?></h3>

			  	<div class="user-container">
					
					<div class="traveler-container">
						 <form method="post">
                
			                <h4 class="text-center"><strong>Are</strong> you a Traveler?</h4>			                			            
			                <input type="hidden" name="userid" value="<?php echo htmlspecialchars($userID);?>"></input>

			                <label>Enter your travel information,</label>
			      				 
			                <div class="form-group"><input class="form-control1" type="text" name="sourceAddress" placeholder="Source Street Address"  required></div>
			                <div class="form-group"><input class="form-control2" type="text" name="sourceCity" placeholder="Source City"  required></div>
			                <div class="form-group"><input class="form-control2" type="text" name="sourceState" placeholder="Source State" required></div>
			                <div class="form-group"><input class="form-control2" type="text" name="sourceCountry" placeholder="Source Country"  required></div>
			                <div class="form-group"><input class="form-control2" type="text" name="sourceZipcode" placeholder="Source Zipcode"  required></div>

			                <div class="form-group"><input class="form-control1" type="text" name="destAddress" placeholder="Destination Street Address"  required></div>
			                <div class="form-group"><input class="form-control2" type="text" name="destCity" placeholder="Destination City"  required></div>
			                <div class="form-group"><input class="form-control2" type="text" name="destState" placeholder="Destination State" required></div>
			                <div class="form-group"><input class="form-control2" type="text" name="destCountry" placeholder="Destination Country"  required></div>
			                <div class="form-group"><input class="form-control2" type="text" name="destZipcode" placeholder="Destination Zipcode"  required></div>

			                			                
			                <div class="form-group"><input class="form-control2" type="Number" name="weight" placeholder="Max. Weight (in lb's)"  required></div>
			                
			                <div class="form-group"><input class="form-control2" type="text" name="size" placeholder="Expected parcel size (L*B*H)" ></div>

			                <div class="form-group"><input class="form-control2" type="number" name="price" placeholder="Expected Price (in $)" required></div>

			                <div class="block">
			                <label for="tavel_type">Choose Travel Type:</label>
			                <select id="travel_type" name="travel_type" class="form-control1">
							    <option value="Air">Air</option>
							    <option value="Road">Road</option>
							    <option value="Sea">Sea</option>
							    <option value="Rail">Railway</option>
  							</select>
  							</div>

  							<div class="block">
			                	<label>Departure Date: <input class="form-control1" type="date" name="dept_date">
								  </label>
			                </div>

			                <div class="block">
			                	<label>Arrival Date: <input class="form-control1" type="date" name="arriv_date">
								  </label>
			                </div>
			                <div class="form-group">
			        		<button class="btn-primary" type="submit" name="travelInfo">Submit Travel Info</button>
			        	    </div>


			             </form>


						<!-- traveler data insert query -->
						<?php 
							
							function travelRow(){
							include('dbconnection.php');
								
								// echo "Verifying your Database Connection......."."<br>";
								// if (mysqli_connect_errno())
								// {
								// echo "Failed to connect to MySQL: " . mysqli_connect_error();
								// }
								// else{
								// echo "Connection successful!"."<br>";
								// 	}

								//Variable Assignment TRAVELER INFO
								$userID = $_POST['userid'];
								$sourceAddress= $_POST['sourceAddress'];
								$sourceCity= $_POST['sourceCity'];
								$sourceState = $_POST['sourceState'];
								$sourceCountry = $_POST['sourceCountry'];
								$sourceZipcode = $_POST['sourceZipcode'];
								$destAddress = $_POST['destAddress'];
								$destCity = $_POST['destCity'];
								$destState = $_POST['destState'];
								$destCountry = $_POST['destCountry'];
								$destZipcode = $_POST['destZipcode'];
								$weight = $_POST['weight'];
								$size = $_POST['size'];
								$price = $_POST['price'];
								$travel_type = $_POST['travel_type'];
								$dept_date  = $_POST['dept_date'];
								$arriv_date  = $_POST['arriv_date'];
							

								// echo "<h2>Hello Traveler,</h2>";
								
								$sql1 = "SELECT MAX(TRAVELER_ID) AS id FROM TRAVELER_INFO";
								$result = mysqli_query($conn, $sql1);
								$row = mysqli_fetch_assoc($result);
								$newid = $row['id'] + 1;


								$sql2 = "INSERT INTO TRAVELER_INFO (USER_ID,	TRAVELER_ID, 		FROM_ADDRESS, 		  FROM_CITY, 		FROM_STATE, 		 FROM_COUNTRY,         FROM_ZIPCODE,          DEST_ADDRESS,       DEST_CITY,         DEST_STATE, 		DEST_COUNTRY,		 DEST_ZIPCODE, 			CARRY_TOTAL_WEIGHT,		   CARRY_TOTAL_SIZE, 			SHIPPING_COST,		   TRAVEL_TYPE, 			   DEPARTURE_DATE_TIME,	 	   ARRIVAL_DATE_TIME)
												VALUES ('$userID', '".$newid."',		'".$sourceAddress."', 	'".$sourceCity."', 	'".$sourceState."' , 	'".$sourceCountry."', '".$sourceZipcode."', '".$destAddress."', '".$destCity ."',  '".$destState ."', '".$destCountry  ."', 	'".$destZipcode  ."', 			'$weight', 			'".$size."', 	  		'$price', 		'".$travel_type."', 			'$dept_date', 		      '$arriv_date')";

								if (mysqli_query($conn, $sql2)) {
										
										// echo "<table>
										// 	<tr>   <th>TRAVELER_ID</th>     <th>FROM_ADDRESS</th>       <th>FROM_CITY</th> 			<th>FROM_STATE</th> 				<th>FROM_COUNTRY</th> 				<th>FROM_ZIPCODE</th> 		<th>Role DEST_ADDRESS</th>  		<th>DEST_CITY</th> 				<th>DEST_STATE</th>  		<th>DEST_COUNTRY</th>  		<th>DEST_ZIPCODE</th>  		<th>CARRY_TOTAL_WEIGHT</th> 	 <th>CARRY_TOTAL_SIZE</th>   <th>SHIPPING_COST</th> 	<th>TRAVEL_TYPE</th> 		<th>DEPARTURE_DATE_TIME</th>	 <th>ARRIVAL_DATE_TIME</th> </tr>";
										// 	echo "<tr>   <td>".$newid."</td>     <td>".$sourceAddress."</td>  <td>". $sourceCity."</td>		<td>".$sourceState."</td>	<td>".$sourceCountry."</td>				<td>".$sourceZipcode."</td> <td>".$destAddress."</td> 	<td>".$destCity."</td> 				<td>".$destState."</td> 	<td>".$destCountry."</td>	<td>".$destZipcode."</td>	<td>".$weight."</td>		   	<td>".$size."</td>  			<td>".$price."</td>  	<td>".$travel_type."</td>	<td>".$dept_date."</td>			<td>".$arriv_date."</td>    </tr>";
										// 	echo "</table>";

											echo '<p style="color: red; text-align: center">Form Submitted successfully</p>';
											echo '<p style="color: red; text-align: center">**View Customer Info**</p>';
																} 
								else {
									echo "Error" . mysqli_error($conn);
										}

							// mysqli_close($conn);
									

									}
								if(isset($_POST['travelInfo'])){
									travelRow();
							}
						?>
					</div>

					<div class="customer-container">
						
					    <form method="post">          
			                <h4 class="text-center"><strong>Are</strong> you a Customer?</h4>
			             	<input type="hidden" name="userid" value="<?php echo htmlspecialchars($userID);?>"></input>


			       			<label>Enter your Package information,</label>
			                <div class="form-group"><input class="form-control1" type="text" name="sourceAddress" placeholder="Source Street Address"  required></div>
			                <div class="form-group"><input class="form-control2" type="text" name="sourceCity" placeholder="Source City"  required></div>
			                <div class="form-group"><input class="form-control2" type="text" name="sourceState" placeholder="Source State" required></div>
			                <div class="form-group"><input class="form-control2" type="text" name="sourceCountry" placeholder="Source Country"  required></div>
			                <div class="form-group"><input class="form-control2" type="text" name="sourceZipcode" placeholder="Source Zipcode"  required></div>

			                <div class="form-group"><input class="form-control1" type="text" name="destAddress" placeholder="Destination Street Address"  required></div>
			                <div class="form-group"><input class="form-control2" type="text" name="destCity" placeholder="Destination City"  required></div>
			                <div class="form-group"><input class="form-control2" type="text" name="destState" placeholder="Destination State" required></div>
			                <div class="form-group"><input class="form-control2" type="text" name="destCountry" placeholder="Destination Country"  required></div>
			                <div class="form-group"><input class="form-control2" type="text" name="destZipcode" placeholder="Destination Zipcode"  required></div>

			                			                
			                <div class="form-group"><input class="form-control2" type="Number" name="weight" placeholder="Package Weight (in lb's)"  required></div>
			                
			                <div class="form-group"><input class="form-control2" type="text" name="size" placeholder="Package size (L*B*H)" ></div>
              		                

  							<div class="block">
			                	<label>Package Sent Date: <input class="form-control1" type="date" name="sent_date">
								  </label>
			                </div>

			                <div class="block">
			                	<label>Package Delivery Date: <input class="form-control1" type="date" name="delivery_date">
								  </label>
			                </div>
			                <div class="form-group">
			        		<button class="btn-primary" type="submit" name="customerInfo">Submit Package Info</button>
			        	    </div>


			             </form>
						<!-- <div class="center-button">
  							<button>Taveller</button>
						</div> -->
					
						<!-- <div class="center-button">
	  							<button>Customer</button>
							</div> -->


						<!-- customer data insert query -->
						<?php 
							function customerRow(){
							
							include('dbconnection.php');
							

							//Variable Assignment CUSTOMER INFO
								$userID = $_POST['userid'];
								$sourceAddress= $_POST['sourceAddress'];
								$sourceCity= $_POST['sourceCity'];
								$sourceState = $_POST['sourceState'];
								$sourceCountry = $_POST['sourceCountry'];
								$sourceZipcode = $_POST['sourceZipcode'];
								$destAddress = $_POST['destAddress'];
								$destCity = $_POST['destCity'];
								$destState = $_POST['destState'];
								$destCountry = $_POST['destCountry'];
								$destZipcode = $_POST['destZipcode'];
								$weight = $_POST['weight'];
								$size = $_POST['size'];
								$sent_date= $_POST['sent_date'];
								$delivery_date= $_POST['delivery_date'];

								// echo "<h2>Hello Customer</h2>";
								
								$sql1 = "SELECT MAX(CUSTOMER_ID) AS id FROM CUSTOMER_INFO";
								$result = mysqli_query($conn, $sql1);
								$row = mysqli_fetch_assoc($result);
								$newid = $row['id'] + 1;



								$sql2 = "INSERT INTO CUSTOMER_INFO (USER_ID, CUSTOMER_ID, 	PACKAGE_FROM_ADDRESS, 			  PACKAGE_FROM_CITY, 		PACKAGE_FROM_STATE, 			 PACKAGE_FROM_COUNTRY,        		 PACKAGE_FROM_ZIPCODE,         		 PACKAGE_DEST_ADDRESS,       PACKAGE_DEST_CITY,        		 PACKAGE_DEST_STATE, 			PACKAGE_DEST_COUNTRY,		 PACKAGE_DEST_ZIPCODE, 			CUSTOMER_PACKAGE_TOTAL_WEIGHT,		   CUSTOMER_PACKAGE_TOTAL_SIZE, 			PACKAGE_READY_DATE,		 PACKAGE_DELIVERY_DATE)
											VALUES ('$userID',	'".$newid."',	'".$sourceAddress."', 			'".$sourceCity."', 		'".$sourceState."' , 			'".$sourceCountry."', 			'".$sourceZipcode."', 			'".$destAddress."', 		'".$destCity ."',  			'".$destState ."', 			'".$destCountry  ."', 		'".$destZipcode  ."', 				'$weight', 						'".$size."', 	  				'$sent_date', 			'$delivery_date')";

								if (mysqli_query($conn, $sql2)) {
										

										// echo "<table>
										// 	<tr>   			<th>CUSTOMER_ID</th>     		<th>PACKAGE_FROM_ADDRESS</th>       <th>PACKAGE_FROM_CITY</th> 			<th>PACKAGE_FROM_STATE</th> 				<th>PACKAGE_FROM_COUNTRY</th> 				<th>PACKAGE_FROM_ZIPCODE</th> 		<th> PACKAGE_DEST_ADDRESS</th>  		<th>PACKAGE_DEST_CITY</th> 				<th>PACKAGE_DEST_STATE</th>  		<th>PACKAGE_DEST_COUNTRY</th>  		<th>PACKAGE_DEST_ZIPCODE</th>  		<th>CUSTOMER_PACKAGE_TOTAL_WEIGHT</th> 	 <th>CUSTOMER_PACKAGE_TOTAL_SIZE</th>   		<th>PACKAGE_READY_DATE</th> 	<th>PACKAGE_DELIVERY_DATE</th> 		 </tr>";
										// 	echo "<tr>   <td>".$newid."</td>    			 <td>".$sourceAddress."</td> 		 <td>". $sourceCity."</td>			<td>".$sourceState."</td>					<td>".$sourceCountry."</td>					<td>".$sourceZipcode."</td> 		<td>".$destAddress."</td> 				<td>".$destCity."</td> 						<td>".$destState."</td> 			<td>".$destCountry."</td>			<td>".$destZipcode."</td>			<td>".$weight."</td>		   				<td>".$size."</td>  					<td>".$sent_date."</td>  			<td>".$delivery_date."</td>			 </tr>";
										// 	echo "</table>";

											echo '<p style="color: red; text-align: center">Form Submitted successfully</p>';
											echo '<p style="color: red; text-align: center">**View Traveler Information.**</p>';
									} 
								else {
									echo "Error" . mysqli_error($conn);
										}

							mysqli_close($conn);
									



							}

							if(isset($_POST['customerInfo'])){
			                    			customerRow();
			               		}
						?>

					</div>

				</div>
			</div>


		<!-- 	<div id="request-traveler" class="tabcontent">
			  	

			  	
					
					
			</div> -->


			
			<div id="travel-info" class="tabcontent">
			  	<?php
					include 'dbconnection.php';


					$sql = "SELECT u.FIRSTNAME AS firstname, u.LASTNAME AS lastname,t.SHIPPING_COST AS price,u.EMAIL as email, u.PHONE as phone, t.FROM_CITY AS source_city, t.DEST_CITY AS dest_city, c.CUSTOMER_ID AS customer_id, t.TRAVELER_ID AS traveler_id
								FROM `CUSTOMER_INFO` as c
								INNER JOIN (SELECT ci.CUSTOMER_ID FROM `CUSTOMER_INFO` AS ci WHERE ci.USER_ID = '$userID' ORDER BY ci.CUSTOMER_ID DESC LIMIT 3) as ctemp
								ON c.CUSTOMER_ID = ctemp.CUSTOMER_ID
								INNER JOIN `TRAVELER_INFO` AS  t
								ON t.FROM_ZIPCODE = c.PACKAGE_FROM_ZIPCODE AND t.DEST_ZIPCODE = c.PACKAGE_DEST_ZIPCODE
								AND t.DEPARTURE_DATE_TIME >= c.PACKAGE_READY_DATE AND t.ARRIVAL_DATE_TIME <= c.PACKAGE_DELIVERY_DATE
								INNER JOIN `USER_INFO` AS u 
								ON t.USER_ID = u.USER_ID";	
					$result = mysqli_query($conn, $sql); 

					// if(isset($_POST['travel-info'])){

					if (mysqli_num_rows($result) == 0) {
						        echo "No Travelers Were found!! Please try with different zip code";
						        	// exit;
						    		}
					else{
						    echo "Contact below travelers to send your package,";

							$header = <<<HEREDOC
								<table border="1" align="center">
								<tr>
								  <th></th>
								  <th>First Name</th>
								  <th>Last Name</th>
								  <th>Email</th>
								  <th>Mobile Number</th>
								  <th>Expected Price</th>
								  <th>Source City</th>
								  <th>Destination City</th>
								</tr>
								HEREDOC;

								echo $header;

								

						    	$index = 0; 

			    
							    while ($row = mysqli_fetch_assoc($result)) {
							        $index = $index+1;

							        echo "<tr>";
							        echo "<td>".$index."</td>";
								    echo "<td>".$row['firstname']."</td>";
								    echo "<td>".$row['lastname']."</td>";
								    echo "<td>".$row['email']."</td>";
								    echo "<td>".$row['phone']."</td>";
								    echo "<td>".'$'.$row['price']."</td>";
								    echo "<td>".$row['source_city']."</td>";
								    echo "<td>".$row['dest_city']."</td>";
								    echo "</tr>";
							    }
						    		}

					

							    mysqli_close($conn);

					// }

				?>
			</div>
<!-- 
			<div id="accept-customer" class="tabcontent">
			  
			</div> -->

			<div id="customer-info" class="tabcontent">
			  	<?php
					include 'dbconnection.php';


					$sql = "SELECT u.FIRSTNAME AS firstname, u.LASTNAME AS lastname, u.EMAIL as email, u.PHONE as phone,c.CUSTOMER_PACKAGE_TOTAL_WEIGHT AS package_weight, c.PACKAGE_FROM_CITY AS source_city, c.PACKAGE_DEST_CITY AS dest_city, c.CUSTOMER_ID as customer_id, t.TRAVELER_ID AS traveler_id
						FROM `TRAVELER_INFO` as t
						INNER JOIN (SELECT ti.TRAVELER_ID FROM `TRAVELER_INFO` AS ti WHERE ti.USER_ID = '$userID' ORDER BY ti.TRAVELER_ID DESC LIMIT 5) as ttemp
						ON t.TRAVELER_ID = ttemp.TRAVELER_ID
						INNER JOIN `CUSTOMER_INFO` AS  c
						ON t.FROM_ZIPCODE = c.PACKAGE_FROM_ZIPCODE AND t.DEST_ZIPCODE = c.PACKAGE_DEST_ZIPCODE
						AND t.DEPARTURE_DATE_TIME >= c.PACKAGE_READY_DATE AND t.ARRIVAL_DATE_TIME <= c.PACKAGE_DELIVERY_DATE
						INNER JOIN `USER_INFO` AS u 
						ON c.USER_ID = u.USER_ID";	
					$result = mysqli_query($conn, $sql); 

					// if(isset($_POST['customer-info'])){
						
					if (mysqli_num_rows($result) == 0) {
						        echo "No Customers Were found in your travel route!!";
						        	// exit;
						    		}
					else{
		    			echo "Contact below customers to take the package,";
						    		

						$header = <<<HEREDOC
								<table border="1" align="center">
								<tr>
								  <th></th>
								  <th>First Name</th>
								  <th>Last Name</th>
								  <th>Email</th>
								  <th>Mobile Number</th>
								  <th>Package Weight</th>
								  <th>Source City</th>
								  <th>Destination City</th>
								</tr>
								HEREDOC;

								echo $header;


						    	$index = 0; 

			    
							    while ($row = mysqli_fetch_assoc($result)) {
							        $index = $index+1;

							        echo "<tr>";
							        echo "<td>".$index."</td>";
								    echo "<td>".$row['firstname']."</td>";
								    echo "<td>".$row['lastname']."</td>";
								    echo "<td>".$row['email']."</td>";
								    echo "<td>".$row['phone']."</td>";
								    echo "<td>".$row['package_weight']."</td>";
								    echo "<td>".$row['source_city']."</td>";
								    echo "<td>".$row['dest_city']."</td>";
								    echo "</tr>";
							    }

							   
					}
					 mysqli_close($conn);
				?>
			</div>
			

			<script>
					function openPage(pageName,elmnt,color) {
					  var i, tabcontent, tablinks;
					  tabcontent = document.getElementsByClassName("tabcontent");
					  for (i = 0; i < tabcontent.length; i++) {
					    tabcontent[i].style.display = "none";
					  }
					  tablinks = document.getElementsByClassName("tablink");
					  for (i = 0; i < tablinks.length; i++) {
					    tablinks[i].style.backgroundColor = "";
					  }
					  document.getElementById(pageName).style.display = "block";
					  elmnt.style.backgroundColor = color;
					}

					// Get the element with id="defaultOpen" and click on it
					document.getElementById("defaultOpen").click();
			</script>



</body>
</html>
