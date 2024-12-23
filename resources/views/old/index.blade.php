<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Countries</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
   <script src="https://kit.fontawesome.com/7f3e30a7d0.js" crossorigin="anonymous"></script>
  </head>
 <body>
    <div class="body-container">
        <div class="header-container">
            <nav class="navbar navbar-expand-xl">
                <div class="container-fluid">
                  <img class="icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e2/Europe_and_the_European_Union.svg/800px-Europe_and_the_European_Union.svg.png"/>
                  <a class="navbar-brand" href="#">Countries</a>
                  <div class="navbar" id="navbarTogglerDemo02">
                    <button class="btn btn-primary" id="liveToastBtn">Load file</button>
                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                      <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="liveToast">
                        <div class="toast-header">
                          <i class="fa-solid fa-spinner fa-spin-pulse"></i>
                          <strong class="me-auto">Warning</strong>
                          <small class="text-body-secondary"></small>
                          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                          This feature is not available yet.
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </nav>
        </div>

        <div class="card-list-name">
            <h1>Members of European Union</h1>
        </div>
        
        <div class="cards-container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xxl-4 g-4">
                <div class="col">
                  <div class="card h-100 card-color">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Flag_of_Austria.svg" class="img-fluid" alt="...">
                    <p class="on-image-label">Flag</p>
                    <div class="card-body">
                      <h5 class="card-title">Austria</h5>
                      <p class="card-text">Government: Federal semi-presidential republic<br>
                        Total area: 83 879 km<sup>2</sup></p>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAustria">
                            View
                    </button>
                </div>

                </div>
                <div class="col">
                  <div class="card h-100 card-color">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/Flag_of_Belgium.svg/1024px-Flag_of_Belgium.svg.png" class="img-fluid" alt="...">
                    <p class="on-image-label">Flag</p>
                    <div class="card-body">
                      <h5 class="card-title">Belgium</h5>
                      <p class="card-text">Government: Federal parliamentary constitutional monarchy<br>
                        Total area: 30 689 km<sup>2</sup></p>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalBelgium">
                      View
                    </button>
                  </div>

                </div>
                <div class="col">
                  <div class="card h-100 card-color">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Flag_of_Denmark.svg/1280px-Flag_of_Denmark.svg.png" class="img-fluid" alt="...">
                    <p class="on-image-label">Flag</p>
                    <div class="card-body">
                      <h5 class="card-title">Denmark</h5>
                      <p class="card-text">Government: Unitary parliamentary constitutional monarchy<br>
                        Total area: 43 094 km<sup>2</sup></p>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalDenmark">
                      View
                    </button>
                  </div>
                </div>

                <div class="col">
                  <div class="card h-100 card-color">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Flag_of_the_Netherlands.svg/1280px-Flag_of_the_Netherlands.svg.png" class="img-fluid" alt="...">
                    <p class="on-image-label">Flag</p>
                    <div class="card-body">
                      <h5 class="card-title">Netherlands</h5>
                      <p class="card-text">Government: Unitary parliamentary constitutional monarchy<br>
                        Total area: 41 865 km<sup>2</sup></p>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalNetherlands">
                      View
                    </button>
                  </div>

                </div>
                <div class="col">
                    <div class="card h-100 card-color">
                      <img src="https://upload.wikimedia.org/wikipedia/en/thumb/c/c3/Flag_of_France.svg/1280px-Flag_of_France.svg.png" class="img-fluid" alt="...">
                      <p class="on-image-label">Flag</p>
                      <div class="card-body">
                        <h5 class="card-title">France</h5>
                        <p class="card-text">Government: Unitary semi-presidential republic<br>
                          Total area: 643 801 km<sup>2</sup></p>
                      </div>
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalFrance">
                        View
                      </button>
                    </div>
                  </div>
              </div>

              <div>

                <div class="modal fade" id="ModalAustria" tabindex="-1" aria-labelledby="ModalAustriaLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ModalAustriaLabel">Austria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p>Austria, formally the Republic of Austria, is a landlocked country in Central Europe, lying in the Eastern
                        <a href="https://en.wikipedia.org/wiki/Alps"
                          data-bs-container="body"
                          data-bs-trigger="hover focus"
                          data-bs-toggle="popover" 
                          data-bs-placement="right" 
                          data-bs-custom-class="custom-popover"
                          data-bs-content="The Alps are one of the highest and most extensive mountain ranges in Europe, stretching approximately 1,200 km.">Alps</a>.
                          It is a federation of nine states, one of which is the capital, Vienna, the most populous city and state.</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="ModalBelgium" tabindex="-1" aria-labelledby="ModalBelgiumLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ModalBelgiumLabel">Belgium</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p>Belgium, officially the Kingdom of Belgium, is a country in Northwestern Europe. The country is bordered by the Netherlands to the north, Germany to the east, Luxembourg to the southeast, France to the south, and the 
                        <a href="https://en.wikipedia.org/wiki/North_Sea"
                        data-bs-container="body"
                        data-bs-trigger="hover focus"
                        data-bs-toggle="popover" 
                        data-bs-placement="right" 
                        data-bs-custom-class="custom-popover"
                        data-bs-content="The North Sea is epeiric sea on the European continental shelf, it connects to the Atlantic Ocean through the English Channel in the south and the Norwegian Sea in the north.">North Sea</a>
                        to the west.</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="modal fade" id="ModalDenmark" tabindex="-1" aria-labelledby="ModalDenmarkLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ModalDenmarkLabel">Denmark</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p>Denmark (Danish: Danmark, pronounced [ˈtænmɑk]) is a Nordic country in the south-central portion of Northern Europe with a population of nearly 6 million; 767 000 live in 
                          <a href="https://en.wikipedia.org/wiki/Copenhagen"
                          data-bs-container="body"
                          data-bs-trigger="hover focus"
                          data-bs-toggle="popover" 
                          data-bs-placement="right" 
                          data-bs-custom-class="custom-popover"
                          data-bs-content="Copenhagen is the capital and most populous city of Denmark, with a population of 1.4 million in the urban area. The city is situated on the islands of Zealand and Amager, separated from Malmö, Sweden, by the Øresund strait.">Copenhagen</a>
                          (1.9 million in the wider area). It is the metropolitan part, and most populous constituent part of, the Kingdom of Denmark, a constitutionally unitary state that includes the autonomous territories of the Faroe Islands and Greenland in the North Atlantic Ocean.</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="ModalNetherlands" tabindex="-1" aria-labelledby="ModalNetherlandsLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ModalNetherlandsLabel">Netherlands</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p>The Netherlands, informally Holland, is a country in Northwestern Europe, with overseas territories in the
                          <a href="https://en.wikipedia.org/wiki/Caribbean"
                          data-bs-container="body"
                          data-bs-trigger="hover focus"
                          data-bs-toggle="popover" 
                          data-bs-placement="right" 
                          data-bs-custom-class="custom-popover"
                          data-bs-content="The Caribbean, is a subregion in the middle of the Americas centered around the Caribbean Sea in the North Atlantic Ocean.">Caribbean</a>.
                          It is the largest of the four constituent countries of the Kingdom of the Netherlands. The Netherlands consists of twelve provinces.</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="ModalFrance" tabindex="-1" aria-labelledby="ModalFranceLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ModalFranceLabel">France</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p>France, officially the French Republic, is a country located primarily in Western Europe. Its overseas regions and territories include 
                        <a href="https://en.wikipedia.org/wiki/French_Guiana"
                        data-bs-container="body"
                        data-bs-trigger="hover focus"
                        data-bs-toggle="popover" 
                        data-bs-placement="right"
                        data-bs-custom-class="custom-popover" 
                        data-bs-content="French Guiana is an overseas department and region of France located on the northern coast of South America in the Guianas and the West Indies.">French Guiana</a>
                        in South America, Saint Pierre and Miquelon in the North Atlantic, the French West Indies, and many islands in Oceania and the Indian Ocean, giving it one of the largest discontiguous exclusive economic zones in the world.</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>

        </div>
          
        <div class="bottom-container">
            <p class="text-style">Бабушкин Никита</p>
            <a href="https://www.openstreetmap.org/">
                <img class="icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Openstreetmap_logo.svg/800px-Openstreetmap_logo.svg.png"/>
            </a>
            <a href="https://www.google.com/maps">
                <img class="icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/Google_Maps_icon_%282015-2020%29.svg/1024px-Google_Maps_icon_%282015-2020%29.svg.png"/>
            </a>
            <a href="https://www.microsoft.com/en-gb">
                <img class="icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/1024px-Microsoft_logo.svg.png"/>
            </a>
        </div>

    </div>
 <script src="./main.js"></script>
 </body> 
</html>