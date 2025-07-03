@extends('front.includes.container')
@section('content')
	<section class="banner-section">
	<div class="banner-inner">
		<div class="homeslider">
            <img src="{{URL::asset('assets/front/images/banner/productlist.jpg')}}" class="img-responsive" alt="slider1">
			<div class="pagetitle-wraper">
				<div class="container">
					<div class="pagetitle">Addresses</div>
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
					  <li><a href="#">Addresses</a></li>
				    </ul>
  				</div>
  			</div>
  		</div>
  	</div>
	</section>
<section class="myorder-section commonaccount-section">
    <div class="container">

        <div class="row">
            <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 profile-rightwraper">
			  <div class="profileright-inner">
					<div class="profileinfo-wraper">
						<div class="profileimg-wraper">
								 <img src="images/balaji-ba.jpg" class="img-responsive center-block" alt="csk">
						</div>
						<div class="profilename-container">
							<div class="profilename">
									 Balaji Sha
							</div>
							<div class="location">
									 Chennai
							</div>
						</div>
						<div class="text-center">
							<a class="loginbtn" href="">logout</a>
						</div>
					</div>
			  </div>
          </div>-->

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  manageaddress">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  profile-leftinner">
                    <div class="profile-navbar mobhide">
                        <ul class="list-inline">
                            <li><a href="{{route('order')}}">My Orders</a></li>
                            <li><a class="active" href="#">Addresses</a></li>
                            <li><a href="{{route('front.userprofile')}}">Account Settings</a></li>
                            <li><a href="{{route('profile')}}">Change Pin</a></li>
                        </ul>
                    </div>


                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  changepwd-wraper nopad">
                        <div class="row mobmar0">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profileform-wraper">
                                <div class="container-xl">
                                    <div class="table-responsive">
                                        <div class="table-wrapper" id="userAddress">
                                            @include('front.includes.wasttemplate')
                                            <!--<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>-->
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Modal HTML -->
                                <div id="addEmployeeModal" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Modal HTML -->
                                <div id="editEmployeeModal" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Modal HTML -->
                                <div id="deleteEmployeeModal" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete Address</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete these Records?</p>
                                                    <p class="text-warning"><small>This action cannot be undone.</small>
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal"
                                                        value="Cancel">
                                                    <input type="submit" class="btn btn-danger deletebtnn"
                                                        value="Delete">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script>
    $('body .Delete-link').on('click',function(e){
      e.preventDefault();
      $.get($(this).attr('href'),function(data){
          $('#userAddress').load("{{route('user.render.address')}}");
      });
  });
  $('body').on('click','.editAddress',function(e){
        e.preventDefault();
        $('#editEmployeeModal .modal-content').load($(this).attr('href'));
        $('#editEmployeeModal').modal('toggle');
    });
  $('body').submit('#form',function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: '{{route('user.update.address')}}',
            data: new FormData(e.target),
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {
                    $('#userAddress').load("{{route('india_first')}}", function () {
                        toastr["success"]('Address Added Successfully');
                        $('#editEmployeeModal').modal('toggle');
                });
            },
            error: function (erroe) {

            }
        });
    });
</script>
@endpush
