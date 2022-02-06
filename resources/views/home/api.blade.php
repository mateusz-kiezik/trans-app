@extends('layout.main')

@section('content')
<style>
    .autocomplete-container {
        /*the container must be positioned relative:*/
        position: relative;
    }

    .autocomplete-container input {
        width: calc(100% - 43px);
        outline: none;

        border: 1px solid rgba(0, 0, 0, 0.2);
        padding: 10px;
        padding-right: 31px;
        font-size: 16px;
    }

    .autocomplete-items {
        position: absolute;
        border: 1px solid rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 10px 2px rgba(0, 0, 0, 0.1);
        border-top: none;
        background-color: #fff;

        z-index: 99;
        top: calc(100% + 2px);
        left: 0;
        right: 0;
    }

    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
    }

    .autocomplete-items div:hover {
        /*when hovering an item:*/
        background-color: rgba(0, 0, 0, 0.1);
    }
</style>


    <div class="container">


        <div class="autocomplete-container" id="autocomplete-container"></div>
{{--            <input class="autocomplete-input" type="text">--}}









{{--        <br>--}}
{{--        <br>--}}
{{--        <br>--}}
{{--        <br>--}}
{{--        <br>--}}
{{--        <br>--}}
{{--        <br>--}}
{{--        <br>--}}
{{--        <div class="form-group">--}}
{{--            <label class="form-label" for="country">Country: </label>--}}
{{--            <input id="country" name="country" onkeydown="pressEnter(this.id)">--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label class="form-label" for="postcode">Postcode: </label>--}}
{{--            <input id="postcode" name="postcode" onkeydown="pressEnter(this.id)">--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label class="form-label" for="city">City: </label>--}}
{{--            <input id="city" name="city" onkeydown="pressEnter(this.id)">--}}
{{--        </div>--}}


{{--        <div class="spinner-border"--}}
{{--             role="status" id="loading">--}}
{{--            <span class="sr-only">Loading...</span>--}}
{{--        </div>--}}
    </div>


@endsection
