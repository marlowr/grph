Green River Project Hub readme

Authors: Ryan Marlow / Cynthia Pham

**Separates all database/business logic using the MVC pattern. Routes all URLs and leverages a templating language using the Fat-Free framework.
	- Maintains security through routing users through a login, home and project pages. Project page uses templating to show project information from server. 

**Has a clearly defined database layer using PDO and prepared statements.
	- Every interaction with the database uses PDO, prepared statements, and ensures security against SQL injection using those statements.

**Data can be viewed, added, updated, and deleted.
	- Projects can be added to the database, information updated and deleted from the database by user interaction.

**Has a history of commits from both team members to a Git repository.
	- 40+ total commits from both members to the Git repository, spread out between the quarter.

**Uses OOP, and defines multiple classes, including at least one inheritance relationship.
	- Has two classes in the project, Project and EditProject, one allows user to create the project and insert to database. EditProject inherits fields and methods
		from Project class.

**Contains full Docblocks for all PHP files.
	- Full docblocks are provided for PHP files.

**Has full validation on the client side through JavaScript and server side through PHP.
	- Validation as needed through JS and also validation through PDO and prepared statements and validation.php.  

**Incorporates jQuery and Ajax.
	- jQuery is heavily used for editing purposes, to add, manipulate or delete data from the projects. Ajax is also used to update database/project information.