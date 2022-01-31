 const main  =  document.getElementById('mainimg');

$(document).ready(function(){
    $('.count').prop('disabled', true);
       $(document).on('click','.plus',function(){
       
        if($('.count').val() < 5){
            $('.count').val(parseInt($('.count').val()) + 1 );
        
        }
    });
    $(document).on('click','.minus',function(){
        $('.count').val(parseInt($('.count').val()) - 1 );
            if ($('.count').val() == 0) {
                $('.count').val(1);
            }
        });
    
    let count = 0;
    $('.btns').click(function(e){
      
       let text =  $('#count').text();
    
        $('#count').text($('.count').val());
        e.preventDefault();
    })

    $()
 });

function changeImage(img){

    main.src = img.src;
    //  this.src = img.src;
}