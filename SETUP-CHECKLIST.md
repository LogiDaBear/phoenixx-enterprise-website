# PHOENIXX ENTERPRISES - QUICK SETUP CHECKLIST

## ⚡ BEFORE YOU UPLOAD - CRITICAL STEPS

### 1. Configure Email Password (5 minutes)
- [ ] Open `send-email.php` in a text editor (Notepad, VS Code, etc.)
- [ ] Find line 14: `define('SMTP_PASSWORD', 'YOUR_EMAIL_PASSWORD_HERE');`
- [ ] Replace `YOUR_EMAIL_PASSWORD_HERE` with your actual email password for rsoml@phxxrising.org
- [ ] Save the file
- [ ] **DO NOT SKIP THIS STEP** - Email won't work without it!

### 2. Prepare Your FTP Credentials
- [ ] Login to Hostinger control panel
- [ ] Find FTP credentials (or create new FTP account)
- [ ] Write down:
  - FTP Host: _________________
  - Username: _________________
  - Password: _________________
  - Port: 21 (or 22 for SFTP)

---

## 📤 UPLOAD FILES VIA FTP

### Option A: Using FileZilla (Recommended)
- [ ] Download FileZilla from https://filezilla-project.org/
- [ ] Install and open
- [ ] Connect using your FTP credentials
- [ ] Navigate to `public_html` folder on server (right panel)
- [ ] Upload ALL files to public_html:
  - [ ] index.html
  - [ ] styles.css
  - [ ] script.js
  - [ ] send-email.php (with password set!)
  - [ ] phoenixxlogofullcolorrgb.jpg
  - [ ] phoenixxlogoonecolorrgb.png
  - [ ] tablecard_back.png
  - [ ] tablecard_front.png
  - [ ] .htaccess (rename htaccess.txt to .htaccess)

### Option B: Using Hostinger File Manager
- [ ] Login to Hostinger
- [ ] Go to **File Manager**
- [ ] Click **Upload** button
- [ ] Select all website files
- [ ] Wait for upload to complete

---

## 🧪 TEST YOUR WEBSITE

### Basic Tests
- [ ] Visit https://phxxrising.org
- [ ] Website loads correctly
- [ ] Navigation works (click all menu items)
- [ ] Images display properly
- [ ] QR code shows up

### Email Form Test
- [ ] Scroll to Contact section
- [ ] Fill out the form completely
- [ ] Click "Send Message"
- [ ] You should see green success message
- [ ] Check rsoml@phxxrising.org inbox (https://mail.hostinger.com)
- [ ] You should have received the form submission
- [ ] Check if auto-reply was sent to test email

### If Email Doesn't Work:
- [ ] Double-check password in send-email.php
- [ ] Check Hostinger error logs
- [ ] Try uploading send-email-phpmailer.php instead
- [ ] Contact Hostinger support if still issues

---

## 🎨 CUSTOMIZE YOUR SITE

### Social Media Links
- [ ] Open index.html in text editor
- [ ] Find social media links (search for `href="#"`)
- [ ] Replace # with your actual URLs:
  - Facebook: https://facebook.com/yourpage
  - Instagram: https://instagram.com/yourpage
  - LinkedIn: https://linkedin.com/company/yourpage
  - Twitter: https://twitter.com/yourpage
- [ ] Save and re-upload index.html

### Google Calendar
- [ ] Login to Google Calendar
- [ ] Get your calendar embed code
- [ ] Open index.html
- [ ] Find the calendar iframe (around line 270)
- [ ] Replace with your calendar code
- [ ] Save and re-upload

### Update Content
- [ ] Review About section - update statistics if needed
- [ ] Update testimonials with real client feedback
- [ ] Add actual phone number if desired
- [ ] Save and re-upload index.html

---

## 🔐 SECURITY & PERFORMANCE

### Enable HTTPS
- [ ] Login to Hostinger
- [ ] Go to **SSL** section
- [ ] Enable SSL certificate (free)
- [ ] Enable "Force HTTPS" option
- [ ] Test: Visit http://phxxrising.org - should redirect to https://

### Set Up Backups
- [ ] Hostinger has automatic backups
- [ ] Manually download site copy monthly
- [ ] Store email password securely (password manager)

---

## 📊 ANALYTICS & TRACKING (Optional)

### Google Analytics
- [ ] Create Google Analytics account
- [ ] Get tracking code
- [ ] Add to index.html before `</head>`
- [ ] Upload updated file

### Google Search Console
- [ ] Add site to Google Search Console
- [ ] Submit sitemap
- [ ] Monitor search performance

---

## 🚀 GO LIVE!

### Final Checks
- [ ] All links work
- [ ] Email form works
- [ ] Mobile responsive (test on phone)
- [ ] HTTPS enabled
- [ ] Social links updated
- [ ] Calendar embedded

### Share Your Site
- [ ] Update business cards with QR code
- [ ] Share on social media
- [ ] Update email signature
- [ ] Tell your clients!

---

## 📞 NEED HELP?

**Email Issues:**
- See FTP-UPLOAD-GUIDE.md for detailed troubleshooting

**Hostinger Support:**
- Live chat available 24/7 in your control panel

**Website Questions:**
- Email: rsoml@phxxrising.org

---

## ✅ COMPLETION

Once everything is checked off, you're live!

**Your website:** https://phxxrising.org
**Your email:** rsoml@phxxrising.org

**"Rise. So others may live."**

---

**Last Updated:** February 12, 2026
**Version:** 1.0
