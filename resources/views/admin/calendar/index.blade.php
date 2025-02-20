@extends('admin.layout.layout')

@section('title', $title)

@section('content')
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Pricing Options</h1>
            <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

        </div>
    </div>
    <!-- /. ROW  -->


    @for ($week = 0; $week <= 5; $week++)    {{-- больше пяти недель не бывает в месяце --}}
    <div class="row text-center pad-row">
        @for ($day = 1; $day <= 7; $day++)
            @php
                $currentDay = $week * 7 + $day;
                if ($currentDay > 31) break;    // Если превысили 31 день — выходим
            @endphp

            <div class="col-md-1">
                <div class="panel-info simple-table">
                    <div class="panel-heading">
                        <h4>День {{ $currentDay }}</h4>
                    </div>
                    <div class="">
                        <ul class="plan">
                            <li class="price-simple"><strong>{{ $currentDay }}</strong></li>
                            <li><strong>3</strong> События</li>
                        </ul>
                        <a href="#" class="btn btn-info ">Подробнее</a>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    @endfor



</div>
<!-- /. PAGE INNER  -->

@endsection
