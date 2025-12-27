// DOM Content Loaded Event
document.addEventListener('DOMContentLoaded', function () {
    initializeWebsite();
});

// Initialize Website Functions
function initializeWebsite() {
    setupScrollEffects();
    setupSmoothScrolling();
    setupCounterAnimations();
    setupHeaderEffects();
    setupButtonAnimations();
    setupFormValidation();
    setupFinancialToggle();
    setupIntersectionObserver();
    setupTypewriterEffect();
}

// Header Scroll Effects
function setupHeaderEffects() {
    const header = document.querySelector('header');
    let lastScrollY = 0;
    let ticking = false;

    function updateHeader() {
        const scrollY = window.pageYOffset;

        // Add scrolled class for background effect
        if (scrollY > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        // Hide/show header on scroll
        if (scrollY > lastScrollY && scrollY > 200) {
            header.style.transform = 'translateY(-100%)';
        } else {
            header.style.transform = 'translateY(0)';
        }

        lastScrollY = scrollY;
        ticking = false;
    }

    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateHeader);
            ticking = true;
        }
    }

    window.addEventListener('scroll', requestTick);
}
// Smooth Scrolling for Navigation Links
function setupSmoothScrolling() {
    const navLinks = document.querySelectorAll('a[href^="#"]');

    navLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            const targetId = this.getAttribute('href');
            const targetSection = document.querySelector(targetId);

            if (targetSection) {
                const headerHeight = document.querySelector('header').offsetHeight;
                const targetPosition = targetSection.offsetTop - headerHeight;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}
// Counter Animations for Statistics
function setupCounterAnimations() {
    const counters = document.querySelectorAll('.stats-card .text-4xl');
    const observerOptions = {
        threshold: 0.7,
        rootMargin: '0px 0px -100px 0px'
    };

    const counterObserver = new IntersectionObserver(function (entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.textContent.replace(/[^\d]/g, ''));

                animateCounter(counter, target);
                counterObserver.unobserve(counter);
            }
        });
    }, observerOptions);

    counters.forEach(counter => {
        counterObserver.observe(counter);
    });
}
// Animate Counter Function
function animateCounter(element, target) {
    let current = 0;
    const increment = target / 60; // 60 frames for smooth animation
    const hasPlus = element.textContent.includes('+');

    const timer = setInterval(() => {
        current += increment;

        if (current >= target) {
            current = target;
            clearInterval(timer);
        }

        element.textContent = Math.ceil(current) + (hasPlus ? '+' : '');
    }, 16); // ~60fps
}
// Enhanced Button Animations
function setupButtonAnimations() {
    const buttons = document.querySelectorAll('button, .btn-primary, .btn-secondary');

    buttons.forEach(button => {
        // Mouse enter effect
        button.addEventListener('mouseenter', function () {
            if (!this.disabled) {
                this.style.transform = 'translateY(-2px) scale(1.02)';
            }
        });

        // Mouse leave effect
        button.addEventListener('mouseleave', function () {
            this.style.transform = 'translateY(0) scale(1)';
        });

        // Click effect
        button.addEventListener('mousedown', function () {
            if (!this.disabled) {
                this.style.transform = 'translateY(0) scale(0.98)';
            }
        });

        button.addEventListener('mouseup', function () {
            if (!this.disabled) {
                this.style.transform = 'translateY(-2px) scale(1.02)';
            }
        });

        // Add ripple effect
        button.addEventListener('click', function (e) {
            createRippleEffect(e, this);
        });
    });
}
// Create Ripple Effect
function createRippleEffect(event, element) {
    const ripple = document.createElement('span');
    const rect = element.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;

    ripple.style.cssText = `
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple 0.6s linear;
        left: ${x}px;
        top: ${y}px;
        width: ${size}px;
        height: ${size}px;
        pointer-events: none;
    `;

    // Add ripple animation if not exists
    if (!document.querySelector('#ripple-animation')) {
        const style = document.createElement('style');
        style.id = 'ripple-animation';
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }

    element.style.position = 'relative';
    element.style.overflow = 'hidden';
    element.appendChild(ripple);

    setTimeout(() => {
        ripple.remove();
    }, 600);
}

