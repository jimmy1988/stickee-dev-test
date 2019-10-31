var xhr = null;
var newRequest = false;
var amountRequired = null;
var ajaxUpdateRoute = "php/backend/updatePrices.php"

function loadXHR(){
  if (window.XMLHttpRequest) {
      xhr = new XMLHttpRequest();
   } else {
     xhr = new ActiveXObject("Microsoft.XMLHTTP");
   }
}

function requestXHR(){
  $("#breakdown").html("");
  amountRequired = Number($("#amount-required").val());

  if(amountRequired != null && amountRequired != undefined && amountRequired != "" && amountRequired != NaN && amountRequired > 0){
    newRequest = true;
    loadXHR();

    xhr.onreadystatechange = responseXHR;

    queryString = "?ajax=true&a="+amountRequired;

    xhr.open("GET", ajaxUpdateRoute + queryString, true);
    newRequest = false;
    xhr.send();
  }else{
    var html = "<div>No Amounts given for a breakdown</div>";
    $("#breakdown").html(html);
  }
}

function responseXHR(){
  if (xhr.readyState == 4 && xhr.status == 200 && newRequest == false) {
    var responseJSON = JSON.parse(xhr.responseText);
    var responseJSONCount = Object.keys(responseJSON.data).length;
    if(responseJSONCount > 0 && responseJSON.success == true){
      var data = responseJSON.data
      var html = "";
      html = html + "<table>";
      html = html + "<thead>";
      html = html + "<tr>";
      html = html + "<th>Box Size</th>";
      html = html + "<th>Amount</th>";
      html = html + "</tr>";
      html = html + "</thead>";
      html = html + "<tbody>";

      for(var i = 0; i < data.length; i++){
        html = html + "<tr>";
        html = html + "<td>" + data[i].box_qty + "</td>";
        html = html + "<td>" + data[i].amount + "</td>";
        html = html + "</tr>";
      }

      html = html + "</tbody>";
      html = html + "</table>";

      $("#breakdown").html(html);
    }else{
      var html = "";
      for(var i = 0; i < responseJSON.messages.length; i++){
        html = html + "<div>" + responseJSON.messages[i] + "</div>";
      }
      $("#breakdown").html(html);
    }
  }
}


$(document).ready(function(){
  $("#amount-required").on("change", requestXHR);
  $("#amount-required").on("keyup", requestXHR);
});
