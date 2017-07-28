@extends('layouts.app')
@section('title')

@endsection

@section('content')
<div id="app" class="container">
	<div class="row">
		<upload></upload>
	</div>
</div>
@endsection
@section('scripts')
 <script src="{{ asset('js/app.js') }}"></script>
 @endsection