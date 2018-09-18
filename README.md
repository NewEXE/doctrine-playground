### Installation

From root of your project:
1. composer install

2. Configure DB connection in /config/php/db_params

3. php vendor/doctrine/migrations/bin/doctrine-migrations migrations:migrate --configuration=config/php/migrations.php
