# Laravel-SQL Database-

```markdown

### 1. Create Database on SQL
Create a new database for your project.

```
### 2. Create a Laravel Project
    composer create-project laravel/laravel     example-app

If cloning from a repository:
```bash
git clone <repository-link>
composer update
composer install
```
- Create `.env` file and generate a secret key:
```bash
php artisan key:generate
```

---

### 3. Run Application on a Different Port
```bash
php artisan serve --port=8080
```

---

### 4. Update `.env` File for Database
```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bookStore
DB_USERNAME=root
DB_PASSWORD=
```

---

### 5. Create Model, Factory, Controller, and Migration
```bash
php artisan make:model Book -cfm
```
Or manually create a controller:
```bash
php artisan make:controller BookController --resource
```

---

### 6. Update the Latest Migration File
```php
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
```

---

### 7. Run Migrations
```bash
php artisan migrate
```
To rollback, reset, or refresh migrations:
```bash
php artisan migrate:rollback
php artisan migrate:reset
php artisan migrate:refresh
```

---

### 8. Modify Migrations (Adding/Removing Columns)
Example: Remove 'price' column
```bash
php artisan make:migration remove_column_to_books_table --table=books
```
In the migration file:
```php
public function up()
{
    Schema::table('books', function (Blueprint $table) {
        $table->dropColumn('price');
    });
}
public function down()
{
    Schema::table('books', function (Blueprint $table) {
        $table->decimal('price', 8, 2);
    });
}
```
Run the migration:
```bash
php artisan migrate
```

---

### 9. Generate Seed Data
```bash
php artisan make:seeder BookSeeder
```
Example seeder:
```php
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

    public function run()
    {    employee::truncate();
         employee::factory(500)->create();
    }
```


Run the seeder:
```bash
php artisan db:seed
```

---

### 10. Configure Routes
```php
use App\Http\Controllers\testController;
Route::resource('books', testController::class);
```

---

### 11. Modify Book Model
```php
protected $fillable = ['id','title', 'isbn'];
```

---

### 12. Create Blade Views
- Create a `books` folder inside `resources/views`.
- Create a layout file `app.blade.php` in the `layouts` folder.

---

### 13. Serve Application on a Different Port
```bash
php artisan serve --port=8080
```

---

### 14. Clear Database and Reseed
To refresh and seed the database:
```bash
php artisan migrate:refresh --seed
```
To truncate a table:
```bash
php artisan migrate:refresh
```

---

Now you're all set to run and manage your Laravel  project!
```