// Intersection Observer for Animations
function setupIntersectionObserver() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const slideInObserver = new IntersectionObserver(function (entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    // Add animation classes to elements
    const animatedElements = document.querySelectorAll('.stats-card, .news-card, .show_more, .schedule-item, .contact-card');
    animatedElements.forEach((element, index) => {
        element.classList.add('fade-in');
        element.style.transitionDelay = `${index * 0.1}s`;
        slideInObserver.observe(element);
    });
}
// Typewriter Effect
function setupTypewriterEffect() {
    const typewriterElements = document.querySelectorAll('[data-typewriter]');

    typewriterElements.forEach(element => {
        const text = element.textContent;
        const speed = parseInt(element.dataset.speed) || 50;

        element.textContent = '';
        element.style.borderRight = '2px solid currentColor';
        element.style.animation = 'blink 1s infinite';

        let i = 0;
        const typeWriter = () => {
            if (i < text.length) {
                element.textContent += text.charAt(i);
                i++;
                setTimeout(typeWriter, speed);
            } else {
                // Remove cursor after typing
                setTimeout(() => {
                    element.style.borderRight = 'none';
                    element.style.animation = 'none';
                }, 1000);
            }
        };

        // Start typing when element comes into view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setTimeout(typeWriter, 500);
                    observer.unobserve(entry.target);
                }
            });
        });

        observer.observe(element);
    });
}
// Scroll Effects for Elements
function setupScrollEffects() {
    let ticking = false;

    function updateScrollEffects() {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5;

        // Parallax effect for hero background
        const hero = document.querySelector('.hero-bg');
        if (hero) {
            hero.style.transform = `translateY(${rate}px)`;
        }

        ticking = false;
    }

    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateScrollEffects);
            ticking = true;
        }
    }

    window.addEventListener('scroll', requestTick);
}
// Notification System
function showNotification(message, type = 'info') {
    // Remove existing notification
    const existingNotification = document.querySelector('.notification');
    if (existingNotification) {
        existingNotification.remove();
    }

    const notification = document.createElement('div');
    notification.className = `notification fixed top-4 right-4 z-50 px-6 py-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full`;

    const colors = {
        success: 'bg-green-500 text-white',
        error: 'bg-red-500 text-white',
        info: 'bg-blue-500 text-white',
        warning: 'bg-yellow-500 text-black'
    };

    notification.className += ` ${colors[type] || colors.info}`;
    notification.innerHTML = `
        <div class="flex items-center space-x-2">
            <i class="fas fa-${type === 'success' ? 'check' : type === 'error' ? 'times' : 'info'}-circle"></i>
            <span>${message}</span>
        </div>
    `;

    document.body.appendChild(notification);

    // Slide in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);

    // Slide out and remove
    setTimeout(() => {
        notification.style.transform = 'translateX(full)';
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 3000);
}
// Search Functionality
function setupSearchFunctionality() {
    const searchInputs = document.querySelectorAll('input[placeholder*="খুঁজুন"], input[placeholder*="search"]');

    searchInputs.forEach(input => {
        input.addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            const targetContainer = this.closest('section');
            const items = targetContainer.querySelectorAll('.show_more, .news-card');

            items.forEach(item => {
                const text = item.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    item.style.display = 'block';
                    item.style.animation = 'fadeIn 0.3s ease';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
}
// Utility Functions
function debounce(func, wait, immediate) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            timeout = null;
            if (!immediate) func(...args);
        };
        const callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func(...args);
    };
}
function throttle(func, limit) {
    let inThrottle;
    return function () {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    }
}
// Handle Page Visibility
document.addEventListener('visibilitychange', function () {
    if (document.hidden) {
        // Pause animations when page is not visible
        document.body.style.animationPlayState = 'paused';
    } else {
        // Resume animations when page becomes visible
        document.body.style.animationPlayState = 'running';
    }
});
// Resize Handler
window.addEventListener('resize', debounce(function () {
    // Handle responsive adjustments
    const screenWidth = window.innerWidth;

    if (screenWidth < 768) {
        // Mobile adjustments
        document.body.classList.add('mobile');
    } else {
        document.body.classList.remove('mobile');
    }
}, 250));
// Loading Animation
window.addEventListener('load', function () {
    // Add loaded class to body for CSS animations
    document.body.classList.add('loaded');

    // Initialize any post-load animations
    setTimeout(() => {
        const heroTitle = document.querySelector('.hero-bg h1');
        if (heroTitle) {
            heroTitle.style.opacity = '1';
            heroTitle.style.transform = 'translateY(0)';
        }
    }, 100);

    // Setup search functionality after load
    setupSearchFunctionality();
});
// Error Handling for Images
document.addEventListener('DOMContentLoaded', function () {
    const images = document.querySelectorAll('img');

    images.forEach(img => {
        img.addEventListener('error', function () {
            this.style.display = 'none';
            console.warn('Failed to load image:', this.src);
        });

        img.addEventListener('load', function () {
            this.style.opacity = '1';
        });
    });
});
// Performance Optimization
if ('requestIdleCallback' in window) {
    requestIdleCallback(() => {
        // Non-critical functionality
        console.log('School Reunion Website loaded successfully!');
    });
} else {
    setTimeout(() => {
        console.log('School Reunion Website loaded successfully!');
    }, 100);
}
// Export functions for external use (if needed)
window.SchoolReunionWebsite = {
    initializeWebsite,
    createRippleEffect,
    animateCounter,
    showNotification,
    debounce,
    throttle
};
// Counter Animation Function
function animateCounters() {
    const counters = document.querySelectorAll('.counter');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.dataset.target);
                animateCounter(entry.target, target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => observer.observe(counter));
}
function animateCounter(element, target) {
    let current = 0;
    const increment = target / 60;

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.ceil(current);
    }, 30);
}
// Initialize on page load
document.addEventListener('DOMContentLoaded', animateCounters);

