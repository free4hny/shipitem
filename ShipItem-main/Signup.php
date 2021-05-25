<!-- <!DOCTYPE html> -->
<html>
<head>
    <link rel="stylesheet" href="SignUp.css">
    <script src="createusercheck.js"></script>

    <div class="register-photo">
    <div class="form-container">
        
        <div class="image-holder"></div>
        
        <!-- sign up form -->
            <form method="post" action ="login.php" onsubmit="return validateUser()">
                
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <div class="form-group"><input class="form-control2" type="text" name="Firstname" placeholder="First Name"  required></div>
                <div class="form-group"><input class="form-control2" type="text" name="Lastname" placeholder="Last Name"  required></div>
                
                <div class="form-group"><input class="form-control1" type="email" name="email" placeholder="Email"  required></div>
                
                <div class="form-group"><input class="form-control2" type="password" name="password" placeholder="Password"  required></div>
                <div class="form-group"><input class="form-control2" type="password" name="password-repeat" placeholder="Re-enter Password"  required></div>

                <div class="form-group"><input class="form-control2" type="tel" name="Phone" placeholder="Mobile Number"  required></div>
                <div class="form-group"><input class="form-control1" type="text" name="Address" placeholder="Street Address"  required></div>

                <div class="form-group"><input class="form-control2" type="text" name="City" placeholder="City"  required></div>
                <div class="form-group"><input class="form-control2" type="text" name="State" placeholder="State" required></div>
                <div class="form-group"><input class="form-control2" type="text" name="Country" placeholder="Country"  required></div>
                <div class="form-group"><input class="form-control2" type="text" name="Zipcode" placeholder="Zipcode"  required></div>


                <!-- <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox">I agree to the license terms.</label></div>
                </div> -->


                <div class="form-group">
        		<button class="btn-primary" type="submit" name="createuser">Sign Up</button>
        	    </div>



            </form>
            
            <form method=post action ="login.php">
                 <div class="form-group">
                <button class="btn-primary" type="submit" name="loginuser">Sign in</button>
                </div>
            </form>

            <!-- <form>
        		<a class="already" You already have an account? Login here. </a> 
               
            </form> -->

    </div>
    </div>

</head>
<body>

</body>
</html>

