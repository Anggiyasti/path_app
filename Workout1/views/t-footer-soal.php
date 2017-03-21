<!-- ini START Template Footer -->







<script type="text/javascript" src="<?= base_url('assets/library/jquery/jquery.min.js'); ?>"></script>



<!--/ END Template Footer -->




<script type="text/javascript" src="<?= base_url('assets/library/bootstrap/js/bootstrap.min.js'); ?>"></script>



<script type="text/javascript" src="<?= base_url('assets/library/core/js/core.min.js'); ?>"></script>



<!--/ Library script -->







<!-- App and page level script -->



<!-- ini footer -->

<script src="<?php echo base_url(); ?>assets/js/paginga.jquery.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/soal_to.js"></script>

<script type="text/javascript">

    window.onbeforeunload = function () {
        return "Data yang dimasukan akan hilang, yakin keluar dari halaman?";
    };

</script>

<script>
var base_url = "<?php echo base_url();?>" ;



    function disableF5(e) {
        if ((e.which || e.keyCode) == 116)
            e.preventDefault();
    }

    ;

    $(document).on("keydown", disableF5);
    $(document).bind("contextmenu", function (e) {
       e.preventDefault();
   });

    // DISABLE F 5 

    // KALO HALAMAN DI RELOAD
    window.onbeforeunload = function (e) {
      e = e || window.event;

        // For IE and Firefox prior to version 4
        if (e) {
          e.returnValue = 'A search is in progress, do you really want to stop the search and close the tab?';
        }

        // For Safari
        return 'A search is in progress, do you really want to stop the search and close the tab?';
      };
  // KALO HALAMAN DI RELOAD

  window.onbeforeunload = function () {

    return  "Are you sure want to LOGOUT the session ?";
};


//     function countup(hour, min, second, stat) {

//         var seconds = second;

//         var mins = min;

//         var hours = hour;



//         if (getCookie("minutes") && getCookie("seconds") && getCookie("hours") && stat)

//         {

//             var seconds = getCookie("seconds");

//             var mins = getCookie("minutes");

//             var hours = getCookie("hours");

//         }



//         function tick() {

//             var counter = document.getElementById("timer");

//             setCookie("minutes", mins, 10);

//             setCookie("seconds", seconds, 10);

//             setCookie("hours", hours, 10);



//             seconds++;



//             counter.innerHTML = (hours < 10 ? "0" : "") + String(hours) + ":" + (mins < 10 ? "0" : "") + String(mins) + ":" + (seconds < 10 ? "0" : "") + String(seconds);

//             document.getElementById("durasi").value = (hours * 60 * 60) + (mins * 60) + seconds;



//             //save the time in cookie

//             if (seconds < 59) {

//                 setTimeout(tick, 1000);

//             } else {

//                 if (seconds == 59 && mins == 59) {

//                     setTimeout(function () {

//                         countup(parseInt(hours) + 1, 0, false);

//                     }, 1000);

//                 } else if (seconds == 59) {

//                     setTimeout(function () {

//                         countup(parseInt(hours), parseInt(mins) + 1, -1, false);

//                     }, 1000);

//                 }

//             }



//         }

//         tick();

//     }



//     function setCookie(cname, cvalue, exdays) {

// //        var d = new Date();

// //        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));

// //        var expires = "expires=" + d.toGMTString();

//         document.cookie = cname + "=" + cvalue + "; " + exdays;

//     }

//     function getCookie(cname) {

//         var name = cname + "=";

//         var ca = document.cookie.split(';');

//         for (var i = 0; i < ca.length; i++) {

//             var c = ca[i];

//             while (c.charAt(0) == ' ')
//                 c = c.substring(1);

//             if (c.indexOf(name) == 0) {

//                 return c.substring(name.length, c.length);

//             }

//         }

//         return "";

//     }




// //     deleteAllCookies('hours','seconds', 'minutes');

// //        deleteAllCookies();

// //    countdown(0, true);

//     countup(0, 0, 0, true);
    






//     function deleteAllCookies(seconds, mins, hours) {

//         document.cookie = seconds + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';

//         document.cookie = mins + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';

//         document.cookie = hours + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';

//     }

</script>

