function form_buttonJump(current_tab){
    if(current_tab == 'essentials'){
        var in1 = document.getElementById('pickupDate').value;
        var in2 = document.getElementById('returnDate').value;
        var in3 = document.getElementById('pickPlace').value;
        var in4 = document.getElementById('returnPlace').value;
        if(in1 == '' || in2 == '' || in3 == '' || in4 == ''){
          alert('Please fill necessary fields');
        }else{
          document.getElementById('essentials').checked = false;
          document.getElementById('customer').checked = true;
        }

    }else if(current_tab == 'customer'){
        var in1 = document.getElementById('fname').value;
        var in2 = document.getElementById('lname').value;
        var in3 = document.getElementById('age').value;
        var in4 = document.getElementById('email').value;
        var in5 = document.getElementById('nic').value;

        var checker=document.getElementById('driver-need').checked;
        var inD1 = document.getElementById('dlNo').value;
        var inD2 = document.getElementById('dlExpDate').value;

        if(in1 == '' || in2 == '' || in3 == '' || in4 == '' || in5 == ''){
          alert('Please fill necessary fields');
        }else if(checker == false && (inD1 == '' || inD2 == '')){
          alert('Please fill necessary fields');
        }else{
          document.getElementById('customer').checked = false;
          document.getElementById('vehicle').checked = true;
        }
    }else if(current_tab == 'vehicle'){        
        /*var in1 = document.getElementById('v-code').value;
        var in2 = document.getElementById('v-type').value;
        var in3 = document.getElementById('v-model').value;
        var in4 = document.getElementById('v-passenger-count').value;
        var in5 = document.getElementById('v-luggage').value;
        var in6 = document.getElementById('v-ac').value;
        var in7 = document.getElementById('v-gear').value;
        var in8 = document.getElementById('v-fuel').value;
        if(in1 == '' || in2 == '' || in3 == '' || in4 == '' || in5 == '' || 
        in6 == '' || in7 == '' || in8 == ''){
          alert('Please fill necessary fields');
        }else{
          document.getElementById('vehicle').checked = false;
          document.getElementById('payment').checked = true;
        }*/
        //delete this after implementing the grid
        document.getElementById('vehicle').checked = false;
        document.getElementById('payment').checked = true;
    }else if(current_tab == 'payment'){
        //code for retrieving all data and sending to the server
    }else {
        alert("Error in buttonJump - reservation form");
    }
}

function cardTypeChecker(cardNumber) {
    var cardType = "";
    if (cardNumber.length >= 1) {
      if (cardNumber.charAt(0) == "4") {
        cardType = "visa";
      } else if (cardNumber.charAt(0) == "5" || cardNumber.charAt(0) == "2") {
        cardType = "master";
      } else if (cardNumber.charAt(0) == "3" && (cardNumber.charAt(1) == "4" || cardNumber.charAt(1) == "7")) {
        cardType = "amex";
      } else {
        cardType = "unkowncard"
      }
    } else {
      cardType = "unkowncard"
    }
    var location="../images/"+cardType+".png";
    document.getElementById("cardType").src = location;
    document.getElementById("cardType").alt = cardType;
  }

function LicenseReq(){
  var checkbox = document.getElementById('driver-need');
  if(checkbox.checked == false){
    document.getElementById('dlNo').required=true;    
    document.getElementById('dlExpDate').required=true;
  }else{
    document.getElementById('dlNo').required=false;    
    document.getElementById('dlExpDate').required=false;
  }
}

//check times are both future

function submit_all(){
    
}