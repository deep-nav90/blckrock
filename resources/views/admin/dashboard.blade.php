@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
	<h1>Dashboard</h1>
@stop
@section('css')

<link rel="stylesheet" href="{{url('bar_chart/bar.chart.min.css')}}"/>

<style>
.timer-count {
    width: 150px;
    height: 150px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 5px solid #000000;
    border-radius: 100px;
}
.timer-count:before {
    content: "";
    border: 3px solid #fbaa9e;
    width: 150px;
    height: 140px;
    border-radius: 100px;
}
.counter_wrapper .radial-progress {
    max-width: 150px;
    -webkit-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    transform: rotate(-90deg);
    border-radius: 50%;
}
.counter_wrapper .radial-progress circle {
    fill: transparent;
    stroke: #fff;
}
.counter_wrapper .radial-progress circle.bar-static {
    stroke: #f5f5f5 !important;
}
.counter_wrapper .radial-progress circle.bar--animated {
    stroke-dasharray: 219.91148575129;
    stroke: #5fe7ba;
    stroke-dashoffset: 219.91148575129;
    stroke-width: 4px;
    stroke-linecap: round;
}
.counter_wrapper .radial-progress text {
    fill: #000;
    font-size: 16px;
    line-height: 1;
    font-weight: 700;
    text-anchor: middle;
}
.counter_wrapper {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    cursor: pointer;
}
.counter_one h3 {
    font-size: 16px;
    text-align: center;
    font-weight: 600;
    padding: 10px 0 0;
}
.colum-portal, .table_wrapper {
    background-color: #ffffff;
    padding: 30px 20px;
    border-radius: 10px;
}
.graph-chart {
    background-color: #ffffff;
    padding: 30px 20px;
    border-radius: 10px;
    margin: 30px 0;
}
.graph-chart img {
    width: 100%;
}
.table .thead-dark th {
    color: #ffffff;
    background-color: #000000;
    border-color: #000000;
}
.table_wrapper tbody td img {
    width: 100px;
}
.table_wrapper table.table tbody tr td {
    font-size: 14px;
    font-weight: 500;
}
.table_wrapper table.table tbody tr td:last-child {
    color: #00b30b;
}
.content {
    padding: 0 0 20px;
}
.table_wrapper {
    overflow: auto;
}
</style>
@endsection()
@section('content')
	<section class="content">
        <div class="row">
        	<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 col-12">
        		<div class="colum-portal">
	                <div class="row">
	                    
	                    
	                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-12">
	                        <div class="portal-inner">
				                <div class="left">
								    <div class="counter_one">
								    	<div class="counter_wrapper">
									        <svg class="radial-progress" data-countervalue="0" viewBox="0 0 80 80">
									            <circle class="bar-static" cx="40" cy="40" r="35"></circle>
									            <circle class="bar--animated" cx="40" cy="40" r="35" style="stroke-dashoffset: 217.8;"></circle>
									            <text class="countervalue start" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">0</text>
									        </svg>
									    </div>
									    <h3>Total Number Of Users</h3>
								    </div>
				                </div>
	                        </div>
	                    </div>
	                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-12">
	                        <div class="portal-inner">
				                <div class="left">
								    <div class="counter_one">
								    	<div class="counter_wrapper">
									        <svg class="radial-progress" data-countervalue="0" viewBox="0 0 80 80">
									            <circle class="bar-static" cx="40" cy="40" r="35"></circle>
									            <circle class="bar--animated" cx="40" cy="40" r="35" style="stroke-dashoffset: 217.8;"></circle>
									            <text class="countervalue start" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)"></text>
									        </svg>
									    </div>
									    <h3>Total Blocked Users Account</h3>
								    </div>
				                </div>
	                        </div>
	                    </div>

	                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-12">
	                        <div class="portal-inner">
				                <div class="left">
								    <div class="counter_one">
								    	<div class="counter_wrapper">
									        <svg class="radial-progress" data-countervalue="0" viewBox="0 0 80 80">
									            <circle class="bar-static" cx="40" cy="40" r="35"></circle>
									            <circle class="bar--animated" cx="40" cy="40" r="35" style="stroke-dashoffset: 217.8;"></circle>
									            <text class="countervalue start" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">0</text>
									        </svg>
									    </div>
									    <h3>Total Number Of Payments</h3>
								    </div>
				                </div>
	                        </div>
	                    </div>

	                   

	        		</div>
	        	</div>
	        	<div class="graph-chart">
	        		<div id="chtAnimatedBarChart" class="bcBar"></div>
	        	</div>

	        	<div class="graph-chart">
	        		<div id="chartContainer" style="height: 300px; width: 100%;"></div>
	        	</div>
	        	
	        	<div class="table_wrapper">
	        		<table class="table mb-0">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">Sr. No.</th>
					      <th scope="col">Order ID</th>
					      <th scope="col">Product Name</th>
					      <th scope="col">Product Amount</th>
					      <th scope="col">Paid Amount</th>
					      <th scope="col">Coupon Code</th>
						  <th scope="col">Coupon Amount</th>
					      <th scope="col">Status</th>
					    
					      <th scope="col">Date & Time</th>
					    </tr>
					  </thead>
					  <tbody>
					  
					    <tr>
					      <td>1</td>
					      <td>xxxxxxx1231</td>
					      <td>ABC</td>
					      <td>$100</td>
					      <td>$70</td>
					      <td>xxx434</td>
						  <td>30</td>
					      <td>Completed</td>
					      
					      <td>11-May-2023</td>
					    </tr>
					    
					  </tbody>
					</table>
	        	</div>
	        </div>
        	<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-12">
        	   <div class="colum-content">
		          

		          <div class="small-box user">
		              <a href="javascript:void(0);">
		                <div class="inner">
		                  <div class="left">
		                    <p>Total Registered Users</p>
		                    <h3>0</h3>
		                  </div>
		                  <div class="right">
		                    <img src="{{ asset('') }}images/user.png" alt="">
		                  </div>
		                </div>
		              </a>
		          </div>

		          

		          <div class="small-box admin">
		             <a href="javascript:void(0);">
		                <div class="inner">
		                  <div class="left">
		                    <p>Total Active Account</p>
		                    <h3>0</h3>
		                  </div>
		                  <div class="right">
		                    <img src="{{ asset('') }}images/support.png" alt="">
		                  </div>
		                </div>
		             </a>
		          </div>
		          <div class="small-box content">
		             <a href="javascript:void(0);">
		                <div class="inner">
		                  <div class="left">
		                    <p>Reports</p>
		                    <h3>0</h3>
		                  </div>
		                  <div class="right">
		                    <img src="{{ asset('') }}images/content.png" alt="" style="width: 36px; height: 40px; object-fit: contain;">
		                  </div>
		                </div>
		             </a>
		          </div>
		          

		          <div class="small-box feedback">
		             <a href="javascript:void(0);">
		              <div class="inner">
		                 <div class="left">
		                   <p>Total Orders</p>
		                   <h3>0</h3>
		                 </div>
		                 <div class="right">
		                   <img src="{{ asset('') }}images/roles.png" alt="" style="width: 40px; height: 40px; object-fit: contain;">
		                 </div>
		              </div>
		             </a>
		          </div>

		    

			   </div> 
		    </div>
        </div>
    </section>