// News Modal Data
// const newsData = {
//     news1: {
//         title: 'নিবন্ধনের শেষ তারিখ বর্ধিত',
//         icon: 'fas fa-exclamation',
//         iconBg: 'bg-red-500',
//         content: `
//             <h4 class="text-lg font-semibold text-gray-900 mb-3">গুরুত্বপূর্ণ ঘোষণা</h4>
//             <p class="mb-4">প্রিয় প্রাক্তন ও বর্তমান শিক্ষার্থীবৃন্দ,</p>
//             <p class="mb-4">আমরা আনন্দের সাথে জানাচ্ছি যে, পুনর্মিলনী ২০২৬ এর নিবন্ধনের শেষ তারিখ <strong>১৫ ডিসেম্বর ২০২৬</strong> পর্যন্ত বৃদ্ধি করা হয়েছে।</p>
            
//             <h5 class="font-semibold text-gray-900 mb-2">নিবন্ধন প্রক্রিয়া:</h5>
//             <ul class="list-disc list-inside mb-4 space-y-1">
//                 <li>অনলাইন নিবন্ধন ফর্ম পূরণ করুন</li>
//                 <li>নিবন্ধন ফি ১০০০ টাকা প্রদান করুন</li>
//                 <li>বিকাশ/নগদ/রকেট এর মাধ্যমে পেমেন্ট করুন</li>
//                 <li>Transaction ID জমা দিন</li>
//             </ul>
            
//             <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4">
//                 <p class="text-yellow-800"><strong>মনে রাখবেন:</strong> নিবন্ধনের পর আপনি একটি নিশ্চিতকরণ SMS পাবেন।</p>
//             </div>
            
//             <p>আরো তথ্যের জন্য যোগাযোগ করুন: <strong>০১৭১২-৩৪৫৬৭৮</strong></p>
//         `
//     },
//     news2: {
//         title: 'কার্যক্রমের সময়সূচী প্রকাশ',
//         icon: 'fas fa-info',
//         iconBg: 'bg-blue-500',
//         content: `
//             <h4 class="text-lg font-semibold text-gray-900 mb-3">বিস্তারিত কার্যক্রম</h4>
//             <p class="mb-4">পুনর্মিলনী ২০২৬ এর সম্পূর্ণ কার্যক্রমের সময়সূচী প্রকাশ করা হলো:</p>
            
