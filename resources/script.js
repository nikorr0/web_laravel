import * as bootstrap from "bootstrap";
window.bootstrap = bootstrap;
import "./scss/style.scss";

// var script = document.createElement('script');
// script.src = 'https://code.jquery.com/jquery-3.7.1.min.js';
// document.getElementsByTagName('head')[0].appendChild(script);

// import Alpine from 'alpinejs';
// window.Alpine = Alpine;
// Alpine.start();

const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')

if (toastTrigger) {
  const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
  toastTrigger.addEventListener('click', () => {
    toastBootstrap.show()
  })
}

$(document).ready(function(){
  $('[data-bs-toggle="popover"]').popover({
  });
});

// переключение стрелочками
$("div[id^='Modal']").on('shown.bs.modal', function (e) {
  var currentModal = $(this);
  
  currentModal.on("keydown", function(e){
    switch (e.which){
    case 37:
        currentModal.find("button").first().click();
        currentModal.closest("div[id^='Modal']").prevAll("div[id^='Modal']").first().modal('show'); 
        break;
  
    case 39:
        currentModal.find("button").first().click();
        currentModal.closest("div[id^='Modal']").nextAll("div[id^='Modal']").first().modal('show');
        break;
    }
  });
});

$(document).ready(function () {
  window.toggleComments = function (cardId) {
      const section = $(`#comments-section-${cardId}`);
      section.toggle();
  };
});

// Появление меню при нажатии на имя пользователя
$(document).ready(function () {
  const $userMenuToggle = $('#user-menu-toggle');
  const $userMenu = $('#user-menu');

  $userMenuToggle.on('click', function (e) {
      e.stopPropagation();
      $userMenu.toggleClass('hidden');
  });

  $(document).on('click', function (e) {
      if (!$userMenu.is(e.target) && !$userMenuToggle.is(e.target) && $userMenu.has(e.target).length === 0) {
          $userMenu.addClass('hidden');
      }
  });
});
