document.onreadystatechange = function(){}
Array.prototype.remove = function() {var what, a = arguments, L = a.length, ax;while (L && this.length) {what = a[--L];while ((ax = this.indexOf(what)) !== -1) {this.splice(ax, 1);}}return this;};

let center = [47.17137484268985, 19.852842032237014];
let zoom = 8;
let minZoom = 8;
let maxZoom = 19;
let attribution = '';
let forestApiKey = 'de8a0994826943329dca3886fce615d6';
let ext = "png";
var hand_radios = L.layerGroup();
var desk_radios = L.layerGroup();
var dmrs = L.layerGroup();
var towers = L.layerGroup();
var parrots = L.layerGroup();
var zello = L.layerGroup();
var tempact = L.layerGroup();
var searchLayer = L.layerGroup();

var radar = L.layerGroup();

$(document).ready(function(){
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')  
    
    /*detect phones*/
    if(MobileEsp.DetectTierTablet() || MobileEsp.DetectTierIphone()){ $("#android_panel").hide(); };
    try{
        var maidenhead = L.maidenhead({color : 'rgba(255, 0, 0, 0.4)'});
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            minZoom: minZoom,
            maxZoom: maxZoom,
            attribution: attribution
        });
        var stadia = L.tileLayer('https://tiles.stadiamaps.com/tiles/outdoors/{z}/{x}/{y}{r}.png', {
            minZoom: minZoom,
            maxZoom: maxZoom,
            attribution: attribution
        });
        var pioneer = L.tileLayer('https://tile.thunderforest.com/pioneer/{z}/{x}/{y}.png?apikey=de8a0994826943329dca3886fce615d6', {
            minZoom: minZoom,
            maxZoom: maxZoom,
            attribution: attribution,
            apikey: forestApiKey
        });
        var Stamen_Terrain = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/terrain/{z}/{x}/{y}{r}.{ext}', {
            minZoom: minZoom,
            maxZoom: maxZoom,
            attribution: attribution,
            ext: ext
        });
        var CartoDB_DarkMatter = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
            minZoom: minZoom,
            maxZoom: maxZoom,
            attribution: attribution
        });
        var Atlas = L.tileLayer('https://tile.thunderforest.com/atlas/{z}/{x}/{y}.png?apikey=de8a0994826943329dca3886fce615d6', {
            minZoom: minZoom,
            maxZoom: maxZoom,
            attribution: attribution,
            apikey: forestApiKey
        });
   
        var map = L.map('windy', {
            center: center,
            zoom: zoom,
            minZoom: 8,
            maxZoom: 16,
            doubleClickZoom: false,
            contextmenu: true,
            contextmenuItems: [],
            layers: [osm]
        });
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: ''
        }).addTo(map);

        navigator.geolocation.getCurrentPosition(function(location) {
            var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
            var marker = L.marker(latlng).addTo(map);
        });

        

        map.addControl(new L.Control.Search({
            url: 'https://nominatim.openstreetmap.org/search?format=json&q={s}',
            jsonpParam: 'json_callback',
            propertyName: 'display_name',
            propertyLoc: ['lat','lon'],
            marker: null,
            autoCollapse: false,
            autoType: true,
            minLength: 2,
            zoom: 12
        }));

        /*Add radar*/
        var radarUrl = "https://mesonet.agron.iastate.edu/cgi-bin/wms/nexrad/n0q.cgi";
        var radarDisplayOptions = {
            layers: "nexrad-n0q-900913",
            format: "image/png",
            transparent: true
        };
        radar = L.tileLayer.wms(radarUrl, radarDisplayOptions);

        getRadios(map, L, hand_radios, desk_radios, towers, parrots, zello);
        getParrots(map, L, parrots);
        getDMRs(map,L,dmrs);
        getTempAct(map,L,tempact);

        if($("#map").hasClass('logDetail')){
            var myPos = new L.LatLng($("#my_lat").val(), $("#my_lon").val());
            var pPos = new L.LatLng($("#partner_lat").val(), $("#partner_lon").val());
            var myMarker = L.marker(myPos, {icon: getActiveIcon()}).bindPopup().addTo(map);
            var pMarker = L.marker(pPos, {icon: getActiveIcon()}).bindPopup().addTo(map);
            var cLat = (myPos.lat + pPos.lat) / 2;
            var cLon = (myPos.lng + pPos.lng) / 2;
            var points = [myPos, pPos];
            new L.polyline(points, {
                color: 'red',
                weight: 3,
                opacity: 0.5,
                smoothFactor: 1                
            }).addTo(map);
            map.setView([cLat, cLon], 10);
            var distance = map.distance(myPos, pPos);
            distance = (distance / 1000).toFixed(2);
            $("#distance").html(distance);
        }

        var baseMaps = {
            "Open Street Map": osm,
            "Stadia": stadia,
            "Pioneer": pioneer,
            "Stamen Terrain": Stamen_Terrain,
            "Dark Matter": CartoDB_DarkMatter,
            'Atlas': Atlas
        };
        var overlayMaps = {
            "Kézi rádiók": hand_radios,
            "Asztali rádiók": desk_radios,
            "Átjátszók": towers,
            "Papagájok": parrots,
            "Zello": zello,
            "DMR": dmrs,
            "Kitelepülések": tempact,
            "Lokátor kódok (beta)": maidenhead,
            "Időjárás radar (beta)": radar
        };
        var layerControl = L.control.layers(baseMaps, overlayMaps, {collapsed: false}).addTo(map);
        
        $("#loader").hide();
        var overlays = [];
        /*Get cookies*/        
        var acceptCookies = getCookie('acceptCookies');    
        if(!acceptCookies)
        {
            const cookieModal = new bootstrap.Modal('#cookiemodal', {
                keyboard: false,
                backdrop: false,
                focus: true
            });
            cookieModal.show();
        };
        var lastPosition = getCookie('lastPosition');
        if(lastPosition)
        {
            if($("#map").hasClass('logDetail') == false){
                var obj = JSON.parse(lastPosition);
                var coords = L.latLng(obj[0], obj[1]);
                var zoom = obj[2];
                map.setView([obj[0], obj[1]], zoom);
            };
        }else{
            map.setView([center[0], center[1]], 8); 
        };
        var userMapStyle = getCookie('userMapStyle');
        if(userMapStyle)
        {
            switch(userMapStyle){
                case "Open Street Map": map.addLayer(osm); break;
                case "Stadia": map.addLayer(stadia); break;
                case "Pioneer":  map.addLayer(pioneer); break;
                case "Stamen Terrain":  map.addLayer(Stamen_Terrain); break;
                case "Dark Matter": map.addLayer(CartoDB_DarkMatter); break;
                case "Atlas": map.addLayer(Atlas); break;
            };
        }else{             
            map.addLayer(osm);
            setCookie("userMapStyle", "Open Street Map");
        };
        var overlaysJson = getCookie('userOverlays');
        if(overlaysJson){
            overlays = JSON.parse(overlaysJson);
            overlays.forEach(function(item){
                switch(item)
                {
                    case "Kézi rádiók": map.addLayer(hand_radios); break;
                    case "Asztali rádiók": map.addLayer(desk_radios); break;
                    case "Átjátszók": map.addLayer(towers); break;
                    case "Papagájok": map.addLayer(parrots); break;
                    case "DMR": map.addLayer(dmrs); break;
                    case "Kitelepülések": map.addLayer(tempact); break;
                    case "Lokátor kódok (beta)": map.addLayer(maidenhead); break;
                    case "Időjárás radar (beta)": map.addLayer(radar); break;
                }
            });
        };
        if($("#map").hasClass('logDetail') == false){
            map.on('baselayerchange', function(e){
                setCookie("userMapStyle", e.name);
                console.log(e.name);
            });
            map.on('overlayadd', function(e){
                overlays.push(e.name);
                console.log(overlays);
                var json = JSON.stringify(overlays);
                setCookie("userOverlays", json);
            });
            map.on('overlayremove', function(e){
                overlays.remove(e.name);
                console.log(overlays);
                var json = JSON.stringify(overlays);
                setCookie("userOverlays", json);
            });
            map.on('moveend', function(e){
                var opt = [
                    e.target._renderer._center.lat,
                    e.target._renderer._center.lng,
                    e.target._zoom
                ];
                var json = JSON.stringify(opt);
                setCookie("lastPosition", json);
            });
            map.on('zoomend', function(e){
                var zopt = [
                    e.target._renderer._center.lat,
                    e.target._renderer._center.lng,
                    e.target._zoom
                ];
                var json = JSON.stringify(zopt);
                setCookie("lastPosition", json);
            });
        };
    }catch(err){
        console.log(err);
        $("#loader").hide();
    };
});
function acceptCookies()
{
    setCookie("acceptCookies","OK");
}
function decineCookies()
{
    document.location.assign('https://google.com');
}
function setCookie(name,value)
{
    document.cookie = name + "=" + (value || "") + "; path=/";
}
function getCookie(name)
{
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function clearCookies()
{
    console.log(document.cookie);
    setCookie('userOverlays',null);
    setCookie('lastPosition',null);
    setCookie('userMapStyle',null);
    setCookie('acceptCookies', null);
    console.log(document.cookie);
}



function getRadios(map, L, hand_radios, desk_radios, towers, carrots, zello)
{
    $.getJSON("./getRadios", function(data){
        $.each(data, function(i, radio){
            var marker = L.marker([radio.lat, radio.lon], {
                icon: getRadioIcon(radio), 
                contextmenu: true,
                contextmenuItems: [
                    {
                        text: 'Ez a funkció itt nem áll rendelkezésre!',
                        index: 0
                    }
                ]
            })
            .bindPopup((radio.callsign.includes("NOME") ? "" : radio.callsign + " | " ) + radio.name)
			.on('mouseover', function(e){this.openPopup();})
			.on('mouseout', function(e){this.closePopup();})
            .on('click', function(e){
                const bsOffcanvas = new bootstrap.Offcanvas('#offcanvas');
                $("#offcanvasLabel").html('<b>' + radio.callsign + " | " + radio.name + '</b>');
                $("#offcanvasBody").html('<hr/>' + (radio.description == null ? "" : radio.description));
                bsOffcanvas.show();
            });
            switch(radio.type)
            {
                case "Kézi": hand_radios.addLayer(marker); break;
                case "Asztali": desk_radios.addLayer(marker); break;
                case "Zello": zello.addLayer(marker); break;
            };            
        });
    })
}
function getTempAct(map,L,tempact)
{
    $.getJSON("./getTemps", function(data){
        $.each(data, function(i, radio){
            var popup = "<center><b>" + radio.callsign + "</b></center>";
            popup += "<hr/>";
            popup += "Mettől: <b>" + radio.dFrom + "</b><br/>";
            popup += "Meddig: <b>" + radio.dTo + "</b><br/>";
            popup += "<hr/>";
            popup += "Freq: <b>" + analyzeFreq(radio.freq) + "</b><br/>";
            popup += "CTCSS: <b>" + radio.ctcss + "</b><br/>";
            popup += "DCS: <b>" + radio.dcs + "</b><br/>";
            popup += "<hr/>" + radio.description;

            var marker = L.marker([radio.lat, radio.lon], {
                icon: getTempIcon(),
                contextmenu: true,
                contextmenuItems: [
                    {
                        text: 'Ez a funkció itt nem áll rendelkezésre!',
                        index: 0
                    }
                ]
            })
            .bindPopup(popup)
			.on('mouseover', function(e){this.openPopup();})
			.on('mouseout', function(e){this.closePopup();})
            .on('click', function(e){
                const bsOffcanvas = new bootstrap.Offcanvas('#offcanvas');
                $("#offcanvasLabel").html('<b>Létrehozta:' + radio.callsign + '</b>');
                var body = "Mettől: <b>" + radio.dFrom + "</b><br/>";
                body += "Meddig: <b>" + radio.dTo + "</b><br/>";
                body += "<hr/>";
                body += "Freq: <b>" + analyzeFreq(radio.freq) + "</b><br/>";
                body += "CTCSS: <b>" + radio.ctcss + "</b><br/>";
                body += "DCS: <b>" + radio.dcs + "</b><br/>";
                body += "<hr/>" + radio.description;
                $("#offcanvasBody").html('<hr/>' + body);
                bsOffcanvas.show();
            });
            tempact.addLayer(marker);
        });
    })
}
function getParrots(map,L,parrots)
{
    $.getJSON("./getParrots", function(data){
        $.each(data, function(i,p){
			var lastOnline = (p.lastOnline == null ? "Nincs adat" : p.lastOnline);	
            var ask = '<div class="btn-group" role="group" aria-label="Basic example"><a href="./active/' + p.id + '" class="btn btn-success text-white">Igen</a><a href="./inactive/'+p.id+'" class="btn btn-danger text-white">Nem</a></div>';
            var marker = L.marker([p.lat, p.lon], {
                icon: getParrotIcon(),
                contextmenu: true,
                contextmenuItems: [
                    {
                        text: 'Ez a funkció itt nem áll rendelkezésre!',
                        index: 0
                    }
                ]
            })
            .bindPopup(p.name + "<hr/>" + p.description + "<hr/>Utoljára aktív: " + lastOnline)
            .on('mouseover', function(e){this.openPopup();})
			.on('mouseout', function(e){this.closePopup();})
            .on('click', function(e){
                const bsOffcanvas = new bootstrap.Offcanvas('#offcanvas');
                $("#offcanvasLabel").html('<b>' + p.name + '</b>');
                var log = '<ul class="list-group" id="logList"></ul>';
                $.getJSON("./getParrotLog/" + p.id, function(_log){
                    $.each(_log, function(j, item){
                        var itemClass = (item.active == 1 ? "list-group-item-success" : "list-group-item-danger");
                        var itemRow = item.date + " " + (item.active == 1 ? " AKTÍV " : " INAKTÍV ");
                        $("#logList").append('<li class="list-group-item ' + itemClass + '">' + itemRow + '</li>');
                    });                    
                });
                var body = '<hr/>' + (p.description == null ? "" : p.description) + "<br/>Utoljára aktív: " + lastOnline + "<hr/><center>Aktív most?</center><br/><center>" + ask + "</center>";
                body += "<hr/><center><b>Napló</b></center>" + log;
                $("#offcanvasBody").html(body);
                bsOffcanvas.show();
            });
            parrots.addLayer(marker);

            try{
            if(p.coverage != "[]"){ 
                drawCoverage(p,map,L,parrots); 
            }else{
                var color = (p.color != null ? '#' + p.color : '#3388ff');
                var radius = new L.circle([p.lat, p.lon], 10000, {color: color})
                    .on('click', function(e){
                        const bsOffcanvas = new bootstrap.Offcanvas('#offcanvas');
                        $("#offcanvasLabel").html('<b>' + p.name + '</b>');
                        $("#offcanvasBody").html('<hr/><center>' + p.name + ' lefedettsége (automatikusan generált)</center>');
                        bsOffcanvas.show();
                    });
                parrots.addLayer(radius);
            }
            }catch(err){
                console.log(err);
            }
        })
    })
}
function drawCoverage(p,map,L,parrots)
{
	var cItem = $.parseJSON(p.coverage);
	var latlngs = [];
	$.each(cItem, function(key,val){
		latlngs.push([val[0], val[1]]);
	});			
	var cLayer = L.polygon(latlngs, {color: '#' + p.color })
        .on('mouseover', function(e){ this.openPopup(); })
        .on('mouseout', function(e){this.closePopup(); })
        .on('click', function(e){
            const bsOffcanvas = new bootstrap.Offcanvas('#offcanvas');
            $("#offcanvasLabel").html('<b>' + p.name + '</b>');
            $("#offcanvasBody").html('<hr/><center>' + p.name + ' lefedettsége</center>');
            bsOffcanvas.show();
        })
	parrots.addLayer(cLayer);
}
function getDMRs(map,L,dmrs)
{
	$.getJSON("./getDMRs", function(data){
        $.each(data, function(i,p){
			let popup = "<b>" + p.name + "</b><hr/>" + p.description + "<br/>" + p.freq + " (" + p.offset + ")<br/>";
			popup += "DMRID: " + p.dmrid + "<br/>CC: " + p.ccid;
			var marker = L.marker([p.lat, p.lon], {icon: getDMRIcon()}).bindPopup(popup)
            .on('mouseover', function(e){this.openPopup();})
			.on('mouseout', function(e){this.closePopup();});			
            dmrs.addLayer(marker);
        })
    })
}

function getRadioIcon(r)
{
    var path = "";
    switch(r.type){
        case "Kézi": path = "./assets/img/icons/walkie-talkie.svg"; break;
        case "Asztali": path = "./assets/img/icons/tower-cell.svg"; break;
        case "Zello": path = "./assets/img/icons/square-z.svg"; break;
        case "parrot": path = "./assets/img/icons/parrot.png"; break;
    };
    var icon = L.icon({
        iconUrl: path,
        shadowUrl: '',    
        iconSize:     [16, 16],
        shadowSize:   [0, 0],
        iconAnchor:   [8, 8],
        shadowAnchor: [0, 0],
        popupAnchor:  [0, -8]
    });
    return icon;
}
function getParrotIcon()
{
    var icon = L.icon({
        iconUrl: "./assets/img/icons/parrot.png",
        shadowUrl: '',    
        iconSize:     [24, 24],
        shadowSize:   [0, 0],
        iconAnchor:   [12, 12],
        shadowAnchor: [0, 0],
        popupAnchor:  [0, -12]
    });
    return icon;
}
function getDMRIcon()
{
    var icon = L.icon({
        iconUrl: "./assets/img/icons/dmr.png",
        shadowUrl: '',
    
        iconSize:     [32, 20],
        shadowSize:   [0, 0],
        iconAnchor:   [16, 10],
        shadowAnchor: [0, 0],
        popupAnchor:  [0, -10]
    });
    return icon;
}
function getTempIcon()
{
    var icon = L.icon({
        iconUrl: "./assets/img/icons/walkie-talkie-red.svg",
        shadowUrl: '',    
        iconSize:     [32, 20],
        shadowSize:   [0, 0],
        iconAnchor:   [16, 10],
        shadowAnchor: [0, 0],
        popupAnchor:  [0, -10]
    });
    return icon;
}
function getActiveIcon()
{
    var icon = L.icon({
        iconUrl: "./assets/img/icons/walkie-talkie-active.svg",
        shadowUrl: '',    
        iconSize:     [32, 20],
        shadowSize:   [0, 0],
        iconAnchor:   [16, 10],
        shadowAnchor: [0, 0],
        popupAnchor:  [0, -10]
    });
    return icon;
}
function geolocate(prefix = "")
{
    var address = $("#" + prefix + "addr").val();
    alert(address);
    $.getJSON('https://nominatim.openstreetmap.org/search?format=json&q=' + address, function(data){
        $("#" + prefix + "lat").val(data[0].lat);
        $("#" + prefix + "lon").val(data[0].lon);
    });
}
function analyzeFreq(freq)
{
    switch(freq)
    {
        case "446.00625": return "PMR-1 ( " + freq + ")"; break;
        case "446.01875": return "PMR-2 ( " + freq + ")"; break;
        case "446.03125": return "PMR-3 ( " + freq + ")"; break;
        case "446.04375": return "PMR-4 ( " + freq + ")"; break;
        case "446.05625": return "PMR-5 ( " + freq + ")"; break;
        case "446.06875": return "PMR-6 ( " + freq + ")"; break;
        case "446.08125": return "PMR-7 ( " + freq + ")"; break;
        case "446.09375": return "PMR-8 ( " + freq + ")"; break;
        case "446.10625": return "PMR-9 ( " + freq + ")"; break;
        case "446.11875": return "PMR-10 ( " + freq + ")"; break;
        case "446.13125": return "PMR-11 ( " + freq + ")"; break;
        case "446.14375": return "PMR-12 ( " + freq + ")"; break;
        case "446.15625": return "PMR-13 ( " + freq + ")"; break;
        case "446.16875": return "PMR-14 ( " + freq + ")"; break;
        case "446.18125": return "PMR-15 ( " + freq + ")"; break;
        case "446.19375": return "PMR-16 ( " + freq + ")"; break;
        default: return freq; break;
    }
}
function validate_via()
{
    var via = $("#via").val();
    if(via == "parrot"){ $("#parrotField").removeClass('hidden'); }else{ $("#parrotField").addClass('hidden'); };
}