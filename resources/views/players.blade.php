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
                    <h3 class="box-title">Players</h3>
                    <form action="" method="get" id="search">
                        <div class="input-group" style="max-width:350px;">
                            <input type="text" name="q" class="form-control" placeholder="Search" aria-label="Search" value="{{$query??''}}">
                            <span role="button" onclick="document.getElementById('search').submit()" class="input-group-text" style="height:35px;">
                                <i class="fas fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                    </form>
                </div>
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Name RP</th>
                        <th>Whitelisted</th>
                        <th width="250px">Discord</th>
                        <th width="100px">Action</th>
                    </tr>
                    @foreach($players as $player)
                        <tr>
                            <td>{{$player->id}}</td>
                            <td>{{$player->username}}</td>
                            <td>{{$player->locked?'No':'Yes'}}</td>
                            <td>{{$player->discord->name??'None'}}</td>
                            <td>
                                <a type="button" class="btn btn-info" href="{{ route('players.update', $player->id) }}">Update</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
