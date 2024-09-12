jQuery(document).ready(function ($) {
//   jQuery(".product_pdf_download").click(function (e) {
//     var categoryid = jQuery(this).data("categoryid");
//     var productid = j(this).data("productid");
//     console.log(categoryid);
//     jQuery("#product_id").val(productid);
//     jQuery("#category_id").val(categoryid);
//   });

//   jQuery("#download_submit").on("click", function (e) {
//     e.preventDefault(); // Prevent the form from submitting normally

//     var formData = {
//       username: jQuery("#user_name").val(),
//       usernumber: jQuery("#user_number").val(),
//       usercompany: jQuery("#user_company").val(),
//       useremail: jQuery("#user_email").val(),
//       // downloadsubmit: true // Indicates the submit button was clicked
//     };

//     var productid = jQuery("#product_id").val();
//     var pdfurl = jQuery(".product_pdf_download").data("src");
//     var categoryid = jQuery("#category_id").val();
//     // console.log(productid);
//     var errors = [];

//     if (formData.useremail !== "" && !validateEmail(formData.useremail)) {
//         if (jQuery('.err_email').length > 0) {
            
//             jQuery(".err_email").text("Please enter a valid email address.");
//         }else{
//             jQuery(".groupemail").append("<span class='err err_email'>Please enter a valid email address.</span>");
//         }
//       errors.push({
//         field: "useremail",
//         message: "Please enter a valid email address.",
//       });
//     }else{
//         jQuery('.err_email').css('display','none');
//     }

//     // Client-side validation
//     if (formData.username === "") {
//         if (jQuery('.err_name').length) {
            
//             jQuery(".err_name").text("Please enter your name.");
//         }else{
//             jQuery(".groupname").append("<span class='err err_name'>Please enter your name.</span>");
//         }
      
//       errors.push({ field: "username", message: "Please enter your name." });
//     }else{
//         jQuery('.err_name').css('display','none');
//     }

//     if (formData.usernumber === "") {
//         if (jQuery('.err_number').length) {
            
//             jQuery(".err_number").text("Please enter your number.");
//         }else{
//             jQuery(".groupnumber").append("<span class='err err_number'>Please enter your number.</span>");
//         }
//     //   jQuery(".err_number").text("Please enter your number.");
//       errors.push({
//         field: "usernumber",
//         message: "Please enter your number.",
//       });
//     }else{
//         jQuery('.err_number').css('display','none');
//     }

//     if (formData.usercompany === "") {
//         if (jQuery('.err_company').length) {
            
//             jQuery(".err_company").text("Please enter your company name.");
//         }else{
//             jQuery(".groupcompany").append("<span class='err err_company'>Please enter your company name.</span>");
//         }
     
//       errors.push({
//         field: "usercompany",
//         message: "Please enter your company name.",
//       });
//     }else{
//         jQuery('.err_company').css('display','none');
//     }

//     // Clear previous error messages
//     jQuery(".err_name, .err_number, .err_company, .err_email").text("");

//     // Display errors if any

//     // If no client-side errors, send the form data via AJAX to the server
//     // console.log(errors);
//     if (errors.length > 0) {
//       errors.forEach(function (error) {
//         if (error.field === "username") {
//           jQuery(".err_name").text(error.message);
//         } else if (error.field === "usernumber") {
//           jQuery(".err_number").text(error.message);
//         } else if (error.field === "usercompany") {
//           jQuery(".err_company").text(error.message);
//         } else if (error.field === "useremail") {
//           jQuery(".err_email").text(error.message);
//         }
//       });
//     } else {
//       jQuery.ajax({
//         action: "download_store_data_to_database",
//         url: custom.ajaxurl,
//         type: "post",
//         dataType: "json",
//         data: {
//           action: "download_store_data_to_database",
//           formData: formData,
//           productid: productid,
//           categoryid: categoryid,
//           pdfurl: pdfurl,
//           // nonce: nonce
//         },
//         success: function (response) {
//           // Handle the server response
//           // console.log(formData);
//           // console.log(response);
//           console.log("Hello");
//           window.open(pdfurl);
//         },
//         error: function (xhr, status, error) {
//           // Handle errors
//           // console.error("Error");
//         },
//       });
//     }
//   });

//   jQuery("#user_number").on("keypress", function (e) {
//     // Allow only numeric (0-9) characters
//     if (e.which < 48 || e.which > 57) {
//       e.preventDefault();
//     }
//   });
//   jQuery("#user_number").on("input", function () {
//     // Limit input to 10 digits
//     if (this.value.length > 10) {
//       this.value = this.value.slice(0, 10);
//     }
//   });

  // function validateEmail(email) {
  //     var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  //     return re.test(email);
  // }
  jQuery(".your-class").slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    centerPadding: "60px",
    responsive: [
      {
        breakpoint: 1300,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          // infinite: true,
          // dots: true
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          // infinite: true,
          // dots: true
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
});

function validateEmail(email) {
  var re =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@(([^<>()[\]\.,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,})$/i;
  return re.test(String(email).toLowerCase());
}
