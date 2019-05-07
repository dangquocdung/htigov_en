(function (window, $) {
    "use strict";
    var w_icons_codes = {
        0: "900", //tornado
        1: "901", //tropical storm
        2: "902", //hurricane
        3: "212", //severe thunderstorms
        4: "200", //thunderstorms
        5: "616", //mixed rain and snow
        6: "612", //mixed rain and sleet
        7: "611", //mixed snow and sleet
        8: "511", //freezing drizzle
        9: "301", //drizzle
        10: "511", //freezing rain
        11: "521", //showers
        12: "521", //showers
        13: "600", //snow flurries
        14: "615", //light snow showers
        15: "601", //blowing snow
        16: "601", //snow
        17: "906", //hail
        18: "611", //sleet
        19: "761", //dust
        20: "741", //foggy
        21: "721", //haze
        22: "711", //smoky
        23: "956", //blustery
        24: "954", //windy
        25: "903", //cold
        26: "802", //cloudy
        27: "802", //mostly cloudy (night)
        28: "802", //mostly cloudy (day)
        29: "802", //partly cloudy (night)
        30: "802", //partly cloudy (day)
        31: "800", //clear (night)
        32: "800", //sunny
        33: "951", //fair (night)
        34: "951", //fair (day)
        35: "906", //mixed rain and hail
        36: "904", //hot
        37: "210", //isolated thunderstorms
        38: "210", //scattered thunderstorms
        39: "210", //scattered thunderstorms
        40: "521", //scattered showers
        41: "602", //heavy snow
        42: "621", //scattered snow showers
        43: "602", //heavy snow
        44: "802", //partly cloudy
        45: "201", //thundershowers
        46: "621", //snow showers
        47: "210", //isolated thundershowers
        3200: "951" //not available... alright... lets make that sunny.
    }
    //Plugin constructor    
    var _this;
    var _loading_generate;
    var _data;
    var _weather;
    var _style1_generation;
    var _style2_generation;
    var _style3_generation;
    var _style4_generation;
    var _style5_generation;
    var _style6_generation;
    var hwPlugin = function (elem, options) {               
        this.elem = elem;
        this.$elem = $(elem);
        this.options = options;
        this.responseData;        
    };
    hwPlugin.prototype = {
        //Create the defaults
        defaults: {
            style: 'style1', //which style for generation            
            show_weekly: true, //showing weekly view for styles weekly
            country: "nome,ak", //country or city name
            displayCityNameOnly: true, //showing full location information
            show_weatherIcon: true, //showing weather icon
            show_detailed: true, //showing detailed viewa
            loading_animation: true, //show loading animation before plugins load
            show_weatherType: true, //showing weather type
            temperature_metrics: "F", //temperature metric C or F
            show_date: true, //show date 
            theme_color: "color-default active", //theme suitable for selecting color
            afterGenerated: function (e) { }

        },        
        init: function () {            
            this.config = $.extend({}, this.defaults, this.options);
            if (this.config.loading_animation) {
                this.show_loading();
            }          
            //Plugin url for temperature metric
            if (this.config.temperature_metrics === "C") {
                this.plugin_url = 'https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22' + this.config.country + '%22%20)%20and%20u%3D%22c%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys';
                console.log(this.plugin_url);
            }
            else {
                this.plugin_url = 'https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22' + this.config.country + '%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys';
                console.log(this.plugin_url);
            }
            this.send_request();            

            return this;
        },       
        show_loading: function () {                       
            _this = this;            
            _this.$elem.css({ 'position': 'relative' });

            _loading_generate = '<div class="hw-loading"></div>';
            this.display(_loading_generate);
        },
        generate: function () {            
            _this = this;
            _data = this.responseData;
            if (_data.query.count === 0) {               
                _this.display('<div class="error-messages"><h2>Not found any information</h2></div>');
            }
            else {
                switch (this.config.style) {
                    case 'style1':
                    default:
                        _this.generate_style1();
                        break;
                    case 'style2':
                        _this.generate_style2();
                        break;
                    case 'style3':
                        _this.generate_style3();
                        break;
                    case 'style4':
                        _this.generate_style4();
                        break;
                    case 'style5':
                        _this.generate_style5();
                        break;
                    case 'style6':
                        _this.generate_style6();
                        break;
                }
            }
            
            if (this.config.afterGenerated !== undefined) {
                this.config.afterGenerated();
            }

        },
        display: function (html) {            
            this.$elem.html(html);
        },

        /**
        *Styles generate
        */
        generate_style1: function (weather) {            
            _data = this.responseData;
            _weather = _data.query.results.channel;
           
                _style1_generation = '<div class="weather-forecast oneday '+this.config.theme_color+'">' +
                        '<div class="hw-weatherIcon">'

                if (this.config.show_detailed) {
                    _style1_generation += '<span class="fa fa-bars hw-details-icon"></span><div class="hw-more-details">'
                          + '<span class="fa fa-times hw-close-icon"></span>'
                          + '<div class="hw-details-info-section">'
                               + '<p class="hw-today-date">' + _weather.item.forecast[0].date + '</p><div class="hw-detailed-info">'
                               + '<p class="hw-humidity">Humidity: <br/>' + _weather.atmosphere.humidity + '</p>'
                               + '<p class="hw-wind-speed">Wind speed: <br/>' + _weather.wind.speed + " " + _weather.units.speed + '</p></div></div></div>';
                }
                if (this.config.show_date) {
                    _style1_generation += '<p class="hw-date">' + _weather.item.forecast[0].day + '</p>';
                }
                if (this.config.show_weatherType) {
                    _style1_generation += '<p class="hw-weatherType">' + _weather.item.condition.text + '</p>';
                }

                _style1_generation += '<p class="hw-weatherDegree">' + _weather.item.condition.temp + '<sup>°</sup></p>';

                if (this.config.show_weatherIcon) {
                    _style1_generation += '<div class="hw-icon hw-icon' + w_icons_codes[_weather.item.forecast[0].code] + '"></div>';
                }
                _style1_generation += '</div><div class="hw-infoWeather">';
                if (this.config.displayCityNameOnly) {
                    _style1_generation += '<h2 class="hw-location">' + _weather.location.city + '</h2>';
                }
                else {
                    _style1_generation += '<h2 class="hw-location" style="font-size:18px;margin-top:6%">' + _weather.location.country + ',' + _weather.location.city + ',' + _weather.location.region + '</h2>';
                }
                var degrees = this.config.temperature_metrics == "C" ? "&#176;C" : "&#176;F";
                _style1_generation += ' <p class="hw-temperature"><span class="hw-temp-min">' + _weather.item.forecast[0].low +
                    '</span>-<span class="hw-temp-max">' + _weather.item.forecast[0].high + '</span><sup>' + degrees + '</sup></p>' +
                        '</div> </div>';            
            
                this.display(_style1_generation);
          
        },
        generate_style2: function (weather) {            
            _data = this.responseData;
            _weather = _data.query.results.channel;           
                var degrees = this.config.temperature_metrics === "C" ? "&#176;C" : "&#176;F";
                _style2_generation = '<div class="weather-forecast oneday ' + this.config.theme_color + '">' +
                        '<div class="hw-weatherIcon">';
                if (this.config.show_detailed) {
                    _style2_generation += '<span class="fa fa-bars hw-details-icon"></span><div class="hw-more-details">'
                          + '<span class="fa fa-times hw-close-icon"></span>'
                          + '<div class="hw-details-info-section">'
                               + '<p class="hw-today-date">' + _weather.item.forecast[0].date + '</p><div class="hw-detailed-info">'
                               + '<p class="hw-humidity">Humidity: <br/>' + _weather.atmosphere.humidity + '</p>'
                               + '<p class="hw-wind-speed">Wind speed: <br/>' + _weather.wind.speed + " " + _weather.units.speed + '</p></div></div></div>';
                }
                if (this.config.displayCityNameOnly) {
                    _style2_generation += '<h2 class="hw-location">' + _weather.location.city + '</h2>';
                }
                else {
                    _style2_generation += '<h2 class="hw-location" style="font-size:18px">' + _weather.location.country + ',' + _weather.location.city + ',' + _weather.location.region + '</h2>';
                }

                if (this.config.show_date) {
                    _style2_generation += '<p class="hw-date">' + _weather.item.forecast[0].day + '</p>';
                }
                if (this.config.show_weatherType) {
                    _style2_generation += '<p class="hw-weatherType">' + _weather.item.condition.text + '</p>';
                }
                if (this.config.show_weatherIcon) {
                    _style2_generation += '<div class="hw-icon hw-icon' + w_icons_codes[_weather.item.forecast[0].code] + '"></div>';
                }

                _style2_generation += ' <span>Now</span><p class="hw-temperature-now">' + _weather.item.condition.temp + '<sup>°</sup></p>';

                _style2_generation += ' </div><div class="hw-polygon-split"></div><div class="hw-infoWeather">';

                _style2_generation += ' <span class="left">Today</span><p class="hw-overall-temperature"><span class="hw-temp-min">' + _weather.item.forecast[0].low +
                    '</span>-<span class="hw-temp-max">' + _weather.item.forecast[0].high + '</span><sup>' + degrees + '</sup></p>' +
                        '</div> </div>';

                this.display(_style2_generation);
        },
        generate_style3: function (weather) {            
            _data = this.responseData;
            _weather = _data.query.results.channel;
            try{
                var degrees = this.config.temperature_metrics === "C" ? "&#176;C" : "&#176;F";
                if (this.config.show_weekly) {
                    _style3_generation = '<div class="weather-forecast weekly ' + this.config.theme_color + '">' +
                      '<div class="hw-weatherIcon">';
                }
                else {
                    _style3_generation = '<div class="weather-forecast oneday ' + this.config.theme_color + '">' +
                      '<div class="hw-weatherIcon">';
                }
                if (this.config.show_detailed) {
                    _style3_generation += '<span class="fa fa-bars hw-details-icon"></span><div class="hw-more-details">'
                          + '<span class="fa fa-times hw-close-icon"></span>'
                          + '<div class="hw-details-info-section">'
                               + '<p class="hw-today-date">' + _weather.item.forecast[0].date + '</p><div class="hw-detailed-info">'
                               + '<p class="hw-humidity">Humidity: <br/>' + _weather.atmosphere.humidity + '</p>'
                               + '<p class="hw-wind-speed">Wind speed: <br/>' + _weather.wind.speed + " " + _weather.units.speed + '</p></div></div></div>';
                }
                if (this.config.show_weatherIcon) {
                    _style3_generation += '<div class="hw-icon hw-icon' + w_icons_codes[_weather.item.forecast[0].code] + '"></div>';
                }
                _style3_generation +='<ul class="hw-info"><li class="hw-temperature">'+
                                     '<span>'+_weather.item.condition.temp+'<sup>°</sup></span></li>'+
                                '<li class="hw-info-section">';
                if (this.config.show_weatherType){
                    _style3_generation+='<p class="hw-weatherType">'+_weather.item.condition.text+'</p>';
                }
                if (this.config.displayCityNameOnly) {
                    _style3_generation += '<h2 class="hw-location">' + _weather.location.city + '</h2>';
                }
                else {
                    _style3_generation += '<h2 class="hw-location" style="font-size:18px">' + _weather.location.country + ',' + _weather.location.city + ',' + _weather.location.region + '</h2>';
                }  
                _style3_generation+='</li>';
                if (this.config.show_date) {
                    _style3_generation += '<li class="hw-date"><span>'+_weather.item.forecast[0].day+'</span></li>';
                } 
                _style3_generation += '</ul></div>';

                if (this.config.show_weekly) {
                    _style3_generation += '<div class="hw-infoWeather"><ul class="hw-weeklyForecast">'+
                          '<li class="hw-day"><span>' + _weather.item.forecast[1].day + '</span><ul>' +
                          '<li class="hw-weekDay-temperature">' + _weather.item.forecast[1].high + '<sup>°</sup></li></ul></li>' +
                          '<li class="hw-day"><span>' + _weather.item.forecast[2].day + '</span><ul>' +
                          '<li class="hw-weekDay-temperature">' + _weather.item.forecast[2].high + '<sup>°</sup></li></ul></li>' +
                          '<li class="hw-day"><span>' + _weather.item.forecast[3].day + '</span><ul>' +
                          '<li class="hw-weekDay-temperature">' + _weather.item.forecast[3].high + '<sup>°</sup></li></ul></li>' +
                          '<li class="hw-day"><span>' + _weather.item.forecast[4].day + '</span><ul>' +
                          '<li class="hw-weekDay-temperature">' + _weather.item.forecast[4].high + '<sup>°</sup></li></ul></li>' +
                          '<li class="hw-day"><span>' + _weather.item.forecast[5].day + '</span><ul>' +
                          '<li class="hw-weekDay-temperature">' + _weather.item.forecast[5].high + '<sup>°</sup></li></ul></li>' +
                          '</ul> </div>'
                }
                _style3_generation += '</div>';               
                this.display(_style3_generation);
            }
            catch (err) {               
            }            
            this.generate_style4();
        },
        generate_style4: function (weather) {            
            _data = this.responseData;
            _weather = _data.query.results.channel;           
                var degrees = this.config.temperature_metrics === "C" ? "&#176;C" : "&#176;F";
                if (this.config.show_weekly) {
                    _style4_generation = '<div class="weather-forecast weekly ' + this.config.theme_color + '">' +
                      '<div class="hw-weatherIcon" style="">';
                }
                else {
                    _style4_generation = '<div class="weather-forecast oneday ' + this.config.theme_color + '">' +
                      '<div class="hw-weatherIcon" style="width:100%">';
                }
                if (this.config.show_detailed) {
                    _style4_generation += '<span class="fa fa-bars hw-details-icon"></span><div class="hw-more-details">'
                          + '<span class="fa fa-times hw-close-icon"></span>'
                          + '<div class="hw-details-info-section">'
                               + '<p class="hw-today-date">' + _weather.item.forecast[0].date + '</p><div class="hw-detailed-info">'
                               + '<p class="hw-humidity">Humidity: <br/>' + _weather.atmosphere.humidity + '</p>'
                               + '<p class="hw-wind-speed">Wind speed: <br/>' + _weather.wind.speed + " " + _weather.units.speed + '</p></div></div></div>';
                }
                if (this.config.show_weatherIcon) {
                    _style4_generation += '<div class="hw-icon hw-icon' + w_icons_codes[_weather.item.forecast[0].code] + '"></div>';
                }
                _style4_generation += '<ul class="hw-info"><li class="hw-temperature">' +
                                    '<span>' + _weather.item.condition.temp + '<sup>°</sup></span></li>' +
                               '<li class="hw-info-section">';
                if (this.config.show_weatherType) {
                    _style4_generation += '<p class="hw-weatherType">' + _weather.item.condition.text + '</p>';
                }
                if (this.config.displayCityNameOnly) {
                    _style4_generation += '<h2 class="hw-location">' + _weather.location.city + '</h2>';
                }
                else {
                    _style4_generation += '<h2 class="hw-location" style="font-size:18px">' + _weather.location.country + ',' + _weather.location.city + ',' + _weather.location.region + '</h2>';
                }
                _style4_generation += '</li>';
                if (this.config.show_date) {
                    _style4_generation += '<li class="hw-date"><span>' + _weather.item.forecast[0].day + '</span></li>';
                }
                _style4_generation += '</ul></div>';
           
                if (this.config.show_weekly) {
                    _style4_generation += '<div class="hw-infoWeather"><ul class="hw-weeklyForecast">' +
                          '<li class="hw-day"><span>' + _weather.item.forecast[1].day + '</span><ul>' +
                          '<li class="hw-weekDay-temperature">' + _weather.item.forecast[1].high + '<sup>°</sup></li></ul></li>' +
                          '<li class="hw-day"><span>' + _weather.item.forecast[2].day + '</span><ul>' +
                          '<li class="hw-weekDay-temperature">' + _weather.item.forecast[2].high + '<sup>°</sup></li></ul></li>' +
                          '<li class="hw-day"><span>' + _weather.item.forecast[3].day + '</span><ul>' +
                          '<li class="hw-weekDay-temperature">' + _weather.item.forecast[3].high + '<sup>°</sup></li></ul></li>' +
                          '<li class="hw-day"><span>' + _weather.item.forecast[4].day + '</span><ul>' +
                          '<li class="hw-weekDay-temperature">' + _weather.item.forecast[4].high + '<sup>°</sup></li></ul></li>' +                     
                          '</ul> </div>'
                }
                _style4_generation += '</div>';

                this.display(_style4_generation);           
        },
        generate_style5: function (weather) {            
            _data = this.responseData;
            _weather = _data.query.results.channel;
          
                _style5_generation = '<div class="weather-forecast oneday ' + this.config.theme_color + '">' +
                        '<div class="hw-weatherIcon">'

                if (this.config.show_detailed) {
                    _style5_generation += '<span class="fa fa-bars hw-details-icon"></span><div class="hw-more-details">'
                          + '<span class="fa fa-times hw-close-icon"></span>'
                          + '<div class="hw-details-info-section">'
                               + '<p class="hw-today-date">' + _weather.item.forecast[0].date + '</p><div class="hw-detailed-info">'
                               + '<p class="hw-humidity">Humidity: <br/>' + _weather.atmosphere.humidity + '</p>'
                               + '<p class="hw-wind-speed">Wind speed: <br/>' + _weather.wind.speed + " " + _weather.units.speed + '</p></div></div></div>';
                }
                if (this.config.show_date) {
                    _style5_generation += '<p class="hw-date">' + _weather.item.forecast[0].day + '</p>';
                }
                if (this.config.show_weatherType) {
                    _style5_generation += '<p class="hw-weatherType">' + _weather.item.condition.text + '</p>';
                }
                if (this.config.show_weatherIcon) {
                    _style5_generation += '<div class="hw-icon-section"><div class="hw-icon hw-icon' + w_icons_codes[_weather.item.forecast[0].code] + '"></div></div>';
                }

                _style5_generation += '<p class="hw-temperature">' + _weather.item.condition.temp + '<sup>°</sup></p>';

                if (this.config.displayCityNameOnly) {
                    _style5_generation += '<h2 class="hw-location">' + _weather.location.city + '</h2>';
                }
                else {
                    _style5_generation += '<h2 class="hw-location" style="font-size:18px;margin-top:6%">' + _weather.location.country + ',' + _weather.location.city + ',' + _weather.location.region + '</h2>';
                }
           
                _style5_generation += '</div>';

                this.display(_style5_generation);          
        },
        generate_style6: function (weather) {           
            _data = this.responseData;
            _weather = _data.query.results.channel;

            _style6_generation = '<table style="text-align:left; font-size:0.9em">' + 
                    
                    '<tr>' + 
                        '<td>Nhiệt độ: &emsp;</td>' + 
                        '<th>' + _weather.item.condition.temp + '<sup>°</sup>C</th>' + 
                    '</tr>' + 
                    '<tr>' + 
                        '<td>Độ ẩm không khí: &emsp;</td>' + 
                        '<th>' + _weather.atmosphere.humidity + '%</th>' + 
                    '</tr>' + 
                    '<tr>' + 
                        '<td>Tốc độ gió: &emsp;</td>' + 
                        '<th>' + _weather.wind.speed + " " + _weather.units.speed + '</th>' + 
                    '</tr>' +
                    
                '</table>';

            this.display(_style6_generation);
        },

        send_request: function () {          
            _this = this;
            $.ajax({
                type: 'GET',
                url: _this.plugin_url,
                data: '',
                success: function (result) {                    
                    _this.responseData = (result);
                    _this.generate();
                },
                error: function (error) {                    
                    _this.display('<div class="error-messages"><h2>Internal error</h2></div>');
                },
                dataType: 'json'
            });
        }

    };

    hwPlugin.defaults = hwPlugin.prototype.defaults;

    $.fn.hwPlugin = function (options) {        
        this.get = function () {

        }
        return this.each(function () {            
            new hwPlugin(this, options).init();
        });
    };

    window.hwPlugin = hwPlugin;
})(window, jQuery);