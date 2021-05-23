@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m6">
                <h5>{{$title}}</h5>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            
            <div class="col s12 m6">
                <div class="row">
                    <form class="col s12">

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $(".certificate").removeClass('active');
            $(".priest").addClass('active');
        });
    </script>
@endsection