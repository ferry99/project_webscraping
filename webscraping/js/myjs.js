$(document).ready(function(){

  $("#mysearch").submit(function(){
      event.preventDefault();
          $.ajax({
                type: "POST", //type of submit
                url: "data.php", //destination
                datatype: "html", //expected data format from process.php
                data: $('#mysearch').serialize(), //target your form's data and serialize for a POST
                success: function(data) { 
                     $('#result').html(data);
                },
                  error: function (data ) {
                    console.log(data);
                    $('#result').html(data.msg);
                }
            });
          
         });

});