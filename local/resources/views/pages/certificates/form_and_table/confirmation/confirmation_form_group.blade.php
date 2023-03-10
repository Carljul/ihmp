<div class="card">
    <div class="card-content">
        <div class="row">
            <div class="col s12 m6">
                <h5 class="left">Add Confirmation by Group</h5>
            </div>
            <div class="col s12 m6">
                <div class="right">
                    <div class="spaces">
                        @include('preloader.index')
                    </div>
                    <h6 class="right green-text hide" id="labelValidRecord">Saving 10 valid records</h6><br>
                    <h6 class="right red-text hide" id="labelInvalidRecord">6 records invalid</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 fix_height_form" style="overflow-x: scroll;">
                <table class="confirmation_group_form">
                    <thead>
                        <tr>
                            <th colspan="3">Record of</th>
                            <th colspan="3">Fathers' Name</th>
                            <th colspan="3">Mothers' Name</th>
                            <th colspan="2">Confirmation Dates</th>
                            <th>Confirmation By</th>
                            <th>First Sponsor</th>
                            <th>Second Sponsor</th>
                            <th colspan="3">Registration Book Detail</th>
                            <th>Parish Priest</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- 1 -->
                        <tr class="custom_card">
                            <!-- Record of -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_first_name_1" type="text" class="validate" name="confirmation_first_name_1">
                                    <label for="confirmation_first_name_1">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_middle_name_1" type="text" class="validate" name="confirmation_middle_name_1">
                                    <label for="confirmation_middle_name_1">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_last_name_1" type="text" class="validate" name="confirmation_last_name_1">
                                    <label for="confirmation_last_name_1">Last Name</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_first_name_1" type="text" class="validate" name="confirmation_father_first_name_1">
                                    <label for="confirmation_father_first_name_1">Fathers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_middle_name_1" type="text" class="validate" name="confirmation_father_middle_name_1">
                                    <label for="confirmation_father_middle_name_1">Fathers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_last_name_1" type="text" class="validate" name="confirmation_father_last_name_1">
                                    <label for="confirmation_father_last_name_1">Fathers Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_first_name_1" type="text" class="validate" name="confirmation_mother_first_name_1">
                                    <label for="confirmation_mother_first_name_1">Mothers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_middle_name_1" type="text" class="validate" name="confirmation_mother_middle_name_1">
                                    <label for="confirmation_mother_middle_name_1">Mothers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_last_name_1" type="text" class="validate" name="confirmation_mother_last_name_1">
                                    <label for="confirmation_mother_last_name_1">Mothers Last Name</label>
                                </div>
                            </td>
                            <!-- Confirmation Dates -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_confirmation_date_1" type="text" class="datepicker" name="confirmation_confirmation_date_1">
                                    <label for="confirmation_confirmation_date_1">Confirmation Date</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_date_issued_1" type="text" class="datepicker" name="confirmation_date_issued_1">
                                    <label for="confirmation_date_issued_1">Date Issued</label>
                                </div>
                            </td>
                            <!-- Confirmation By -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_by_1" type="text" class="validate" name="confirmation_by_1">
                                    <label for="confirmation_by_1">Confirmation By</label>
                                </div>
                            </td>
                            <!-- 1st Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_fsponsor_first_name_1" type="text" class="validate" name="confirmation_fsponsor_first_name_1">
                                    <label for="confirmation_fsponsor_first_name_1">1st Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Second Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_ssponsor_first_name_1" type="text" class="validate" name="confirmation_ssponsor_first_name_1">
                                    <label for="confirmation_ssponsor_first_name_1">2nd Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Registration Book Detail -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_register_book_1" type="text" class="validate" name="confirmation_register_book_1">
                                    <label for="confirmation_register_book_1">Register Book</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_page_1" type="text" class="validate" name="confirmation_book_page_1">
                                    <label for="confirmation_book_page_1">Book Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_number_1" type="text" class="validate" name="confirmation_book_number_1">
                                    <label for="confirmation_book_number_1">Number</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <select id="confirmation_parish_priest_1" class="priest_select_dropdown">
                                        <option value="" disabled selected>Select Parish Priest</option>
                                        <option value="special">Add Parish Priest</option>
                                    </select>
                                    <label>Select Parish Priest</label>
                                </div>
                            </td>
                        </tr>

                        <!-- 2 -->
                        <tr class="custom_card">
                            <!-- Record of -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_first_name_2" type="text" class="validate" name="confirmation_first_name_2">
                                    <label for="confirmation_first_name_2">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_middle_name_2" type="text" class="validate" name="confirmation_middle_name_2">
                                    <label for="confirmation_middle_name_2">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_last_name_2" type="text" class="validate" name="confirmation_last_name_2">
                                    <label for="confirmation_last_name_2">Last Name</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_first_name_2" type="text" class="validate" name="confirmation_father_first_name_2">
                                    <label for="confirmation_father_first_name_2">Fathers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_middle_name_2" type="text" class="validate" name="confirmation_father_middle_name_2">
                                    <label for="confirmation_father_middle_name_2">Fathers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_last_name_2" type="text" class="validate" name="confirmation_father_last_name_2">
                                    <label for="confirmation_father_last_name_2">Fathers Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_first_name_2" type="text" class="validate" name="confirmation_mother_first_name_2">
                                    <label for="confirmation_mother_first_name_2">Mothers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_middle_name_2" type="text" class="validate" name="confirmation_mother_middle_name_2">
                                    <label for="confirmation_mother_middle_name_2">Mothers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_last_name_2" type="text" class="validate" name="confirmation_mother_last_name_2">
                                    <label for="confirmation_mother_last_name_2">Mothers Last Name</label>
                                </div>
                            </td>
                            <!-- Confirmation Dates -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_confirmation_date_2" type="text" class="datepicker" name="confirmation_confirmation_date_2">
                                    <label for="confirmation_confirmation_date_2">Confirmation Date</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_date_issued_2" type="text" class="datepicker" name="confirmation_date_issued_2">
                                    <label for="confirmation_date_issued_2">Date Issued</label>
                                </div>
                            </td>
                            <!-- Confirmation By -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_by_2" type="text" class="validate" name="confirmation_by_2">
                                    <label for="confirmation_by_2">Confirmation By</label>
                                </div>
                            </td>
                            <!-- 1st Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_fsponsor_first_name_2" type="text" class="validate" name="confirmation_fsponsor_first_name_2">
                                    <label for="confirmation_fsponsor_first_name_2">1st Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Second Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_ssponsor_first_name_2" type="text" class="validate" name="confirmation_ssponsor_first_name_2">
                                    <label for="confirmation_ssponsor_first_name_2">2nd Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Registration Book Detail -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_register_book_2" type="text" class="validate" name="confirmation_register_book_2">
                                    <label for="confirmation_register_book_2">Register Book</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_page_2" type="text" class="validate" name="confirmation_book_page_2">
                                    <label for="confirmation_book_page_2">Book Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_number_2" type="text" class="validate" name="confirmation_book_number_2">
                                    <label for="confirmation_book_number_2">Number</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <select id="confirmation_parish_priest_2" class="priest_select_dropdown">
                                        <option value="" disabled selected>Select Parish Priest</option>
                                        <option value="special">Add Parish Priest</option>
                                    </select>
                                    <label>Select Parish Priest</label>
                                </div>
                            </td>
                        </tr>

                        <!-- 3 -->
                        <tr class="custom_card">
                            <!-- Record of -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_first_name_3" type="text" class="validate" name="confirmation_first_name_3">
                                    <label for="confirmation_first_name_3">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_middle_name_3" type="text" class="validate" name="confirmation_middle_name_3">
                                    <label for="confirmation_middle_name_3">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_last_name_3" type="text" class="validate" name="confirmation_last_name_3">
                                    <label for="confirmation_last_name_3">Last Name</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_first_name_3" type="text" class="validate" name="confirmation_father_first_name_3">
                                    <label for="confirmation_father_first_name_3">Fathers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_middle_name_3" type="text" class="validate" name="confirmation_father_middle_name_3">
                                    <label for="confirmation_father_middle_name_3">Fathers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_last_name_3" type="text" class="validate" name="confirmation_father_last_name_3">
                                    <label for="confirmation_father_last_name_3">Fathers Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_first_name_3" type="text" class="validate" name="confirmation_mother_first_name_3">
                                    <label for="confirmation_mother_first_name_3">Mothers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_middle_name_3" type="text" class="validate" name="confirmation_mother_middle_name_3">
                                    <label for="confirmation_mother_middle_name_3">Mothers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_last_name_3" type="text" class="validate" name="confirmation_mother_last_name_3">
                                    <label for="confirmation_mother_last_name_3">Mothers Last Name</label>
                                </div>
                            </td>
                            <!-- Confirmation Dates -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_confirmation_date_3" type="text" class="datepicker" name="confirmation_confirmation_date_3">
                                    <label for="confirmation_confirmation_date_3">Confirmation Date</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_date_issued_3" type="text" class="datepicker" name="confirmation_date_issued_3">
                                    <label for="confirmation_date_issued_3">Date Issued</label>
                                </div>
                            </td>
                            <!-- Confirmation By -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_by_3" type="text" class="validate" name="confirmation_by_3">
                                    <label for="confirmation_by_3">Confirmation By</label>
                                </div>
                            </td>
                            <!-- 1st Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_fsponsor_first_name_3" type="text" class="validate" name="confirmation_fsponsor_first_name_3">
                                    <label for="confirmation_fsponsor_first_name_3">1st Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Second Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_ssponsor_first_name_3" type="text" class="validate" name="confirmation_ssponsor_first_name_3">
                                    <label for="confirmation_ssponsor_first_name_3">2nd Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Registration Book Detail -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_register_book_3" type="text" class="validate" name="confirmation_register_book_3">
                                    <label for="confirmation_register_book_3">Register Book</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_page_3" type="text" class="validate" name="confirmation_book_page_3">
                                    <label for="confirmation_book_page_3">Book Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_number_3" type="text" class="validate" name="confirmation_book_number_3">
                                    <label for="confirmation_book_number_3">Number</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <select id="confirmation_parish_priest_3" class="priest_select_dropdown">
                                        <option value="" disabled selected>Select Parish Priest</option>
                                        <option value="special">Add Parish Priest</option>
                                    </select>
                                    <label>Select Parish Priest</label>
                                </div>
                            </td>
                        </tr>

                        <!-- 4 -->
                        <tr class="custom_card">
                            <!-- Record of -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_first_name_4" type="text" class="validate" name="confirmation_first_name_4">
                                    <label for="confirmation_first_name_4">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_middle_name_4" type="text" class="validate" name="confirmation_middle_name_4">
                                    <label for="confirmation_middle_name_4">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_last_name_4" type="text" class="validate" name="confirmation_last_name_4">
                                    <label for="confirmation_last_name_4">Last Name</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_first_name_4" type="text" class="validate" name="confirmation_father_first_name_4">
                                    <label for="confirmation_father_first_name_4">Fathers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_middle_name_4" type="text" class="validate" name="confirmation_father_middle_name_4">
                                    <label for="confirmation_father_middle_name_4">Fathers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_last_name_4" type="text" class="validate" name="confirmation_father_last_name_4">
                                    <label for="confirmation_father_last_name_4">Fathers Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_first_name_4" type="text" class="validate" name="confirmation_mother_first_name_4">
                                    <label for="confirmation_mother_first_name_4">Mothers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_middle_name_4" type="text" class="validate" name="confirmation_mother_middle_name_4">
                                    <label for="confirmation_mother_middle_name_4">Mothers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_last_name_4" type="text" class="validate" name="confirmation_mother_last_name_4">
                                    <label for="confirmation_mother_last_name_4">Mothers Last Name</label>
                                </div>
                            </td>
                            <!-- Confirmation Dates -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_confirmation_date_4" type="text" class="datepicker" name="confirmation_confirmation_date_4">
                                    <label for="confirmation_confirmation_date_4">Confirmation Date</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_date_issued_4" type="text" class="datepicker" name="confirmation_date_issued_4">
                                    <label for="confirmation_date_issued_4">Date Issued</label>
                                </div>
                            </td>
                            <!-- Confirmation By -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_by_4" type="text" class="validate" name="confirmation_by_4">
                                    <label for="confirmation_by_4">Confirmation By</label>
                                </div>
                            </td>
                            <!-- 1st Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_fsponsor_first_name_4" type="text" class="validate" name="confirmation_fsponsor_first_name_4">
                                    <label for="confirmation_fsponsor_first_name_4">1st Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Second Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_ssponsor_first_name_4" type="text" class="validate" name="confirmation_ssponsor_first_name_4">
                                    <label for="confirmation_ssponsor_first_name_4">2nd Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Registration Book Detail -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_register_book_4" type="text" class="validate" name="confirmation_register_book_4">
                                    <label for="confirmation_register_book_4">Register Book</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_page_4" type="text" class="validate" name="confirmation_book_page_4">
                                    <label for="confirmation_book_page_4">Book Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_number_4" type="text" class="validate" name="confirmation_book_number_4">
                                    <label for="confirmation_book_number_4">Number</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <select id="confirmation_parish_priest_4" class="priest_select_dropdown">
                                        <option value="" disabled selected>Select Parish Priest</option>
                                        <option value="special">Add Parish Priest</option>
                                    </select>
                                    <label>Select Parish Priest</label>
                                </div>
                            </td>
                        </tr>

                        <!-- 5 -->
                        <tr class="custom_card">
                            <!-- Record of -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_first_name_5" type="text" class="validate" name="confirmation_first_name_5">
                                    <label for="confirmation_first_name_5">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_middle_name_5" type="text" class="validate" name="confirmation_middle_name_5">
                                    <label for="confirmation_middle_name_5">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_last_name_5" type="text" class="validate" name="confirmation_last_name_5">
                                    <label for="confirmation_last_name_5">Last Name</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_first_name_5" type="text" class="validate" name="confirmation_father_first_name_5">
                                    <label for="confirmation_father_first_name_5">Fathers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_middle_name_5" type="text" class="validate" name="confirmation_father_middle_name_5">
                                    <label for="confirmation_father_middle_name_5">Fathers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_last_name_5" type="text" class="validate" name="confirmation_father_last_name_5">
                                    <label for="confirmation_father_last_name_5">Fathers Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_first_name_5" type="text" class="validate" name="confirmation_mother_first_name_5">
                                    <label for="confirmation_mother_first_name_5">Mothers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_middle_name_5" type="text" class="validate" name="confirmation_mother_middle_name_5">
                                    <label for="confirmation_mother_middle_name_5">Mothers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_last_name_5" type="text" class="validate" name="confirmation_mother_last_name_5">
                                    <label for="confirmation_mother_last_name_5">Mothers Last Name</label>
                                </div>
                            </td>
                            <!-- Confirmation Dates -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_confirmation_date_5" type="text" class="datepicker" name="confirmation_confirmation_date_5">
                                    <label for="confirmation_confirmation_date_5">Confirmation Date</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_date_issued_5" type="text" class="datepicker" name="confirmation_date_issued_5">
                                    <label for="confirmation_date_issued_5">Date Issued</label>
                                </div>
                            </td>
                            <!-- Confirmation By -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_by_5" type="text" class="validate" name="confirmation_by_5">
                                    <label for="confirmation_by_5">Confirmation By</label>
                                </div>
                            </td>
                            <!-- 1st Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_fsponsor_first_name_5" type="text" class="validate" name="confirmation_fsponsor_first_name_5">
                                    <label for="confirmation_fsponsor_first_name_5">1st Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Second Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_ssponsor_first_name_5" type="text" class="validate" name="confirmation_ssponsor_first_name_5">
                                    <label for="confirmation_ssponsor_first_name_5">2nd Sponsor First Name</label>
                                </div>
                            </td>
                            <!-- Registration Book Detail -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_register_book_5" type="text" class="validate" name="confirmation_register_book_5">
                                    <label for="confirmation_register_book_5">Register Book</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_page_5" type="text" class="validate" name="confirmation_book_page_5">
                                    <label for="confirmation_book_page_5">Book Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_number_5" type="text" class="validate" name="confirmation_book_number_5">
                                    <label for="confirmation_book_number_5">Number</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <select id="confirmation_parish_priest_5" class="priest_select_dropdown">
                                        <option value="" disabled selected>Select Parish Priest</option>
                                        <option value="special">Add Parish Priest</option>
                                    </select>
                                    <label>Select Parish Priest</label>
                                </div>
                            </td>
                        </tr>

                        <!-- 6 -->
                        <tr class="custom_card">
                            <!-- Record of -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_first_name_6" type="text" class="validate" name="confirmation_first_name_6">
                                    <label for="confirmation_first_name_6">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_middle_name_5" type="text" class="validate" name="confirmation_middle_name_5">
                                    <label for="confirmation_middle_name_5">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_last_name_6" type="text" class="validate" name="confirmation_last_name_6">
                                    <label for="confirmation_last_name_6">Last Name</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_first_name_6" type="text" class="validate" name="confirmation_father_first_name_6">
                                    <label for="confirmation_father_first_name_6">Fathers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_middle_name_6" type="text" class="validate" name="confirmation_father_middle_name_6">
                                    <label for="confirmation_father_middle_name_6">Fathers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_last_name_6" type="text" class="validate" name="confirmation_father_last_name_6">
                                    <label for="confirmation_father_last_name_6">Fathers Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_first_name_6" type="text" class="validate" name="confirmation_mother_first_name_6">
                                    <label for="confirmation_mother_first_name_6">Mothers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_middle_name_6" type="text" class="validate" name="confirmation_mother_middle_name_6">
                                    <label for="confirmation_mother_middle_name_6">Mothers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_last_name_6" type="text" class="validate" name="confirmation_mother_last_name_6">
                                    <label for="confirmation_mother_last_name_6">Mothers Last Name</label>
                                </div>
                            </td>
                            <!-- Confirmation Dates -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_confirmation_date_6" type="text" class="datepicker" name="confirmation_confirmation_date_6">
                                    <label for="confirmation_confirmation_date_6">Confirmation Date</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_date_issued_6" type="text" class="datepicker" name="confirmation_date_issued_6">
                                    <label for="confirmation_date_issued_6">Date Issued</label>
                                </div>
                            </td>
                            <!-- Confirmation By -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_by_6" type="text" class="validate" name="confirmation_by_6">
                                    <label for="confirmation_by_6">Confirmation By</label>
                                </div>
                            </td>
                            <!-- 1st Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_fsponsor_first_name_6" type="text" class="validate" name="confirmation_fsponsor_first_name_6">
                                    <label for="confirmation_fsponsor_first_name_6">1st Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Second Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_ssponsor_first_name_6" type="text" class="validate" name="confirmation_ssponsor_first_name_6">
                                    <label for="confirmation_ssponsor_first_name_6">2nd Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Registration Book Detail -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_register_book_6" type="text" class="validate" name="confirmation_register_book_6">
                                    <label for="confirmation_register_book_6">Register Book</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_page_6" type="text" class="validate" name="confirmation_book_page_6">
                                    <label for="confirmation_book_page_6">Book Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_number_6" type="text" class="validate" name="confirmation_book_number_6">
                                    <label for="confirmation_book_number_6">Number</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <select id="confirmation_parish_priest_6" class="priest_select_dropdown">
                                        <option value="" disabled selected>Select Parish Priest</option>
                                        <option value="special">Add Parish Priest</option>
                                    </select>
                                    <label>Select Parish Priest</label>
                                </div>
                            </td>
                        </tr>

                        <!-- 7 -->
                        <tr class="custom_card">
                            <!-- Record of -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_first_name_7" type="text" class="validate" name="confirmation_first_name_7">
                                    <label for="confirmation_first_name_7">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_middle_name_7" type="text" class="validate" name="confirmation_middle_name_7">
                                    <label for="confirmation_middle_name_7">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_last_name_7" type="text" class="validate" name="confirmation_last_name_7">
                                    <label for="confirmation_last_name_7">Last Name</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_first_name_7" type="text" class="validate" name="confirmation_father_first_name_7">
                                    <label for="confirmation_father_first_name_7">Fathers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_middle_name_7" type="text" class="validate" name="confirmation_father_middle_name_7">
                                    <label for="confirmation_father_middle_name_7">Fathers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_last_name_7" type="text" class="validate" name="confirmation_father_last_name_7">
                                    <label for="confirmation_father_last_name_7">Fathers Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_first_name_7" type="text" class="validate" name="confirmation_mother_first_name_7">
                                    <label for="confirmation_mother_first_name_7">Mothers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_middle_name_7" type="text" class="validate" name="confirmation_mother_middle_name_7">
                                    <label for="confirmation_mother_middle_name_7">Mothers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_last_name_7" type="text" class="validate" name="confirmation_mother_last_name_7">
                                    <label for="confirmation_mother_last_name_7">Mothers Last Name</label>
                                </div>
                            </td>
                            <!-- Confirmation Dates -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_confirmation_date_7" type="text" class="datepicker" name="confirmation_confirmation_date_7">
                                    <label for="confirmation_confirmation_date_7">Confirmation Date</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_date_issued_7" type="text" class="datepicker" name="confirmation_date_issued_7">
                                    <label for="confirmation_date_issued_7">Date Issued</label>
                                </div>
                            </td>
                            <!-- Confirmation By -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_by_7" type="text" class="validate" name="confirmation_by_7">
                                    <label for="confirmation_by_7">Confirmation By</label>
                                </div>
                            </td>
                            <!-- 1st Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_fsponsor_first_name_7" type="text" class="validate" name="confirmation_fsponsor_first_name_7">
                                    <label for="confirmation_fsponsor_first_name_7">1st Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Second Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_ssponsor_first_name_7" type="text" class="validate" name="confirmation_ssponsor_first_name_7">
                                    <label for="confirmation_ssponsor_first_name_7">2nd Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Registration Book Detail -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_register_book_7" type="text" class="validate" name="confirmation_register_book_7">
                                    <label for="confirmation_register_book_7">Register Book</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_page_7" type="text" class="validate" name="confirmation_book_page_7">
                                    <label for="confirmation_book_page_7">Book Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_number_7" type="text" class="validate" name="confirmation_book_number_7">
                                    <label for="confirmation_book_number_7">Number</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <select id="confirmation_parish_priest_7" class="priest_select_dropdown">
                                        <option value="" disabled selected>Select Parish Priest</option>
                                        <option value="special">Add Parish Priest</option>
                                    </select>
                                    <label>Select Parish Priest</label>
                                </div>
                            </td>
                        </tr>

                        <!-- 8 -->
                        <tr class="custom_card">
                            <!-- Record of -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_first_name_8" type="text" class="validate" name="confirmation_first_name_8">
                                    <label for="confirmation_first_name_8">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_middle_name_8" type="text" class="validate" name="confirmation_middle_name_8">
                                    <label for="confirmation_middle_name_8">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_last_name_8" type="text" class="validate" name="confirmation_last_name_8">
                                    <label for="confirmation_last_name_8">Last Name</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_first_name_8" type="text" class="validate" name="confirmation_father_first_name_8">
                                    <label for="confirmation_father_first_name_8">Fathers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_middle_name_8" type="text" class="validate" name="confirmation_father_middle_name_8">
                                    <label for="confirmation_father_middle_name_8">Fathers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_last_name_8" type="text" class="validate" name="confirmation_father_last_name_8">
                                    <label for="confirmation_father_last_name_8">Fathers Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_first_name_8" type="text" class="validate" name="confirmation_mother_first_name_8">
                                    <label for="confirmation_mother_first_name_8">Mothers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_middle_name_8" type="text" class="validate" name="confirmation_mother_middle_name_8">
                                    <label for="confirmation_mother_middle_name_8">Mothers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_last_name_8" type="text" class="validate" name="confirmation_mother_last_name_8">
                                    <label for="confirmation_mother_last_name_8">Mothers Last Name</label>
                                </div>
                            </td>
                            <!-- Confirmation Dates -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_confirmation_date_8" type="text" class="datepicker" name="confirmation_confirmation_date_8">
                                    <label for="confirmation_confirmation_date_8">Confirmation Date</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_date_issued_8" type="text" class="datepicker" name="confirmation_date_issued_8">
                                    <label for="confirmation_date_issued_8">Date Issued</label>
                                </div>
                            </td>
                            <!-- Confirmation By -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_by_8" type="text" class="validate" name="confirmation_by_8">
                                    <label for="confirmation_by_8">Confirmation By</label>
                                </div>
                            </td>
                            <!-- 1st Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_fsponsor_first_name_8" type="text" class="validate" name="confirmation_fsponsor_first_name_8">
                                    <label for="confirmation_fsponsor_first_name_8">1st Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Second Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_ssponsor_first_name_8" type="text" class="validate" name="confirmation_ssponsor_first_name_8">
                                    <label for="confirmation_ssponsor_first_name_8">2nd Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Registration Book Detail -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_register_book_8" type="text" class="validate" name="confirmation_register_book_8">
                                    <label for="confirmation_register_book_8">Register Book</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_page_8" type="text" class="validate" name="confirmation_book_page_8">
                                    <label for="confirmation_book_page_8">Book Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_number_8" type="text" class="validate" name="confirmation_book_number_8">
                                    <label for="confirmation_book_number_8">Number</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <select id="confirmation_parish_priest_8" class="priest_select_dropdown">
                                        <option value="" disabled selected>Select Parish Priest</option>
                                        <option value="special">Add Parish Priest</option>
                                    </select>
                                    <label>Select Parish Priest</label>
                                </div>
                            </td>
                        </tr>

                        <!-- 9 -->
                        <tr class="custom_card">
                            <!-- Record of -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_first_name_9" type="text" class="validate" name="confirmation_first_name_9">
                                    <label for="confirmation_first_name_9">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_middle_name_9" type="text" class="validate" name="confirmation_middle_name_9">
                                    <label for="confirmation_middle_name_9">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_last_name_9" type="text" class="validate" name="confirmation_last_name_9">
                                    <label for="confirmation_last_name_9">Last Name</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_first_name_9" type="text" class="validate" name="confirmation_father_first_name_9">
                                    <label for="confirmation_father_first_name_9">Fathers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_middle_name_9" type="text" class="validate" name="confirmation_father_middle_name_9">
                                    <label for="confirmation_father_middle_name_9">Fathers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_last_name_9" type="text" class="validate" name="confirmation_father_last_name_9">
                                    <label for="confirmation_father_last_name_9">Fathers Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_first_name_9" type="text" class="validate" name="confirmation_mother_first_name_9">
                                    <label for="confirmation_mother_first_name_9">Mothers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_middle_name_9" type="text" class="validate" name="confirmation_mother_middle_name_9">
                                    <label for="confirmation_mother_middle_name_9">Mothers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_last_name_9" type="text" class="validate" name="confirmation_mother_last_name_9">
                                    <label for="confirmation_mother_last_name_9">Mothers Last Name</label>
                                </div>
                            </td>
                            <!-- Confirmation Dates -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_confirmation_date_9" type="text" class="datepicker" name="confirmation_confirmation_date_9">
                                    <label for="confirmation_confirmation_date_9">Confirmation Date</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_date_issued_9" type="text" class="datepicker" name="confirmation_date_issued_9">
                                    <label for="confirmation_date_issued_9">Date Issued</label>
                                </div>
                            </td>
                            <!-- Confirmation By -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_by_9" type="text" class="validate" name="confirmation_by_9">
                                    <label for="confirmation_by_9">Confirmation By</label>
                                </div>
                            </td>
                            <!-- 1st Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_fsponsor_first_name_9" type="text" class="validate" name="confirmation_fsponsor_first_name_9">
                                    <label for="confirmation_fsponsor_first_name_9">1st Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Second Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_ssponsor_first_name_9" type="text" class="validate" name="confirmation_ssponsor_first_name_9">
                                    <label for="confirmation_ssponsor_first_name_9">2nd Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Registration Book Detail -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_register_book_9" type="text" class="validate" name="confirmation_register_book_9">
                                    <label for="confirmation_register_book_9">Register Book</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_page_9" type="text" class="validate" name="confirmation_book_page_9">
                                    <label for="confirmation_book_page_9">Book Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_number_9" type="text" class="validate" name="confirmation_book_number_9">
                                    <label for="confirmation_book_number_9">Number</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <select id="confirmation_parish_priest_9" class="priest_select_dropdown">
                                        <option value="" disabled selected>Select Parish Priest</option>
                                        <option value="special">Add Parish Priest</option>
                                    </select>
                                    <label>Select Parish Priest</label>
                                </div>
                            </td>
                        </tr>

                        <!-- 10 -->
                        <tr class="custom_card">
                            <!-- Record of -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_first_name_10" type="text" class="validate" name="confirmation_first_name_10">
                                    <label for="confirmation_first_name_10">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_middle_name_10" type="text" class="validate" name="confirmation_middle_name_100">
                                    <label for="confirmation_middle_name_10">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_last_name_10" type="text" class="validate" name="confirmation_last_name_10">
                                    <label for="confirmation_last_name_10">Last Name</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_first_name_10" type="text" class="validate" name="confirmation_father_first_name_10">
                                    <label for="confirmation_father_first_name_10">Fathers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_middle_name_10" type="text" class="validate" name="confirmation_father_middle_name_10">
                                    <label for="confirmation_father_middle_name_10">Fathers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_father_last_name_10" type="text" class="validate" name="confirmation_father_last_name_10">
                                    <label for="confirmation_father_last_name_10">Fathers Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_first_name_10" type="text" class="validate" name="confirmation_mother_first_name_10">
                                    <label for="confirmation_mother_first_name_10">Mothers First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_middle_name_10" type="text" class="validate" name="confirmation_mother_middle_name_10">
                                    <label for="confirmation_mother_middle_name_10">Mothers Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_mother_last_name_10" type="text" class="validate" name="confirmation_mother_last_name_10">
                                    <label for="confirmation_mother_last_name_10">Mothers Last Name</label>
                                </div>
                            </td>
                            <!-- Confirmation Dates -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_confirmation_date_10" type="text" class="datepicker" name="confirmation_confirmation_date_10">
                                    <label for="confirmation_confirmation_date_10">Confirmation Date</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_date_issued_10" type="text" class="datepicker" name="confirmation_date_issued_10">
                                    <label for="confirmation_date_issued_10">Date Issued</label>
                                </div>
                            </td>
                            <!-- Confirmation By -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_by_10" type="text" class="validate" name="confirmation_by_10">
                                    <label for="confirmation_by_10">Confirmation By</label>
                                </div>
                            </td>
                            <!-- 1st Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_fsponsor_first_name_10" type="text" class="validate" name="confirmation_fsponsor_first_name_10">
                                    <label for="confirmation_fsponsor_first_name_10">1st Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Second Sponsor -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_ssponsor_first_name_10" type="text" class="validate" name="confirmation_ssponsor_first_name_10">
                                    <label for="confirmation_ssponsor_first_name_10">2nd Sponsor Name</label>
                                </div>
                            </td>
                            <!-- Registration Book Detail -->
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_register_book_10" type="text" class="validate" name="confirmation_register_book_10">
                                    <label for="confirmation_register_book_10">Register Book</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_page_10" type="text" class="validate" name="confirmation_book_page_10">
                                    <label for="confirmation_book_page_10">Book Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="confirmation_book_number_10" type="text" class="validate" name="confirmation_book_number_10">
                                    <label for="confirmation_book_number_10">Number</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <select id="confirmation_parish_priest_10" class="priest_select_dropdown">
                                        <option value="" disabled selected>Select Parish Priest</option>
                                        <option value="special">Add Parish Priest</option>
                                    </select>
                                    <label>Select Parish Priest</label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <button class="btn btn-wave" id="saveConfirmationByGroup">Save Confirmation</button>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('/js/confirmation_group.js')}}"></script>
