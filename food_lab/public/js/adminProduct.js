
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
      parameter : no
      return : append data
    * */  

        // To get id count 
      let count = 0;

      let countArray = [1,2,3,4,5,6];
     
      $(".plusBox").click(function(){
      let countDiv =  document.getElementsByClassName('appendCount').length;
          count = countArray[0];
       
          // console.log(count);
          // count++;
          // toggle(countDiv);
          disable(countDiv);
          
        if(countDiv < 6){
          let input =`<div class="d-flex mt-3 appendCount" id="deleteForm" >
          <div class="form-group d-flex mx-3">
              <label for="category" class="col-form-label titles">Category</label>
          <select name="category${count}" id="category" class="form-select mx-2">
              <option value="0" selected disabled>Select category</option>
              <option value="1">Selected Box</option>
              <option value="2">Checked Box</option>
          </select>
          </div>

          <input type="text"  name="pdname${count}"  class="mx-3 plabel${count}">
          <input type="text" class="inputtag"  name="pdvalue${count}"  value="" class="ms-3 inputs${count}" data-role="tagsinput">
        
          <div class="mx-3 mt-3 delete" id=${count}><i class="fas fa-minus-circle minusIcon" ></i></div>
      </div>
          `;
        
        
      
          $(".appendBox").append(input);
          countArray.shift();  
          console.log(countArray);
          // To delete form
          $('.delete').click(function(e){
           ;
                // $(`#${count}`).remove();
                $(this).closest(`#deleteForm`).remove();
                // console.log(this.id);
                // console.log(helo);
                let found = false;
                for(let int = 0 ; int < countArray.length;int++) if(countArray[int] == this.id)  found = true;
                if(!found){
                  countDiv =  document.getElementsByClassName('appendCount').length;
                  countArray.push(parseInt(this.id));
                  console.log(countDiv);
                  enable(countDiv);
                } 
                // console.log(countArray);
               
             
              // e.preventDefault();
           });
          (function ($) {
            "use strict";
                operate();
          })(window.jQuery);    
        }
      });
        
    function disable(count){
      // console.log(count.length);
        if(count == 5){
            $(".plusBox").css('visibility','hidden');
        }
        
    }

    function enable(count){
        if(count < 6){
          $(".plusBox").css('visibility','visible');
        }
    }

    
    });
    
     