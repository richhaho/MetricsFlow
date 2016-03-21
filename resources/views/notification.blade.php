@extends('layouts.template')

@section('content-header')
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="col-md-12 col-sm-12 col-xs-12 logo">
      </div>
    </section>
@endsection

@section('content')
<div class="container-fluid">
	@foreach($notification as $notify)
	<div class="row">
		<div class="col-lg-10 col-md-12 col-sm-12 box-center">
			<div class="box">
				<div class="box-body">
					<div class="col-md-12">
						<div class="col-md-11">
							<h4>{{$notify->email}} has just converted!</h4>
						</div>
						<div class="col-md-1">
							<i class="fa fa-ellipsis-h fa-2x" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection