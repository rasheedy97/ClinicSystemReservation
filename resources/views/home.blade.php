@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reservations') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <!-- Main div -->
                    <div id="index" user_id="{{Auth::user()->id}}" is_admin="{{Auth::user()->is_admin}}"></div>
                    

                </div>
                          
            </div>
            
        </div>
    </div>
</div>
@endsection