<script>

    function countdown(minutes, stat) {

        var seconds = 60;

        var mins = minutes;



        if (getCookie("minutes") && getCookie("seconds") && stat)

        {

            var seconds = getCookie("seconds");

            var mins = getCookie("minutes");

        }



        function tick() {

            var counter = document.getElementById("timer");

            setCookie("minutes", mins, 10);

            setCookie("seconds", seconds, 10);

            var current_minutes = mins - 1



            seconds--;



            counter.innerHTML = current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);



            //save the time in cookie

            if (seconds > 0) {

                setTimeout(tick, 1000);

            } else {

                if (mins > 1) {

                    // countdown(mins-1);   never reach “00″ issue solved:Contributed by Victor Streithorst

                    setTimeout(function () {

                        countdown(parseInt(mins) - 1, false);

                    }, 1000);

                } else {

                    swal("Waktu Habis!", "Saatnya mengirimkan hasil jawabanmu!", "success");
                    swal({
                      title: "Waktu Habis!",
                      text: "Saatnya mengirimkan hasil jawabanmu!",
                      type: "success",
                      showCancelButton: false,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Oke!",
                      // cancelButtonText: "Tidak, batalkan!",
                      closeOnConfirm: false,
                      closeOnCancel: false
                    },
                    function(isConfirm){
                      if (isConfirm) {
                        document.getElementById("hasil").submit();
                        window.onbeforeunload = null;

                        deleteAllCookies('seconds', 'minutes');
                      } else {
                        document.getElementById("hasil").submit();
                        window.onbeforeunload = null;

                        deleteAllCookies('seconds', 'minutes');
                      }
                    });
                    // alert('Waktu Habis!');
                }

            }

        }

        tick();

    }



    function setCookie(cname, cvalue, exdays) {

        var d = new Date();

        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));

        var expires = "expires=" + d.toGMTString();

        document.cookie = cname + "=" + cvalue + "; " + expires;

    }

    function getCookie(cname) {

        var name = cname + "=";

        var ca = document.cookie.split(';');

        for (var i = 0; i < ca.length; i++) {

            var c = ca[i];

            while (c.charAt(0) == ' ')
                c = c.substring(1);

            if (c.indexOf(name) == 0) {

                return c.substring(name.length, c.length);

            }

        }

        return "";

    }



    // deleteAllCookies('seconds', 'minutes');

//        deleteAllCookies();

   countdown(<?php foreach ($paket as $row) {echo $row['durasi']; } ?>, true);
    // countdown(1, true);

//    countup(0, 0, 0, true);





    function deleteAllCookies(seconds, mins) {

        document.cookie = seconds + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';

        document.cookie = mins + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';

    }

</script>

<script type="text/javascript">

    function deleteAllCookies() {

        setCookie('minutes', '', -1);

        setCookie('seconds', '', -1);

        setCookie('hours', '', -1);

    }

</script>








<script>

    function statusPengisian(status) {

        var id = status;

        var x = document.getElementById(id);

//        x.classList.remove("btn-danger");

        x.className += " btn-primary";

    }

    function kirimHasil(){
      if (!$("input[type=radio]:checked").length > 0) {
            // tidak ada jawaban yg di kirim
            swal("Dibatalkan", "Maaf, anda tidak dapat mengirimkan lembar jawaban kosong!", "error");
          }else{
        window.onbeforeunload = null;
        swal({
          title: "Yakin selesai mengerjakan?",
          text: "Kamu tidak akan bisa kembali ke latihan ini lagi!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya, saya yakin!",
          cancelButtonText: "Tidak, batalkan!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            window.onbeforeunload = null;
            deleteAllCookies('seconds', 'minutes', 'hours');
            // document.getElementById("hasil").submit();
            cek_workout();
          } else {
            swal("Dibatalkan", "Pengiriman LJK dibatalkan", "error");
          }
        });
       
       
    }}

    function cek_workout(){
      $.ajax({
                  type: "POST",
                  dataType: "TEXT",
                  url: base_url+"workout1/cekjawaban",
                  data: $('#hasil').serialize(),

                  success: function(){
                    deleteAllCookies('seconds', 'minutes');
                    window.localStorage.clear();
                    window.location.href = base_url+"workout1";
                  },error:function(){
                    swal('Gagal menghubungkan ke server')
                  }
                });

    }


    function kirimHasil2(){
      if (!$("input[type=radio]:checked").length > 0) {
            // tidak ada jawaban yg di kirim
            swal("Dibatalkan", "Maaf, anda tidak dapat mengirimkan lembar jawaban kosong!", "error");
          }else{
        window.onbeforeunload = null;
        swal({
          title: "Yakin selesai mengerjakan?",
          text: "kamu tidak akan bisa kembali ke latihan ini lagi!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya, saya yakin!",
          cancelButtonText: "Tidak, batalkan!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            window.onbeforeunload = null;
            deleteAllCookies('seconds', 'minutes', 'hours');
            // document.getElementById("hasil").submit();
            a();
          } else {
            swal("Dibatalkan", "Pengiriman LJK dibatalkan", "error");
          }
        });
       
       
    }}

    function a(){
$.ajax({
                  type: "POST",
                  dataType: "TEXT",
                  url: base_url+"linetopik/cekjawaban_part3",
                  data: $('#hasil').serialize(),

                  success: function(){
                    deleteAllCookies('seconds', 'minutes');
                    window.localStorage.clear();
                    window.location.href = base_url+"linetopik";
                  },error:function(){
                    swal('Gagal menghubungkan ke server')
                  }
                });

}

