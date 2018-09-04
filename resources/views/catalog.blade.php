@extends('layout')
@section('content')
    <div class="container mt-5 pt-3 catalog-height-mobile desktop-margin-bottom">
        <div class="row pt-4 h-50 mt-5">
            <div class="col-12 col-lg-9">
                <section class="section pt-4">
                    <div class="row" id="productsItems">
                        @include('page-parts.items')
                    </div>
                </section>
            </div>

            <div class="col-12 col-lg-3">
                <div class="">
                    <div class="row">
                        <div class="col-md-6 col-lg-12 mb-5">
                            <h5 class="font-weight-bold green-text"><strong>Категории</strong></h5>
                            <div class="divider"></div>
                            @include('page-parts.categories')
                        </div>
                    </div>
                </div>
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
    <script src="{{asset('external/custom/client/app.js')}}"></script>
@endsection
