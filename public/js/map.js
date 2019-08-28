// ****************************************
//   This file contain only map scripts.
// ****************************************

var truckMarkers = [];
var warehouseMarkers = [];
var destinationsMarkers = [];
var directions = [];
var allDirections = [];
var globalTruckColor = '';
var globalWarehouseColor = '';
var globalDestinationColor = '';
var markerTruckId;
var tirada;
window.map = '';

// Initialize and add the map
function initMap() {
    var latLong = {
        lat: 000,
        lng: 000
    };
    window.map = new google.maps.Map(
        document.getElementById('map'), {
            zoom: 15,
            center: latLong,
            mapTypeId: 'roadmap'
        });
    var marker = new google.maps.Marker({
        position: latLong,
        map: map,
    });

    truck('default', null, null, 1);
}

// Running trucks
function truck(param, filterKey, filterVal, callingFromColor) {
    if (filterKey == null && filterVal == null) {
        removeTruckMarkers(null, null);
    } else {
        var firstLetter = filterKey[0].toUpperCase();
        var otherLetters = filterKey.slice(1);
        var filterKey2 = firstLetter + otherLetters.slice(0, -1);
    }
    removeWarehouseMarkers(null, null);
    removeDestinationMarkers(null, null);
    let icon = {
        url: globalTruckColor == '' ? window.location.protocol + "//" + window.location.hostname + "/images/truck_images_for_map/Trucks_position_on_map_" + param + ".svg" : window.location.protocol + "//" + window.location.hostname + "/images/truck_images_for_map/Trucks_position_on_map_" + globalTruckColor + ".svg",
        scaledSize: new google.maps.Size(40, 40),
    };
    let typeVehicle = $("#typeVehicle3").closest('td').find('div:first-child p').text();
    let stateTruck = $("#stateTruck3").closest('td').find('div:first-child p').text();
    let driver = $("#truckDriver2").closest('td').find('div:first-child p').text();

    // Destinations calling from colors
    if (callingFromColor != null && callingFromColor != 1) {
        $.each(callingFromColor, function(index, value) {
            truck(param, value.key, value.value, null);
        });
    } // End

    $.each(realTrip, function(key, val) {
        if (filterKey == null && filterVal == null && $.isArray(callingFromColor) == false) {
            var truckMarker = new google.maps.Marker({
                position: {
                    lat: parseFloat(val.LatitudMobility),
                    lng: parseFloat(val.LongitudMobility)
                },
                title: "Truck",
                icon: icon,
            });

            var infowindow;
            if ($('#TypeVehicle2').hasClass('active') == true || $('#StateTruck2').hasClass('active') == true) {
                let contentString = '<div id="content" style="color:' + (param == 'default' ? '#105c6d' : param) + '; font-size:11px;">' +
                    ($('#TypeVehicle2').hasClass('active') == true ? '<p id="firstHeading" class="firstHeading font-weight-bold mb-2">' + typeVehicle + ': ' + val.TypeVehicle + '</p>' : '') +
                    ($('#StateTruck2').hasClass('active') == true ? '<p id="firstHeading" class="firstHeading font-weight-bold mb-2">' + stateTruck + ': ' + val.StateTruck + '</p>' : '') +
                    ($('#TrucksDriver').hasClass('active') == true ? '<p id="firstHeading" class="firstHeading font-weight-bold mb-2">' + driver + ': ' + val.Driver + '</p>' : '') +
                    '</div>';

                infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    buttons: {
                        close: { visible: false }
                    }
                });
                infowindow.open(map, truckMarker);
                // google.maps.event.addListener(truckMarker, 'mouseout', function() {
                //     infowindow.close();
                // });
            }
            google.maps.event.addListener(truckMarker, 'click', function() {
                markerTruckId = val.IdViaje;
                let truckInfo = $("#truckInfo").text();
                $(".infoHeading").text(truckInfo);

                // For Truck
                // if ($(".trackingItems:first-child").hasClass('active')) {

                // }

                setTimeout(function() {
                    if (markerTruckId == val.IdViaje) {
                        $(".onlyForDestinations").hide();
                        $(".onlyForTruck").show();

                        $("#sizeTruckShow").text(val.SizeTruckShow);
                        $("#trip3").text(val.Trip);
                        $("#contact").text(val.Contact);
                        $("#latitudMobility").text(val.LatitudMobility);
                        $("#longitudMobility").text(val.LongitudMobility);
                        $("#lastDateMobility").text(val.LastDateMobility);
                        $("#fechaHoraAutomaticasActivity").text(val.FechaHoraAutomaticasActivity);
                        $("#exactitudcoordenadasActivity").text(val.ExactitudCoordenadasActivity);
                        $("#disponibilidadCoordenadasActivity").text(val.DisponibilidadCoordenadasActivity);
                        $("#mockedActivity").text(val.IsMockedActivity);
                        $("#warehouseLeave").text(val.WarehouseLeave);
                        $("#latitudWarehouseLeave").text(val.LatitudWarehouseLeave);
                        $("#longitudWarehouseLeave").text(val.LongitudWarehouseLeave);
                        $("#warehouseReturn").text(val.WarehouseReturn);
                        $("#latitudWarehouseReturn").text(val.LatitudWarehouseReturn);
                        $("#longitudWarehouseReturn").text(val.LongitudWarehouseReturn);
                        $("#typeVehicle3").text(val.TypeVehicle);
                        $("#stateTruck3").text(val.StateTruck);
                        $("#km_h").text(val['Km-h']);
                        $("#places").text(val.Placas);
                        $("#numberTruck").text(val.NumberTruck);
                        $("#maxWeight").text(val.MaxWeight);
                        $("#maxVolume").text(val.MaxVolume);
                        $("#maxCostMerchandise").text(val.MaxCostMerchadise);
                        $("#km").text(val.Km);
                        $("#cost").text(val.Cost);
                        $("#_volume").text(val.MaxVolume);
                        $("#_weight").text(val.MaxWeight);
                        $("#driver3").text(val.Driver);
                        $("#driverRanking").text(val.RankingDriver);
                        $("#actualWeight").text(val.ActualWeight);
                        $("#actualVolume").text(val.ActualVolumen);
                        $("#actualCostMerchandise").text(val.ActualCostMerchandise);
                        $("#numberDestinations").text(val.NumberDestinations);
                        $("#numberPackages").text(val.NumberPackages);
                        $("#typePackages").text(val.TypePackages);
                        $("#numberPieces").text(val.NumberPieces);
                        $("#nextDestination").text(val.NextDestination);
                        $("#nextDestinationArrivalDate").text(val.NextDestinationArrival);
                        $("#traveled_km").text(val.KmRecorridos);
                        $("#kmToGo").text(val.KmPorRecorrer);
                        $("#toDeliverNumberDestinations").text(val.ToDeliverNumberDestinations);
                        $("#toDeliverNumberPackages").text(val.ToDeliverNumberPackages);
                        $("#estimatedFinishRoute").text(val.EstimatedFinishRoute);
                        $("#mailMessages").text(val.MailMessages);
                        $("#whatsappMessages").text(val.WahtsAppMessages);
                    }
                    $(".truckInfo").fadeIn();
                }, 10);
            });

            truckMarker.setMap(window.map);
            window.map.setZoom(5);
            window.map.setCenter(new google.maps.LatLng(val.LatitudMobility, val.LongitudMobility));
            truckMarkers.push({ 'id': val.IdViaje, 'typeVehicles': val.TypeVehicle, 'stateTrucks': val.StateTruck, 'SizeTruckShow': val.SizeTruckShow, 'drivers': val.Driver, 'trips': val.Destinations, 'marker': truckMarker });
        } else {
            if (filterKey == 'trips') {
                $.each(val.Destinations, function(index, value) {
                    $.each(value, function(index2, value2) {
                        if (value2 == filterVal) {
                            var truckMarker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(val.LatitudMobility),
                                    lng: parseFloat(val.LongitudMobility)
                                },
                                title: "Truck",
                                icon: icon,
                            });

                            var infowindow;
                            if ($('#TypeVehicle2').hasClass('active') == true || $('#StateTruck2').hasClass('active') == true || $('#TrucksDriver').hasClass('active') == true) {

                                let contentString = '<div id="content" style="color:' + (param == 'default' ? '#105c6d' : param) + '; font-size:11px;">' +
                                    ($('#TypeVehicle2').hasClass('active') == true ? '<p id="firstHeading" class="firstHeading font-weight-bold mb-2">' + typeVehicle + ': ' + val.TypeVehicle + '</p>' : '') +
                                    ($('#StateTruck2').hasClass('active') == true ? '<p id="firstHeading" class="firstHeading font-weight-bold mb-2">' + stateTruck + ': ' + val.StateTruck + '</p>' : '') +
                                    ($('#TrucksDriver').hasClass('active') == true ? '<p id="firstHeading" class="firstHeading font-weight-bold mb-2">' + driver + ': ' + val.Driver + '</p>' : '') +
                                    '</div>';

                                infowindow = new google.maps.InfoWindow({
                                    content: contentString,
                                    buttons: {
                                        close: { visible: false }
                                    }
                                });
                                infowindow.open(map, truckMarker);
                                // google.maps.event.addListener(truckMarker, 'mouseout', function() {
                                //     infowindow.close();
                                // });
                            }
                            google.maps.event.addListener(truckMarker, 'click', function() {
                                markerTruckId = val.IdViaje;
                                let truckInfo = $("#truckInfo").text();
                                $(".infoHeading").text(truckInfo);

                                // For Truck
                                // if ($(".trackingItems:first-child").hasClass('active')) {

                                // }

                                setTimeout(function() {
                                    if (markerTruckId == val.IdViaje) {
                                        $(".onlyForDestinations").hide();
                                        $(".onlyForTruck").show();

                                        $("#sizeTruckShow").text(val.SizeTruckShow);
                                        $("#trip3").text(val.Trip);
                                        $("#contact").text(val.Contact);
                                        $("#latitudMobility").text(val.LatitudMobility);
                                        $("#longitudMobility").text(val.LongitudMobility);
                                        $("#lastDateMobility").text(val.LastDateMobility);
                                        $("#fechaHoraAutomaticasActivity").text(val.FechaHoraAutomaticasActivity);
                                        $("#exactitudcoordenadasActivity").text(val.ExactitudCoordenadasActivity);
                                        $("#disponibilidadCoordenadasActivity").text(val.DisponibilidadCoordenadasActivity);
                                        $("#mockedActivity").text(val.IsMockedActivity);
                                        $("#warehouseLeave").text(val.WarehouseLeave);
                                        $("#latitudWarehouseLeave").text(val.LatitudWarehouseLeave);
                                        $("#longitudWarehouseLeave").text(val.LongitudWarehouseLeave);
                                        $("#warehouseReturn").text(val.WarehouseReturn);
                                        $("#latitudWarehouseReturn").text(val.LatitudWarehouseReturn);
                                        $("#longitudWarehouseReturn").text(val.LongitudWarehouseReturn);
                                        $("#typeVehicle3").text(val.TypeVehicle);
                                        $("#stateTruck3").text(val.StateTruck);
                                        $("#km_h").text(val['Km-h']);
                                        $("#places").text(val.Placas);
                                        $("#numberTruck").text(val.NumberTruck);
                                        $("#maxWeight").text(val.MaxWeight);
                                        $("#maxVolume").text(val.MaxVolume);
                                        $("#maxCostMerchandise").text(val.MaxCostMerchadise);
                                        $("#km").text(val.Km);
                                        $("#cost").text(val.Cost);
                                        $("#_volume").text(val.MaxVolume);
                                        $("#_weight").text(val.MaxWeight);
                                        $("#driver3").text(val.Driver);
                                        $("#driverRanking").text(val.RankingDriver);
                                        $("#actualWeight").text(val.ActualWeight);
                                        $("#actualVolume").text(val.ActualVolumen);
                                        $("#actualCostMerchandise").text(val.ActualCostMerchandise);
                                        $("#numberDestinations").text(val.NumberDestinations);
                                        $("#numberPackages").text(val.NumberPackages);
                                        $("#typePackages").text(val.TypePackages);
                                        $("#numberPieces").text(val.NumberPieces);
                                        $("#nextDestination").text(val.NextDestination);
                                        $("#nextDestinationArrivalDate").text(val.NextDestinationArrival);
                                        $("#traveled_km").text(val.KmRecorridos);
                                        $("#kmToGo").text(val.KmPorRecorrer);
                                        $("#toDeliverNumberDestinations").text(val.ToDeliverNumberDestinations);
                                        $("#toDeliverNumberPackages").text(val.ToDeliverNumberPackages);
                                        $("#estimatedFinishRoute").text(val.EstimatedFinishRoute);
                                        $("#mailMessages").text(val.MailMessages);
                                        $("#whatsappMessages").text(val.WahtsAppMessages);
                                    }
                                    $(".truckInfo").fadeIn();
                                }, 10);
                            });

                            truckMarker.setMap(window.map);
                            window.map.setZoom(5);
                            window.map.setCenter(new google.maps.LatLng(val.LatitudMobility, val.LongitudMobility));
                            truckMarkers.push({ 'id': val.IdViaje, 'typeVehicles': val.TypeVehicle, 'stateTrucks': val.StateTruck, 'SizeTruckShow': val.SizeTruckShow, 'drivers': val.Driver, 'trips': val.Destinations, 'marker': truckMarker });
                        }
                    });
                });
            } else if (filterKey == 'SizeTruckShow') {
                if (val.SizeTruckShow == filterVal) {
                    var truckMarker = new google.maps.Marker({
                        position: {
                            lat: parseFloat(val.LatitudMobility),
                            lng: parseFloat(val.LongitudMobility)
                        },
                        title: "Truck",
                        icon: icon,
                    });

                    var infowindow;
                    if ($('#TypeVehicle2').hasClass('active') == true || $('#StateTruck2').hasClass('active') == true || $('#TrucksDriver').hasClass('active') == true) {
                        let contentString = '<div id="content" style="color:' + (param == 'default' ? '#105c6d' : param) + '; font-size:11px;">' +
                            ($('#TypeVehicle2').hasClass('active') == true ? '<p id="firstHeading" class="firstHeading font-weight-bold mb-2">' + typeVehicle + ': ' + val.TypeVehicle + '</p>' : '') +
                            ($('#StateTruck2').hasClass('active') == true ? '<p id="firstHeading" class="firstHeading font-weight-bold mb-2">' + stateTruck + ': ' + val.StateTruck + '</p>' : '') +
                            ($('#TrucksDriver').hasClass('active') == true ? '<p id="firstHeading" class="firstHeading font-weight-bold mb-2">' + driver + ': ' + val.Driver + '</p>' : '') +
                            '</div>';

                        infowindow = new google.maps.InfoWindow({
                            content: contentString,
                            buttons: {
                                close: { visible: false }
                            }
                        });
                        infowindow.open(map, truckMarker);
                        // google.maps.event.addListener(truckMarker, 'mouseout', function() {
                        //     infowindow.close();
                        // });
                    }
                    google.maps.event.addListener(truckMarker, 'click', function() {
                        markerTruckId = val.IdViaje;
                        let truckInfo = $("#truckInfo").text();
                        $(".infoHeading").text(truckInfo);

                        // For Truck
                        // if ($(".trackingItems:first-child").hasClass('active')) {

                        // }

                        setTimeout(function() {
                            if (markerTruckId == val.IdViaje) {
                                $(".onlyForDestinations").hide();
                                $(".onlyForTruck").show();

                                $("#sizeTruckShow").text(val.SizeTruckShow);
                                $("#trip3").text(val.Trip);
                                $("#contact").text(val.Contact);
                                $("#latitudMobility").text(val.LatitudMobility);
                                $("#longitudMobility").text(val.LongitudMobility);
                                $("#lastDateMobility").text(val.LastDateMobility);
                                $("#fechaHoraAutomaticasActivity").text(val.FechaHoraAutomaticasActivity);
                                $("#exactitudcoordenadasActivity").text(val.ExactitudCoordenadasActivity);
                                $("#disponibilidadCoordenadasActivity").text(val.DisponibilidadCoordenadasActivity);
                                $("#mockedActivity").text(val.IsMockedActivity);
                                $("#warehouseLeave").text(val.WarehouseLeave);
                                $("#latitudWarehouseLeave").text(val.LatitudWarehouseLeave);
                                $("#longitudWarehouseLeave").text(val.LongitudWarehouseLeave);
                                $("#warehouseReturn").text(val.WarehouseReturn);
                                $("#latitudWarehouseReturn").text(val.LatitudWarehouseReturn);
                                $("#longitudWarehouseReturn").text(val.LongitudWarehouseReturn);
                                $("#typeVehicle3").text(val.TypeVehicle);
                                $("#stateTruck3").text(val.StateTruck);
                                $("#km_h").text(val['Km-h']);
                                $("#places").text(val.Placas);
                                $("#numberTruck").text(val.NumberTruck);
                                $("#maxWeight").text(val.MaxWeight);
                                $("#maxVolume").text(val.MaxVolume);
                                $("#maxCostMerchandise").text(val.MaxCostMerchadise);
                                $("#km").text(val.Km);
                                $("#cost").text(val.Cost);
                                $("#_volume").text(val.MaxVolume);
                                $("#_weight").text(val.MaxWeight);
                                $("#driver3").text(val.Driver);
                                $("#driverRanking").text(val.RankingDriver);
                                $("#actualWeight").text(val.ActualWeight);
                                $("#actualVolume").text(val.ActualVolumen);
                                $("#actualCostMerchandise").text(val.ActualCostMerchandise);
                                $("#numberDestinations").text(val.NumberDestinations);
                                $("#numberPackages").text(val.NumberPackages);
                                $("#typePackages").text(val.TypePackages);
                                $("#numberPieces").text(val.NumberPieces);
                                $("#nextDestination").text(val.NextDestination);
                                $("#nextDestinationArrivalDate").text(val.NextDestinationArrival);
                                $("#traveled_km").text(val.KmRecorridos);
                                $("#kmToGo").text(val.KmPorRecorrer);
                                $("#toDeliverNumberDestinations").text(val.ToDeliverNumberDestinations);
                                $("#toDeliverNumberPackages").text(val.ToDeliverNumberPackages);
                                $("#estimatedFinishRoute").text(val.EstimatedFinishRoute);
                                $("#mailMessages").text(val.MailMessages);
                                $("#whatsappMessages").text(val.WahtsAppMessages);
                            }
                            $(".truckInfo").fadeIn();
                        }, 10);
                    });

                    truckMarker.setMap(window.map);
                    window.map.setZoom(5);
                    window.map.setCenter(new google.maps.LatLng(val.LatitudMobility, val.LongitudMobility));
                    truckMarkers.push({ 'id': val.IdViaje, 'typeVehicles': val.TypeVehicle, 'stateTrucks': val.StateTruck, 'SizeTruckShow': val.SizeTruckShow, 'drivers': val.Driver, 'trips': val.Destinations, 'marker': truckMarker });
                }
            } else {
                $.each(val, function(index, value) {
                    if (filterKey2 == index && value == filterVal) {
                        var truckMarker = new google.maps.Marker({
                            position: {
                                lat: parseFloat(val.LatitudMobility),
                                lng: parseFloat(val.LongitudMobility)
                            },
                            title: "Truck",
                            icon: icon,
                        });

                        var infowindow;
                        if ($('#TypeVehicle2').hasClass('active') == true || $('#StateTruck2').hasClass('active') == true || $('#TrucksDriver').hasClass('active') == true) {
                            let contentString = '<div id="content" style="color:' + (param == 'default' ? '#105c6d' : param) + '; font-size:11px;">' +
                                ($('#TypeVehicle2').hasClass('active') == true ? '<p id="firstHeading" class="firstHeading font-weight-bold mb-2">' + typeVehicle + ': ' + val.TypeVehicle + '</p>' : '') +
                                ($('#StateTruck2').hasClass('active') == true ? '<p id="firstHeading" class="firstHeading font-weight-bold mb-2">' + stateTruck + ': ' + val.StateTruck + '</p>' : '') +
                                ($('#TrucksDriver').hasClass('active') == true ? '<p id="firstHeading" class="firstHeading font-weight-bold mb-2">' + driver + ': ' + val.Driver + '</p>' : '') +
                                '</div>';

                            infowindow = new google.maps.InfoWindow({
                                content: contentString,
                                buttons: {
                                    close: { visible: false }
                                }
                            });
                            infowindow.open(map, truckMarker);
                            // google.maps.event.addListener(truckMarker, 'mouseout', function() {
                            //     infowindow.close();
                            // });
                        }
                        google.maps.event.addListener(truckMarker, 'click', function() {
                            markerTruckId = val.IdViaje;
                            let truckInfo = $("#truckInfo").text();
                            $(".infoHeading").text(truckInfo);

                            // For Truck
                            // if ($(".trackingItems:first-child").hasClass('active')) {

                            // }

                            setTimeout(function() {
                                if (markerTruckId == val.IdViaje) {
                                    $(".onlyForDestinations").hide();
                                    $(".onlyForTruck").show();
                                    $("#sizeTruckShow").text(val.SizeTruckShow);
                                    $("#trip3").text(val.Trip);
                                    $("#contact").text(val.Contact);
                                    $("#latitudMobility").text(val.LatitudMobility);
                                    $("#longitudMobility").text(val.LongitudMobility);
                                    $("#lastDateMobility").text(val.LastDateMobility);
                                    $("#fechaHoraAutomaticasActivity").text(val.FechaHoraAutomaticasActivity);
                                    $("#exactitudcoordenadasActivity").text(val.ExactitudCoordenadasActivity);
                                    $("#disponibilidadCoordenadasActivity").text(val.DisponibilidadCoordenadasActivity);
                                    $("#mockedActivity").text(val.IsMockedActivity);
                                    $("#warehouseLeave").text(val.WarehouseLeave);
                                    $("#latitudWarehouseLeave").text(val.LatitudWarehouseLeave);
                                    $("#longitudWarehouseLeave").text(val.LongitudWarehouseLeave);
                                    $("#warehouseReturn").text(val.WarehouseReturn);
                                    $("#latitudWarehouseReturn").text(val.LatitudWarehouseReturn);
                                    $("#longitudWarehouseReturn").text(val.LongitudWarehouseReturn);
                                    $("#typeVehicle3").text(val.TypeVehicle);
                                    $("#stateTruck3").text(val.StateTruck);
                                    $("#km_h").text(val['Km-h']);
                                    $("#places").text(val.Placas);
                                    $("#numberTruck").text(val.NumberTruck);
                                    $("#maxWeight").text(val.MaxWeight);
                                    $("#maxVolume").text(val.MaxVolume);
                                    $("#maxCostMerchandise").text(val.MaxCostMerchadise);
                                    $("#km").text(val.Km);
                                    $("#cost").text(val.Cost);
                                    $("#_volume").text(val.MaxVolume);
                                    $("#_weight").text(val.MaxWeight);
                                    $("#driver3").text(val.Driver);
                                    $("#driverRanking").text(val.RankingDriver);
                                    $("#actualWeight").text(val.ActualWeight);
                                    $("#actualVolume").text(val.ActualVolumen);
                                    $("#actualCostMerchandise").text(val.ActualCostMerchandise);
                                    $("#numberDestinations").text(val.NumberDestinations);
                                    $("#numberPackages").text(val.NumberPackages);
                                    $("#typePackages").text(val.TypePackages);
                                    $("#numberPieces").text(val.NumberPieces);
                                    $("#nextDestination").text(val.NextDestination);
                                    $("#nextDestinationArrivalDate").text(val.NextDestinationArrival);
                                    $("#traveled_km").text(val.KmRecorridos);
                                    $("#kmToGo").text(val.KmPorRecorrer);
                                    $("#toDeliverNumberDestinations").text(val.ToDeliverNumberDestinations);
                                    $("#toDeliverNumberPackages").text(val.ToDeliverNumberPackages);
                                    $("#estimatedFinishRoute").text(val.EstimatedFinishRoute);
                                    $("#mailMessages").text(val.MailMessages);
                                    $("#whatsappMessages").text(val.WahtsAppMessages);
                                }
                                $(".truckInfo").fadeIn();
                            }, 10);
                        });

                        truckMarker.setMap(window.map);
                        window.map.setZoom(5);
                        window.map.setCenter(new google.maps.LatLng(val.LatitudMobility, val.LongitudMobility));
                        truckMarkers.push({ 'id': val.IdViaje, 'typeVehicles': val.TypeVehicle, 'StateTrucks': val.StateTruck, 'SizeTruckShow': val.SizeTruckShow, 'drivers': val.Driver, 'trips': val.Destinations, 'marker': truckMarker });
                    }
                });
            }
        }
    });
}

