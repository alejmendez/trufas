import $ from 'jquery';

$(function() {
    $('.view-image-gallery').on('click', function(e) {
        const target = $(e.target);

        if (!target.is('img') || target.is('.main-img')) {
            return;
        }

        const parentGallery = target.parents('.view-image-gallery');
        const mainImg = $('.main-img', parentGallery);
        const src = target.attr('src');
        console.log(
            {
                mainImg,
                src
            }
        );
        mainImg.attr('src', src);
    })
});
