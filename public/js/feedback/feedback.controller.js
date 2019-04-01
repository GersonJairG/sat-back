var feedbackModule= {
    registerFeedback : function(idFirebase,estrellas,feedback){
        return $.ajax({
            method: 'post',
            url: 'http://165.227.183.7/feedback',
            data: {
                idFirebase : idFirebase,
                estrellas : estrellas,
                feedback : feedback
            },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
    }
}