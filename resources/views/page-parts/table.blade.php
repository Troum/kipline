<table class="table table-hover" id="productsTableContainer">
    <thead>
    <tr>
        <th>Название</th>
        <th>Категория</th>
        <th>Удаление</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr data-id="{{$product->id}}" data-description="{{$product->description}}" data-characteristics="{{$product->characteristics}}" data-use="{{$product->use}}" data-name="{{$product->name}}">
            <td data-edit scope="row">{{$product->name}}</td>
            <td data-edit>{{$product->category}}</td>
            <td data-delete class="p-1">
                <button type="button" class="btn btn-sm btn-danger text-uppercase rounded-0">Удалить</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<section class="col-4 offset-4 pagination-container">
    {{$products->links('vendor.pagination.bootstrap-4')}}
</section>
