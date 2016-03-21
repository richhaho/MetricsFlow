<style type="text/css">
  li:hover{
    background-color: #26417f;
  }
</style>
 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu">
      @if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Super Admin'))
        <li class="active">
          <a href="/home">
              <i class="fa fa-dashboard fa-1x"></i>
              <span>Home</span>
          </a>
        </li>
        
       <!--  <li class="treeview">
            <a href="#">
              <i class="fa fa-bullhorn fa-1x"></i>
              <span>Campaigns</span>
              <!-- <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span> -->
            <!-- </a> -->
          <!-- <ul class="treeview-menu">
            <li><a href="/campaign/clear">Overview</a></li>
            @if(Auth::user()->hasPortfolios())
              @foreach(Auth::user()->currentPortfolio()->campaigns as $campaign)
                <li>
                  <a href="/campaign/switch/{{ $campaign->id }}">
                    {{ $campaign->name }}
                  @if(Auth::user()->currentCampaign() == $campaign)
                      <i class="fa fa-check text-green"></i>
                  @endif
                  </a>
                </li>
              @endforeach
            <li><a href="/campaign/add">Add New</a></li>
            @endif
            <li><a href="/campaign/settings">Settings</a></li>
          </ul> -->
        <!--</li> -->
        <li class="treeview">
            <a href="/allcontents">
              <i class="fa fa-bar-chart fa-1x"></i>
              <span>Content</span>
            </a>
        </li> 
        <li class="treeview">
            <a href="/leads">
              <i class="fa fa-dot-circle-o fa-1x"></i>
              <span>Leads</span>
            </a>
        </li>
        
        <li class="treeview">
            <a href="#">
              <i class="fa fa-share-alt fa-1x"></i> <span>Portfolio</span>
              <!-- <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span> -->
            </a>
           <!--  <ul class="treeview-menu">
              <li><a href="/portfolio">Overview</a></li>
              @foreach(Auth::user()->portfolios as $portfolio)
                <li>
                  <a href="/portfolio/switch/{{ $portfolio->id }}">
                    {{$portfolio->name}}
                  @if(Auth::user()->currentPortfolio() == $portfolio)
                    <i class="fa fa-check text-green"></i>
                  @endif
                    
                  </a>                                                          
                </li>
              @endforeach
              <li><a href="/portfolio/add">Add New</a></li>
              <li><a href="/portfolio/settings">Settings</a></li>
            </ul> -->
        </li>
      @elseif(Auth::user()->hasRole('Client'))  
        <li class="treeview">
            <a href="/home">
              <i class="fa fa-dot-circle-o fa-1x"></i>
              <span>Home</span>
            </a>
        </li>
        <li class="treeview">
            <a href="/allcontents">
              <i class="fa fa-share-alt fa-1x"></i> <span>Contents</span>
            </a>
        </li>
        <li class="treeview">
            <a href="/leads">
              <i class="fa fa-dot-circle-o fa-1x"></i>
              <span>Leads</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-bar-chart fa-1x"></i>
              <span>Reports</span>
            </a>
        </li> 
      @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
