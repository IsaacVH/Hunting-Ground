@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create Hunt</div>

                <style>
                	#createHuntForm label {
                		text-align: right;
                		width: 100%;
                	}
                </style>
                <div class="panel-body">
                    <form id="createHuntForm" action="/api/hunts" method="POST">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-sm-3"><label for="name">Name</label></div>
                            <div class="col-sm-6"><input name="name" /></div>
                            <br /><br />
                        </div>
                        <div class="row">
                            <div class="col-sm-3"><label for="start_date">Start Date</label></div>
                            <div class="col-sm-6"><input name="start_date" type="date" /></div>
                            <br /><br />
                        </div>
                        <div class="row">
                            <div class="col-sm-3"><label for="end_date">End Date</label></div>
                            <div class="col-sm-6"><input name="end_date" type="date" /></div>
                            <br /><br />
                        </div>
                        <div class="row">
                        	<div class="col-sm-3"></div>
                        	<div class="col-sm-6">
                        		<button type="submit">Create</button>
                        	</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