// Remove truck markers
function removeTruckMarkers(filterKey, filterVal) {
    if (filterKey != null && filterVal != null) {
        if (filterKey == 'SizeTruckShow') {
            $.each(truckMarkers, function(index, value) {
                $.each(value, function(index2, value2) {
                    if (index2 == filterKey && value2 == filterVal) {
                        value.marker.setMap(null);
                    }
                });
            });
        } else {
            if (filterKey != 'trips') {
                $.each(truckMarkers, function(index, value) {
                    $.each(value, function(index2, value2) {
                        if (index2 == filterKey && value2 == filterVal) {
                            value.marker.setMap(null);
                        }
                    });
                });
            } else {
                $.each(truckMarkers, function(index, value) {
                    $.each(value, function(index2, value2) {
                        if (index2 == filterKey) {
                            $.each(value2, function(index3, value3) {
                                if (value3.Trip == filterVal) {
                                    value.marker.setMap(null);
                                }
                            });
                        }
                    });
                });
            }
        }
    } else {
        for (var i = 0; i < truckMarkers.length; i++) {
            truckMarkers[i].marker.setMap(null);
        }
        truckMarkers = [];
    }
};

// Warehouses
function warehouses(param, filterKey, filterVal) {
    removeWarehouseMarkers(null, null);
    removeDestinationMarkers(null, null);
    let icon = {
        url: globalWarehouseColor == '' ? window.location.protocol + "//" + window.location.hostname + "/images/warehouse_images_for_map/back_to_begin_on_map_" + param + ".svg" : window.location.protocol + "//" + window.location.hostname + "/images/warehouse_images_for_map/back_to_begin_on_map_" + globalWarehouseColor + ".svg",
        scaledSize: new google.maps.Size(40, 40),
    };
    let warehouseName = $("#warehouseLeave").closest('td').find('div:first-child p').text();

    if (filterKey == null && filterVal == null) {
        $.each(realTrip, function(key, val) {
            let warehouseMarker = new google.maps.Marker({
                position: {
                    lat: parseFloat(val.LatitudWarehouseLeave),
                    lng: parseFloat(val.LongitudWarehouseLeave)
                },
                title: "Warehouse",
                icon: icon
            });

            // Infowindow for warehose
            let contentString = '<div id="content" style="color:' + (param == 'default' ? '#3f51b5' : param) + '; font-size:11px;">' +
                '<p id="firstHeading" class="firstHeading font-weight-bold mb-2">' + warehouseName + ': ' + val.WarehouseLeave + '</p>' +
                '<span class="markerTruckId" id="' + val.IdViaje + '" style="display:none">' +
                '</div>';
            let infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            infowindow.open(map, warehouseMarker);
            // google.maps.event.addListener(warehouseMarker, 'click', function() {

            // });
            // google.maps.event.addListener(warehouseMarker, 'mouseout', function() {
            //     infowindow.close(map, warehouseMarker);
            // });
            warehouseMarker.setMap(window.map);
            window.map.setZoom(7);
            window.map.setCenter(new google.maps.LatLng(val.LatitudWarehouseLeave, val.LongitudWarehouseLeave));
            warehouseMarkers.push({ 'marker': warehouseMarker, 'SizeTruckShow': val.SizeTruckShow });
        });
    } else {
        $.each(realTrip, function(key, val) {
            $.each(val, function(index, value) {
                if (filterKey == index && value == filterVal) {
                    let warehouseMarker = new google.maps.Marker({
                        position: {
                            lat: parseFloat(val.LatitudWarehouseLeave),
                            lng: parseFloat(val.LongitudWarehouseLeave)
                        },
                        title: "Warehouse",
                        icon: icon
                    });

                    // Infowindow for warehose
                    let contentString = '<div id="content" style="color:' + (param == 'default' ? '#3f51b5' : param) + '; font-size:11px;">' +
                        '<p id="firstHeading" class="firstHeading font-weight-bold mb-2"> ' + sizeOFTruck + ': ' + val.SizeTruckShow + '</p>' +
                        '<span class="markerTruckId" id="' + val.IdViaje + '" style="display:none">' +
                        '</div>';
                    let infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });

                    // google.maps.event.addListener(warehouseMarker, 'click', function() {
                    infowindow.open(map, warehouseMarker);
                    // });
                    // google.maps.event.addListener(warehouseMarker, 'mouseout', function() {
                    //     infowindow.close(map, warehouseMarker);
                    // });
                    warehouseMarker.setMap(window.map);
                    window.map.setZoom(7);
                    window.map.setCenter(new google.maps.LatLng(val.LatitudWarehouseLeave, val.LongitudWarehouseLeave));
                    warehouseMarkers.push({ 'marker': warehouseMarker, 'SizeTruckShow': val.SizeTruckShow });
                }
            });
        });
    }
}

