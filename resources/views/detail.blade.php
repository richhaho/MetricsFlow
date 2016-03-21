@extends('layouts.template')

@section('content-header')
 <!-- Content Header (Page header) -->
<div class="container-fluid">
	<div class="row">
		<section class="content-header">
		      <div class="col-md-12 col-sm-12 col-xs-12 logo">
		        <a href="/leads"><h3> <= Details<br></h3></a>
		        <img  src="{{$logo->logo}}" style="width: 200px;height: 50px">
		      </div>
		      <div class="col-md-12 col-sm-12 col-xs-12">
		      <p><br></p>
		      </div>
		</section> 
    </div>
@endsection

@section('content')
<div class="row">
	<div class="col-md-10 col-lg-10 col-sm-12 col-xs-offset-1 center">
		<div class="box">
			<div class="box-body">
				<section>
					@foreach ($details as $detail)		
					<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 center">
						<div class="col-md-4">
							<div class="col-md-12">
								<div class="col-md-4">
									<h4>User ID:</h4>
								</div>
								<div class="col-md-8" style="margin-left: -30px;">
									<h4><strong>{{$detail->e_id}}</strong></h4>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-3">
									<h4>Status:</h4>
								</div>
								<div class="col-md-9" style="margin-left: -10px;">
									@if($count_converted>0)						
									<h4><strong>Convert</strong></h4>
									@else
									<h4><strong>{{$detail->Stage}}</strong></h4>
									@endif
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-3">
									<h4>Channels:</h4>
								</div>
								<div class="col-md-9" style="margin-left: -30px;">
									<h4><strong>{{$detail->pageURL}}</strong></h4>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-3">
									<h4>Location:</h4>
								</div>
								<div class="col-md-9">
									<h4><strong>{{$detail->coordinate}}</strong></h4>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-3">
									<h4>Email:</h4>
								</div>
								<div class="col-md-9" style="margin-left: -20px;">
									<h4><strong>{{$detail->email}}</strong></h4>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-4">
									<h4>Last Seen:</h4>
								</div>
								<div class="col-md-8" style="margin-left: -30px;">
									<h4><strong>{{$detail->last_seen}}</strong></h4>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-5">
									<h4>Action Required:</h4>
								</div>
								<div class="col-md-7" style="margin-left: -30px;">
									<h4><strong></strong></h4>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-3">
									<h4>Summary:</h4>
								</div>
								<div class="col-md-9" style="margin-left: -30px;">
									<h4><strong></strong></h4>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-5">
									<h4>Device Brand: </h4>
								</div>
								<div class="col-md-7">
									<h4><strong>{{$detail->device_brand}}</strong></h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 center" style="margin: 0 auto;">
								<img src="/img/detail/id_group.png" class="img-responsive" width="80%">
						</div>
						<div class="col-md-4">
							<div class="col-md-12">
								<div class="col-md-5">
									<h4>Device Type: </h4>
								</div>
								<div class="col-md-7">
									<h4><strong>{{$detail->device_type}}</strong></h4>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-5">
									<h4>Device Model: </h4>
								</div>
								<div class="col-md-7">
									<h4><strong>{{$detail->device_model}}</strong></h4>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-5">
									<h4>Device OS: </h4>
								</div>
								<div class="col-md-7">
									<h4><strong>{{$detail->OS_name}}</strong></h4>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-5">
									<h4>Touch Screen:</h4>
								</div>
								<div class="col-md-7">
									<h4><strong>{{$detail->hastouchscreen}}</strong></h4>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-5">
									<h4>Browser: </h4>
								</div>
								<div class="col-md-7">
									<h4><strong>{{$detail->browser}}</strong></h4>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-5">
									<h4>Has AdBlock:</h4>
								</div>
								<div class="col-md-7"> 
									<h4><strong>{{$detail->hasAdblock}}</strong></h4>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-5">
									<h4>IP Address:</h4>
								</div>
								<div class="col-md-7">
									<h4><strong>{{$detail->ip_x}}</strong></h4>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-5">
									<h4>Language: </h4>
								</div>
								<div class="col-md-7">
									<h4><strong>{{$detail->language}}</strong></h4>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-5">
									<h4>Country: </h4>
								</div>
								<div class="col-md-7">
									<h4><strong>{{$detail->country}}</strong></h4>
								</div>
							</div>
						</div>
					</div>
					@endforeach 
				</section>
			</div>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 20px;"> 
	<div class="col-md-10 col-lg-10 col-sm-12 col-xs-offset-1 center">
		<div class="box">
			<div class="box-body">
				<section>
					<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
						<div class="col-md-8">
							<h2> Behavior</h2>
						</div>
					</div>
					<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 center" style="font-size: 20px">
								<div class="col-md-3">
									<div align="center">
										@if($count_aware>0)
										<img src="/img/detail/behaivor_btn1.png" class="img-responsive">
										@else
										<img src="/img/detail/behaivor_btn0.png" class="img-responsive">
										@endif
								 	</div>
								 	<center><p>Aware</p></center>
								</div> 
								<div class="col-md-3">
									<div align="center">
										@if($count_deciding>0)
										<img src="/img/detail/behaivor_btn2.png" class="img-responsive">
										@else
										<img src="/img/detail/behaivor_btn0.png" class="img-responsive">
										@endif
								 	</div>
								 	<center><p>Engaged</p></center>
								</div>	
								<div class="col-md-3">
									<div align="center">
										@if($count_considering>0)
										<img src="/img/detail/behaivor_btn3.png" class="img-responsive">
										@else
										<img src="/img/detail/behaivor_btn0.png" class="img-responsive">
										@endif
								 	</div>
								 	<center><p>Considering</p></center>
								</div> 	
								<div class="col-md-3">
									<div align="center">
										@if($count_converted>0)
										<img src="/img/detail/behaivor_btn4.png" class="img-responsive">
										@else
										<img src="/img/detail/behaivor_btn0.png" class="img-responsive">
										@endif
								 	</div>
								 	<center><p>Convert</p></center>
								</div> 	
							</div>
						</div>
						<div class="col-md-1"></div>
					</div>
					<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="padding-bottom: 20px;">
						<!-- <div class="col-md-1"></div> -->
						<div class="col-md-3">
							<div class="behaivor_circle">
								 <div><p>Average <br>Total Spent:<br><span><strong>{{round($total_time/$count_id)}} Seconds</strong> </span></p></div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="behaivor_circle">
								 <div><p>Total<br>Time<br> Spent:<span><strong>{{$total_time}} <br>Seconds</strong> </span></p></div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="behaivor_circle">
								 <div><p>Total <br>Clicks:<br><span><strong>{{$total_click/$count_id}}</strong> </span></p></div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="behaivor_circle">
								 <div><p>Total <br>Sessions:<br><span><strong>{{$count_id}}</strong> </span></p></div>
							</div>
						</div>			
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-10 col-lg-10 col-sm-12 col-xs-offset-1 center">
		<div class="box">
			<div class="box-body">
				<section>	
					<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
						<div class="col-md-8">
							<h2> Lead Progression</h2>
						</div>
					</div>
					<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" >
						<div class="col-md-12" id="lead_progression">
							<div class="row">
								<div class="col-md-4 scrolls">
									<div class="row">
										
										@foreach ($progression as $prog)
										@if ($prog ->Stage=='Awareness')
										<div class="col-md-6">
											<p><a href="/content?name={{$prog ->PageName}}"><b>{{$prog->PageName}}</b></a></p>
											<iframe sandbox="allow-pointer-lock" scrolling="no" src='{{$prog->PageURL}}' style="width: 100%;height: 200px ;border 1px solid gray">
			                
			                                </iframe>
											<div id="year">{{$prog->Date}}</div>
										</div>
								 		@endif
										@endforeach
									</div>
								</div>
								<div class="col-md-4 scrolls">
									<div class="row">
										
										@foreach ($progression as $prog)
										@if ($prog ->Stage=='Deciding' || $prog ->Stage=='Considering')
										<div class="col-md-6">
											<p><a href="/content?name={{$prog ->PageName}}"><b>{{$prog->PageName}}</b></a></p>
											<iframe sandbox="allow-pointer-lock" scrolling="no" src='{{$prog->PageURL}}' style="width: 100%;height: 200px ;border 1px solid gray">
			                
			                                </iframe>
											<div id="year">{{$prog->Date}}</div>
										</div>
								 		@endif
										@endforeach
									</div>
								</div>
								<div class="col-md-4 scrolls">
									<div class="row">
										
										@foreach ($progression as $prog)
										@if ($prog ->Stage=='Converted')
										<div class="col-md-6">
											<p><a href="/content?name={{$prog ->PageName}}"><b>{{$prog->PageName}}</b></a></p>
											<iframe sandbox="allow-pointer-lock" scrolling="no" src='{{$prog->PageURL}}' style="width: 100%;height: 200px ;border 1px solid gray">
			                
			                                </iframe>
											<div id="year">{{$prog->Date}}</div>
										</div>
								 		@endif
										@endforeach
									</div>
								</div>
								
				
							</div>
							<div class="row">
								<div class="col-md-4">
									<center><h3>Aware</h3></center>
								</div>
								<div class="col-md-4">
									<center><h3>Engaged</h3></center>
								</div>
								<div class="col-md-4">
									<center><h3>Convert</h3></center>
								</div>
							</div>
						</div>			
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<div class="row" style="color: white">..</div>
<div class="row" style="color: white">..</div>
<div class="row" style="color: white">..</div>
<div class="row" style="color: white">..</div>
<div class="row">
	<div class="col-md-10 col-lg-10 col-sm-12 col-xs-offset-1 center">
		<div class="box">
			<div class="box-body">
				<section>
					<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
						<div class="col-md-8">
							<h2>Session Profile</h2>
						</div>
					</div>
					<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
						<div class="col-md-12" style="background-color:#f5f7ff; ">
						<div class="col-md-9">
							<img src="/img/detail/session.png" class="img-responsive">
							<div class="col-md-9" id="labels" style="margin-top: 30px;">
			            		<div class="col-md-12">
			              			<div class="float">
			                			<i class="fa fa-stop fa-2x blue" aria-hidden="true"></i> 
			              			</div>
			             	 		<div class="labeltext">
			                			<h5>Known Session</h5>
			              			</div>
			            		</div>
			            		<div class="col-md-12">
			              			<div class="float">
			                			<i class="fa fa-stop fa-2x red" aria-hidden="true"></i> 
			              			</div>	
			              			<div class="labeltext">
			                			<h5>Linked Anoymouse Session</h5>
			              			</div>
			               		</div>
				            </div>
						</div>
						<div class="col-md-3" id="session_data">
							<br><p style="font-size: 70px"><b>{{round(($count_all-$count_unknown)/$count_all*100)}}%</b></p>
							<p style="font-size: 20px">accuracy prediction</p>
							<img src="/img/detail/session_user.png" class="img-responsive">
							<p style="font-size: 34px"><b>{{$count_all}} Total Sessions</b></p>
							<p>{{$count_all-$count_unknown}} Known Sessions</p>
							<p>{{$count_unknown}} Anoymous Sessions</p>
						</div>
					</div>
				</div>
				</section>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-10 col-lg-10 col-sm-12 col-xs-offset-1 center">
		<div class="box">
			<div class="box-body">
				<section>
					<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
						<div class="col-md-8">
							<h2> Common Paths</h2>
						</div>
					</div>
					<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" id="linechart">
						<div class="col-md-10" id="leadpath"></div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<!-- common path data -->
