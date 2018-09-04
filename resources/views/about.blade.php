@extends('layout')
@section('content')
    <section class="h-90">
        <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="view h-100 d-flex justify-content-center align-content-cente">
                        <div class="row align-self-center m-auto m-0 p-0 w-100">
                            <img class="d-block h-100 w-lg-100" src="{{asset('images/about/about-1.jpg')}}" alt="First slide">
                            <div class="mask"></div>
                        </div>
                        <div class="row align-self-center m-0 p-0 w-50 position-absolute animated fadeInUp" style="left: 2%">
                            <div class="col-xl-8 mx-auto bg-dark p-3 text-white z-depth-1">
                                <span class="text-success"><a href="/" style="color: inherit">КИП Лайн Трейд</a></span> — белорусская компания, являющаяся дистрибьютером всемирно известного венгерского бренда <strong>«Nivelco»</strong>, который разрабатывает и производит контрольно-измерительное оборудование.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100">
                    <div class="view h-100 d-flex justify-content-center align-content-center">
                        <div class="row align-self-center m-auto m-0 p-0 w-100">
                            <img class="d-block h-100 w-lg-100" src="{{asset('images/about/about-2.jpg')}}" alt="Second slide">
                            <div class="mask"></div>
                        </div>
                        <div class="row align-self-center m-0 p-0 w-75 position-absolute animated fadeInUp" style="left: 2%; top: 20%;">
                            <div class="col-12 col-xl-8 mx-auto bg-dark p-3 text-white z-depth-1">
                                Компания осуществляет продажу и обслуживание таких приборов, как
                                <ul>
                                    <li>Сигнализаторы уровня (ультразвуковые, гидростатические, бесконтактные и др.);</li>
                                    <li>Аналитические датчики (преобразователи проводимости и растворенного кислорода);</li>
                                    <li>Расходомеры;</li>
                                    <li>Датчики температуры и давления;</li>
                                    <li>Промышленные датчики (инфракрасный, ультразвуковой датчик расстояния).</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="view h-100 d-flex justify-content-center align-content-center position-relative">
                        <div class="row align-self-center m-auto m-0 p-0 w-100">
                            <img class="d-block h-100 w-lg-100" src="{{asset('images/about/about-3.jpg')}}" alt="Third slide">
                            <div class="mask"></div>
                        </div>
                        <div class="row align-self-center m-0 p-0 w-50 position-absolute animated fadeInUp" style="right: 2%">
                            <div class="col-xl-8 mx-auto bg-dark p-3 text-white z-depth-1">
                                Также <span class="text-success">КИП Лайн Трейд</span> предоставляет возможность приобретения дополнительного спецоборудования: блоки питания, реле времени, контролеры и многофункциональные переключатели.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="view h-100 d-flex justify-content-center align-content-cente">
                        <div class="row align-self-center m-auto m-0 p-0 w-100">
                            <img class="d-block h-100 w-lg-100" src="{{asset('images/about/about-4.jpg')}}" alt="Fourth slide">
                            <div class="mask"></div>
                        </div>
                        <div class="row align-self-center m-0 p-0 w-50 position-absolute animated fadeInUp" style="right: 2%">
                            <div class="col-xl-8 mx-auto bg-dark p-3 text-white z-depth-1">
                                Продукцию <strong>«Nivelco»</strong> используют в строительстве, промышленности, фармацевтике, энергетике и других важных сферах деятельности.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev"></a>
            <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next"></a>
        </div>
    </section>
@endsection