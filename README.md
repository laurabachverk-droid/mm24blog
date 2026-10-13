# mm24blog

A Laravel 13 blog project using PHP, SQLite, Blade views, and Vite with Tailwind CSS.

This guide explains how to install the project on Windows, from cloning the repository to running it locally.

## Requirements

Install these tools before starting:

- **Git** — to clone the repository.
- **PHP 8.3 or newer** — this project requires `^8.3` (see `composer.json`).
- **Composer** — PHP dependency manager.
- **Bun** — JavaScript package manager used by this repository's `bun.lock`. Node.js and npm can also be used instead, but use one package manager consistently.
- **PHP extensions** required by Laravel, including PDO/SQLite, OpenSSL, Mbstring, cURL, Fileinfo, XML, Ctype, and Tokenizer.

Useful official installation pages:
- PHP and Composer: https://laravel.com/docs/13.x/installation
- Bun: https://bun.sh/docs/installation
- Composer: https://getcomposer.org/download/

To check that the tools are available, open a new PowerShell terminal and run:

```powershell
git --version
php -v
composer --version
bun --version
```

If a command is not recognized, install that tool or correct its PATH setting, then reopen the terminal.

## 1. Clone the repository

Choose a location for your projects, open PowerShell there, and run:

```powershell
git clone https://github.com/laurabachverk-droid/mm24blog.git
cd mm24blog
```

All following commands should be run from the project root, the directory containing `composer.json` and `package.json`.

## 2. Install PHP dependencies

Run:

```powershell
composer install
```

Composer reads `composer.json` and `composer.lock` and installs the PHP packages into `vendor/`.

If Composer reports a missing PHP extension, run `php --ini` to see which `php.ini` file is loaded. Enable the required extension in that file, save it, open a new terminal, and check the modules with:

```powershell
php -m
```

## 3. Install frontend dependencies

This repository includes `bun.lock`, so the recommended option is Bun:

```powershell
bun install
bun run build
```

This installs the JavaScript packages and builds the frontend assets.

If you use Node.js and npm instead of Bun, use these commands rather than the Bun commands:

```powershell
npm install
npm run build
```

Do not mix package managers for the same installation unless you know why you need to do so.

## 4. Create the environment file

Create your local `.env` file from the provided example:

```powershell
Copy-Item .env.example .env
```

If PowerShell says that `.env` already exists, keep your existing local configuration rather than overwriting it.

## 5. Generate the application key

Run:

```powershell
php artisan key:generate
```

Laravel writes the application encryption key into `.env`. Do not commit your real `.env` file or share its contents publicly.

## 6. Create the SQLite database and run migrations

The example environment is configured for SQLite. First, create the database file if it does not exist:

```powershell
if (-not (Test-Path "database/database.sqlite")) {
    New-Item -ItemType File -Path "database/database.sqlite" | Out-Null
}
```

Then run the migrations:

```powershell
php artisan migrate
```

If Laravel reports that the database file cannot be opened, confirm that `database/database.sqlite` exists and that PHP has the SQLite/PDO SQLite extensions enabled.

## 7. Start the project

Run the development command from the project root:

```powershell
composer run dev
```

Leave this terminal open while working. The Laravel development command starts the local development processes configured by the project. Stop them with `Ctrl+C`.

Open the local URL shown by the terminal; the usual Laravel development address is:

http://localhost:8000

## 8. Stop and restart the project

To stop the development processes, press `Ctrl+C` in the terminal where `composer run dev` is running.

To start again later, open PowerShell, change to the project folder, and run:

```powershell
cd path\to\mm24blog
composer run dev
```

Replace `path\to\mm24blog` with the actual location of your project folder.

## Troubleshooting

- **`php`, `composer`, `bun`, or `git` is not recognized:** install the missing tool, check PATH, and reopen PowerShell.
- **Composer reports a PHP version or extension error:** make sure the active PHP version is 8.3 or newer and enable the required extension in the loaded `php.ini`.
- **The database file does not exist:** repeat the database-file creation command in step 6, then run `php artisan migrate` again.
- **Frontend assets are missing:** from the project root, run `bun install` and `bun run build` (or the equivalent npm commands if using npm).
- **The local address does not load:** check the terminal for an error and make sure the development processes are still running.

## Useful commands

```powershell
php artisan route:list
php artisan migrate:status
composer run test
```

The first command lists registered routes, the second shows migration status, and the third runs the test suite configured by Composer.
