var first = true;
getGameExp(true);
setInterval(function()
{

    getGameExp();

}, 300000);

function getGameExp(empty = false)
{
    console.log('test');
    $.ajax({
        method: "GET",
        url: "../../randomNumber",
    })
    .done(function( data ) {
        $.ajax({
            method: "GET",
            url: "../../getExp",
            data: { number: data, empty: empty }
        })
        .done(function ( data )  {
            var newData = JSON.parse(data);
            $("#xp").text(newData.currentExp + " | " + newData.neededExp);
            $(".levelTitle").text(newData.level);
            if (first) {
                first = false;
                getGameExp();
            }
        });
    });
}
