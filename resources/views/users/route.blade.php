@extends('layouts.header')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-2 pl-0 pr-0">
            <section class="trackingLeftSection">
                <div class="routes ml-3 mr-3 ">
                    <p class="textPrimary font-weight-bold pl-0 pt-3 mb-1 filters">{{ __('messages.route.routes') }}</p>
                    <div class="pl-3 switchWrapper position-relative pb-2 mb-1">
                        <span class="textDark">{{ __('messages.route.real') }}</span>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round real active"></span>
                        </label>
                    </div>
                    <div class="pl-3 switchWrapper position-relative pb-2 border-0">
                        <span class="textDark">{{ __('messages.route.planned') }}</span>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round planned"></span>
                        </label>
                    </div>
                </div>

                <hr class="mt-0 mb-0 textDark">

                <div class="trackingFilters ml-3 mr-3">
                    <p class="textPrimary font-weight-bold pl-0 pt-3 mb-0 filters">{{ __('messages.route.showIcon') }}</p>
                    <button class="accordion real textDark trucks pt-1 pb-0">{{ __('messages.route.showIconList.realRoute') }}</button>
                    <div class="panel pt-2">
                        <div class="checkbox-group mb-0">
                            <input type="checkbox" id="SelectAll" class="SelectAll">
                            <label for="SelectAll">{{ __('messages.route.showIconList.realRouteList.selectAll') }}</label>
                        </div>
                        <div class="checkbox-group mb-0">
                            <input type="checkbox" id="Food">
                            <label for="Food">{{ __('messages.route.showIconList.realRouteList.food') }}</label>
                        </div>
                        <div class="checkbox-group mb-0">
                            <input type="checkbox" id="Gas">
                            <label for="Gas">{{ __('messages.route.showIconList.realRouteList.gas') }}</label>
                        </div>
                        <div class="checkbox-group mb-0">
                            <input type="checkbox" id="Hotel">
                            <label for="Hotel">{{ __('messages.route.showIconList.realRouteList.hotel') }}</label>
                        </div>
                        <div class="checkbox-group mb-0">
                            <input type="checkbox" id="Ferry">
                            <label for="Ferry">{{ __('messages.route.showIconList.realRouteList.ferry') }}</label>
                        </div>
                        <div class="checkbox-group mb-0">
                            <input type="checkbox" id="Rest">
                            <label for="Rest">{{ __('messages.route.showIconList.realRouteList.rest') }}</label>
                        </div>
                        <div class="checkbox-group mb-0">
                            <input type="checkbox" id="Service">
                            <label for="Service">{{ __('messages.route.showIconList.realRouteList.service') }}</label>
                        </div>
                        <div class="checkbox-group mb-0">
                            <input type="checkbox" id="Wait">
                            <label for="Wait">{{ __('messages.route.showIconList.realRouteList.wait') }}</label>
                        </div>
                        <div class="checkbox-group mb-0">
                            <input type="checkbox" id="liquidate">
                            <label for="liquidate">{{ __('messages.route.showIconList.realRouteList.waitBeforeLiquidate') }}</label>
                        </div>
                    </div>

                    <button class="accordion planned textDark pt-2 pb-1">{{ __('messages.route.showIconList.plannedRoute') }}</button>
                    <div class="panel pt-2">
                        <!-- <div class="checkbox-group mb-0">
                            <input type="checkbox" id="Number2" checked="checked">
                            <label for="Number2">Number Truck</label>
                        </div> -->
                        <div class="checkbox-group mb-0">
                            <input type="checkbox" id="Driver2" checked="checked">
                            <label for="Driver2">{{ __('messages.route.showIconList.plannedRouteList.driver') }}</label>
                        </div>
                        <div class="checkbox-group mb-0">
                            <input type="checkbox" id="Trip2" checked="checked">
                            <label for="Trip2">{{ __('messages.route.showIconList.plannedRouteList.trip') }}</label>
                        </div>
                    </div>
                </div>
                <hr class="mt-0 mb-0 textDark">
                
                <!-- Filters -->
                <div id="routeFilters">
                    <div class="routeFilters topTrackingFilters ml-3 mr-3 ">
                        <p class="textPrimary font-weight-bold pl-0 pt-3 filters mb-0">{{ __('messages.tracking.filters') }}</p>
                        <div class="form-group filtersWrapper position-relative">
                            <select class="form-control trucks" id="sel1">
                                <option value="TypePackages">{{ __('messages.tracking.filterOptions.typePackages') }}</option>
                                <option value="Region">{{ __('messages.tracking.filterOptions.region') }}</option>
                                <option value="State">{{ __('messages.tracking.filterOptions.state') }}</option>
                                <!-- <option value="trips">{{ __('messages.tracking.filterOptions.trip') }}</option> -->
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
                    <!-- <hr class="mt-0 mb-0 textDark">
                    <div class="routeFilters bottomTrackingFilters ml-3 mr-3">
                        <p class="textPrimary font-weight-bold pl-0 pt-3 filters mb-0">{{ __('messages.tracking.text') }}</p>
                        <button class="accordion textDark trucks pt-2 pb-1">{{ __('messages.tracking.trucks') }}</button>
                        <div class="panel pt-2" id="textPanel"></div>
                    </div> -->
                    
                </div>

                <!-- Route table -->
                <div class="routeTableWrapper pt-2 backPrimary">
                    <table class="table table-responsive routeLeftTable">
                        <thead>
                            <tr>
                                <th class="border border-right-1 border-top-0"></th>
                                <th class="border-top-0">
                                    <p class="textPrimary mb-0">{{ __('messages.route.showIconList.km') }}</p>
                                </th>
                                <th class="border-top-0">
                                    <p class="textPrimary mb-0">{{ __('messages.route.showIconList.time') }}</p>
                                </th>
                                <th class="border-top-0">
                                    <p class="textPrimary mb-0">{{ __('messages.route.showIconList.destination') }}</p>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="planned">
                                <td class="">
                                    <p class="textPrimary mb-0">{{ __('messages.route.planned') }}</p>
                                </td>
                                <td>
                                    <p class="textDark mb-0">2,000</p>
                                </td>
                                <td>
                                    <p class="textDark mb-0">14:45</p>
                                </td>
                                <td>
                                    <p class="textDark mb-0">6</p>
                                </td>
                            </tr>
                            <tr class="real">
                                <td class="">
                                    <p class="textPrimary mb-0">{{ __('messages.route.real') }}</p>
                                </td>
                                <td>
                                    <p class="textDark mb-0">1,000</p>
                                </td>
                                <td>
                                    <p class="textDark mb-0">9:34</p>
                                </td>
                                <td>
                                    <p class="textDark mb-0">4</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="routeTableBottomSection">
                        <div>
                            <p class="w-75 textPrimary d-inline-block mb-2">{{ __('messages.route.showIconList.estimatedDate') }}:</p>
                            <p class="w-25 float-right textDark d-inline-block mb-2">12/12</p>
                        </div>
                        <div>
                            <p class="w-75 textPrimary d-inline-block mb-2">{{ __('messages.route.showIconList.timeOfReturn') }}:</p>
                            <p class="w-25 float-right textDark d-inline-block mb-2">15:45</p>
                        </div>
                        <div>
                            <p class="w-75 textPrimary d-inline-block mb-2">{{ __('messages.route.showIconList.pof') }}:</p>
                            <p class="w-25 float-right textDark d-inline-block mb-2">56%</p>
                        </div>
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
                                <textarea class="form-control border-0" rows="5" id="comment" name="message" placeholder="{{ __('messages.tracking.newMessagesList.typeYourMessage') }}"></textarea>
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
                                <textarea class="form-control border-0" rows="5" id="comment" name="message" placeholder="{{ __('messages.tracking.newMessagesList.typeYourMessage') }}"></textarea>
                            </div>
                            <button class="btn btn-default backSecondry textLight mb-2">{{ __('messages.tracking.newMessagesList.send') }}</button>
                        </form>
                    </div>
                </div>

                <!-- Truck info
                <div class="truckInfo">
                    <div class="backSecondry textLight theader">
                        <p class="d-inline">{{ __('messages.tracking.truckInfo') }}</p>
                        <i class="fa fa-times float-right pt-1"></i>
                    </div>
                    <div class="truckBody">
                        <table class="w-100">
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.sizeTruckShow') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="sizeTruckShow">176537</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.trip') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="trip3">2</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.latitudMobility') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="latitudMobility">20.1</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.longitudMobility') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="longitudMobility">-19.23</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.lastDateMobility') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="lastDateMobility">2/7/2019 14:34</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>FechaHoraAutomaticasActivity</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="fechaHoraAutomaticasActivity">2/7/2019 14:34</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>ExactitudCoordenadasActivity</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="exactitudcoordenadasActivity">25.59000015</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>DisponibilidadCoordenadasActivity</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="disponibilidadCoordenadasActivity">1</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.mockedActivity') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="mockedActivity">1</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.warehouseLeave') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="warehouseLeave">San Juan</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.latitudWarehouseLeave') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="latitudWarehouseLeave">20.1</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.longitudWarehouseLeave') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="longitudWarehouseLeave">-19.23</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.warehouseReturn') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="warehouseReturn">San Juan</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.latitudWarehouseReturn') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="latitudWarehouseReturn">20.1</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.longitudWarehouseReturn') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="longitudWarehouseReturn">-19.23</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.typeVehicle') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="typeVehicle">FL360</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.stateTruck') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="stateTruck">VerViaje</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.km_h') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="km_h">34.5</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>Places</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="places">ABC-123</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.numberTruck') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="numberTruck">1</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.maxWeight') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="maxWeight">4,950.00</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.maxVolume') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="maxVolume">15.88</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.km') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="km">123</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.cost') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="cost">$1,234</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.%_volume') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="_volume">23%</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.%_weight') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="_weight">23%</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="w-50 d-inline-block">
                                        <p>{{ __('messages.tracking.truckInfoList.driver') }}</p>
                                    </div>
                                    <div class="w-50 d-inline-block">
                                        <p id="driver">Jane Lopez</p>
                                    </div>
                                </td>
                            </tr> -->

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
                        </table>
                    </div>
                </div>

                <!-- Info warning -->
                <div class="infoWarning">
                    <p class="mb-0">{{ __('messages.tracking.pleaseSelcetAnyTruck') }}.</p>
                </div>

                <!-- Real route warning -->
                <div class="realRouteWarning">
                    <p class="mb-0">Please enable real route.</p>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<?php
    $allInfo = session('company_info')->resultado;
    $routes = array();
    $plannedTrip = array();
    $realTrip = array();

    foreach(session('company_info')->resultado->viajes as $val) {
        $routes[] = $val;
    }
    
    foreach($routes as $val) {
        if($val->Planeado == 1){
            $plannedTrip[] = $val;
        } else {
            $realTrip[] = $val;
        }
    }
