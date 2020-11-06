# Finance PH Project Repository v2.0

Hello Friend, welcome back. Here is where all the hard work... The blood, sweat, and tears have resulted into. The culmination of staring at my monitor for several hours at a time, to the point where my eyes start to bleed. I loved doing this project and would like to share my experience:

Key takeaways from the experience:

- I am never using the Vuetify Navbar again.
- I've learned so much from the past 2 weeks and although I'm fairly new to backend development, I'm starting to be able to map in my head what I need to do in the backend because I've developed a fundamental understanding while creating this project.

- I spent a lot of my time on the U.I. performing implementations that would never make it to production. did a lot of things that never made it to this final repo. The trial and error costed me time (as well as the navbar.) 

-  My eyes have feelings.
## Important Note & Updates: 
- For admin account it IS ABSOLUTELY REQUIRED that you register your name as "admin" to see the admin panel.
- Admin Panel has been patched and is accessible.
- Modified the navbar to show the name of the user if logged in.

## Pre-requisites

Make sure you have the following software:
- XAMPP Control Panel >= 3.2.4
- Composer >= v2.0.4
- Node >= 12.8.3
- PHP Version >= 7.4.11



## Installation

1. Fork this Repository
2. Clone this Repository
```bash
git clone https://github.com/pacholoamit/FinancePH.git
```
3. Once you clone the repository initiate XAMPP:
- Navigate into the htdocs directory
```
C:\xampp\htdocs
```
- Create a folder named "pro1"
- Take financeph_backend and place it in the 'pro1' folder.
4. Navigate into financeph_backend folder, Open the Command-Line-Interface (CLI), then:
```composer
Run composer update
```
This will update your PHP dependencies for the back-end
5. While still in your financeph_backend folder.
- Navigate to 'public' folder then 'financeph_frontend' folder
- Your current directory should be like this:
```
C:\xampp\htdocs\pro1\financeph_backend\public\financeph_frontend
```
6. Open your CLI in the current directory (financeph_frontend) and run:
```node
npm install
``` 
This will install all your Node modules for the front-end side.
7. Installation section finished.




## Usage
1. Open your XAMPP control panel
2. Start the "Apache" and "MySQL" server.
3. Navigate into your financeph_backend folder which should be in a directory like this if you followed my instructions:
```
C:\xampp\htdocs\pro1\financeph_backend
```
4. Open the command-line-interface and run:
```composer
php artisan serve
```
this will set up the laravel server which looks like this:
```
 PHP 7.4.11 Development Server (http://127.0.0.1:8000) started
```
4a. We need to configure our .ENV file in laravel to connect it to our database, at this point I'm expecting you to create a database in phpmyadmin. You can do this if you by initiating the "appache" and "mysql" server in XAMPP and typing 'localhost' in the browser.

4b. Define your database in the .ENV file. It should look something like this:
```
DB_DATABASE={YOUR DATABASE HERE}
```
4c. Migrate the tables to the database by opening the command-line-interface and inputting:
```composer
php artisan migrate
```
5. Navigate into your financeph_frontend folder which should be in a directory like this if you followed my instructions:
```
C:\xampp\htdocs\pro1\financeph_backend\public\financeph_frontend

```
6. Open the command-line-interface and run:
```
npm run serve
```
this will setup your development server like this:
```
 App running at:
  - Local:   http://localhost:8080/
  - Network: http://192.168.42.239:8080/
```
7. Open your browser and naviate to the development server and it should all work.







## License
Driver's license.