// Remove warehouse markers
function removeWarehouseMarkers(filterKey, filterVal) {
    if (filterKey != null && filterVal != null) {
        if (filterKey == 'SizeTruckShow') {
            $.each(warehouseMarkers, function(index, value) {
                $.each(value, function(index2, value2) {
                    if (index2 == filterKey && value2 == filterVal) {
                        value.marker.setMap(null);
                    }
                });
            });
        } else {
            $.each(warehouseMarkers, function(index, value) {
                $.each(value, function(index2, value2) {
                    if (index2 == filterKey && value2 == filterVal) {
                        value.marker.setMap(null);
                    }
                });
            });
        }
    } else {
        for (var i = 0; i < warehouseMarkers.length; i++) {
            warehouseMarkers[i].marker.setMap(null);
        }
        warehouseMarkers = [];
    }
};

// Destinations
function destinations(param, filterKey, filterVal, callingFromColor) {
    if (filterKey == null && filterVal == null) {
        removeDestinationMarkers(null, null);
    } else {
        var firstLetter = filterKey[0].toUpperCase();
        var otherLetters = filterKey.slice(1);
        var filterKey2 = (filterKey == 'typePackages' ? firstLetter + otherLetters : firstLetter + otherLetters.slice(0, -1));
    }
    // removeWarehouseMarkers(null, null);

    let icon = {
        url: globalDestinationColor == '' ? window.location.protocol + "//" + window.location.hostname + "/images/destination_images_for_map/Destination_on_map_" + param + ".svg" : window.location.protocol + "//" + window.location.hostname + "/images/destination_images_for_map/Destination_on_map_" + globalDestinationColor + ".svg",
        scaledSize: new google.maps.Size(40, 40),
    };

    // Destinations calling from colors
    if (callingFromColor != null && callingFromColor != 1) {
        $.each(callingFromColor, function(index, value) {
            destinations(param, value.key, value.value, null);
        });
    } // end

    $.each(realTrip, function(key, val) {
        $.each(val.Destinations, function(index, value) {
            if (filterKey == null && filterVal == null && $.isArray(callingFromColor) == false) {
                let destinationMarker = new google.maps.Marker({
                    position: {
                        lat: parseFloat(value.LatitudDestinationTR1),
                        lng: parseFloat(value.LongitudDestinationTR1)
                    },
                    title: "Destination",
                    icon: icon
                });

                // For destination
                var infowindow;
                if ($('#State2').hasClass('active') == true || $('#Country2').hasClass('active') == true || $('#Sequence2').hasClass('active') == true || $('#Trip2').hasClass('active') == true) {
                    let state = $("#State2").closest('.checkbox-group').find('label').text();
                    let trip = $("#Trip2").closest('.checkbox-group').find('label').text();
                    let sequence = $("#Sequence2").closest('.checkbox-group').find('label').text();
                    let city = $("#Country2").closest('.checkbox-group').find('label').text();
                    let contentString = '<div id="content" style="color:' + (param == 'default' ? '#ff6d00' : param) + '; font-size:11px;">' +
                        ($('#State2').hasClass('active') == true ? '<p id="firstHeading" class=" font-weight-bold mb-2">' + state + ': ' + value.State + '</p>' : '') +
                        ($('#Country2').hasClass('active') == true ? '<p id="firstHeading" class=" font-weight-bold mb-2">' + city + ': ' + value.City + '</p>' : '') +
                        ($('#Sequence2').hasClass('active') == true ? '<p id="firstHeading" class=" font-weight-bold mb-2">' + sequence + ': ' + value.Sequence + '</p>' : '') +
                        ($('#Trip2').hasClass('active') == true ? '<p id="firstHeading" class=" font-weight-bold mb-2">' + trip + ': ' + value.Trip + '</p>' : '') +
                        '</div>';

                    infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });
                    infowindow.open(map, destinationMarker);
                    // google.maps.event.addListener(destinationMarker, 'mouseout', function() {
                    //     infowindow.close();
                    // });
                }
                google.maps.event.addListener(destinationMarker, 'click', function() {
                    tirada = value.Tirada;
                    markerTruckId = val.IdViaje;

                    // if ($(".trackingItems:nth-child(3)").hasClass('active')) {

                    // }

                    setTimeout(function() {
                        if (markerTruckId == val.IdViaje && tirada == value.Tirada) {
                            let destinationInfo = $("#destinationInfo").text();
                            $(".infoHeading").text(destinationInfo);
                            $(".onlyForTruck").hide();
                            $(".onlyForDestinations").show();

                            // For both truck & destination
                            $("#maxCostMerchandise").text(val.MaxCostMerchadise);
                            $("#_volume").text(val.MaxVolume);
                            $("#_weight").text(val.MaxWeight);
                            $("#driverRanking").text(val.RankingDriver);
                            $("#actualWeight").text(val.ActualWeight);
                            $("#actualVolume").text(val.ActualVolumen);
                            $("#actualCostMerchandise").text(val.ActualCostMerchandise);
                            $("#numberDestinations").text(val.NumberDestinations);
                            $("#numberPackages").text(val.NumberPackages);
                            $("#typePackages").text(val.TypePackages);
                            $("#numberPieces").text(val.NumberPieces);
                            $("#nextDestination").text(val.NextDestination);
                            $("#nextDestinationArrivalDate").text(val.NextDestinationArrival);
                            $("#toDeliverNumberDestinations").text(val.ToDeliverNumberDestinations);
                            $("#toDeliverNumberPackages").text(val.ToDeliverNumberPackages);
                            $("#estimatedFinishRoute").text(val.EstimatedFinishRoute);

                            // Only for destinations
                            $("#trip3").text(value.Trip);
                            $("#destinationId").text(value.Tirada);
                            $("#latitudDestinationTR1").text(value.LatitudDestinationTR1);
                            $("#longitudDestinationTR1").text(value.LongitudDestinationTR1);
                            $("#destinationLastDateMobility").text(value.LastDateMobility);
                            $("#destinationMockedActivity").text(value.IsMockedActivity);
                            $("#destinationTR1").text(value.DestinationTR1);
                            $("#address").text(value.Address);
                            $("#region").text((value.Region == 'NOROESTE' ? $('#regionResponse .northWest').text() : value.Region == 'east' ? $('#regionResponse .east').text() : value.Region == 'Suroeste' ? $('#regionResponse .southWest').text() : value.Region));
                            $("#destinationState").text(value.State);
                            $("#destinationCity").text(value.City);
                            $("#finalDestinationTR2").text(value.FinalDestinationTR2);
                            $("#latitudDestinationTR2").text(value.LatitudDestinationTR2);
                            $("#longitudDestinationTR2").text(value.LongitudDestinationTR2);
                            $("#receptionist").text(value.Recepcionist);
                            $("#destinationContact").text(value.Contact);
                            $("#timeWindow").text(value.TimeWindow);
                            $("#serviceDuration").text(value.ServiceDuration);
                            $("#destinationTypePackages").text(value.TypePackages);
                            $("#destinationActualWeight").text(value.ActualWeight);
                            $("#destinationActualVolume").text(value.ActualVolume);
                            $("#destinationActualCostMerchandise").text(value.ActualCostMerchandise);
                            $("#destinationNumberPackages").text(value.NumberPackages);
                            $("#destinationNumberPieces").text(value.NumberPieces);
                            $("#delivery").text(value.Delivery);
                            $("#sequence").text(value.Sequence);
                            $("#stateDelivered").text(value.StateDelivered);
                            $("#pof").text(value.POF);
                            $("#pofOnTime").text(value['POF-OnTime']);
                            $("#pofComplete").text(value['POF-Complete']);
                            $("#pofNoDamage").text(value['POF-NoDamage']);
                            $("#pofDocsOk").text(value['POF-DocsOK']);
                            $("#destinationMailMessages").text(value.MailMessages);
                            $("#destinationwhatsappMessages").text(value.WahtsAppMessages);
                        }
                        $(".truckInfo").fadeIn();
                    }, 10);
                });

                destinationMarker.setMap(window.map);
                window.map.setZoom(5);
                window.map.setCenter(new google.maps.LatLng(value.LatitudDestinationTR1, value.LongitudDestinationTR1));
                destinationsMarkers.push({ 'id': val.IdViaje, 'destinations': value, 'marker': destinationMarker });
            } else {
                $.each(value, function(index2, value2) {
                    if (filterKey2 == index2 && value2 == filterVal) {

                        let destinationMarker = new google.maps.Marker({
                            position: {
                                lat: parseFloat(value.LatitudDestinationTR1),
                                lng: parseFloat(value.LongitudDestinationTR1)
                            },
                            title: "Destination",
                            icon: icon
                        });

                        // For destination
                        var infowindow;
                        if ($('#State2').hasClass('active') == true || $('#Country2').hasClass('active') == true || $('#Sequence2').hasClass('active') == true || $('#Trip2').hasClass('active') == true) {
                            let state = $("#State2").closest('.checkbox-group').find('label').text();
                            let trip = $("#Trip2").closest('.checkbox-group').find('label').text();
                            let sequence = $("#Sequence2").closest('.checkbox-group').find('label').text();
                            let city = $("#Country2").closest('.checkbox-group').find('label').text();
                            let contentString = '<div id="content" style="color:' + (param == 'default' ? '#ff6d00' : param) + '; font-size:11px;">' +
                                ($('#State2').hasClass('active') == true ? '<p id="firstHeading" class=" font-weight-bold mb-2">' + state + ': ' + value.State + '</p>' : '') +
                                ($('#Country2').hasClass('active') == true ? '<p id="firstHeading" class=" font-weight-bold mb-2">' + city + ': ' + value.City + '</p>' : '') +
                                ($('#Sequence2').hasClass('active') == true ? '<p id="firstHeading" class=" font-weight-bold mb-2">' + sequence + ': ' + value.Sequence + '</p>' : '') +
                                ($('#Trip2').hasClass('active') == true ? '<p id="firstHeading" class=" font-weight-bold mb-2">' + trip + ': ' + value.Trip + '</p>' : '') +
                                '</div>';

                            infowindow = new google.maps.InfoWindow({
                                content: contentString
                            });
                            infowindow.open(map, destinationMarker);
                            // google.maps.event.addListener(destinationMarker, 'mouseout', function() {
                            //     infowindow.close();
                            // });
                        }
                        google.maps.event.addListener(destinationMarker, 'click', function() {
                            tirada = value.Tirada;
                            markerTruckId = val.IdViaje;

                            // if ($(".trackingItems:nth-child(3)").hasClass('active')) {

                            // }

                            setTimeout(function() {
                                if (markerTruckId == val.IdViaje && tirada == value.Tirada) {
                                    let destinationInfo = $("#destinationInfo").text();
                                    $(".infoHeading").text(destinationInfo);

                                    $(".onlyForTruck").hide();
                                    $(".onlyForDestinations").show();

                                    // For both truck & destination
                                    $("#maxCostMerchandise").text(val.MaxCostMerchadise);
                                    $("#_volume").text(val.MaxVolume);
                                    $("#_weight").text(val.MaxWeight);
                                    $("#driverRanking").text(val.RankingDriver);
                                    $("#actualWeight").text(val.ActualWeight);
                                    $("#actualVolume").text(val.ActualVolumen);
                                    $("#actualCostMerchandise").text(val.ActualCostMerchandise);
                                    $("#numberDestinations").text(val.NumberDestinations);
                                    $("#numberPackages").text(val.NumberPackages);
                                    $("#typePackages").text(val.TypePackages);
                                    $("#numberPieces").text(val.NumberPieces);
                                    $("#nextDestination").text(val.NextDestination);
                                    $("#nextDestinationArrivalDate").text(val.NextDestinationArrival);
                                    $("#toDeliverNumberDestinations").text(val.ToDeliverNumberDestinations);
                                    $("#toDeliverNumberPackages").text(val.ToDeliverNumberPackages);
                                    $("#estimatedFinishRoute").text(val.EstimatedFinishRoute);

                                    // Only for destinations
                                    $("#trip3").text(value.Trip);
                                    $("#destinationId").text(value.Tirada);
                                    $("#latitudDestinationTR1").text(value.LatitudDestinationTR1);
                                    $("#longitudDestinationTR1").text(value.LongitudDestinationTR1);
                                    $("#destinationLastDateMobility").text(value.LastDateMobility);
                                    $("#destinationMockedActivity").text(value.IsMockedActivity);
                                    $("#destinationTR1").text(value.DestinationTR1);
                                    $("#address").text(value.Address);
                                    $("#region").text(value.Region);
                                    $("#destinationState").text(value.State);
                                    $("#destinationCity").text(value.City);
                                    $("#finalDestinationTR2").text(value.FinalDestinationTR2);
                                    $("#latitudDestinationTR2").text(value.LatitudDestinationTR2);
                                    $("#longitudDestinationTR2").text(value.LongitudDestinationTR2);
                                    $("#receptionist").text(value.Recepcionist);
                                    $("#destinationContact").text(value.Contact);
                                    $("#timeWindow").text(value.TimeWindow);
                                    $("#serviceDuration").text(value.ServiceDuration);
                                    $("#destinationTypePackages").text(value.TypePackages);
                                    $("#destinationActualWeight").text(value.ActualWeight);
                                    $("#destinationActualVolume").text(value.ActualVolume);
                                    $("#destinationActualCostMerchandise").text(value.ActualCostMerchandise);
                                    $("#destinationNumberPackages").text(value.NumberPackages);
                                    $("#destinationNumberPieces").text(value.NumberPieces);
                                    $("#delivery").text(value.Delivery);
                                    $("#sequence").text(value.Sequence);
                                    $("#stateDelivered").text(value.StateDelivered);
                                    $("#pof").text(value.POF);
                                    $("#pofOnTime").text(value['POF-OnTime']);
                                    $("#pofComplete").text(value['POF-Complete']);
                                    $("#pofNoDamage").text(value['POF-NoDamage']);
                                    $("#pofDocsOk").text(value['POF-DocsOK']);
                                    $("#destinationMailMessages").text(value.MailMessages);
                                    $("#destinationwhatsappMessages").text(value.WahtsAppMessages);
                                }
                                $(".truckInfo").fadeIn();
                            }, 10);
                        });

                        destinationMarker.setMap(window.map);
                        window.map.setZoom(5);
                        window.map.setCenter(new google.maps.LatLng(value.LatitudDestinationTR1, value.LongitudDestinationTR1));
                        destinationsMarkers.push({ 'id': val.IdViaje, 'destinations': value, 'marker': destinationMarker });
                    }
                });
            }
        });
    });
}

