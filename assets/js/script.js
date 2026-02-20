// Preloader
window.addEventListener('load', () => {
    const preloader = document.getElementById('preloader');
    setTimeout(() => {
        preloader.classList.add('loaded');
        // Initialize AOS after preloader
        AOS.init({
            duration: 1000,
            easing: 'ease-out-quart',
            once: true,
            offset: 100
        });
    }, 2000);
});

// Navigation Scroll Effect
window.addEventListener('scroll', () => {
    const navbar = document.getElementById('mainNav');
    if (window.scrollY > 100) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Parallax Effect for Hero
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const heroBackground = document.querySelector('.hero-background');
    if (heroBackground) {
        heroBackground.style.transform = `translateY(${scrolled * 0.5}px)`;
    }
});

// Smooth Scrolling for Navigation Links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            const offsetTop = target.offsetTop - 80; // Account for fixed navbar
            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
            
            // Close offcanvas if open
            const offcanvas = bootstrap.Offcanvas.getInstance(document.getElementById('navbarOffcanvas'));
            if (offcanvas) {
                offcanvas.hide();
            }
        }
    });
});

// Portfolio Filtering
document.addEventListener('DOMContentLoaded', () => {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            btn.classList.add('active');
            
            const filterValue = btn.getAttribute('data-filter');
            
            portfolioItems.forEach(item => {
                if (filterValue === '*' || item.classList.contains(filterValue.substring(1))) {
                    item.classList.remove('hide');
                    item.style.display = 'block';
                } else {
                    item.classList.add('hide');
                    setTimeout(() => {
                        if (item.classList.contains('hide')) {
                            item.style.display = 'none';
                        }
                    }, 300);
                }
            });
        });
    });
});

// Form Submission Handler
document.querySelector('.contact-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Add loading state
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Sending...';
    submitBtn.disabled = true;
    
    // Simulate form submission
    setTimeout(() => {
        alert('Thank you for your message! We\'ll get back to you soon.');
        this.reset();
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    }, 2000);
});

// Image Lazy Loading Enhancement
const images = document.querySelectorAll('img');
const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const img = entry.target;
            img.style.opacity = '0';
            img.style.transition = 'opacity 0.5s ease';
            
            const tempImg = new Image();
            tempImg.onload = () => {
                img.style.opacity = '1';
            };
            tempImg.src = img.src;
            
            observer.unobserve(img);
        }
    });
});

images.forEach(img => {
    imageObserver.observe(img);
});

// Scroll Progress Indicator
const createScrollProgress = () => {
    const progressBar = document.createElement('div');
    progressBar.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 0%;
        height: 3px;
        background: var(--accent-color);
        z-index: 9999;
        transition: width 0.1s ease;
    `;
    document.body.appendChild(progressBar);
    
    window.addEventListener('scroll', () => {
        const scrollTop = window.pageYOffset;
        const docHeight = document.body.offsetHeight - window.innerHeight;
        const scrollPercent = (scrollTop / docHeight) * 100;
        progressBar.style.width = scrollPercent + '%';
    });
};

// Initialize scroll progress
createScrollProgress();

// Reveal animations on scroll
const revealElements = document.querySelectorAll('.service-card, .portfolio-card, .testimonial-card, .blog-card');

const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
});

revealElements.forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'all 0.6s ease';
    revealObserver.observe(el);
});

// Hover effects for interactive elements
document.querySelectorAll('.service-card, .portfolio-card, .testimonial-card, .blog-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-10px)';
    });
    
    card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
    });
});


// Update the existing scroll event handler to include scroll-to-top
const scrollToTopBtn = document.getElementById('scrollToTop');

function updateScrollEffects() {
  // Navigation scroll effect
  const navbar = document.getElementById('mainNav');
  if (window.scrollY > 100) {
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }
  
  // Parallax effect
  const scrolled = window.pageYOffset;
  const heroBackground = document.querySelector('.hero-background');
  if (heroBackground) {
    heroBackground.style.transform = `translateY(${scrolled * 0.5}px)`;
  }
  
  // Scroll to top button
  if (scrollToTopBtn) {
    if (window.scrollY > 300) {
      scrollToTopBtn.classList.add('show');
    } else {
      scrollToTopBtn.classList.remove('show');
    }
  }
  
  ticking = false;
}

// Navigation Scroll Effect - Fixed for mobile offcanvas
window.addEventListener('scroll', () => {
    const navbar = document.getElementById('mainNav');
    const offcanvas = document.getElementById('navbarOffcanvas');
    const isOffcanvasVisible = offcanvas && offcanvas.classList.contains('show');
    
    // Only apply scroll effect if offcanvas is not visible on mobile
    if (window.scrollY > 100 && !isOffcanvasVisible) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Enhanced scroll performance with offcanvas check
let ticking = false;

function updateScrollEffects() {
    const navbar = document.getElementById('mainNav');
    const offcanvas = document.getElementById('navbarOffcanvas');
    const isOffcanvasVisible = offcanvas && offcanvas.classList.contains('show');
    
    // Navigation scroll effect - only apply when offcanvas is closed
    if (window.scrollY > 100 && !isOffcanvasVisible) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
    
    // Parallax effect
    const scrolled = window.pageYOffset;
    const heroBackground = document.querySelector('.hero-background');
    if (heroBackground) {
        heroBackground.style.transform = `translateY(${scrolled * 0.5}px)`;
    }
    
    // Scroll to top button
    const scrollToTopBtn = document.getElementById('scrollToTop');
    if (scrollToTopBtn) {
        if (window.scrollY > 300) {
            scrollToTopBtn.classList.add('show');
        } else {
            scrollToTopBtn.classList.remove('show');
        }
    }
    
    ticking = false;
}

function requestScrollUpdate() {
    if (!ticking) {
        requestAnimationFrame(updateScrollEffects);
        ticking = true;
    }
}

window.addEventListener('scroll', requestScrollUpdate);

// Additional: Close offcanvas when window is resized to desktop
window.addEventListener('resize', () => {
    const offcanvas = bootstrap.Offcanvas.getInstance(document.getElementById('navbarOffcanvas'));
    const navbarToggler = document.querySelector('.navbar-toggler');
    
    if (window.innerWidth > 992 && offcanvas) { // 992px is Bootstrap's lg breakpoint
        offcanvas.hide();
    }
});

// Enhanced offcanvas initialization with scroll lock
document.addEventListener('DOMContentLoaded', () => {
    // Initialize offcanvas
    const offcanvasElement = document.getElementById('navbarOffcanvas');
    if (offcanvasElement) {
        const offcanvas = new bootstrap.Offcanvas(offcanvasElement);
        
        // Prevent body scroll when offcanvas is open on mobile
        offcanvasElement.addEventListener('show.bs.offcanvas', function () {
            document.body.style.overflow = 'hidden';
            // Remove scrolled class to ensure navbar is visible
            document.getElementById('mainNav').classList.remove('scrolled');
        });
        
        offcanvasElement.addEventListener('hide.bs.offcanvas', function () {
            document.body.style.overflow = '';
        });
    }
    
    // Close offcanvas when clicking on links
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            const offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
            if (offcanvas) {
                offcanvas.hide();
            }
        });
    });
});