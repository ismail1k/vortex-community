@extends('layouts.app')

@section('header')
    Players
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">N/A Player Online</h3>
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