// Remove warehouse markers
function removeDestinationMarkers(filterKey, filterVal) {
    if (filterKey != null && filterVal != null) {

        let firstLetter = filterKey[0].toUpperCase();
        let otherLetters = filterKey.slice(1);
        let filterKey2 = (filterKey == 'typePackages' ? firstLetter + otherLetters : firstLetter + otherLetters.slice(0, -1));

        $.each(destinationsMarkers, function(index, value) {
            $.each(value.destinations, function(index2, value2) {
                if (index2 == filterKey2 && value2 == filterVal) {
                    value.marker.setMap(null);
                }
            });
        });
    } else {
        for (var i = 0; i < destinationsMarkers.length; i++) {
            destinationsMarkers[i].marker.setMap(null);
        }
        destinationsMarkers = [];
    }
};

/*For direction draw on map*/
var realColors = ['orange', 'dodgerblue', 'yellow', 'greenyellow', 'red', 'green', 'blue', 'navy', 'black', 'gray', 'chocolate', 'floralwhite', 'pink', 'tomato', 'silver', 'lightgreen', 'purple', 'lightgray', 'yellowgreen', 'greenyellow', 'lightblue', 'skyblue', 'cyan', 'AntiqueWhite', 'Aqua', 'Aquamarine', 'Brown', 'BlanchedAlmond', 'BlueViolet', 'BurlyWood', 'CadetBlue', 'Coral', 'CornflowerBlue', 'Crimson', 'DarkCyan', 'DarkGoldenRod', 'DarkKhaki', 'DarkMagenta', 'DarkOliveGreen', 'DarkOrange', 'DarkRed', 'DarkSalmon', 'DarkSeaGreen', 'DarkSlateBlue', 'FireBrick', 'ForestGreen', 'Gold', 'GoldenRod', 'HotPink', 'Indigo', 'Khaki', 'Lavender', 'LightSeaGreen', 'LightYellow', 'Lime', 'LimeGreen', 'Maroon', 'MediumOrchid', 'MediumSeaGreen', 'Olive', 'OliveDrab', 'OrangeRed', 'Orchid', 'PaleGreen', 'PaleVioletRed', 'PapayaWhip', 'PeachPuff', 'Peru', 'Plum', 'RebeccaPurple', 'RosyBrown', 'RoyalBlue', 'SandyBrown', 'SeaGreen', 'SlateGray', 'SteelBlue', 'Tan', 'Teal', 'Wheat', 'WhiteSmoke', 'MediumTurquoise', 'Violet', 'Chartreuse', 'MediumAquaMarine', 'LightSteelBlue', 'MidnightBlue', 'SandyBrown', 'MistyRose', '#9e7339', '#4c4a3c', '#7b6b4f', '#cec093', '#bba38a', '#9d9d7e', '#6b7477', '#6e4a75', '#3f4042', '#d0b842'];
var plannedColors = ['Crimson', 'DarkCyan', 'DarkGoldenRod', 'DarkKhaki', 'DarkMagenta', 'DarkOliveGreen', 'DarkOrange', 'DarkRed', 'DarkSalmon', 'DarkSeaGreen', 'DarkSlateBlue', 'FireBrick', 'ForestGreen', 'Gold', 'GoldenRod', 'HotPink', 'Indigo', 'Khaki', 'Lavender', 'LightSeaGreen', 'LightYellow', 'Lime', 'LimeGreen', 'Maroon', 'MediumOrchid', 'MediumSeaGreen', 'Olive', 'OliveDrab', 'OrangeRed', 'Orchid', 'PaleGreen', 'PaleVioletRed', 'PapayaWhip', 'PeachPuff', 'Peru', 'Plum', 'RebeccaPurple', 'RosyBrown', 'RoyalBlue', 'SandyBrown', 'SeaGreen', 'SlateGray', 'SteelBlue', 'Tan', 'Teal', 'Wheat', 'WhiteSmoke', 'MediumTurquoise', 'Violet', 'Chartreuse', 'MediumAquaMarine', 'LightSteelBlue', 'MidnightBlue', 'SandyBrown', 'MistyRose', '#9e7339', '#4c4a3c', '#7b6b4f', '#cec093', '#bba38a', '#9d9d7e', '#6b7477', '#6e4a75', '#3f4042', '#d0b842', 'orange', 'dodgerblue', 'yellow', 'greenyellow', 'red', 'green', 'blue', 'navy', 'black', 'gray', 'chocolate', 'floralwhite', 'pink', 'tomato', 'silver', 'lightgreen', 'purple', 'lightgray', 'yellowgreen', 'greenyellow', 'lightblue', 'skyblue', 'cyan', 'AntiqueWhite', 'Aqua', 'Aquamarine', 'Brown', 'BlanchedAlmond', 'BlueViolet', 'BurlyWood', 'CadetBlue', 'Coral', 'CornflowerBlue'];

