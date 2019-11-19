@extends("la.layouts.app")

@section("contentheader_title", " ")


@section("htmlheader_title", "Visit Applications Details")

@section("headerElems")


@section("main-content")

<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
</script>
<link href="{{ asset('immoscore/assets/css/demo2/style.bundle.css') }}" rel="stylesheet" type="text/css" />

<div id="page-content" class="profile2">
<!--------Custom Html Starts here ----->


<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
          <!--begin::Portlet-->
          <div class="kt-portlet kt-profile">

            <div class="kt-profile__nav">
              <!--begin::Tabs-->
              <ul class="nav nav-tabs nav-tabs-line">
                <li class="nav-item"> <a class="nav-link active" href="javascript:void(0)" data-id ="kt_tabs_1_1" >Upcoming Visits </a> </li>
                <li class="nav-item"> <a class="nav-link"  href="javascript:void(0)" data-id ="kt_tabs_1_2" >Post Visits</a> </li>
                <li class="nav-item"> <a class="nav-link" href="javascript:void(0)" data-id ="kt_tabs_1_3" >Offers</a> </li>
              </ul>
              <!--end::Tabs-->

            </div>
          </div>
          <!--end::Portlet-->

          <!--begin::Tab Content-->
          <div class="tab-content">

          <!-----tab 1 Starts Here-->
            <div class="" id="kt_tabs_1_1">
              <!--begin::Row-->
              <div class="row">
                <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                  <!--begin::Portlet-->
                  <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                      <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Upcoming Visits</h3>
                      </div>

                    </div>
                    <div class="kt-portlet__body">
						<table border="1" cellpadding="0" cellspacing="0" class="table table-bordered">
                    		<thead>
                            <tr bgcolor="#dff0d8">
                             <th>Address</th>
                             <th>Rent</th>
                             <th>Area</th>
                             <th>Visit Date</th>
                             <th>Market Comparison</th>
                             <th>No of people interested</th>
                             <th>Status</th>
                           </tr>
                            </thead>

                            <tbody>
                            </tbody>

                        </table>
                    </div>
                  </div>
                  <!--end::Portlet--> </div>
              </div>
              <!--end::Row-->
            </div>


          <!-----tab 2 Starts Here-->
            <div class="" id="kt_tabs_1_2" style='display:none'>
              <!--begin::Row-->
              <div class="row">
                <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                  <!--begin::Portlet-->
                  <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                      <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Post Visits</h3>
                      </div>
                        <div style="padding:15px 0 0 0;">
                        <a href="" class="btn btn-info btn-sm">&nbsp;</a>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

						<table border="1" cellpadding="0" cellspacing="0" class="table table-bordered">
                    		<thead>
                            <tr bgcolor="#dff0d8">
                             <th>Address</th>
                             <th>Website</th>
                             <th>Rent</th>
                             <th>Area</th>
                             <th>Status</th>
                           </tr>
                            </thead>

                            <tbody>
                            </tbody>

                        </table>



                    </div>
                  </div>
                  <!--end::Portlet--> </div>
              </div>
              <!--end::Row-->
            </div>



          <!-----tab 3 Starts Here-->
            <div class="" id="kt_tabs_1_3"  style='display:none' >
              <!--begin::Row-->
              <div class="row">
                <div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
                  <!--begin::Portlet-->
                  <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                      <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Offers</h3>
                      </div>
                         <div style="padding:15px 0 0 0;">
                        <a href="{{ url(config('laraadmin.adminRoute') . '/rental_histories') }}" class="btn btn-info btn-sm">Manage History</a>
                        </div>
                    </div>

                    <div class="kt-portlet__body">

						<table border="1" cellpadding="0" cellspacing="0" class="table table-bordered">
                    		<thead>
                            <tr bgcolor="#dff0d8">
                             <th>Address</th>
                             <th>Website</th>
                             <th>Rent</th>
                             <th>Area</th>
                             <th>Status</th>
                           </tr>
                            </thead>

                            <tbody>
                            </tbody>

                        </table>


                    </div>
                  </div>
                  <!--end::Portlet--> </div>
              </div>
              <!--end::Row-->
            </div>
          <!-----tab 3 Starts Here-->






          </div>
          <!--end::Tab Content--> </div>






<!--------Custom Html Ends here ----->
</div>
@endsection
<script src="{{ asset('la-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $("body").delegate(".nav-link","click",function(){
                        $(".nav-link").removeClass("active");
                        $(this).addClass("active");
			let data_id = $(this).attr('data-id');
                        if(data_id == "kt_tabs_1_1") {
                            $("#kt_tabs_1_1").show();
                            $("#kt_tabs_1_2").hide();
                            $("#kt_tabs_1_3").hide();
                            $("#kt_tabs_1_4").hide();
                            $("#kt_tabs_1_5").hide();
                        } else if(data_id == "kt_tabs_1_2") {
                            $("#kt_tabs_1_1").hide();
                            $("#kt_tabs_1_2").show();
                            $("#kt_tabs_1_3").hide();
                            $("#kt_tabs_1_4").hide();
                            $("#kt_tabs_1_5").hide();
                        } else if(data_id == "kt_tabs_1_3") {
                            $("#kt_tabs_1_1").hide();
                            $("#kt_tabs_1_2").hide();
                            $("#kt_tabs_1_3").show();
                            $("#kt_tabs_1_4").hide();
                            $("#kt_tabs_1_5").hide();

                        }else if(data_id == "kt_tabs_1_4") {
                            $("#kt_tabs_1_1").hide();
                            $("#kt_tabs_1_2").hide();
                            $("#kt_tabs_1_3").hide();
                            $("#kt_tabs_1_4").show();
                            $("#kt_tabs_1_5").hide();
                        }
						else if(data_id == "kt_tabs_1_5") {
                            $("#kt_tabs_1_1").hide();
                            $("#kt_tabs_1_2").hide();
                            $("#kt_tabs_1_3").hide();
                            $("#kt_tabs_1_4").hide();
                            $("#kt_tabs_1_5").show();
                        }
		    });
                    <?php
                   // if($step=="rental_history") {
                    ?>
                            $(".nav-link").eq("2").trigger("click");
                    <?php //} ?>
    })

                    </script>