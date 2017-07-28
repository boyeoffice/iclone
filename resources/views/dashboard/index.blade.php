@extends('layouts.master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
    	<!--start box -->
    	<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Online User</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Registerred User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /end start box -->
      <div class="box box-danger">
      	<div class="box-header with-border">
      		<div class="box-title">User Stat</div>
      	</div>
      	<div style="min-height: 140px;" class="box-body"></div>
      </div>
      <!-- end box -->
      <div class="row">
      	<div class="col-md-8">
      		<div class="box box-success">
      			<div class="box-header with-border">
      				<div class="box-title">Visitors Location</div>
      			</div>
      			<div style="min-height: 140px;" class="box-body"></div>
      		</div>
      	</div>
      	<!-- browser usage -->
      	<div class="col-md-4">
      		<div class="box box-default">
      			<div class="box-header with-border">
      				Browser Usage
      			</div>
      			<div style="min-height: 140px;" class="box-body"></div>
      		</div>
      	</div>
      </div>
      <!-- end row -->
      <div class="row">
      	<div class="col-md-4">
      		<div class="box box-danger">
      			<div class="box-header with-border">
      				<div class="box-title">
      					Latest Members
      				</div>
      				<div style="min-height: 140px;" class="box-body"></div>
      			</div>
      		</div>
      	</div>

      	<div class="col-md-4">
      		<div class="box box-danger">
      			<div class="box-header with-border">
      				<div class="box-title">
      					Most liked posts
      				</div>
      				<div style="min-height: 140px;" class="box-body"></div>
      			</div>
      		</div>
      	</div>
      	<div class="col-md-4">
      		<div class="box box-danger">
      			<div class="box-header with-border">
      				<div class="box-title">
      					Most followers
      				</div>
      				<div style="min-height: 140px;" class="box-body"></div>
      			</div>
      		</div>
      	</div>
      </div>
    </section>
</div>
@endsection