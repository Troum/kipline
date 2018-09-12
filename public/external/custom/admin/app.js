$(document).ready(function(){
    let body = $('body'),
        uri = window.location.toString(),
        loader = $('.loader'),
        modal = $('#editModal'),
        confirm = $('#confirmModal'),
        fd = new FormData(),
        id = null;

    function clearAll(data){
        $(data).find('input').each(function () {
            $(this).val('');
        });
        $(data).find('textarea').each(function () {
            $(this).val('');
        });
    }

    function filename(length, filename, file) {
        if(length === 1) {
            $(filename).val($(file)[0].files[0].name);
        }
        if(length > 1 && length <= 4) {
            $(filename).val('будет загружено ' + length + ' файла');
        }
        if(length >= 5) {
            $(filename).val('будет загружено ' + length + ' файлов');
        }
    }

    function refresh(link) {
        $.ajax({
            url: link
        }).done(function (data) {
            $('#productsTable').html(data);
        }).fail(function () {
            alert('Невозможно отобразить');
        });
    }

    function paginate(selector){
        body.on('click', '.pagination a.page-link:not(.not-active)', function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            $.ajax({
                url: url
            }).done(function (data) {
                $(selector).html(data);
            }).fail(function () {
                alert('Невозможно отобразить');
            });
            window.history.pushState({}, document.title, window.location.pathname);
        });
    }
    if (uri.indexOf("?") > 0) {
        let clear = uri.substring(0, uri.indexOf("?"));
        window.history.replaceState({}, document.title, clear);
    }
    loader.hide();
    paginate('#productsTable');

    $('#productCategory').on('change', function () {
       fd.append('category', $(this).find('option:selected').text());
       fd.append('categorySlug', $(this).val());
    });
    $('#productBooklet').on('change', function () {
        let length = $(this)[0].files.length;
        for (let i = 0; i <= length; i++) {
            fd.append("booklets[]", $(this).prop('files')[i]);
        }
        filename(length, '#productBookletFilename', $(this));
    });
    $('#productDocumentation').on('change', function () {
        let length = $(this)[0].files.length;
        for (let i = 0; i <= length; i++) {
            fd.append("documents[]", $(this).prop('files')[i]);
        }
        filename(length, '#productDocumentationFilename', $(this));
    });
    $('#productPhotos').on('change', function () {
        let length = $(this)[0].files.length;
        fd.append('cover', $(this).prop('files')[0]);
        for (let i = 0; i <= length; i++) {
            fd.append("photos[]", $(this).prop('files')[i]);
        }
        filename(length, '#productPhotosFilename', $(this));

    });

    $('#newProductPhotos').on('change', function () {
        let length = $(this)[0].files.length;
        fd.append('cover', $(this).prop('files')[0]);
        for (let i = 0; i <= length; i++) {
            fd.append("photos[]", $(this).prop('files')[i]);
        }
        filename(length, '#newProductPhotosFilename', $(this));

    });


    $('#addProduct').on('click', function () {
        loader.show();
        fd.append('product', $('#productName').val());
        fd.append('description', tinymce.get('productDescription').getContent());
        fd.append('characteristics', tinymce.get('productCharacteristics').getContent() );
        fd.append('use', tinymce.get('productUse').getContent() );
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/home/add',
            type: 'POST',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function (response) {
                loader.hide();
                clearAll('#productAddForm');
                refresh('home/refresh');
                toastr.success(response.success);
                tinymce.get('productDescription').setContent('');
                tinymce.get('productCharacteristics').setContent('');
                tinymce.get('productUse').setContent('');
                fd.delete('photos[]');
            },
            error: function(error) {
                loader.hide();
                for(let err in error.responseJSON.errors ) {
                    toastr.error(error.responseJSON.errors[err][0]);
                }
            }
        });

    });
    body.on('click','td[data-edit]',function () {
        id = $(this).parent('tr').data('id');
        console.log(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/home/open-editing/' + id,
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
                let name = response.product.name,
                    description = response.product.description,
                    characteristics = response.product.characteristics,
                    use = response.product.use,
                    cover = '/images/cover/' + response.product.slug + '/' + response.product.cover;
                modal.find('#newProductName').val(name);
                modal.find('#current-cover').attr('src', cover);
                tinymce.get('newProductDescription').setContent(description);
                tinymce.get('newProductCharacteristics').setContent(characteristics);
                tinymce.get('newProductUse').setContent(use);
                modal.modal('show');
            },
            error: function(error) {
                loader.hide();
                for(let err in error.responseJSON.errors ) {
                    toastr.error(error.responseJSON.errors[err][0]);
                }
            }
        });
    });



    body.on('click','#saveEdited', function (e) {
        e.preventDefault();
        loader.show();
        fd.append('id', id);
        fd.append('name', $('#newProductName').val());
        fd.append('description', tinymce.get('newProductDescription').getContent());
        fd.append('characteristics', tinymce.get('newProductCharacteristics').getContent() );
        fd.append('use', tinymce.get('newProductUse').getContent() );
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/home/edit',
            type: 'POST',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function (response) {
                loader.hide();
                modal.modal('hide');
                $('.modal-backdrop').hide();
                toastr.success(response.success);
                refresh('home/refresh');
            },
            error: function(error) {
                loader.hide();
                for(let err in error.responseJSON.errors ) {
                    toastr.error(error.responseJSON.errors[err][0]);
                }
            }
        });
    });

    body.on('hidden.bs.modal', modal, function () {
        body.find('#newProductPhotos').val('');
        body.find('#newProductPhotosFilename').val('');
        body.find('#current-cover').attr('src', '');
        fd.delete('photos[]');
    });

    body.on('click','td[data-delete]',function () {
        confirm.modal('show');
        $('#deleting').text($(this).parent('tr').data('name'));
        id = $(this).parent('tr').data('id');
    });

    $('#deleteProduct').on('click', function (e) {
        e.preventDefault();
        loader.show();
        fd.append('id', id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/home/delete',
            type: 'POST',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function (response) {
                loader.hide();
                confirm.modal('hide');
                $('.modal-backdrop').hide();
                refresh('home/refresh');
                toastr.success(response.success);
            },
            error: function(error) {
                loader.hide();
                for(let err in error.responseJSON.errors ) {
                    toastr.error(error.responseJSON.errors[err][0]);
                }
            }
        });
    });




});