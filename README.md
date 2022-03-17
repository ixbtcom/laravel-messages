# Laravel Messages System

---

This package add messages system to Laravel application based on <a href="https://tallstack.dev/" target="_blank">TALL stack</a> (Tailwind CSS, Alpine.js, Laravel, Livewire).

## Requirments

This package is compatible with <a href="https://jetstream.laravel.com/" target="_blank">Laravel Jetstream</a> package for Livewire stack. If you have it installed and working there are no futher steps required.

If you don't have Laravel Jetstream you need to have some sort of authentication because package use Laravels Authenticatable class to get authneticated user.
Also, you need to have already installed and working Tailwind CSS, Alpine.js and Livewire.

## Installation

You can install the package via composer:

```bash
composer require vojislavd/laravel-messages
```

After that you need to publish migrations and config files:

```bash
php artisan vendor:publish --tag="laravel-messages-migrations"
```

```bash
php artisan vendor:publish --tag="laravel-messages-config"
```

Run migration:

```bash
php artisan migrate"
```

In `tailwind.config.js` file add blade files from this package

```js
module.exports = {
    content: [
        './vendor/vojislavd/laravel-messages/**/*.blade.php', // <-- Add this line
    ],

    theme: {},

    plugins: [],
};
```

Install dependencies and run build process
```bash
npm install && npm run dev
```

## Usage

Include component to your HTML page

```html
@livewire('inbox')
```
### Auto Refresh Messages
In config file `config\messages.php` you can configure component to automatically refresh and to get new messages, also you can configure refresh interval.

```php
'update' => [
    'auto' => true,
    'interval' => 750 // milliseconds
],
```

By default, auto refresh option is disabled.

### Filter Forbidden Words
Component have basic filter for forbidden words. In config file you can configure words to be filtered with option to filter exact words or contain text.

```php
'validation' => [
    'filter' => [
        'exact' => ['exact', 'forbidden', 'words'],
        'contain' => ['contain', 'forbidden', 'words'],
    ],
],
```

## Testing
Run the tests with:

```bash
composer test
```

## Credits

- [Vojislav Dragicevic](https://vojislavd.com/)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.