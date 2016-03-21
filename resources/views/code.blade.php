@extends('layouts.template')
@section('content')
<div class="col-md-2"></div>
<div class="col-md-8">
<code>(function(m,e,t,f,l,o,w){
           m['_mFa'] = m['_mFa'] || [];      
           m['_mFa'].c = l;
           w = e.getElementsByTagName('head')[0];
           o = e.createElement(t); o.async = 1;
           o.src = "https://"+f+".min.js"; w.appendChild(o);
       })(window,document,'script','data.metricsflow.com/metrics', <?php echo $client_id; ?>-<?php echo $campaign_id; ?>);
</code>
 </div>
 <div class="col-md-2"></div>
@endsection