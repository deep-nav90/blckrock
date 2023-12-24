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



.charts_orb {
  display: flex;
  align-items: flex-start;
  /* justify-content: center; */
  flex-wrap: wrap;
  font-family: arial;
  color: #fdbd3e;
}
.charts_orb .orb {
    padding: 20px 15px 20px 20px;
}
.charts_orb .orb .orb_graphic {
  position: relative;
}
.charts_orb .orb .orb_graphic .orb_value {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2.5em;
  font-weight: bold;
}
.charts_orb .orb .orb_label {
    /* text-transform: uppercase; */
    text-align: center;
    margin-top: 1em;
    color: #000000;
    width: 110px;
}
.charts_orb svg {
  width: 110px;
  height: 110px;
}
.charts_orb svg circle {
  transform: rotate(-90deg);
  transform-origin: 50% 50%;
  stroke-dasharray: 314.16, 314.16;
  stroke-width: 2;
  fill: transparent;
  r: 50;
  cx: 55;
  cy: 55;
}
.charts_orb svg circle.fill {
  stroke: #000000;
}
.charts_orb svg circle.progress {
  stroke: #fdbd3e;
  transition: stroke-dashoffset 0.35s;
  stroke-dashoffset: 214.16;
  -webkit-animation: NAME-YOUR-ANIMATION 1.5s forwards;
  -webkit-animation-timing-function: linear;
}
@-webkit-keyframes NAME-YOUR-ANIMATION {
  0% {
    stroke-dashoffset: 314.16;
  }
  100% {
    stroke-dashoffset: 0;
  }
}