function kirimHasil3(){
      if (!$("input[type=radio]:checked").length > 0) {
            // tidak ada jawaban yg di kirim
            swal("Dibatalkan", "Maaf, anda tidak dapat mengirimkan lembar jawaban kosong!", "error");
          }else{
        window.onbeforeunload = null;
        swal({
          title: "Yakin selesai mengerjakan?",
          text: "kamu tidak akan bisa kembali ke latihan ini lagi!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya, saya yakin!",
          cancelButtonText: "Tidak, batalkan!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            window.onbeforeunload = null;
            deleteAllCookies('seconds', 'minutes', 'hours');
            // document.getElementById("hasil").submit();
            cek_jawaban_part1();
          } else {
            swal("Dibatalkan", "Pengiriman LJK dibatalkan", "error");
          }
        });
       
       
    }}

    function cek_jawaban_part1(){
      $.ajax({
                  type: "POST",
                  dataType: "TEXT",
                  url: base_url+"linetopik/cekjawaban",
                  data: $('#hasil_part1').serialize(),

                  success: function(){
                    deleteAllCookies('seconds', 'minutes');
                    window.localStorage.clear();
                    window.location.href = base_url+"linetopik";
                  },error:function(){
                    swal('Gagal menghubungkan ke server')
                  }
                });

}

function kirimHasil_part1(){
      if (!$("input[type=radio]:checked").length > 0) {
            // tidak ada jawaban yg di kirim
            swal("Dibatalkan", "Maaf, anda tidak dapat mengirimkan lembar jawaban kosong!", "error");
          }else{
        window.onbeforeunload = null;
        swal({
          title: "Yakin selesai mengerjakan?",
          text: "kamu tidak akan bisa kembali ke latihan ini lagi!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya, saya yakin!",
          cancelButtonText: "Tidak, batalkan!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            window.onbeforeunload = null;
            deleteAllCookies('seconds', 'minutes', 'hours');
            // document.getElementById("hasil").submit();
            cek_jawaban_part1();
          } else {
            swal("Dibatalkan", "Pengiriman LJK dibatalkan", "error");
          }
        });
       
       
    }}

    function cek_jawaban_part1(){
      $.ajax({
                  type: "POST",
                  dataType: "TEXT",
                  url: base_url+"linetopik/cekjawaban",
                  data: $('#hasil_part1').serialize(),

                  success: function(){
                    deleteAllCookies('seconds', 'minutes');
                    window.localStorage.clear();
                    window.location.href = base_url+"linetopik";
                  },error:function(){
                    swal('Gagal menghubungkan ke server')
                  }
                });

    }

    function kirimHasil_part2(){
      if (!$("input[type=radio]:checked").length > 0) {
            // tidak ada jawaban yg di kirim
            swal("Dibatalkan", "Maaf, anda tidak dapat mengirimkan lembar jawaban kosong!", "error");
          }else{
        window.onbeforeunload = null;
        swal({
          title: "Yakin selesai mengerjakan?",
          text: "Kamu tidak akan bisa kembali ke latihan ini lagi!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya, saya yakin!",
          cancelButtonText: "Tidak, batalkan!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            window.onbeforeunload = null;
            deleteAllCookies('seconds', 'minutes', 'hours');
            // document.getElementById("hasil").submit();
            cek_jawaban_part2();
          } else {
            swal("Dibatalkan", "Pengiriman LJK dibatalkan", "error");
          }
        });
       
       
    }}

    function cek_jawaban_part2(){
      $.ajax({
                  type: "POST",
                  dataType: "TEXT",
                  url: base_url+"linetopik/cekjawaban_part2",
                  data: $('#hasil_part2').serialize(),

                  success: function(){
                    deleteAllCookies('seconds', 'minutes');
                    window.localStorage.clear();
                    window.location.href = base_url+"linetopik";
                  },error:function(){
                    swal('Gagal menghubungkan ke server')
                  }
                });

    }
</script>



<script type="text/javascript" src="<?= base_url('assets/plugins/owl/js/owl.carousel.min.js'); ?>"></script>



<script type="text/javascript" src="<?= base_url('assets/javascript/pages/frontend/home.js'); ?>"></script>


<!-- Start Math jax --> 
<script type="text/x-mathjax-config"> 
    MathJax.Hub.Config({ 
    tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]} 
    }); 
</script> 
<script type="text/javascript" async 
        src="<?= base_url('assets/adminre/plugins/MathJax-master/MathJax.js?config=TeX-MML-AM_HTMLorMML') ?>">
</script> 
<!-- end Math jax -->
</body>