<button type="button" class="btn btn-primary" id="btn_model" data-toggle="modal" data-target="#exampleModal" hidden>
  Launch demo modal
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  
</div>

@endsection

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@stop

@section('js')

 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
	
$(document).ready(function ($) {
  
  function radial_animate() { 
    $('svg.radial-progress').each(function( index, value ) { 

        $(this).find($('circle.bar--animated')).removeAttr( 'style' );    
        // Get element in Veiw port
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        
        if(elementBottom > viewportTop && elementTop < viewportBottom) {
            var percent = $(value).data('countervalue');
            var radius = $(this).find($('circle.bar--animated')).attr('r');
            var circumference = 2 * Math.PI * radius;
            var strokeDashOffset = circumference - ((percent * circumference) / 100);
            $(this).find($('circle.bar--animated')).animate({'stroke-dashoffset': strokeDashOffset}, 2800);
        }
    });
}
// To check If it is in Viewport 
var $window = $(window);
function check_if_in_view() {    
    $('.countervalue').each(function(){
        if ($(this).hasClass('start')){
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();

            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                      $(this).removeClass('start');
                      $('.countervalue').text();
                      var myNumbers = $(this).text();
                      if (myNumbers == Math.floor(myNumbers)) {
                          $(this).animate({
                              Counter: $(this).text()
                          }, {
                              duration: 2800,
                              easing: 'swing',
                              step: function(now) {
                                  $(this).text(Math.ceil(now)  + '%');                                
                              }
                          });
                      } else {
                          $(this).animate({
                              Counter: $(this).text()
                          }, {
                              duration: 2800,
                              easing: 'swing',
                              step: function(now) {                                
                                  $(this).text(now.toFixed(2)  + '₹'); 
                              }
                          });
                      }

                      radial_animate();
                  }
        }
    });
}

$window.on('scroll', check_if_in_view);
$window.on('load', check_if_in_view);
	});
</script>

