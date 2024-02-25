@extends('layout.main')
@section('title', 'Cats')
@section('content')
    <article class="location">
        <div class="container">
            <div class="geolocation">
                <div class="geolocation__request">
                    <h1 class="geolocation__title">Получить информацию</h1>
                    <form class="form-geolocation form-location" id="form_location" method="POST"
                          action="/geolocations">
                        @method('POST')
                        @csrf
                        <div class="field">
                            <label for="geocode">Введите адрес для получения информации<span
                                    class="required-field input-field">*</span></label>
                            <input type="text" name="geocode" class="form-geolocation__input obligatory" id="geocode" {{ old('geocode') }}/>
                        </div>
                        <div class="form-geolocation__wrap">
                            <div class="form-geolocation__spinner-wrap">
                                <div class="form-geolocation__spinner">
                                    <button id="form_location_submit" type="submit"
                                            class="form-geolocation__btn validateBtn">
                                        Отправить
                                    </button>
                                    <div class="preloader">
                                        <span class="submit-spinner submit-spinner_hide"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <h3 class="geolocation__text">Ответ на ваш запрос:</h3>
                    <div class="form-geolocation__result" id="displayData"></div>
                </div>
            </div>
        </div>
    </article>
@endsection
