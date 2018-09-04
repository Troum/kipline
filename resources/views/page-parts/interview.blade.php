<div class="card card-ecommerce">
    <div class="card-header pl-0" role="tab" id="headingSeven">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
            <h5 class="mb-0 crimson-text">
                Опросный лист
                <i class="fa fa-angle-down rotate-icon"></i>
            </h5>
        </a>
    </div>
    <div id="collapseSeven" class="collapse" role="tabpanel" aria-labelledby="headingSeven" data-parent="#accordion">
        <form>
            <input type="hidden" value="{{csrf_token()}}">
        <div class="dark-grey-text pl-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <input type="text" id="formInterviewName" name="formInterviewName" class="form-control" required>
                        <label for="formInterviewName"><small><span class="crimson-text">*</span>&nbsp;ФИО</small></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="formInterviewPhone" name="formInterviewPhone" class="form-control" required>
                        <label for="formInterviewPhone"><small><span class="crimson-text">*</span>&nbsp;Ваш номер телефона</small></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="email" id="formInterviewEmail" name="formInterviewEmail" class="form-control">
                        <label for="formInterviewEmail"><small>Ваш e-mail</small></label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <input type="text" id="formCompanyName" name="formCompanyName" class="form-control">
                        <label for="formCompanyName"><small>Название компании</small></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="formProductName" name="formProductName" class="form-control" required>
                        <label for="formProductName"><small><span class="crimson-text">*</span>&nbsp;Наименование прибора</small></label>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="md-form mb-0">
                        <input type="number" id="formProductCount" name="formProductCount" class="form-control" required>
                        <label for="formProductCount"><small><span class="crimson-text">*</span>&nbsp;Количество</small></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pt-3">
                    <p class="h6">Основные данные по процессу измерения</p>
                    <hr>
                </div>
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <p>Среда работы</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="formProductEnvironment" name="formProductEnvironment" class="form-control">
                        <label for="formProductEnvironment"><small>жидкая/твёрдая</small></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <p><small>(для химического реагента сообщите о его названии, химической формуле, концентрации)</small></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <p>Для жидкой:</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form mb-0">
                        <input type="text" id="formConcentrate" name="formConcentrate" class="form-control">
                        <label for="formConcentrate"><small>Концентрация</small></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form mb-0">
                        <input type="text" id="formViscosity" name="formViscosity" class="form-control">
                        <label for="formViscosity"><small>Вязкость (сСт)</small></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form mb-0">
                        <input type="text" id="formDielectricConstant" name="formDielectricConstant" class="form-control">
                        <label for="formDielectricConstant"><small>Диэлектр. константа</small></label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <p>Для твёрдой:</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="md-form mb-0">
                        <input type="text" id="formGranuleSize" name="formGranuleSize" class="form-control">
                        <label for="formGranuleSize"><small>Размер гранул</small></label>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="md-form mb-0">
                        <input type="text" id="formWeightDensity" name="formWeightDensity" class="form-control">
                        <label for="formWeightDensity"><small>Удельный вес/Плотность&nbsp;(кг/Дм<sup>3</sup>)</small></label>
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="md-form mb-0">
                        <select class="mdb-select" id="formUnitType" name="formUnitType">
                            <option class="crimson-text" value="резьбовое">резьбовое</option>
                            <option class="crimson-text" value="фланцевое">фланцевое</option>
                        </select>
                        <label for="formUnitType">Вид соединения</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <input type="text" id="formInsideTemperature" name="formInsideTemperature" class="form-control">
                        <label for="formInsideTemperature"><small>Температура внутри резервуара, &#8451;</small></label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <input type="text" id="formOutsideTemperature" name="formOutsideTemperature" class="form-control">
                        <label for="formOutsideTemperature"><small>Температура окружающей среды, &#8451;</small></label>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="md-form mb-0">
                        <input type="text" id="formAtmosphere" name="formAtmosphere" class="form-control">
                        <label for="formAtmosphere"><small>Атмосфера опасная/Ex</small></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form mb-0">
                        <input type="text" id="formPressure" name="formPressure" class="form-control">
                        <label for="formPressure"><small>Давление (бар)</small></label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="md-form mb-0">
                        <input type="text" id="formSecure" name="formSecure" class="form-control">
                        <label for="formSecure"><small>Защита (по IP)</small></label>
                    </div>
                </div>
                <div class="col-md-12 pt-3">
                    <p class="h6">Данные по месту установки прибора и ёмкости</p>
                    <hr>
                </div>
                <div class="col-md-6">
                    <div class="row m-0 p-0">
                        <div class="col-md-12 m-0 p-0">
                            <div class="md-form mb-0">
                                <select class="mdb-select" id="formCapacityType" name="formCapacityType" required>
                                    <option value="открытая">открытая</option>
                                    <option value="закрытая">закрытая</option>
                                    <option value="вертикальная">вертикальная</option>
                                    <option value="горизонтальная">горизонтальная</option>
                                    <option value="пластиковая">пластиковая</option>
                                    <option value="металлическая">металлическая</option>
                                </select>
                                <label for="formCapacityType"><span class="crimson-text">*</span>&nbsp;Характеристика ёмкости</label>
                            </div>
                        </div>
                        <div class="col-md-12 m-0 p-0">
                            <div class="md-form mb-0">
                                <input type="text" id="formHeight" name="formHeight" class="form-control">
                                <label for="formHeight"><small>А - высота ёмкости</small></label>
                            </div>
                        </div>
                        <div class="col-md-12 m-0 p-0">
                            <div class="md-form mb-0">
                                <input type="text" id="formDiameter" name="formDiameter" class="form-control">
                                <label for="formDiameter"><small>Б - диаметр ёмкости</small></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row m-0 p-0">
                        <div class="col-md-12">
                            <img src="{{asset('images/brief/1.jpg')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="formMinimalLevel" name="formMinimalLevel" class="form-control">
                        <label for="formMinimalLevel"><small>В - минимальный уровень</small></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="formMaximumLevel" name="formMaximumLevel" class="form-control">
                        <label for="formMaximumLevel"><small>Г - максимальный уровень</small></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="formPipeHeight" name="formPipeHeight" class="form-control">
                        <label for="formPipeHeight"><small>Д - высота патрубка</small></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="formWallOffset" name="formWallOffset" class="form-control">
                        <label for="formWallOffset"><small>Е - смещение от стенки</small></label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <input type="text" id="formCapacitySize" name="formCapacitySize" class="form-control">
                        <label for="formCapacitySize"><small>A&times;B&times;C - размер ёмкости (если не цилиндрическая)</small></label>
                    </div>
                </div>
                <div class="col-md-12 pt-3">
                    <p class="h6">Требования по применению</p>
                    <hr>
                </div>
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <input type="text" id="formElectricRequirement" name="formElectricRequirement" class="form-control">
                        <label for="formElectricRequirement"><small>Требования по электрическому питанию</small></label>
                    </div>
                </div>
                <div class="col-md-6 m-0 p-3">
                    <div class="md-form mb-0">
                        <select class="mdb-select" id="formOutputSignalType" name="formOutputSignalType">
                            <option value="аналаговый выход">аналаговый выход</option>
                            <option value="поддержка HART">поддержка HART</option>
                            <option value="релейный выход">релейный выход</option>
                            <option value="цифровой выход">цифровой выход</option>
                        </select>
                        <label for="formOutputSignalType">Выходной сигнал</label>
                    </div>
                </div>
                <div class="col-md-6 m-0 p-3">
                    <div class="md-form mb-0">
                        <select class="mdb-select" id="formFillType" name="formFillType">
                            <option value="свыше уровня">свыше уровня</option>
                            <option value="с горкой">с горкой</option>
                        </select>
                        <label for="formFillType">Тип наполнения</label>
                    </div>
                </div>
                <div class="col-md-12 m-0 pb-0">
                    <div class="md-form mb-0">
                        <p>Особенности</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="md-form mb-0 mt-0">
                        <input type="text" id="formSpecialities" name="formSpecialities" class="form-control">
                        <label for="formSpecialities"><small>(среднее/значительное пар или грязь, волны или пена, мешалка/шум)</small></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <button type="button" class="btn btn-sm btn-crimson btn-rounded float-left" data-dismiss="modal" id="sendInterview">Отправить анкету</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>