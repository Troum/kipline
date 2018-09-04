@foreach($products as $product)
    <div class="col-12 col-lg-4 col-xl-4 mb-4">
        <div class="card card-ecommerce" data-item>
            <div class="view-card  overlay">
                <img src="{{asset('images/cover/'.$product->slug.'/'.$product->cover)}}" class="img-fluid" alt="">
                <a>
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
            <div class="card-body">
                <h6 class="card-title mb-1 text-center"><strong><a href="/product/{{$product->slug}}" class="dark-grey-text">{{$product->name}}</a></strong></h6>
            </div>
        </div>
    </div>
@endforeach
<div class="col-12 col-md-12">
    <div class="row">
        <section class="col-4 mx-auto pagination-container d-flex justify-content-center align-content-center">
            {{$products->links('vendor.pagination.bootstrap-4')}}
        </section>
    </div>
</div>