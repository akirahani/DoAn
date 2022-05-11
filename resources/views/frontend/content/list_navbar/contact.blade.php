@extends('frontend.index')
@section('content')
<style>
    .tab-in {
    width: 100%;
    height: 35px;
    background: linear-gradient(rgb(248, 144, 84), #399edc);
}

.fa-home {
    color: rgb(237, 175, 113);
    font-size: 20px;
    padding: 8px 0 0 30px;
}

.inline a {
    color: rgb(208, 108, 57);
    padding-left: 2%;
}

.title-page h1 {
    text-align: center;
    color: rgb(208, 108, 57);
    margin-top: 2%;
}

.line-up {
    margin: 10px 350px 0 350px;
    height: 7px;
    border-radius: 2rem;
    background: rgb(209, 124, 19);
}
#map {
  height: 700px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}
</style>
<div class="tab-in">
    <div class="inline">
        <a rel="stylesheet" href="{{ url('/') }}"><i class="fas fa-home"></i></a>
        <i class="fas fa-chevron-right"></i>
        <a class="title-news" style="padding-left:6px; color:#fff">Liên hệ</a>
    </div>
</div>
<div class="title-page"><h1>CONTACT</h1></div>
<div class="line-up mb-3"></div>
<div class="map">
    <div id="map"></div>
</div>
<div class="main-contact" style="">
    <div class="form-in-contact p-5 w-50 ml-5 mb-2">
        <h2 style="">Liên hệ với chúng tôi</h2>
        <p class="aligncenter"><i>
            Vui lòng chia sẻ thông tin chi tiết của bạn bên dưới và chúng tôi sẽ sớm liên hệ với bạn.</i>
        </p>
        <form action="" method="">
            <div class="flex-in row">
                <div class="input-form mb-3 p-3 col-6">
                    <input type="text" class="form-control" placeholder="First Name" name="firstname">
                </div>
                <div class="input-form mb-3 p-3 col-6">
                    <input type="text" class="form-control" placeholder="Last Name" name="lastname">
                </div>
                <div class="input-form mb-3 p-3 col-6">
                    <input type="text" class="form-control" placeholder="Phone" name="phone">
                </div>
                <div class="input-form mb-3 p-3 col-6">
                    <input type="text" class="form-control" placeholder="Email" name="email">
                </div>
            </div>
            <div class="input-form mb-3">
                <textarea name=""  class="form-control" rows="8" placeholder="Address" name="address" style="width:100%;"></textarea>
            </div>
            <input class="form-control button-submit-contact"  type="submit" value="Gửi">
        </form>
    </div>
</div>   
<script>
    function initMap() {
    // The location of Uluru
    const uluru = { lat:  20.8301332, lng: 106.6982681 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
    }

</script>      
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKaiPqeCNb3XhJ2zPTR2qdIrmP7zAdkfU&callback=initMap&v=weekly"
async
></script>
      


@endsection




