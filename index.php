<!doctype html>
<html lang="en">
  <?php
    include "db.php";
  ?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!-- jQuery -->
    <script
          src="https://code.jquery.com/jquery-3.4.1.min.js"
          integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
          crossorigin="anonymous"></script>
    <title>Events | Sarcon</title>
  </head>
  <body>
  
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Sarcon</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Events</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <!--Carousel-->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2550&q=80" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1503428593586-e225b39bddfe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2550&q=80" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Main Events -->
    <div class="container">
        <h3 class="display-3 text-center">Our Upcoming Events</h3>
        <!-- Grid System -->
        <div class="container my-5">
            <div class="row">

            <!-- AJAX Script -->
            <script>
                function refreshData(){
                var x=5;
                var request = $.ajax({
                url: "http://localhost/sarcon/getEvents.php",
                type: "GET",
                dataType: "json",
                success: function(response){
                    console.log(response);
                    var len = response.length;
                    for(var i=0; i<len; i++){
                        var event_id = response[i].event_id;
                        var event_name = response[i].event_name;
                        var event_image = response[i].event_image;
                        var event_description = response[i].event_description;
                        var event_status = response[i].event_status;
                        var href_string = "events.php?id="+event_id;
                        document.getElementById("event_name").innerHTML = event_name;
                        document.getElementById("event_description").innerHTML = event_description;
                        if(event_status == 0){
                            $('#event_button').attr('aria-disabled', "true");
                            $('#event_button').attr('class', "btn btn-primary disabled");

                        }else{
                            $('#event_button').attr('aria-disabled', "false");
                            $('#event_button').attr('class', "btn btn-primary");
                        }
                        $('#event_button').prop('href', href_string);
                        $('#event_image').prop('src', event_image);
                        $('#event_image').attr('aria-disabled', event_image);
                    }
                }
                });
                setTimeout(refreshData, x*1000);

                }
                refreshData();
            </script>
            
                <div class="col-sm">
                    <!-- Card 1 -->
                    <div class="card" style="width: 18rem;">
                        <img src="" class="card-img-top" alt="..." id="event_image">
                        <div class="card-body">
                            <h5 class="card-title" id="event_name"></h5>
                            <p class="card-text" id="event_description"></p>
                            <a href="#" class="btn btn-primary" name = "event_id" id="event_button" aria-disabled="false">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>