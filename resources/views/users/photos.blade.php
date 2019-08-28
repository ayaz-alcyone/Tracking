@extends('layouts.header')
@section('content')
<!-- Start Body -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 photosMain">
            <!-- Photos Section -->
            <section class="mt-4 mb-4 photosWrapper">
                @php
                    $photos = array();
                    foreach(session('company_info')->resultado->viajes as $val) {
                        $photos[] = $val->FotoEntrega;
                    }

                    foreach($photos as $val) {
                        if(!empty($val)){
                            foreach($val as $value){
                                $date = preg_split ("/\ /", $value->Date);
                                echo '<div class="imageBlock d-inline-block mb-2 mr-1 text-left">
                                            <div>
                                                <img src="'.$value->URL.'" alt="truck1.png">
                                            </div>
                                            <p class="mt-2 mb-0 pl-2 pr-2"><span class="fa fa-calendar textPrimary mr-2"></span> <span class="textDark">'.$date[0].'</span></p>
                                            <p class="mt-1 location pl-2 pr-2 mb-2"><span class="fa fa-map-marker textPrimary mr-2"></span> <span class="textDark">'.$value->Latitud.'/'.$value->Longitud.' </span></p>
                                            <div class="mt-1 location pl-2 pr-2 mb-2 textDark place">'.$value->Place.'</div>
                                        </div>';
                            }
                        }
                    }
                @endphp
                <!-- <div class="imageBlock d-inline-block mb-2 text-left">
                    <div>
                        <img src="{{ asset('images/truck_images/truck1.png') }}" alt="truck1.png">
                    </div>
                    <p class="mt-2 mb-0 pl-2 pr-2"><span class="fa fa-calendar textPrimary mr-2"></span> <span class="textDark">Monday 30/03/2019 9.14</span></p>
                    <p class="mt-1 location pl-2 pr-2 mb-2"><span class="fa fa-map-marker textPrimary mr-2"></span> <span class="textDark">99.000234/-101.3456, Gas</span></p>
                </div>

                <div class="imageBlock d-inline-block mb-2 text-left">
                    <div>
                        <img src="{{ asset('images/truck_images/truck2.png') }}" alt="truck1.png">
                    </div>
                    <p class="mt-2 mb-0 pl-2 pr-2"><span class="fa fa-calendar textPrimary mr-2"></span> <span class="textDark">Monday 30/03/2019 9.14</span></p>
                    <p class="mt-1 location pl-2 pr-2 mb-2"><span class="fa fa-map-marker textPrimary mr-2"></span> <span class="textDark">99.000234/-101.3456, Gas</span></p>
                </div>

                <div class="imageBlock d-inline-block mb-2 text-left">
                    <div>
                        <img src="{{ asset('images/truck_images/truck3.png') }}" alt="truck1.png">
                    </div>
                    <p class="mt-2 mb-0 pl-2 pr-2"><span class="fa fa-calendar textPrimary mr-2"></span> <span class="textDark">Monday 30/03/2019 9.14</span></p>
                    <p class="mt-1 location pl-2 pr-2 mb-2"><span class="fa fa-map-marker textPrimary mr-2"></span> <span class="textDark">99.000234/-101.3456, Gas</span></p>
                </div>

                <div class="imageBlock d-inline-block mb-2 text-left">
                    <div>
                        <img src="{{ asset('images/truck_images/truck4.png') }}" alt="truck1.png">
                    </div>
                    <p class="mt-2 mb-0 pl-2 pr-2"><span class="fa fa-calendar textPrimary mr-2"></span> <span class="textDark">Monday 30/03/2019 9.14</span></p>
                    <p class="mt-1 location pl-2 pr-2 mb-2"><span class="fa fa-map-marker textPrimary mr-2"></span> <span class="textDark">99.000234/-101.3456, Gas</span></p>
                </div>
                <div class="imageBlock d-inline-block mb-2 text-left">
                    <div>
                        <img src="{{ asset('images/truck_images/truck5.png') }}" alt="truck1.png">
                    </div>
                    <p class="mt-2 mb-0 pl-2 pr-2"><span class="fa fa-calendar textPrimary mr-2"></span> <span class="textDark">Monday 30/03/2019 9.14</span></p>
                    <p class="mt-1 location pl-2 pr-2 mb-2"><span class="fa fa-map-marker textPrimary mr-2"></span> <span class="textDark">99.000234/-101.3456, Gas</span></p>
                </div>
                <div class="imageBlock d-inline-block mb-2 text-left">
                    <div>
                        <img src="{{ asset('images/truck_images/truck6.png') }}" alt="truck1.png">
                    </div>
                    <p class="mt-2 mb-0 pl-2 pr-2"><span class="fa fa-calendar textPrimary mr-2"></span> <span class="textDark">Monday 30/03/2019 9.14</span></p>
                    <p class="mt-1 location pl-2 pr-2 mb-2"><span class="fa fa-map-marker textPrimary mr-2"></span> <span class="textDark">99.000234/-101.3456, Gas</span></p>
                </div>
                <div class="imageBlock d-inline-block mb-2 text-left">
                    <div>
                        <img src="{{ asset('images/truck_images/truck7.png') }}" alt="truck1.png">
                    </div>
                    <p class="mt-2 mb-0 pl-2 pr-2"><span class="fa fa-calendar textPrimary mr-2"></span> <span class="textDark">Monday 30/03/2019 9.14</span></p>
                    <p class="mt-1 location pl-2 pr-2 mb-2"><span class="fa fa-map-marker textPrimary mr-2"></span> <span class="textDark">99.000234/-101.3456, Gas</span></p>
                </div>
                <div class="imageBlock d-inline-block mb-2 text-left">
                    <div>
                        <img src="{{ asset('images/truck_images/truck8.png') }}" alt="truck1.png">
                    </div>
                    <p class="mt-2 mb-0 pl-2 pr-2"><span class="fa fa-calendar textPrimary mr-2"></span> <span class="textDark">Monday 30/03/2019 9.14</span></p>
                    <p class="mt-1 location pl-2 pr-2 mb-2"><span class="fa fa-map-marker textPrimary mr-2"></span> <span class="textDark">99.000234/-101.3456, Gas</span></p>
                </div>
                <div class="imageBlock d-inline-block mb-2 text-left">
                    <div>
                        <img src="{{ asset('images/truck_images/truck9.png') }}" alt="truck1.png">
                    </div>
                    <p class="mt-2 mb-0 pl-2 pr-2"><span class="fa fa-calendar textPrimary mr-2"></span> <span class="textDark">Monday 30/03/2019 9.14</span></p>
                    <p class="mt-1 location pl-2 pr-2 mb-2"><span class="fa fa-map-marker textPrimary mr-2"></span> <span class="textDark">99.000234/-101.3456, Gas</span></p>
                </div>
                <div class="imageBlock d-inline-block mb-2 text-left">
                    <div>
                        <img src="{{ asset('images/truck_images/truck10.pn') }}g" alt="truck1.png">
                    </div>
                    <p class="mt-2 mb-0 pl-2 pr-2"><span class="fa fa-calendar textPrimary mr-2"></span> <span class="textDark">Monday 30/03/2019 9.14</span></p>
                    <p class="mt-1 location pl-2 pr-2 mb-2"><span class="fa fa-map-marker textPrimary mr-2"></span> <span class="textDark">99.000234/-101.3456, Gas</span></p>
                </div>
                <div class="imageBlock d-inline-block mb-2 text-left">
                    <div>
                        <img src="{{ asset('images/truck_images/truck11.pn') }}g" alt="truck1.png">
                    </div>
                    <p class="mt-2 mb-0 pl-2 pr-2"><span class="fa fa-calendar textPrimary mr-2"></span> <span class="textDark">Monday 30/03/2019 9.14</span></p>
                    <p class="mt-1 location pl-2 pr-2 mb-2"><span class="fa fa-map-marker textPrimary mr-2"></span> <span class="textDark">99.000234/-101.3456, Gas</span></p>
                </div>
                <div class="imageBlock d-inline-block mb-2 text-left">
                    <div>
                        <img src="{{ asset('images/truck_images/truck12.pn') }}g" alt="truck1.png">
                    </div>
                    <p class="mt-2 mb-0 pl-2 pr-2"><span class="fa fa-calendar textPrimary mr-2"></span> <span class="textDark">Monday 30/03/2019 9.14</span></p>
                    <p class="mt-1 location pl-2 pr-2 mb-2"><span class="fa fa-map-marker textPrimary mr-2"></span> <span class="textDark">99.000234/-101.3456, Gas</span></p>
                </div>
                <div class="imageBlock d-inline-block mb-2 text-left">
                    <div>
                        <img src="{{ asset('images/truck_images/truck13.pn') }}g" alt="truck1.png">
                    </div>
                    <p class="mt-2 mb-0 pl-2 pr-2"><span class="fa fa-calendar textPrimary mr-2"></span> <span class="textDark">Monday 30/03/2019 9.14</span></p>
                    <p class="mt-1 location pl-2 pr-2 mb-2"><span class="fa fa-map-marker textPrimary mr-2"></span> <span class="textDark">99.000234/-101.3456, Gas</span></p>
                </div>
                <div class="imageBlock d-inline-block mb-2 text-left">
                    <div>
                        <img src="{{ asset('images/truck_images/truck14.pn') }}g" alt="truck1.png">
                    </div>
                    <p class="mt-2 mb-0 pl-2 pr-2"><span class="fa fa-calendar textPrimary mr-2"></span> <span class="textDark">Monday 30/03/2019 9.14</span></p>
                    <p class="mt-1 location pl-2 pr-2 mb-2"><span class="fa fa-map-marker textPrimary mr-2"></span> <span class="textDark">99.000234/-101.3456, Gas</span></p>
                </div>
                <div class="imageBlock d-inline-block mb-2 text-left">
                    <div>
                        <img src="{{ asset('images/truck_images/truck15.pn') }}g" alt="truck1.png">
                    </div>
                    <p class="mt-2 mb-0 pl-2 pr-2"><span class="fa fa-calendar textPrimary mr-2"></span> <span class="textDark">Monday 30/03/2019 9.14</span></p>
                    <p class="mt-1 location pl-2 pr-2 mb-2"><span class="fa fa-map-marker textPrimary mr-2"></span> <span class="textDark">99.000234/-101.3456, Gas</span></p>
                </div> -->
            </section>
        </div>
    </div>
</div>
</div>

<script>
$(document).ready(function() {
    // For navigation bar
    $(".navbar-nav .custom-nav-item:nth-child(3)").css({
        'border-bottom': '3px solid #ff6d00'
    });
    $(".navbar-nav .custom-nav-item:nth-child(3) .nav-link").css({
        'color': '#ff6d00',
    });

    $(".custom-nav-item").click(function() {
        $(".navbar-nav .custom-nav-item").css({
            'border-bottom': '3px solid transparent'
        });
        $(".navbar-nav .custom-nav-item .nav-link").css({
            'color': '#747474',
        });
        $(this).css("border-bottom", "3px solid #ff6d00");
        $(this).find('.custom-nav-item').css("color", "#ff6d00");
    });
});
</script>
@endsection