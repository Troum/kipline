@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="loader justify-content-center align-content-center">
            <div class="holder">
                <div class="preloader">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 col-xl-10">
                <div class="card rounded-0">
                    <div class="card-header">Панель управления</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                    @endif
                    <!-- Nav tabs -->
                        <div class="row">
                            <div class="col-md-2 col-xl-4">
                                <ul class="nav md-pills pills-kipline flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active text-left rounded-0" data-toggle="tab" href="#panel21" role="tab">
                                            Добавить продукт
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-left rounded-0" data-toggle="tab" href="#panel22" role="tab">
                                            Список продуктов
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9 col-xl-8">
                                <div class="tab-content vertical">
                                    <div class="tab-pane fade in show active" id="panel21" role="tabpanel">
                                        <form id="productAddForm" enctype="multipart/form-data">
                                            <div class="md-form">
                                                <i class="fab fa-product-hunt prefix green-text"></i>
                                                <input type="text" id="productName" name="productName" class="form-control" placeholder="Название продукта">
                                            </div>
                                            <div class="col-md-6 m-0 p-3">
                                                <div class="md-form mb-0">
                                                    <select class="mdb-select green-text" id="productCategory">
                                                        <option value="level">Датчики уровня</option>
                                                        <option value="signal">Сигнализаторы уровня</option>
                                                        <option value="sensor">Датчики температуры</option>
                                                        <option value="analyzer">Аналитика</option>
                                                        <option value="industrial">Промышленные датчики</option>
                                                        {{--<option value="system">Системные компоненты</option>--}}
                                                    </select>
                                                    <label for="productCategory" class="green-text">Категория продукта</label>
                                                </div>
                                            </div>
                                            <div class="md-form mt-5 mb-5">
                                                <div class="file-field">
                                                    <div class="btn btn-kipline rounded-0 btn-sm float-left">
                                                        <span>Фото продукта</span>
                                                        <input type="file" id="productPhotos" name="productPhotos" multiple>
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input id="productPhotosFilename" class="file-path validate" type="text" placeholder="Загрузить одну или больше фотографий" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="md-form mt-5 mb-5">
                                                <div class="file-field">
                                                    <div class="btn btn-kipline rounded-0 btn-sm float-left">
                                                        <span>Брошюра</span>
                                                        <input type="file" id="productBooklet" name="productBooklet" multiple>
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input id="productBookletFilename" class="file-path validate" type="text" placeholder="Загрузить буклет (если необходимо)" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="md-form mt-5 mb-5">
                                                <div class="file-field">
                                                    <div class="btn btn-kipline rounded-0 btn-sm float-left">
                                                        <span>Документация</span>
                                                        <input type="file" id="productDocumentation" name="productDocumentation" multiple>
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input id="productDocumentationFilename" class="file-path validate" type="text" placeholder="Загрузить документацию(если необходимо)" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-5 mb-5">
                                                <i class="fas fa-pencil-alt prefix green-text fa-2x"></i>
                                                &nbsp;&nbsp;<label class="green-text">Описание</label>
                                            </div>
                                            <div class="md-form">
                                                <textarea type="text" id="productDescription" name="productDescription" class="md-textarea" rows="10" placeholder="Описание"></textarea>
                                            </div>
                                            <div class="mt-5 mb-5">
                                                <i class="fas fa-list-ul prefix green-text fa-2x"></i>
                                                &nbsp;&nbsp;<label class="green-text">Характеристики</label>
                                            </div>
                                            <div class="md-form">
                                                <textarea id="productCharacteristics" name="productCharacteristics" class="md-textarea" rows="10" placeholder="Характеристики"></textarea>
                                            </div>
                                            <div class="mt-5 mb-5">
                                                <i class="fas fa-cogs prefix green-text fa-2x"></i>
                                                &nbsp;&nbsp;<label class="green-text">Применение</label>
                                            </div>
                                            <div class="md-form">
                                                <textarea id="productUse" name="productUse" class="md-textarea" rows="10" placeholder="Использование"></textarea>
                                            </div>
                                        </form>
                                        <div class="text-center mt-4">
                                            <button class="btn btn-outline-green" id="addProduct">Сохранить</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="panel22" role="tabpanel">
                                    <div id="productsTable">
                                        @include('page-parts.table')
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-id="">
        <div class="modal-dialog modal-notify modal-success modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Редактирование</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row m-0 p-0">
                        <div class="col-md-12 mx-auto">
                            <div class="md-form pb-2 pt-2">
                                <i class="fas fa-pencil-alt green-text d-inline-block"></i>
                                <label for="newProductName" class="green-text d-inline-block">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Редактировать название</label>
                            </div>
                            <div class="md-form">
                                <input type="text" id="newProductName" name="newProductName" class="form-control">
                            </div>
                            <div class="md-form pb-2 pt-2">
                                <i class="fas fa-pencil-alt green-text d-inline-block"></i>
                                <label for="newProductDescription" class="green-text d-inline-block">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Редактировать описание</label>
                            </div>
                            <div class="md-form">
                            <textarea name="newProductDescription" id="newProductDescription" cols="30" rows="10" class="md-textarea">

                            </textarea>
                            </div>
                            <div class="md-form pb-2 pt-2">
                                <i class="fas fa-pencil-alt green-text d-inline-block"></i>
                                <label for="newProductCharacteristics" class="green-text d-inline-block">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Редактировать характеристики</label>
                            </div>
                            <div class="md-form">
                            <textarea name="newProductCharacteristics" id="newProductCharacteristics" cols="30" rows="10" class="md-textarea">

                            </textarea>
                            </div>
                            <div class="md-form pb-2 pt-2">
                                <i class="fas fa-pencil-alt green-text d-inline-block"></i>
                                <label for="newProductUse" class="green-text d-inline-block">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Редактировать применение</label>
                            </div>
                            <div class="md-form">
                            <textarea name="newProductUse" id="newProductUse" cols="30" rows="10" class="md-textarea">

                            </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <a type="button" class="btn btn-kipline text-white" id="saveEdited">Сохранить</a>
                    <a type="button" class="btn btn-outline-green waves-effect" data-dismiss="modal">Отменить</a>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Удалить продукт?</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fa fa-delete fa-4x mb-3 animated rotateIn"></i>
                        <p>Вы дейтсительно хотите удалить <span id="deleting"></span>?</p>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <a type="button" class="btn btn-danger" id="deleteProduct">Удалить</a>
                    <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">Отменить</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{asset('external/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('external/popper.js/dist/umd/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('external/mdbootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('external/mdbootstrap/js/mdb.min.js')}}"></script>
    <script src="{{asset('external/custom/admin/app.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.mdb-select').material_select();
        });
    </script>
    <script src="{{asset('external/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('external/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            language: 'ru',
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code help wordcount textcolor'
            ],
            toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css']
        });
    </script>
@endsection
