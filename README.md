This is a RESTful service which provides the ability to post user scores, run reports on the collected data.

Installation:
---------------
- Verify ModRewrite is enabled in PHP (in linux use command "sudo a2enmod rewrite && sudo apache2 restart")
- create a leaderboard DB and import leaderboard.sql
- edit 'lib/db.php' with your mysql details (default is root, blank password)
- in the terminal run "php path/to/project/root/fake_data.php to import 1,000,000 rows of game data.

Setup a Virtualhost for local.kixboard.com:
<quote>
<VirtualHost *:80>
DocumentRoot /var/www/kixboard/
ServerName local.kixboard.com
</VirtualHost>
</quote>


JSON Endpoints Available:
-------------------------
- GET 	/api/user/:number					Find a User
- POST 	/api/user/:number					Create a User
- GET 	/api/admin/count					Total Players
- GET		/api/admin/today					Players Today
- GET		/api/admin/all 						All Games
- GET 	/api/admin/top10 					Top 10 Players
- GET 	/api/admin/top10Improved	Top 10 Improved Players

Screenshot:
-------------------------
<img src="http://i.imgur.com/oQJxA.png"/ height='400px'/>