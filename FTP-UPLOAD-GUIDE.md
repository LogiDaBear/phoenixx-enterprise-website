# Hostinger FTP Upload & Email Configuration Guide

## 📧 CRITICAL: Email Password Setup

Before uploading, you MUST configure your email password in `send-email.php`:

1. Open `send-email.php` in a text editor
2. Find line 14: `define('SMTP_PASSWORD', 'YOUR_EMAIL_PASSWORD_HERE');`
3. Replace `YOUR_EMAIL_PASSWORD_HERE` with the password for rsoml@phxxrising.org
4. Save the file

**IMPORTANT**: This is the password you use to login to https://mail.hostinger.com

---

## 🚀 FTP Upload Instructions

### Step 1: Get Your FTP Credentials

1. Log into your Hostinger account
2. Go to **Hosting** → Select your hosting plan
3. Click **File Manager** or **FTP Accounts**
4. Note down:
   - **FTP Hostname**: Usually `ftp.phxxrising.org` or provided by Hostinger
   - **FTP Username**: Usually your domain name or custom username
   - **FTP Password**: (Create one if needed)
   - **Port**: 21 (standard) or 22 (SFTP)

### Step 2: Choose an FTP Client

**Option A: FileZilla (Recommended - Free)**
1. Download from: https://filezilla-project.org/
2. Install and open FileZilla

**Option B: Use Hostinger's File Manager**
1. Log into Hostinger
2. Go to **File Manager** (no FTP client needed)

### Step 3: Connect via FileZilla

1. Open FileZilla
2. Enter your credentials at the top:
   - **Host**: ftp.phxxrising.org (or your FTP hostname)
   - **Username**: Your FTP username
   - **Password**: Your FTP password
   - **Port**: 21
3. Click **Quickconnect**

### Step 4: Navigate to Public Directory

In FileZilla's right panel (Remote site):
1. Look for folder called `public_html` or `www` or `htdocs`
2. Double-click to open it
3. This is where your website files go

### Step 5: Upload Website Files

**Upload ALL these files to public_html:**

Required files:
- ✅ index.html
- ✅ styles.css
- ✅ script.js
- ✅ send-email.php (with password configured!)
- ✅ phoenixxlogofullcolorrgb.jpg
- ✅ phoenixxlogoonecolorrgb.png
- ✅ tablecard_back.png
- ✅ tablecard_front.png

**How to upload:**
1. In FileZilla's left panel, navigate to your downloaded website folder
2. Select all 8 files
3. Right-click → Upload (or drag and drop to right panel)
4. Wait for upload to complete (green checkmarks)

### Step 6: Set File Permissions (Important for PHP)

1. In FileZilla, right-click on `send-email.php`
2. Select **File Permissions**
3. Set to `644` (or check: Read/Write for Owner, Read for Group & Public)
4. Click OK

---

## 🔧 Email Configuration Testing

### Test Your Email Setup

After uploading, test the contact form:

1. Visit: `https://phxxrising.org`
2. Scroll to Contact section
3. Fill out the form
4. Submit

**Check your email at**: https://mail.hostinger.com
- You should receive the form submission
- The customer should receive an auto-reply

### Troubleshooting Email Issues

**If emails aren't sending:**

1. **Check PHP Error Log**:
   - In Hostinger control panel → **Advanced** → **Error Logs**
   - Look for PHP errors

2. **Verify SMTP Settings**:
   - Make sure password is correct in `send-email.php`
   - Hostinger SMTP: `smtp.hostinger.com`
   - Port: 587 (TLS) or 465 (SSL)

3. **Test Direct Mail Function**:
   Create a file `test-email.php` with:
   ```php
   <?php
   $to = 'rsoml@phxxrising.org';
   $subject = 'Test Email';
   $message = 'This is a test email from your website.';
   $headers = 'From: rsoml@phxxrising.org';
   
   if (mail($to, $subject, $message, $headers)) {
       echo 'Email sent successfully!';
   } else {
       echo 'Email failed to send.';
   }
   ?>
   ```
   Upload it and visit: `https://phxxrising.org/test-email.php`

4. **Alternative: Use PHPMailer** (if basic mail() doesn't work):
   - See `send-email-phpmailer.php` (advanced option I can create if needed)

---

## 🌐 Your DNS Records Look Good!

Your email DNS records are properly configured:
- ✅ MX Records: Correct
- ✅ SPF Record: Configured  
- ✅ DKIM Records: Configured
- ✅ DMARC: Configured

This means emails from your domain should be delivered successfully.

---

## 📝 Post-Upload Checklist

After uploading everything:

- [ ] Visit https://phxxrising.org - site loads correctly
- [ ] Test navigation - all links work
- [ ] Test contact form - submits successfully
- [ ] Check email inbox - form submission received
- [ ] Test auto-reply - customer gets confirmation
- [ ] Test on mobile device
- [ ] Test QR code - scans correctly
- [ ] Update social media links in HTML (if not done yet)
- [ ] Add Google Calendar (update iframe in HTML)

---

## 🔐 Security Best Practices

1. **Protect send-email.php**:
   - Never share this file publicly
   - Consider using environment variables for passwords (advanced)

2. **Enable HTTPS**:
   - In Hostinger control panel → **SSL**
   - Enable **Force HTTPS** redirect
   - Free SSL is included with Hostinger

3. **Keep Backups**:
   - Download a copy of your site monthly
   - Hostinger also has automatic backups

---

## 🆘 Need Help?

**Common Issues:**

1. **"403 Forbidden" error**:
   - Check file permissions (should be 644 for files, 755 for directories)

2. **"500 Internal Server Error"**:
   - Check PHP syntax in send-email.php
   - Look at error logs in Hostinger

3. **Form submits but no email**:
   - Verify password in send-email.php
   - Check spam folder
   - Review error logs

4. **Images not loading**:
   - Make sure image filenames match exactly (case-sensitive)
   - Check all images uploaded to same directory as index.html

**Get Support:**
- Hostinger Support: Live chat in your control panel
- Email me: rsoml@phxxrising.org

---

## 🎉 You're All Set!

Once uploaded and tested, your website will be live at:
**https://phxxrising.org**

Share it on your social media and business cards!

**Remember**: The QR code on your site generates a vCard that people can scan to save your contact info directly to their phone!
