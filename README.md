# shipitem
Travellers becomes the shippers


﻿Live link to our web application ShipItem.com website:
https://in-info-web4.informatics.iupui.edu/~saivuppa/project/Signup.php


List of files used in the project:


> Final_Project_Create_Table.sql
> Final_Project_Data_Model.drawio
> SignUp.css
> Signup.php
> home.css
> home.php
> logo.jfif
> createusercheck.js
> dbconnection.php
> error.html
> login.php
> logout.php
> view customer info_query.txt
> view_travel_info_query.txt




Setting up database:


Final_Project_Create_Table.sql


1. Import the data:
Use Final_Project_Create_Table.sql  to create database tables used in the project.




Setting up project files:


1. Copy all the list of files mentioned within the folder to the server.
2. Please make sure that you place the dbconnection.php file which consist of database credentials to connect to the database.
3. The signup page is the first page where it consists of forms that when submitted creates a new user within the USER_INFO table. The createusercheck.js validates the user. The css for signup page has been written within signup.css file.
4. Now the page will direct to login.php where the user needs to provide the email and password that they used while creating an account.
5. After login, home.php page is prompted where a tab is used as a header. The css for this php file is within home.css, and the home.php has two forms. One for travelers and the other for customers.
6. When a user would like to be a traveler, on submitting his travel information a message at the bottom of the form is prompted saying the form submitted successfully implies that his information has been now stored within the TRAVEL_INFO table of the database.
7. The traveler can now go to the customer info tab where the table consists of customer details only if any customer is sending a package from the traveler source and destination.
8. The view customer info_query has been used to pull the customer details based on zip codes, date of departure from source and date of arrival at destination.
9. The same user can also be a customer when he wishes to send a product and the details are saved within the customer_info table. He can view the list of travelers details within travelers info tab and contact them to send the package.
10. The view_travel_info_query has been used to pull out the travelers details based on zip codes, date of departure from source and date of arrival at destination.
