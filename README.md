# CS3380_Final_Porject
Final project of CS3280, database management system
Acutrally, because of CS2830 I had already done a lot of things on database management system, include the index page, login logout page,
the database management page; only thing I need to do is add some new functions like cross table management. In 2830, I creative an
Amazon ec2 server with mysql database, because Amazon ec2 is not free so I had stopped the server and move the system to infinity free.
Because this project can only finished by a group, but I don't want to get some other one disrupt my system, so I decide invite my friends
who studied CS1050 but no idea what is database, I teach them do some exercise management in this system, that is the meanning of it.
The people in my team are Zhiguang Liu(my self pawprint lz7fd), Haotian Bai(hbc4c) and Han Wang(hw747), the URL of the management system
is http://lz7fd.epizy.com/CS3380FinalProject/FinalProject/, we input our personal information in the mix table, we also input the demo 
data by our three.

Team member | Pawprint | Weight
--- | --- | ---
Zhiguang Liu | lz7fd | 80%
Han wang | hw747 | 10%
Haotian Bai | hbc4c | 10%

### The database has 3 tables, one holds the login account, the username is 'username', password is 'password', you need use it to login the management system.
### Other two tables, one is the UserData table, it holds the 'username' and the 'add_date', the primary key is 'ID'
### Another one is the Orders table, it holds the 'quantity' and 'whatever', also the 'ID' primary key.
### In this management system, ID is the foreign key, it cross two tables to join it together.
### The system has 7 different pages: the userdata table page, the orders table page, the mix table page, the searching page and 2 result pages.
### In userdata table page and orders table page, people can add edit delete and read data from the table.
### In searching page people can searh by ID or search by the range of quantity, then read on the result pages.
### The result pages are the inner join result.
### The mix page is read only, it's the inner join on ID from tables.
