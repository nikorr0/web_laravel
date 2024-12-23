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
          <h1>List of countries</h1>
      </div>
      
      <div class="cards-container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xxl-4 g-4">
                @foreach ($cards as $country)
                  <div class="col">
                    <div class="card h-100 card-color">
                      <img src="{{ $country['image_url'] }}" class="img-fluid" alt="...">
                      <p class="on-image-label">Flag</p>
                      <div class="card-body">
                        <h5 class="card-title">{{ $country['name'] }}</h5>
                        <p class="card-text">{{ $country['short_text'] }}</p>
                      </div>
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal{{ $country['id'] }}">
                              View
                      </button>
                    </div>
                  </div>  
                @endforeach
            </div>
            <div class="modals-container">
              @foreach ($cards as $country)
                <div class="modal fade" id="Modal{{ $country['id'] }}" tabindex="-1" aria-labelledby="Modal{{ $country['id'] }}Label" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="Modal{{ $country['id'] }}Label">{{ $country['name'] }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p>{{ $country['long_text'] }}</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach

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

  <script src="./main.js"></script>
</body> 
</html>