# GITHUB SETUP GUIDE - PHOENIXX ENTERPRISES

## ✅ ALREADY DONE FOR YOU

Your Git repository is initialized and ready!
- ✅ Git repository created
- ✅ All files added
- ✅ Initial commit made (16 files)
- ✅ Git user configured as "Phoenixx Enterprises"
- ✅ Git email set to rsoml@phxxrising.org

---

## 🚀 PUSH TO GITHUB - 3 EASY STEPS

### STEP 1: Create GitHub Repository (On GitHub Website)

1. **Go to GitHub**: https://github.com
2. **Login** to your GitHub account (or create one if needed)
3. **Click** the **+** button in top right → **New repository**
4. **Fill in details**:
   - **Repository name**: `phoenixx-enterprises-website` (or your choice)
   - **Description**: "Professional safety and security training website"
   - **Visibility**: 
     - ✅ **Public** (recommended - free hosting options)
     - OR **Private** (if you want it hidden)
   - ⚠️ **DO NOT** check "Initialize with README" (we already have files)
   - ⚠️ **DO NOT** add .gitignore (we already have one)
5. **Click** "Create repository"

---

### STEP 2: Copy Your Repository URL

After creating the repository, GitHub will show you a URL. Copy it!

It will look like:
```
https://github.com/YOUR_USERNAME/phoenixx-enterprises-website.git
```

Or if using SSH:
```
git@github.com:YOUR_USERNAME/phoenixx-enterprises-website.git
```

**Use HTTPS if you're not sure** - it's easier for first-time users.

---

### STEP 3: Connect and Push (Run These Commands)

Open your Ubuntu terminal and run these commands **one at a time**:

#### A) Navigate to your website folder:
```bash
cd /mnt/user-data/outputs
```

#### B) Add GitHub as remote (Replace URL with yours!):
```bash
git remote add origin https://github.com/YOUR_USERNAME/phoenixx-enterprises-website.git
```

**EXAMPLE** (replace with your actual URL):
```bash
git remote add origin https://github.com/johndoe/phoenixx-enterprises-website.git
```

#### C) Rename branch to 'main' (GitHub's default):
```bash
git branch -M main
```

#### D) Push to GitHub:
```bash
git push -u origin main
```

**If asked for credentials:**
- Username: Your GitHub username
- Password: Your GitHub Personal Access Token (NOT your GitHub password)

---

## 🔑 GETTING A GITHUB PERSONAL ACCESS TOKEN

If GitHub asks for a password, you need a Personal Access Token:

1. Go to: https://github.com/settings/tokens
2. Click "Generate new token" → "Generate new token (classic)"
3. Name it: "Phoenixx Website"
4. Check these permissions:
   - ✅ **repo** (full control of private repositories)
5. Click "Generate token"
6. **COPY THE TOKEN** (you won't see it again!)
7. Use this token as your password when pushing

---

## 📋 FULL COMMAND SEQUENCE (COPY-PASTE READY)

Replace `YOUR_USERNAME` and `YOUR_REPO_NAME` with your actual values:

```bash
# Navigate to project
cd /mnt/user-data/outputs

# Add remote (REPLACE THIS URL!)
git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git

# Rename branch to main
git branch -M main

# Push to GitHub
git push -u origin main
```

---

## 🔄 MAKING UPDATES LATER

After initial push, when you make changes:

```bash
# Navigate to project
cd /mnt/user-data/outputs

# Check what changed
git status

# Add all changes
git add .

# Commit changes
git commit -m "Description of what you changed"

# Push to GitHub
git push
```

---

## ⚠️ IMPORTANT: EMAIL PASSWORD SECURITY

**BEFORE pushing to a PUBLIC repository:**

### Option 1: Use the GitHub-safe version (Recommended)

1. **On your server**, keep using `send-email.php` with the password
2. **On GitHub**, rename the safe version:
   ```bash
   cd /mnt/user-data/outputs
   git mv send-email.php send-email-with-password.php
   git mv send-email-github-safe.php send-email.php
   git commit -m "Use environment variable for password"
   git push
   ```

### Option 2: Remove password before committing

Edit `send-email.php` and change line 14 to:
```php
define('SMTP_PASSWORD', getenv('SMTP_PASSWORD') ?: '');
```

Then on your server, set environment variable (ask Hostinger support how).

### Option 3: Keep repo PRIVATE

Make your repository private on GitHub so only you can see it.

---

## 🌐 BONUS: FREE HOSTING WITH GITHUB PAGES

If you want to host directly from GitHub (alternative to Hostinger):

1. **Make repository public**
2. Go to **Settings** → **Pages**
3. Under **Source**, select **main** branch
4. Click **Save**
5. Your site will be live at:
   ```
   https://YOUR_USERNAME.github.io/phoenixx-enterprises-website
   ```

**Note**: GitHub Pages is static only - PHP won't work. You'd need to:
- Use a service like Formspree for contact forms
- Or keep hosting on Hostinger and just use GitHub for version control

---

## 📊 VERIFY YOUR REPOSITORY

After pushing, visit your GitHub repository:
```
https://github.com/YOUR_USERNAME/phoenixx-enterprises-website
```

You should see:
- ✅ All 16 files
- ✅ Your commit message
- ✅ A nice README.md preview
- ✅ Green "commits" indicator

---

## 🆘 TROUBLESHOOTING

### "Remote already exists"
```bash
git remote remove origin
git remote add origin YOUR_GITHUB_URL
```

### "Permission denied"
- Make sure you're using the correct Personal Access Token
- Or set up SSH keys: https://docs.github.com/en/authentication

### "Updates were rejected"
```bash
git pull origin main --rebase
git push -u origin main
```

### "Not a git repository"
```bash
cd /mnt/user-data/outputs
git init
git add .
git commit -m "Initial commit"
# Then continue with remote add...
```

---

## 🎯 QUICK REFERENCE

### Check status:
```bash
git status
```

### See commit history:
```bash
git log --oneline
```

### View remotes:
```bash
git remote -v
```

### Pull latest from GitHub:
```bash
git pull
```

### Clone repository elsewhere:
```bash
git clone https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git
```

---

## 🎉 YOU'RE ALL SET!

Once pushed to GitHub, you'll have:
- ✅ Full version control
- ✅ Backup of your website
- ✅ Easy collaboration
- ✅ Professional portfolio piece
- ✅ Option for GitHub Pages hosting

**Next Steps:**
1. Create GitHub account (if needed)
2. Create new repository
3. Run the push commands above
4. Share your repo: `github.com/YOUR_USERNAME/phoenixx-enterprises-website`

---

**Questions?** Email: rsoml@phxxrising.org

**Rise. So others may live.**