?>
<script>
    var plannedTrip = <?php print_r(json_encode($plannedTrip)); ?>;
    var realTrip = <?php print_r(json_encode($realTrip)); ?>;
    var planned = <?php echo count($plannedTrip); ?>;
    var real = <?php echo count($realTrip); ?>;
    var allInfo = <?php print_r(json_encode($allInfo)); ?>;
    var filterUnique = 1;
    var checkedCondition = {};
    $(document).ready(function() {
        $("#trackingLink").trigger("click");

        // For navigation bar
        $(".navbar-nav .custom-nav-item:nth-child(2)").css({
            'border-bottom': '3px solid #ff6d00'
        });
        $(".navbar-nav .custom-nav-item:nth-child(2) .nav-link").css({
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

        // Remove table responsive class
        if ($(window).width() <= 767) {
            $(".routeTableWrapper table").removeClass("table-responsive");
            $(".routeTableWrapper").css({
                'height': '100%',
                'background': '#f8f8f8'
            });
        }

        // Real route
        var filters = ['Hotel', 'Gas','Rest','Food'];
        setTimeout(() => {            
            realRoute();            
        }, 100);
        $(".routeTableWrapper table tbody .planned").hide();
        var realKm = 0;
        var realTime = '00:00';
        var realDestinations = 0;

        $.each(realTrip, function(index, val){
            realKm += parseFloat(val.Km);
            realDestinations += parseInt(val.NumberDestinations);
        });

        $(".routeTableWrapper table tbody .real td:nth-child(2) p").text(realKm);
        $(".routeTableWrapper table tbody .real td:nth-child(3) p").text(realTime);
        $(".routeTableWrapper table tbody .real td:nth-child(4) p").text(realDestinations);

        $(".slider.round.real").click(function() {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                removeRealMarkers();
                removeDirections(0, null, null);
                $(".truckInfo").fadeOut();
                $.each(filters, function(index, val) {
                    if($("#"+val+"").hasClass('active')){
                        $("#"+val+"").trigger('click');
                    }
                });  
                if($(".SelectAll").hasClass('active')){
                    $(".SelectAll").trigger('click');
                }     
                // $(".checkbox-group input").attr("disabled", true);
                $(".routeTableWrapper table tbody .real").slideUp('slow');
                $('.trackingFilters').slideUp();
            } else {
                $(this).addClass('active');
                realRoute();
                $(".routeTableWrapper table tbody .real").slideDown('slow');
                $('.trackingFilters').slideDown();
                // $(".checkbox-group input").removeAttr("disabled", false);
            }

            // For manage bottom table inside the sidebar.
            if($(".slider.round.planned").hasClass('active') || $(".slider.round.real").hasClass('active') ){
                $(".routeTableWrapper").show();
                // $(".trackingFilters").slideDown();
            }else{
                $(".routeTableWrapper").hide();
                // $(".trackingFilters").hide();
            }          
        });        

        //Planned route
        var plannedKm = 0;
        var plannedTime = '00:00';
        var plannedDestinations = 0;

        $.each(plannedTrip, function(index, val){
            plannedKm += parseFloat(val.Km);
            plannedDestinations += parseInt(val.NumberDestinations);
        });

        $(".routeTableWrapper table tbody .planned td:nth-child(2) p").text(plannedKm);
        $(".routeTableWrapper table tbody .planned td:nth-child(3) p").text(plannedTime);
        $(".routeTableWrapper table tbody .planned td:nth-child(4) p").text(plannedDestinations);

        $('.accordion.planned').hide();
        $(".slider.round.planned").click(function() {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                removeDirections(1, null, null);
                $(".routeTableWrapper table tbody .planned").slideUp();
                // $('.accordion.planned').slideUp();        
                $("#routeFilters").slideUp();
            } else {
                $(this).addClass('active');
                plannedRoute();
                $("#routeFilters").slideDown('slow');
                // $('.accordion.planned').slideDown();
                $(".routeTableWrapper table tbody .planned").slideDown();
                if($(".slider.round.real").hasClass('active') == false){
                    $(".trackingFilters").slideUp();
                }
            }         
            
            // For manage bottom table inside the sidebar.
            if($(".slider.round.planned").hasClass('active') || $(".slider.round.real").hasClass('active') ){
                $(".routeTableWrapper").show();
                // $(".trackingFilters").show();
            }else{
                $(".routeTableWrapper").hide();
                // $(".trackingFilters").hide();
            }  
        });

        // For filters        
        $("#Food").click(function() {
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                removeFilterLocations('restaurant');
            } else {
                $(this).addClass('active');
                filterLocations('restaurant', 'Food');
            }
        });

        // For hotel flter
        $("#Hotel").click(function() {
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                removeFilterLocations('lodging');
            } else {
                $(this).addClass('active');
                filterLocations('lodging', 'Hotel');
            }
        });

        // For Gas station flter
        $("#Gas").click(function() {
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                removeFilterLocations('gas_station');
            } else {
                $(this).addClass('active');
                filterLocations('gas_station', 'Gas');
            }
        });

        // For Rest flter
        $("#Rest").click(function() {
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                removeFilterLocations('lodging');
            } else {
                $(this).addClass('active');
                filterLocations('lodging', 'Rest');
            }
        });

        // Select all        
        $(".SelectAll").click(function() {
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                var intervalTime = 0;
                $.each(filters, function(key, val) {
                    if($("#"+val+"").hasClass('active')) {
                        setTimeout(() => {
                            $("#"+val+"").trigger('click');
                        }, intervalTime);
                        intervalTime += 55;
                    }
                });
            } else {
                $(this).addClass('active');
                var intervalTime =0;
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
        
        // For responsive
        if ($(window).width() <= 575) {
            $(".trackingLeftSection").css('height', 'auto');
        }
    });

    // Truck filters (left Bottom)
    var selectedFilter = $("#sel1 option:selected").val();
    filters = []; 
    // $.each(allInfo.typeVehicles, function(index, val) {
    //     $("#textPanel").append(
    //         '<div class="checkbox-group mb-0">'+
    //             '<input type="hidden" value="'+selectedFilter+'" class="filterName">'+
    //             '<input type="checkbox" id="textFilter'+filterUnique+'" checked="checked" class="active textFilter1">'+
    //             '<label for="textFilter'+filterUnique+'">'+val+'</label>'+
    //         '</div>'
    //     );
    //     filterUnique++;
    // });

    
    $.each(plannedTrip, function(index, val) {
        // checkedCondition[val] = 1;
        // $("#textPanel").append(
        //     '<div class="checkbox-group mb-0">'+
        //         '<input type="hidden" value="'+selectedFilter+'" class="filterName">'+
        //         '<input type="checkbox" id="textFilter'+filterUnique+'" '+(checkedCondition[val] == 1 ? "checked" : '')+' class="active textFilter2">'+
        //         '<label for="textFilter'+filterUnique+'">'+(val == 'ESTE' ? '{{ __('messages.responseValues.east') }}' : val == 'NOROESTE' ? '{{ __('messages.responseValues.northWest') }}' : val == 'SUROESTE' ? '{{ __('messages.responseValues.southWest') }}' : val)+'</label>'+
        //     '</div>'
        // );
        // filters.push('textFilter'+filterUnique);
        // filterUnique++;

        $.each(val.Destinations, function(index2, value2) {
            $.each(value2, function(index3, value3) {
                
                if(index3 == selectedFilter){
                    console.log(index3+'---'+value3)
                }
            });                
        });
    });     

    // $(document).on('change', '#sel1', function() {
    //     selectFilter1 = $("#sel1 option:selected").val();
    //     $("#textPanel").empty();
    //     filterUnique = 1;

    //     $.each(plannedTrip, function(index,value){
    //         if(index == selectFilter1){
    //             $.each(value, function(index2, value2) {
    //                 $("#textPanel").append(
    //                     '<div class="checkbox-group mb-0">'+
    //                         '<input type="hidden" value="'+selectFilter1+'" class="filterName">'+
    //                         '<input type="checkbox" id="textFilter'+filterUnique+'" checked="checked" class="active textFilter1">'+
    //                         '<label for="textFilter'+filterUnique+'">'+value2+'</label>'+
    //                     '</div>'
    //                 );
    //                 filterUnique++;
    //             });
    //         }
    //     });
    // });

    $(document).on('change', '#sel1', function() {       
        filters = [];
        filtersInfo = [];
        selectFilter1 = $("#sel1 option:selected").val();
        $("#textPanel").empty();
        filterUnique = 1;
        
        $.each(plannedTrip, function(index,value){
            
            $.each(value.Destinations, function(index2, value2) {
                $.each(value2, function(index3, value3) {
                    
                    if(index3 == selectFilter1){
                        console.log(index3+'---'+value3)
                    }
                });                
            });
            // if(index == selectFilter1){
            //     truck('default', null, null, null);
            //     $.each(value, function(index2, value2) {
            //         if ('ESTE' in checkedCondition) {
            //             checkedCondition[value2] = 1;
            //         }                    
            //         $("#textPanel").append(
            //             '<div class="checkbox-group mb-0">'+
            //                 '<input type="hidden" value="'+selectFilter1+'" class="filterName">'+
            //                 '<input type="checkbox" id="textFilter'+filterUnique+'" '+(checkedCondition[value2] == 1 ? "checked" : '')+' class="active textFilter2">'+
            //                 '<label for="textFilter'+filterUnique+'">'+value2+'</label>'+
            //             '</div>'
            //         );
            //         filters.push('textFilter'+filterUnique);
            //         filterUnique++;
            //         filtersInfo.push({'key':selectFilter1, 'value':value2});
            //     });
            // }
        });
    });

    // Truck Text filter (left Bottom)
    $(document).on('click', '.textFilter1', function() {
        let filterName = $(this).closest('.checkbox-group').find('.filterName').val();
        let filterVal = $(this).closest('.checkbox-group').find('label').text();
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            removeDirections(1, filterName, filterVal);
            checkedCondition[filterVal] = 0;
        } else {
            $(this).addClass('active');
            removeDirections(1, filterName, filterVal);
            checkedCondition[filterVal] = 1;
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

<script rel="text/javascript" src="{{ asset('js/map.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_KEY') }}&libraries=places&callback=routeInitMap" async defer></script>
@endsection