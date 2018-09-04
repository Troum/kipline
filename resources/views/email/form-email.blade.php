@component('mail::message')
    @component('mail::panel')
        <strong style="text-transform: uppercase">Ф.И.О. заполнившего: </strong> {{$name}}<br>
        <strong style="text-transform: uppercase">Номер телефона заполнившего: </strong> {{$phone}}<br>
        <strong style="text-transform: uppercase">E-mail заполнившего: </strong> {{$email}}<br>
        @if(empty($company))
        @else
            <strong style="text-transform: uppercase">Компания заполнившего: </strong>{{$company}} <br>
        @endif
        <strong style="text-transform: uppercase">Наименование прибора: </strong> {{$product}}<br>
        <strong style="text-transform: uppercase">Количество единиц: </strong> {{$count}}<br>
        <strong style="text-transform: uppercase">ОСНОВНЫЕ ДАННЫЕ ПО ПРОЦЕССУ ИЗМЕРЕНИЯ</strong> <br>
        @if(empty($environment))
        @else
            <strong style="text-transform: uppercase">Среда работы: </strong> {{$environment}}<br>
        @endif
        @if(empty($concentrate))
        @else
            <strong style="text-transform: uppercase">Концентрация: </strong> {{$concentrate}}<br>
        @endif
        @if(empty($viscosity))
        @else
            <strong style="text-transform: uppercase">Вязкость: </strong> {{$viscosity}}<br>
        @endif
        @if(empty($dielectricConstant))
        @else
            <strong style="text-transform: uppercase">Диэлектрическая постоянная среды: </strong> {{$dielectricConstant}}<br>
        @endif
        @if(empty($granuleSize))
        @else
            <strong style="text-transform: uppercase">Размер гранул: </strong> {{$granuleSize}}<br>
        @endif
        @if(empty($weightDensity))
        @else
            <strong style="text-transform: uppercase">Удельный вес/плотность: </strong> {{$weightDensity}}<br>
        @endif
        @if(empty($unitType))
        @else
            <strong style="text-transform: uppercase">Тип соединения: </strong> {{$unitType}}<br>
        @endif
        @if(empty($insideTemperature))
        @else
            <strong style="text-transform: uppercase">Температура внутри резервуара: </strong> {{$insideTemperature}}<br>
        @endif
        @if(empty($outsideTemperature))
        @else
            <strong style="text-transform: uppercase">Температура снаружи резервуара: </strong> {{$outsideTemperature}}<br>
        @endif
        @if(empty($atmosphere))
        @else
            <strong style="text-transform: uppercase">Атмосфера опасная/Ex: </strong> {{$atmosphere}}<br>
        @endif
        @if(empty($pressure))
        @else
            <strong style="text-transform: uppercase">Давление: </strong> {{$pressure}}<br>
        @endif
        @if(empty($secure))
        @else
            <strong style="text-transform: uppercase">Защита (по IP)</strong> {{$secure}}<br>
        @endif
        <strong style="text-transform: uppercase" class="main">данные по месту установки прибора и ёмкости</strong> <br>
        @if(empty($capacityType))
        @else
            <strong style="text-transform: uppercase">Характеристика ёмкости: </strong> {{$capacityType}}<br>
        @endif
        @if(empty($height))
        @else
            <strong style="text-transform: uppercase">Высота ёмкости: </strong> {{$height}}<br>
        @endif
        @if(empty($diameter))
        @else
            <strong style="text-transform: uppercase">Диаметр ёмкости: </strong> {{$diameter}}<br>
        @endif
        @if(empty($minimal))
        @else
            <strong style="text-transform: uppercase">Минимальный уровень: </strong> {{$minimal}}<br>
        @endif
        @if(empty($maximum))
        @else
            <strong style="text-transform: uppercase">Максимальный уровень: </strong> {{$maximum}}<br>
        @endif
        @if(empty($pipeHeight))
        @else
            <strong style="text-transform: uppercase">Высота патрубка: </strong> {{$pipeHeight}}<br>
        @endif
        @if(empty($wallOffset))
        @else
            <strong style="text-transform: uppercase">Смещение от стенки: </strong> {{$wallOffset}}<br>
        @endif
        @if(empty($capacity))
        @else
            <strong style="text-transform: uppercase">Размер ёмкости, если не цилиндрическая: </strong> {{$capacity}}<br>
        @endif
        @if(empty($electricRequirement))
        @else
            <strong style="text-transform: uppercase">Требования по электропитанию: </strong> {{$electricRequirement}}<br>
        @endif
        @if(empty($outputSignalType))
        @else
            <strong style="text-transform: uppercase">Выходной сигнал: </strong> {{$outputSignalType}}<br>
        @endif
        @if(empty($fillType))
        @else
            <strong style="text-transform: uppercase">Тип наполнения: </strong> {{$fillType}}<br>
        @endif
        @if(empty($specialities))
        @else
            <strong style="text-transform: uppercase">Тип наполнения: </strong> {{$specialities}}<br>
        @endif
    @endcomponent
@endcomponent
