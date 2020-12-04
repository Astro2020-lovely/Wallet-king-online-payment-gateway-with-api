(function ($) {
	"use strict";

    jQuery(document).ready(function($){

        // $('#transaction-table').dataTable({
        //    "language": {
        //     "search": "",
        //     "searchPlaceholder": "Search"
        //   }
        // });

        /* Datepeaker */ 
		$('.input-daterange input').each(function() {
            $(this).datepicker('clearDates');
        });

        $('[data-toggle="popover"]').popover();
        /*  Slick Nav Mobile menu  */
	   $('#menuResponsive').slicknav({
		   prependTo: "#mobile-menu-wrap",
		   allowParentLinks : false,
		   label: ''	
	   });
	   $(".slicknav_btn").on('click', function() {
		  if ( $(this).hasClass("slicknav_collapsed")) {
			$(".slicknav_icon").html('<i class="fa fa-bars"></i>');
		  } else {
			$(".slicknav_icon").html('<i class="fa fa-times"></i>');
		  }
		});

       $(window).bind('scroll', function() {
        var navHeight = $(".header-top-area").height();
        ($(window).scrollTop() > navHeight) ? $('.header-area-wrapper').addClass('goToTop') : $('.header-area-wrapper').removeClass('goToTop');
    	});



		new WOW().init();


    });

    $(window).load(function(){
        setTimeout(function(){
            $('#cover').fadeOut(100);
        },500)
    });

    jQuery(window).load(function(){ 

    });


    $(document).ready(function(){

        $.fn.dataTableExt.afnFiltering.push(

            function (oSettings, aData, iDataIndex) {
                if (($('#min').length > 0 && $('#min').val() !== '') || ($('#max').length > 0 && $('#max').val() !== '')) {
                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth();
                    var yyyy = today.getFullYear();
                    console.log(today+"-- "+dd+" --"+mm+" --"+yyyy);
                    if (dd < 10) dd = '0' + dd;

                    if (mm < 10) mm = '0' + mm;

                    today = yyyy + '-' + mm + '-' + dd;
                    var minVal = $('#min').val();
                    var maxVal = $('#max').val();
                    //alert(minVal+"   ----   "+maxVal);
                    if (minVal !== '' || maxVal !== '') {
                        var iMin_temp = minVal;
                        if (iMin_temp === '') {
                            iMin_temp = '1980/01/01';
                        }

                        var iMax_temp = maxVal;
                        var arr_min = iMin_temp.split("-");

                        var arr_date = aData[0].split("-");
//console.log(arr_min[2]+"-- "+arr_min[0]+" --"+arr_min[1]);
                        var iMin = new Date(arr_min[2], arr_min[0]-1, arr_min[1]);
                        //  console.log(iMin);
                        // console.log(" --"+yyy);


                        var iMax = '';
                        if (iMax_temp != '') {
                            var arr_max = iMax_temp.split("-");
                            iMax = new Date(arr_max[2], arr_max[0]-1, arr_max[1], 0, 0, 0, 0);
                        }



                        var iDate = new Date(arr_date[2], arr_date[0]-1, arr_date[1], 0, 0, 0, 0);
                        //alert(iMin+" -- "+iMax);
                        //  console.log("Test data "+iMin+" -- "+iMax+"-- "+iDate+" --"+(iMin <= iDate && iDate <= iMax));
                        if (iMin === "" && iMax === "") {
                            return true;
                        } else if (iMin === "" && iDate < iMax) {
                            // alert("inside max values"+iDate);
                            return true;
                        } else if (iMax === "" && iDate >= iMin) {
                            // alert("inside max value is null"+iDate);
                            return true;
                        } else if (iMin <= iDate && iDate <= iMax) {
                            //  alert("inside both values"+iDate);
                            return true;
                        }
                        return false;
                    }
                }
                return true;
            });




        $("#min").datepicker({
            dateFormat:"yy-mm-dd",
            onSelect: function (date) {
                var selectedDate = new Date(date);
                var msecsInADay = 86400000;
                var endDate = new Date(selectedDate.getTime() + msecsInADay);

                $("#max").datepicker( "option", "minDate", endDate );
                table.draw();
            },
            changeMonth: true,
            changeYear: true
        });
        $("#max").datepicker({
            dateFormat:"yy-mm-dd",
            onSelect: function () {
                //var date1 = $('#max').datepicker('getDate');
//                    var date2 = $('#max').datepicker('getDate');
//                    date2.setDate(date2.getDate()+1);
//                    $('#max').datepicker('setDate', date2);
                //$('#max').val(date1.getFullYear()+'-0'+date1.getMonth()+'-'+date1.getDate());

                table.draw();
            },
            changeMonth: true,
            changeYear: true
        });

        var table = $('#transaction-table').DataTable({
            "bSort": false,
            "language": {
                "search": "",
                "searchPlaceholder": "Search Transactions",
                "lengthMenu": "Display _MENU_ Transactions",
                "zeroRecords": "No Transactions Found",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": "No transactions available",
                "infoFiltered": "(filtered from _MAX_ transactions)"
            }
        });

        // Event listener to the two range filtering inputs to redraw on input
        $('#min, #max').change(function () {
            table.draw();
        });
    });

    $("#reqemail").change(function(){

        var email = $(this).val();
        $.ajax({
            type: "GET",
            url: mainurl+'/checkacc/'+email,
            success: function (data) {
                if ($.trim(data) === "not"){
                    $("#recieverError").html("No Account Found with this email.");
                    $("#sbmtbtn").attr('disabled',true);
                }else {
                    $("#recieverError").html("");
                    $("#sbmtbtn").attr('disabled',false);
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    $('#resend-verify').click(function () {

        $("#load").fadeIn('fast');
        $.ajax({
            type: "GET",
            url: mainurl+'/account/verify/resend',
            success: function (data) {
                if ($.trim(data.status) === "success"){
                    $("#load").fadeOut('fast');
                    $("#resend-verify").fadeOut('fast');
                    $("#resendverify").html("<h4>A New Verification Link Send to Your Email. Please Check.</h4>");
                }else {
                    $("#resendverify").html("");
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    })



}(jQuery));	