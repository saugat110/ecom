function update_marginTop() {
    var cont1_height = $('#cont1').outerHeight() + 9;
    $('#cont2').css('margin-top', cont1_height);
    console.log($('#cont1').outerHeight());
}

$(document).ready(function () {

   update_marginTop();



    

    $(window).resize(function(){
        update_marginTop();
            // console.log(cont1_height);

    });

});