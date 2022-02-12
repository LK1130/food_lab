/*
 * Create : Aung Min Khant(29/1/2022)
 * Update :
 * Explain of function : To change product category with type
 * Prarameter : no
 * return :
 */
$(document).ready(function () {
    $('.typebtns').hide();
    $('.tastebtns').hide();
    $("#selectpicker1").unbind().change(function (e) {
       
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        e.preventDefault();
        var formdata = { type: $("#selectpicker1").val() };
        let id = $('#selectpicker1').val();
        let newUrl = `menutype?id=${id}`;
        $('#typetag').attr('href',newUrl);
        $.ajax({
            type: "POST",
            url: "searchCategory",
            data: formdata,
            dataType: "json",
            success: function (data) {
                $("#byCategory").empty();
                let count = 0;

                for (const list of data) {
                    if(count < 4){
                        $('#byCategory').append(
                            `<div class="col-md-3 col-sm-3 d-flex flex-column justify-content-center align-items-center m-auto my-3 fw-bold py-5">
                            <img src="/storage/${list.path}" class="img-fluid images" alt="bestitem1" />
                            <p class="fs-3 pt-2">${ list.product_name }</p>
                            <p class="fs-5"><i class="fas fa-coins pe-2 coins"></i>${ list.coin }</p>
                            <a href="productDetail?id=${ list.link_id }"><button type="button" class="btn detailbtns"> More Details</button></a>
                            <a href=""><button type="button" class="btn shopbtns"> Shop Now</button></a>
                        </div>`
                        )
                    }
                    count++;
                
                    if(count > 3){
                        $('.typebtns').show('slow');
                    
                    }else{
                        $('.typebtns').hide('slow');
                    }
                }
                if(count == 0 ){
                    $('.typebtns').hide('slow');
                }
               
               
            },
            error: function(data){
                console.log(data);
            }
        });
    });


  
      
    /*
     * Create : Aung Min Khant(29/1/2022)
     * Update :
     * Explain of function : To change product taste 
     * Prarameter : no
     * return :
     */
    $("#selectpicker2").change(function (e) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        e.preventDefault();
        var formdata = { type: $("#selectpicker2").val() };
        let id = $('#selectpicker2').val();
        let newUrl = `menutaste?id=${id}`;
        $('#tastetag').attr('href',newUrl);
        $.ajax({
            type: "POST",
            url: "searchTaste",
            data: formdata,
            dataType: "json",
            success: function (data) {
                $("#byTaste").empty();
                let count = 0;

                for (const list of data) {
                    if(count < 4){
                        $('#byTaste').append(
                            `<div class="col-md-3 col-sm-3 d-flex flex-column justify-content-center align-items-center m-auto my-3 fw-bold py-5">
                            <img src="/storage/${list.path}" class="img-fluid images" alt="bestitem1" />
                            <p class="fs-3 pt-2">${ list.product_name }</p>
                            <p class="fs-5"><i class="fas fa-coins pe-2 coins"></i>${ list.coin }</p>
                            <a href="productDetail?id=${ list.link_id }"><button type="button" class="btn detailbtns"> More Details</button></a>
                            <a href=""><button type="button" class="btn shopbtns"> Shop Now</button></a>
                        </div>`
                        )
                    }
                    count++;
                    if(count > 4){
                        $('.tastebtns').show('slow');
                    
                    }else{
                        $('.tastebtns').hide('slow');
                    }
                   
                }
                if(count == 0 ){
                    $('.typebtns').hide('slow');
                }
              
                console.log(count);

               
            },
            error: function(data){
                console.log(data);
            }
            
        });
    });
});
