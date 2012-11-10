This is a RESTful service which provides the ability to post user scores, run reports on the collected data.

Installation:
---------------
- Verify ModRewrite is enabled in PHP (in linux use command "sudo a2enmod rewrite && sudo apache2 restart")
- create a leaderboard DB and import leaderboard.sql
- edit 'lib/db.php' with your mysql details (default is root, blank password)
- in the terminal run "php path/to/project/root/fake_data.php to import 1,000,000 rows of game data.


JSON Endpoints Available:
-------------------------
GET 	/api/user/:number
POST 	/api/user/:number
GET 	/api/admin/				
GET 	/api/admin/count		Total Players
GET		/api/admin/today
GET		/api/admin/all
GET 	/api/admin/top10
GET 	/api/admin/top10Improved
