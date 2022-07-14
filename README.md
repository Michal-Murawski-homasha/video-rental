# video-rental - Web App
## The project is being created as part of the INF 04 course.

![video-rental - web app](./screenshots/video-rental.png)

The project is based on Bootstrap 4 and SB Admin 2 theme and all logic is created in PHP 8.1.6.

The structure of the home page and subpages was divided into smallet files (head, sidebar, footer etc.) and uploaded to the addons folder.
The config directory contains the connnection file for the MySQL database connection.
The login directory contines files containing logic for registration and validation and login.

## Adding an employee table.

![video-rental_employee - web app](./screenshots/video-rental_employee-structure.png)
Structure of the employee table.

To add a table with employees to the standard Sakila database import the employee.sql file in the database/ folder. Two sample accounts are created in the table:
| First Name | Last Name | E-amil             |                        |
| :---       | :---      | :---               | :---                   |
| Luke       | Skywalker | skywalker@mail.com | `(password: Abcd1234)` |
| Dart       | Vader     | vader@mail.com     | `(password: Abcd1234)` |

![video-rental_employee - web app](./screenshots/video-rental_employee.png)