</div>
<script type="text/javascript">
var trdata='[{"name": "{{$detail_id}}", "parent": "null", "children": [';	
</script>
@foreach ($progression as $prog)
<script type="text/javascript">
	if (trdata=='[{"name": "{{$detail_id}}", "parent": "null", "children": [') 
	{
		trdata=trdata+'{"name":"{{$prog->PageName}}","parent":"{{$detail_id}}","children":[{"name":"{{$prog->Time}}","parent":"{{$prog->PageName}}"},{"name":"{{$prog->Stage}}","parent":"{{$prog->PageName}}"},{"name":"{{$prog->PrevSite}}","parent":"{{$prog->PageName}}"} ]}';
	}
	else
	{
		trdata=trdata+',{"name":"{{$prog->PageName}}","parent":"{{$detail_id}}","children":[{"name":"{{$prog->Time}}","parent":"{{$prog->PageName}}"},{"name":"{{$prog->Stage}}","parent":"{{$prog->PageName}}"},{"name":"{{$prog->PrevSite}}","parent":"{{$prog->PageName}}"} ]}';
	}
</script>
@endforeach
<script type="text/javascript">
	trdata=trdata+']}]';	
</script>

<section>




<script src="/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="/bower_components/AdminLTE/plugins/chartjs/d3.min.js"></script>
<script type="text/javascript">
	var bubble_data='{ "name": "flare", "children": [  {   "name": "animate",   "children": [{ "name": "cluster", "children": [';
	var start_page=0;
