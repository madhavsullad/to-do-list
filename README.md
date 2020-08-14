# To-Do List

This is a simple To-Do list to add tasks and check them off when done, Also able to remove tasks that are not needed or added by mistake. The best feature is that all the tasks added in the webpage is automatically uploaded to a SQL database.

### Pickup where you left off!
All the tasks added before closing the webpage will be updated with the database *`along with their status (done/pending)`*, So that all the tasks are synchronized and will be visible the next time the page is opened!

### Use it *anywhere* and *anytime!*
When hosted on a local server, this list can be accessed using any device connected to the LAN. All the tasks *will be synchronized among all the devices*.

### Future scope
As of now, there is only one synchronized list - meaning only one person can use it on LAN - in future the goal is to add multiple users using personal synchronized lists.

## Languages used

- HTML
- CSS
- PHP
- Javascript
---

## Usage

> There are two ways to run this project. Initially I developed using the second method and then switched to the first one, using Docker.

### 1. Using Docker

   The best and easiest way *(according to me)* is to just run the `docker-compose` and let it take care of everything! The webpage is hosted on a container running apache server from the official `php:7.4-apache` docker image ([Docker Hub](https://hub.docker.com/_/php)) which is mapped to 8000 port of the host system and is linked with another container running the official `mysql:5.7` image ([Docker Hub](https://hub.docker.com/_/mysql)).
   
   1. Clone the repository
   ```bash
   git clone https://github.com/madhavsullad/to-do-list
   ```
   
   2. Run it!
   ```bash
   cd to-do-list/
   docker-compose up
   ```
   
   3. Go to [localhost:8000](http://localhost:8000).

### 2. Using Wamp Server (For Windows)

   > *This is the way I initially developed it.*

   - Download the [Wamp Server for windows](https://sourceforge.net/projects/wampserver/). Also make sure to install mysql in Wamp Server's installation process.

   1. After initial setup, clone this repo in `www` directory inside wamp's installation path. By default this will be at `C:\wamp64\www`.

   2. Create a table `tasklist` in a new database named `todolist`. Or simply import `db/init.sql` into MySQL.

   3. Make sure Wamp server is up (as well as MySQL).
   
   4. Go to [localhost/to-do-list](http://localhost/to-do-list).