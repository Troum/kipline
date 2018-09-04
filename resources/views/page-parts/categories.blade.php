<form id="categoriesContainer">
    {{csrf_field()}}
    <div class="form-group">
        <input name="group100" type="radio" id="all" checked>
        <label for="all" class="dark-grey-text" data-category="all">Все</label>
    </div>
    <div class="form-group">
        <input name="group100" type="radio" id="level">
        <label for="level" class="dark-grey-text" data-category="level">Датчики уровня</label>
    </div>
    <div class="form-group">
        <input name="group100" type="radio" id="signal">
        <label for="signal" class="dark-grey-text" data-category="signal">Сигнализаторы уровня</label>
    </div>
    <div class="form-group">
        <input name="group100" type="radio" id="sensor">
        <label for="sensor" class="dark-grey-text" data-category="sensor">Датчики температуры</label>
    </div>
    <div class="form-group">
        <input name="group100" type="radio" id="analyzer">
        <label for="analyzer" class="dark-grey-text" data-category="analyzer">Аналитика</label>
    </div>
    <div class="form-group">
        <input name="group100" type="radio" id="industrial">
        <label for="industrial" class="dark-grey-text" data-category="industrial">Промышленные датчики</label>
    </div>
    {{--<div class="form-group">--}}
        {{--<input name="group100" type="radio" id="system">--}}
        {{--<label for="system" class="dark-grey-text" data-category="system">Системные компоненты</label>--}}
    {{--</div>--}}
</form>