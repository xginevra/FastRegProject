# project: Medconnect, some general information 
find us here: http://medconnect.ecriprojects.de , <br>
and here: https://xginevra.github.io/project/ <br>
By Paniz, Paya, Ali, Franzi

## Don't forget pulling before working on some pages

pages "new_patient" and "update_patient" want to be redesigned, they are looking good but there is something missing - take a look at it either at strato or locally on your machine.

---------

First, all user-related pages should be a .php file in order to place the following snippet of code at the beginning:
 ```
  <?php 
  session_start() 
  ?>
```

After that, you can continue with html, js, or what you are using just as usual.
for html, just set the `<html>` tag before your code.

### Some further information on the backend for frontend:
if you want to test your page locally with xampp or something:
the functionalities for inserting or fetching data into/from database, i added the strato DB credentials as well as the "localhost" credentials - just comment out what you don't need.

-------

Next, we're using several "name" fields in our input divs - make sure you're using the "right" names, 
## it makes backend's life so much easier.

in order to keep you lovely frontend guys up to date, i will continuously update this page with the "names" for each input we want to have.
example: (fileUpload is a column for the patients table which is so far not there (work in progress, on update_patientdata.php)
```

<input type="file" id="fileUpload" name="fileUpload" accept=".pdf, .doc, .docx">

```
So far, we have 2 tables: doctors and patients. the name in the table is going to be the name preferred for the inputs of the .html/.php files.

This is doctors:
|  id |  username | password  | email_address  | first_name  | last_name  | institution  |
|---|---|---|---|---|---|---|
|   |   |   |   |   |   |   |

This is patients:
|  patient_id | patient_name  | gender  | address  | zipcode  | city  | phone  | prevDiseases  | allergies  |  signsSymptoms |  diagnosis |  doctor_id | 
|---|---|---|---|---|---|---|---|---|---|---|---|
|   |   |   |   |   |   |   |   |   |   |   |   |

-------

however, for some reason at the register.html we used u_username and all the other variables with the u_ in front of them, and this is somehow weird but i do not want to change it anymore because it is running and i am afraid that it would stop working xD but for future uses i want to just use the names from the table. It could make it work straight out of the repo which is always a good thing :)

----------

### Our page looks amazing.
but still, we have something to do:

our loggedin.php, which is basically our "My Profile" should be designed -  Check! Looks amazing. depends on what you want to further improve.


----------------------

## Backend todo:
- figure out how to update patient data in the same table - check! 
- how to set the relationships (one doctor can have many patients, one patient has only one doctor); i want to make a patient only accessible for the doctor who created the patient's data (Datenschutz! :D) - Check!
- how to save pictures and other files in a table (?)
