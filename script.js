// Mobile Menu Toggle
const menuToggle = document.getElementById('menuToggle');
const sidenav = document.getElementById('sidenav');
const navLinks = document.querySelectorAll('.nav-link');

menuToggle.addEventListener('click', () => {
    sidenav.classList.toggle('active');
    menuToggle.classList.toggle('active');
});

// Close menu when clicking on a link
navLinks.forEach(link => {
    link.addEventListener('click', () => {
        sidenav.classList.remove('active');
        menuToggle.classList.remove('active');
    });
});

// Active Navigation on Scroll
const sections = document.querySelectorAll('section[id]');

function highlightNavigation() {
    const scrollY = window.pageYOffset;
    
    sections.forEach(section => {
        const sectionHeight = section.offsetHeight;
        const sectionTop = section.offsetTop - 100;
        const sectionId = section.getAttribute('id');
        const navLink = document.querySelector(`.nav-link[href="#${sectionId}"]`);
        
        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
            navLinks.forEach(link => link.classList.remove('active'));
            if (navLink) navLink.classList.add('active');
        }
    });
}

window.addEventListener('scroll', highlightNavigation);

// Testimonial Carousel
class TestimonialCarousel {
    constructor() {
        this.slides = document.querySelectorAll('.testimonial-slide');
        this.currentSlide = 0;
        this.dotsContainer = document.querySelector('.carousel-dots');
        
        this.init();
    }
    
    init() {
        // Create dots
        this.slides.forEach((_, index) => {
            const dot = document.createElement('div');
            dot.className = 'carousel-dot';
            if (index === 0) dot.classList.add('active');
            dot.addEventListener('click', () => this.goToSlide(index));
            this.dotsContainer.appendChild(dot);
        });
        
        this.dots = document.querySelectorAll('.carousel-dot');
        
        // Button controls
        document.querySelector('.carousel-btn.prev').addEventListener('click', () => this.prevSlide());
        document.querySelector('.carousel-btn.next').addEventListener('click', () => this.nextSlide());
        
        // Auto-advance
        this.startAutoPlay();
    }
    
    goToSlide(index) {
        this.slides[this.currentSlide].classList.remove('active');
        this.dots[this.currentSlide].classList.remove('active');
        
        this.currentSlide = index;
        
        this.slides[this.currentSlide].classList.add('active');
        this.dots[this.currentSlide].classList.add('active');
        
        this.resetAutoPlay();
    }
    
    nextSlide() {
        const next = (this.currentSlide + 1) % this.slides.length;
        this.goToSlide(next);
    }
    
    prevSlide() {
        const prev = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
        this.goToSlide(prev);
    }
    
    startAutoPlay() {
        this.autoPlayInterval = setInterval(() => this.nextSlide(), 6000);
    }
    
    resetAutoPlay() {
        clearInterval(this.autoPlayInterval);
        this.startAutoPlay();
    }
}

// Initialize carousel
if (document.querySelector('.testimonial-carousel')) {
    new TestimonialCarousel();
}

// QR Code Generation
function generateQRCode() {
    const qrContainer = document.getElementById('qrcode');
    if (!qrContainer) return;
    
    // Create vCard data for business card
    const vCard = `BEGIN:VCARD
VERSION:3.0
FN:Phoenixx Enterprises
ORG:Phoenixx Enterprises
TITLE:Safety & Security Training
EMAIL:rsoml@phxxrising.org
ADR:;;Columbus;OH;;USA
URL:https://phxxrising.org
NOTE:Rise. So others may live.
END:VCARD`;
    
    // Generate QR code
    new QRCode(qrContainer, {
        text: vCard,
        width: 200,
        height: 200,
        colorDark: "#0D0D0D",
        colorLight: "#F8F9FA",
        correctLevel: QRCode.CorrectLevel.H
    });
}

// Initialize QR code when page loads
if (typeof QRCode !== 'undefined') {
    generateQRCode();
} else {
    // Retry after script loads
    setTimeout(generateQRCode, 500);
}

// Contact Form Handling
const contactForm = document.getElementById('contactForm');

contactForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    // Get submit button
    const submitBtn = contactForm.querySelector('button[type="submit"]');
    const originalBtnText = submitBtn.textContent;
    
    // Disable button and show loading state
    submitBtn.disabled = true;
    submitBtn.textContent = 'Sending...';
    
    // Get form data
    const formData = new FormData(contactForm);
    
    try {
        // Send to PHP backend
        const response = await fetch('send-email.php', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        
        if (data.success) {
            // Show success message
            showNotification(data.message, 'success');
            
            // Reset form
            contactForm.reset();
        } else {
            // Show error message
            showNotification(data.message || 'There was an error sending your message. Please try again.', 'error');
        }
    } catch (error) {
        console.error('Form submission error:', error);
        showNotification('Network error. Please check your connection and try again.', 'error');
    } finally {
        // Re-enable button
        submitBtn.disabled = false;
        submitBtn.textContent = originalBtnText;
    }
});

// Notification System
function showNotification(message, type = 'info') {
    // Remove existing notification
    const existing = document.querySelector('.notification');
    if (existing) existing.remove();
    
    // Create notification
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.textContent = message;
    
    // Add styles
    Object.assign(notification.style, {
        position: 'fixed',
        top: '20px',
        right: '20px',
        padding: '1.5rem 2rem',
        background: type === 'success' ? '#28a745' : type === 'error' ? '#dc3545' : '#17a2b8',
        color: 'white',
        borderRadius: '4px',
        boxShadow: '0 10px 30px rgba(0,0,0,0.3)',
        zIndex: '10000',
        animation: 'slideInRight 0.3s ease-out',
        maxWidth: '400px',
        fontSize: '1rem',
        fontFamily: 'Source Sans 3, sans-serif'
    });
    
    document.body.appendChild(notification);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease-in';
        setTimeout(() => notification.remove(), 300);
    }, 5000);
}

// Add animation keyframes
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Smooth Scroll Enhancement
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Intersection Observer for Scroll Animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe sections
document.querySelectorAll('section').forEach(section => {
    section.style.opacity = '0';
    section.style.transform = 'translateY(30px)';
    section.style.transition = 'opacity 0.8s ease-out, transform 0.8s ease-out';
    observer.observe(section);
});

// Observe service cards
document.querySelectorAll('.service-card').forEach((card, index) => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(30px)';
    card.style.transition = `opacity 0.6s ease-out ${index * 0.2}s, transform 0.6s ease-out ${index * 0.2}s`;
    observer.observe(card);
});

// Observe stat items
document.querySelectorAll('.stat-item').forEach((stat, index) => {
    stat.style.opacity = '0';
    stat.style.transform = 'translateY(20px)';
    stat.style.transition = `opacity 0.5s ease-out ${index * 0.1}s, transform 0.5s ease-out ${index * 0.1}s`;
    observer.observe(stat);
});

// Counter Animation for Stats
function animateCounter(element, target, duration = 2000) {
    let start = 0;
    const increment = target / (duration / 16);
    
    const counter = setInterval(() => {
        start += increment;
        if (start >= target) {
            element.textContent = target + '+';
            clearInterval(counter);
        } else {
            element.textContent = Math.floor(start) + '+';
        }
    }, 16);
}

// Trigger counter animation when stats are visible
const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const number = entry.target.querySelector('.stat-number');
            const targetValue = parseInt(number.textContent);
            animateCounter(number, targetValue);
            statsObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('.stat-item').forEach(stat => {
    statsObserver.observe(stat);
});

// Hide scroll indicator when scrolling down
let lastScroll = 0;
const scrollIndicator = document.querySelector('.scroll-indicator');

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;
    
    if (scrollIndicator) {
        if (currentScroll > 100) {
            scrollIndicator.style.opacity = '0';
        } else {
            scrollIndicator.style.opacity = '0.6';
        }
    }
    
    lastScroll = currentScroll;
});

// Email integration placeholder
// In production, you would integrate with EmailJS, Formspree, or your own backend
function setupEmailIntegration() {
    // Example with EmailJS (you'll need to set this up)
    // emailjs.init("YOUR_USER_ID");
    
    // Or with Formspree (add action to form)
    // <form action="https://formspree.io/f/YOUR_FORM_ID" method="POST">
}

console.log('Phoenixx Enterprises Website Loaded');
console.log('Rise. So others may live.');
