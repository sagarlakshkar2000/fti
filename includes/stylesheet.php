<?php
// Additional global styles
echo <<<HTML
<style>
    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }

    /* Custom Colors using CSS Variables */
    :root {
        --primary: '#d44712';
        --secondary: '#fa7d1a';
        --dark: #1a1a2e;
        --light: #f8f9fa;
        --accent: #8338ec;
        --dark-primary: hsl(12, 80%, 23%);
        --dark-bg: hsl(210, 29%, 24%);
        --light-bg: hsl(39.05deg 96.92% 87.25%);
        --yellow: hsl(45, 100%, 51%);
    }

    /* Custom Utility Classes for Tailwind v4 */
    .bg-custom-primary { background-color: var(--primary); }
    .text-custom-primary { color: var(--primary); }
    .bg-custom-secondary { background-color: var(--secondary); }
    .text-custom-secondary { color: var(--secondary); }
    .bg-custom-dark { background-color: var(--dark); }
    .text-custom-dark { color: var(--dark); }
    .bg-custom-light { background-color: var(--light); }
    .text-custom-light { color: var(--light); }
    .bg-custom-accent { background-color: var(--accent); }
    .text-custom-accent { color: var(--accent); }
    .bg-custom-dark-primary { background-color: var(--dark-primary); }
    .text-custom-dark-primary { color: var(--dark-primary); }
    .bg-custom-yellow { background-color: var(--yellow); }
    .text-custom-yellow { color: var(--yellow); }
    .bg-custom-light-bg { background-color: var(--light-bg); }

    /* Custom Gradients */
    .bg-gradient-custom-1 {
        background: linear-gradient(135deg, var(--dark-primary), hsl(24, 100%, 41%));
    }

    .bg-gradient-custom-4 {
        background: linear-gradient(135deg, var(--dark-primary), var(--dark-bg));
    }

    .bg-gradient-brand {
        background: linear-gradient(135deg, #4285F4, #34A853, #FBBC05, #EA4335);
    }

    /* Carousel Styles */
    .carousel-slide {
        opacity: 0;
        transform: translateX(20px);
        transition: all 0.5s ease-in-out;
        pointer-events: none;
    }

    .carousel-slide.active {
        opacity: 1;
        transform: translateX(0);
        pointer-events: all;
    }

    /* Animation for slide content */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .carousel-slide.active > * {
        animation: fadeInUp 0.6s ease-out;
    }

    .carousel-slide.active > *:nth-child(1) { animation-delay: 0.1s; }
    .carousel-slide.active > *:nth-child(2) { animation-delay: 0.2s; }
    .carousel-slide.active > *:nth-child(3) { animation-delay: 0.3s; }
    .carousel-slide.active > *:nth-child(4) { animation-delay: 0.4s; }
    .carousel-slide.active > *:nth-child(5) { animation-delay: 0.5s; }

    /* Custom hover effects */
    .hover-lift:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
    }

    .backdrop-blur-custom {
        backdrop-filter: blur(10px);
    }
</style>
HTML;
