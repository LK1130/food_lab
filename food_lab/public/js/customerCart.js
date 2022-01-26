
    // $("#color_mode").on("change", function (event) {
    //     colorModePreview(event);
    // })
    

    function leftClick() {
        var btnSwitch = document.getElementById('btnSwitch');
        var coinBox = document.querySelectorAll('.coinBox');
        var cashBox = document.querySelectorAll('.cashBox');
        var coinDiv = document.querySelectorAll('.coinDiv');
        var  cashDiv = document.querySelectorAll('.cashDiv');

        btnSwitch.style.left = '0px';
        console.log(cashBox.length);
        for (let index = 0; index < cashBox.length; index++) {
            cashBox[index].style.display = 'none';
            
        }
        
        for (let index = 0; index < cashDiv.length; index++) {
            cashDiv[index].style.display = 'none';
            
        }
        for (let index = 0; index < coinBox.length; index++) {
            coinBox[index].style.display = 'block';
            
        }

        for (let index = 0; index < coinDiv.length; index++) {
            coinDiv[index].style.display = 'block';
            
        }
      
    }   
    
    function rightClick() {
        var btnSwitch = document.getElementById('btnSwitch');
        var coinBox = document.querySelectorAll('.coinBox');
        var cashBox = document.querySelectorAll('.cashBox');
        var coinDiv = document.querySelectorAll('.coinDiv');
        var  cashDiv = document.querySelectorAll('.cashDiv');

        btnSwitch.style.left = '50%';
        for (let index = 0; index < cashBox.length; index++) {
            cashBox[index].style.display = 'block';
            
        }
        
        for (let index = 0; index < cashDiv.length; index++) {
            cashDiv[index].style.display = 'block';
            
        }
        for (let index = 0; index < coinBox.length; index++) {
            coinBox[index].style.display = 'none';
            
        }

        for (let index = 0; index < coinDiv.length; index++) {
            coinDiv[index].style.display = 'none';
            
        }
    }
    // $("#colorChange").click(function () {
    //     if ($("#color-mode").attr("checked") == true) {
    //         $("#coinSubTotal").hide();
    //         $("#coinDeliPrice").hide();
    //         $("#coinTotalPricel").hide();
    //         $("#itemCoinPrice").hide();

    //         $("#subTotal").show();
    //         $("#deliPrice").show();
    //         $("#totalPricel").show();
    //         $("#itemPrice").show();
            
    //     } else if ($("#color-mode").attr("checked") == false) {
    //         $("#subTotal").hide();
    //         $("#deliPrice").hide();
    //         $("#totalPricel").hide();
    //         $("#itemPrice").hide();

    //         $("#coinSubTotal").show();
    //         $("#coinDeliPrice").show();
    //         $("#coinTotalPricel").show();
    //         $("#itemCoinPrice").show();
    //     }
    // });

