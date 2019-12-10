<?php
"CREATE TABLE volunteer( `volunteer_Id` INT PRIMARY KEY AUTO_INCREMENT, `filling` VARCHAR(40),
 `firstName` VARCHAR(50), `lastName` VARCHAR(50), streetAddress VARCHAR(60), city VARCHAR(20), 
 state VARCHAR(20), zip VARCHAR(20), `phone` VARCHAR(15), `email` VARCHAR(20), tshirt VARCHAR(20),
  skills VARCHAR(200), experience VARCHAR(200), motivated VARCHAR(200) , hear VARCHAR(50), otherHear VARCHAR(200),
   mailing VARCHAR(20))";
//Create connection between the volunteer and the interests tables.
"CREATE TABLE vol_int(
    volunteer_Id int , FOREIGN KEY(volunteer_Id) REFERENCES volunteer(volunteer_Id),
    interests_id int, FOREIGN KEY(interests_id) REFERENCES interests(interests_id))";

// Add a column into the ethnicity table
"ALTER TABLE ethnicity
ADD ethnicity_other varchar(30)";

//add column into the interests table
"ALTER TABLE interests
ADD interests_other varchar(200)";

//availability table
"CREATE TABLE availability( `availability_Id` INT NULL PRIMARY KEY AUTO_INCREMENT,
`availability_type` VARCHAR(40) NULL, `availability_other` VARCHAR(200) NULL)";

//connect volunteer and availability tables with their foreign keys
"CREATE TABLE vol_avail( volunteer_Id int , FOREIGN KEY(volunteer_Id) REFERENCES volunteer(volunteer_Id), 
availability_id int, FOREIGN KEY(availability_id) REFERENCES availability (availability_id))";


"INSERT INTO dreamer
                    VALUES (default,'Susana',
                    '$1234567890', 'susana@mail.com',
                    '2009-11-14','female', '2009','1');
                    INSERT into ethnicity
                    VALUES (default,'mix')";

//Create table dreamer
"CREATE TABLE dreamer( `dreamer_Id` INT PRIMARY KEY AUTO_INCREMENT, `name` VARCHAR(50),
 `phone` VARCHAR(15), `e_mail` VARCHAR(30), `birth` date, `gender` varchar(15),
  `grad` VARCHAR(5), `interest` VARCHAR(100), `career` VARCHAR(100),`favfood` VARCHAR(50), parentNAme VARCHAR(50),
   `parentPhone` VARCHAR(15),parentEmail VARCHAR(50), ethnicity_id int,
   CONSTRAINT ethnicity_id FOREIGN KEY (ethnicity_id) REFERENCES ethnicity (ethnicity_id)))";


"CREATE TABLE ethnicity( `ethnicity_id` INT PRIMARY KEY AUTO_INCREMENT,
`ethnicity_type` varchar(30),otherEthnicity varchar(200),
    dreamer_Id int, FOREIGN KEY(dreamer_Id) REFERENCES dreamer (dreamer_Id))";

//select statement for dreamer summary page
"SELECT dreamer.dreamer_Id, name, phone, e_mail, birth, gender, grad, 
        interest, career, favfood, parentNAme, parentPhone, parentEmail,
         ethnicity_type, otherEthnicity
        FROM dreamer INNER JOIN ethnicity ON dreamer.ethnicity_Id =
            ethnicity.ethnicity_Id
        WHERE ethnicity_id = ethnicity_type";

//select statament from the student advisor
"SELECT `sid`, last AS `last`, first AS `first`, `gpa`, `birthdate`, `advisor_id`, `advisor_first`, `advisor_last` 
FROM `student`, `advisor` 
            WHERE advisor.advisor_id= student.advisor
            ORDER by student.last, student.first";

"INSERT INTO `dreamer`(`dreamer_Id`, `name`, `phone`, `e_mail`, `birthdate`, `gender`, `graduation_class`, `interest`, `career`, `food`) VALUES (default,'Susana Mendez',1234567890,'Susana@gmail.com',
2000-11-09,'female',2020,'Yoga','software Dev','raisins')";

"SELECT dreamer.dreamer_Id, name, phone, e_mail, birth, gender, grad, interest, career, favfood,
 parentNAme, parentPhone, parentEmail, ethnicity_type, otherEthnicity 
 FROM dreamer INNER JOIN ethnicity ON dreamer.ethnicity_Id = ethnicity.ethnicity_Id 
 WHERE ethnicity.ethnicity_id = ethnicity.ethnicity_type";


"ALTER TABLE ethnicity
DROP COLUMN otherEthnicity";

"ALTER table dreamer
ADD COLUMN otherEthnicity varchar(200)";