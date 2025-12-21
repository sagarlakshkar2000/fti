# Database Setup Instructions

Follow these steps to set up the database for the FTI Post Upload System:

## Option 1: Using phpMyAdmin (Recommended for XAMPP)

1. Open your browser and go to: **http://localhost/phpmyadmin**
2. Click on the **"SQL"** tab at the top
3. Copy and paste the contents of `config/database.sql`
4. Click **"Go"** to execute the SQL

## Option 2: Using MySQL Command Line

```bash
# Open MySQL command line
mysql -u root -p

# Execute the SQL file
source c:/xampp/htdocs/fti/config/database.sql
```

## Verify Database Setup

After running the SQL:
1. Refresh phpMyAdmin
2. You should see a database named **fti_db**
3. Inside it, you should see two tables:
   - `posts` (with 1 sample row)
   - `post_images` (with 2 sample rows)

## Admin Credentials

**Username:** admin
**Password:** admin123

You can change these in `config/auth.php`

## Test the System

1. **Login:** http://localhost/fti/admin-login.php
2. **Manage Posts:** http://localhost/fti/admin/manage-posts.php
3. **Upload Post:** http://localhost/fti/admin/upload-post.php
4. **View Modal:** http://localhost/fti/

## Troubleshooting

If you get a "Database connection failed" error:
- Check that MySQL is running in XAMPP
- Verify the credentials in `config/db.php` match your MySQL setup
- Default XAMPP MySQL credentials are: username=root, password=(empty)
