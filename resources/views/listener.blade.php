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

<section id="portfolio">
    <div class="container">
        <div class="row">
            <br>
            <br>
                
            <div class="portfolio-items">
            	@foreach ($tags as $tag)
    				<div class="col-xs-6 col-sm-4 col-md-3 portfolio-item branded logos">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-single">
                            <div class="portfolio-thumb wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                                <div style="background-color:#cb904d; width:261px; height:269px; padding:50px;" >
                                	<div style="background-color:#00000"></div>
                                </div>
                                <h2 class="criteria-text">{{ $tag }}</h2>
                            </div>
                            <div class="portfolio-view">
                                <ul class="nav nav-pills">
                                    
                                    <li><a href="#"><i class="fa fa-volume-down"></i></a></li>
                                    <li><a href="#"><i class="fa fa-smile-o"></i></a></li>
                                    <li><a href="images/thankyou.jpg" data-lightbox="example-set"><i class="fa fa-volume-up"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="portfolio-info ">
                            <h2></h2>
                        </div>
                    </div>
                </div>
				@endforeach
            
                
            </div>
            
        </div>
    </div>
</section>
<!--/#portfolio-->