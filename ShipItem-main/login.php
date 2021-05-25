<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="User Login Page" content="Forms">
        <title >User Login Page</title>

        <style>
              body, html {
                  height: 100%;
                  font-family: Arial, Helvetica, sans-serif;
                }

                h1{

                  color:white;
                }

                * {
                  box-sizing: border-box;
                  
                }

                .bg-img {
                  /* The image used */
                  /*background-image: url("https://in-info-web4.informatics.iupui.edu/~saivuppa/project/background.jfif");*/

                  min-height: 100%;
                  min-width: 100%;


                  /* Center and scale the image nicely */
                  background-position: center;
                  background-repeat: no-repeat;
                  background-size: cover;
                  position: relative;
                }

                /* Add styles to the form container */
                .container {
                  color: #FFFACD;
                  position: absolute;
                  right: 500px;
                  margin: 100px;
                  max-width: 800px;

                  padding: 16px;
                  background-color: #A9A9A9;
                }

                /* Full-width input fields */
                input[type=text], input[type=password] {
                  width: 100%;
                  padding: 15px;
                  margin: 5px 0 22px 0;
                  border: none;
                  background: #f1f1f1;
                }

                input[type=text]:focus, input[type=password]:focus {
                  background-color: #ddd;
                  outline: none;
                }


                /* Email Full-width input fields */
                input[type=email], input[type=email] {
                  width: 100%;
                  padding: 15px;
                  margin: 5px 0 22px 0;
                  border: none;
                  background: #f1f1f1;
                }

                input[type=email]:focus, input[type=email]:focus {
                  background-color: #ddd;
                  outline: none;
                }

                /* Set a style for the submit button */
                .btn {
                  background-color: #4CAF50;
                  color: white;
                  padding: 8px 12px;
                  border: 5px;
                  cursor: pointer;
                  width: 100%;
                  opacity: 0.9;
                }

                .btn:hover {
                  opacity: 0.8;
                  background-color: orange;
                }


                .btn_reset {
                  background-color: #EE82EE;
                  color: white;
                  padding: 8px 12px;
                  border: 5px;
                  cursor: pointer;
                  width: 100%;
                  opacity: 0.9;
                }

                .btn_reset:hover {
                  opacity: 0.8;
                  background-color: #2F4F4F;
                }
        </style>

    </head>

    <body>
        <div class="bg-img">  
        <h1>User Login Page</h1>
 <!-- css need to be replicated from signup page form -->
        <form name = "userform" action="home.php"  class="container" method ="post">
            <label for="email">Email: </label>
            <input type="email" id="email" placeholder="Enter your Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" size="30" required >
            <br><br>
            <label for="Password">Password: </label>
            <input type="password" id="pass" placeholder="Enter your Password" name="pass" required>
            <br><br>
	    
		
            <input type="submit" class="btn" name="submit" value="Login">
            <input type="reset" class= "btn_reset"  name="reset" value="Reset to clear ">
                  
        </form>
</div>
       <!-- user info from sign up page-->
                
            <?php
                function createUser(){
                    
                    include 'dbconnection.php';
                        
                        $firstname = $_POST['Firstname'];
                        $lastname = $_POST['Lastname'];
                        $email = $_POST['email'];
                        $phone = $_POST['Phone'];
                        $password = $_POST['password'];
                        $password_repeat = $_POST['password-repeat'];
                        $address = $_POST['Address'];   
                        $city = $_POST['City'];
                        $state = $_POST['State'];
                        $country = $_POST['Country'];
                        $zip = $_POST['Zipcode'];
                
        //  inserting the data into database


                
                        $sql1 = "SELECT MAX(USER_ID) AS 'id' FROM USER_INFO";
                        $result = mysqli_query($conn, $sql1);
                        $row = mysqli_fetch_assoc($result);
                        $newid = $row['id'] + 1;


                        $sql2 = "INSERT INTO USER_INFO(USER_ID, FIRSTNAME, LASTNAME, PASSWORD, PHONE, EMAIL, ADDRESS, CITY, COUNTRY, STATE, ZIPCODE )
                        VALUES ('".$newid."','".$firstname."', '".$lastname."', '".$password."', '".$phone."' , '".$email."', '".$address."', '".$city."', '".$country."', '".$state."', '".$zip."')";

                        if (mysqli_query($conn, $sql2)) {
                            $conn->exec($sql2);
                        } 

                        else {
                            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                        }

                        mysqli_close($conn);
                }


               if(isset($_POST['createuser'])){
                    createUser();
               }

                   
            ?>
 
    </body>
    
</html>
