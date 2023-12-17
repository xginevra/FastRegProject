# project: Medconnect, some general information
---------

First, all user-related pages should be a .php file in order to place the following snippet of code at the beginning:
 ```
  <?php 
  session_start() 
  ?>
```

After that, you can continue with html, js, or what you are using just as usual.
for html, just set the <html> tag before your code.

-------

Next, we're using several "name" fields in our input divs - make sure you're using the "right" names, 
# it makes backend's life so much easier.

in order to keep you lovely frontend guys up to date, i will continuously update this page with the "names for each input we want to have.
So far, we have 2 tables: doctors and patients. the name in the table is going to be the name preferred for the inputs of the .html/.php files.

|  id |  username | password  | email_address  | first_name  | last_name  | institution  |
|---|---|---|---|---|---|---|
|   |   |   |   |   |   |   |
