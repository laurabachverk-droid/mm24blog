# mm24blog

A Laravel 13 blog application built with PHP, SQLite, Blade, Vite, and Tailwind CSS.

This guide explains how to install and run the project on Windows from a clean computer. Run the commands in PowerShell unless stated otherwise.

## 1. Install the required programs

Install the following tools:

- **Visual Studio Code:** https://code.visualstudio.com/Download
- **Git for Windows:** https://git-scm.com/download/win
- **PHP 8.3 or newer:** https://windows.php.net/download/ (or follow Laravel's Windows setup guide: https://laravel.com/docs/13.x/installation)
- **Composer:** https://getcomposer.org/download/
- **Bun:** https://bun.sh/docs/installation
- **Node.js and npm (recommended as a fallback):** https://nodejs.org/en/download

After installing, close and reopen PowerShell. Check that the commands are available:

```powershell
git --version
php -v
composer --version
bun --version
node --version
npm --version
```

If a command is not recognized, check that the program is installed and added to your Windows PATH, then open a new terminal.

## 2. Enable the required PHP extensions

Laravel needs PHP extensions for encryption, database access, file handling, and XML processing. This project uses SQLite. Make sure these extensions are enabled:

- `ctype`
- `curl`
- `dom`
- `fileinfo`
- `filter`
- `hash`
- `mbstring`
- `openssl`
- `pdo`
- `pdo_sqlite`
- `session`
- `tokenizer`
- `xml`
- `sqlite3`

Find the active PHP configuration file:

```powershell
php --ini
```

Open the listed **Loaded Configuration File** (the `php.ini`) in VS Code or Notepad. In Windows PHP installations, extension lines may start with a semicolon. Remove the leading semicolon from the relevant lines, for example:

```ini
extension=curl
extension=fileinfo
extension=mbstring
extension=openssl
extension=pdo_sqlite
extension=sqlite3
```

Do not add duplicate entries if an extension is already enabled. Save `php.ini`, reopen PowerShell, and check the loaded modules:

```powershell
php -m
```

If an extension is missing from the list, check that the extension DLL exists in the PHP `ext` folder and that the `extension_dir` setting points to that folder. The exact PHP setup may differ depending on how PHP was installed.

## 3. Clone the repository

Open PowerShell in the folder where you keep your projects, then run:

```powershell
git clone https://github.com/laurabachverk-droid/mm24blog.git
cd mm24blog
```

Run the remaining commands from the `mm24blog` project root, where `composer.json` and `package.json` are located.

## 4. Install PHP dependencies

Install the packages listed in `composer.json` and `composer.lock`:

```powershell
composer install
```

If Composer reports a missing PHP extension, return to step 2, enable it in the active `php.ini`, and rerun `composer install`.

## 5. Install frontend dependencies with Bun

Install Bun packages and build the frontend assets:

```powershell
bun install
bun run build
```

The project also supports npm. If you choose npm instead of Bun, use the following commands rather than mixing package managers:

```powershell
npm install
npm run build
```

## 6. Create the environment file

Copy the example environment configuration to your local `.env` file:

```powershell
Copy-Item .env.example .env
```

If `.env` already exists, do not overwrite your local configuration. The example file configures the project to use SQLite and sets the local application URL to `http://localhost:8000`.

## 7. Generate the application key

Run:

```powershell
php artisan key:generate
```

This generates the encryption key and saves it to `.env`. Do not commit or share your real `.env` file.

## 8. Create the SQLite database and run migrations

Create the SQLite database file if it does not exist:

```powershell
if (-not (Test-Path "database/database.sqlite")) {
    New-Item -ItemType File -Path "database/database.sqlite" | Out-Null
}
```

Create the database tables:

```powershell
php artisan migrate
```

If Laravel cannot open the database, confirm that `database/database.sqlite` exists and that `pdo_sqlite` and `sqlite3` are enabled in PHP.

## 9. Start the application

Start the Laravel development processes:

```powershell
composer run dev
```

Keep this terminal open while using the site. Open this address in your browser:

**http://localhost:8000**

If the terminal prints a different local address, use the address shown there. Press `Ctrl+C` in the terminal to stop the development processes.

## 10. Run the project again later

After the first installation, you do not need to clone the repository or reinstall dependencies each time. Open PowerShell and navigate to your project folder, replacing the example path with your actual folder location:

```powershell
cd C:\path\to\mm24blog
composer run dev
```

Then visit http://localhost:8000.

## Troubleshooting

- **`php`, `composer`, `bun`, or `git` is not recognized:** install the missing program, check PATH, and restart PowerShell.
- **Composer reports an unsupported PHP version:** install PHP 8.3 or newer and ensure that the correct PHP version is on PATH.
- **Composer reports a missing extension:** enable it in the active `php.ini` as described in step 2.
- **The database file cannot be opened:** repeat the SQLite file creation command in step 8 and check the SQLite PHP extensions.
- **CSS or JavaScript assets are missing:** run `bun install` and `bun run build` from the project root.
- **The page does not open:** make sure `composer run dev` is still running and use the local URL printed in the terminal.

## Useful maintenance commands

```powershell
php artisan route:list
php artisan migrate:status
composer run test
```

These commands list the registered routes, show migration status, and run the project's test suite.
