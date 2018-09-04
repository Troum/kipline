@extends('layout')
@section('content')
    <section class="h-50">
        <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators">
                <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                <li data-target="#carousel-example-1z" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="view h-100">
                        <img class="d-block h-100 w-lg-100" src="{{asset('images/slider/factory1.jpg')}}" alt="First slide">
                        <div class="mask">
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100">
                    <div class="view h-100">
                        <img class="d-block h-100 w-lg-100" src="{{asset('images/slider/factory2.jpg')}}" alt="Second slide">
                        <div class="mask">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="view h-100">
                        <img class="d-block h-100 w-lg-100" src="{{asset('images/slider/factory3.jpg')}}" alt="Third slide">
                        <div class="mask">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="view h-100">
                        <img class="d-block h-100 w-lg-100" src="{{asset('images/slider/factory4.jpg')}}" alt="Fourth slide">
                        <div class="mask">
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <div class="container">
        <div class="row pt-4">
            <div class="col-lg-12">
                <section class="section pt-2">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 mb-4">
                            <section class="section">
                                <ul class="list-group z-depth-1">

                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="/category/level" class="crimson-text font-small">
                                            Уровнемеры
                                        </a>
                                        <span class="badge crimson-badge badge-pill">{{$groups['level']}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="/category/signal" class="crimson-text font-small">
                                            Сигнализаторы уровня
                                        </a>
                                        <span class="badge crimson-badge badge-pill">{{$groups['signal']}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="/category/sensor" class="crimson-text font-small">
                                            Датчики температуры
                                        </a>
                                        <span class="badge crimson-badge badge-pill">{{$groups['sensor']}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="/category/analyzer" class="crimson-text font-small">
                                            Анализаторы жидкости
                                        </a>
                                        <span class="badge crimson-badge badge-pill">{{$groups['analyzer']}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="/category/industrial" class="crimson-text font-small">
                                            Промышленные датчики
                                        </a>
                                        <span class="badge crimson-badge badge-pill">{{$groups['industrial']}}</span>
                                    </li>
                                    {{--<li class="list-group-item d-flex justify-content-between align-items-center">--}}
                                    {{--<a href="/category/system" class="crimson-text font-small">--}}
                                    {{--Системные компоненты--}}
                                    {{--</a>--}}
                                    {{--<span class="badge crimson-badge badge-pill">{{$groups['system']}}</span>--}}
                                    {{--</li>--}}
                                </ul>
                            </section>


                        </div>
                        @if(count($product) <> 0)
                            <div class="col-lg-8 col-md-12 pb-lg-5 mb-4">
                                <div class="view zoom z-depth-1">
                                    <img src="{{asset('images/cover/'.$product[0]->slug.'/'.$product[0]->cover)}}" class="h-25 float-right mr-5"
                                         alt="sample image">
                                    <div class="mask rgba-white-light">
                                        <div class="crimson-text  pt-4 ml-3 pl-3">
                                            <div>
                                                <h4 class="card-title font-weight-bold pt-2">
                                                    <strong>{{$product[0]->name}}</strong>
                                                </h4>
                                                <a href="/product/{{$product[0]->slug}}" class="btn btn-crimson btn-sm btn-rounded clearfix d-none d-md-inline-block text-white">Узнать больше</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </section>
                {{--<section>--}}
                {{--<div class="row">--}}
                {{--<div class="col-12">--}}
                {{--<ul class="nav nav-tabs nav-justified crimson-background-light mx-0" role="tablist">--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link active crimson-text font-weight-bold" data-toggle="tab"--}}
                {{--href="#panel5" role="tab">О нас</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link crimson-text font-weight-bold" data-toggle="tab" href="#panel6"--}}
                {{--role="tab">Наши преимущества</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link crimson-text font-weight-bold" data-toggle="tab" href="#panel7"--}}
                {{--role="tab">--}}
                {{--</i>Контакты</a>--}}
                {{--</li>--}}
                {{--</ul>--}}

                {{--<div class="tab-content px-0">--}}

                {{--<div class="tab-pane fade in show active " id="panel5" role="tabpanel">--}}
                {{--<br>--}}

                {{--<div class="row">--}}

                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="tab-pane fade" id="panel6" role="tabpanel">--}}
                {{--<br>--}}
                {{--<div class="row mb-3">--}}

                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="tab-pane fade" id="panel7" role="tabpanel">--}}
                {{--<br>--}}
                {{--<div class="row">--}}

                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</section>--}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">

        /* WOW.js init */
        new WOW().init();

        // Tooltips Initialization
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <script>
        // Material Select Initialization
        $(document).ready(function () {

            $('.mdb-select').material_select();
        });
    </script>
    <script>
        // SideNav Initialization
        $(".button-collapse").sideNav();
    </script>
@endsection