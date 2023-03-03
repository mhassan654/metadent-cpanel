@extends('layouts.app')

<?php
use Illuminate\Support\Facades\URL;
$url = '';
if (request()->secure()) {
    $url = URL::asset('/api/patients/appointments/checkin');
}
$url = URL::asset('/api/patients/appointments/checkin');
?>

@section('content')
    <div class="container">
        <div class="row justify-content-center h-screen">
            <div class="col-md-12">
                <div class="card text-center align-center">
                    <div class="card-header">
                        <h1 class="card-title ">{{ __('QR Code For Self Checking in.') }}</h1>
                    </div>
                    <div class="card-body">
                        {{-- <div class="row"> --}}
                            <div class="col-md-8 offset-md-2 w-11">

                                    {!! DNS2D::getBarcodeHTML($url, 'QRCODE') !!}

                            </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
