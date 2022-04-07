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
    .title-page h1{
        text-align: center;
        color: rgb(208, 108, 57);
        margin-top:2%;
    }
    .line-up {
        margin: 10px 350px 0 350px;
        height: 7px;
        border-radius: 2rem;
        background: rgb(209, 124, 19);
    }
/* news main */
    .all-news {
        padding:0;
        margin: 0;
        box-sizing: border-box;

    }
    .title-news {
        padding-right: 40px;
    }
    .news-info{
        box-shadow: 5px 10px  #888888;
        width:320px; 

    }
    .news-info a img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .image-news {
        width: 300px;
        height: 250px;
    }

    .fa-clock {
        color: rgb(224, 129, 40);
    }
    .fa-chevron-right{
        color:#fff;
    }

</style>
<div class="tab-in">
    <div class="inline">
        <a rel="stylesheet" href="{{ url('/') }}"><i class="fas fa-home"></i></a>
        <i class="fas fa-chevron-right"></i>
        <a class="title-news" style="padding-left:6px; color:#fff">Tin tức</a>
    </div>
</div>
<div class="title-page"><h1>NEWS</h1></div>
<div class="line-up"></div>
<div class="all-news mt-3 ">
    
        <div class="news-in row">
            @foreach ($news as $val)
            <div class=" colum-row-news col-md-3 mb-5 p-4">
                <div class="news-info">
                    <a href="{{url('/news/detail',$val->id)}}" class="link-news">
                        <div class="image-news ">
                            <figure> <img class="image-in mt-3 ml-2" src="assets/image/img_news/{{ $val->image }}" alt="news"
                                    style="width: 100%;"></figure>
                        </div>
                        <p style="white-space: nowrap;" class="hour-create mt-4 ml-2"><i class="fas fa-clock"></i> {{ $val->created_at }}</p>
                        <p style="width:300px; height:100px" class="title-in-news ml-3 ">{{ $val->title }}</p>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

</div>
@endsection

