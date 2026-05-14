document.addEventListener("DOMContentLoaded", () => {

    const track = document.getElementById("carousel");
    const slides = document.querySelectorAll("#carousel > div");
    const dots = document.querySelectorAll(".dot");

    let currentIndex = 0;
    let interval;


    function updateCarousel() {

        track.style.transform = `translateX(-${currentIndex * 100}%)`;

        dots.forEach((dot, index) => {

            if(index === currentIndex){

                dot.classList.remove(
                    "bg-transparent",
                    "border",
                    "border-white",
                    "opacity-70"
                );

                dot.classList.add(
                    "bg-white",
                    "opacity-100"
                );

            } else {

                dot.classList.remove(
                    "bg-white",
                    "opacity-100"
                );

                dot.classList.add(
                    "bg-transparent",
                    "border",
                    "border-white",
                    "opacity-70"
                );

            }

        });

    }


    function nextSlide() {

        currentIndex++;

        if(currentIndex >= slides.length){
            currentIndex = 0;
        }

        updateCarousel();

    }


    function startCarousel() {

        interval = setInterval(() => {

            nextSlide();

        }, 4000);

    }


    function stopCarousel() {

        clearInterval(interval);

    }

    startCarousel();

    track.addEventListener("mouseenter", () => {

        stopCarousel();

    });

    track.addEventListener("mouseleave", () => {

        startCarousel();

    });

 
    dots.forEach((dot, index) => {

        dot.addEventListener("click", () => {

            currentIndex = index;

            updateCarousel();

        });

    });

});