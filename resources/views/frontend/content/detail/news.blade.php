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
.time-create{
    color: rgb(208, 108, 57);
}
.title-news{
    color: #ff8e05;
}
.all-news{
        width:100%;
        height:450px;
    }
    .text-center h1{
        margin: 0 auto;
        color: rgb(208, 108, 57);
        padding-top: 200px;
        text-transform: uppercase;
    }
</style>
    <div class="tab-in mt-3">
        <div class="inline">
            <a rel="stylesheet" href="{{ url('/') }}"><i class="fas fa-home"></i></a>
            <i class="fas fa-chevron-right"></i>
            <a class="title-news" style="padding-left:6px; color:#fff">Tin tức</a>
        </div>
    </div>
    <div class="all-news" style="background-image:url('../../assets3/image/banner3.1.jpg'); ">
        <div class="text-center">
            <h1>NEWS</h1>
        </div>
    </div>
    <div class="line-up mb-3"></div>
    <div class="all-wrapper-news-detail container p-5">
        <div class="news-in row">
            <div class="content-detail-news col-lg-8">
                <div class="title-news"><h1>{{$news->title}}</h1></div>
                <p class="time-create"><i class="fas fa-clock"></i> {{$news->created_at}}</p>
                <p class="content">
                    {!!$news->content!!}
                </p>
                <hr>

            </div>
            <div class="list-news col-lg-4 ">
                <div>
                   <p class="title-other-news p-3">
                        <h4> <b></b> Những tin tức đáng chú ý khác</h4>
                        <hr>
                        <ul style="list-style:none">
                            @foreach($news_other as $val)
                                <li>
                                    <a href="{{url('/news/detail',$val->id)}}">
                                        <div class="in-detail-news">
                                            <p><i class="fas fa-newspaper"></i> {{$val->title}}</p>
                                        </div>   
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </p> 
                </div>
               
            </div>
        </div>
    </div>
@endsection




