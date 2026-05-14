
// Función para agregar un retraso a cada letra de los títulos con la clase "flap-unit"
document.addEventListener('DOMContentLoaded', () => {
  const CHARS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  const SPEED = 50;   // ms entre cada flip 
  const CYCLES = 5;   // cuántas letras hay antes del final

  function setChar(card, char) {
    const display = char === ' ' ? '\u00A0' : char;
    card.querySelectorAll('span').forEach(s => s.textContent = display);
  }

  function flipTo(card, newChar) {
    return new Promise(resolve => {
      const topFlip = card.querySelector('.sf-top-flip span');
      const botFlip = card.querySelector('.sf-bottom-flip span');
      const display = newChar === ' ' ? '\u00A0' : newChar;

      topFlip.textContent = display;
      botFlip.textContent = display;

      card.classList.remove('sf-flipping');
      void card.offsetWidth; // reflow para reiniciar animación
      card.classList.add('sf-flipping');

      setTimeout(() => {
        card.querySelector('.sf-top-static span').textContent = display;
        card.querySelector('.sf-bottom-static span').textContent = display;
        card.classList.remove('sf-flipping');
        resolve();
      }, 320);
    });
  }

  function animateCard(card, finalChar, delay) {
    return new Promise(resolve => {
      setTimeout(async () => {
        // Cicla por letras random
        for (let i = 0; i < CYCLES; i++) {
          const rnd = CHARS[Math.floor(Math.random() * CHARS.length)];
          await flipTo(card, rnd);
          await new Promise(r => setTimeout(r, SPEED));
        }
        // Llega al carácter final
        await flipTo(card, finalChar);
        resolve();
      }, delay);
    });
  }

  const allCards = document.querySelectorAll('.split-flap[data-final]');

  allCards.forEach((card, index) => {
    const finalChar = card.getAttribute('data-final') || ' ';
    animateCard(card, finalChar, index * 40);
  });
});

/* Animacion de letras de fondo scroll */
document.addEventListener("DOMContentLoaded", () => {

  const bgTitle = document.getElementById("agency-bg-title");
  const feelingTitle = document.getElementById("feeling-bg-title");
  const withyouTitle = document.getElementById("withyou-bg-title");

  window.addEventListener("scroll", () => {
    const scrollY = window.scrollY;
    const viewportHeight = window.innerHeight;

    if (bgTitle) {
      const section = bgTitle.parentElement;
      const sectionTop = section.offsetTop;

      if (scrollY > (sectionTop - viewportHeight)) {
        const distance = Math.max(0, scrollY - sectionTop + (viewportHeight / 2));
        const moveX = distance * 0.4;
        bgTitle.style.transform = `translateX(-${moveX}px)`;
      }
    }

    if (feelingTitle) {
      const section2 = feelingTitle.parentElement;
      const sectionTop2 = section2.offsetTop;

      if (scrollY > (sectionTop2 - viewportHeight)) {

        const distance2 = Math.max(0, scrollY - sectionTop2 + (viewportHeight / 2));
        const moveX2 = distance2 * 0.4;
        feelingTitle.style.transform = `translateX(-${moveX2}px)`;
      }
    }
  });


});

/* Animación de letras de fondo scroll (Vertical) */
document.addEventListener("DOMContentLoaded", () => {

  const withyoubgtitle = document.getElementById("withyou-bg-title");

  window.addEventListener("scroll", () => {
    const scrollY = window.scrollY;
    const viewportHeight = window.innerHeight;

    if (withyoubgtitle) {
      const section = withyoubgtitle.parentElement;
      const sectionTop = section.offsetTop;

      if (scrollY > (sectionTop - viewportHeight)) {
        const distance = Math.max(0, scrollY - sectionTop + (viewportHeight / 2));
        const moveY = distance * 0.3;
        withyoubgtitle.style.transform = `translate3d(-50%, -${moveY}px, 0)`;
      }
    }
  });
});

/* Animacion de nubes en eje x */
document.addEventListener("DOMContentLoaded", () => {
  const bgnube1 = document.getElementById("nube1");
  const bgnube2 = document.getElementById("nube2");
  const bgimg_sales = document.getElementById("img_sales");

  window.addEventListener("scroll", () => {
    const scrollY = window.scrollY;

    if (bgnube1) {
      const moveX = scrollY * 0.1;
      const moveY = scrollY * 0.15;
      bgnube1.style.transform = `translateX(${moveX}px) translateY(${moveY}px)`;
    }

    if (bgnube2) {
      const moveX = scrollY * -0.15;
      const moveY = scrollY * 0.2;
      bgnube2.style.transform = `translateX(${moveX}px) translateY(${moveY}px)`;
    }
  });
});

/* Animacion de imagen sales en eje x */
document.addEventListener("DOMContentLoaded", () => {
  const bgimg_sales = document.getElementById("img_sales");
  if (!bgimg_sales) return;

  const section = bgimg_sales.closest('.relative');

  window.addEventListener("scroll", () => {
    const scrollY = window.scrollY;
    const sectionTop = section.offsetTop;
    const viewportHeight = window.innerHeight;


    if (scrollY > (sectionTop - viewportHeight)) {
      const relativeScroll = scrollY - sectionTop;
      const moveX = relativeScroll * 0.3;
      bgimg_sales.style.transform = `translateX(${moveX}px)`;
    }
  });
});


document.addEventListener('DOMContentLoaded', function () {

  const form = document.getElementById('contact-form');
  const messageContainer = document.getElementById('form-message');

  if (!form) {
    return;
  }

  form.addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(form);

    messageContainer.classList.add('hidden');
    messageContainer.innerHTML = 'Enviando...';

    try {
      const response = await fetch(form.getAttribute('action'), {
        method: 'POST',
        body: formData
      });


      const result = await response.json();
      messageContainer.classList.remove('hidden');

  
      if (result.success) {
   
        messageContainer.innerHTML = result.data.message;

        messageContainer.classList.remove('text-red-400');
        messageContainer.classList.add('text-green-400');

        form.reset();
      } else {
        // ERROR DE VALIDACIÓN: WordPress también lo envía en result.data.message
        messageContainer.innerHTML = result.data.message || 'Hubo un error al enviar el formulario.';

        messageContainer.classList.remove('text-green-400');
        messageContainer.classList.add('text-red-400');
      }

    } catch (error) {
      // ERROR DE RED O SERVIDOR
      console.error('Error en la petición:', error);
      messageContainer.classList.remove('hidden');
      messageContainer.innerHTML = 'Error de conexión. Por favor, inténtalo de nuevo más tarde.';
      messageContainer.classList.add('text-red-400');
    }
  });
});