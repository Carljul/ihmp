@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m3">
                <form action="/ihmp/maintenance/records">
                    @csrf
                    <div class="card">
                        <div class="card-content">
                            {{$certificates_to_delete}} to delete out of {{$certificates_not_to_delete}} records.
                            <button class="btn btn-waves" type="submit">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col s12 m3">
                <form action="/ihmp/maintenance/priests">
                    @csrf
                    <div class="card">
                        <div class="card-content">
                            {{$priests_to_delete}} to delete out of {{$priests_not_to_delete}} priests.
                            <button class="btn btn-waves" type="submit">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
