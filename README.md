***** Author @gaurav ***********
********************************
Welcome to E-Xamine !!!

Steps to Run this App in your Local Machine .

Windows :

    1. Intall XAMPP server .
    2. Copy the ontest folder inside C://xampp/htdocs
    3. Start the MySQL and Apache Server from Xampp server manager.
    4. open http://localhost/phpmyadmin in the browser.
    5. Click on import tab and choose the file C://xampp/htdocs/ontest/OnlineExamWebApp.sql
    6. Check that the database is successfully created .
    7. Open C://xampp/htdocs/ontest/application/config/databse.php and edit line no. 53 if required.
    8. Now that all the setting is completed ,open http://localhost/ontestin the browser. 
    VOILA !!!! You are Here ...


Ubuntu: 

    1. Install LAMP and phpmyadmin.
    2. Recursively Copy the ontest folder inside /var/www
    3. Change permissions recursively to 777.
    4. Open http://localhost/phpmyadmin in the browser.
    5. Click on import tab and choose the file ontest/OnlineExamWebApp.sql
    6. Check that the database is successfully created .
    7. Open /var/www/ontests/application/config/databse.php and edit line nos. 52,53 if required.
     8. Now that all the setting is completed ,open http://localhost/ontest in the browser. 
    VOILA !!!! You are Done...