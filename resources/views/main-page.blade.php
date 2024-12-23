<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Countries</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
  <div class="body-container">
      @include('includes.header')

      <div class="card-list-name">
          <h1>List of countries</h1>
      </div>
      
      <div class="cards-container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xxl-4 g-4">
            @foreach ($cards as $card)
                @include('card', array('card' => $card))
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