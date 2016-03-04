<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">--> 
    <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/lightbox.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">
	
    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ URL::asset('images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('images/ico/apple-touch-icon-57-precomposed.png')}}">
    <style>
	.criteria-img { 
	   position: relative; 
	   width: 100%; /* for IE 6 */
	}
	
	.criteria-text { 
	   position: absolute; 
	   text-align:center; 
	   top: 100px; 
	   width: 100%; 
	}
	.progress-label {
		padding-left: 10px;
		font-size: 150%;
	}
	</style>
    
</head><!--/head-->

<body>
	<header id="header">      
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="/">
                    	<h1><img src="images/logo.png" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">                        
                        <li><a href="/">Exit</a></li>  
                        
                    </ul>
                </div>
                <div class="search">
                    <form role="form">
                        <i class="fa fa-sign-out"></i>
                    </form>
                </div>
                
            </div>
        </div>
    </header>
    <!--/#header-->
    <input id="curPID" type="text" value="" style="display:none;">
    <input id="idList" type="text" value="" style="display:none;">
	<div id="main-container">
    <section id="home-slider">
        <div class="container">
            <div class="row">
                <div class="main-slider">
                    <div class="slide-text">
                        <h1>We Provide Feedback :D</h1>
                        <p>Get real time feedback for your presentation based on customized criteria!</p>
                        <a href="#" class="btn btn-common" style="width: 250px;" data-toggle="modal" data-target="#authModal">New Presentation/Past Records</a><br>
                        <a href="#" class="btn btn-common" style="width: 250px;" data-toggle="modal" data-target="#enterModal">Check/Provide Feedback</a>
                    </div>
                    <img src="images/home/slider/hill.png" class="slider-hill" alt="slider image">
                    <img src="images/home/slider/house.png" class="slider-house" alt="slider image">
                    <img src="images/home/slider/sun.png" class="slider-sun" alt="slider image">
                    <img src="images/home/slider/birds1.png" class="slider-birds1" alt="slider image">
                    <img src="images/home/slider/birds2.png" class="slider-birds2" alt="slider image">
  
                </div>
            </div>
        </div>
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>
    <!--/#home-slider-->
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="authModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Tell Us Who You Are</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input id="email" class="form-control" placeholder="Enter your email">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="proceedBtn">Proceed</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->




    <!-- /.modal -->
    <div class="modal fade" id="createOrHistoryModal" tabindex="-1" role="dialog" aria-labelledby="createOrHistoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style = "align-content: center">Welcome!</h4>
                </div>
                <div class="modal-body">



                    <!--
                    <div class="form-group">
                        <label>Criteria</label><br>
                        <input type="text" id="criteria" value="" data-role="tagsinput"         />
                          <select multiple data-role="tagsinput" class="form-control" id="criteria">
                          <option value="Volume">Volume</option>
                          <option value="Eye Contact">Eye Contact</option>
                          <option value="Gesture">Gesture</option>
                          <option value="Time Control">Time Control</option>
                          <option value="Content">Content</option>
                        </select>
                    </div>-->





                    <div class="form-group">
                        <label for="disabledSelect">Email</label>
                        <input class="form-control" id="disabledEmail" type="text" placeholder="Disabled input" disabled>
                        <input id="idList2" type="text" value="" style="display:none;" >

                    </div>



                    <div>
                        <h2 style="align-self: center;">Hi presenter, please choose the action you want to perform</h2>
                        <button type="button" class="btn btn-default"  style="width: 350px;" id="toCreateBtn">Create a new presentation</button><br><br>
                        <button type="button" class="btn btn-default"  style="width: 350px;" id="showHistoryBtn">See my previous presentation</button>
                    </div>





                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->







    <!-- /.modal -->
    <div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="historyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <!--<div class="col-sm-3 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">-->
                    <div class="feature-inner">
                        <div class="icon-wrapper">
                            <i class="fa fa-2x fa-check-square-o"></i>
                        </div>

                        <!-- something not sure here -->
                        <div class="form-group">
                            <label for="disabledSelect">Email</label>
                            <input class="form-control" id="disabledEmail" type="text" placeholder="Disabled input" disabled>
                        </div>
                        <!-- something not sure here -->

                        <!--<h2 id="idlist"></h2>-->
                        <h2>Below are history of previous presentations created</h2>
                        <ul class="pin-ul">

                        </ul>
                    </div>
                    <!--</div>-->
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->





    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">New Presentation</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="disabledSelect">Email</label>
                        <input class="form-control" id="disabledEmail" type="text" placeholder="Disabled input" disabled>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input id="title" class="form-control" placeholder="Enter presentation title">
                    </div>
                    <div class="form-group">
                        <label>Presenter</label>
                        <input id="presenter" class="form-control" placeholder="Enter presenter name">
                    </div>
                    <div class="form-group">
                        <label>Criteria</label><br>
                        <input type="text" id="criteria" value="" data-role="tagsinput"         />
                        <!--<select multiple data-role="tagsinput" class="form-control" id="criteria">
                          <option value="Volume">Volume</option>
                          <option value="Eye Contact">Eye Contact</option>
                          <option value="Gesture">Gesture</option>
                          <option value="Time Control">Time Control</option>
                          <option value="Content">Content</option>
                        </select>-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="createBtn">Create</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->











    
    <!-- Modal -->
    <div class="modal fade" id="createSuccessModal" tabindex="-1" role="dialog" aria-labelledby="createSuccessModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Success</h4>
                </div>
                <div class="modal-body">
                    <!--<div class="col-sm-3 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">-->
                        <div class="feature-inner">
                            <div class="icon-wrapper">
                                <i class="fa fa-2x fa-check-square-o"></i>
                            </div>
                            <h2 id="pid"></h2>
                            <p>Audience can enter your presentation based on the ID shown above</p>
                        </div>
                    <!--</div>-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="createDoneBtn">OK</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    
    
    <!-- Modal -->
    <div class="modal fade" id="enterModal" tabindex="-1" role="dialog" aria-labelledby="enterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Enter Presentation</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Presentation ID</label>
                        <input id="enterPID" class="form-control" placeholder="Enter presentation ID">
                    </div>
                    <div class="form-group">
                        <label>Inline Radio Buttons</label><br>
                        <label class="radio-inline">
                            <input type="radio" name="enterAs" value="presenter" >Check Feedback
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="enterAs" value="listener" checked>Provide Feedback
                        </label>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="enterBtn">Confirm</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
                    
                    
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="images/home/under.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="testimonial bottom">
                        <h2>Testimonial</h2>
                        <div class="media">
                            <div class="pull-left">
                                <a href="#"><img src="images/home/profile1.png" alt=""></a>
                            </div>
                            <div class="media-body">
                                <blockquote>Nisi commodo bresaola, leberkas venison eiusmod bacon occaecat labore tail.</blockquote>
                                <h3><a href="#">- Jhon Kalis</a></h3>
                            </div>
                         </div>
                        <div class="media">
                            <div class="pull-left">
                                <a href="#"><img src="images/home/profile2.png" alt=""></a>
                            </div>
                            <div class="media-body">
                                <blockquote>Capicola nisi flank sed minim sunt aliqua rump pancetta leberkas venison eiusmod.</blockquote>
                                <h3><a href="">- Abraham Josef</a></h3>
                            </div>
                        </div>   
                    </div> 
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="contact-info bottom">
                        <h2>Contacts</h2>
                        <address>
                        E-mail: <a href="mailto:someone@example.com">email@email.com</a> <br> 
                        Phone: +1 (123) 456 7890 <br> 
                        Fax: +1 (123) 456 7891 <br> 
                        </address>

                        <h2>Address</h2>
                        <address>
                        Unit C2, St.Vincent's Trading Est., <br> 
                        Feeder Road, <br> 
                        Bristol, BS2 0UY <br> 
                        United Kingdom <br> 
                        </address>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="contact-form bottom">
                        <h2>Send a message</h2>
                        <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email Id">
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" required class="form-control" rows="8" placeholder="Your text here"></textarea>
                            </div>                        
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; Your Company 2014. All Rights Reserved.</p>
                        <p>Designed by <a target="_blank" href="http://www.themeum.com">Themeum</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->
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

	$(document).ready(function(){
		$.ajaxSetup({
   			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
        
        $('#proceedBtn').click(function(){
            var email = $('#email').val();
            alert("inside proceedBtn "+email);

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

        $('#toCreateBtn').click(function(){
            var email =  $('#disabledEmail').val();
            $.ajax({
                url:'toCreate',
                type: 'POST',
                data: {'email': email},
                success: function (data) {
                $('#createOrHistoryModal').modal('hide');
                $('#createModal').modal('show');
            // $('#createModal').modal("show").on('hide', function() {
            //   $('#createOrHistoryModal').modal('hide')
            //});
            }
        });

        });

        $('#showHistoryBtn').click(function(){
            alert("click submitted, work in progress!");
            //$('#createOrHistoryModal').modal('hide');
            //$('#createModal').modal('show');
            //var idarr = $('#idarr').val();
            /*var email =  $('#disabledEmail').val();
            $.ajax({
                url: 'getList',
                type: 'GET',
                data: {'email':email},
                success: function (data) {
                    alert(data);
                   // $('#title').val('');
                   // $('#presenter').val('');
                   // $('#criteria').tagsinput('removeAll');
                    $('#createOrHistoryModal').modal('hide');
                   // $('#pid').html(data);
                    $('#idList').val(data);
                    $('#idList2').val(data);
                    $('#historyModal').modal('show');
                }
            });*/
            //showHistory();
            alert("inside showHistory");
            var uri = $('#disabledEmail').val();
            var email =  encodeURI(uri);
            //var email = "yuanyuan920612gmail.com"
            alert("email get is: "+email);
            $.ajax({
                url: 'history',
                type: 'GET',
                data: {'email': email},
                success: function (data) {
                    alert("success");
                    $('#createOrHistoryModal').modal('hide');
                    $('#main-container').html(data);
                }
            });

        });
       
		$('#createBtn').click(function(){
			//alert("click detect");
			var title = $('#title').val();
			var presenter = $('#presenter').val();
			var criteria = $("#criteria").val();
            var email =  $('#disabledEmail').val();
            //alert(email);
			$.ajax({
    			url: 'create',
    			type: 'POST',
    			data: {'title': title, 'presenter':presenter, 'criteria':criteria, 'email':email},
    			success: function (data) {
                    //alert("back");
					$('#title').val('');
                    $('#presenter').val('');
                    $('#criteria').tagsinput('removeAll');
        			$('#createModal').modal('hide'); 
					$('#pid').html(data);
                    $('#curPID').val(data);
					$('#createSuccessModal').modal('show');
    			}
			});
			
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

		$('#createDoneBtn').click(function(){
			getFBForPresenter();
		});
        
        function getFBForAudience() {
            //alert("getFB");
            var pid = $('#curPID').val()
            //alert(pid);
            $.ajax({
                url: 'listener',
                type: 'GET',
                data: {'pid':pid},
                success: function (data) {
                    //alert("success");
                    $('#main-container').html(data);
                },
                complete: function() {
                    // Schedule the next request when the current one's complete
                    setTimeout(getFBForAudience, 5000);
                }
            });
        };
/*
        function showHistory(){

        };*/
        
        function validatePID(a,b) {
            var pid = a;
            var role = b;
            
            $.ajax({
                url: 'validatePID',
                type: 'GET',
                data: {'pid':pid},
                success: function (data) {
                    var num = parseInt(data);
                    if(num>0){
                        $('#curPID').val(pid);
                        if(role=="listener")
                            getFBForAudience();
                        else
                            getFBForPresenter();
                    }else{
                        alert("invalid PID entered");
                    }
                        
                }
            });
            
        };
        
		/*$('#enterBtn').click(function(){
			
			var pid = $("#enterPID").val();
            $('#curPID').val(pid);
            var role = $("input[name=enterAs]:checked").val();
            //validatePID(pid, role);
            if(role=="listener")
                getFBForAudience();
            else
                getFBForPresenter();
		});*/
        $('#enterBtn').click(function(){
			
			var pid = $("#enterPID").val();
            
            var role = $("input[name=enterAs]:checked").val();
            validatePID(pid, role);
		});
		
		
		
		$('#email').keypress(function (e) {
            if (e.which == 13) {
                return false;    //<---- Add this line
            }
        });

		
	});	
	</script>
</body>
</html>
