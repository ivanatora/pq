<script type="text/javascript">
$(document).ready(function(){
    
    var aIsoValues = ['0', '100', '200', '400', '800', '1600', '3200', '3200+'];
    var aShutterValues = ['1/100000', '1/1000', '1/500', '1/250', '1/125', '1/60',
        '1/30', '1/15', '1/8', '1/4', '1/2', '1', '4', '8', '16', '32+'];
    var aApertureValues = ['1', '2', '2.8', '4', '5.6', '8', '11', '16', '22', '32+'];
    
    var iSliderWidth = 400;
    
    $('#iso_slider').dragslider({
        animate: true,
        range: true,
        rangeDrag: true,
        min: 0,
        max: aIsoValues.length-1,
        values: [0, aIsoValues.length-1],
        slide: function(event, ui){
            var iMinVal = ui.values[0];
            var iMaxVal = ui.values[1];
            $("#min_iso").html(aIsoValues[iMinVal]);
            $("#max_iso").html(aIsoValues[iMaxVal]);
            
            var iEqWidths = iSliderWidth/(aIsoValues.length-1);
            var oOffset = $('#iso_slider').offset();
            var iBeginLeft = oOffset.left - 5;
            
            $("#min_iso").css('left', iBeginLeft + iEqWidths * iMinVal);
            $("#max_iso").css('left', iBeginLeft + iEqWidths * iMaxVal);
            
        }
    });
    $("#min_iso").html(aIsoValues[0]);
    $("#max_iso").html(aIsoValues[aIsoValues.length-1]);
    
    
    $('#shutter_slider').dragslider({
        animate: true,
        range: true,
        rangeDrag: true,
        min: 0,
        max: aShutterValues.length-1,
        values: [0, aShutterValues.length-1],
        slide: function(event, ui){
            var iMinVal = ui.values[0];
            var iMaxVal = ui.values[1];
            $("#min_shutter").html(aShutterValues[iMinVal]);
            $("#max_shutter").html(aShutterValues[iMaxVal]);
            
            var iEqWidths = iSliderWidth/(aShutterValues.length-1);
            var oOffset = $('#iso_slider').offset();
            var iBeginLeft = oOffset.left - 5;
            
            $("#min_shutter").css('left', iBeginLeft + iEqWidths * iMinVal);
            $("#max_shutter").css('left', iBeginLeft + iEqWidths * iMaxVal);
            
        }       
    });
    $("#min_shutter").html(aShutterValues[0]);
    $("#max_shutter").html(aShutterValues[aShutterValues.length-1]);
    
    $('#aperture_slider').dragslider({
        animate: true,
        range: true,
        rangeDrag: true,
        min: 0,
        max: aApertureValues.length-1,
        values: [0, aApertureValues.length-1],
        slide: function(event, ui){
            var iMinVal = ui.values[0];
            var iMaxVal = ui.values[1];
            $("#min_aperture").html(aApertureValues[iMinVal]);
            $("#max_aperture").html(aApertureValues[iMaxVal]);
            
            var iEqWidths = iSliderWidth/(aApertureValues.length-1);
            var oOffset = $('#iso_slider').offset();
            var iBeginLeft = oOffset.left - 5;
            
            $("#min_aperture").css('left', iBeginLeft + iEqWidths * iMinVal);
            $("#max_aperture").css('left', iBeginLeft + iEqWidths * iMaxVal);
            
        }    
    });
    $("#min_aperture").html(aApertureValues[0]);
    $("#max_aperture").html(aApertureValues[aApertureValues.length-1]);
    
    $('.ui-slider-range').css('background-color', '#5481dc');
    $('.ui-slider-handle').css('background-color', '#1e5fe5');
});

</script>

<div id="content" class="search_page">
    <h2>Search photos</h2>

    <h4>ISO</h4>
    <div id="iso_slider" class="slider"></div>
    <span id="min_iso" class="slider_value"></span>
    <span id="max_iso" class="slider_value"></span>

    <h4>Shutter speed</h4>
    <div id="shutter_slider" class="slider"></div>
    <span id="min_shutter" class="slider_value"></span>
    <span id="max_shutter" class="slider_value"></span>

    <h4>Aperture</h4>
    <div id="aperture_slider" class="slider"></div>
    <span id="min_aperture" class="slider_value"></span>
    <span id="max_aperture" class="slider_value"></span>
</div>