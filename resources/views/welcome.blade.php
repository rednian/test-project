<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    </head>
    <body>
       <section id="app" class="container-fluid">
      
           <app-home></app-home>
           <hr>
          <section class="row">
              <div class="col-md-8 offset-md-2">
                <nav class="navbar navbar-expand-sm navbar-light bg-light" style="padding-left:0">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                      <div class="navbar-nav">
                        <a class="nav-link active " href="#">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-link" href="#">About Us</a>
                      </div>
                    </div>
                </nav>
              </div>
          </section>
       </section>
       <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
