
## Exams Processing System

To run this application , you can clone it via git clone or download it as a zip,
then run the following commands in your command line/Terminal
 #### composer update  to update dependencies
 #### cp .env.example .env
 #### php artisan key:generate
 ###### open .env file and enter your database values
 ##### Run php artisan config:cache , to clear Cache
 ##### Import the .sql file attached in the project into your database.
 
 ## Login Details
 
 ######Admin login : admin@school.com, 123456
 ######Student login : judith@app.io, 123456
 ######Lecturer login : michaelkyalo@app.com, 123456


To start create courses, units and batches in that order, then create intakes, students join a course via an intake.
then assign batches to the intakes.
Batches refers to a class.

Then admit students.
Create lecturers and assign them units.
Create Exams under Units.
