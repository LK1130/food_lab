
$(document).ready(function (e) {

    /*
    * Create : Aung Min Khant(17/1/2022)
    * Update :
    * Explain of function : When input tag keyup or keypress to disable enter 
    * return when keyup or kepress not equal false
    * */
    $(document).on('keyup keypress', 'input', function (e) {
      if (e.which == 13) {
        e.preventDefault();
        return false;
      }
    });
    
     /*
    * Create : Aung Min Khant(17/1/2022)
    * Update :
    * Explain of function : When user click 'plusBox' append to appendBox div 
    
    * */  

        // To get id count 
      let count = 0;
      $(".plusBox").click(function(){
      let countDiv =  document.getElementsByClassName('appendCount').length;

        console.log(countDiv);
          console.log(count);
          count++;
          disable(count);
        if(countDiv < 6){
          let input =`<div class="d-flex mt-3 appendCount" id="deleteForm" >
          <div class="form-group d-flex mx-3">
              <label for="category" class="col-form-label titles">Category</label>
          <select name="category" id="category" class="form-select mx-2">
              <option value="0" selected disabled>Select category</option>
              <option value="1">Selected Box</option>
              <option value="2">Checked Box</option>
          </select>
          </div>

          <input type="text"  name="pname${count}"  class="mx-3 plabel${count}">
          <input type="text" class="inputtag"  name="pvalue${count}"  value="" class="ms-3 inputs${count}" data-role="tagsinput">
        
          <div class="mx-3 mt-3 delete"><i class="fas fa-minus-circle minusIcon"></i></div>
      </div>
          `;
  
          
          $(".appendBox").append(input);
          // To delete form
          $('.delete').click(function(e){
                $(this).closest('#deleteForm').remove();
              --count;
                // console.log(count);
              e.preventDefault();
           });
          (function ($) {
            "use strict";
                operate();
          })(window.jQuery);    
        }
      });
        
    function disable(count){
        if(count == 6){
            $(".plusBox").css('visibility','hidden');
            console.log('hello stop');
        }
    }
    });
    
     