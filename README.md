## Set Up Laravel Project

1. Clone the repository.
2. cd into project.
3. Install composer dependencies.

    ```
    composer install
    ```
4. Install npm dependencies.

    ```
    npm install
    ```
5. Create a copy of .env file.

    ```
    cp .env.example .env
    ```
6. Generate an app encryption key.

    ```
    php artisan key:generate
    ```

7. Create an empty database for the application.

8. In the .env file, add database information. Fill in the ```DB_HOST```, ```DB_PORT```, ```DB_DATABASE```, ```DB_USERNAME```, and ```DB_PASSWORD``` options to match the credentials of the database you    just created.

9. Publish schema to database.

    ```
    php artisan migrate
    ```
10. Seed the database.

    ```
    php artisan db:seed
    ```

11. Link storage.

    ```
    php artisan storage:link
    ```
    
12. Run the application. 
  
    ```
    php artisan serve
    ```


## Sample Login Credentials

- Email: admin@gmail.com
- Password: p@ssw0rd

## Screenshots

![FireShot Capture 070 - Laravel - 127 0 0 1](https://user-images.githubusercontent.com/74673566/232230839-069ef0da-7db0-4cf6-8d7e-41b78bb3ae35.png)

![ezgif com-optimize](https://user-images.githubusercontent.com/74673566/232231215-12268c7b-3d56-4fea-bef2-5825c3898153.gif)

![Screenshot 2023-03-26 023347](https://user-images.githubusercontent.com/74673566/232230865-176708fc-fb4c-42ae-9bc0-b2921c01d499.png)







