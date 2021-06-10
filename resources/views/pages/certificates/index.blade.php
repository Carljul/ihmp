@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <br>
    <div class="row" style="margin-bottom: 0px !important;">
        <div class="col s12 m6">
            <div class="row" style="margin-bottom: 0px !important;">
                <h5 class="col s12 m3 left">Transactions</h5>
                <div class="input-field col s12 m4">
                    <select id="selectCertificate">
                        <option value="" disabled>Choose Record</option>
                        <option value="confirmation" selected>Confirmation Record</option>
                        <option value="mariage">Mariage Record</option>
                        <option value="birth">Birth Record</option>
                        <option value="death">Death Record</option>
                    </select>
                    <label>Choose Record</label>
                </div>
                <div class="input-field col s12 m4">
                    <input type="search">
                    <label>Search a record</label>
                </div>
                <div class="col s12 m1">
                    <a class="tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Show more filter" href="#importExport">
                        <i class="material-icons" id="showFilter" style="margin-top: 25px;">filter_list</i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="input-field col s4">
                <select id="selectForm">
                    <option value="" disabled>Choose your option to Add</option>
                    <option value="individual" selected>Add individually</option>
                    <option value="group">Add per batch</option>
                </select>
                <label>Choose your option to Add</label>
            </div>
            <!-- Modal Trigger -->
            <a class="waves-effect waves-light btn modal-trigger right" href="#importExport">
                <i class="material-icons left">import_export</i>Import/Export
            </a>
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


