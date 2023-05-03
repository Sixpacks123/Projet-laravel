
$(document).ready(function(){
    const images = ['road.jpg', 'truck.jpg'];
    const randomIndex = Math.floor(Math.random() * images.length);
    const imageUrl = '/img/home/' + images[randomIndex];
    $('.slider-height').css('background-image', 'linear-gradient(90deg, rgba(10,27,47,1) 0%, rgba(16,32,52,1) 25%, rgba(108,118,130,0.14329481792717091) 86%, rgba(255,255,255,0.04245448179271705) 100%), url(' + imageUrl + ')');
});

document.addEventListener('DOMContentLoaded', function() {
    const computer = document.getElementById('computer');
    const database = document.getElementById('database');
    const dashcam = document.getElementById('dashcam');

    const cat1 = document.getElementById('cat-1');
    const cat2 = document.getElementById('cat-2');
    const cat3 = document.getElementById('cat-3');

    function changeImagesOnHover(element, image) {
        let timeout;
        element.addEventListener('mouseenter', function() {
            clearTimeout(timeout);
            timeout = setTimeout(function() {
                image.src = 'img/home/services/' + image.id + '-w.png';
            }, 300);
        });

        element.addEventListener('mouseleave', function() {
            clearTimeout(timeout);
            image.src = 'img/home/services/' + image.id + '.png';
        });
    }

    changeImagesOnHover(cat1, computer);
    changeImagesOnHover(cat2, database);
    changeImagesOnHover(cat3, dashcam);
});