function directionDraw(val, param, color) {
    var directionDisplay;
    var allDestinations = [];
    var allDesttinations2 = [];
    var directionsService = new google.maps.DirectionsService();

    directionDisplay = new google.maps.DirectionsRenderer({
        polylineOptions: {
            strokeColor: color,
            strokeWeight: 5,
            strokeOpacity: 1
        }
    });

    $.each(val.Destinations, function(key, value) {
        var destination = {
            location: new google.maps.LatLng(value.LatitudDestinationTR1, value.LongitudDestinationTR1),
            stopover: false
        };
        var destination2 = value.LatitudDestinationTR1 + ',' + value.LongitudDestinationTR1;
        allDestinations.push(destination);
        allDesttinations2.push(destination2);
    });

    if (param == 0) {
        var realTimeDestination = {
            location: new google.maps.LatLng(val.LatitudMobility, val.LongitudMobility),
            stopover: false
        };
        allDestinations.splice(1, 0, realTimeDestination);
    }

    var count = Object.keys(allDesttinations2).length;
    var source = val.LatitudWarehouseLeave + ',' + val.LongitudWarehouseLeave;
    var destination = allDesttinations2[count - 1];

    // directionDisplay.setOptions({ suppressMarkers: false });
    directionDisplay.setMap(window.map);
    directions.push({ 'type': param, 'directionInfo': directionDisplay, 'allInfo': val });
    var request = {
        origin: source,
        destination: destination,
        waypoints: allDestinations,
        optimizeWaypoints: true,
        travelMode: google.maps.DirectionsTravelMode.DRIVING,
    };

    directionsService.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionDisplay.setDirections(response);
            var route = response.routes[0];
            var bounds = new google.maps.LatLngBounds();
            startLocation = new Object();
            endLocation = new Object();
            var legs = response.routes[0].legs;
            for (i = 0; i < legs.length; i++) {
                if (i == 0) {
                    startLocation.latlng = legs[i].start_location;
                    startLocation.address = legs[i].start_address;
                } else {
                    waypts[i] = new Object();
                    waypts[i].latlng = legs[i].start_location;
                    waypts[i].address = legs[i].start_address;
                }
                endLocation.latlng = legs[i].end_location;
                endLocation.address = legs[i].end_address;
                var steps = legs[i].steps;
                for (j = 0; j < steps.length; j++) {
                    var nextSegment = steps[j].path;
                    for (k = 0; k < nextSegment.length; k++) {
                        bounds.extend(nextSegment[k]);
                    }
                }
            }
        } else {
            alert("directions response " + status);
        }
        $.each(directions, function(index, val) {
            allDirections['type'] = 'real';
            allDirections['destinationInfo'] = val;
        });
    });
}

