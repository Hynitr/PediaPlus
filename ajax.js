$(document).ready(function () {
  //signup
  $("#sub").click(function () {
    var fname = $("#fname").val();
    var tel = $("#tel").val();
    var email = $("#email").val();
    var inst = $("#inst").val();
    var user = $("#usname").val();
    var pword = $("#pword").val();
    var cpword = $("#cpword").val();
    var ref = $("#ref").val();

    if (fname == "" || fname == null) {
      $("#msg").html("Input your full name please");
    } else {
      if (tel == "" || tel == null) {
        $("#msg").html("Telephone number cannot be empty");
      } else {
        if (email == "" || email == null) {
          $("#msg").html("Invalid email address");
        } else {
          if (inst == "" || inst == null) {
            $("#msg").html("Fill in your institution name");
          } else {
            if (user == "" || user == null) {
              $("#msg").html("Create a username");
            } else {
              if (pword == "" || pword == null) {
                $("#msg").html("Create a secured password");
              } else {
                if (cpword == "" || cpword == null) {
                  $("#msg").html("Confirm your password");
                } else {
                  if (pword != cpword) {
                    $("#msg").html("Password does not match");
                  } else {
                    $("#msg").html("Loading...Please Wait");

                    $.ajax({
                      type: "post",
                      url: "functions/init.php",
                      data: {
                        fname: fname,
                        tel: tel,
                        email: email,
                        user: user,
                        pword: pword,
                        cpword: cpword,
                        inst: inst,
                        ref: ref,
                      },
                      success: function (data) {
                        $("#msg").html(data);
                      },
                    });
                  }
                }
              }
            }
          }
        }
      }
    }
    $("#exampleModalCenter").modal();
  });

  //signin
  $("#signin").click(function () {
    var username = $("#lgusr").val();
    var password = $("#lgpword").val();

    if (username == "" || username == null) {
      $("#msg").html("Please insert your username");
    } else {
      if (password == "" || password == null) {
        $("#msg").html("Your password is empty");
      } else {
        $.ajax({
          type: "post",
          url: "functions/init.php",
          data: { username: username, password: password },
          success: function (data) {
            $("#msg").html(data);
          },
        });
      }
    }

    $("#exampleModalCenter").modal();
  });

  //forgot
  $("#forgot").click(function () {
    var fgeml = $("#fgeml").val();

    if (fgeml == "" || fgeml == null) {
      $("#msg").html("Please insert your email");
    } else {
      $("#msg").html("Loading...Please Wait!");

      $.ajax({
        type: "post",
        url: "functions/init.php",
        data: { fgeml: fgeml },
        success: function (data) {
          $("#msg").html(data);
        },
      });
    }

    $("#exampleModalCenter").modal();
  });

  //reset
  $("#reset").click(function () {
    var fgpword = $("#fgpword").val();
    var fgcpword = $("#fgcpword").val();
    var act = $("#act").text();

    if (fgpword == "" || fgpword == null) {
      $("#msg").html("Please create a password");
    } else {
      if (fgcpword == "" || fgcpword == null) {
        $("#msg").html("Confirm Your Password");
      } else {
        if (fgpword != fgcpword) {
          $("#msg").html("Password does not match!");
        } else {
          $("#msg").html("Loading...Please Wait!");

          $.ajax({
            type: "post",
            url: "functions/init.php",
            data: { fgpword: fgpword, fgcpword: fgcpword, act: act },
            success: function (data) {
              $("#msg").html(data);
            },
          });
        }
      }
    }

    $("#exampleModalCenter").modal();
  });

  /******** USER PROFILE SECTION */

  /** USER PROFILE PICTURE */
  $("#pupl").click(function () {
    var fd = new FormData();
    var files = $("#psfile").prop("files")[0];
    fd.append("fle", files);

    if (files == null || files == "") {
      $("#msg").text("Kindly select a picture");
    } else {
      $("#msg").text(
        "Loading.. Make sure you have a strong internet connection"
      );

      $.ajax({
        type: "post",
        url: "functions/init.php",
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
          $("#msg").html(data);
        },
      });
    }
  });

  /** COPY REFERRAL LINK TO CLIPBOARD */
  $("#copy").click(function () {
    $("#copy").text("Copied!");

    $("#refLink").on("hidden.bs.modal", function () {
      $("#copy").text("Copy Referral Link");
    });
  });

  /** DONATE PDFs **/
  $("#donatenow").click(function () {
    var inst = $("#inst").val();
    var typ = $("#typ").val();
    var title = $("#title").val();
    var fcg = $("#fcg").val();
    var dept = $("#dept").val();
    var level = $("#level").val();

    if (inst == "" || inst == null) {
      $("#dntmsg").html("Please input your institution name");
    } else {
      if (title == "" || title == null) {
        $("#dntmsg").html("Your PDF title cannot be empty");
      } else {
        if (fcg == "" || fcg == null) {
          $("#dntmsg").html("Kindly input the PDF Faculty or College");
        } else {
          if (dept == "" || dept == null) {
            $("#dntmsg").html("Kindly input the PDF Department");
          } else {
            $("#dntmsg").html(
              "Loading.. Make sure you have a strong internet connection"
            );

            $.ajax({
              type: "post",
              url: "functions/init.php",
              data: {
                inst: inst,
                typ: typ,
                title: title,
                fcg: fcg,
                dept: dept,
                level: level,
              },
              success: function (data) {
                $("#dntmsg").html(data);
              },
            });
          }
        }
      }
    }

    $("#donateModalCenter").modal();
  });

  /** UPLOAD PDF FILE
  $("#donatnow").click(function () {


      $.ajax({
        type: "post",
        url: "functions/init.php",
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
          $("#dntmsg").html(data);
        },
      });
    }
    $("#donateModalCenter").modal();
  });**/

  /** SEARCH FILTER */
  $("#filter").click(function () {
    var inst = $("#inst").val();
    var fcg = $("#fcg").val();
    var dept = $("#dept").val();
    var level = $("#level").val();
    var srctxt = $("#srctxt").val();

    window.location.href =
      "./search?txt=" +
      srctxt +
      "&inst=" +
      inst +
      "&fcg=" +
      fcg +
      "&dept=" +
      dept +
      "&level=" +
      level;
  });

  /** SEARCH FILTER ADVANCED */
  $("#pqfilterr").click(function () {
    var inst = $("#inst").val();
    var fcg = $("#fcg").val();
    var dept = $("#dept").val();
    var level = $("#level").val();
    var srctxt = $("#srctxt").val();

    //window.location.href = "./search?txt=" + srctxt + "&inst=" + inst + "&fcg=" + fcg + "&dept=" + dept + "&level=" + level;

    var xhr = new XMLHttpRequest();
    document.getElementById("resl").innerHTML =
      "<span style='color: #ff0000; text-align: center;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Loading.. Please wait!</span>";

    xhr.open(
      "GET",
      "./pqsearchresult?txt=" +
        srctxt +
        "&inst=" +
        inst +
        "&fcg=" +
        fcg +
        "&dept=" +
        dept +
        "&level=" +
        level,
      true
    );

    xhr.onload = function () {
      if (xhr.status == 200) {
        //document.write(this.responseText);
        document.getElementById("resl").innerHTML = xhr.responseText;
      } else {
        document.getElementById("resl").innerHTML =
          "<span style='color: #ff0000'>Error loading document. <br/> Kindly try again later!</span>";
      }
    };

    xhr.send();
  });

  /** SEARCH FILTER ADVANCED */
  $("#filterr").click(function () {
    var inst = $("#inst").val();
    var fcg = $("#fcg").val();
    var dept = $("#dept").val();
    var level = $("#level").val();
    var srctxt = $("#srctxt").val();

    //window.location.href = "./search?txt=" + srctxt + "&inst=" + inst + "&fcg=" + fcg + "&dept=" + dept + "&level=" + level;

    var xhr = new XMLHttpRequest();
    document.getElementById("resl").innerHTML =
      "<span style='color: #ff0000; text-align: center;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Loading.. Please wait!</span>";

    xhr.open(
      "GET",
      "./searchresult?txt=" +
        srctxt +
        "&inst=" +
        inst +
        "&fcg=" +
        fcg +
        "&dept=" +
        dept +
        "&level=" +
        level,
      true
    );

    xhr.onload = function () {
      if (xhr.status == 200) {
        //document.write(this.responseText);
        document.getElementById("resl").innerHTML = xhr.responseText;
      } else {
        document.getElementById("resl").innerHTML =
          "<span style='color: #ff0000'>Error loading document. <br/> Kindly try again later!</span>";
      }
    };

    xhr.send();
  });

/**WITHDRAW FUNDS */
$("#withdraw").click(function () {
var point = $("#vall").text();

if(point <= 99){
  alert("The minimum withdrawal is NGN1,000");

} else {

alert("You have been scheduled for withdrawal");
}
});


/**BUY PEDIA CREDIT */

});
