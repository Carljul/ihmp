@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <br>
    <div class="row" style="margin-bottom: 0px !important;">
        <div class="col s12 m6">
            <div class="row" style="margin-bottom: 0px !important;">
                <h4 class="col s4 left">Transactions</h4>
                <div class="input-field col s4">
                    <select id="selectCertificate">
                        <option value="" disabled>Choose Record</option>
                        <option value="confirmation" selected>Confirmation Certificate</option>
                        <option value="mariage">Mariage Certificate</option>
                        <option value="birth">Birth Certificate</option>
                        <option value="death">Death Certificate</option>
                    </select>
                    <label>Choose Record</label>
                </div>
                <div class="input-field col s4">
                    <input type="search">
                    <label>Search a record</label>
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
            <!-- Tables -->
            <div id="confirmationTable">
            </div>
            <div id="marriageTable">
            </div>
            <div id="birthTable">
            </div>
            <div id="deathTable">
            </div>
        </div>

        <div class="col s12 m6">
            <!-- Forms -->
            <div id="confirmationForm">
                <!-- Single Add Form -->
                <div class="singleConfirmation">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12">
                                    <h5>Add Confirmation</h5>
                                </div>
                            </div>
                            <div class="row">
                                <form class="col s12" id="priest_form" autocomplete="off">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="hidden" value="0" id="is_deleted" name="is_deleted">
                                            <input type="hidden" value="0" id="is_update" name="is_update">
                                            <input type="hidden" value="0" id="pid" name="pid">
                                            <input id="prefix" type="text" class="validate" name="prefix">
                                            <label for="prefix">Clergy Title</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="firstname" type="text" class="validate" name="firstname">
                                            <label for="firstname">First Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="middlename" type="text" class="validate" name="middlename">
                                            <label for="middlename">Middle Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="lastname" type="text" class="validate" name="lastname">
                                            <label for="lastname">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <input class="btn btn-wave" id="btnSavePriest" type="submit" value="Save">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Multiple Add Form -->
                <div class="groupConfirmation hide">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12">
                                    <h5>Add Confirmation by Group</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12" style="overflow-x: scroll;">
                                    <table style="width: 200%;">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>First Name</th>
                                                <th>First Name</th>
                                                <th>First Name</th>
                                                <th>First Name</th>
                                                <th>First Name</th>
                                                <th>First Name</th>
                                                <th>First Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                                <td><input type="text" placeholder="firstname" id="confirmationId1"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <button class="btn btn-wave" id="saveConfirmation">Save Confirmation</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="marriageForm">
                <!-- Single Add Form -->
                
                <!-- Multiple Add Form -->
            </div>
            <div id="birthForm">
                <!-- Single Add Form -->
                
                <!-- Multiple Add Form -->
            </div>
            <div id="deathForm">
                <!-- Single Add Form -->
                
                <!-- Multiple Add Form -->
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $(".certificate").addClass('active');
        $(".priest").removeClass('active');
        setFormSelection();
        function setFormSelection(){
            var selectionVal = localStorage.getItem('defaultForm');
            if(selectionVal == 'individual'){
                $("#selectForm option:selected").removeAttr('selected');
                $("#selectForm option[value='individual']").attr('selected');
                $("#singleConfirmation").removeClass('hide');
                $("#groupConfirmation").addClass('hide');
            }else{
                $("#selectForm option:selected").removeAttr('selected');
                $("#selectForm option[value='group']").attr('selected');
                $("#singleConfirmation").addClass('hide');
                $("#groupConfirmation").removeClass('hide');
            }
        }

        $("#selectForm").on('change', function(){
            var selectedVal = $(this).val();
            console.log('selectedVal:: '+selectedVal);
            if(selectedVal == 'individual'){
                $(".singleConfirmation").removeClass('hide');
                $(".groupConfirmation").addClass('hide');
            }else{
                console.log('Test 2');
                $(".singleConfirmation").addClass('hide');
                $(".groupConfirmation").removeClass('hide');
            }
        });
    });
</script>
@endsection