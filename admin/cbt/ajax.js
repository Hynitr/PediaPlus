$(document).ready(function () {
  //signin
  $("#login").click(function () {
    var usrname = $("#usrname").val();
    var password = $("#password").val();
    $("#ModalCenter").modal();

    $.ajax({
      type: "post",
      url: "functions/init.php",
      data: { usrname: usrname, password: password },
      success: function (data) {
        $("#msg").html(data);
      },
    });
  });

  //cbtstarted
  $("#cbtstart").click(function () {
    var sur = $("#sur").val();
    var nme = $("#nme").val();
    var sbj = $("#sbj").val();

    $("#ModalCenter").modal();

    //validate form
    var a = document.forms["cbter"]["sur"].value;
    var b = document.forms["cbter"]["nme"].value;

    if (a == null || a == "") {
      document.getElementById("msg").innerHTML = "Please Input your Full Name";
      return false;
    } else {
      if (b == null || b == "") {
        document.getElementById("msg").innerHTML =
          "Please Input a valid access code ";
        return false;
      }
    }

    $.ajax({
      type: "post",
      url: "../functions/init.php",
      data: { sur: sur, nme: nme, sbj: sbj },
      success: function (data) {
        $("#msg").html(data);
      },
    });
  });

  //cbt isbtruction
  $("#startcbt").click(function () {
    var cbtsbj = $("#cbtsbj").val();

    if (cbtsbj == "Select Subject") {
      alert("Kindly select a Subject");
    } else {
      window.location.href = "./instruct?id=" + cbtsbj;
    }
  });

  //cbt start
  $("#rcbtstart").click(function () {
    var cbbr = $("#cbbr").text();

    window.location.href = "./startcbt?id=" + cbbr;
  });

  //time up button
  $("#timeup").click(function () {
    var timeup = $("#yours").val();
    $("#ModalCenter").modal();

    $.ajax({
      type: "post",
      url: "call.php",
      data: { timeup: timeup },
      success: function (data) {
        $("#msg").html(data);
      },
    });
  });
});