</style>
@endsection()
@section('content')
	<section class="content">
        <div class="row">
        	<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 col-12">
        		<div class="colum-portal">
	                <div class="row">

					<div class="charts_orb">
						<article class="orb">
							<div class="orb_graphic">
								<svg>
									<circle class="fill"></circle>
									<circle class="progress"></circle>
								</svg>
								<div class="orb_value count">{{$total_users}}</div>
							</div>
							<div class="orb_label">
								Total Number Of Users
							</div>
						</article>
						
						<article class="orb">
							<div class="orb_graphic">
								<svg>
									<circle class="fill"></circle>
									<circle class="progress"></circle>
								</svg>
								<div class="orb_value count">{{$total_blocked_users}}</div>
							</div>
							<div class="orb_label">
								Total Blocked Users
							</div>
						</article>
						
						<article class="orb">
							<div class="orb_graphic">
								<svg>
									<circle class="fill"></circle>
									<circle class="progress"></circle>
								</svg>
								<div class="orb_value count">{{$total_number_payments}}</div>
							</div>
							<div class="orb_label">
								Total Number Of Payments
							</div>
						</article>
						
						<article class="orb">
							<div class="orb_graphic">
								<svg>
									<circle class="fill"></circle>
									<circle class="progress"></circle>
								</svg>
								<div class="orb_value count">{{$total_coupons}}</div>
							</div>
							<div class="orb_label">
								Total Number Of Coupons
							</div>
						</article>
						
						<article class="orb">
							<div class="orb_graphic">
								<svg>
									<circle class="fill"></circle>
									<circle class="progress"></circle>
								</svg>
								<div class="orb_value count">{{$totalOrders}}</div>
							</div>
							<div class="orb_label">
								Total Orders
							</div>
						</article>

						<article class="orb">
							<div class="orb_graphic">
								<svg>
									<circle class="fill"></circle>
									<circle class="progress"></circle>
								</svg>
								<div class="orb_value count">{{$total_completed_orders}}</div>
							</div>
							<div class="orb_label">
								Total Completed Orders
							</div>
						</article>
					</div>

	                    
	                    
	                    

	                   

	        		</div>
	        	</div>
	        	<div class="graph-chart">
	        		<div id="chtAnimatedBarChart" class="bcBar"></div>
	        	</div>

	        	<div class="graph-chart">
	        		<div id="chartContainer" style="height: 300px; width: 100%;"></div>
	        	</div>
	        	
	        	
	        </div>
			
        	<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-12">
        	   <div class="colum-content">
		          

		          <div class="small-box user">
		              <a href="javascript:void(0);">
		                <div class="inner">
		                  <div class="left">
		                    <p>Total Revenue</p>
		                    <h3>{{$totalRevenue}}</h3>
		                  </div>
		                  <div class="right">
						  <i class="fas fa-2x fa-rupee-sign"></i>
		                  </div>
		                </div>
		              </a>
		          </div>

		          

		          <div class="small-box admin">
		             <a href="javascript:void(0);">
		                <div class="inner">
		                  <div class="left">
		                    <p>Total Products</p>
		                    <h3>{{$totalProducts}}</h3>
		                  </div>
		                  <div class="right">
						  <i class="fa fa-asterisk fa-2x" aria-hidden="true"></i>


		                  </div>
		                </div>
		             </a>
		          </div>
		          
		          

		          <div class="small-box feedback">
		             <a href="javascript:void(0);">
		              <div class="inner">
		                 <div class="left">
		                   <p>Total Orders</p>
		                   <h3>{{$totalOrders}}</h3>
		                 </div>
		                 <div class="right">
						 <i class="fa fa-2x fa-briefcase" aria-hidden="true"></i>

		                 </div>
		              </div>
		             </a>
		          </div>

		    

			   </div> 
		    </div>
        </div>

		<div class="table_wrapper">
	        		<table class="table mb-0">
					  <thead class="thead-dark">
					    <tr>
						<th scope="col">Sr. No.</th>
					      <th scope="col">Order ID</th>
					      <th scope="col">User Name</th>
					      <th scope="col">Total Amount</th>
					      <th scope="col">Discount Amount</th>
					      <th scope="col">Pay Amount</th>
					      <th scope="col">Payment Type</th>
					      <th scope="col">Payment Received</th>
					      <th scope="col">Status</th>
					    </tr>
					  </thead>
					  <tbody>
					  
					  @foreach($last_10_orders as $order)
					    <tr>
					      <td>{{$order->unique_order_id}}</td>
					      <td>{{$order->user_name}}</td>
					      <td>{{$order->total_amount}}</td>
					      <td>{{$order->discount_amount_for_coupon}}</td>
					      <td>{{$order->pay_amount}}</td>
					      <td>{{$order->payment_type}}</td>
						  <td>{{$order->payment_received}}</td>
					      <td>{{$order->order_status}}</td>
					      
					      <td>11-May-2023</td>
					    </tr>
					    @endforeach()
					  </tbody>
					</table>
					<a class="btn btn-primary orderRedirect" href="{{route('order_list')}}">View All</a>
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

	var array_result_for_order = <?php echo $current_year_orders; ?>;
	
	var final_order_array = [];
	array_result_for_order.forEach(function(currentValue, index, arr){
		let obj = {};
		obj.x = new Date(currentValue['create_date']);
		obj.y = currentValue['count_accourding_to_date'];
		final_order_array.push(obj);
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
		text: "Orders of user"
	},
	axisX:{
		valueFormatString: "DD MMM"
	},
	axisY: {
		title: "Number Of Orders",
		suffix: "",
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
		name: "Create Order",
		markerType: "square",
		xValueFormatString: "DD MMM, YYYY",
		color: "#F08080",
		yValueFormatString: "#,##0",
		dataPoints: final_order_array
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

   var array_current_year_revenue = <?php echo $current_year_revenue; ?>;
	
	var final_arr_current_year_revenue = [];
	var k = 1;
	array_current_year_revenue.forEach(function(currentValue, index, arr){
		let obj = {};
		obj.id = k;
		obj.group_name = "Payment";
		obj.month = currentValue['payment_date'];
		obj.total_no_of_bookings = currentValue['amount_accourding_to_month'];
		final_arr_current_year_revenue.push(obj);
		k++;
	})

	console.log(final_arr_current_year_revenue)

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
            hover_value_text: 'Total Revenue'
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
      return final_arr_current_year_revenue;
   }



   
</script>


<script>
	$(document).ready(function(){
		$('.count').each(function () {
			$(this).prop('Counter',0).animate({
				Counter: $(this).text()
			}, {
				duration: 1500,
				easing: 'linear',
				step: function (now) {
					$(this).text(Math.ceil(now));
				}
			});
		});
	})
</script>


@endsection()