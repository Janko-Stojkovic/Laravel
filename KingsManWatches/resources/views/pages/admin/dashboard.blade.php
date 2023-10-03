@extends('layouts.admin')

@section('contentHeader')
    <h1>Welcome back, {{ session()->get('user')->username }}!</h1>
@endsection

@section('content')
    <div class="row">
        @foreach($infoBoxes as $i)
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box {{ $i['colorClass'] }}">
                    <div class="inner">
                        <h3>{{ $i['value'] }}</h3>

                        <p>{{ $i['text'] }}</p>
                    </div>
                    <div class="icon">
                        <i class="{{ $i['icon'] }}"></i>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
