<!DOCTYPE html>
<html lang="en">
<head>
    <script src="bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="bower_components/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
    <link href="bower_components/AdminLTE/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/portfolio.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="content-wrapper" style="height: 30%;">
    <section class="content">
      <div class="row" id="title">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <h1><p class="Welcome"><b style="font-size:40px;color: #282e62">Metrics</b>flow</p></h1>
          <h1><p class="Welcome">Welcome!</p></h1>
          <h3><p class="Welcome">Get started by clicking Portfolio</p></h3>
        </div>
      </div>
    </section>
    <section class="content" style="height: 100%; ">
      <div class="col-md-12" id="contents" style="padding-bottom: 500px;">
      <?php $port_id = 0; ?>  
        <div class="row" id="port1">
          @foreach($mfive as $five)
          <?php $port_id++; ?>    
          <div class="col-md-4" style="padding-top: 40px;">
              <div id="portfolio">
                <div class="title">{{$five->name}}</div>
                <div class="body" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.01);">
                <a href="/home"><img src="{{$five->logo}}" alt= "logo" id="logo" class="img-responsive"></a>
                </div>
              </div>
          </div>
          @endforeach
          @foreach($portfolio as $key => $port) 
            @if($key > 0)
            @if($port->status == 'active')               
            <div class="col-md-4 port-pad" id="<?php echo Auth::user()->client_id . '- 00' . $port_id ?>">
            @if(!empty($port->logo))
            <div id="portfolio">
              <div class="title">{{$port->name}}</div>
              <div class="body" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.01);">
                <a href="/home"><img src="{{$port->logo}}" alt= "logo" id="logo" class="img-responsive"></a>
              </div>
            </div>
            @elseif(empty($port->logo))
              <div id="portfolio">
                  <div class="title">{{$port->name}}</div>
                  <div class="body"><a href="/home"><img src="http://via.placeholder.com/350x150"></a></div>
              </div>
            @endif
          </div>
          @elseif($port->status == 'pending')
          <div class="col-md-4" style="padding-top: 40px; padding-bottom: 50px;" id="<?php echo Auth::user()->client_id . '- 00' . $port_id ?>">
            @if(!empty($port->logo))
            <div id="portfolio">
              <div class="title">{{$port->name}}</div>
              <div class="body" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.01);">
                <a href="JavaScript:void(0);" onclick="return false;"><img src="{{$port->logo}}" alt= "logo" id="logo" class="img-responsive"></a>
              </div>
            </div>
            @elseif(empty($port->logo))
              <div id="portfolio">
                  <div class="title">{{$port->name}}</div>
                  <div class="body"><a href="/home"><img src="http://via.placeholder.com/350x150"></a></div>
              </div>
            @endif
          </div>
          @endif
        @endif
        @endforeach
      </div>
      </div>
    </section>     
  </div>
</body>
</html>
