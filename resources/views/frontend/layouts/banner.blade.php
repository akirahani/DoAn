<link rel="stylesheet" href="{{ asset('assets3/css/banner-slide.css') }}">


<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="{{ asset('assets3/image/banner1.jpg') }}" alt="Los Angeles" style="width:100%; height:1000px">
        </div>

        <div class="item">
            <img src="{{ asset('assets3/image/banner2.1.jpg') }}" alt="Chicago" style="width:100%; height:1000px">
        </div>

        <div class="item">
            <img src="{{ asset('assets3/image/banner3.1.jpg') }}" alt="New york" style="width:100%; height:1000px">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" onclick="actionSlide(-1)" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"><i class="fa-solid fa-angle-left"></i></span>
    </a>
    <a class="right carousel-control" onclick="actionSlide(1)" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"><i class="fa-solid fa-angle-right"></i></span>
    </a>
</div>
<script>
    var slideShow = 1;
    slideShows(slideShow);
    function current(n){
        slideShows(slideShow =n);
    }
    function actionSlide(n){
        slideShows(slideShow += n);
    }
    function slideShows(n){
        var i;
        var slide = document.getElementsByClassName('item');
        if(n > slide.length){
            slideShow = 1;
        }
        if(n < 1){
            slideShow= slide.length;  
        }
        for(i =0; i< slide.length; i++){
            slide[i].style.display ="none";
        }
        slide[slideShow -1].style.display = "block";
    }

</script>
