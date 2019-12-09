$(document).ready(function() {

    $("#addPost").click(function(e) {
        e.preventDefault();
        $.ajax({

            type: 'POST',

            url: '/posts/save',



            success: function(data) {

                alert(data.success);

            },
            error: function(e) {
                console.log("No se ha podido obtener la información" + JSON.stringify(e));
            }

        });

    });

});