![php-reactjs-boilerplate.png](https://github.com/kkamara/useful/blob/main/php-reactjs-boilerplate.png?raw=true)

![food-nutrition-facts-search-web-app.png](https://github.com/kkamara/useful/raw/main/food-nutrition-facts-search-web-app.png)

# Food Nutrition Facts Search Web App

(17-Jul-2023) Using the search recipes endpoint at www.rapidapi.com/spoonacular/api/recipe-food-nutrition and returns the title value. Made with www.github.com/kkamara/php-reactjs-boilerplate .

[Online compiler](https://wandbox.org/).

* [Code Snippet](#code-snippet)

* [Installation](#installation)

* [Usage](#usage)

* [Api Documentation](#api-documentation)

* [Redis Queue](#redis-queue)

* [Unit Tests](#unit-tests)

* [Browser Tests](#browser-tests)

* [Mail server](#mail-server)

* [Misc](#misc)

* [Contributing](#contributing)

* [License](#license)

## Code Snippet

```bash
php artisan tinker
```

```bash
>>> $user=User::factory()->create(['email'=>'admin@mail.com']);
=> App\Models\User {#4558
     first_name: "Oran",
     last_name: "Stracke",
     email: "admin@mail.com",
     #password: "$2y$10$IxQ3zIM6aANNvOjTzmZboOfa1wrpdFgByfqzbAQLKmsWvHTEK/Zky",
     #remember_token: "RwXuuCJ856",
     updated_at: "2023-07-17 12:54:50",
     created_at: "2023-07-17 12:54:50",
     id: 1,
   }
>>> $user->foodNutrition()->create(['food_nutrition_fact'=>'Healthy food is good']);
=> App\Models\FoodNutrition {#4552
     food_nutrition_fact: "Healthy food is good",
     users_id: 1,
     updated_at: "2023-07-17 12:55:24",
     created_at: "2023-07-17 12:55:24",
     id: 1,
   }
```

## Installation
* [https://laravel.com/docs/9.x/installation](https://laravel.com/docs/9.x/installation)
* [https://laravel.com/docs/9.x/mix#main-content](https://laravel.com/docs/9.x/mix#main-content)

```bash
# Create our environment file.
cp .env.example .env
```

Add our Sqlite database location in `.env`.

```
# DB_DATABASE=/Users/kel/workspace/food-nutrition-facts-search-web-app/database/database.sqlite
DB_DATABASE="$SQLITE_PATH"
```

```bash
# Install our app dependencies.
composer i
# Using Docker?
make dev && make backend-migrate
# Not using Docker?
php artisan key:generate
php artisan migrate --seed
npm install # And npm i
npm run dev # And yarn dev
```

## Usage

* [https://github.com/kkamara/laravel-makefile](https://github.com/kkamara/laravel-makefile)
* [https://laravel.com/docs/9.x/sail#main-content](https://laravel.com/docs/9.x/sail#main-content)

```bash
php artisan serve --port 3000
```

## Api Documentation

```bash
php artisan route:list
```

## Redis Queue

You can test the `/job` endpoint to invoke a job example you can then view at 

```bash
alias sail='vendor/bin/sail'
sail artisan queue:listen redis --queue stuff
# output
[2022-04-16 13:30:17][KttOLxAyP6mnsNGScDLbKAgvxpJ7M0AA] Processing: App\Jobs\TestJob
[2022-04-16 13:30:17][KttOLxAyP6mnsNGScDLbKAgvxpJ7M0AA] Processed:  App\Jobs\TestJob
```

## Unit Tests

```bash
php artisan test
```

View the unit test code [here](https://raw.githubusercontent.com/kkamara/php-reactjs-boilerplate/main/tests/Feature/API/UserTest.php).

## Browser Tests

```bash
alias sail='vendor/bin/sail'
sail dusk
```

## Mail Server

You can test the `/mail` endpoint to send a test mail you can then view at `:8025/`.

![docker-mailhog3.png](https://raw.githubusercontent.com/kkamara/useful/main/docker-mailhog3.png)

Mail environment credentials are at [.env](https://raw.githubusercontent.com/kkamara/php-reactjs-boilerplate/main/.env.example).

The [mailhog](https://github.com/mailhog/MailHog) docker image runs at `http://localhost:8025`.

## Misc

[See PHP ReactJS Boilerplate.](https://github.com/kkamara/php-reactjs-boilerplate)

[See Amazon Scraper.](https://github.com/kkamara/amazon-scraper)

[See Python Amazon Scraper 2.](https://github.com/kkamara/python-selenium)

The `Makefile` for this project contains useful commands for a Laravel application and can be found at [laravel-makefile](https://github.com/kkamara/laravel-makefile).

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[BSD](https://opensource.org/licenses/BSD-3-Clause)
