@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <br>
    <div class="row" style="margin-bottom: 0px !important;">
        <div class="col s12 m6">
            <div class="row" style="margin-bottom: 0px !important;">
                <h5 class="col s12 m3 left">Records</h5>
                <div class="input-field col s12 m4">
                    <select id="selectCertificate">
                        <option value="" disabled>Choose Record</option>
                        <option value="confirmation" selected>Confirmation Record</option>
                        <option value="marriage">Marriage Record</option>
                        <option value="birth">Birth Record</option>
                        <option value="death">Death Record</option>
                    </select>
                    <label>Choose Record</label>
                </div>
                <div class="input-field col s12 m4">
                    <input type="search" type="search" class="validate" id="searchARecord" style="background-color: transparent;">
                    <label>Search a record</label>
                </div>
                <div class="col s12 m1">
                    <a class="tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Show more filter" href="#filterTable">
                        <i class="material-icons" id="showFilter" style="margin-top: 25px;">filter_list</i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <!-- Modal Trigger -->
            @if(!config('config.disabledImport'))
            <a class="waves-effect waves-light btn modal-trigger right purple" href="#importExport" id="importExportButton">
                <i class="material-icons left">cloud_upload</i>Import
            </a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6">
            <!-- Tables -->
            <div id="confirmationTable" class="hide">
                @include('pages.certificates.form_and_table.confirmation.confirmation_table')
            </div>
            <div id="marriageTable" class="hide">
                @include('pages.certificates.form_and_table.mariage.mariage_table')
            </div>
            <div id="birthTable" class="hide">
                @include('pages.certificates.form_and_table.birth.birth_table')
            </div>
            <div id="deathTable" class="hide">
                @include('pages.certificates.form_and_table.death.death_table')
            </div>
        </div>

        <div class="col s12 m6">
            <!-- Forms -->
            <div id="confirmationForm" class="hide">
                <!-- Single Add Form -->
                <div class="singleConfirmation hide">
                    @include('pages.certificates.form_and_table.confirmation.confirmation_form')
                </div>
                <!-- Multiple Add Form -->
                <div class="groupConfirmation hide">
                    @include('pages.certificates.form_and_table.confirmation.confirmation_form_group')
                </div>
            </div>
            <div id="marriageForm" class="hide">
                <!-- Single Add Form -->
                <div class="singleMarriage hide">
                    @include('pages.certificates.form_and_table.mariage.mariage_form')
                </div>
                <!-- Multiple Add Form -->
                <div class="groupMarriage hide">
                    @include('pages.certificates.form_and_table.mariage.mariage_form_group')
                </div>
            </div>
            <div id="birthForm" class="hide">
                <!-- Single Add Form -->
                <div class="singleBirth hide">
                    @include('pages.certificates.form_and_table.birth.birth_form')
                </div>
                <!-- Multiple Add Form -->
                <div class="groupBirth hide">
                    @include('pages.certificates.form_and_table.birth.birth_form_group')
                </div>
            </div>
            <div id="deathForm" class="hide">
                <!-- Single Add Form -->
                <div class="singleDeath hide">
                    @include('pages.certificates.form_and_table.death.death_form')
                </div>
                <!-- Multiple Add Form -->
                <div class="groupDeath hide">
                    @include('pages.certificates.form_and_table.death.death_form_group')
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/js/certificates.js')}}"></script>
@endsection
