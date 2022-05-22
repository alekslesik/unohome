var partnersSlider = tns({
    container: '.partners-slider-wrapper',
    slideBy: 1,
    auto: false,
    speed: 500,
    autoplayTimeout: 500, 
    nav: false,
    controlsContainer: '.partners-slider-controls',
    mouseDrag: true,
    responsive: {
        0: 
        {
            items: 1
        },
        400:
        {
            items: 2
        },
        620: 
        {
            items: 3
        },
        1031:
        {
            items: 5
        }
    }
});