<script type="text/javascript">
$(document).ready(function(){
    
    var aIsoValues = ['0', '100', '200', '400', '800', '1600', '3200+'];
    var aShutterValues = ['0', '1/1000', '1/500', '1/250', '1/125', '1/60',
        '1/30', '1/15', '1/8', '1/4', '1/2', '1', '4', '8', '16', '32+'];
    var aApertureValues = ['0', '2', '2.8', '4', '5.6', '8', '11', '16', '22', '32+'];
    var aFocalValues = ['0', '10', '20', '50', '85', '100', '150', '200', '300', '500', '1000+']
    
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
            $(".min_iso").val(aIsoValues[iMinVal]);
            $(".max_iso").val(aIsoValues[iMaxVal]);
            
            var iEqWidths = iSliderWidth/(aIsoValues.length-1);
            var oOffset = $('#iso_slider').offset();
            var iBeginLeft = oOffset.left - 5;
            
            $("#min_iso").css('left', iBeginLeft + iEqWidths * iMinVal);
            $("#max_iso").css('left', iBeginLeft + iEqWidths * iMaxVal);
            
        }
    });
    $(".min_iso").each(function(){
        $(this).val(aIsoValues[0]);
    })
    $(".max_iso").val(aIsoValues[aIsoValues.length-1]);
    
    
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
            $(".min_shutter").val(aShutterValues[iMinVal]);
            $(".max_shutter").val(aShutterValues[iMaxVal]);
            
            var iEqWidths = iSliderWidth/(aShutterValues.length-1);
            var oOffset = $('#iso_slider').offset();
            var iBeginLeft = oOffset.left - 5;
            
            $("#min_shutter").css('left', iBeginLeft + iEqWidths * iMinVal);
            $("#max_shutter").css('left', iBeginLeft + iEqWidths * iMaxVal);
            
        }       
    });
    $(".min_shutter").val(aShutterValues[0]);
    $(".max_shutter").val(aShutterValues[aShutterValues.length-1]);
    
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
            $(".min_aperture").val(aApertureValues[iMinVal]);
            $(".max_aperture").val(aApertureValues[iMaxVal]);
            
            var iEqWidths = iSliderWidth/(aApertureValues.length-1);
            var oOffset = $('#iso_slider').offset();
            var iBeginLeft = oOffset.left - 5;
            
            $("#min_aperture").css('left', iBeginLeft + iEqWidths * iMinVal);
            $("#max_aperture").css('left', iBeginLeft + iEqWidths * iMaxVal);
            
        }    
    });
    $(".min_aperture").val(aApertureValues[0]);
    $(".max_aperture").val(aApertureValues[aApertureValues.length-1]);
    
    $('#focal_slider').dragslider({
        animate: true,
        range: true,
        rangeDrag: true,
        min: 0,
        max: aFocalValues.length-1,
        values: [0, aFocalValues.length-1],
        slide: function(event, ui){
            var iMinVal = ui.values[0];
            var iMaxVal = ui.values[1];
            $(".min_focal").val(aFocalValues[iMinVal]);
            $(".max_focal").val(aFocalValues[iMaxVal]);
            
            var iEqWidths = iSliderWidth/(aFocalValues.length-1);
            var oOffset = $('#iso_slider').offset();
            var iBeginLeft = oOffset.left - 5;
            
            $("#min_focal").css('left', iBeginLeft + iEqWidths * iMinVal);
            $("#max_focal").css('left', iBeginLeft + iEqWidths * iMaxVal);
            
        }    
    });
    $(".min_focal").val(aFocalValues[0]);
    $(".max_focal").val(aFocalValues[aFocalValues.length-1]);
    
    $('.ui-slider-range').css('background-color', '#5481dc');
    $('.ui-slider-handle').css('background-color', '#1e5fe5');

});

</script>

<div id="content" class="search_page">
    <h2>Search photos</h2>

    <form action="" method="post">
        <h4>ISO</h4>
        <div id="iso_slider" class="slider"></div>
        <input type="text" disabled="disabled" id="min_iso" class="min_iso slider_value">
        <input type="text" disabled="disabled" id="max_iso" class="max_iso slider_value">
        <input type="hidden" name="min_iso" class="min_iso">
        <input type="hidden" name="max_iso" class="max_iso">

        <h4>Shutter speed</h4>
        <div id="shutter_slider" class="slider"></div>
        <input type="text" disabled="disabled" id="min_shutter" class="min_shutter slider_value">
        <input type="text" disabled="disabled" id="max_shutter" class="max_shutter slider_value">
        <input type="hidden" name="min_shutter" class="min_shutter">
        <input type="hidden" name="max_shutter" class="max_shutter">

        <h4>Aperture</h4>
        <div id="aperture_slider" class="slider"></div>
        <input type="text" disabled="disabled" id="min_aperture" class="min_aperture slider_value">
        <input type="text" disabled="disabled" id="max_aperture" class="max_aperture slider_value">
        <input type="hidden" name="min_aperture" class="min_aperture">
        <input type="hidden" name="max_aperture" class="max_aperture">
        
        <h4>Focal length</h4>
        <div id="focal_slider" class="slider"></div>
        <input type="text" disabled="disabled" id="min_focal" class="min_focal slider_value">
        <input type="text" disabled="disabled" id="max_focal" class="max_focal slider_value">
        <input type="hidden" name="min_focal" class="min_focal">
        <input type="hidden" name="max_focal" class="max_focal">

        <input class="leftFormSubmit" type="submit" value="Search">
    </form>
</div>