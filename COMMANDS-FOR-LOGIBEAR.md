# EXACT COMMANDS FOR YOUR SETUP - LOGIBEAR

## Your Current Setup:
- Working Directory: `/home/logi_bear/projects/self-employ/phxxrising`
- GitHub Repo: `https://github.com/LogiDaBear/phoenixx-enterprise-website.git`
- Status: No git init yet ✅ Perfect!

---

## OPTION 1: AUTOMATED (Easiest - Recommended!)

Just run this one command in your terminal:

```bash
bash /mnt/user-data/outputs/setup-for-logibear.sh
```

This will:
- ✅ Copy all website files to your directory
- ✅ Initialize git
- ✅ Configure git user
- ✅ Create initial commit
- ✅ Add your GitHub remote
- ✅ Ask if you want to push
- ✅ Push to GitHub

**That's it! One command does everything!**

---

## OPTION 2: MANUAL STEP-BY-STEP

Copy and paste these commands **one at a time** into your VSCode terminal:

### Step 1: Copy website files to your directory
```bash
cp -r /mnt/user-data/outputs/* /home/logi_bear/projects/self-employ/phxxrising/
```

### Step 2: Go to your directory
```bash
cd /home/logi_bear/projects/self-employ/phxxrising
```

### Step 3: Verify files are there
```bash
ls -la
```
(You should see index.html, styles.css, etc.)

### Step 4: Initialize Git
```bash
git init
```

### Step 5: Configure Git user
```bash
git config user.name "Phoenixx Enterprises"
git config user.email "rsoml@phxxrising.org"
```

### Step 6: Add all files
```bash
git add .
```

### Step 7: Create initial commit
```bash
git commit -m "Initial commit: Phoenixx Enterprises website"
```

### Step 8: Add your GitHub repository
```bash
git remote add origin https://github.com/LogiDaBear/phoenixx-enterprise-website.git
```

### Step 9: Rename branch to main
```bash
git branch -M main
```

### Step 10: Push to GitHub
```bash
git push -u origin main
```

**When prompted for credentials:**
- Username: `LogiDaBear`
- Password: Your Personal Access Token (see below)

---

## 🔑 GETTING YOUR GITHUB PERSONAL ACCESS TOKEN

You'll need this instead of your GitHub password:

1. Go to: https://github.com/settings/tokens
2. Click: **"Generate new token"** → **"Generate new token (classic)"**
3. Give it a name: `Phoenixx Website`
4. Set expiration: `90 days` (or your preference)
5. Check these scopes:
   - ✅ **repo** (Full control of private repositories)
6. Click: **"Generate token"**
7. **COPY THE TOKEN** - You won't see it again!
8. Use this token as your password when pushing

---

## ⚡ COPY-PASTE ALL AT ONCE

If you want to do it all in one go, copy this entire block:

```bash
# Navigate to your directory
cd /home/logi_bear/projects/self-employ/phxxrising

# Copy website files
cp -r /mnt/user-data/outputs/* .

# Initialize Git
git init

# Configure Git
git config user.name "Phoenixx Enterprises"
git config user.email "rsoml@phxxrising.org"

# Add files
git add .

# Commit
git commit -m "Initial commit: Phoenixx Enterprises website - Full-service safety and security training consultancy based in Columbus, OH"

# Add GitHub remote
git remote add origin https://github.com/LogiDaBear/phoenixx-enterprise-website.git

# Rename to main branch
git branch -M main

# Push (you'll need to enter credentials here)
git push -u origin main
```

---

## ✅ VERIFY IT WORKED

After pushing, check:

1. **On GitHub:** https://github.com/LogiDaBear/phoenixx-enterprise-website
   - Should see all your files
   - Should show commit message
   - Should have a nice README

2. **In your terminal:**
   ```bash
   git status
   ```
   Should say: "On branch main, nothing to commit"

3. **Check remote:**
   ```bash
   git remote -v
   ```
   Should show your GitHub URL

---

## 🔄 MAKING UPDATES LATER

After initial push, when you make changes:

```bash
cd /home/logi_bear/projects/self-employ/phxxrising
git add .
git commit -m "Description of changes"
git push
```

Or use the helper script:
```bash
cd /home/logi_bear/projects/self-employ/phxxrising
./push-to-github.sh
```

---

## 📂 VERIFY YOUR FILES

Before doing anything, make sure these files exist in `/mnt/user-data/outputs/`:

```bash
ls /mnt/user-data/outputs/
```

You should see:
- index.html
- styles.css
- script.js
- send-email.php
- All images (.png, .jpg)
- Documentation (.md files)
- .gitignore
- .htaccess

---

## 🆘 TROUBLESHOOTING

### "Permission denied" when pushing
- Need Personal Access Token, not your password
- Make sure token has 'repo' permission

### "Remote already exists"
```bash
git remote remove origin
git remote add origin https://github.com/LogiDaBear/phoenixx-enterprise-website.git
```

### "Not a git repository"
- Make sure you ran `git init` in the correct directory
- Make sure you're in `/home/logi_bear/projects/self-employ/phxxrising`

### Files not copying
```bash
# Check source exists
ls /mnt/user-data/outputs/

# Try with sudo if needed
sudo cp -r /mnt/user-data/outputs/* /home/logi_bear/projects/self-employ/phxxrising/
```

---

## 🎯 RECOMMENDED APPROACH

**Best option:** Use the automated script!

```bash
bash /mnt/user-data/outputs/setup-for-logibear.sh
```

It handles everything and asks before pushing.

---

## 📞 YOUR REPO INFO

- **Repository:** https://github.com/LogiDaBear/phoenixx-enterprise-website
- **Owner:** LogiDaBear
- **Local Path:** /home/logi_bear/projects/self-employ/phxxrising

---

**Ready when you are! Just pick an option and run the commands.**

**Rise. So others may live.**
