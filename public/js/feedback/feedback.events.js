
// function registerFeedback(id,estrellas,feedback){
//     feedbackModule.registerFeedback(id,estrellas,feedback)
//     .then(response => {
//         console.log(response);
//     })
//     .catch(error => {
//         console.log(error);
//     })
// }


$('#send').on('click', function () {
    var link = window.location.href;
    var id = link.substring(link.length-20,link.length);
    var feedback = $('#texto').val();
    var estrellas = $('input:radio[name=estrellas]:checked').val();
    if (estrellas != 1 && estrellas != 2 && estrellas != 3 && estrellas != 4 && estrellas != 5) {
        swal({
            title: "Espera!",
            text: "Es importante que nos califiques",
            icon: "warning",
        })
    }else{

        //comprobar si el turno ya esta en la tabla feedback y si es asi, enviarlo a una pagina de error
        // para comprobarlo puede ser necesario tener un campo id_firebase en la tabla feedback para solo
        // hacer que si existe, enviarlo a la pagina de error, si no, hacer :
        feedbackModule.registerFeedback(id,estrellas,feedback)
        .then(response => {
            console.log(response);
            swal({
                title: "Muchas gracias",
                text: "Tu opinion es muy importante para nosotros",
                icon: "success",
            }).then((value => {
                if (value) {}        
                    location.href="http://sat-movil.000webhostapp.com/";
            }))
        })
        .catch(error => {
            console.log(error);
        })
    }
    








    console.log(id);
    console.log(estrellas);
    console.log(feedback);



    
})