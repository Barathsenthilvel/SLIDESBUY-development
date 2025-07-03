@extends('front.includes.container')
@section('content')
	<section class="banner-section">
	<div class="banner-inner">
		<div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
			<div class="pagetitle-wraper">
				<div class="container">
					<div class="pagetitle">Disclaimer</div>
				</div>
			</div>
		</div>
	</div>
	<div class="banner-breadcrumb">
  		<div class="container">
  			<div class="row">
  				<div class="col-md-12">
  					<ul class="breadcrumb">
					  <li><a href="{{route('front.index')}}">Home</a></li>
					  <li><a href="#">Disclaimer</a></li>
				    </ul>
  				</div>
  			</div>
  		</div>
  	</div>
	</section>
    <section class="common-section">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12 common-content privacy-content">
            <div class="form-group">
                <p>This website (hereafter this "Website") is made available by SILKASTIC, a company registered in India under the laws of India (hereafter " SILKASTIC ").</p>
                <p>While SILKASTIC endeavors to ensure that the contents of the Website are accurate and reliable, SILKASTIC makes no representations about the suitability of the information and services contained or obtained through this Website for any purpose, or the results that may be obtained from using this Website. All such information is provided "as is" without warranty of any kind. SILKASTIC does not make any representation or warranty with respect to the veracity or the completeness of the information available on the Website and assumes no liability or responsibility for any omissions or errors in the information available on the Website.</p>
                <p>In no event shall SILKASTIC and / or its affiliates be liable for any direct, indirect, punitive, incidental, special or consequential damages arising out of or in any way connected with the use of this Website, or for any information or services obtained through this Website, or otherwise arising out of the use of this Website, whether based on contract, tort, strict liability or otherwise, even if SILKASTIC or any of its affiliates has been advised of the possibility of damages.</p>
                <p>In no event shall SILKASTIC and / or its affiliates be liable for any direct, indirect, punitive, incidental, special or consequential damages arising out of or in any way connected with the use of this Website, or for any information or services obtained through this Website, or otherwise arising out of the use of this Website, whether based on contract, tort, strict liability or otherwise, even if SILKASTIC or any of its affiliates has been advised of the possibility of damages.</p>
                <p>SILKASTIC may, at any given point in time, at its sole discretion, without any notice or warning, change the formulation of any product listed on this Website, which may result in a change in the list of information as mentioned on this Website.</p>
                <p>This Website may contain forward-looking statements about SILKASTIC and / or SILKASTIC 's financial and operating performance, business plans and prospects, in-line products and product development that involve substantial risks and uncertainties. Actual results could differ materially from the expectations and projections set forth in those statements. SILKASTIC undertakes no obligation to publicly update or revise any forward-looking statements.</p>
                <p>Product image are uploaded in our website to match their Original color and grandeur. Also it may take some time to download. Please bear with us and allow the pictures to get completely downloaded before you can view or order it. There may be variations between the actual product and that displayed on the screen due to various reasons like,</p>
                <p>Variations in monitor resolution levels & color scheme<br>
Having a poor VGA card (Display Card)<br>
Having the minimum color setting in your Monitor Display Properties<br>
Setting the Brightness and Contrast levels of your monitor to low or high values
</p>
                <p>If you have any further clarifications, mail us at <a href="mailto:support@thesilkastic.com" target="_newtab">support@thesilkastic.com</a>. We are always like to hear from you</p>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
