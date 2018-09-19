### Installation

From root of your project:
1. Run `composer install`

2. Configure DB connection in `/config/php/db_params.php`

3. Run `php vendor/doctrine/migrations/bin/doctrine-migrations migrations:migrate --configuration=config/php/migrations.php`
