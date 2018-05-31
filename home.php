<!DOCTYPE html>
<html>
<head>
    <title>Api Fun</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.js"integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.8/angular-material.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark indigo">
            <a class="navbar-brand" href="#"><strong>API</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"ng-model="selection" ng-options="album">Albums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" ng-click="show_genre=true">Genre</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div ng-controller="ExampleController">
            <select ng-model="selection" ng-options="item for item in items">
            </select>
            <code>selection={{selection}}</code>
            <hr/>
        </div>
    </header>
    <div ng-app="myApp" ng-controller="list">
        <button class="btn-sm btn-info" ng-click="show_genre=true">Lister les genres</button>
        <button class="btn-sm btn-info" ng-click="show_artist=true">Lister les artistes</button>
        <div class="row">
            <div class="col-md-2" ng-repeat ="element in album">
                <!--<ul ng-open="list_album">-->
                <div class="view gradient-card-header peach-gradient">
                    <!-- Title -->
                    <h2 class="card-header-title mb-3">{{element.name}}</h2>
                    <!-- Text -->
                </div>
                <!-- Card content -->
                <div class="card-body text-center">
                    <!-- Text -->
                    <img src={{element.cover_small}}>
                    <!-- Link -->
                    <a href="#!" class="orange-text d-flex flex-row-reverse p-2">
                        <h5 class="waves-effect waves-light" id="details" ng-click="show_album_details(element.id)" ng-value={{element.id}}>Read more<i class="fa fa-angle-double-right ml-2"></i></h5>
                    </a>
                </div>
            </ul>
        </div>
    </div>
    <div class="col-md-1">
        <ul ng-repeat="t in tracks">
            <li>{{t.name}}</li>
            <li>Track:{{t.track_no}}</li>
            <li>Duration:{{t.duration}}s</li>
            <li><audio src={{t.mp3}} controls></audio></li>
        </ul>
    </div>
    <div class="col-md-1">
        <ul ng-show="show_genre">
            <h2>Genre musicaux</h2>
            <li ng-repeat="item in genre"><button class="btn-sm btn-info" ng-click="get_genre(item.id)">{{item.name}}</button></li>
        </ul>
    </div>
    <div class="col-md-1">
        <ul ng-show="show_artist">
            <h2>Artistes</h2>
            <li ng-repeat="a in artist"><a href="#" id="{{a.id}}" ng-click="get_artist(a.id)">{{a.name}}</a></li>
        </ul>
    </div>
    <div  class="col-md-5">
        <ul ng-repeat="elem in details">
            <li>Biography{{elem.bio}}</li>
            <li><img src={{elem.photo}} alt="artist_photo"></li>
        </ul>
    </div>
</div>
</div>
</div>
<!--Footer-->
<footer class="page-footer font-small stylish-color-dark pt-4 mt-4">
    <!--Footer Links-->
    <div class="container text-center text-md-left">
        <div class="row">
            <!--First column-->
            <div class="col-md-4">
                <h5 class="text-uppercase mb-4 mt-3 font-weight-bold">Music only</p>
                </div>
                <!--/.First column-->
                <hr class="clearfix w-100 d-md-none">
                <!--Second column-->
                <div class="col-md-2 mx-auto">
                    <h5 class="text-uppercase mb-4 mt-3 font-weight-bold">Links</h5>
                </div>
                <!--/.Second column-->
                <hr class="clearfix w-100 d-md-none">
                <!--Third column-->
                <div class="col-md-2 mx-auto">
                    <h5 class="text-uppercase mb-4 mt-3 font-weight-bold">Links</h5>
                </div>
                <!--/.Third column-->
                <hr class="clearfix w-100 d-md-none">
                <!--Fourth column-->
                <div class="col-md-2 mx-auto">
                    <h5 class="text-uppercase mb-4 mt-3 font-weight-bold">Links</h5>
                </div>
                <!--/.Fourth column-->
            </div>
        </div>
        <!--/.Footer Links-->
        <hr>
        <!--Call to action-->
        <div class="text-center py-3">
            <ul class="list-unstyled list-inline mb-0">
                <li class="list-inline-item">
                    <h5 class="mb-1">Register for free</h5>
                </li>
                <li class="list-inline-item">
                    <a href="#!" class="btn btn-danger btn-rounded">Sign up!</a>
                </li>
            </ul>
        </div>
        <!--/.Call to action-->
        <hr>
        <!--Social buttons-->
        <div class="text-center">
            <ul class="list-unstyled list-inline">
                <li class="list-inline-item">
                    <a class="btn-floating btn-sm btn-fb mx-1">
                        <i class="fa fa-facebook"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-sm btn-tw mx-1">
                        <i class="fa fa-twitter"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-sm btn-gplus mx-1">
                        <i class="fa fa-google-plus"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-sm btn-li mx-1">
                        <i class="fa fa-linkedin"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-sm btn-dribbble mx-1">
                        <i class="fa fa-dribbble"> </i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="footer-copyright py-3 text-center">
            © 2018 Copyright:
            <a href="https://mdbootstrap.com/material-design-for-bootstrap/"> MDBootstrap.com </a>
        </div>
    </footer>
    <!--/.Footer-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>
    <!-- Angular Material Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.8/angular-material.min.js"></script>
    <script src="assets/angular.js"></script>
</body>
</html>
