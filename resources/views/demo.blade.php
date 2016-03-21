@extends('layouts.template')

@section('scripts')
  <script src="{{ asset ("/bower_components/AdminLTE/dist/js/pages/dashboard2.js") }}"></script>
  <script src="/js/sparkline.js"></script>
@endsection
 
@section('content-header')
 <!-- Content Header (Page header) -->
  <section>
      <div class="col-md-12 col-sm-12 col-xs-12 logo">
        <h2><i class="fa fa-chevron-left breadcrumnb-arrow" aria-hidden="true"></i> All Accounts</h2>
        <img  src="{{$logo->logo}}" style="width: 200px;">
      </div>
    </section>
@endsection

@section('content')
<div class="container-fluid">
<!--   <div class="row">
    <section id="Actions">
      <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xs-offset-1 title-padding">
        <h2>Action Items</h2> 
      </div>
      <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 alert center">
        <div class="col-md-10">
          <div class="row load_converted" id="action_item_title">
            <div class="col-lg-10">
              <div class="alert-header">
                <img src="/img/heart1.png">
                <span>New Load Converted!</span>
              </div>    
            </div>
            <div class="col-lg-2">
              <div class="right"> 
                <input type="button" value="View Details" class="details-btn" />      
                <i class="fa fa-times close-btn" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div class="row alert-content" id="action_item_content">
            <div class="col-md-12">
              <div>
                <p></p>
                <span>Date Converted: <b> April 7, 2017</b> </span>
                <span>Campaign: <b> Campaign 02</b> </span>
                <span>Engagement: <b> HIGH </b></span>
                <span>Total Sessions: <b> 26 </b></span>
                <p></p>
              </div>    
            </div>
          </div>
        </div>
      </div>
     </section>
  </div> -->
  <div class="row">
    <section id="Leads">
      <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xs-offset-1 title-padding">
        <h2>Live Leads</h2> 
      </div>
      <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 alert center">
        <div class="col-md-10">
          <div class="row grey-bg" id="action_item_title">
            <div class="col-lg-8">
              <div class="alert-header">
                <span id="black">{{$active_leads}}  total active leads</span>
              </div>    
            </div>
            <div class="col-lg-4">
              <div class="right">   
                <input type="button" value="View Now in Real Time" class="details-btn"/>                    
                <i class="fa fa-times close-btn black" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div class="row alert-content" id="action_item_content">
            <div class="col-md-12">
              @foreach($view_pages as $pages)
              <p><h4 class="box-display">
                {{$pages->Value}} viewing page : <strong>{{$pages->PageName}}</strong>
              </h4> </p>
              @endforeach
            </div>    
            </div>
          </div>
        </div>
    </section>
  </div>
   <div class="row">
    <section id="Leads">
      <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xs-offset-1 title-padding">
        <h2>Lead Progression</h2> 
        <div class="right select_filter">
            <select>
              <option>
                <div>Last 7 days</div>
              </option>
              <option>
                Last 14 days
              </option>
              <option>
                Last 21 days
              </option>
              <option>
                Last 28 days
              </option>
              <option>
                Last 35 days
              </option>
            </select>
          </div>
      </div>
      <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 alert center">
        <div class="col-md-10">
          <div class="row alert-content grey-bg" id="action_item_content">
            <div class="col-lg-10">
                <div class="alert-header">
                 <span></span>
                </div>    
              </div>
              <div class="col-lg-2">
                <div class="right"> 
                  <input type="button" value="View Details" class="details-btn" />      
                  
                </div>
              </div>
            <div class="col-md-12">
              <div class="col-md-3">
                  <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                        <img class="img-responsive" src="/img/cluster1.png" style="text-align: center;"> 

                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                      <p class="percentage">{{ round($Aware/$all_leads*100)}}%</p>
                      <p class="pertext">Aware</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                        <img class="img-responsive" src="/img/cluster2.png" style="text-align: center;"> 
                        
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                      <p class="percentage">{{ round($Considering/$all_leads*100)}}%</p>
                      <p class="pertext">Considering</p>
                    </div>
                  </div>

                </div>
                <div class="col-md-3">
                  <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                        <img class="img-responsive" src="/img/cluster3.png" style="text-align: center;"> 
                        
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                      <p class="percentage">{{ round($Deciding/$all_leads*100)}}%</p>
                      <p class="pertext">Deciding</p>
                    </div>
                  </div>

                </div>
                <div class="col-md-3">
                  <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                        <img class="img-responsive" src="/img/cluster4.png" style="text-align: center;"> 
                        
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                      <p class="percentage">{{ round($Converted/$all_leads*1000)/10}}%</p>
                      <!-- {{ number_format($Converted/$all_leads*100, 1, '.', '')}} -->
                      <p class="pertext">Converted</p>
                    </div>
                  </div>

                </div>
            </div>    
            </div>
          </div>
      </div>
    </section>
  </div>
  <!-- <div class="row">
    <section id="LeadProgression">
      <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 alert col-sm-offset-2">
        <div class="col-md-9">
          <h2>Lead Progression</h2> 
          <div class="right select_filter">
            <select>
              <option>
                <div>Last 7 days</div>
              </option>
              <option>
                Last 14 days
              </option>
              <option>
                Last 21 days
              </option>
              <option>
                Last 28 days
              </option>
              <option>
                Last 35 days
              </option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 center">
          <div class="col-md-9 grey-bg content">
            <div class="row grey-bg" id="action_item_title">
              <div class="col-lg-10">
                <div class="alert-header">
                 <span></span>
                </div>    
              </div>
              <div class="col-lg-2">
                <div class="right"> 
                  <input type="button" value="View Details" class="details-btn" />      
                  
                </div>
              </div>
            </div>
            <div class="row padding" id="action_item_content">
              <div class="col-md-12">                
                <div class="col-md-3">
                  <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                        <img class="img-responsive" src="/img/cluster1.png" style="text-align: center;"> 

                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                      <p class="percentage">80%</p>
                      <p class="pertext">Aware</p>
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                        <img class="img-responsive" src="/img/cluster2.png" style="text-align: center;"> 
                        
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                      <p class="percentage">9%</p>
                      <p class="pertext">Considering</p>
                    </div>
                  </div>

                </div>
                <div class="col-md-3">
                  <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                        <img class="img-responsive" src="/img/cluster3.png" style="text-align: center;"> 
                        
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                      <p class="percentage">7%</p>
                      <p class="pertext">Deciding</p>
                    </div>
                  </div>

                </div>
                <div class="col-md-3">
                  <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                        <img class="img-responsive" src="/img/cluster4.png" style="text-align: center;"> 
                        
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                      <p class="percentage">4%</p>
                      <p class="pertext">Converted</p>
                    </div>
                  </div>

                </div>

              

              </div>

            </div>
            
          </div>
        </div>
    </section>
  </div> -->
 
  <div class="row" style="padding-top: 30px;">
    <section id="topContents">
      <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 alert col-xs-offset-1 title-padding">
        <div class="col-md-10">
          <h2>Top Content</h2>
          <div class="right select_filter">
            <select id="seldays" onchange="selectDates();">
              <option>
                <div>Last 7 days</div>
              </option>
              <option>
                Last 14 days
              </option>
              <option>
                Last 21 days
              </option>
              <option>
                Last 28 days
              </option>
              <option>
                Last 35 days
              </option>
            </select>
          </div> 
        </div>
      </div>
      <div id="content1" class="col-md-12 col-xs-12 col-sm-12 col-lg-12 box-center">
        <div class="col-md-10" style="margin-left: 30px">
           <?php $c=0; ?>
           @foreach($lead_detail as $lead)
           <?php $c=$c+1; ?> 
          <div class="col-md-4">
            <div class="box">
              <a href="/content?name={{$lead ->PageName}}">
                <div class="box-header with-border">
                  <h3 class="box-title">{{$lead ->PageName}}</h3>              
                </div>
              </a> 
              <div class="box-body">
                <div class="thumbnail_image">         
                   <a href="/content?name={{$lead ->PageName}}">
                      <div id="screenshot">                           
                          <iframe sandbox="allow-pointer-lock" scrolling="no" src='{{$lead->PageURL}}'>                      
                          </iframe> 
                       </div>
                   </a>
                </div>
                <div class="col-md-2 left">
                  <h1 class="green"><strong> <!-- {{ number_format($lead->score, 1, '.', '')}} --> </strong></h1>
                </div>  
                <div class="col-md-10 content_1">
                  <h4>Sessions Generated : <strong>{{$lead->Value}}</strong></h4>
                </div>            
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
  </div>
  <!-- <div class="row" style="padding-top: 30px;">
    <section id="topcontent">
       <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 alert col-xs-offset-1 title-padding">
        <div class="col-md-10">
          <h2>Top Campaigns</h2>
          <div class="right select_filter">
            <select>
              <option>
                <div>Last 7 days</div>
              </option>
              <option>
                Last 14 days
              </option>
              <option>
                Last 21 days
              </option>
              <option>
                Last 28 days
              </option>
              <option>
                Last 35 days
              </option>
            </select>
          </div> 
        </div>
      </div>
      <div id="content" class="col-md-12 col-xs-12 col-sm-12 col-lg-12 box-center">
        <div class="col-md-11">
          <div class="col-md-4">
            <div class="box">
              <a href="/content?name=">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>              
                </div>
              </a> 
              <div class="box-body">
                <div class="thumbnail_image">         
                   <a href="/content?name=">
                      <div id="screenshot">                           
                          <iframe sandbox="allow-pointer-lock" scrolling="no" src='#'>                      
                          </iframe> 
                       </div>
                   </a>
                </div>
                <div class="col-md-2 left">
                  <h1 class="green"><strong>1200</strong></h1>
                </div>  
                <div class="col-md-10 content_1">
                  <h4>Leads Generated : <strong>100</strong></h4>
                </div>            
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <a href="/content?name=">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>              
                </div>
              </a> 
              <div class="box-body">
                <div class="thumbnail_image">         
                   <a href="/content?name=">
                      <div id="screenshot">                           
                          <iframe sandbox="allow-pointer-lock" scrolling="no" src='#'>                      
                          </iframe> 
                       </div>
                   </a>
                </div>
                <div class="col-md-2 left">
                  <h1 class="green"><strong>1200</strong></h1>
                </div>  
                <div class="col-md-10 content_1">
                  <h4>Leads Generated : <strong>100</strong></h4>
                </div>            
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <a href="/content?name=">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>              
                </div>
              </a> 
              <div class="box-body">
                <div class="thumbnail_image">         
                   <a href="/content?name=">
                      <div id="screenshot">                           
                          <iframe sandbox="allow-pointer-lock" scrolling="no" src='#'>                      
                          </iframe> 
                       </div>
                   </a>
                </div>
                <div class="col-md-2 left">
                  <h1 class="green"><strong>1200</strong></h1>
                </div>  
                <div class="col-md-10 content_1">
                  <h4>Leads Generated : <strong>100</strong></h4>
                </div>            
              </div>
            </div>
          </div>
        </div>  
      </div>
    </section>
  </div> -->
  <div class="row" style="padding-top: 30px;">
    <section id="topcontent">
       <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 alert col-xs-offset-1 title-padding">
        <div class="col-md-10">
          <h2>Top Channels</h2> 
          <!-- <div class="right select_filter">
            <select>
              <option>
                <div>Last 7 days</div>
              </option>
              <option>
                Last 14 days
              </option>
              <option>
                Last 21 days
              </option>
              <option>
                Last 28 days
              </option>
              <option>
                Last 35 days
              </option>
            </select>
          </div> -->
        </div>
       </div> 
      <!-- <div id="content" class="col-md-12 col-xs-12 col-sm-12 col-lg-12 box-center">
        
        <div class="col-md-11">
          
          <div class="col-md-4">
            <div class="box">
              <a href="/content?name=">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>              
                </div>
              </a> 
              <div class="box-body">
                <div class="thumbnail_image">         
                   <a href="/content?name=">
                      <div id="screenshot">                           
                          <iframe sandbox="allow-pointer-lock" scrolling="no" src='#'>                      
                          </iframe> 
                       </div>
                   </a>
                </div>
                <div class="col-md-2 left">
                  <h2 class="green"><strong></strong></h2>
                </div>  
                <div class="col-md-10 content_1">
                  <h3>Prospects Generated : <strong>{</strong></h3>
                </div>            
              </div>
            </div>
          </div>
         
            
           
        </div>
    </div>   -->
    <div  class="col-md-12 col-xs-12 col-sm-12 col-lg-12 box-center" >
        <div class="col-md-10" style="margin-left: 30px">
        @foreach($channels as $chan)
          <div class="col-md-4">
            <div class="box">
              <div class="box-header with-border">
                   <h3 class="box-title">{{ ucfirst($chan->domainname)}}</h3>             
              </div>
              <div class="box-body">         
                <h3 class="boxtitle"> </h3>
                <div class="align col-md-12 col-sm-12">
                  <i class="fa fa-arrow-up fa-3x green icon"></i>
                  <h1 class="metrics"><strong>{{ round($chan->Value / $chan_sum * 100)}} %</strong></h1>
                </div>  
                <div class="col-md-12 col-sm-12 col-xs-12 content_1">
                  <h4>Conversion Rate : <strong>{{ round($chan->Value / $chan_sum * 100)}} %</strong></h4>
                  <h4>Prospects Generated : <strong>{{ $chan->Value}}</strong></h4>
                  <h4>Lead Conversions : <strong>{{ $chan->freq}}</strong></h4>
                </div>            
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
  </div>
  </div>
</div>

  


























<!-- <section>
<div class="row">
  <section>
      <h1> 
        Live Leads
      </h1>
  </section>
  <div class="col-md-11">
    <div class="box">
        <div class="box-header with-border">
            <div class="col-md-6 col-sm-12 col-xs-12">
              <h3 class="box-title">52 active leads through 3 campaigns</h3>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
               <div class="box-tools pull-right">
               <button type="button" class="btn btn-default">View Now in real time</button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times fa-2x" style="padding-top: 5px;"></i></button>
              </div>
            </div>
        </div>
        <div class="box-body">
          <h5 class="box-display">
            18 viewing page : <strong>People</strong>
          </h5> 
          <h5 class="box-display box-padding">
            8 watching video : <strong>How to save money</strong>
          </h5> 
          <h5 class="box-display box-padding">
            7 viewing page : <strong>Blog Post 12</strong>
          </h5> 
          <h5 class="box-display box-padding">
            6 viewing page : <strong>Request a Quote</strong>
          </h5> 
          <h5 class="box-display box-padding">
            5 viewing page : <strong>Communication</strong>
          </h5> 
          <br>
          <h5 class="box-display">
            4 viewing page : <strong>About</strong>
          </h5> 
          <h5 class="box-display box-padding">
            3 viewing page : <strong>Services</strong>
          </h5>                 
      </div>
    </div>
  </div>
</div>
</section>


<div class="row">
  <section class="content-header" style="padding-bottom: 20px;">
      <h1>
        Lead Progression
      </h1>
      <div style="float: right">
        <select style="border: none;">
          <option>
            <div style="font-size: 16px;">Last 7 days</div>
          </option>
          <option>
            Last 14 days
          </option>
          <option>
            Last 21 days
          </option>
          <option>
            Last 30 days
          </option>
          <option>
            Last 60 days
          </option>
        </select>
      </div>
    </section>
  <div class="col-md-12">
    <div class="box lead-box">
      <div class="box-header">
        <div class="def-btn">
            <button type="button" class="btn btn-default">Close Details</button>
          </div>
      </div>
        <div class="box-body">          
          <div class="col-md-3 col-xs-12 col-sm-12 col-lg-3">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-5x circle-darkblue" id="icon"></i>
              <h5 id="icon_style">Facebook : 432</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-4x circle-darkblue padding-left" id="icon"></i>
              <h5 id="icon_style">Facebook : 432</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-4x circle-darkblue padding-left" id="icon"></i>
              <h5 id="icon_style">Facebook : 432</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-4x circle-darkblue padding-left" id="icon"></i>
              <h5 id="icon_style">Facebook : 432</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-4x circle-darkblue padding-left" id="icon"></i>
              <h5 id="icon_style">Facebook : 432</h5>              
            </div>
          </div>
          <div class="col-md-3 col-xs-12 col-sm-12 col-lg-3">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-5x circle-blue" id="icon"></i>
              <h5 id="icon_style">Landing Page : 180</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-4x circle-blue padding-left" id="icon"></i>
              <h5 id="icon_style">Facebook : 432</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-4x circle-blue padding-left" id="icon"></i>
              <h5 id="icon_style">Facebook : 432</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-4x circle-blue padding-left" id="icon"></i>
              <h5 id="icon_style">Facebook : 432</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-4x circle-blue padding-left" id="icon"></i>
              <h5 id="icon_style">Facebook : 432</h5>              
            </div>
          </div>
          <div class="col-md-3 col-xs-12 col-sm-12 col-lg-3">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-5x circle-red" id="icon"></i>
              <h5 id="icon_style">Landing Page : 87</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-4x circle-red padding-left" id="icon"></i>
              <h5 id="icon_style">Facebook : 432</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-4x circle-red padding-left" id="icon"></i>
              <h5 id="icon_style">Facebook : 432</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-4x circle-red padding-left" id="icon"></i>
              <h5 id="icon_style">Facebook : 432</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-4x circle-red padding-left" id="icon"></i>
              <h5 id="icon_style">Facebook : 432</h5>              
            </div>
          </div>
          <div class="col-md-3 col-xs-12 col-sm-12 col-lg-3">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-5x circle-green" id="icon"></i>
              <h5 id="icon_style">Landing Page : 87</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-4x circle-green padding-left" id="icon"></i>
              <h5 id="icon_style">Facebook : 432</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-4x circle-green padding-left" id="icon"></i>
              <h5 id="icon_style">Facebook : 432</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-4x circle-green padding-left" id="icon"></i>
              <h5 id="icon_style">Facebook : 432</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <i class="fa fa-circle fa-4x circle-green padding-left" id="icon"></i>
              <h5 id="icon_style">Facebook : 432</h5>              
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="margin-top: 40px;">
            <div class="col-md-3 col-sm-3">
              <h3 style="text-align: center;">80% <br> Aware</h3>
            </div>
            <div class="col-md-3 col-sm-3">
              <h3 style="text-align: center;">9% <br> Considering</h3>
            </div>
            <div class="col-md-3 col-sm-3">
              <h3 style="text-align: center;">7% <br> Deciding</h3>
            </div>
            <div class="col-md-3 col-sm-3">
              <h3 style="text-align: center;">4% <br> Converted</h3>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
   <section class="content-header">
      <h1 id="paddingbottom">
        Top Content
      </h1>
      <div style="float: right;  padding-bottom: 10px;">
        <select style="border: none;">
          <option>
            <div style="font-size: 16px;">Last 7 days</div>
          </option>
          <option>
            Last 14 days
          </option>
          <option>
            Last 21 days
          </option>
          <option>
            Last 30 days
          </option>
          <option>
            Last 60 days
          </option>
        </select>
      </div>
    </section>
  <div class="col-md-12">
    <div class="col-md-4">
      <div class="box">
        <div class="box-header with-border">
                <h3 class="box-title">Landing Page 1</h3>                
        </div>
        <div class="box-body">
            <div class="thumbnail_image">         
              <img src="http://placehold.it/250x200">
            </div>
            <div class="col-md-4 left">
              <h1 class="green"><strong>9.2</strong></h1>
            </div>  
            <div class="col-md-8 content_1">
              <h4>Leads Generated : <strong>83</strong></h4>
              <h4>Posted : <strong>Mar 27, 2017</strong></h4>
            </div>            
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="box">
        <div class="box-header with-border">
                <h3 class="box-title">Blog Post 8</h3>                
        </div>
        <div class="box-body">
            <div class="thumbnail_image">         
              <img src="http://placehold.it/250x200">
            </div>
            <div class="col-md-4 left">
              <h1 class="green"><strong>8.6</strong></h1>
            </div>  
            <div class="col-md-8 content_1">
              <h4>Leads Generated : <strong>57</strong></h4>
              <h4>Posted : <strong>Mar 15, 2017</strong></h4>
            </div>            
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="box">
        <div class="box-header with-border">
                <h3 class="box-title">Video "How to Increase Sales"</h3>                
        </div>
         <div class="box-body">
            <div class="thumbnail_image">         
              <img src="http://placehold.it/250x200">
            </div>
            <div class="col-md-4 left">
              <h1 class="blue"><strong>7.9</strong></h1>
            </div>  
            <div class="col-md-8 content_1">
              <h4>Leads Generated : <strong>48</strong></h4>
              <h4>Posted : <strong>Mar 25, 2017</strong></h4>
            </div>            
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
   <section class="content-header">
      <h1 id="paddingbottom">
        Top Campaigns
      </h1>
      <div style="float: right;  padding-bottom: 10px;">
        <select style="border: none;">
          <option>
            <div style="font-size: 16px;">Last 7 days</div>
          </option>
          <option>
            Last 14 days
          </option>
          <option>
            Last 21 days
          </option>
          <option>
            Last 30 days
          </option>
          <option>
            Last 60 days
          </option>
        </select>
      </div>
    </section>
  <div class="col-md-12">
    <div class="col-md-4">
      <div class="box">
        <div class="box-header with-border">
                <h3 class="box-title">Campaign 1</h3>                
        </div>
        <div class="box-body">         
              <div class="align col-md-12 col-xs-12 col-sm-12">
                <h1 class="metrics green top"><strong>8.9</strong></h1>
              </div>  
              <div class="col-md-12 content_1">
                <h4>Content Interactions : 1,263</h4>
                <h4>Content Engagements : <strong>730</strong></h4>
                <h4>Call to Action : <strong>230</strong></h4>
                <h4>Lead Conversions : <strong>78</strong></h4>
              </div>            
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="box">
        <div class="box-header with-border">
                <h3 class="box-title">Campaign 12</h3>                
        </div>
        <div class="box-body"> 
              <div class="align col-md-12 col-xs-12 col-sm-12">
                <h1 class="metrics green"><strong>8.7</strong></h1>
              </div>  
              <div class="col-md-12 content_1">
                <h4>Content Interactions : 1,053</h4>
                <h4>Content Engagements : <strong>691</strong></h4>
                <h4>Call to Action : <strong>745</strong></h4>
                <h4>Lead Conversions : <strong>598</strong></h4>
              </div>            
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="box">
        <div class="box-header with-border">
                <h3 class="box-title">Campaign 15</h3>                
        </div>
        <div class="box-body">         
              <div class="align col-md-12 col-xs-12 col-sm-12">
                <h1 class="metrics green"><strong>8.2</strong></h1>
              </div>  
              <div class="col-md-12 content_1">
                 <h4>Content Interactions : 987</h4>
                <h4>Content Engagements : <strong>587</strong></h4>
                <h4>Call to Action : <strong>556</strong></h4>
                <h4>Lead Conversions : <strong>376</strong></h4>
              </div>            
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
   <section class="content-header">
      <h1 id="paddingbottom">
        Top Channels
      </h1>
      <div style="float: right; padding-bottom: 10px;">
        <select style="border: none;">
          <option>
            <div style="font-size: 16px;">Last 7 days</div>
          </option>
          <option>
            Last 14 days
          </option>
          <option>
            Last 21 days
          </option>
          <option>
            Last 30 days
          </option>
          <option>
            Last 60 days
          </option>
        </select>
      </div>
    </section>
  <div class="col-md-12">
    <div class="col-md-4">
      <div class="box">
        <div class="box-header with-border">
                <h3 class="box-title">Facebook</h3>                
        </div>
        <div class="box-body">         
              <h3 class="boxtitle">Change in Users</h3>
              <div class="align col-md-12 col-sm-12">
                <i class="fa fa-arrow-up fa-3x green icon"></i>
                <h1 class="metrics"><strong>15%</strong></h1>
              </div>  
              <div class="col-md-12 col-sm-12 col-xs-12 content_1">
                <h4>Conversion Rate : <strong>12%</strong></h4>
                <h4>Leads Generated : <strong>12,135</strong></h4>
                <h4>Lead Conversions : <strong>1,481</strong></h4>
              </div>            
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="box">
        <div class="box-header with-border">
                <h3 class="box-title">Facebook</h3>                
        </div>
        <div class="box-body">         
              <h3 class="boxtitle">Change in Users</h3>
              <div class="align col-md-12 col-xs-12 col-sm-12">
                <i class="fa fa-arrow-up fa-3x green icon"></i>
                <h1 class="metrics"><strong>12%</strong></h1>
              </div>  
              <div class="col-md-12 col-sm-12 col-xs-12 content_1">
                <h4>Conversion Rate : <strong>10%</strong></h4>
                <h4>Leads Generated : <strong>7,232</strong></h4>
                <h4>Lead Conversions : <strong>723</strong></h4>
              </div>            
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="box">
        <div class="box-header with-border">
                <h3 class="box-title">Facebook</h3>                
        </div>
        <div class="box-body">         
              <h3 class="boxtitle">Change in Users</h3>
              <div class="align col-md-12 col-xs-12 col-sm-12">
                <i class="fa fa-arrow-up fa-3x green icon"></i>
                <h1 class="metrics"><strong>8%</strong></h1>
              </div>  
              <div class="col-md-12 col-sm-12 col-xs-12 content_1">
                <h4>Conversion Rate : <strong>5%</strong></h4>
                <h4>Leads Generated : <strong>16,345</strong></h4>
                <h4>Lead Conversions : <strong>817</strong></h4>
              </div>            
        </div>
      </div>
    </div>
  </div>
</div> -->


<script type="text/javascript">
  var indy=7;
  selectDates();
  function selectDates(){
    
    var dys=parseInt(($('#seldays').val()).substring(5,7));
     
    if (indy==7) {dys=7;indy=0;}
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yy = today.getFullYear();
    dd=dd-dys;
    var dm=[31,28,31,30,31,30,31,31,30,31,30,31];

    if (dd<1){
      mm--;
      dd=dm[mm-1]+dd;
    }
    if (dd<1){
      mm--;
      dd=dm[mm-1]+dd;
    }

    var lastdate=yy+"-";
    if (mm<10) lastdate+="0"+mm; else lastdate+=mm;
    if (dd<10) lastdate+="-0"+dd; else lastdate+="-"+dd;
      
     
     
    $.ajax({
         method: "POST",
         url: "/leads_filtertopcontent",
         data: { filterdate: lastdate},

         })
        .done(function( msg ) {
            var topContents=JSON.parse(msg);
            
            $( "#content1" ).remove();
            

           var child_sec='<div id="content1" class="col-md-12 col-xs-12 col-sm-12 col-lg-12 box-center"> <div class="col-md-10" style="margin-left: 30px">';
           for (i=0;i<=2;i++){ 
//'+topContents[i].avgscore.toFixed(1)+'
child_sec+='<div class="col-md-4"> <div class="box"><a href="/content?name='+topContents[i].PageName+'"> <div class="box-header with-border"><h3 class="box-title">'+topContents[i].PageName+'</h3></div> </a>  <div class="box-body"> <div class="thumbnail_image"> <a href="/content?name='+topContents[i].PageName+'"> <div id="screenshot"> <iframe sandbox="allow-pointer-lock" scrolling="no" src="'+topContents[i].PageURL+'""></iframe>  </div> </a> </div> <div class="col-md-2 left"> <h1 class="green"><strong></strong></h1> </div> <div class="col-md-10 content_1"> <h4>Prospects Generated : <strong>'+topContents[i].sum+'</strong></h4> </div> </div> </div></div>';
}
          child_sec+='</div></div>';
        $( "#topContents" ).append(child_sec);          
            
        });
  }


</script>
@endsection