</script>
@foreach($userpages_bubble as $userpage) 
 
<script type="text/javascript">
	var k=parseInt('{{$userpage->Value}}');
	if (start_page==0) bubble_data=bubble_data+'{"name": "{{$userpage->PageName}}", "size": '+k+'}'; else bubble_data=bubble_data+',{ "name": "{{$userpage->PageName}}",   "children": [  {"name": "{{$userpage->PageName}}", "size": '+k+'}]}';
	start_page=1;

</script>
@endforeach
<script>
bubble_data=bubble_data+'] }]}]}';

$( window ).load(function() {  
	//bubble_show();
	showpath();
});
$( window ).resize(function() {
   //$("#bubbleid").empty();
   //bubble_show();
   $("#leadpath").empty();
   showpath();
});

function bubble_show(){
	var wth=$(document).width();
var width = Math.round(wth*0.3);
var height =width; var hgh=height+100;


var format = d3.format(",d"), color = d3.scale.category20c();
var bubble = d3.layout.pack().sort(null).size([width, height]).padding(1.5);
var svg = d3.select("#bubbleid").append("svg").attr("width", width).attr("height", height).attr("class", "bubble");
$('.bubble').css('height',hgh+'px');
//var root = JSON.parse('{ "name": "flare", "children": [  {   "name": "analytics",   "children": [    {     "name": "cluster", "children": [] },    {     "name": "graph",     "children": [ {"name": "Saxophon", "size": 3534},      {"name": "Klarinette", "size": 5731},      {"name": "Fluegelhorn", "size": 7840},      {"name": "Horn", "size": 5914}     ]    }   ]  },  {   "name": "animate",   "children": [    {"name": "Gesang", "size": 17010},    {"name": "Operngesang", "size": 5842},    {     "name": "interpolate",     "children": [      {"name": "Geige", "size": 1983},      {"name": "Chello", "size": 2047},      {"name": "Kontrabass", "size": 2375},      {"name": "Violine", "size": 8746},      {"name": "Bratsche", "size": 2202},      {"name": "Violoncello", "size": 3382},      {"name": "Viola", "size": 1629}     ]    }   ]  },  {"name": "Klavier", "size": 10842},  {"name": "Gitarre", "size": 7842}   ]}');
var root = JSON.parse(bubble_data);



var node = svg.selectAll(".node").data(bubble.nodes(classes(root)).filter(function (d) {
    return !d.children;
}))
        .enter().append("g").attr("class", "node").attr("transform", function (d) {
    return "translate(" + d.x + "," + d.y + ")";
});
node.append("title").text(function (d) {
    return d.className + ": " + format(d.value);
});
node.append("circle").attr("r", function (d) {
    return d.r;
}).style("fill", function (d) {
    return color(d.packageName);
});
node.append("text").attr("dy", ".3em").style("text-anchor", "middle").text(function (d) {
    return d.className.substring(0, d.r / 3);
});
function classes(root) {
    var classes = [];
    function recurse(name, node) {
        if (node.children)
            node.children.forEach(function (child) {
                recurse(node.name, child);
            });
        else
            classes.push({packageName: name, className: node.name, value: node.size});
    }
    recurse(null, root);
    return {children: classes};
}

d3.select(self.frameElement).style("height", height + "px");
}
</script>




