@include('/dashbord/partials/navFront')
	
<!-- Page Banner -->
<div class="page-banner contact-banner container-fluid no-padding">
			<!-- Container -->
			<div class="container">
				<h3>Médicaments</h3>
				<p>Faire une recherche détaillé sur un medicament</p>
				
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>				
					<li class="active">Contact</li>
				</ol>
            </div>
            <!-- Container /- -->
			<!-- Shape -->
			<div class="banner-shape container-fluid no-padding">
				<div class="col-md-6 col-sm-6 col-xs-6 shape-left no-padding">
					<div class="left-shape-blue">				
						<svg width="100%" height="100%">
							<clipPath id="clipPolygon2" clipPathUnits="objectBoundingBox">
								<polygon points="0 0, 0 100, 120 100, 0 0"></polygon>
							</clipPath>
						</svg>
					</div>	
					<div class="left-shape">				
						<svg width="100%" height="100%">
							<clipPath id="clipPolygon1" clipPathUnits="objectBoundingBox">
								<polygon points="0 0, 0 100, 100 100, 0 0"></polygon>
							</clipPath>
						</svg>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6 shape-right no-padding">
					<div class="right-shape-blue">				
						<svg width="100%" height="100%">
							<clipPath id="clipPolygon3" clipPathUnits="objectBoundingBox">
								<polygon points="1 0.2, 0 1, 0 0.835, 1 0"></polygon>
							</clipPath>
						</svg>
					</div>	
					<div class="right-shape">				
						<svg width="100%" height="100%">
							<clipPath id="clipPolygon4" clipPathUnits="objectBoundingBox">
								<polygon points="1 0, 0 1, 100 100, 100 0"></polygon>
							</clipPath>
						</svg>
					</div>
				</div>
			</div><!-- Shape -->
		</div><!-- Page Banner /- -->


		      
<div class="container">

<!-- Page Heading -->


<!-- DataTales Example -->

  
<iframe class=" ifram-costum " src="{{URL('dashbord/searchFront')}}"></iframe> 




</div>
<!-- /.container-fluid -->




<script type="text/javascript" src="{{asset('assets/rechercheClass.js')}}" ></script>    
<script type="text/javascript" src="{{asset('assets/rechercheNom.js')}}" ></script> 


		
@include('/dashbord/partials/footerFront')