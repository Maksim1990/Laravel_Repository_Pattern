## Sample Laravel Repository Pattern application

###### This application is an example of implementation and using following techniques and services

> - Laravel Repository Pattern
> - Laravel Pipeline technique
> - Integration of [Bugsnag](https://www.bugsnag.com/) service
> - Integration of [Google Recaptcha](https://www.google.com/recaptcha/admin#list) service
> - Implementation of [NEXMO](https://www.nexmo.com) service for sending SMS
> - Implementation of Geoip service




#### Installation

1. Install this code on your local system
     
    1. Fork this repository (click 'Fork' button in top right corner)
    2. Clone the forked repository on your local file system
    
        ```
        cd /path/to/install/location
        
        git clone https://github.com/Maksim1990/Laravel_Repository_Pattern.git
        ```

2. Change directory into the local clone of the repository

    ```
    cd Laravel_Repository_Pattern
    ```

3. Install [NPM](https://getcomposer.org) & [Composer](https://getcomposer.org) dependencies

    ```
    npm install
    
    composer install
    ```

4. Create a `.env` file by copying the sample

    ```
    cp .env.example .env
    ```
    
    Or for Windows:
    
    ```
    copy .env.example .env
    ```
    
 5. Register new [Recaptcha](https://www.google.com/recaptcha/admin#list) site and add your credentials to `.env` file 
     ```
     CAPTCHA_SITE_KEY=xxx
     CAPTCHA_SECRET_KEY=xxx
    ```
    
 6. Register at [Bugsnag](https://www.bugsnag.com/) create new Application and add your credentials to `.env` file 
     ```
     BUGSNAG_API_KEY=xxx
     ```
7. Run migrations

    ```
    php artisan migrate
    ```

8. Start project running

    ```
    php artisan serve
    ```
 ![#f03c15](https://placehold.it/15/f03c15/000000?text=+)   **ATTENTION!**

 ##### For checking CRUD functionality got to `/posts` route 
   
 ##### For checking CRUD functionality got to `/tasks` route   