<script>
    $(document).ready(function(){
        $(".certificate").addClass('active');
        $(".priest").removeClass('active');
        isTokenExist();
        setFormSelection();
        setPriestDropdown();


        function setFormSelection(){            
            resetClass();
            var selectionFormVal = localStorage.getItem('defaultForm');
            var selectionTableVal = localStorage.getItem('defaultTable');

            if(selectionTableVal == "confirmation"){
                /// Fixing table display
                $('#confirmationTable').removeClass('hide');

                /// Fixing dropdown selction for records
                $("#selectCertificate option:selected").removeAttr('selected');
                $("#selectCertificate option[value='confirmation']").prop('selected', true);

                /// Fixing form display by filter of records
                $('#confirmationForm').removeClass('hide');

                /// Fixing form display by filter of option to add 
                if(selectionFormVal == 'individual'){
                    $("#selectForm option:selected").removeAttr('selected');
                    $("#selectForm option[value='individual']").prop('selected', true);
                    $(".singleConfirmation").removeClass('hide');
                }else{
                    $("#selectForm option:selected").removeAttr('selected');
                    $("#selectForm option[value='group']").prop('selected', true);
                    $(".groupConfirmation").removeClass('hide');
                }
            }else if(selectionTableVal == "mariage"){
                /// Fixing table display
                $('#marriageTable').removeClass('hide');

                /// Fixing dropdown selction for records
                $("#selectCertificate option:selected").removeAttr('selected');
                $("#selectCertificate option[value='mariage']").prop('selected', true);

                /// Fixing form display by filter of records
                $('#marriageForm').removeClass('hide');

                /// Fixing form display by filter of option to add 
                if(selectionFormVal == 'individual'){
                    $("#selectForm option:selected").removeAttr('selected');
                    $("#selectForm option[value='individual']").prop('selected', true);
                    $(".singleMarriage").removeClass('hide');
                }else{
                    $("#selectForm option:selected").removeAttr('selected');
                    $("#selectForm option[value='group']").prop('selected', true);
                    $(".groupMarriage").removeClass('hide');
                }
            }else if(selectionTableVal == "birth"){
                /// Fixing table display
                $('#birthTable').removeClass('hide');

                /// Fixing dropdown selction for records
                $("#selectCertificate option:selected").removeAttr('selected');
                $("#selectCertificate option[value='birth']").prop('selected', true);

                /// Fixing form display by filter of records
                $('#birthForm').removeClass('hide');

                /// Fixing form display by filter of option to add 
                if(selectionFormVal == 'individual'){
                    $("#selectForm option:selected").removeAttr('selected');
                    $("#selectForm option[value='individual']").prop('selected', true);
                    $(".singleBirth").removeClass('hide');
                }else{
                    $("#selectForm option:selected").removeAttr('selected');
                    $("#selectForm option[value='group']").prop('selected', true);
                    $(".groupBirth").removeClass('hide');
                }
            }else if(selectionTableVal == "death"){
                /// Fixing table display
                $('#deathTable').removeClass('hide');

                /// Fixing dropdown selction for records
                $("#selectCertificate option:selected").removeAttr('selected');
                $("#selectCertificate option[value='death']").prop('selected', true);

                /// Fixing form display by filter of records
                $('#deathForm').removeClass('hide');

                /// Fixing form display by filter of option to add 
                if(selectionFormVal == 'individual'){
                    $("#selectForm option:selected").removeAttr('selected');
                    $("#selectForm option[value='individual']").prop('selected', true);
                    $(".singleDeath").removeClass('hide');
                }else{
                    $("#selectForm option:selected").removeAttr('selected');
                    $("#selectForm option[value='group']").prop('selected', true);
                    $(".groupDeath").removeClass('hide');
                }
            }
        }

        function resetClass(){
            /// Removing hide class to all tables
            $('#confirmationTable').removeClass('hide');
            $('#marriageTable').removeClass('hide');
            $('#birthTable').removeClass('hide');
            $('#deathTable').removeClass('hide');
            /// Adding hide class to all tables
            $('#confirmationTable').addClass('hide');
            $('#marriageTable').addClass('hide');
            $('#birthTable').addClass('hide');
            $('#deathTable').addClass('hide');

            /// Removing hide class to all forms
            $('#deathForm').removeClass('hide');
            $('#birthForm').removeClass('hide');
            $('#marriageForm').removeClass('hide');
            $('#confirmationForm').removeClass('hide');
            /// Adding hide class to all forms
            $('#deathForm').addClass('hide');
            $('#birthForm').addClass('hide');
            $('#marriageForm').addClass('hide');
            $('#confirmationForm').addClass('hide');


            ///Removing hide class to all individual and by group
            $('.singleConfirmation').removeClass('hide');
            $('.groupConfirmation').removeClass('hide');
            $('.singleMarriage').removeClass('hide');
            $('.groupMarriage').removeClass('hide');
            $('.singleBirth').removeClass('hide');
            $('.groupBirth').removeClass('hide');
            $('.singleDeath').removeClass('hide');
            $('.groupDeath').removeClass('hide');
            ///Adding hide class to all individual and by group
            $('.singleConfirmation').addClass('hide');
            $('.groupConfirmation').addClass('hide');
            $('.singleMarriage').addClass('hide');
            $('.groupMarriage').addClass('hide');
            $('.singleBirth').addClass('hide');
            $('.groupBirth').addClass('hide');
            $('.singleDeath').addClass('hide');
            $('.groupDeath').addClass('hide');
        }

        function setPriestDropdown(){
            isTokenExist();
            var AT = localStorage.getItem("AT");
            checkTokenValidity(AT);

            $.ajax({
                type: 'GET',
                url: priest_endpoint,
                success: function(response){
                    var html = "";
                    var priestObject = response.data;
                    $(".priest_select_dropdown").html('');
                    html += "<option value='' disabled selected>Select Parish Priest</option>";
                    for(var x = 0; x < priestObject.length; x++){
                        var trimed_middle_name = priestObject[x]['middlename'].charAt(0)+".";
                        var trimed_prefix = priestObject[x]['prefix'].substring(0,3)+".";
                        html += "<option value='"+priestObject[x]['id']+"'>"+trimed_prefix+" "+priestObject[x]['firstname']+" "+trimed_middle_name+" "+priestObject[x]['lastname']+"</option>";
                    }
                    html += "<option value='special'>Add Parish Priest</option>";
                    $(".priest_select_dropdown").html(html);
                    $('.priest_select_dropdown').material_select();
                },error: function(e){
                    $('#modalSysError').modal('open');
                }
            });
        }

        $("#selectForm").on('change', function(){
            var selectedOption = $(this).val();
            localStorage.setItem('defaultForm',selectedOption);
            setFormSelection();
        });
        $("#selectCertificate").on('change', function(){
            var selectedOption = $(this).val();
            localStorage.setItem('defaultTable',selectedOption);
            setFormSelection();
        });

        $(".priest_select_dropdown").on('change', function(e){
            e.preventDefault();
            var selectedOption = $(this).val();
            if(selectedOption == 'special'){
                $('.priest_select_dropdown').val('');
                $("#addPriestModalForm").modal('open');
            }
        });
    });
</script>
@endsection