//             <div class="bg-blue-50 rounded-lg p-4 mb-4">
//                 <h5 class="font-semibold text-blue-900 mb-3">দিন ১: ১৫ ডিসেম্বর ২০২৬</h5>
//                 <div class="space-y-2 text-sm">
//                     <div class="flex justify-between"><span>০৮:০০ - ০৯:০০</span><span>নিবন্ধন ও অভ্যর্থনা</span></div>
//                     <div class="flex justify-between"><span>০৯:০০ - ১০:৩০</span><span>উদ্বোধনী অনুষ্ঠান</span></div>
//                     <div class="flex justify-between"><span>১০:৩০ - ১২:০০</span><span>স্মৃতিচারণ</span></div>
//                     <div class="flex justify-between"><span>১২:০০ - ১৪:০০</span><span>দুপুরের খাবার</span></div>
//                     <div class="flex justify-between"><span>১৪:০০ - ১৭:০০</span><span>সাংস্কৃতিক অনুষ্ঠান</span></div>
//                 </div>
//             </div>
            
//             <div class="bg-green-50 rounded-lg p-4 mb-4">
//                 <h5 class="font-semibold text-green-900 mb-3">দিন ২: ১৬ ডিসেম্বর ২০২৬</h5>
//                 <div class="space-y-2 text-sm">
//                     <div class="flex justify-between"><span>০৯:০০ - ১১:০০</span><span>ক্রীড়া প্রতিযোগিতা</span></div>
//                     <div class="flex justify-between"><span>১১:০০ - ১৩:০০</span><span>প্রাক্তন শিক্ষক সংবর্ধনা</span></div>
//                     <div class="flex justify-between"><span>১৩:০০ - ১৫:০০</span><span>দুপুরের খাবার</span></div>
//                     <div class="flex justify-between"><span>১৫:০০ - ১৮:০০</span><span>বিনোদনমূলক অনুষ্ঠান</span></div>
//                 </div>
//             </div>
            
//             <p class="text-sm text-gray-600">* সময়সূচী পরিবর্তনের অধিকার আয়োজক কমিটি সংরক্ষণ করে।</p>
//         `
//     },
//     news3: {
//         title: 'অনুষ্ঠানের স্থান নির্ধারণ',
//         icon: 'fas fa-map-marker-alt',
//         iconBg: 'bg-green-500',
//         content: `
//             <h4 class="text-lg font-semibold text-gray-900 mb-3">অনুষ্ঠান স্থলের বিবরণ</h4>
//             <p class="mb-4">পুনর্মিলনী ২০২৬ এর বিভিন্ন কার্যক্রম নিম্নলিখিত স্থানসমূহে অনুষ্ঠিত হবে:</p>
            
//             <div class="space-y-4">
//                 <div class="border-l-4 border-green-500 pl-4">
//                     <h5 class="font-semibold text-gray-900">মূল অনুষ্ঠান</h5>
//                     <p class="text-gray-600">স্কুল প্রাঙ্গণ (মূল ভবন)</p>
//                     <p class="text-sm text-gray-500">উদ্বোধনী, স্মৃতিচারণ, সমাপনী অনুষ্ঠান</p>
//                 </div>
                
//                 <div class="border-l-4 border-blue-500 pl-4">
//                     <h5 class="font-semibold text-gray-900">সাংস্কৃতিক অনুষ্ঠান</h5>
//                     <p class="text-gray-600">স্বাধীন কমিউনিটি সেন্টার</p>
//                     <p class="text-sm text-gray-500">গান, কবিতা, নাটক ও নৃত্য</p>
//                 </div>
                
//                 <div class="border-l-4 border-orange-500 pl-4">
//                     <h5 class="font-semibold text-gray-900">খাবার পরিবেশনা</h5>
//                     <p class="text-gray-600">স্কুল ক্যান্টিন এলাকা</p>
//                     <p class="text-sm text-gray-500">নাস্তা ও দুপুরের খাবার</p>
//                 </div>
                
//                 <div class="border-l-4 border-purple-500 pl-4">
//                     <h5 class="font-semibold text-gray-900">ক্রীড়া প্রতিযোগিতা</h5>
//                     <p class="text-gray-600">স্কুল খেলার মাঠ</p>
//                     <p class="text-sm text-gray-500">ফুটবল, ক্রিকেট ও অন্যান্য খেলা</p>
//                 </div>
//             </div>
            
