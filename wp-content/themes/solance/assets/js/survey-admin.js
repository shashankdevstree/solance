var cb = document.querySelectorAll(".close");
for (i = 0; i < cb.length; i++) {
   cb[i].addEventListener("click", function() {
      var dia = this.parentNode.parentNode; /* You need to update this part if you change level of close button */
      dia.style.opacity = 0;
      dia.style.zIndex = -1;
   });
}

var mt = document.querySelectorAll(".modal-toggle");
for (i = 0; i < mt.length; i++) {
   mt[i].addEventListener("click", function() {
      var targetId = this.getAttribute("data-target");
      var target = document.getElementById(targetId);
      target.style.opacity = 1;
      target.style.zIndex = 9999;
   });
}


jQuery(document).ready(function ($) {

  $('#myTable').DataTable();
  // $(document).on('click',".modal-toggle",function(){
  //   console.log("")
  // });

  $('#example').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
          url: survey_admin.ajaxurl,
          type: "POST",
          data: {
              action: "fetch_data"
          }
      },
      "columns": [
          { "data": "id" },
          { "data": "comment" },
          { "data": "action" }
      ]
  });

  $(document).on('click',".modal-toggle",function(){  
      var user_id = $(this).attr('id');

      // console.log(user_id);
      $.ajax({
        url: survey_admin.ajaxurl,
        type: "POST",
        data: {
          action: "open_comment_modal_popup",
          user_id: user_id
        },
        success: function (response) {
          // Update UI with response data
          console.log(response);
          $('.modal-content').html(response.data.user_data);
          
        },
        error: function (xhr, status, error) {
          // Handle AJAX errors
          // console.error(error);
          // $('#result').html('<p>Error occurred while processing the request.</p>');
        },
        complete: function () {
          // Hide loader when AJAX request is complete (success or error)
          // $('#loader').hide();
        },
      });
  });
  // console.log(survey_admin.ajaxurl);
  
  $.ajax({
    url: survey_admin.ajaxurl,
    type: "POST",
    data: {
      action: "survey_chart_admin",
      // data: data
    },
    success: function (response) {
      // Update UI with response data

      // Chart 10

      const ctx8 = document.getElementById("item8").getContext("2d");

      var purchaseExp = response.data.purchase_exp_avg;
      var purchaseExpName = [];
      var purchaseExpCount = [];

      purchaseExp.forEach((purchaseExp) => {
        purchaseExpName.push(purchaseExp.month);
        purchaseExpCount.push(purchaseExp.nps);
      });

      const data2 = {
        labels: purchaseExpName, // Use your actual data for labels
        datasets: [
          {
            label: "NPS Dataset",
            data: purchaseExpCount, // Use your actual data for counts
            borderColor: "rgba(255, 99, 132, 1)",
            backgroundColor: "rgba(255, 99, 132, 0.5)",
            pointStyle: "circle",
            pointRadius: 10,
            pointHoverRadius: 15,
          },
        ],
      };

      // var ctx8 = document.getElementById('myChart8').getContext('2d');
      var myChart8 = new Chart(ctx8, {
        type: "line",
        data: data2,
        options: {
          responsive: true,
          plugins: {
            title: {
              display: true,
              text: (ctx) => "Purchase Experience",
            },
          },
        },
      });

      // Chart 2
      const ctx2 = document.getElementById("item2");
      var priceFeedback = response.data.price_feedback;
      var priceFeedbackName = [];
      var priceFeedbackCount = [];

      priceFeedback.forEach((priceFeedback) => {
        if (priceFeedback.answer !== "") {
            priceFeedbackName.push(priceFeedback.answer);
            priceFeedbackCount.push(priceFeedback.price_feedback_count);
        }
      });
      var myChart2 = new Chart(ctx2, {
        type: "bar",
        data: {
          labels: priceFeedbackName,
          datasets: [
            {
              label: "# of Price Count",
              data: priceFeedbackCount,
              borderWidth: 1,
            },
          ],
        },
        options: {
          plugins: {
            title: {
              display: true,
              text: "Customer Feedback on Product Price",
            },
          },
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });

      // Chart 3
      const ctx3 = document.getElementById("item3");
      var astheticsFeedback = response.data.asthetics_feedback;
      var astheticsFeedbackName = [];
      var astheticsFeedbackCount = [];

      astheticsFeedback.forEach((astheticsFeedback) => {
        if (astheticsFeedback.answer !== "") {
          astheticsFeedbackName.push(astheticsFeedback.answer);
          astheticsFeedbackCount.push(astheticsFeedback.asthetics_feedback_count);
        }
      });
      var myChart3 = new Chart(ctx3, {
        type: "bar",
        data: {
          labels: astheticsFeedbackName,
          datasets: [
            {
              label: "# of Asthetics Count",
              data: astheticsFeedbackCount,
              borderWidth: 1,
            },
          ],
        },
        options: {
          plugins: {
            title: {
              display: true,
              text: "Customer Feedback on Product Aesthetics",
            },
          },
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });

      // Chart 4
      const ctx4 = document.getElementById("item4");
      var fitmentFeedback = response.data.fitment_feedback;
      var fitmentFeedbackName = [];
      var fitmentFeedbackCount = [];

      fitmentFeedback.forEach((fitmentFeedback) => {
        if (fitmentFeedback.answer !== "") {
          fitmentFeedbackName.push(fitmentFeedback.answer);
          fitmentFeedbackCount.push(fitmentFeedback.fitment_feedback_count);
        }
      });
      var myChart4 = new Chart(ctx4, {
        type: "bar",
        data: {
          labels: fitmentFeedbackName,
          datasets: [
            {
              label: "# of Fitment Count",
              data: fitmentFeedbackCount,
              borderWidth: 1,
            },
          ],
        },
        options: {
          plugins: {
            title: {
              display: true,
              text: "Customer Feedback on Ease of Fitment",
            },
          },
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });

      // Chart 5
      const ctx5 = document.getElementById("item5");
      var performanceFeedback = response.data.performance_feedback;
      var performanceFeedbackName = [];
      var performanceFeedbackCount = [];

      performanceFeedback.forEach((performanceFeedback) => {
        if (performanceFeedback.answer !== "") {
          performanceFeedbackName.push(performanceFeedback.answer);
          performanceFeedbackCount.push(performanceFeedback.performance_feedback_count );
        }
      });
      var myChart5 = new Chart(ctx5, {
        type: "bar",
        data: {
          labels: performanceFeedbackName,
          datasets: [
            {
              label: "# of Performance Count",
              data: performanceFeedbackCount,
              borderWidth: 1,
            },
          ],
        },
        options: {
          plugins: {
            title: {
              display: true,
              text: "Customer Feedback on Product Performance",
            },
          },
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });

      // Chart 6
      const ctx6 = document.getElementById("item6");
      var warrentyFeedback = response.data.warrenty_feedback;
      var warrentyFeedbackName = [];
      var warrentyFeedbackCount = [];

      warrentyFeedback.forEach((warrentyFeedback) => {
        if (warrentyFeedback.answer !== "") {
          warrentyFeedbackName.push(warrentyFeedback.answer);
          warrentyFeedbackCount.push(warrentyFeedback.warrenty_feedback_count);
        }
      });
      var myChart6 = new Chart(ctx6, {
        type: "bar",
        data: {
          labels: warrentyFeedbackName,
          datasets: [
            {
              label: "# of Warrenty Count",
              data: warrentyFeedbackCount,
              borderWidth: 1,
            },
          ],
        },
        options: {
          plugins: {
            title: {
              display: true,
              text: "Customer Feedback on Warranty Registration",
            },
          },
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });

      // Chart 7
      const ctx7 = document.getElementById("item7");
      var ageGroup = response.data.age_group;
      // console.log(ageGroup);
      var ageGroupName = [];
      var ageGroupCount = [];

      ageGroup.forEach((ageGroup) => {
        if(ageGroup.age_group !== null){

          ageGroupName.push(ageGroup.age_group);
          ageGroupCount.push(ageGroup.age_count);
        }
      });

      var myChart7 = new Chart(ctx7, {
        type: "bar",
        data: {
          labels: ageGroupName,
          datasets: [
            {
              label: "# of Counting of user age wise.",
              data: ageGroupCount,
              borderWidth: 1,
            },
          ],
        },
        options: {
          plugins: {
            title: {
              display: true,
              text: "Demography Age Group",
            },
          },
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });

      // Chart 10
      const ctx10 = document.getElementById("item10");
      var state = response.data.states;
      var stateName = [];
      var stateCount = [];

      state.forEach((state) => {
        if(state.answer !== ''){

          stateName.push(state.answer);
          stateCount.push(state.state_count);
        }
      });

      var myChart10 = new Chart(ctx10, {
        type: "bar",
        data: {
          labels: stateName,
          datasets: [
            {
              label: "# of States Count",
              data: stateCount,
              borderWidth: 1,
            },
          ],
        },
        options: {
          plugins: {
            title: {
              display: true,
              text: "State wise comparison",
            },
          },
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });

      // Chart 9
      const ctx9 = document.getElementById("item9");
      var city = response.data.city;
      var cityName = [];
      var cityCount = [];
     
      city.forEach((city) => {
        if(city.answer !== ''){

          cityName.push(city.answer);
          cityCount.push(city.city_count);
        }
      });
      console.log(cityName);
      var myChart9 = new Chart(ctx9, {
        type: "bar",
        data: {
          labels: cityName,
          datasets: [
            {
              label: "# of City Count",
              data: cityCount,
              borderWidth: 1,
            },
          ],
        },
        options: {
          plugins: {
            title: {
              display: true,
              text: "City wise comparison",
            },
          },
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });

      // Chart 1
      const ctx1 = document.getElementById("item1");
      var leadGroup = response.data.lead_group;
      var leadGroupName = [];
      var leadGroupCount = [];

      leadGroup.forEach((leadGroup) => {
        if (leadGroup.answer !== "") {
          leadGroupName.push(leadGroup.answer);
          leadGroupCount.push(leadGroup.count);
        }
      });
      // console.log(leadGroup);
      const data = {
        labels: leadGroupName,
        datasets: [
          {
            label: "# of Lead Group Count",
            data: leadGroupCount,
            borderWidth: 1,
            backgroundColor: [
              "#CB4335",
              "#1F618D",
              "#F1C40F",
              "#27AE60",
              "#884EA0",
              "#010CF9",
            ],
          },
        ],
      };

      var myChart1 = new Chart(ctx1, {
        type: "pie",
        data: data,
        options: {
          plugins: {
            title: {
              display: true,
              text: "Sources of Awareness about Solance",
            },
            legend: {
              onHover: handleHover,
              onLeave: handleLeave,
            },
          },
        },
      });

      // Chart 11
      const ctx11 = document.getElementById("item11");
      var productSold = response.data.product_sold;
      var productSoldName = [];
      var productSoldCount = [];

      productSold.forEach((productSold) => {
        productSoldName.push(productSold.answer);
        productSoldCount.push(productSold.product_sold_count);
      });
      // console.log(productSoldName);
      const data1 = {
        labels: productSoldName,
        datasets: [
          {
            label: "# of Product Sold",
            data: productSoldCount,
            borderWidth: 1,
            backgroundColor: [
              "#CB4335",
              "#1F618D",
              "#F1C40F",
              "#27AE60",
              "#884EA0",
              "#010CF9",
            ],
          },
        ],
      };

      var myChart11 = new Chart(ctx11, {
        type: "pie",
        data: data1,
        options: {
          plugins: {
            title: {
              display: true,
              text: "Product Sold",
            },
            legend: {
              onHover: handleHover,
              onLeave: handleLeave,
            },
          },
        },
      });
      // $('#result').html(response);
    },
    error: function (xhr, status, error) {
      // Handle AJAX errors
      console.error(error);
      // $('#result').html('<p>Error occurred while processing the request.</p>');
    },
    complete: function () {
      // Hide loader when AJAX request is complete (success or error)
      // $('#loader').hide();
    },
  });
});

// Append '4d' to the colors (alpha channel), except for the hovered index
function handleHover(evt, item, legend) {
  legend.chart.data.datasets[0].backgroundColor.forEach(
    (color, index, colors) => {
      colors[index] =
        index === item.index || color.length === 9 ? color : color + "4D";
    }
  );
  legend.chart.update();
}

// Removes the alpha channel from background colors
function handleLeave(evt, item, legend) {
  legend.chart.data.datasets[0].backgroundColor.forEach(
    (color, index, colors) => {
      colors[index] = color.length === 9 ? color.slice(0, -2) : color;
    }
  );
  legend.chart.update();
}
