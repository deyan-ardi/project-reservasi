// Row Selection
$(function () {
  $("#rowSelection").DataTable({
    iDisplayLength: 3,
    responsive: true,
  });
  var table = $("#rowSelection").DataTable();

  $("#rowSelection tbody").on("click", "tr", function () {
    $(this).toggleClass("selected");
  });

  $("#button").on("click", function () {
    alert(table.rows(".selected").data().length + " row(s) selected");
  });
});

// Row Selection
$(function () {
  $("#rowSelection2").DataTable({
    iDisplayLength: 12,
  });
  var table = $("#rowSelection2").DataTable();

  $("#rowSelection2 tbody").on("click", "tr", function () {
    $(this).toggleClass("selected");
  });

  $("#button").on("click", function () {
    alert(table.rows(".selected").data().length + " row(s) selected");
  });
});