//             <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mt-4">
//                 <h5 class="font-semibold text-yellow-800 mb-2">পার্কিং ব্যবস্থা:</h5>
//                 <p class="text-yellow-700">স্কুলের পাশের মাঠে গাড়ি পার্ক করার ব্যবস্থা রয়েছে। নিরাপত্তার জন্য দায়িত্বপ্রাপ্ত ব্যক্তি থাকবেন।</p>
//             </div>
//         `
//     }
// };
// Show News Modal
function showNewsModal(newsId) {
    const modal = document.getElementById('newsModal');
    const modalContent = document.getElementById('modalContent');
    const modalTitle = document.getElementById('modalTitle');
    const modalMeta = document.getElementById('modalMeta');
    const modalBody = document.getElementById('modalBody');

    const news = newsData[newsId];

    // Set content
    modalTitle.textContent = news.title;
    modalMeta.innerHTML = `
        <div class="w-8 h-8 ${news.iconBg} rounded-lg flex items-center justify-center">
            <i class="${news.icon} text-white"></i>
        </div>
        <div>
            <span class="text-sm text-gray-500">প্রকাশিত: ১ দিন আগে</span>
        </div>
    `;
    modalBody.innerHTML = news.content;

    // Show modal
    modal.classList.remove('hidden');
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);
}
// Close News Modal
function closeNewsModal() {
    const modal = document.getElementById('newsModal');
    const modalContent = document.getElementById('modalContent');

    modalContent.classList.add('scale-95', 'opacity-0');
    modalContent.classList.remove('scale-100', 'opacity-100');

    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}
// Close modal on escape key
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        closeNewsModal();
    }
});
// Alumni Search and Filter Functions
function setupAlumniSearch() {
    const nameSearch = document.getElementById('nameSearch');
    const batchFilter = document.getElementById('batchFilter');
    const areaFilter = document.getElementById('areaFilter');

    nameSearch.addEventListener('input', filterAlumni);
    batchFilter.addEventListener('change', filterAlumni);
    areaFilter.addEventListener('change', filterAlumni);
}
function filterAlumni() {
    const nameSearch = document.getElementById('nameSearch').value.toLowerCase();
    const batchFilter = document.getElementById('batchFilter').value;
    const areaFilter = document.getElementById('areaFilter').value;
    const cards = document.querySelectorAll('.show_more');   

    cards.forEach(card => {
        const name = card.dataset.name.toLowerCase();
        const batch = card.dataset.batch;
        const area = card.dataset.area;

        const nameMatch = name.includes(nameSearch);
        const batchMatch = !batchFilter || batch === batchFilter;
        const areaMatch = !areaFilter || area === areaFilter;

        if (nameMatch && batchMatch && areaMatch) {
            card.style.display = 'block';
            card.classList.add('filtered');
        } else {
            card.style.display = 'none';
            card.classList.remove('filtered');
        }
    });
}
// Load More Alumni Function
let isLoadMoreClicked = false;

