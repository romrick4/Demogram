$(function() {

    $('.demogram_like').click(function(event){
        event.preventDefault();
        $.ajax({
          url: this.href,
          cache: false,
          success: function(html){
            //$("#results").append(html);
            $.bootstrapGrowl("Your rating was accepted");
            }
        });
    });

    $('.demogram_dislike').click(function(event){
        event.preventDefault();
        $.ajax({
          url: this.href,
          cache: false,
          success: function(html){
            //$("#results").append(html);
            $.bootstrapGrowl("Your rating was accepted");
            }
        });
    });

                /*$.bootstrapGrowl("This is a test.");


                setTimeout(function() {
                    $.bootstrapGrowl("This is another test.", { type: 'success' });
                }, 1000);

                setTimeout(function() {
                    $.bootstrapGrowl("Danger, Danger!", {
                        type: 'danger',
                        align: 'center',
                        width: 'auto',
                        allow_dismiss: false
                    });
                }, 2000);

                setTimeout(function() {
                    $.bootstrapGrowl("Danger, Danger!", {
                        type: 'info',
                        align: 'left',
                        stackup_spacing: 30
                    });
                }, 3000);*/
});
