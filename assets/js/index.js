const textCarousel = document.querySelector('#heroTextCarousel');
const imageCarousel = document.querySelector('#heroImageCarousel');

textCarousel.addEventListener('slide.bs.carousel', function (e) {
    const index = e.to;
    const bsCarousel = bootstrap.Carousel.getInstance(imageCarousel);
    bsCarousel.to(index);
});

imageCarousel.addEventListener('slide.bs.carousel', function (e) {
    const index = e.to;
    const bsCarousel = bootstrap.Carousel.getInstance(textCarousel);
    bsCarousel.to(index);
});