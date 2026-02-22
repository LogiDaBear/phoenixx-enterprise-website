# Phoenixx Enterprises Website

A professional, modern website for Phoenixx Enterprises - a full-service safety and security training consultancy based in Columbus, OH.

## 🚀 Features

- **Responsive Design**: Works seamlessly on desktop, tablet, and mobile devices
- **Side Navigation**: Fixed sidebar navigation with smooth scrolling
- **Hero Section**: Bold, impactful hero with the company tagline
- **Services Display**: Comprehensive training and security service listings
- **Testimonials Carousel**: Auto-rotating customer testimonials
- **Calendar Integration**: Google Calendar embed for events
- **Contact Form**: Full contact form with email integration ready
- **QR Code**: Auto-generated vCard QR code for business cards
- **Social Media Links**: Ready-to-connect social media integration
- **Smooth Animations**: Professional scroll animations and transitions

## 📁 File Structure

```
phoenixx-website/
├── index.html          # Main HTML file
├── styles.css          # All CSS styling
├── script.js           # JavaScript functionality
├── phoenixxlogofullcolorrgb.jpg    # Full color logo
├── phoenixxlogoonecolorrgb.png     # One color logo
├── tablecard_back.png              # Services card image
├── tablecard_front.png             # Business card front
└── README.md           # This file
```

## 🛠️ Setup & Deployment

### Option 1: Deploy to Netlify (Recommended - Free)

1. Create a free account at [Netlify](https://www.netlify.com/)
2. Drag and drop your website folder into Netlify
3. Your site will be live instantly with HTTPS!

### Option 2: Deploy to GitHub Pages (Free)

1. Create a GitHub account and repository
2. Upload all files to the repository
3. Go to Settings → Pages
4. Select your branch and save
5. Your site will be live at `https://yourusername.github.io/repo-name`

### Option 3: Deploy to Vercel (Free)

1. Create account at [Vercel](https://vercel.com/)
2. Import your project
3. Deploy with one click

### Option 4: Traditional Web Hosting

Upload all files via FTP to your web hosting provider.

## ⚙️ Customization Guide

### 1. Update Social Media Links

In `index.html`, find the social media sections (lines ~25 and footer) and replace `#` with your actual URLs:

```html
<a href="https://facebook.com/yourpage" aria-label="Facebook">
<a href="https://instagram.com/yourpage" aria-label="Instagram">
<a href="https://linkedin.com/company/yourpage" aria-label="LinkedIn">
<a href="https://twitter.com/yourpage" aria-label="Twitter">
```

### 2. Connect Google Calendar

In `index.html`, line ~270, replace the calendar embed with your own:

1. Go to Google Calendar settings
2. Select your calendar → Integrate calendar
3. Copy the iframe code
4. Replace the existing iframe in the HTML

### 3. Set Up Email Form

**Option A: Using Formspree (Easiest)**
1. Sign up at [Formspree.io](https://formspree.io/)
2. Create a new form
3. Add this to your form tag: `action="https://formspree.io/f/YOUR_FORM_ID" method="POST"`

**Option B: Using EmailJS**
1. Sign up at [EmailJS](https://www.emailjs.com/)
2. Set up email service
3. Add EmailJS code to `script.js` (commented example included)

**Option C: Backend Integration**
Use your own server/backend to handle form submissions.

### 4. Customize Colors

In `styles.css`, modify the CSS variables (lines 1-8):

```css
:root {
    --primary-red: #E63946;    /* Main brand color */
    --dark-red: #C1121F;       /* Darker variant */
    --black: #0D0D0D;          /* Background */
    /* ... other colors ... */
}
```

### 5. Update Content

- **Company Info**: Edit the About section in `index.html`
- **Statistics**: Update the numbers in the stats section
- **Testimonials**: Replace with real testimonials (currently placeholder)
- **Services**: Already populated from your business cards

### 6. Add Analytics

Add Google Analytics before the closing `</head>` tag:

```html
<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'GA_MEASUREMENT_ID');
</script>
```

### 7. Update QR Code

The QR code auto-generates a vCard. To customize, edit `script.js` lines ~110-120:

```javascript
const vCard = `BEGIN:VCARD
VERSION:3.0
FN:Phoenixx Enterprises
ORG:Phoenixx Enterprises
EMAIL:phoenixxenterprises@gmail.com
TEL:+1-XXX-XXX-XXXX  // Add your phone
ADR:;;Columbus;OH;;USA
URL:https://yourwebsite.com  // Add your URL
END:VCARD`;
```

## 📱 Testing

Before deploying, test on:
- Desktop browsers (Chrome, Firefox, Safari, Edge)
- Mobile devices (iOS and Android)
- Tablet views

## 🔧 Technical Details

- **Fonts**: Bebas Neue, Oswald, Source Sans 3 (Google Fonts)
- **QR Library**: QRCode.js
- **No build process**: Pure HTML/CSS/JS
- **No dependencies**: Except QRCode.js CDN

## 🎨 Design Philosophy

The design follows these principles:
- **Bold & Professional**: Reflects the mission-critical nature of safety training
- **High Contrast**: Black, red, and white for maximum impact
- **Clear Hierarchy**: Easy navigation and information discovery
- **Accessibility**: Semantic HTML and ARIA labels
- **Performance**: Optimized loading and animations

## 📞 Support

For questions about customization or deployment:
- Email: phoenixxenterprises@gmail.com

## 🚀 Next Steps

1. **Test locally**: Open `index.html` in your browser
2. **Customize content**: Update text, images, and links
3. **Set up email**: Choose and configure email service
4. **Deploy**: Choose a hosting option and go live
5. **Monitor**: Set up analytics to track visitors
6. **Update regularly**: Keep calendar and testimonials fresh

## 📝 License

Built for Phoenixx Enterprises. All rights reserved.

---

**"Rise. So others may live."**
