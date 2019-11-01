function deleteRecord(){
  var proceed = confirm("Are you sure you want to delete this record?");

  if(proceed){
    return true;
  }else{
    return false;
  }
}

function deleteNewLine(e, elem){
  event.preventDefault();
  $(elem).parent().parent().remove();
}

$(document).ready(function(){
  $("#add-new-product-row").on("click", function(){
    var html = "";
    html = html + "<tr>";
    html = html + "<td>";
    html = html + "<div class=\"form-group\">";
    html = html + "<input type=\"text\" name=\"new_product_name[]\" class=\"form-control\" value=\"\"/>";
    html = html + "</div>";
    html = html + "</td>";
    html = html + "<td>";
    html = html + "<div class=\"form-group\">";
    html = html + "<input type=\"text\" name=\"new_product_box_qty[]\" class=\"form-control\" value=\"\"/>";
    html = html + "</div>";
    html = html + "</td>";
    html = html + "<td class=\"text-center\"><a href=\"#\" onclick=\"deleteNewLine(event, this)\" class=\"btn btn-warning\"><i class=\"fas fa-minus\"></i></a></td>";
    html = html + "</tr>";
    $("#products-table tbody").append(html);
  });
});
