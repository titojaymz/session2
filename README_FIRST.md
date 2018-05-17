This is an example application using the Codeigniter web development framework version 2.2.26. 
The application demonstrates the basic Create, Updated, and Delete function of an application on a Model-View-Controller (MVC) approach in a MySQL database.
The template being used on this sample is a basic bootstrap so that different screen sizes will not be a problem.

Installation procedures

1. Extract the contents to your web folder (e.g. /xampp/htdocs if you are using xampp, and /wamp/www if you are using wamp or lamp)
2. On the root directory, import the sql file inside the database folder (session.sql) to your MySQL database, you may create any database name of your choice, but take note of it.
3. On the application root directory, open the .htaccess file to your text editor (e.g. Notepad++, EditPlus, Sublime, Etc.), look for the link "RewriteBase /session/", change the session with the name of your folder that you extracted to your web directory
4. Still on the application root directory go to /application/config/ and open the file config.php, look for the line "$config['base_url'] = '';" and change the line into "$config['base_url'] = '<name of your root folder>';" (e.g. $config['base_url'] = '/session';). Save the file
5. Still on the application root directory go to /application/config/ and open the file database.php, update the following lines
	$db['default']['hostname'] = 'localhost'; // <-- enter your hostname here
	$db['default']['username'] = 'root'; // <-- enter your database username here
	$db['default']['password'] = 'masterpogi'; // <-- enter your database username password here
	$db['default']['database'] = 'session'; // <-- enter your database name here
Save the file afterwards.
6. Go to your web browser and enter the URL of the application. If hosted locally, an example would be http://localhost/session. Unless hosted somewhere else or in the cloud. key in the url of the host and the root folder.

Sample username and password:

username: josef
password: josef