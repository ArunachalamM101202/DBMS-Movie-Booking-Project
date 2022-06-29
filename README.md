# **DBMS-Movie-Booking-Project**
## Project Description
An Online Movie Booking Website whose data is completely from a database to ensure that it can be implemented in a real time scenario as any change of data needs to be done only in the database using SQL queries and the changes are immediately reflected. No important movie data, comments data, profile data is hard coded in this project

**This website was made by [Arunachalam M](https://github.com/ArunachalamM101202) on 17th January 2022**

## For Quick Navigation
- [Technologies Used](#tech)
- [Functionalities of the website](#func)
- [Working Demo of the Project](#demo)
- [Why did I do this Project?](#why)
- [What did I learn from this Project?](#learn)
- [How to use this Project ?](#use)
- [License](#lic)
- [Contact](#con)

## Technologies Used <a id="tech"></a>
- HTML
- CSS
- Javascript
- PHP
- PostgreSQL

## Functionalities of the website  <a id="func"></a>
- User can create an account by signing up and then use their credentials to log in
- Users can view all the related information about a movie in a clear and attractive manner
- Users can post their comments and ratings on any film
- Users can select any show they prefer by selecting their preferred time and date
- Users can also select the number of seats they are gonna book(1-10)
- Users can select whichever seat they prefer(A0 to J9)
- Each show(combination of date and time) consists of 100 seats
- Previously booked seats cannot be booked again and will be displayed in red color
- Users can pre-book their food
- At the end of booking, users can view their booking summary in the form of a ticket with the total amount displayed at the end which is done by using PHP sessions
- Each user has a seperate profile page which displays their personal information(information entered during sign up), previous bookings and recent comments on any movie
- Users can delete their account

## Working Demo of the Project <a id="demo"></a>
[DBMS Movie Booking Project Video](https://drive.google.com/file/d/12NqGfKC7Fb5VyH9Puu_yksZO9H_8hLAg/view?usp=sharing)

## Why did I do this Project?  <a id="why"></a>
The main purpose of this project started when I was developing my previous [Movie Booking Website](https://github.com/ArunachalamM101202/Movie-Booking-Website). Most of the data was hard coded and the website cannot be used in a real time scenario as each addition or deletion of a movie will require entire change of code in multiple places.

To find a solution to the above mentioned problem is the main reason for the creation of this website. In this website, nothing is hard coded and everything can be changed by the use of a simple SQL query and this website can actually be used in **real time scenario**

Another reason why I wanted to do this project was to create a really functional profile page which tracks the user's data and shows them a summary of their ticket bookings, comments posted by them and other information etc.

## What did I learn from this Project <a id="learn"></a>
- Learnt more about the steps and processes to be done to have an efficient backend for a project
- How to make a proper ER Diagram before starting a project
- How to retrieve any information using primary and foreign keys
- Learnt how to make a website which has no hard coded data
- How to connect php and PostgreSQL
- How to make the best use of **PHP Sessions**
- Learnt how to use postgres specific functions in php (Ex: pg_query(), pg_num_rows())
- How to use advanced CSS3 features like flexbox, transitions, parallax and glow effect

## How to use this Project ? <a id="use"></a>

Follow the following steps to use this project in your computer/laptop

* First, fork this repository and download the DBMS_Project folder
* Store the folder inside your HTdocs folder (install xampp if you haven't)
* Using pgadmin4 (PostgresSQL 13 or higher), import the sql dump file [dreamworldcinemas](https://github.com/ArunachalamM101202/DBMS-Movie-Booking-Project/blob/main/DBMS_project/dreamworldcinemas) to get the SQL tables
* Start your xampp server
* Type ```localhost:8080/DBMS_project/DBMS_2020115013/login/login.php``` in the address bar
* Login page is the first page of the website, if you try to open any other page, it will redirect to the login page.
* Now you can create an account and start using the website and explore its functionalities

## License <a id="lic"></a>
DBMS-Movie-Booking-Project is licensed under the MIT License. Read the [License file](https://github.com/ArunachalamM101202/DBMS-Movie-Booking-Project/blob/main/LICENSE) to know more

## Contact <a id="con"></a>
Arunachalam M - rome101202@gmail.com