// Remove directions on map
function removeDirections(param, filterKey, filterVal) {
    // console.log(param + ' ' + filterKey + ' ' + filterVal);
    // console.log(directions);
    for (var i = 0; i < directions.length; i++) {
        if (directions[i].type == param) {
            directions[i].directionInfo.setMap(null);
        }
    }

    // if (filterKey != null && filterVal != null) {
    //     if (filterKey != 'trips') {
    //         $.each(truckMarkers, function(index, value) {
    //             $.each(value, function(index2, value2) {
    //                 if (index2 == filterKey) {
    //                     if (value2 == filterVal) {
    //                         value.marker.setMap(null);
    //                     }
    //                 }
    //             });
    //         });
    //     } else {
    //         $.each(directions, function(index, value) {
    //             console.log(value)
    //                 // $.each(value, function(index2, value2) {
    //                 //     if (index2 == filterKey) {
    //                 //         $.each(value2, function(index3, value3) {
    //                 //             if (value3.Trip == filterVal) {
    //                 //                 value.marker.setMap(null);
    //                 //             }
    //                 //         });
    //                 //     }
    //                 // });
    //         });
    //     }
    // } else {
    //     for (var i = 0; i < truckMarkers.length; i++) {
    //         truckMarkers[i].marker.setMap(null);
    //     }
    //     truckMarkers = [];
    // }
}

