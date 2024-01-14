# project: Medconnect, some general information 
find us here: http://medconnect.ecriprojects.de , <br>
and here: https://xginevra.github.io/project/ but it is not really working because of the missing database here :) <br>
still prefer [Strato](http://medconnect.ecriprojects.de) for this. <br>
By Paniz, Paya, Ali, Franzi

## Don't forget pulling before working on some pages

page "update_patient" and "show_patient" want to be redesigned

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
So far, we have 2 tables: doctors and patients. the name in the table is going to be the name preferred for the inputs of the .html/.php files. <br>
currently, "doctor_id" is a foreign key in the patients table - it originates from the doctors table's "id" which is the primary key there. they are linked so that each doctor can only see the patients they created. yay!

This is doctors:
|  id |  username | password  | email_address  | first_name  | last_name  | institution  |
|---|---|---|---|---|---|---|
|   |   |   |   |   |   |   |

This is patients:
|  patient_id | patient_name  | gender  | address  | zipcode  | city  | phone  | prevDiseases  | allergies  |  signsSymptoms |  diagnosis |  doctor_id |   imageUpload   | 
|---|---|---|---|---|---|---|---|---|---|---|---|---|
|   |   |   |   |   |   |   |   |   |   |   |   |   |

-------

however, for some reason at the register.html we used u_username and all the other variables with the u_ in front of them, and this is somehow weird but i do not want to change it anymore because it is running and i am afraid that it would stop working xD but for future uses i want to just use the names from the table. It could make it work straight out of the repo which is always a good thing :)

----------

### Our page looks amazing.
but still, we have something to do:

- restyling for some pages mentioned at the top (show and update patient data) -> <strong> Frontend </strong>
- make the image upload work -> <strong> Backend </strong>



----------------------

## Backend todo:
- figure out how to update patient data in the same table -> kinda messed it up
- how to set the relationships (one doctor can have many patients, one patient has only one doctor); i want to make a patient only accessible for the doctor who created the patient's data (Datenschutz! :D) - Check!
- how to save pictures and other files in a table (?)
