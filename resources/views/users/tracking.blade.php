@extends('layouts.header')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-2 pl-0 pr-0">
                <section class="trackingLeftSection">
                    <div class="trackingItems pt-2 pb-2 position-relative">
                        <img src="{{ asset('images/SelectedTrucks.svg') }}" alt="SelectedTrucks.svg" class="pl-2">
                        <span class="textDark pl-3">{{ __('messages.tracking.trucks') }}</span>
                    </div>
                    <div class="trackingItems pt-2 pb-2" onclick="warehouses('default', null, null)">
                        <img src="{{ asset('images/UnselectedWarehouses.svg') }}" alt="SelectedWarehouses.svg" class="pl-2">
                        <span class="textDark pl-3">{{ __('messages.tracking.warehouses') }}</span>
                    </div>
                    <div class="trackingItems pt-2 pb-2">
                        <img src="{{ asset('images/UnselectedDestinations.svg') }}" alt="SelectedDestinations.svg" class="pl-2">
                        <span class="textDark pl-3">{{ __('messages.tracking.destinations') }}</span>
                    </div>

                    <div class="trackingFilters topTrackingFilters ml-3 mr-3 ">
                        <p class="textPrimary font-weight-bold pl-0 pt-3 filters mb-0">{{ __('messages.tracking.filters') }}</p>
                        <div class="form-group filtersWrapper position-relative">
                            <select class="form-control trucks" id="sel1">
                                <option value="typeVehicles">{{ __('messages.tracking.filterOptions.typeVehicle') }}</option>
                                <option value="stateTrucks">{{ __('messages.tracking.filterOptions.stateTruck') }}</option>                                
                                <option value="trips">{{ __('messages.tracking.filterOptions.trip') }}</option>
                                <option value="SizeTruckShow">{{ __('messages.tracking.truckInfoList.size') }}</option>
                            </select>                            
                        </div>
                        <div id="filterAll">
                            <div class="checkbox-group mb-0">
                                <input type="hidden" value="filterAll" class="filterName">
                                <input type="checkbox" id="filterAll2" checked="checked" class="active filterAll">
                                <label for="filterAll2" class="mb-0">All</label>
                            </div>
                        </div>
                        <div class="pt-2" id="textPanel"></div>
                    </div>
                    <hr class="mt-0 mb-0 textDark">
                    <div class="colors ml-3 mr-3">
                        <p class="textPrimary font-weight-bold pl-0 pt-3 filters">{{ __('messages.tracking.color') }}</p>
                        <div class="colorBoxes"></div>
                    </div>
                    <hr class="mb-0 textDark">
                    <div class="trackingFilters bottomTrackingFilters ml-3 mr-3">
                        <p class="textPrimary font-weight-bold pl-0 pt-3 filters mb-0">{{ __('messages.tracking.text') }}</p>
                        <button class="accordion textDark trucks pt-2 pb-1">{{ __('messages.tracking.trucks') }}</button>
                        <div class="panel pt-2">
                        <div class="checkbox-group mb-0">
                            <input type="checkbox" id="TypeVehicle2" checked="checked" class="active">
                            <label for="TypeVehicle2">{{ __('messages.tracking.filterOptions.typeVehicle') }}</label>
                        </div>
                        <div class="checkbox-group mb-0">
                            <input type="checkbox" id="StateTruck2" checked="checked" class="active">
                            <label for="StateTruck2">{{ __('messages.tracking.filterOptions.stateTruck') }}</label>
                        </div>
                        <div class="checkbox-group mb-0">
                            <input type="checkbox" id="TrucksDriver" checked="checked" class="active">
                            <label for="TrucksDriver">{{ __('messages.tracking.filterOptions.driver') }}</label>
                        </div>                        
                    </div>                                        
                </section>
            </div>

            <div class="col-sm-12 col-md-9 col-lg-10 pl-0 pr-0">
                <div class="w-100 h-100 mapWrapper">
                    <span class="fa fa-whatsapp icons"></span>
                    <span class="fa fa-envelope icons"></span>
                    <span class="fa fa-info icons"></span>
                    <div id="map"></div>
                    <!-- Whatsapp popup -->
                    <div class="whatsapp">
                        <div class="backSecondry textLight wheader">
                            <p class="fa fa-whatsapp d-inline"></p>
                            <p class="d-inline">{{ __('messages.tracking.newWhatsappMessage') }}</p>
                            <i class="fa fa-times float-right pt-1"></i>
                            <i class="fa fa-window-minimize float-right mr-3"></i>
                            <i class="fa fa-window-maximize float-right mr-3 pt-1"></i>
                        </div>
                        <div class="whatsappBody">
                            <form action="#">
                                <div class="form-group mb-0">
                                    <p class="d-inline to">{{ __('messages.tracking.newMessagesList.to') }}:</p>
                                    <input type="number" name="number" placeholder="+91 99 999 12456">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control border-0" rows="5" id="comment" name="message" placeholder="{{ __('messages.tracking.newMessagesList.typeYourMessage') }} . . ."></textarea>
                                </div>
                                <button class="btn btn-default backSecondry textLight mb-2">{{ __('messages.tracking.newMessagesList.send') }}</button>
                            </form>
                        </div>
                    </div>

                    <!-- Email popup -->
                    <div class="emailBox">
                        <div class="backSecondry textLight eheader">
                            <p class="fa fa-envelope d-inline"></p>
                            <p class="d-inline">{{ __('messages.tracking.newMessages') }}</p>
                            <i class="fa fa-times float-right pt-1"></i>
                            <i class="fa fa-window-minimize float-right mr-3"></i>
                            <i class="fa fa-window-maximize float-right mr-3 pt-1"></i>
                        </div>
                        <div class="emailBody">
                            <form action="#">
                                <div class="form-group mb-0">
                                    <p class="d-inline to">{{ __('messages.tracking.newMessagesList.to') }}:</p>
                                    <input type="email" name="number" placeholder="">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control border-0" rows="5" id="comment" name="message" placeholder="{{ __('messages.tracking.newMessagesList.typeYourMessage') }} . . ."></textarea>
                                </div>
                                <button class="btn btn-default backSecondry textLight mb-2">{{ __('messages.tracking.newMessagesList.send') }}</button>
                            </form>
                        </div>
                    </div>

                    <!-- Truck info -->
                    <div class="truckInfo">
                        <div class="backSecondry textLight theader">
                                <p class="d-none" id="truckInfo">{{ __('messages.tracking.truckInfo') }}</p>
                                <p class="d-none" id="destinationInfo">{{ __('messages.tracking.destinationInfo') }}</p>
                            <p class="d-inline infoHeading">{{ __('messages.tracking.truckInfo') }}</p>
                            <i class="fa fa-times float-right pt-1"></i>
                        </div>
                        <div class="truckBody">
                            <table class="w-100">
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.trip') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="trip3">2</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p id="sizeOFTruck">{{ __('messages.tracking.truckInfoList.sizeTruckShow') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="sizeTruckShow">176537</p>
                                        </div>
                                    </td>
                                </tr>                                
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.latitudMobility') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="latitudMobility">20.1</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.longitudMobility') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="longitudMobility">-19.23</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.lastDateMobility') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="lastDateMobility">2/7/2019 14:34</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.automaticDateTime') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="fechaHoraAutomaticasActivity">2/7/2019 14:34</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.gpsCoordinateAccuracy') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="exactitudcoordenadasActivity">25.59000015</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.gpsCoordinateAvailability') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="disponibilidadCoordenadasActivity">1</p>
                                        </div>
                                    </td>
                                </tr>                                                                
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.mockedActivity') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="mockedActivity">1</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.warehouseLeave') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="warehouseLeave">San Juan</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.latitudWarehouseLeave') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="latitudWarehouseLeave">20.1</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.longitudWarehouseLeave') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="longitudWarehouseLeave">-19.23</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.warehouseReturn') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="warehouseReturn">San Juan</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.latitudWarehouseReturn') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="latitudWarehouseReturn">20.1</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.longitudWarehouseReturn') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="longitudWarehouseReturn">-19.23</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.typeVehicle') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="typeVehicle3">FL360</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.stateTruck') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="stateTruck3">VerViaje</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.km_h') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="km_h">34.5</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.plateNumber') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="places">ABC-123</p>
                                        </div>
                                    </td>
                                </tr>
                                <!-- <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.numberTruck') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="numberTruck">1</p>
                                        </div>
                                    </td>
                                </tr> -->
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.maxWeight') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="maxWeight">4,950.00</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.maxVolume') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="maxVolume">15.88</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.maxCostMerchandise') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="maxCostMerchandise">15.88</p>
                                        </div>
                                    </td>
                                </tr>                                
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.km') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="km">123</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.cost') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="cost">$1,234</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.%_volume') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="_volume">23%</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.%_weight') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="_weight">23%</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p id="truckDriver2">{{ __('messages.tracking.truckInfoList.driver') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="driver3"></p>
                                        </div>
                                    </td>
                                </tr>  
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.driverRanking') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="driverRanking">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.contact') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="contact">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.actualWeight') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="actualWeight">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.actualVolume') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="actualVolume">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.actualCostMerchandise') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="actualCostMerchandise">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.numberDestinations') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="numberDestinations">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>                            
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.numberPackages') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="numberPackages">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.typePackages') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="typePackages">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.numberPieces') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="numberPieces">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.nextDestination') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="nextDestination">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.nextDestinationArrivalDate') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="nextDestinationArrivalDate">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.traveled_km') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="traveled_km">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.kmToGo') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="kmToGo">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.toDeliverNumberDestinations') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="toDeliverNumberDestinations">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.toDeliverNumberPackages') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="toDeliverNumberPackages">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.estimatedFinishRoute') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="estimatedFinishRoute">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.mailMessages') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="mailMessages">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForTruck">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.whatsappMessages') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="whatsappMessages">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Only for destinations -->
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.id') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="destinationId">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.latitudDestinationTR1') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="latitudDestinationTR1">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.longitudDestinationTR1') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="longitudDestinationTR1">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.lastDateMobility') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="destinationLastDateMobility">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.automaticDateTime') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="fechaHoraAutomaticasActivity">2/7/2019 14:34</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.gpsCoordinateAccuracy') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="exactitudcoordenadasActivity">25.59000015</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.gpsCoordinateAvailability') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="disponibilidadCoordenadasActivity">1</p>
                                        </div>
                                    </td>
                                </tr>                                                                                                                                 
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.mockedActivity') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="destinationMockedActivity">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.destinationTR1') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="destinationTR1">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.address') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="address">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.region') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="region">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.state') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="destinationState">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.city') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="destinationCity">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.finalDestinationTR2') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="finalDestinationTR2">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.latitudDestinationTR2') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="latitudDestinationTR2">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.longitudDestinationTR2') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="longitudDestinationTR2">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.receptionist') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="receptionist">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.contact') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="destinationContact">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.timeWindow') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="timeWindow">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.serviceDuration') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="serviceDuration">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.typePackages') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="destinationTypePackages">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.actualWeight') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="destinationActualWeight">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.actualVolume') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="destinationActualVolume">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.actualCostMerchandise') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="destinationActualCostMerchandise">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.numberPackages') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="destinationNumberPackages">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.numberPieces') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="destinationNumberPieces">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.delivery') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="delivery">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.truckInfoList.trip') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="trip3">2</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.sequence') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="sequence">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.stateDelivered') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="stateDelivered">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.pof') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="pof">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.pofOnTime') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="pofOnTime">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.pofComplete') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="pofComplete">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.pofNoDamage') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="pofNoDamage">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.pofDocsOk') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="pofDocsOk">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.mailMessages') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="destinationMailMessages">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="onlyForDestinations">
                                    <td>
                                        <div class="w-50 d-inline-block">
                                            <p>{{ __('messages.tracking.destinationInfoList.whatsappMessages') }}</p>
                                        </div>
                                        <div class="w-50 d-inline-block">
                                            <p id="destinationwhatsappMessages">Jane Lopez</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Info warning -->
                    <div class="infoWarning">
                        <p class="mb-0">{{ __('messages.tracking.pleaseSelcetAnyTruck') }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class='d-none' id="regionResponse">
    <span class="east">{{ __('messages.responseValues.east') }}</span>
    <span class="northWest">{{ __('messages.responseValues.northWest') }}</span>
    <span class="southWest">{{ __('messages.responseValues.southWest') }}</span>
</div>
{{-- {{ Session::get('locale')}} --}}
<?php
    $allInfo = session('company_info')->resultado;
    $routes = array();
    $realTrip = array();
    $allNodes = array();

    foreach(session('company_info')->resultado->viajes as $val) {
        $routes[] = $val;
    }
    
    foreach($routes as $val) {
        if($val->Planeado == 0){
            $realTrip[] = $val;
        }
        $allNodes[] = $val;
    }
?>
<script>
    var realTrip = <?php print_r(json_encode($realTrip)); ?>;
    var allInfo = <?php print_r(json_encode($allInfo)); ?>;
    var allNodes = <?php print_r(json_encode($allNodes)); ?>;
    var tabName = 'truck';
    var filterId;
    var selectFilter1 = 'typeVehicles';
    var selectFilter2 = 'regions';
    var checkedCondition = {};
    var filterUnique = 1; 
    var filters = [];
    var filterName2 = '';
    var filterVal2 = '';
    var globalTruckColor1 = 'default';
    var globalDestinationColor1 = 'default';
    var filtersInfo = [];
    var truckFilters = {
        'typeVehicle': 1,
        'stateTruck' : 1,
        'driver'     : 1,
        'trip'       : 1,
    };
    var truckText = {
        'typeVehicle': 1,
        'stateTruck' : 1,
        'driver'     : 1  
    }
    var destinationText = {
        'state'     : 1,
        'city'      : 1,
        'sequence'  : 1, 
        'trip'      : 1, 
    };
    
    $(document).ready(function() {
        $("#trackingLink").trigger("click");

        // For color boxes.
        let colors = ['red', 'navy', 'green', 'greenyellow', 'yellowgreen', 'gray', 'lightgray', 'cyan', 'greenyellow', 'navy', 'green', 'dodgerblue', 'yellowgreen', 'gray', 'lightgray', 'lightblue', 'orange', 'purple', 'black', 'lightgreen', 'yellow', 'pink', 'skyblue', 'chocolate'];
        $.each(colors, function(key, val) {
            $(".colorBoxes").append(
                '<span style="background:' + val + '" class="' + val + '"></span>'
            );
        });
       
        // For tracking items hover effect.
        $(".trackingItems:first-child").css({
            'border-left': '4px solid #ff6d00',
            'background': '#f8f8f8'
        }).addClass('active');
        $(".trackingItems:first-child").find('span').removeClass('textDark').css({
            'color': '#ff6d00',
        });

        $(".trackingItems:first-child").click(function() {
            tabName = 'truck';
            $(".trackingItems").removeClass('active');
            $(this).addClass('active');
            $(".trackingItems").find('span').addClass('textDark');
            $(".trackingItems").css({
                'border-left': '4px solid transparent',
                'background': 'transparent'
            });
            $(this).find('span').removeClass('textDark').css({
                'color': '#ff6d00',
            });
            $(this).css({
                'border-left': '4px solid #ff6d00',
                'background': '#f8f8f8'
            });
            $(this).find('img').attr('src', '{{ asset("images/SelectedTrucks.svg") }}');
            $(".trackingItems:nth-child(2)").find('img').attr('src', '{{ asset("images/UnselectedWarehouses.svg") }}');
            $(".trackingItems:nth-child(3)").find('img').attr('src', '{{ asset("images/UnselectedDestinations.svg") }}');
            
            $(".colorBoxes").empty();
            $.each(colors, function(key, val) {
                $(".colorBoxes").append(
                    '<span style="background:' + val + '" class="' + val + '"></span>'
                );
            });

            $(".filtersWrapper").empty();
            $("#sel3").slideUp();
            
            $("#textPanel").empty();
            $(".bottomTrackingFilters .panel").empty();
            $(".bottomTrackingFilters").slideDown();
            $(".topTrackingFilters .accordion").text('{{ __('messages.tracking.trucks') }}');
            $(".bottomTrackingFilters .accordion").text('{{ __('messages.tracking.trucks') }}');   

            removeWarehouseMarkers(null, null);
            removeDestinationMarkers(null, null);

            $(".filtersWrapper").append(
                '<select class="form-control trucks" id="sel1">'+
                    '<option value="typeVehicles" '+(selectFilter1 == 'typeVehicles' ? "selected" : '')+'>{{ __('messages.tracking.filterOptions.typeVehicle') }}</option>'+
                    '<option value="stateTrucks" '+(selectFilter1 == 'stateTrucks' ? "selected" : '')+'>{{ __('messages.tracking.filterOptions.stateTruck') }}</option>'+
                    '<option value="trips" '+(selectFilter1 == 'trips' ? "selected" : '')+'>{{ __('messages.tracking.filterOptions.trip') }}</option>'+
                    '<option value="SizeTruckShow" '+(selectFilter1 == 'drivers' ? "selected" : '')+'>{{ __('messages.tracking.truckInfoList.size') }}</option>'+                    
                '</select>'
            );

            filterUnique = 1;
            var selectedFilter = $("#sel1 option:selected").val();
            $.each(allInfo[selectFilter1], function(index, val) {
                checkedCondition[val] = 1;
                $("#textPanel").append(
                    '<div class="checkbox-group mb-0">'+
                        '<input type="hidden" value="'+selectedFilter+'" class="filterName">'+
                        '<input type="checkbox" id="textFilter'+filterUnique+'" '+(checkedCondition[val] == 1 ? "checked" : '')+' class="active textFilter1">'+
                        '<label for="textFilter'+filterUnique+'">'+val+'</label>'+
                    '</div>'
                );
                filterUnique++;
            });

            $(".bottomTrackingFilters .panel").append(
                '<div class="checkbox-group mb-0">' +
                '<input type="checkbox" id="TypeVehicle2" ' + (truckText.typeVehicle == 1 ? 'checked' : '') + ' class="' + (truckText.typeVehicle == 1 ? 'active' : '') + '">' +
                '<label for="TypeVehicle2">{{ __('messages.tracking.filterOptions.typeVehicle') }}</label>' +
                '</div>' +
                '<div class="checkbox-group mb-0">' +
                '<input type="checkbox" id="StateTruck2" ' + (truckText.stateTruck == 1 ? 'checked' : '') + ' class="' + (truckText.stateTruck == 1 ? 'active' : '') + '">' +
                '<label for="StateTruck2">{{ __('messages.tracking.filterOptions.stateTruck') }}</label>' +
                '</div>'+
                '<div class="checkbox-group mb-0">' +
                '<input type="checkbox" id="TrucksDriver" ' + (truckText.driver == 1 ? 'checked' : '') + ' class="' + (truckText.driver == 1 ? 'active' : '') + '">' +
                '<label for="TrucksDriver">{{ __('messages.tracking.filterOptions.driver') }}</label>' +
                '</div>'
            );
        });

        $(".trackingItems:nth-child(2)").click(function() {
            tabName = 'warehouses';
            $(".topTrackingFilters, .colors").slideDown();
            $(".trackingItems").removeClass('active');
            $(this).addClass('active');
            $(".trackingItems").find('span').addClass('textDark');
            $(".trackingItems").css({
                'border-left': '4px solid transparent',
                'background': 'transparent'
            });
            $(this).find('span').removeClass('textDark').css({
                'color': '#ff6d00',
            });
            $(this).css({
                'border-left': '4px solid #ff6d00',
                'background': '#f8f8f8'
            });
            $(this).find('img').attr('src', '{{ asset("images/SelectedWarehouses.svg") }}');
            $(".trackingItems:nth-child(1)").find('img').attr('src', '{{ asset("images/UnselectedTrucks.svg") }}');
            $(".trackingItems:nth-child(3)").find('img').attr('src', '{{ asset("images/UnselectedDestinations.svg") }}');

            $(".colorBoxes").empty();
            $.each(colors, function(key, val) {
                $(".colorBoxes").append(
                    '<span style="background:' + val + '" class="' + val + '"></span>'
                );
            });
            
            $("#textPanel").empty();
            $(".filtersWrapper").empty();   
            
            $(".filtersWrapper").append(
                '<select class="form-control trucks" id="sel3">'+                 
                    '<option value="SizeTruckShow">{{ __('messages.tracking.truckInfoList.size') }}</option>'+
                '</select>'
            );

            filterUnique = 1;
            var selectedFilter3 = $("#sel3 option:selected").val();
            filters = [];
            $.each(realTrip, function(index,value){
                $.each(value, function(index2, value2) {
                    if(index2 == selectedFilter3){
                        $("#textPanel").append(
                            '<div class="checkbox-group mb-0">'+
                                '<input type="hidden" value="'+selectedFilter3+'" class="filterName">'+
                                '<input type="checkbox" id="textFilter'+filterUnique+'" checked="checked" class="active textFilter3">'+
                                '<label for="textFilter'+filterUnique+'">'+value2+'</label>'+
                            '</div>'
                        );
                        filters.push('textFilter'+filterUnique);
                        filterUnique++;                       
                    }
                });                
            });

            $('.bottomTrackingFilters').slideUp();
        });

        $(".trackingItems:nth-child(3)").click(function() {
            tabName = 'destinations';
            filtersInfo = [];
            $(".topTrackingFilters, .colors, .bottomTrackingFilters").slideDown();
            $(".trackingItems").removeClass('active');
            $(this).addClass('active');
            $(".trackingItems").find('span').addClass('textDark');
            $(".trackingItems").css({
                'border-left': '4px solid transparent',
                'background': 'transparent'
            });
            $(this).find('span').removeClass('textDark').css({
                'color': '#ff6d00',
            });
            $(this).css({
                'border-left': '4px solid #ff6d00',
                'background': '#f8f8f8'
            });
            $(this).find('img').attr('src', '{{ asset("images/SelectedDestinations.svg") }}');
            $(".trackingItems:nth-child(1)").find('img').attr('src', '{{ asset("images/UnselectedTrucks.svg") }}');
            $(".trackingItems:nth-child(2)").find('img').attr('src', '{{ asset("images/UnselectedWarehouses.svg") }}');

            $(".colorBoxes").empty();
            $.each(colors, function(key, val) {
                $(".colorBoxes").append(
                    '<span style="background:' + val + '" class="' + val + '"></span>'
                );
            });

            $('.topTrackingFilters, .bottomTrackingFilters').slideDown();
            $("#sel3").slideUp();
            $(".filtersWrapper").empty();
            $("#textPanel").empty();
            $(".bottomTrackingFilters .panel").empty();

            $(".topTrackingFilters .accordion").text('{{ __('messages.tracking.destinations') }}');
            $(".bottomTrackingFilters .accordion").text('{{ __('messages.tracking.destinations') }}');

            $(".filtersWrapper").append(
                '<select class="form-control trucks" id="sel2">'+
                    '<option value="regions" '+(selectFilter2 == 'regions' ? "selected" : '')+'>{{ __('messages.tracking.filterOptions.region') }}</option>'+
                    '<option value="states" '+(selectFilter2 == 'states' ? "selected" : '')+'>{{ __('messages.tracking.filterOptions.state') }}</option>'+
                    '<option value="typePackages" '+(selectFilter2 == 'typePackages' ? "selected" : '')+'>{{ __('messages.tracking.filterOptions.typePackages') }}</option>'+
                '</select>'
            );
            
            $(".bottomTrackingFilters .panel").append(
                '<div class="checkbox-group mb-0">' +
                '<input type="checkbox" id="State2" checked="checked" class="active">' +
                '<label for="State2" id="state22">{{ __('messages.tracking.filterOptions.state') }}</label>' +
                '</div>' +
                '<div class="checkbox-group mb-0">' +
                '<input type="checkbox" id="Country2" checked="checked" class="active">' +
                '<label for="Country2">{{ __('messages.tracking.filterOptions.city') }}</label>' +
                '</div>' +
                '<div class="checkbox-group mb-0">' +
                '<input type="checkbox" id="Sequence2" checked="checked" class="active">' +
                '<label for="Sequence2">{{ __('messages.tracking.filterOptions.sequence') }}</label>' +
                '</div>' +
                '<div class="checkbox-group mb-0">' +
                '<input type="checkbox" id="Trip2" checked="checked" class="active">' +
                '<label for="Trip2">{{ __('messages.tracking.filterOptions.trip') }}</label>' +
                '</div>'
            );

            filterUnique = 1;
            var selectedFilter2 = $("#sel2 option:selected").val();
            filters = [];            
            
            $.each(allInfo[selectFilter2], function(index, val) {
                checkedCondition[val] = 1;
                $("#textPanel").append(
                    '<div class="checkbox-group mb-0">'+
                        '<input type="hidden" value="'+selectedFilter2+'" class="filterName">'+
                        '<input type="checkbox" id="textFilter'+filterUnique+'" '+(checkedCondition[val] == 1 ? "checked" : '')+' class="active textFilter2">'+
                        '<label for="textFilter'+filterUnique+'">'+(val == 'ESTE' ? '{{ __('messages.responseValues.east') }}' : val == 'NOROESTE' ? '{{ __('messages.responseValues.northWest') }}' : val == 'SUROESTE' ? '{{ __('messages.responseValues.southWest') }}' : val)+'</label>'+
                    '</div>'
                );
                filters.push('textFilter'+filterUnique);
                filterUnique++;
                filtersInfo.push({'key':selectedFilter2, 'value':val});                
            });        
            
            destinations('default', null, null, null);
        });

        // For navigation bar
        $(".navbar-nav .custom-nav-item:first-child").css({
            'border-bottom': '3px solid #ff6d00'
        });
        $(".navbar-nav .custom-nav-item:first-child .nav-link").css({
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

        // Hide image on google map.
        setTimeout(function() {
            $("img[src='https://maps.gstatic.com/mapfiles/api-3/images/google4_hdpi.png']").hide();
        }, 1000);

        // Set left sidebar height
        $(".trackingLeftSection").height($(window).height() - 60 + 'px');
        $(".truckInfo .truckBody").height($(window).height() - 110 + 'px');

        // Whatsapp popup open
        $(".mapWrapper .fa-whatsapp").click(function() {
            $(".whatsapp").slideDown();
            $(".whatsapp .whatsappBody").slideDown();
            $(".whatsapp .wheader .fa-window-minimize").show();
            $(".whatsapp .wheader .fa-window-maximize").hide();
            $(".whatsapp").css({
                'bottom': '0px',
                'transition': '0s',
                'z-index': 1
            });
            $('.whatsapp .wheader').css({
                'border-bottom-right-radius': '0px',
                'border-bottom-left-radius': '0px'
            });
        });
        $(".whatsapp .wheader .fa-times").click(function() {
            $(".whatsapp").slideUp();
            $(".whatsapp form")[0].reset();
        });
        $(".whatsapp .wheader .fa-window-minimize").click(function() {
            $(".whatsapp .whatsappBody").slideUp();
            $(".fa-window-minimize").hide();
            $(".fa-window-maximize").show();
            $('.whatsapp .wheader').css('border-radius', '6px');

            if ($('.emailBox .eheader').is(':visible') && $('.emailBox .emailBody').css("display") == 'none' && $(".emailBox").css('bottom') == '60px') {
                $(".whatsapp").css({
                    'bottom': '104px',
                    'transition': '0.5s',
                    'z-index': 0
                });
            } else {
                $(".whatsapp").css({
                    'bottom': '60px',
                    'transition': '0.5s',
                    'z-index': 0
                });
            }
        });
        $(".whatsapp .wheader .fa-window-maximize").click(function() {
            $(".whatsapp .whatsappBody").slideDown();
            $(".whatsapp .wheader .fa-window-maximize").hide();
            $(".whatsapp .wheader .fa-window-minimize").show();
            $(".whatsapp").css({
                'bottom': '0px',
                'transition': '1s',
                'z-index': 1
            });
            $('.whatsapp .wheader').css({
                'border-bottom-right-radius': '0px',
                'border-bottom-left-radius': '0px'
            });
        });

        // Email popup open
        $(".mapWrapper .fa-envelope").click(function() {
            $(".emailBox").slideDown();
            $(".emailBox .emailBody").slideDown();
            $(".emailBox .eheader .fa-window-minimize").show();
            $(".emailBox .eheader .fa-window-maximize").hide();
            $(".emailBox").css({
                'bottom': '0px',
                'transition': '0s',
                'z-index': 1
            });
            $('.emailBox .eheader').css({
                'border-bottom-right-radius': '0px',
                'border-bottom-left-radius': '0px'
            });
        });
        $(".emailBox .eheader .fa-times").click(function() {
            $(".emailBox").slideUp();
            $(".emailBox form")[0].reset();
        });
        $(".emailBox .eheader .fa-window-minimize").click(function() {
            $(".emailBox .emailBody").slideUp();
            $(".fa-window-minimize").hide();
            $(".fa-window-maximize").show();
            $('.emailBox .eheader').css('border-radius', '6px');
            if ($('.whatsapp .wheader').is(':visible') && $('.whatsapp .whatsappBody').css("display") == 'none' && $(".whatsapp").css('bottom') == '60px') {
                $(".emailBox").css({
                    'bottom': '104px',
                    'transition': '0.5s',
                    'z-index': 0
                });
            } else {
                $(".emailBox").css({
                    'bottom': '60px',
                    'transition': '0.5s',
                    'z-index': 0
                });
            }
        });
        $(".emailBox .eheader .fa-window-maximize").click(function() {
            $(".emailBox .emailBody").slideDown();
            $(".emailBox .eheader .fa-window-maximize").hide();
            $(".emailBox .eheader .fa-window-minimize").show();
            $(".emailBox").css({
                'bottom': '0px',
                'transition': '1s',
                'z-index': 1
            });
            $('.emailBox .eheader').css({
                'border-bottom-right-radius': '0px',
                'border-bottom-left-radius': '0px'
            });
        });

        // Open truck info popup
        $(".mapWrapper .fa-info").click(function() {
            $(".infoWarning").slideDown('slow').delay(3000).slideUp('slow');
        });
        $(".truckInfo .theader .fa-times").click(function() {
            $(".truckInfo").fadeOut();
        });   
        
        // For responsive
        if ($(window).width() <= 575) {
            $(".trackingLeftSection").css('height', 'auto');
        }        
    }); 

    // Truck filters (left Bottom)
    var selectedFilter = $("#sel1 option:selected").val();
    $.each(allInfo.typeVehicles, function(index, val) {
        $("#textPanel").append(
            '<div class="checkbox-group mb-0">'+
                '<input type="hidden" value="'+selectedFilter+'" class="filterName">'+
                '<input type="checkbox" id="textFilter'+filterUnique+'" checked="checked" class="active textFilter1">'+
                '<label for="textFilter'+filterUnique+'">'+val+'</label>'+
            '</div>'
        );

        filters.push('textFilter'+filterUnique);
        filterUnique++;
        filtersInfo.push({'key':selectedFilter, 'value':val});
    });

    $(document).on('change', '#sel1', function() {
        filters = [];
        filtersInfo = [];
        selectFilter1 = $("#sel1 option:selected").val();
        $("#textPanel").empty();
        filterUnique = 1;
        if (selectFilter1 != "SizeTruckShow") {
            truck('default', null, null, 1);
            $.each(allInfo, function(index,value){
                if(index == selectFilter1){
                    $.each(value, function(index2, value2) {
                        $("#textPanel").append(
                            '<div class="checkbox-group mb-0">'+
                                '<input type="hidden" value="'+selectFilter1+'" class="filterName">'+
                                '<input type="checkbox" id="textFilter'+filterUnique+'" checked="checked" class="active textFilter1">'+
                                '<label for="textFilter'+filterUnique+'">'+value2+'</label>'+
                            '</div>'
                        );
                        filters.push('textFilter'+filterUnique);
                        filterUnique++;
                        filtersInfo.push({'key':selectFilter1, 'value':value2});
                    });
                }
            });
        } else {
            truck('default', null, null, 1);
            $.each(realTrip, function(index,value){
                $.each(value, function(index2, value2) {
                    if(index2 == selectFilter1){
                        $("#textPanel").append(
                            '<div class="checkbox-group mb-0">'+
                                '<input type="hidden" value="'+selectFilter1+'" class="filterName">'+
                                '<input type="checkbox" id="textFilter'+filterUnique+'" checked="checked" class="active textFilter1">'+
                                '<label for="textFilter'+filterUnique+'">'+value2+'</label>'+
                            '</div>'
                        );
                        filters.push('textFilter'+filterUnique);
                        filterUnique++; 
                        filtersInfo.push({'key':selectFilter1, 'value':value2});                      
                    }
                });                
            });
        }
    });

    // For select all process
    $(document).on('click', '#filterAll2', function() {        
        if($(this).hasClass('active')){            
            $(this).removeClass('active');                        
            var intervalTime = 0;
            $(this).parent('.checkbox-group').find('label').removeClass('addCheck');
            $.each(filters, function(key, val) {
                if($("#"+val+"").hasClass('active')) {
                    setTimeout(() => {
                        $("#"+val+"").trigger('click');
                    }, intervalTime);
                    intervalTime += 55;
                }
            });
        } else {            
            var intervalTime =0;
            $(this).addClass('active');
            $(this).parent('.checkbox-group').find('label').removeClass('removeCheck');
            $(this).parent('.checkbox-group').find('label').addClass('addCheck');
            $.each(filters, function(key, val) {
                if(!$("#"+val+"").hasClass('active')) {
                    setTimeout(() => {
                        $("#"+val+"").trigger('click');
                    }, intervalTime);
                    intervalTime += 55;
                }
            });
        }
    });    

    $(document).on('click', '.textFilter1', function() {
        
        let filterName = $(this).closest('.checkbox-group').find('.filterName').val();
        let filterVal = $(this).closest('.checkbox-group').find('label').text();
        filterName2 = filterName;
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $('#filterAll2').parent('.checkbox-group').find('label').addClass('removeCheck');
            $('#filterAll2').removeClass('active');
            removeTruckMarkers(filterName, filterVal);
            checkedCondition[filterVal] = 0;
            var x = filtersInfo;
            $.each(x, function(index, value){         
                if (filterVal == value.value && filterName == value.key) {
                   filtersInfo.splice(index, 1);
                   return false;
                }
            });
        } else {            
            $(this).addClass('active');
            truck(globalTruckColor1, filterName, filterVal, null);
            checkedCondition[filterVal] = 1;
            filtersInfo.push({'key':filterName, 'value':filterVal});
        }     
    });

    // Truck Text filter (left Bottom)
    $(document).on('click', '#TypeVehicle2', function() {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            truckText.typeVehicle = 0;
            truck(globalTruckColor1, null, null, filtersInfo);
        } else {
            $(this).addClass('active');
            truckText.typeVehicle = 1;
            truck(globalTruckColor1, null, null, filtersInfo);
        }
    });

    $(document).on('click', '#StateTruck2', function() {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            truckText.stateTruck = 0;
            truck(globalTruckColor1, null, null, filtersInfo);
        } else {
            $(this).addClass('active');
            truckText.stateTruck = 1;
            truck(globalTruckColor1, null, null, filtersInfo);
        }
    });

    $(document).on('click', '#TrucksDriver', function() {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            truckText.driver = 0;
            truck(globalTruckColor1, null, null, filtersInfo);
        } else {
            $(this).addClass('active');
            truckText.driver = 1;
            truck(globalTruckColor1, null, null, filtersInfo);
        }
    });

    // Destination filters (left Bottom)
    $(document).on('change', '#sel2', function() {
        filters = [];
        filtersInfo = [];
        selectFilter2 = $("#sel2 option:selected").val();
        $("#textPanel").empty();
        filterUnique = 1;
        
        $.each(allInfo, function(index,value){
            if(index == selectFilter2){
                destinations(globalDestinationColor1, null, null, null);
                $.each(value, function(index2, value2) {
                    if ('ESTE' in checkedCondition) {
                        checkedCondition[value2] = 1;
                    }                    
                    $("#textPanel").append(
                        '<div class="checkbox-group mb-0">'+
                            '<input type="hidden" value="'+selectFilter2+'" class="filterName">'+
                            '<input type="checkbox" id="textFilter'+filterUnique+'" '+(checkedCondition[value2] == 1 ? "checked" : '')+' class="active textFilter2">'+
                            '<label for="textFilter'+filterUnique+'">'+value2+'</label>'+
                        '</div>'
                    );
                    filters.push('textFilter'+filterUnique);
                    filterUnique++;
                    filtersInfo.push({'key':selectFilter2, 'value':value2});
                });
            }
        });
    });

    // Destinations Text filter (left Bottom)    
    $(document).on('click', '.textFilter2', function() {
        
        let filterName = $(this).closest('.checkbox-group').find('.filterName').val();
        let filterVal = $(this).closest('.checkbox-group').find('label').text();    
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $('#filterAll2').parent('.checkbox-group').find('label').addClass('removeCheck');
            $('#filterAll2').removeClass('active');
            removeDestinationMarkers(filterName, (filterVal == 'East' ? 'ESTE' : filterVal == 'Northwest' ? 'NOROESTE' : filterVal == 'SouthWest' ? 'SUROESTE' : filterVal));
            checkedCondition[filterVal] = 0;
            var x = filtersInfo;
            $.each(x, function(index, value){         
                if ((filterVal == 'East' ? 'ESTE' : filterVal == 'Northwest' ? 'NOROESTE' : filterVal == 'SouthWest' ? 'SUROESTE' : filterVal) == value.value && filterName == value.key) {
                   filtersInfo.splice(index, 1);
                   return false;
                }
            });
        } else {
            $(this).addClass('active');            
            destinations(globalDestinationColor1, filterName, (filterVal == 'East' ? 'ESTE' : filterVal == 'Northwest' ? 'NOROESTE' : filterVal == 'SouthWest' ? 'SUROESTE' : filterVal), filtersInfo);
            checkedCondition[filterVal] = 1;
            filtersInfo.push({'key':filterName, 'value':(filterVal == 'East' ? 'ESTE' : filterVal == 'Northwest' ? 'NOROESTE' : filterVal == 'SouthWest' ? 'SUROESTE' : filterVal)});
        }
    });

    // Destination Text filter (left Bottom)
    $(document).on('click', '#State2', function() {
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            destinations(globalDestinationColor1, null, null, filtersInfo);
        } else {
            $(this).addClass('active');
            destinations(globalDestinationColor1, null, null, filtersInfo);
        }
    });

    $(document).on('click', '#Country2',function() {
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            destinations(globalDestinationColor1, null, null, filtersInfo);
        } else {
            $(this).addClass('active');
            destinations(globalDestinationColor1, null, null, filtersInfo);
        }
    });

    $(document).on('click', '#Sequence2', function() {
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            destinations(globalDestinationColor1, null, null, filtersInfo);
        } else {
            $(this).addClass('active');
            destinations(globalDestinationColor1, null, null, filtersInfo);
        }
    });

    $(document).on('click', '#Trip2', function() {
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            destinations(globalDestinationColor1, null, null, filtersInfo);
        } else {
            $(this).addClass('active');
            destinations(globalDestinationColor1, null, null, filtersInfo);
        }
    });

    // Warehouse filter (left Bottom)
    $(document).on('click', '.textFilter3', function() {
        let filterName = $(this).closest('.checkbox-group').find('.filterName').val();
        let filterVal = $(this).closest('.checkbox-group').find('label').text();
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $('#filterAll2').parent('.checkbox-group').find('label').addClass('removeCheck');
            $('#filterAll2').removeClass('active');
            removeWarehouseMarkers(filterName, filterVal);
            checkedCondition[filterVal] = 0;
            var x = filtersInfo;
            $.each(x, function(index, value){         
                if (filterVal == value.value && filterName == value.key) {
                   filtersInfo.splice(index, 1);
                   return false;
                }
            });
        } else {
            $(this).addClass('active');            
            warehouses('default', filterName, filterVal);
            checkedCondition[filterVal] = 1;
            filtersInfo.push({'key':filterName, 'value':filterVal});
        }
    });    

    // Switch button for trucks
    // $(document).on('click', ".slider.round.trucks", function() {
    //     if ($(this).hasClass('active')) {
    //         $(this).removeClass('active');
    //         removeTruckMarkers(null, null);
    //         if ($(".trackingItems:first-child").hasClass('active')) {
    //             $(".topTrackingFilters, .colors, .bottomTrackingFilters").slideUp();
    //         }
    //     } else {
    //         $(this).addClass('active');
    //         if ($(".trackingItems:first-child").hasClass('active')) {
    //             truck('default', null, null, null);
    //         }
    //         if ($(".trackingItems:nth-child(2)").hasClass('active')) {
    //             truck('default', null, null, null);
    //             warehouses('default', null, null);
    //         }
    //         if ($(".trackingItems:nth-child(3)").hasClass('active')) {
    //             truck('default', null, null, null);
    //             destinations('default', null, null);
    //         }
            
    //         $(".topTrackingFilters, .colors, .bottomTrackingFilters").slideDown();
    //     }         
        
    //     // For manage bottom table inside the sidebar.
    //     if($(".slider.round.planned").hasClass('active') || $(".slider.round.real").hasClass('active') ){
    //         $(".routeTableWrapper").show();
    //     }else{
    //         $(".routeTableWrapper").hide();
    //     }  
    // });
    
    // For manage icons color on map    
    $(document).on("click", ".colorBoxes span", function() {
        $(".colorBoxes span").css('box-shadow', 'none');
        $(this).css('box-shadow', '0px 0px 4px 1px grey');
        let filterName = $(this).closest('.checkbox-group').find('.filterName').val();
        let filterVal = $(this).closest('.checkbox-group').find('label').text();
        if (tabName == 'truck') {
            globalTruckColor1 = $(this).attr('class');
            truck(globalTruckColor1, null, null, filtersInfo); 
        } else if(tabName == 'warehouses') {
            globalWarehouseColor = $(this).attr('class');
            warehouses(globalWarehouseColor);
        } else {
            globalDestinationColor1 = $(this).attr('class');
            destinations(globalDestinationColor1, null, null, filtersInfo);
            console.log9filtersInfo;
        }
    });

    var acc = document.getElementsByClassName("accordion");
    var i;
    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>
<script rel="text/javascript" src="{{ asset('js/map.js') }}""></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_KEY') }}&callback=initMap"></script>
@endsection