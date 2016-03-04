

<style>
	.progress-label {
		padding-left: 10px;
		font-size: 150%;
	}
</style>

<section id="streaming">

    <div class="container">
    	<div id="progressbar-container" class="wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2 class="page-header" id="stream-title">{{ $title }}</h2>
            <h3>{{ $pid }}</h3>

            @foreach ($tags as $tag)
    		<div class="progress">
            	<strong class="progress-label">{{ $tag[0] }}</strong>
                <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="stat">{{ $tag[1] }}</div>% Complete (success)
                </div>
            </div>
			@endforeach   
        </div><!--/#progressbar-container-->
        </div>
	</section>

<script>

	$(document).ready(function(){

        $('.progress-bar').each(function(){
            var stat = $(this).find('.stat').html();
            //alert(stat);
            $(this).attr("aria-valuenow",stat);
            $(this).attr("style","width: "+stat+"%");
            $(this).attr("class", "progress-bar-info");
        });
    });	
</script>