function loadMoreAlumni() {
    if (!isLoadMoreClicked) {
        const hiddenCards = document.querySelectorAll('.show_more.hidden');
        hiddenCards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.remove('hidden');
                card.style.animation = 'slideIn 0.5s ease forwards';
            }, index * 100);
        });

        document.getElementById('loadMoreBtn').innerHTML = `
            <i class="fas fa-check-circle mr-2"></i>
            সব দেখানো হয়েছে
        `;
        document.getElementById('loadMoreBtn').disabled = true;
        document.getElementById('loadMoreBtn').classList.add('opacity-50', 'cursor-not-allowed');

        isLoadMoreClicked = true;
    }
}
// Initialize search functionality
document.addEventListener('DOMContentLoaded', function () {
    setupAlumniSearch();
});
// Ultra Enhanced Financial Counter System
function setupAdvancedFinancialCounters() {
    const counters = document.querySelectorAll('.financial-card .counter');
    const observerOptions = {
        threshold: 0.3,
        rootMargin: '0px 0px -50px 0px'
    };

    const counterObserver = new IntersectionObserver(function (entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.dataset.target);

                // Add entrance animation
                entry.target.closest('.financial-card').style.animation = 'cardEntrance 0.8s ease-out forwards';

                setTimeout(() => {
                    animateAdvancedCounter(counter, target);
                    triggerCircleAnimations();
                }, 300);

                counterObserver.unobserve(counter);
            }
        });
    }, observerOptions);

    counters.forEach(counter => {
        counterObserver.observe(counter);
    });
}
// Advanced counter with sound effects and haptic feedback
function animateAdvancedCounter(element, target) {
    let current = 0;
    const duration = 3000; // 3 seconds
    const steps = 100;
    const increment = target / steps;
    const stepTime = duration / steps;

    // Add typing sound effect (optional)
    const playCounterSound = () => {
        if (window.AudioContext) {
            try {
                const audioContext = new (window.AudioContext || window.webkitAudioContext)();
                const oscillator = audioContext.createOscillator();
                const gainNode = audioContext.createGain();

                oscillator.connect(gainNode);
                gainNode.connect(audioContext.destination);

                oscillator.frequency.setValueAtTime(800, audioContext.currentTime);
                gainNode.gain.setValueAtTime(0.01, audioContext.currentTime);

                oscillator.start();
                oscillator.stop(audioContext.currentTime + 0.1);
            } catch (e) {
                // Silent fail for audio
            }
        }
    };

    const timer = setInterval(() => {
        current += increment;

        if (current >= target) {
            current = target;
            clearInterval(timer);

            // Completion celebration
            celebrateCompletion(element);
        }

        // Update display with formatted number
        element.textContent = formatAdvancedNumberBengali(Math.ceil(current));

        // Play subtle sound every 10 steps
        if (Math.ceil(current) % Math.ceil(target / 10) === 0) {
            playCounterSound();
        }

        // Haptic feedback for mobile
        if (navigator.vibrate && Math.ceil(current) % Math.ceil(target / 5) === 0) {
            navigator.vibrate(10);
        }

    }, stepTime);
}
// Advanced Bengali number formatting with comma separation
function formatAdvancedNumberBengali(num) {
    const bengaliDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];

    return num.toString()
        .replace(/\B(?=(\d{3})+(?!\d))/g, ',') // Add commas
        .replace(/\d/g, digit => bengaliDigits[digit]); // Convert to Bengali
}
// Celebration animation when counter completes
function celebrateCompletion(element) {
    const card = element.closest('.financial-card');

    // Burst effect
    card.style.transform = 'translateY(-20px) scale(1.1)';
    card.style.filter = 'brightness(1.2)';

    // Create confetti effect
    createConfetti(card);

    setTimeout(() => {
        card.style.transform = 'translateY(0) scale(1)';
        card.style.filter = 'brightness(1)';
    }, 500);
}
// Create confetti particles
function createConfetti(container) {
    const colors = ['#10b981', '#ef4444', '#3b82f6', '#f59e0b', '#8b5cf6'];

    for (let i = 0; i < 15; i++) {
        const confetti = document.createElement('div');
        confetti.style.cssText = `
            position: absolute;
            width: 6px;
            height: 6px;
            background: ${colors[Math.floor(Math.random() * colors.length)]};
            border-radius: 50%;
            pointer-events: none;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: confettiFall 1s ease-out forwards;
            z-index: 1000;
        `;

        confetti.style.animationDelay = `${Math.random() * 0.5}s`;
        confetti.style.setProperty('--random-x', `${(Math.random() - 0.5) * 200}px`);
        confetti.style.setProperty('--random-rotation', `${Math.random() * 360}deg`);

        container.appendChild(confetti);

        setTimeout(() => confetti.remove(), 1500);
    }
}
// Trigger circle progress animations
function triggerCircleAnimations() {
    const circles = document.querySelectorAll('.income-circle, .expense-circle, .surplus-circle');
    circles.forEach((circle, index) => {
        setTimeout(() => {
            circle.style.opacity = '1';
        }, index * 500);
    });
}
// Enhanced card interactions with 3D effects
function setupAdvancedCardInteractions() {
    const cards = document.querySelectorAll('.financial-card');

    cards.forEach(card => {
        // Mouse move for 3D tilt effect
        card.addEventListener('mousemove', function (e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = (y - centerY) / 10;
            const rotateY = (centerX - x) / 10;

            this.style.transform = `
                translateY(-20px) 
                scale(1.08) 
                rotateX(${rotateX}deg) 
                rotateY(${rotateY}deg)
                perspective(1000px)
            `;
        });

        // Reset on mouse leave
        card.addEventListener('mouseleave', function () {
            this.style.transform = 'translateY(0) scale(1) rotateX(0) rotateY(0)';
        });

        // Click interaction with ripple
        card.addEventListener('click', function (e) {
            createAdvancedRipple(e, this);

            // Subtle bounce
            this.style.transform = 'translateY(-25px) scale(1.1)';
            setTimeout(() => {
                this.style.transform = 'translateY(-20px) scale(1.08)';
            }, 200);
        });
    });
}
// Advanced ripple effect with gradient
function createAdvancedRipple(event, element) {
    const ripple = document.createElement('div');
    const rect = element.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height) * 1.5;
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;

    const cardType = element.classList.contains('income-card') ? 'green' :
        element.classList.contains('expense-card') ? 'red' : 'blue';

    const gradients = {
        green: 'radial-gradient(circle, rgba(16, 185, 129, 0.3) 0%, transparent 70%)',
        red: 'radial-gradient(circle, rgba(239, 68, 68, 0.3) 0%, transparent 70%)',
        blue: 'radial-gradient(circle, rgba(59, 130, 246, 0.3) 0%, transparent 70%)'
    };

    ripple.style.cssText = `
        position: absolute;
        border-radius: 50%;
        background: ${gradients[cardType]};
        transform: scale(0);
        animation: advancedRipple 1s ease-out;
        left: ${x}px;
        top: ${y}px;
        width: ${size}px;
        height: ${size}px;
        pointer-events: none;
        z-index: 100;
    `;

    element.appendChild(ripple);
    setTimeout(() => ripple.remove(), 1000);
}
// Initialize all advanced features
document.addEventListener('DOMContentLoaded', function () {
    setupAdvancedFinancialCounters();
    setupAdvancedCardInteractions();

    // Add intersection observer for enhanced entrance
    const cards = document.querySelectorAll('.financial-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(50px)';

        setTimeout(() => {
            card.style.transition = 'all 0.8s ease-out';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 200);
    });
});

