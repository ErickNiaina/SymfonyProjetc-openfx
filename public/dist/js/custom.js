$(function () {
  $('#pointage').datetimepicker({
      format: "L",
  });

  $('#Date_Debut').datetimepicker({
      format: "L"
  });
  $('#Date_Fin').datetimepicker({
      format: "L"
  });
  $("#pointage_heure").datetimepicker({
    format: "HH:mm",
    icons: {
        up: "fa fa-angle-up",
        down: "fa fa-angle-down"
    }
  });
  $("#pointageA_heure").datetimepicker({
    format: "HH:mm",
    icons: {
        up: "fa fa-angle-up",
        down: "fa fa-angle-down"
    }
  });
  $("#pointageD_heure").datetimepicker({
    format: "HH:mm",
    icons: {
        up: "fa fa-angle-up",
        down: "fa fa-angle-down"
    }
  });  
});