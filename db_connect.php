<?php
 
 $db = new mysqli("localhost","root","");
   if($db->connect_errno > 0){
         die('Unable to connect to database [' . $db->connect_error . ']');  } 

//connection to  push Education history
$servername ='localhost';
$username="root";
$password="";
$dbname ="staff_db";

//create connection to database
$conn = mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
    die('could not connect my Sql:' .mysqli_error());
}
     
	 $db->query("CREATE DATABASE IF NOT EXISTS `staff_db`");
	 
             mysqli_select_db($db,"staff_db");
             
   
        		                       
		  //table
		$stableYZ="CREATE TABLE IF NOT EXISTS Inorg (id int(11) NOT NULL auto_increment,
                 name varchar(300)NOT NULL,Phone varchar(300)NOT NULL,email varchar(100)NOT NULL,
                 website varchar(300)NOT NULL,year varchar(10)NOT NULL,pname varchar(1000)NOT NULL,type varchar(30)NOT NULL,
                 size decimal(10)NOT NULL,content longblob NOT NULL, PRIMARY KEY(id) )";
               $db->query($stableYZ);
							 
			   $stableZ="CREATE TABLE IF NOT EXISTS Profilepictures (id int(11) NOT NULL auto_increment,
                 ids varchar(30)NOT NULL,Category varchar(30)NOT NULL,name varchar(1000)NOT NULL,type varchar(30)NOT NULL,
                 Size decimal(10)NOT NULL,content longblob NOT NULL,
                 PRIMARY KEY(id) )";
               $db->query($stableZ);
			   
			    $stable1="CREATE TABLE IF NOT EXISTS Files (id int(11) NOT NULL auto_increment,
                                  Title varchar(300)NOT NULL,Name varchar(1000)NOT NULL,
                                 Type varchar(30)NOT NULL,Size decimal(10) NULL,
                                   content longblob NOT NULL,PRIMARY KEY(id) )";
                                 $db->query( $stable1);
               
                  $stable56="CREATE TABLE IF NOT EXISTS Users (id int(11) NOT NULL auto_increment,
                                  Firstname varchar(300)NOT NULL, 
                                  Sirname varchar(300)NOT NULL,
                                  Mtitle Varchar(30)NOT NULL,                                 
                                  Rank varchar(30)NOT NULL,                                 
                                  Department varchar(300)NOT NULL,
                                  Email varchar(300)NOT NULL,
                                  Staffid varchar(300)NOT NULL,
                                  Online varchar(300)NOT NULL,
                                  Picname varchar(1000)NOT NULL,
                                  Time bigint(30)NOT NULL,                         
                                  PRIMARY KEY(id) )";
                         $db->query($stable56); 
<<<<<<< HEAD
// group 13 work table
                         $stable13="CREATE TABLE IF NOT EXISTS Staff_Education (emp_no int(11) NOT NULL auto_increment,
                
                                  emp_name varchar(300)NOT NULL,
                                  cert_obtained Varchar(30)NOT NULL,                                 
                                  institution varchar(30)NOT NULL,  
                                  institution_add varchar(300)NOT NULL,                               
                                  year_stated_edu date NOT NULL,
                                  
                                 year_graduated varchar(300)NOT NULL,
=======
//table
                         $stable03="CREATE TABLE IF NOT EXISTS StaffIS (emp_no int(11) NOT NULL auto_increment,
                                 emp_name varchar(100)NOT NULL,
                                  safari_start_date date NOT NULL,                                 
                                  return_date date NOT NULL,  
                                  purpose_safari varchar(100)NOT NULL,                               
                                  authorisation_status varchar(100) NOT NULL,
                                source_fund varchar(300)NOT NULL,
>>>>>>> 71a4609b1b0f7a52cbf953e4ea15a77446ef5163
                                  PRIMARY KEY(emp_no) )";
                         $db->query($stable13); 
                         
                        
			   
			    $stable4="CREATE TABLE IF NOT EXISTS Administrator (id int(11) NOT NULL auto_increment,
                                  Firstname varchar(30)NOT NULL,Sirname varchar(30)NOT NULL,Mtitle Varchar(30)NOT NULL,
                                  Phone varchar(30)NOT NULL,Password varchar(30)NOT NULL,Email varchar(30)NOT NULL,PRIMARY KEY(id) )";
                                      $db->query($stable4);
						
			 	 	
		
					$sql="SELECT * FROM Administrator ";					
                   $result=mysqli_query($db,$sql);
                   $rowcount=mysqli_num_rows($result);
                     
                       if($rowcount==0)
                         {
                           $enter="INSERT INTO Administrator (Password,Email,Firstname,Sirname,Mtitle,Phone) VALUES('admin','admin@gmail.com','Patrick','Mvuma','Mr','265999107724')";
                                  $db->query($enter);
								  
						   
                                                    $querydy = "INSERT INTO Files (Title,Name,Size,Type) ".
                                 "VALUES ('Staff','staff.csv','76','application/vnd.ms-excel')";                                 
                                     $db->query($querydy) or die('Errorr, query failed to upload');	
                                  
                          }
                     
					 		

?>