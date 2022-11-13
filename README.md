## Usage
Clone this repository by running following command
```
git clone [https://github.com/LeRon1605/ICode.git](https://github.com/LeRon1605/Web.git)
```
Create database connection configuration file db.php in configs folder following below template
```
<?php
    $config['database'] = 
    [
        'host' => isset($_ENV['DB_HOST']) ? $_ENV['DB_HOST'] : <YOUR_DB_HOST>,
        'username' => isset($_ENV['DB_USER']) ? $_ENV['DB_USER'] : <YOUR_DB_USERNAME>,
        'password' => isset($_ENV['DB_PASSWORD']) ? $_ENV['DB_PASSWORD'] : <YOUR_DB_PASSWORD>,
        'db' => isset($_ENV['DB_DATABASE']) ? $_ENV['DB_DATABASE'] : <YOUR_SCHEME>
    ]
?>
```
The project is configured to run by Docker Compose. The services are listed in the docker-compose.yml file. You can launch this project by the following command.
```
docker-compose up
```
Then visit homapage by url: http://localhost:3000/index.php/home.
