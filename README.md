Nintendo Hub

- School project 

- Place where you can tag your games!

- You can pick one of many games on Nintendo Switch, and tag them as „Playing, Finished, Won’t play or Want to play,

- If you’re admin, you can add or delete games.

How does it work?

- You need to connect to database (Your database…) 
- You can find the details at config.php
- You’ll need 3 tables.

Games – id(int) 
		name(varchar) 
		developer (varchar) 
		release_date (date)

user_form – id (int)
			 name (varchar)
			 email (varchar)
			 password(varchar)
			 user_type (varchar)

user_games – id (int)
			  user_id (int) references user
			  games_id (int) references games
			  status (varchar)



© Czech tea 2024, This web is not co-operated nor endorsed by Nintendo co. Ltd., Everything here is for personal use. please don't sue me :D 




