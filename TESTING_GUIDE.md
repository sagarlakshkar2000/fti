# Quick Testing Guide - Post Upload System

## ✅ What's Already Working

Based on my testing:
- ✅ **Database**: Tables created successfully
- ✅ **Admin Login**: http://localhost/fti/admin-login.php (admin/admin123)
- ✅ **Manage Posts Dashboard**: Working, shows existing posts
- ✅ **View Post Modal**: Opens and displays post details
- ✅ **Upload Form**: Loads correctly with drag & drop

## ⚠️ What Needs Testing

###  1. **Test Upload Functionality**

1. Go to: http://localhost/fti/admin/upload-post.php
2. Fill in:
   - Title: "Golden Triangle Tour 2025"
   - Description: "Book now and save 20%!"
3. **Upload 2-3 images** (any JPG/PNG from your computer)
4. Keep status "Active"
5. Click "Upload Post"

**Expected:** Redirects to manage posts with success message

### 2. **Test Frontend Modal**

1. Go to: http://localhost/fti/
2. **Wait 1 second** after page loads
3. Modal should auto-popup showing your latest post

**If modal doesn't appear**, check browser console (F12) for errors

### 3. **Modal Controls**

- Arrow buttons should navigate between images
- Click close button (X) or press ESC to close
- Refresh page - modal should NOT appear again (session storage)
- Open in incognito/private window - modal SHOULD appear again

## 🔧 Troubleshooting

### Modal Not Showing?

1. **Check Browser Console** (F12 → Console tab)
   - Look for JavaScript errors
   - Look for database connection errors

2. **Verify Post Has Images**
   - Go to phpMyAdmin → fti_db → post_images table
   - Make sure images exist for an active post

3. **Clear Session Storage**
   ```javascript
   // In browser console, run:
   sessionStorage.clear();
   location.reload();
   ```

### Upload Not Working?

1. **Check File Permissions**
   - Make sure `/public/assets/uploads/posts/` exists
   - Folder should have write permissions

2. **Check PHP Errors**
   - Look at top of upload page for PHP warnings
   - Check XAMPP error logs

### Sample Images Not Displaying?

That's normal! The sample post references images that don't exist yet. Once you upload a real post with images, everything will work.

## 📝 Next Steps After Testing

Once upload works:
1. Upload a few test posts with real images
2. Test the modal on homepage
3. Test responsive design on mobile (resize browser)
4. Change admin password in `/config/auth.php`

## 🎯 Key Files Reference

- **Database Config**: `config/db.php`
- **Auth Config**: `config/auth.php` (change password here)
- **Upload Directory**: `/public/assets/uploads/posts/`
- **Homepage Modal**: `components/post-modal.php`
- **API Endpoints**: `api/post-api.php`

---

**Need help?** Let me know what error you're seeing! 🚀
