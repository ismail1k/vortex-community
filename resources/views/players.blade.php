@extends('layouts.app')

@section('header')
    Players
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">25 Player Online</h3>
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Name RP</th>
                        <th width="250px">Discord Name</th>
                        <th width="100px">Action</th>
                    </tr>
                    @foreach($players as $player)
                        <tr>
                            <td>{{$player->uid}}</td>
                            <td>N/A</td>
                            <td>{{$player->username}}</td>
                            <td>{{$player->username}}</td>
                            <td>
                                <a type="button" class="btn btn-info" href="{{ route('players.update', $player->uid) }}">Update</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
