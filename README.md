# phonebook
 Phonebook CodeIgniter Bootsrap Application

A web application where a user can manage an address book

Requirements
A user must be able to see a list of their contacts
A user must be able to search their contacts
A user must be able to create a new contact
A user must be able to update an existing contact
A user must be able to delete a contact
A contact consists of a first name and a last name
A contact can have unlimited contact numbers and email addresses
Technologies
Use any database/datastore (Mysql 5.7 Relational Database Store)
Use any backend technology/framework that is appropriate for the position you are applying for (CodeIgniter 3 MVC)
Use any UI technology/framework that is appropriate for the position you are applying for (Javascript, Jquery, HTML and CSS)
Assumptions
Login/logout is not required

PreRequisites:
PHP 5.6 and mysql 5.1 are codeigniter 3 server requirements(https://codeigniter.com/user_guide/general/requirements.html) and above but I would say mysql 5.6 and above. 

Installation:
Run the database.sql file found in the root directory inside your mysql. this will create a database called phonebook which will be used in the application.
If you already have a database by that name already, then you can changed the database name inside the script, and also changed the corresponding
reference in codeginiter config/database.php to whatever new database name you would like to use.
To run the application you would go to the folder name of wherever you setup your project on your web server,
mine was in root directory/codeigniter/phonebook folder so I accessed it http://localhost/codeigniter/phonebook/

Sample Use Cases
These are just some sample use cases to walk you through the application
1 View Current List of Contacts that I created.

![List of Contacts](https://github.com/DTaksta/phonebook/blob/master/assets/images/screenshots/1ListAllContacts.JPG)

2 Add New Contact. The contact named is Sia Kolisi and has a work number and  personal email address.

![Add New Contact](https://github.com/DTaksta/phonebook/blob/master/assets/images/screenshots/2AddToContactsSia.png)

3 Check the landing page to see that it has been added successfully.

![New Contact Displaying](https://github.com/DTaksta/phonebook/blob/master/assets/images/screenshots/3ContactAdded-Sia.png)

4 Edit our newly created contact, and more phone numbers and emails.

![Edit New Contact](https://github.com/DTaksta/phonebook/blob/master/assets/images/screenshots/4EditContacts-Sia.png)

5 Takes us back to the home page where we can see that the numbers and emails have been added successfully to the contact.

![Edit New Contact](https://github.com/DTaksta/phonebook/blob/master/assets/images/screenshots/5ContactEdited-Sia.png)

5.1 Delete a contact number from our contact in question, Sia, by clicking onthe delete link on the recently added mobile number.

![DeleteContactNumber-Sia](https://github.com/DTaksta/phonebook/blob/master/assets/images/screenshots/5.1DeleteContactNumber-Sia.png)

5.2 We see that number get removed from the view immediately.

![ContactNumberRemovedFromPage-Sia](https://github.com/DTaksta/phonebook/blob/master/assets/images/screenshots/5.2ContactNumberRemoved-Sia.JPG)

5.3 After pressing submit, we see that we are taking to the home page and can see that the contact, Sia, only has one number now.

![ContactNumberRemovedPermanently-Sia](https://github.com/DTaksta/phonebook/blob/master/assets/images/screenshots/5.3ContactNumberRemovedForSia.JPG)

6 Delete contact on row 4, called New Person with Phone 1234, we get a pop up message, and just click OK to confirm. 

![DeleteContactPerson](https://github.com/DTaksta/phonebook/blob/master/assets/images/screenshots/6DeleteContactPerson.png)

7 We take back to index page and we now see that row for is occupied by contact Sia, and that our New Person contact on row 4 is now gone.

![ContactDeleted-Person](https://github.com/DTaksta/phonebook/blob/master/assets/images/screenshots/7ContactDeleted-Person.JPG)

8 We now test our search filter, and we search for contact Sia, and then press ADD to search.

![SearchForContact](https://github.com/DTaksta/phonebook/blob/master/assets/images/screenshots/8SearchForContact.JPG)

9 We get a filtered view of contact Sia.

![ContactsSearchedForSia](https://github.com/DTaksta/phonebook/blob/master/assets/images/screenshots/9ContactsSearchedForSia.JPG)
