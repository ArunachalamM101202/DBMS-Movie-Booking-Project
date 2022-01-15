# **DBMS-Project**
Online Movie Booking Website that is completely driven by a database

## Functionalities of the website
- User can create an account by signing up and then use their credentials to log in
- Users can view all the related information about a movie in a clear and attractive manner
- Users can post their comments and ratings on any film
- Users can select any show they prefer by selecting their preferred time and date
- Users can also select the number of seats they are gonna book(1-10)
- Users can select whichever seat they prefer(A0 to J9)
- Each show(combination of date and time) consists of 100 seats
- Previosuly booked seats cannot be booked again and will be displayed in red color
- Users can pre-book their food
- At the end of booking, users can view their booking summary in the form of a ticket with the total amount displayed at the end which is done by using PHP sessions
- Each user has a seperate profile page which displays their personal information(information entered during sign up), previous bookings and recent comments on any movie
- Users can delete their account

## Why did I do this project?
The main purpose of this project started when I was developing my previous [Movie Booking Website](https://github.com/ArunachalamM101202/Movie-Booking-Website). Most of the data was hard coded and the website cannot be used in a real time scenario as each addition or deletion of a movie will require entire change of code in multiple places.

To find a solution to the above mentioned problem is the main reason for the creation of this website. In this website, nothing is hard coded and everything can be changed by the use of a simple SQL query and this website can actually be used in **real time scenario**

Another reason why I wanted to do this project was to create a really functional profile page which tracks the user's data and shows them a summary of their ticket bookings, comments posted by them and other information etc.

## Technologies Used
- HTML
- CSS
- Javascript
- PHP
- PostgreSQL
