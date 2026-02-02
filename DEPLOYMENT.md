# Deploying to Hostinger Shared Hosting

Follow these steps to deploy your Laravel application to Hostinger.

## 1. Prepare Files
1.  **Zip the Project**: Compress all files in your project directory **except** `node_modules`.
    *   Include `.env.example` (rename to `.env` later).
    *   Include the new `.htaccess` file in the root.
    *   Ensure `vendor` folder is included if you don't plan to run `composer install` on the server (recommended for shared hosting to upload `vendor` to avoid memory issues).

## 2. Upload Files
1.  Log in to your Hostinger hPanel.
2.  Go to **File Manager**.
3.  Navigate to `public_html`.
4.  Upload your `zip` file.
5.  Extract the `zip` file.
6.  Ensure all files are directly inside `public_html` (not in a subfolder).
    *   Since we added a root `.htaccess` file, it will automatically point to the `public` folder.

## 3. Database Setup
1.  Go to **Databases** in hPanel.
2.  Create a new MySQL Database and User. Note down the Database Name, Username, and Password.
3.  Enter phpMyAdmin/Database Manager.
4.  **Import Database**:
    *   If you have a local database export (`.sql` file), import it now.
    *   Alternatively, you can run migrations if you have SSH access (see below).

## 4. Environment Configuration
1.  **Use the Provided Production Config**:
    *   I have created a file named `.env.production` in your project root.
    *   Upload this file to your `public_html` folder.
    *   **Rename it** from `.env.production` to `.env`.
2.  **Verify Settings**:
    *   `DB_HOST=127.0.0.1` (Correct for internal server connection)
    *   `QUEUE_CONNECTION=sync` (Best for shared hosting without supervisor)
    *   `SESSION_DRIVER=file` / `CACHE_STORE=file` (Prevents errors if database isn't migrated yet)
3.  **Update Email Credentials**:
    *   Edit the new `.env` file on the server.
    *   Fill in `MAIL_USERNAME` and `MAIL_PASSWORD` with your Hostinger email details.

## 5. Final Steps
1.  **Generate Key**: If you have SSH access, run `php artisan key:generate`.
    *   If no SSH, run `php artisan key:generate --show` locally, copy the key, and paste it into your server's `.env` file (`APP_KEY`).
2.  **Storage Link**:
    *   If you have SSH: `php artisan storage:link`
    *   If no SSH: You may need to manually create a symlink or use a PHP script to create it.
        *   Create `link_storage.php` in `public_html`:
            ```php
            <?php
            symlink('/home/u123456789/domains/yourdomain.com/public_html/storage/app/public', '/home/u123456789/domains/yourdomain.com/public_html/public/storage');
            echo 'Link created';
            ```
        *   Run it by visiting `yourdomain.com/link_storage.php`, then delete it.
3.  **Clear Cache**:
    *   Since you are on shared hosting, you might not be able to run artisan commands easily. You can create a route to clear cache if needed, or delete files in `bootstrap/cache`.

## Troubleshooting
*   **Redirect Loop**: If you get a redirect loop, check the `.htaccess` file in `public_html` vs `public_html/public`. The root `.htaccess` we created handles the redirect to `public`. ensure `public/.htaccess` is the default Laravel one.
*   **500 Error**: Check `storage/logs/laravel.log` for details. Ensure `storage` and `bootstrap/cache` directories have write permissions (755 or 775).
