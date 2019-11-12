$(config_page.php).ready( function(){
    $("#btEdit").click( function (){
        $("#teste").hide(27);
        //$("#texto").fadeOut(1000);
    })

    $("#btEdit").click(function(){
        $("#teste").show("slow");
        //$("#texto").fadeIn(1000);
    });
});