//****************************** Route Page *******************************//
var plannedMarkers = [];
var realMarkers = [];
var locationFilters = [];

function routeInitMap() {
    var latLong = {
        lat: parseFloat(realTrip[0].LatitudMobility),
        lng: parseFloat(realTrip[0].LongitudMobility)
    };
    window.map = new google.maps.Map(
        document.getElementById('map'), {
            zoom: 15,
            center: latLong
        });
}

// For planned route
function plannedRoute() {
    var lKeyCount = 0;
    $.each(plannedTrip, function(key, val) {
        if (key >= plannedColors.length) {
            lKeyCount = 0;
        } else {
            directionDraw(val, 1, plannedColors[lKeyCount]);
            lKeyCount += 1
        }
    });
}

// Remove truck markers on planned route
function removePlannedMarkers() {
    for (var i = 0; i < plannedMarkers.length; i++) {
        plannedMarkers[i].setMap(null);
    }
    plannedMarkers = [];
};

// Add truck markers on real route
function realRoute() {
    let icon = {
        url: window.location.protocol + "//" + window.location.hostname + "/images/Trucks_position_on_map_default.svg",
        scaledSize: new google.maps.Size(40, 40),
    };
    var lKeyCount = 0;
    let typeVehicle = $("#typeVehicle3").closest('td').find('div:first-child p').text();
    let stateTruck = $("#stateTruck3").closest('td').find('div:first-child p').text();

    $.each(realTrip, function(key, val) {
        let realMarker = new google.maps.Marker({
            position: {
                lat: parseFloat(val.LatitudMobility),
                lng: parseFloat(val.LongitudMobility)
            },
            title: "Truck",
            icon: icon,
        });

        let contentString = '<div id="content" style="color:#105c6d; font-size:11px;">' +
            '<p id="firstHeading" class="firstHeading font-weight-bold mb-2">' + typeVehicle + ': ' + val.TypeVehicle + '</p>' +
            '<p id="firstHeading" class="firstHeading font-weight-bold mb-2">' + stateTruck + ': ' + val.StateTruck + '</p>' +
            '<span class="markerTruckId" id="' + val.IdViaje + '" style="display:none">' +
            '</div>';
        let infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        infowindow.open(map, realMarker);
        google.maps.event.addListener(realMarker, 'click', function() {


            setTimeout(function() {
                var markerId = $(".markerTruckId").attr("id");
                if (markerId == val.IdViaje) {
                    $("#sizeTruckShow").text(val.SizeTruckShow);
                    $("#trip3").text(val.Trip);
                    $("#contact").text(val.Contact);
                    $("#latitudMobility").text(val.LatitudMobility);
                    $("#longitudMobility").text(val.LongitudMobility);
                    $("#lastDateMobility").text(val.LastDateMobility);
                    $("#fechaHoraAutomaticasActivity").text(val.FechaHoraAutomaticasActivity);
                    $("#exactitudcoordenadasActivity").text(val.ExactitudCoordenadasActivity);
                    $("#disponibilidadCoordenadasActivity").text(val.DisponibilidadCoordenadasActivity);
                    $("#mockedActivity").text(val.IsMockedActivity);
                    $("#warehouseLeave").text(val.WarehouseLeave);
                    $("#latitudWarehouseLeave").text(val.LatitudWarehouseLeave);
                    $("#longitudWarehouseLeave").text(val.LongitudWarehouseLeave);
                    $("#warehouseReturn").text(val.WarehouseReturn);
                    $("#latitudWarehouseReturn").text(val.LatitudWarehouseReturn);
                    $("#longitudWarehouseReturn").text(val.LongitudWarehouseReturn);
                    $("#typeVehicle3").text(val.TypeVehicle);
                    $("#stateTruck3").text(val.StateTruck);
                    $("#km_h").text(val['Km-h']);
                    $("#places").text(val.Placas);
                    $("#numberTruck").text(val.NumberTruck);
                    $("#maxWeight").text(val.MaxWeight);
                    $("#maxVolume").text(val.MaxVolume);
                    $("#maxCostMerchandise").text(val.MaxCostMerchadise);
                    $("#km").text(val.Km);
                    $("#cost").text(val.Cost);
                    $("#_volume").text(val.MaxVolume);
                    $("#_weight").text(val.MaxWeight);
                    $("#driver3").text(val.Driver);
                    $("#driverRanking").text(val.RankingDriver);
                    $("#actualWeight").text(val.ActualWeight);
                    $("#actualVolume").text(val.ActualVolumen);
                    $("#actualCostMerchandise").text(val.ActualCostMerchandise);
                    $("#numberDestinations").text(val.NumberDestinations);
                    $("#numberPackages").text(val.NumberPackages);
                    $("#typePackages").text(val.TypePackages);
                    $("#numberPieces").text(val.NumberPieces);
                    $("#nextDestination").text(val.NextDestination);
                    $("#nextDestinationArrivalDate").text(val.NextDestinationArrival);
                    $("#traveled_km").text(val.KmRecorridos);
                    $("#kmToGo").text(val.KmPorRecorrer);
                    $("#toDeliverNumberDestinations").text(val.ToDeliverNumberDestinations);
                    $("#toDeliverNumberPackages").text(val.ToDeliverNumberPackages);
                    $("#estimatedFinishRoute").text(val.EstimatedFinishRoute);
                    $("#mailMessages").text(val.MailMessages);
                    $("#whatsappMessages").text(val.WahtsAppMessages);
                }
                $(".truckInfo").fadeIn();
            }, 10);
        });
        google.maps.event.addListener(realMarker, 'mouseout', function() {
            infowindow.close();
        });

        realMarker.setMap(window.map);
        window.map.setZoom(5);
        window.map.setCenter(new google.maps.LatLng(val.LatitudMobility, val.LongitudMobility));
        realMarkers.push(realMarker);

        if (key >= realColors.length) {
            lKeyCount = 0;
        } else {
            directionDraw(val, 0, realColors[lKeyCount]);
            lKeyCount += 1
        }
    });
}

