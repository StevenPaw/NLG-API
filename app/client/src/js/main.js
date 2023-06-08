import GLightbox from "glightbox";

document.addEventListener("DOMContentLoaded", function (event) {

    const menu_button = document.querySelector('[data-behaviour="toggle-menu"]');

    if(menu_button != null) {
        menu_button.addEventListener('click', () => {
            document.body.classList.toggle('body--show');
        })
    }

    let characters = document.querySelectorAll('[data-behaviour="character"]');


    function randomTime(minvalue, maxvalue) {
        return Math.random() * (maxvalue - minvalue) + minvalue;
      }

    if(characters.length > 0) {
        characters.forEach(character => {
            var random = randomTime(5,20);
            var random2 = randomTime(10, 15);
            var random3 = randomTime(2, 10);
            let children = character.querySelectorAll('.user_part');
            children.forEach(child => {
                child.style.animation = "alternate character-wiggle " + random + "s infinite";
            });


            var randomAnimation = Math.round(randomTime(1, 3));
            var eyes = character.querySelectorAll('.eyes');
            eyes.forEach(eye => {
                if(randomAnimation === 1) {
                    eye.style.animation = "character-blink-1 " + random2 + "s infinite";
                    eye.style.animationDelay = random3 + "s";
                } else if(randomAnimation === 2) {
                    eye.style.animation = "character-blink-2 " + random2 + "s infinite";
                    eye.style.animationDelay = random3 + "s";
                } else {
                    eye.style.animation = "character-blink-3 " + random2 + "s infinite";
                    eye.style.animationDelay = random3 + "s";
                }
            });
        });
    }

});
