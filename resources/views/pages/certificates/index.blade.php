@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <br>
    <div class="row">
        <div class="col s12">
            <!-- Modal Trigger -->
            <a class="waves-effect waves-light btn modal-trigger right" href="#modal1">
                <i class="material-icons left">import_export</i>Import
            </a>

            <!-- Modal Structure -->
            <div id="modal1" class="modal bottom-sheet">
                <div class="modal-content">
                <h4>Import Your CSV File Here</h4>
                <p>Follow the Steps</p>
                </div>
                <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Import</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6">
            <h4>Transactions</h4>
            <table id="certificates_table" class="display">
                <thead>
                    <tr>
                        <th>Column 1</th>
                        <th>Column 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 2 Data 1</td>
                        <td>Row 2 Data 2</td>
                    </tr>
                </tbody>
            </table>
        </div>

        
        <div class="col s12 m6">

        </div>
    </div>
</div>
@endsection