(function($) {
    remove = function(item) {
      var tr = $(item).closest('tr');
  
      tr.fadeOut(400, function() {
        tr.remove();  
      });
  
      return false;
    }
  })(jQuery);

  (function($) {
    AddTableRow = function() {
  
      var newRow = $("<tr>");
      var cols = "";
      cols += '<td><input type="text" style="border: 0px; " class="form-control" name="dependente[]"></td>';
      cols += '<td><input type="date" style="border: 0px; " class="form-control" name="nascimento[]"></td>';
      cols += '<td><input type="text" style="border: 0px; " class="form-control" name="parentesco[]"></td>';
      cols += '<td>'; 
      cols += '<button type="button" onclick="remove(this)" class="btn btn-danger">Excluir</button>';    
  






      newRow.append(cols);
      $("#products-table").append(newRow);
  
      return false;
    };
  })(jQuery);

function calcular() {
  var n1 = parseInt(document.getElementByName('n1').value, 10);
  var n2 = parseInt(document.getElementById('n2').value, 10);
  document.getElementById('resultado').innerHTML = n1 + n2;
}