<!-- <script src="{{url('CANVAS_CHART/canvas_jquery.js')}}"></script> -->
<script src="{{url('CANVAS_CHART/canvas_min.js')}}"></script>

<script>
window.onload = function () {

	var array_result_job_apply = [];
	
	var final_arr_for_job_apply = [];
	array_result_job_apply.forEach(function(currentValue, index, arr){
		let obj = {};
		obj.x = new Date(currentValue['create_date']);
		obj.y = currentValue['count_accourding_to_date'];
		final_arr_for_job_apply.push(obj);
	})

	var array_result_event_apply =[];
	var final_arr_for_event_apply = [];
	array_result_event_apply.forEach(function(currentValue, index, arr){
		let obj = {};
		obj.x = new Date(currentValue['create_date']);
		obj.y = currentValue['count_accourding_to_date'];
		final_arr_for_event_apply.push(obj);
	})

var options = {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Job Ads vs Events Applied"
	},
	axisX:{
		valueFormatString: "DD MMM"
	},
	axisY: {
		title: "Number Of Applied",
		suffix: "K",
		minimum: 0
	},
	toolTip:{
		shared:true
	},  
	legend:{
		cursor:"pointer",
		verticalAlign: "bottom",
		horizontalAlign: "left",
		dockInsidePlotArea: true,
		itemclick: toogleDataSeries
	},
	data: [{
		type: "line",
		showInLegend: true,
		name: "Job Ads Applied",
		markerType: "square",
		xValueFormatString: "DD MMM, YYYY",
		color: "#F08080",
		yValueFormatString: "#,##0K",
		dataPoints: final_arr_for_job_apply
	},
	{
		type: "line",
		showInLegend: true,
		name: "Events Applied",
		lineDashType: "dash",
		yValueFormatString: "#,##0K",
		dataPoints: final_arr_for_event_apply
	}]
};
$("#chartContainer").CanvasJSChart(options);

$(".canvasjs-chart-credit").hide()

function toogleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else{
		e.dataSeries.visible = true;
	}
	e.chart.render();
}

}
</script>

<script src='https://d3js.org/d3.v4.min.js'></script>
<script src="{{url('bar_chart/jquery.bar.chart.min.js')}}"></script>

<script>
   var chart;

   $(function() {
      initChart();
   });

   var array_current_year_booking =[];
	
	var final_arr_current_year_booking = [];
	var k = 1;
	array_current_year_booking.forEach(function(currentValue, index, arr){
		let obj = {};
		obj.id = k;
		obj.group_name = "Order";
		obj.month = currentValue['booked_date'];
		obj.total_no_of_bookings = currentValue['count_accourding_to_month'];
		final_arr_current_year_booking.push(obj);
		k++;
	})

	console.log(final_arr_current_year_booking)

   initChart = function() {
      var data = getData();
      chart = $('#chtAnimatedBarChart').animatedBarChart({
         data: data,
         params: {
            group_name: 'group_name',
            name: 'month',
            value: 'total_no_of_bookings'
         },
         bars: {
            hover_name_text: 'Month',
            hover_value_text: 'Total Number Of Bookings'
         },
         x_grid_lines: false,
         //y_grid_lines: false
         chart_height: 300,
         colors: null,
         show_legend:false,
         // margin: {
        
         //    top: 0,// top margin
        
         //    right: 35,// right margin
        
         //    bottom: 20,// bottom margin
        
         //    left: 70// left margin
        
         //  },
         rotate_x_axis_labels: {

          process:true,// process xaxis label rotation

          minimun_resolution: 720,// minimun_resolution for label rotating

          bottom_margin: 15,// bottom margin for label rotation

          rotating_angle: 90,// angle for rotation,

          x_position: 9,// label x position after rotation

          y_position: -3// label y position after rotation

        },
        rotate_x_axis_labels: {

          process:true,// process xaxis label rotation

          minimun_resolution: 720,// minimun_resolution for label rotating

          bottom_margin: 15,// bottom margin for label rotation

          rotating_angle: 90,// angle for rotation,

          x_position: 9,// label x position after rotation

          y_position: -3// label y position after rotation

        }




      });

      //$(".legend_div").css("display","none");
   }

   initChartAll = function() {
      $('.link-active').removeClass('link-active');
      $('#lnkAll').addClass('link-active');

      var data = getData();
      chart.updateChart({ data: data });

   }

   initChartFiltered = function() {
      $('.link-active').removeClass('link-active');
      $('#lnkFiltered').addClass('link-active');

      var data = getFilteredData();
      chart.updateChart({ data: data });
   }

   getData = function() {
      return final_arr_current_year_booking;
   }



   
</script>


@endsection()