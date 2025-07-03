@extends('front.includes.container')
@section('content')
	<section class="banner-section">
	<div class="banner-inner">
		<div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
			<div class="pagetitle-wraper">
				<div class="container">
					<div class="pagetitle">Duties, Customs & Taxes</div>
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
					  <li><a href="#">Duties, Customs & Taxes</a></li>
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
                <P>The customer is the importer of record and must comply with all laws and regulations of the destination country. Orders shipped outside of the India are subject to import taxes, customs duties and fees levied by the destination country. These charges are ungovernable as they differ from country to country according to local rules and regulations.</P>
                <p>The recipient of an international shipment may be subject to such import taxes, customs duties and fees, which are levied once a shipment reaches the recipient's country. These taxes will be chargeable over and above the product/order price paid and such additional charges for customs clearance must be fulfilled by the recipient; to be paid at the time of delivery to our courier partner.</p>
                <p>SILKASTIC has no control over these charges, nor can SILKASTIC predict what they may be.</p>
                <p>Customs policies vary widely; customer should contact their local customs office for more information. You can also check the same with our courier partners.</p>
                <p>For all cases of returns, customer will be the exporter from the original shipping destination and will be responsible for compliance with all export laws of that country or regions. In all such cases, customer will bear the shipping charges along with custom duties while returning the product and the same will be deducted from refund amount.</p>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
