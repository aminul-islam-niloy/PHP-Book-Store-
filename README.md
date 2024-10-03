# PHP-Book-Store-

1.Cretate Datbase on SQL 

2. create laravel project
composer create-project laravel/laravel example-app

if you clone : git clone: link;
    composer update
    composer install
    create .env file and create a secret key 
    
    php artisan key:generate

4. ToRun with different port:  php artisan serve --port=8080
5. edit env file:
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=bookStore
   DB_USERNAME=root
   DB_PASSWORD=

6. create : php artisan make:model Book -cfm  
   to create model, factory, controller and migration

    you can create manually controller like this:
    php artisan make:controller BookController --resource

7. update Migration file latest created last:
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

8. php artisan migrate to migrate
      to rollback migration: php artisan migrate:rollback or reset: php artisan migrate:reset
      and refresh: php artisan migrate:refresh
    
php artisan make:migration remove_column_to_employee_table --table=employee

in up section:
Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('price');  // Remove 'price' column
        });
in down section: 
 public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->decimal('price', 8, 2);  // Add the 'price' column back if needed
        });
    }

    php artisan migrate

if i want to add new column: create new migration and add:   $table->timestamp('published_at')->nullable();
in down section:  $table->dropColumn('published_at');
      php artisan migrate


10. To generate test seed :  if not create before: php artisan make:seeder emplyeeSeeder
    go to factory and in Emplyee:
    public function definition()
    {
        return [
           "name"=> $this->faker->name(),
            "job_title"=> $this->faker->jobTitle(),
            'joining_date'=>$this->faker->date(),
            'salary'=>$this->faker->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 10000),
            "email"=> $this->faker->safeEmail(),
            "mobile_no"=> $this->faker->phoneNumber(),
            "address"=> $this->faker->address()
        ];
    }

    on Seeder class:
    Database seeder:  public function run()
    {    employee::truncate();
         employee::factory(100)->create();
    }
    
  run:   php artisan db:seed


10. Crete and CRUD operation on controller
11. configure routes on : routes/web.php
   use App\Http\Controllers\BookController;
   Route::resource('books', BookController::class);

12. Modify book model :
    protected $fillable = ['title', 'author', 'price', 'isbn'];

13. need to seed database:

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