function showdonationModal() {
    const modal = document.getElementById("donationModal");
    const content = document.getElementById("donationModalContent");

    modal.classList.remove("hidden");
    setTimeout(() => {
        content.classList.remove("opacity-0", "scale-95");
        content.classList.add("opacity-100", "scale-100");
    }, 10);
}

function closedonationModal() {
    const modal = document.getElementById("donationModal");
    const content = document.getElementById("donationModalContent");

    content.classList.remove("opacity-100", "scale-100");
    content.classList.add("opacity-0", "scale-95");

    setTimeout(() => {
        modal.classList.add("hidden");
    }, 300);
}

function openRulesModal() {
    console.log("Opening modal...");
    const modal = document.getElementById('rulesModal');
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';

    // Optional transition
    setTimeout(() => {
        modal.classList.add('opacity-100', 'scale-100');
    }, 10);
}

function closeRulesModal() {
    const modal = document.getElementById('rulesModal');
    modal.classList.remove('opacity-100', 'scale-100');
    document.body.style.overflow = 'auto';

    // Hide modal after transition
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}
// Close on outside click
document.addEventListener('click', function (e) {
    const modal = document.getElementById('rulesModal');
    if (e.target === modal && !modal.classList.contains('hidden')) {
        closeRulesModal();
    }
});

// Close on Escape key
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && !document.getElementById('rulesModal').classList.contains('hidden')) {
        closeRulesModal();
    }
});

const btn = document.getElementById('scrollTopBtn');
window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
        btn.classList.remove('opacity-0', 'pointer-events-none');
        btn.classList.add('opacity-100');
    } else {
        btn.classList.add('opacity-0', 'pointer-events-none');
        btn.classList.remove('opacity-100');
    }
});



