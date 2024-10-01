# PHP-Book-Store-

1.Cretate Datbase on SQL 2. create laravel project
composer create-project laravel/laravel example-app

3. ToRun win different port:  php artisan serve --port=8080
4. edit env file:
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=bookStore
   DB_USERNAME=root
   DB_PASSWORD=

5. create : php artisan make:model Book -cfm  
   to create model, factory, controller and migration

    you can create manually controller like this:
    php artisan make:controller BookController --resource

6. update Migration file latest created last:
   public function up()
   {
   Schema::create('books', function (Blueprint $table) {
   $table->id();
   $table->string('title');
   $table->string('author');
   $table->decimal('price', 8, 2);
   $table->string('isbn')->unique();
   $table->timestamps();
   });
   }

7. php artisan migrate to migrate

8. Crete and CRUD operation on controller
9. configure routes on : routes/web.php
   use App\Http\Controllers\BookController;
   Route::resource('books', BookController::class);

10. Modify book model :
    protected $fillable = ['title', 'author', 'price', 'isbn'];

11. need to seed database:

php artisan make:seeder BookSeeder

class BookSeeder extends Seeder
{
public function run()
{
$faker = Faker::create();

        foreach (range(1, 50) as $index) {
            Book::create([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'price' => $faker->randomFloat(2, 10, 100),
                'isbn' => $faker->unique()->isbn13,
            ]);
        }
    }

}

On Database Seeder:

public function run()
    {
        $this->call(BookSeeder::class);
    }


on BookSeeder : 

public function run(): void
    {
        Book::truncate();
        Book::factory()->count(1000)->create();
    }

to Clear all Seeding data: php artisan migrate:refresh --seed

php artisan db:seed

To remove table: Trancate tablename


12: Create Blade Views

create folder books inside resourses/view  
and create blade file for CRUD view

create layout folder and create layout file app.blade.php


13: run for different port:   php artisan serve --port=8080


