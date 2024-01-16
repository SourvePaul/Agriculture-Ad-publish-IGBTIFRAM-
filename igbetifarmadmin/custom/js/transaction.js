function addRow() {
    $("#addRowBtn").button("loading");

    var tableLength = $("#productTable tbody tr").length;

    var tableRow;
    var arrayNumber;
    var count;

    if (tableLength > 0) {
        tableRow = $("#productTable tbody tr:last").attr('id');
        arrayNumber = $("#productTable tbody tr:last").attr('class');
        count = tableRow.substring(3);
        count = Number(count) + 1;
        arrayNumber = Number(arrayNumber) + 1;
    } else {
        // no table row
        count = 1;
        arrayNumber = 0;
    }

    $.ajax({
        url: 'php_action/fetchAccountData.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            $("#addRowBtn").button("reset");

            var tr = '<tr id="row' + count + '" class="' + arrayNumber + '">' +
                '<td style="width:25%;text-align:left">' +
               

                '<select class="form-control" name="particulars[]" id="productName' + count + '" onchange="getProductData(' + count + ')" >' +
                '<option value="">~~SELECT~~</option>';
            // console.log(response);
            $.each(response, function (index, value) {
                tr += '<option value="' + value[0] + '">' + value[1] + '</option>';
            });

            tr += '</select>' +
                
                '</td>' +
                '<td style="width:35%;text-align:left">' +
                '<input type="text" name="sub_description[]" id="rate' + count + '" autocomplete="off"  class="form-control" />' +
                
                '</td>' +
                '<td style="width:15%;text-align:right">' +
                
                '<input type="number" name="p_debit[]" id="quantity' + count + '" onkeyup="getTotal(' + count + ')" autocomplete="off" class="form-control" min="1" />' +
                
                '</td>' +
                '<td style="width:15%;text-align:right">' +
                '<input type="text" name="p_credit[]" id="total' + count + '" autocomplete="off" class="form-control"  />' +
  
                '</td>' +
                '<td style="width:10%;text-align:center">' +
                '<button class="btn btn-danger removeProductRowBtn" type="button" onclick="removeProductRow(' + count + ')"><i class="glyphicon glyphicon-trash"></i></button>' +
                '</td>' +
                '</tr>';
            if (tableLength > 0) {
                $("#productTable tbody tr:last").after(tr);
            } else {
                $("#productTable tbody").append(tr);
            }

        } // /success
    });	// get the product data

} // /add row


function removeProductRow(row = null) {
    if (row) {
        $("#row" + row).remove();


        subAmount();
    } else {
        alert('error! Refresh the page again');
    }
}