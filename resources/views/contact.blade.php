@extends('layout')
@section('content')
    <section>
        <div class="mdb-map">
            <div id="map-container" class="z-depth-1-half map-container h-50 mobile-map"></div>
        </div>
    </section>
    <div class="container-fluid mb-5 mobile-contacts-height">
        <div class="row contact-us">
            <div class="col-md-8 col-xl-9 mx-auto p-4 bg-white z-depth-1-half">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="card-body form" id="contactPageForm">
                            <form>
                                <input type="hidden" value="{{csrf_token()}}">
                                <h3 class="mt-4"><i class="fas fa-envelope pr-2 crimson-text"></i>Написать нам:</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="formContactPageName" name="formContactPageName" class="form-control">
                                            <label for="formContactPageName" class="">Ваше имя</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="email" id="formContactPageEmail" name="formContactPageEmail" class="form-control">
                                            <label for="formContactPageEmail" class="">Ваш email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="formContactPagePhone" name="formContactPagePhone" class="form-control">
                                            <label for="formContactPagePhone" class="">Ваш номер телефона</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="formContactPageCompany" name="formContactPageCompany" class="form-control">
                                            <label for="formContactPageCompany" class="">Ваша компания</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <textarea type="text" id="formContactPageMessage" name="formContactPageMessage" class="form-control md-textarea" rows="3"></textarea>
                                            <label for="formContactPageMessage">Ваше сообщение</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <a class="btn-floating btn-lg green float-right border-0">
                                                <i class="fas fa-paper-plane" id="sendFromContact"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-body contact text-center h-100 dark-text">
                            <h3 class="my-4 pb-2">Контактная информация</h3>
                            <ul class="text-lg-left list-unstyled ml-4">
                                <li>
                                    <p><i class="crimson-text fas fa-mobile-alt pr-2 mb-4"></i>тел. моб.: +375 29 831 56 24</p>
                                </li>
                                <li>
                                    <p><i class="crimson-text fa fa-print pr-2 mb-4"></i>тел./факс: +375 17 514 61 89</p>
                                </li>
                                <li>
                                    <p><i class="crimson-text fa fa-envelope pr-2"></i><a href="mailto:kiplinetrade@gmail.com" style="color: inherit">kiplinetrade@gmail.com</a></p>
                                </li>
                            </ul>
                            <hr class="hr-light my-4">
                            {{--<ul class="list-inline text-center list-unstyled">--}}
                                {{--<li class="list-inline-item">--}}
                                    {{--<a class="p-2 fa-lg">--}}
                                        {{--<i class="crimson-text fab fa-twitter"></i>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class="list-inline-item">--}}
                                    {{--<a class="p-2 fa-lg">--}}
                                        {{--<i class="crimson-text fab fa-linkedin"> </i>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class="list-inline-item">--}}
                                    {{--<a class="p-2 fa-lg">--}}
                                        {{--<i class="crimson-text fab fa-instagram"> </i>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script type="text/javascript">
        new WOW().init();
        $(function () {
            $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
        $(document).ready(function () {
            $('.mdb-select').material_select();
        });
    </script>
    <script>
        ymaps.ready(init);
        let myMap,
            myPlacemark;
        function init(){
            myMap = new ymaps.Map("map-container", {
                center: [53.951998, 27.691503],
                controls: [],
                zoom: 15
            });
            myPlacemark = new ymaps.Placemark([53.951998, 27.691503], {
                hintContent: 'КИПЛАЙН ТРЕЙД',
                balloonContentBody: ['<p class="animated fadeIn">ООО "КИП Лайн Трейд" <br> 220125, г. Минск, <br>ул. Острошицкая д. 10, <br>пом. 5н, каб. 5</p>']
            }, {
                iconLayout: 'default#image',
                iconImageHref: '{{asset('favicon.ico')}}',
                iconImageSize: [100, 100],
                iconImageOffset: [-5, -38]
            });
            myMap.behaviors.disable('scrollZoom');
            myMap.geoObjects.add(myPlacemark);
        }
    </script>
    <script src="{{asset('external/custom/client/app.js')}}"></script>
@endsection