Changes For localhost:

Step 1:
Open your project in Visula Studio Code.
Go to search section at left side.
Find and replace :
http://localhost/gieqs -- replace by your local path.

Step 2:
Change Host name in project:

	2.1> \assets\scripts\xcrud\integration\codeigniter_extended\application\xcrud\xcrud_config.php
		
		$dbhost = localhost (Line no 8)

	2.2> \assets\scripts\xcrud\integration\codeigniter_simple\xcrud\xcrud_config.php		$dbhost = localhost (Line no 10)

	2.3> \assets\scripts\xcrud\xcrud\xcrud_config.php

			$dbhost = localhost (Line no 13)

Step 3:
Config folder:
	
	Step 3.1:
	You have to place it inside root folder.

	Step 3.2:
	Change host name. $host_name = ''

	Step 3.3:

	>> if project file location: htdocs/gieqs
	
            $rootfolder = '/gieqs';  Line No 18
            $_SESSION['rootfolder'] = $rootfolder;

            change $url_main = 'http://localhost/gieqs'; (Enter your localhost url) line no 67.

	>> if project file location: htdocs/dashboard/gieqs like this

	
            $rootfolder = '/dashboard/gieqs';   Line No 18
            $_SESSION['rootfolder'] = $rootfolder;

            change $url_main = 'http://localhost/gieqs'; (Enter your localhost url) line no 67.


Step 4:
htaccess file:

htdocs/gieqs:
RewriteBase /gieqs/   line number 13

htdocs/dashboard/gieqs:
RewriteBase /dashboard/gieqs/    line number 13

Step 5:
Database-
you have to update wordpress database table .

open this sql file in editor. then search and replace
https://gieqs.com -> http://localhost/gieqs (localhost url)


