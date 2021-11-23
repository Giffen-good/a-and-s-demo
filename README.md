# Art & Science Demo Site

Theme is based on stripped down version of \_s. Uses Tailwind CSS with Laravel Mix.

### Setup

To start using all the tools that come with `_s` you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

### Available CLI commands

`_s` comes packed with CLI commands tailored for WordPress theme development :

- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php` : checks all PHP files for syntax errors.
- `composer make-pot` : generates a .pot file in the `languages/` directory.

`Laravel Mix` commands :

- `npm run watch` : listens for file changes, then updates unminified build files, as needed.
- `npm run production` : Minify and compile code for production

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
