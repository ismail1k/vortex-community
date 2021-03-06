@extends('layouts.app')

@section('header')
    Players
@endsection

@section('js')
<script></script>
@endsection

@section('content')
<div class="container-fluid">
    @if(Session::has('response'))
    <div class="alert alert-info">
        <span>{{Session::get('response')}}</span>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <form action="{{route('players.update', $player->id)}}" method="post">
                    @csrf
                    <div class="d-flex justify-content-between">
                        <h3 class="box-title">{{ str_replace('_', ' ', $player->username) }}({{$player->id}})</h3>
                    </div>
                    <hr>
                    <div class="form-group d-flex">
                        <div class="col-4">
                            <label for="username">Username: </label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="username" value="{{ $player->username }}" placeholder="firstname_lastname">
                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <div class="col-4">
                            <label for="username">Status: </label>
                        </div>
                        <div class="col-8">
                            <select class="form-select" name="banned" {{Auth::user()->ban?'':'disabled'}}>
                                <option value="0" {{$player->banned?'':'selected'}}>Active</option>
                                <option value="1" {{$player->banned?'selected':''}}>Banned</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <div class="col-4">
                            <label for="username">Whitelist: </label>
                        </div>
                        <div class="col-8">
                            <select class="form-select" name="locked" {{Auth::user()->whitelist?'':'disabled'}}>
                                <option value="0" {{$player->locked?'':'selected'}}>Whitelisted</option>
                                <option value="1" {{$player->locked?'selected':''}}>Unwhitelisted</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <div class="col-4">
                            <label for="username">Discord ID: </label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="discordid" value="{{ $player->discord->id }}" placeholder="Discord ID">
                        </div>
                    </div>
                    <div class="form-group d-flex">
                        <div class="col-4">
                            <label for="username">Discord Name: </label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="discordid" value="{{ $player->discord->name }}" placeholder="Discord Name" disabled>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
