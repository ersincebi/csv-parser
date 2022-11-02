# php csv parser
Implementation of the application made with the php8, laravel9, html5, css and js, mysql

### Installation
- Clone the project
- In the project folder run `make build` or run the docker commands in Makefile
- When you done run the `make remove` for deleting, be cautious for other docker images on your local machine

### Requirements
- docker
- docker-compose
- make

### without docker
- php
- mysql
- and also you need to define environment variables by hand, like in the `docker-compose.yml` file

### About:
- In this project, I use PHP version 8, laravel 9 framework for the project.
- As a database engine mysql to store datas.
-

#### Requests
The routes available:

| Method | Route                 | Parameters          | Action                            |
|--------|-----------------------|---------------------|-----------------------------------|
| `GET`  | `/`                   | No parameter needed | file upload and list              |
| `POST` | `/csv-upload`         | requires FILE       | Uses temp for uploaded files data |
| `GET`  | `/get-list`           | No parameter needed | Gives the uploaded list as json   |
| `GET`  | `/change-app-locale`  | No parameter needed | For localization                  |
| `GET`  | `/api/v1/get-list`    | No parameter needed | Gives the uploaded list as json   |
