$('#the_button').click(function () {
    $('#installingModal').modal({
        backdrop: 'static',
        keyboard: false
    });
    $('#installingModal').modal('show');
    $.ajax({
        type: "POST",
        url: "run_install.php",
        data: $("#installer").serialize(),
        async: true,
        xhr: function () {
            var xhr = new window.XMLHttpRequest();
            //Upload Progress
            xhr.upload.addEventListener("progress", function (evt) {
                    var percentComplete = "";

                    if (evt.lengthComputable) {
                        percentComplete = (evt.loaded / evt.total);
                    }else{
                        percentComplete = 1;
                    }
                    move();
                    function move() {
                        var width = 1;
                        var id = setInterval(frame, percentComplete);
                        function frame() {
                            if (width >= 100) {
                                clearInterval(id);
                            } else {
                                width++;
                                $('#insprogress').find('.progress-bar').css({ "width": width + "%" });
                            }
                        }
                    }
                },
                false
            );

            //Download progress
            xhr.addEventListener("progress", function (evt){
                    var percentComplete = "";

                    if (evt.lengthComputable) {
                        percentComplete = (evt.loaded / evt.total);
                    }else{
                        percentComplete = 1;
                    }
                    move();
                    function move() {
                        var width = 1;
                        var id = setInterval(frame, percentComplete);
                        function frame() {
                            if (width >= 100) {
                                clearInterval(id);
                            } else {
                                width++;
                                $('#insprogress').find('.progress-bar').css({ "width": width + "%" });
                            }
                        }
                    }
                },
                false
            );
            return xhr;
        },
        success: function(data) {
            //alert("Form Submitted: " + msg);
            setTimeout(function(){
                if($.trim(data) === 'success'){
                    $('#info_head').html('<span style="color:green;"><i class="fa fa-check-circle fa-3x"></i></span><br>Installation Success !!');
                    $('#info_body').html('Your Installation is completed success fully.<br>Please visit your website now. <br>Thank you');
                    $('#info_button').html('<a href="'+domain_URL+'/finalize" class="btn btn-default">Close & Run Website</a>');
                    //$('#loading').hide();
                    $('#installingModal').modal('hide');
                    $('#myModal').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#myModal').modal('show');
                }else {
                    $('#info_head').html('<span style="color:red;"><i class="fa fa-exclamation-circle fa-3x"></i></span><br>Installation Failed !!');
                    $('#info_body').html(data);
                    $('#info_button').html('<button type="button" class="btn btn-warning" data-dismiss="modal">Close & Try Again</button>');
                    //$('#loading').hide();
                    $('#installingModal').modal('hide');
                    $('#myModal').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#myModal').modal('show');
                }

            }, 1000);
        }
    })
});
