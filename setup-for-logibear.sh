#!/bin/bash

# Phoenixx Enterprises - Custom Setup for LogiBear
# This script will set up your Git repository and push to GitHub

echo "================================================"
echo "  PHOENIXX ENTERPRISES - GIT SETUP"
echo "  Setting up: /home/logi_bear/projects/self-employ/phxxrising"
echo "================================================"
echo ""

# Your specific paths
SOURCE_DIR="/mnt/user-data/outputs"
TARGET_DIR="/home/logi_bear/projects/self-employ/phxxrising"
GITHUB_REPO="https://github.com/LogiDaBear/phoenixx-enterprise-website.git"

# Check if source directory exists
if [ ! -d "$SOURCE_DIR" ]; then
    echo "❌ Error: Source directory not found: $SOURCE_DIR"
    exit 1
fi

# Check if target directory exists
if [ ! -d "$TARGET_DIR" ]; then
    echo "❌ Error: Target directory not found: $TARGET_DIR"
    echo "Please create it first: mkdir -p $TARGET_DIR"
    exit 1
fi

echo "📁 Copying website files to your project directory..."
echo "   From: $SOURCE_DIR"
echo "   To:   $TARGET_DIR"
echo ""

# Copy all files except .git directory
rsync -av --exclude='.git' "$SOURCE_DIR/" "$TARGET_DIR/"

if [ $? -ne 0 ]; then
    echo "❌ Error copying files!"
    exit 1
fi

echo "✅ Files copied successfully!"
echo ""

# Navigate to target directory
cd "$TARGET_DIR" || exit 1

echo "📦 Initializing Git repository..."
git init

if [ $? -ne 0 ]; then
    echo "❌ Git init failed!"
    exit 1
fi

echo "✅ Git initialized!"
echo ""

echo "⚙️  Configuring Git user..."
git config user.name "Phoenixx Enterprises"
git config user.email "rsoml@phxxrising.org"

echo "✅ Git configured!"
echo ""

echo "📝 Adding all files..."
git add .

echo "✅ Files staged!"
echo ""

echo "💾 Creating initial commit..."
git commit -m "Initial commit: Phoenixx Enterprises website

- Professional website with black/red/white design
- Side navigation with smooth scrolling
- Contact form with PHP email backend
- Testimonials carousel
- Google Calendar integration placeholder
- QR code generator for business cards
- Responsive design for all devices
- HTTPS security and .htaccess configuration

Rise. So others may live."

if [ $? -ne 0 ]; then
    echo "❌ Commit failed!"
    exit 1
fi

echo "✅ Initial commit created!"
echo ""

echo "🔗 Adding GitHub remote..."
git remote add origin "$GITHUB_REPO"

echo "✅ Remote added!"
echo ""

echo "🌿 Renaming branch to main..."
git branch -M main

echo "✅ Branch renamed!"
echo ""

echo "================================================"
echo "  READY TO PUSH TO GITHUB!"
echo "================================================"
echo ""
echo "Your repository: $GITHUB_REPO"
echo ""
echo "To push now, run:"
echo "  git push -u origin main"
echo ""
echo "You'll need to enter:"
echo "  - Username: LogiDaBear"
echo "  - Password: Your Personal Access Token"
echo ""
echo "Get token at: https://github.com/settings/tokens"
echo ""
echo "Or run this script will push for you..."
read -p "Push to GitHub now? (y/n) " -n 1 -r
echo ""

if [[ $REPLY =~ ^[Yy]$ ]]; then
    echo ""
    echo "🚀 Pushing to GitHub..."
    git push -u origin main
    
    if [ $? -eq 0 ]; then
        echo ""
        echo "================================================"
        echo "  ✅ SUCCESS! Website is on GitHub!"
        echo "================================================"
        echo ""
        echo "View at: https://github.com/LogiDaBear/phoenixx-enterprise-website"
        echo ""
        echo "Next steps:"
        echo "  1. Upload files to Hostinger (see FTP-UPLOAD-GUIDE.md)"
        echo "  2. Configure email password in send-email.php"
        echo "  3. Test your website at https://phxxrising.org"
        echo ""
        echo "Rise. So others may live."
    else
        echo ""
        echo "❌ Push failed. Common issues:"
        echo "  1. Need Personal Access Token (not password)"
        echo "  2. Token needs 'repo' permission"
        echo "  3. Check internet connection"
        echo ""
        echo "Get token: https://github.com/settings/tokens"
        echo ""
        echo "To try again:"
        echo "  git push -u origin main"
    fi
else
    echo ""
    echo "Cancelled. When ready to push, run:"
    echo "  cd $TARGET_DIR"
    echo "  git push -u origin main"
fi

echo ""
echo "Done!"
