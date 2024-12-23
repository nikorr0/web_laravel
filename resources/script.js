import * as bootstrap from "bootstrap";
window.bootstrap = bootstrap;
import "./scss/style.scss";

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