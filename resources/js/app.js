import $ from 'jquery';
import Inputmask from "inputmask";

const inputTelMask = new Inputmask("(+99) 9 9999 9999");
const inputDniMask = new Inputmask("99.999.999-X", {
    definitions: {
        "X": {
            validator: "[0-9kK]",
            casing: "upper"
        }
    }
});

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

        $('.gallery-list-element', this).removeClass('border-gray-400').addClass('border-transparent');
        target.removeClass('border-transparent').addClass('border-gray-400');
    });

    inputTelMask.mask('input[data-type="tel"]');
    inputDniMask.mask('input[data-type="dni"]');

    $('input[data-type]').on('blur', function() {
        if ($(this).val().includes('_')) {
            $(this).val('');
        }
    });
});
