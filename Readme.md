######1))
    change .env file of root directory of laravel

    change this according to your PHPmyadmin settings
    DB_DATABASE=memegram
    DB_USERNAME=root
    DB_PASSWORD=12345678


######2))
    run commnad to migrate model

    php artisan migrate


######3))
    run commad to seed fake data

    php artisan db:seed

    This will create 30 images files in public/images directory
    Make sure public/images directory has write permission..
    This will also create factory data in Mysql database

######4))
    use postman to see data

    To get The list of all pictures collection and it is also paginated for 15 objects as JSON request
    GET http://localhost:8000/api/pictures

    when you want to get particular picture data
    GET http://localhost:8000/api/picture/1


    when you want to post data
    POST http://localhost:8000/api/picture
    post this from postman raw data console
    {

    }

    when you want to edit data
    PUT http://localhost:8000/api/picture
    edit this from postman raw data console
    {

    }

