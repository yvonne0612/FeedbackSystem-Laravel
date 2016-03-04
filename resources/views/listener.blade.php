<style>
	.criteria-text { 
	   position: absolute; 
	   text-align:center; 
	   top: 100px; 
	   width: 100%; 
	}
</style>

<section id="page-breadcrumb">
    <div class="vertical-center sun">
         <div class="container">
            <div class="row">
                <div class="action">
                    <div class="col-sm-12">
                        <h1 class="title" id="fd-title">{{ $title }}</h1>
                        <p id="fd-session">{{ $pid }}</p>
                        <p id="fd-presenter">{{ $presenter }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#action-->

<section id="blog" class="padding-top padding-bottom">
        <div class="container">
            <div class="row">
                <div class="masonery_area">
                    @foreach ($tags as $tag)
                    <div class="col-md-3 col-sm-4">
                        <div class="single-blog two-column">
                            <div class="post-thumb">
                                <a class="tag-block" href="#">
                                    <div style="background-color:tranparent; width:261px; height:269px; padding:50px;" class="frameimg img-responsive">
                                        <div style="background-color:tranparent; width:161px; height:169px;" class="bgimg img-responsive"> 
                                        </div>
                                    </div>
                                    <h2 class="criteria-text">{{ $tag[0] }}</h2>
                                    <div class="framecolor" style="display:none">{{ $tag[1] }}</div>
                                    <div class="bgcolor" style="display:none">{{ $tag[2] }}</div>
                                </a>
                                <div class="post-overlay">
                                    <span class=""><a href="#"><i class="fa fa-hand-o-up"></i></a></span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </div>
</section>

<script>

	$(document).ready(function(){
        $.ajaxSetup({
   			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
        
        $('.post-thumb').each(function(){
            var fcolor = $(this).find('.framecolor').html();
            var bcolor = $(this).find('.bgcolor').html();
            //alert(fcolor);
            //alert(bcolor);
            $(this).find('.frameimg').css('background-color', fcolor);
            $(this).find('.bgimg').css('background-color', bcolor);
            
        });
        
        $('.tag-block').click(function(){
            var pid = $('#fd-session').html();
            //alert(pid);
            var tagtext = $(this).find('.criteria-text').html();
            //alert(tagtext);
            $.ajax({
    			url: 'vote',
    			type: 'POST',
    			data: {'pid': pid, 'tag':tagtext},
    			success: function (data) {
					alert("vote success");
    			}
			});
            
        });
    });
</script>
