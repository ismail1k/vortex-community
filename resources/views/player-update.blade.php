@extends('layouts.app')

@section('header')
    Players
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <div class="d-flex justify-content-between">
                    <h3 class="box-title">{{ str_replace('_', ' ', $player->username) }}</h3>
                    
                    @if($player->locked)
                    <button class="btn btn-success">Unlock</button>
                    @else
                    <button class="btn btn-danger">Lock</button>
                    @endif
                </div>
                <hr>
                <div class="form-group d-flex">
                    <div class="col-4">
                        <label for="username">Username: </label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" value="{{ $player->username }}" placeholder="username">
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-4">
                        <label for="username">Discord ID: </label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" value="{{ $player->discordid }}" placeholder="discord id">
                    </div>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
