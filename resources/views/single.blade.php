@extends('layout')
@section('content')
    <div class="container mt-5 pt-3">
        <section id="productDetails" class="pb-5">
            <div class="card mt-5 hoverable">
                <div class="row mt-5">
                    <div class="col-lg-6">
                        <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                            <div class="carousel-inner text-center text-md-left" role="listbox">
                                @foreach($product->relatedPhoto as $photo)
                                    <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
                                        <img src="{{asset('images/related/'.$product->slug.'/'.$photo->product_photo)}}" class="img-fluid">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 mr-3 text-center text-md-left">
                        <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">
                            <strong>{{$product->name}}</strong>
                        </h2>
                        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="card card-ecommerce">
                                <div class="card-header pl-0" role="tab" id="headingOne">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h5 class="mb-0 crimson-text">
                                            Описание
                                            <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="dark-grey-text pl-0">
                                        <p>
                                            {!! $product->description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-ecommerce">
                                <div class="card-header pl-0" role="tab" id="headingThree">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <h5 class="mb-0 crimson-text">
                                            Характеристики
                                            <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="dark-grey-text pl-0">
                                        {!! $product->characteristics !!}
                                    </div>
                                </div>
                            </div>
                            <div class="card card-ecommerce">
                                <div class="card-header pl-0" role="tab" id="headingFour">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <h5 class="mb-0 crimson-text">
                                            Применение
                                            <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
                                    <div class="dark-grey-text pl-0">
                                        {!! $product->use !!}
                                    </div>
                                </div>
                            </div>
                            <div class="card card-ecommerce">
                                <div class="card-header pl-0" role="tab" id="headingFife">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFife" aria-expanded="false" aria-controls="collapseFife">
                                        <h5 class="mb-0 crimson-text">
                                            Цветная брошюра
                                            <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseFife" class="collapse" role="tabpanel" aria-labelledby="headingFife" data-parent="#accordion">
                                    <div class="dark-grey-text pl-0">
                                        <p>
                                            @foreach($product->relatedBooklet as $booklet)
                                                <a href="{{asset('booklets/'.$product->slug.'/'.$booklet->product_booklet)}}" class="p-3 crimson-text" target="_blank">
                                                    <i class="crimson-text fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;
                                                    <span>&nbsp;Брошюра</span>
                                                </a>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-ecommerce">
                                <div class="card-header pl-0" role="tab" id="headingSix">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        <h5 class="mb-0 crimson-text">
                                            Документация
                                            <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingSix" data-parent="#accordion">
                                    <div class="dark-grey-text pl-0">
                                        <p>
                                            @foreach($product->relatedDocument as $document)
                                                <a href="{{asset('documents/'.$product->slug.'/'.$document->product_document)}}" class="p-3 crimson-text" target="_blank">
                                                    <i class="crimson-text fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;
                                                    <span>&nbsp;Документация</span>
                                                </a>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @include('page-parts.interview')
                        </div>
                        <section class="color">
                            <div class="mt-5">
                                <div class="row mt-3 mb-4">
                                    <div class="col-md-12 text-center text-md-left text-md-right">
                                        <button class="btn btn-crimson btn-rounded" data-toggle="modal" data-target="#orderModal">
                                            <i class="fas fa-phone mr-2" aria-hidden="true"></i> Связаться</button>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>



        <div class="divider-new">
            <h3 class="h3-responsive font-weight-bold crimson-text mx-3">Также советуем посмотреть...</h3>
        </div>



        <section id="products" class="pb-5">
            <p class="text-center w-responsive mx-auto mb-5 dark-grey-text">Ниже отображены продукты, которые могут заинтересовать Вас</p>
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
                <div class="controls-top">
                    <a class="btn-floating btn-crimson" href="#multi-item-example" data-slide="prev">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                    <a class="btn-floating btn-crimson" href="#multi-item-example" data-slide="next">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
                <div class="carousel-inner d-flex justify-content-center align-content-center" role="listbox">

                    @foreach($products as $item)
                        <div class="carousel-item {{ $loop->first ? 'active' : ''}}">

                            @foreach($item as $part)
                                <div class="col-md-4 mb-4">
                                    <div class="card card-ecommerce">
                                        <div class="view overlay">
                                            <img src="{{asset('images/cover/'.$part->slug.'/'.$part->cover)}}" class="img-fluid" alt="">
                                            <a href="/product/{{$part->slug}}">
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="card-title mb-1">
                                                <strong>
                                                    <a href="/product/{{$part->slug}}" class="dark-grey-text">{{$part->name}}</a>
                                                </strong>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade cart-modal" id="orderModal" tabindex="-1" role="document" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold crimson-text" id="myModalLabel">Закажите обратный звонок</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="orderForm">
                    <form>
                        <input type="hidden" value="{{csrf_token()}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="formContactName" class="form-control" name="formContactName">
                                    <label for="formContactName" class="">Ваше имя</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="formContactEmail" class="form-control" name="formContactEmail">
                                    <label for="formContactEmail" class="">Ваш email</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="formContactPhone" class="form-control" name="formContactPhone">
                                    <label for="formContactPhone" class="">Ваш номер телефона</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="formContactCompany" class="form-control" name="formContactCompany">
                                    <label for="formContactCompany" class="">Ваша компания</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <textarea type="text" id="formContactMessage" class="form-control md-textarea" rows="3" name="formContactMessage"></textarea>
                                    <label for="formContactMessage">Ваше сообщение</label>
                                    <button type="button" class="btn btn-crimson btn-rounded float-right" id="sendOrder">Заказать</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('external/custom/client/app.js')}}"></script>
@endsection