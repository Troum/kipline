$(document).ready(function () {
    let body = $('body'),
        uri = window.location.toString(),
        fd = new FormData(),
        vd = new FormData(),
        cd = new FormData(),
        orderModal = $('#orderModal'),
        orderMessage = {
            'name': $('#formContactName'),
            'email': $('#formContactEmail'),
            'phone': $('#formContactPhone'),
            'company': $('#formContactCompany'),
            'message': $('#formContactMessage'),
        },
        contactMessage = {
            'name': $('#formContactPageName'),
            'email': $('#formContactPageEmail'),
            'phone': $('#formContactPagePhone'),
            'company': $('#formContactPageCompany'),
            'message': $('#formContactPageMessage'),
        },
        interviewMessage = {
            'name': $('#formInterviewName'),
            'phone': $('#formInterviewPhone'),
            'email': $('#formInterviewEmail'),
            'company': $('#formCompanyName'),
            'product': $('#formProductName'),
            'count': $('#formProductCount'),
            'environment': $('#formProductEnvironment'),
            'concentrate': $('#formConcentrate'),
            'viscosity': $('#formViscosity'),
            'dielectricConstant': $('#formDielectricConstant'),
            'granuleSize': $('#formGranuleSize'),
            'weightDensity': $('#formWeightDensity'),
            'unitType': $('#formUnitType'),
            'insideTemperature': $('#formInsideTemperature'),
            'outsideTemperature': $('#formOutsideTemperature'),
            'atmosphere': $('#formAtmosphere'),
            'pressure': $('#formPressure'),
            'secure': $('#formSecure'),
            'capacityType': $('#formCapacityType'),
            'height': $('#formHeight'),
            'diameter': $('#formDiameter'),
            'minimal': $('#formMinimalLevel'),
            'maximum': $('#formMaximumLevel'),
            'pipeHeight': $('#formPipeHeight'),
            'wallOffset': $('#formWallOffset'),
            'capacity': $('#formCapacitySize'),
            'electricRequirement': $('#formElectricRequirement'),
            'outputSignalType': $('#formOutputSignalType'),
            'fillType': $('#formFillType'),
            'specialities': $('#formSpecialities')
        };



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
    body.on('click','input[type=radio] + label', function () {
        let link = '/catalog/' + $(this).data('category'),
            slug = $(this).data('category');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[type="hidden"]').val()
            }
        });
        $.ajax({
            url: link,
            data:{slug: slug}
        }).done(function (data) {
            $('#productsItems').html(data);
        }).fail(function () {
            alert('Невозможно отобразить');
        });
    });
    paginate('#productsItems');

    $('#sendOrder').on('click', function () {
        fd.append('name', orderMessage.name.val());
        fd.append('email', orderMessage.email.val());
        fd.append('phone', orderMessage.phone.val());
        fd.append('company', orderMessage.company.val());
        fd.append('message', orderMessage.message.val());
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[type="hidden"]').val()
            }
        });
        $.ajax({
            url: '/send-order',
            type: 'POST',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function (response) {
                orderModal.modal('hide');
                $('.modal-backdrop').hide();
                toastr.success(response.success);
                $('#orderForm').find('input:not([type=hidden])').each(function () {
                    $(this).val('').blur();
                });
                $('#orderForm').find('textarea').each(function () {
                    $(this).val('').blur();
                });
            },
            error: function(error) {
                for(let err in error.responseJSON.errors ) {
                    toastr.error(error.responseJSON.errors[err][0]);
                }
            }
        });
    });

    $('#sendInterview').on('click', function () {
            vd.append('name', interviewMessage.name.val());
            vd.append('phone', interviewMessage.phone.val());
            vd.append('email', interviewMessage.email.val());
            vd.append('company', interviewMessage.company.val());
            vd.append('product', interviewMessage.product.val());
            vd.append('count', interviewMessage.count.val());
            vd.append('environment', interviewMessage.environment.val());
            vd.append('concentrate', interviewMessage.concentrate.val());
            vd.append('viscosity', interviewMessage.viscosity.val());
            vd.append('dielectricConstant', interviewMessage.dielectricConstant.val());
            vd.append('granuleSize', interviewMessage.granuleSize.val());
            vd.append('weightDensity', interviewMessage.weightDensity.val());
            vd.append('unitType', interviewMessage.unitType.val());
            vd.append('insideTemperature', interviewMessage.insideTemperature.val());
            vd.append('outsideTemperature',interviewMessage.outsideTemperature.val());
            vd.append('atmosphere', interviewMessage.atmosphere.val());
            vd.append('pressure', interviewMessage.pressure.val());
            vd.append('secure', interviewMessage.secure.val());
            vd.append('capacityType', interviewMessage.capacityType.val());
            vd.append('height', interviewMessage.height.val());
            vd.append('diameter', interviewMessage.diameter.val());
            vd.append('minimal', interviewMessage.minimal.val());
            vd.append('maximum', interviewMessage.maximum.val());
            vd.append('pipeHeight', interviewMessage.pipeHeight.val());
            vd.append('wallOffset', interviewMessage.wallOffset.val());
            vd.append('capacity', interviewMessage.capacity.val());
            vd.append('electricRequirement', interviewMessage.electricRequirement.val());
            vd.append('outputSignalType', interviewMessage.outputSignalType.val());
            vd.append('fillType', interviewMessage.fillType.val());
            vd.append('specialities', interviewMessage.specialities.val());

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('#collapseSeven').find('input[type="hidden"]').val()
            }
        });
        $.ajax({
            url: '/send-interview',
            type: 'POST',
            data: vd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function (response) {
                $('#collapseSeven').find('input:not([type=hidden])').each(function () {
                    $(this).val('').blur();
                });
                toastr.success(response.success);
            },
            error: function(error) {
                for(let err in error.responseJSON.errors ) {
                    toastr.error(error.responseJSON.errors[err][0]);
                }
            }
        });
    });

    $('#sendFromContact').on('click', function () {
        cd.append('name', contactMessage.name.val());
        cd.append('email', contactMessage.email.val());
        cd.append('phone', contactMessage.phone.val());
        cd.append('company', contactMessage.company.val());
        cd.append('message', contactMessage.message.val());
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[type="hidden"]').val()
            }
        });
        $.ajax({
            url: '/send-message',
            type: 'POST',
            data: cd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function (response) {
                toastr.success(response.success);
                $('#contactPageForm').find('input:not([type=hidden])').each(function () {
                    $(this).val('').blur();
                });
                $('#contactPageForm').find('textarea').each(function () {
                    $(this).val('').blur();
                });

            },
            error: function(error) {
                for(let err in error.responseJSON.errors ) {
                    toastr.error(error.responseJSON.errors[err][0]);
                }
            }
        });
    });




});