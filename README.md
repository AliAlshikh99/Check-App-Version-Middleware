# Middleware for Checking X-App-Version Header in Laravel

This middleware is designed to be used in Laravel applications to check the value of the `X-App-Version` header in the incoming requests. It is commonly used to verify the version of a mobile app and perform necessary actions, such as prompting the user to update their app if the current version is less than the latest version.


## Installation

1. Copy the provided `CheckAppVersion.php` file into your Laravel application's `app/Http/Middleware` directory.

2. Open your Laravel application's `app/Http/Kernel.php` file.

3. Locate the `$middlewareAliases` property in the `Kernel` class.

4. Add the following entry to the `$middlewareAliases` array:

   ```php
   'check.app.version' => \App\Http\Middleware\CheckAppVersion::class,
   ```

## Usage

To use the `CheckAppVersion`, follow these steps:

1. Open the relevant route file (e.g., `web.php` or `api.php`) in your Laravel application.

2. Apply the middleware to the desired route or route group by adding `check.app.version` to the `middleware` key.

   ```php
   Route::get('/example', [ExampleController::class,'example'])->middleware('check.app.version');
   ```


  

Note: You can customize the behavior of the middleware according to your specific requirements by modifying the `CheckAppVersion` class.