
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Presentation history</title>

</head>
<body>
    <input id="curPID" type="text" value="" style="display:none;">

    <div class="container">
        <div id="histroy-section" class="slide-text">
            <h1 class="page-header" id="stream-title">The presentation history </h1>
            <h2 style="font-size: large;">Presenter: {{ $email }}</h2>
            <ol>
            @foreach ($idlist as $id)
                <div>
                    <li class="action"><a href='javascript:void(0);' class="toFB" id= {{$id}} >{{ $id }}</a></li>
                </div>
            @endforeach
            </ol>
        </div><!--/#progressbar-container-->
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>

    <script type="text/javascript" src="bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <!--<script type="text/javascript" src="bootstrap-tagsinput/bootstrap-tagsinput-angular.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>-->


    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

    <script>

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
            });

            $(document).on("click", "a.toFB" , function() {
                alert("inside a click!!!!")
                alert($(this).attr('id'));
                goToPresenterFB($(this).attr('id'));
            });

            $('#proceedBtn').click(function () {
                var email = $('#email').val();
                alert("inside proceedBtn " + email);

                $.ajax({
                    url: 'auth',
                    type: 'GET',
                    data: {'email': email},
                    success: function (data) {
                        $('#criteria').tagsinput('add', data);
                        $('#email').val('');
                        $('#authModal').modal('hide');
                        $('#disabledEmail').val(email);
                        $('#createOrHistoryModal').modal('show');

                    }
                });
                alert("end of proceedBtn");


            });

            function getFBForPresenter() {
                //alert("getFB");
                var pid = $('#curPID').val()
                //alert(pid);
                $.ajax({
                    url: 'presenter',
                    type: 'GET',
                    data: {'pid':pid},
                    success: function (data) {
                        //alert("success");
                        $('#main-container').html(data);
                    },
                    complete: function() {
                        // Schedule the next request when the current one's complete
                        setTimeout(getFBForPresenter, 5000);
                    }
                });
            };

            function goToPresenterFB(a){
                var pid=a;
                $.ajax({
                    url: 'validatePID',
                    type: 'GET',
                    data: {'pid':pid},
                    success: function (data) {
                        var num = parseInt(data);
                        if(num>0){
                            $('#curPID').val(pid);
                                getFBForPresenter();
                        }else{
                            alert("invalid PID entered");
                        }

                    }
                });
            }
        });
    </script>
</body>

</html>