// Remove truck markers on real route
function removeRealMarkers() {
    for (var i = 0; i < realMarkers.length; i++) {
        realMarkers[i].setMap(null);
    }
    realMarkers = [];
};

// For filter options
var passedParam;
var markerName;

function filterLocations(param, marker) {
    $.each(realTrip, function(key, val) {
        var myPlace = {
            lat: parseFloat(val.LatitudMobility),
            lng: parseFloat(val.LongitudMobility)
        };
        var sydney = new google.maps.LatLng(val.LatitudMobility, val.LongitudMobility);
        infowindow = new google.maps.InfoWindow();
        service = new google.maps.places.PlacesService(window.map);
        service.nearbySearch({
            location: myPlace,
            radius: 20,
            type: [param]
        }, callback);
    });
    passedParam = param;
    markerName = marker;
}

function callback(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
        }
    }
}

function createMarker(place) {
    var placeLoc = place.geometry.location;
    let icon = {
        url: window.location.protocol + "//" + window.location.hostname + "/images/" + markerName + "_on_map.svg",
        scaledSize: new google.maps.Size(40, 40),
    }
    var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location,
        icon: icon,
        title: passedParam
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(place.name);
        infowindow.open(map, this);
    });
    window.map.setZoom(16);
    $.each(realTrip, function(key, val) {
        window.map.setCenter(new google.maps.LatLng(val.LatitudMobility, val.LongitudMobility));
    });
    locationFilters.push(marker);
}

function removeFilterLocations(param) {
    for (var i = 0; i < locationFilters.length; i++) {
        if (locationFilters[i].title == param) {
            locationFilters[i].setMap(null);
        }
    }
}