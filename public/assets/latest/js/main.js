"Use Strict";


document.addEventListener('DOMContentLoaded', () => {
    let productInnerImages = document.querySelectorAll('.inner_photo_product img'); // Select only the <img>
    let mainProductImage = document.querySelector('.v-product .show-img'); 

    if (productInnerImages.length > 0) {
        mainProductImage.src = productInnerImages[0].src; // Set initial image
    }

    productInnerImages.forEach((imageItem) => {
        imageItem.addEventListener('click', (event) => {
            productInnerImages.forEach(img => img.classList.remove('active'));
            event.target.classList.add('active');
            mainProductImage.src = event.target.src;
        });
    });
});