<script type="text/javascript">

 var treeData = JSON.parse(trdata);

// var treeData = [
//   {
//     "name": "Top Level",
//     "parent": "null",
//     "children": [
//       {
//         "name": "Level 2: A",
//         "parent": "Top Level",
//         "children": [
//           {
//             "name": "Son of A",
//             "parent": "Level 2: A"
//           },
//           {
//             "name": "Daughter of A",
//             "parent": "Level 2: A"
//           }
//         ]
//       },
//       {
//         "name": "Level 2: B",
//         "parent": "Top Level",
//         "children": [
//           {
//             "name": "Son of B",
//             "parent": "Level 2: B"
//           }]

//       }
//     ]
//   }
// ];


// ************** Generate the tree diagram  *****************
function showpath(){
var wth=$(document).width();
var width0 = Math.round(wth*0.6);
var height0 = Math.round(wth*0.3);
var left0 = Math.round(wth*0.1);



var margin = {top: 20, right: 20, bottom: 20, left: left0},
 width = width0 - margin.right - margin.left,
 height = height0 - margin.top - margin.bottom;
 
var i = 0;

var tree = d3.layout.tree()
 .size([height, width]);

var diagonal = d3.svg.diagonal()
 .projection(function(d) { return [d.y, d.x]; });

var svg = d3.select("#leadpath").append("svg")
 .attr("width", width + margin.right + margin.left)
 .attr("height", height + margin.top + margin.bottom)
  .append("g")
 .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

root = treeData[0];
  
update(root);

function update(source) {

  // Compute the new tree layout.
  var nodes = tree.nodes(root).reverse(),
   links = tree.links(nodes);

  // Normalize for fixed-depth.
  nodes.forEach(function(d) { d.y = d.depth * height0/2; });

  // Declare the nodesâ€¦
  var node = svg.selectAll("g.node")
   .data(nodes, function(d) { return d.id || (d.id = ++i); });

  // Enter the nodes.
  var nodeEnter = node.enter().append("g")
   .attr("class", "node")
   .attr("transform", function(d) { 
    return "translate(" + d.y + "," + d.x + ")"; });

  nodeEnter.append("circle")
   .attr("r", 10)
   .style("fill", "#fff");
  
  nodeEnter.append("title").text(function (d) {
    return d.name;
    });

  nodeEnter.append("text")
   .attr("x", function(d) { 
    return d.children || d._children ? -13 : 13; })
   .attr("dy", ".35em")
   .attr("text-anchor", function(d) { 
    return d.children || d._children ? "end" : "start"; })
   .text(function(d) { return d.name; })
   .style("fill-opacity", 1);

  // Declare the linksâ€¦
  var link = svg.selectAll("path.link")
   .data(links, function(d) { return d.target.id; });

  // Enter the links.
  link.enter().insert("path", "g")
   .attr("class", "link")
   .attr("d", diagonal);

}
}
</script>



@endsection

