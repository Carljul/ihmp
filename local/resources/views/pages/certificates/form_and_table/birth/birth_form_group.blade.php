<div class="card">
    <div class="card-content">
        <div class="row">
            <div class="col s12 m6">
                <h5 class="left">Add Birth by Group</h5>
            </div>
            <div class="col s12 m6">
                <div class="right">
                    <div class="spaces">
                        @include('preloader.index')
                    </div>
                    <h6 class="right green-text hide" id="labelValidRecordBirth">Saving 10 valid records</h6><br>
                    <h6 class="right red-text hide" id="labelInvalidRecordBirth">6 records invalid</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 fix_height_form" style="overflow-x: scroll;">
                <table class="confirmation_group_form">
                    <thead>
                        <tr>
                            <th colspan="3">Record of</th>
                            <th colspan="2">Born Details</th>
                            <th>Baptism Date</th>
                            <th>Minister</th>
                            <th colspan="3">Fathers Name</th>
                            <th colspan="3">Mothers Name</th>
                            <th>Address</th>
                            <th>Godparents</th>
                            <th colspan="4">Other Details</th>
                            <th>Parish Priest</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- 1 -->
                        <tr class="custom_card">
                            <!-- Record of -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_first_name_1" type="text" class="validate" name="birth_first_name_1">
                                    <label for="birth_first_name_1">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_middle_name_1" type="text" class="validate" name="birth_middle_name_1">
                                    <label for="birth_middle_name_1">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_last_name_1" type="text" class="validate" name="birth_last_name_1">
                                    <label for="birth_last_name_1">Last Name</label>
                                </div>
                            </td>
                            <!-- Born Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_on_1" type="text" class="validate datepicker" name="birth_born_on_1">
                                    <label for="birth_born_on_1">Born on</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_in_1" type="text" class="validate" name="birth_born_in_1">
                                    <label for="birth_born_in_1">Born in</label>
                                </div>
                            </td>
                            <!-- Baptism Date -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptism_date_1" type="text" class="validate datepicker" name="birth_baptism_date_1">
                                    <label for="birth_baptism_date_1">Baptism Date</label>
                                </div>
                            </td>
                            <!-- Minister -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_minister_1" type="text" class="validate" name="birth_minister_1">
                                    <label for="birth_minister_1">Minister</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_first_name_1" type="text" class="validate" name="birth_father_first_name_1">
                                    <label for="birth_father_first_name_1">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_1" type="text" class="validate" name="birth_father_middle_name_1">
                                    <label for="birth_father_middle_name_1">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_last_name_1" type="text" class="validate" name="birth_father_last_name_1">
                                    <label for="birth_father_last_name_1">Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_mothers_first_name_1" type="text" class="validate" name="birth_mothers_first_name_1">
                                    <label for="birth_mothers_first_name_1">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_1" type="text" class="validate" name="birth_father_middle_name_1">
                                    <label for="birth_father_middle_name_1">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_mother_last_name_1" type="text" class="validate" name="birth_mother_last_name_1">
                                    <label for="birth_mother_last_name_1">Last Name</label>
                                </div>
                            </td>
                            <!-- Address -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_resident_of_1" type="text" class="validate" name="birth_resident_of_1">
                                    <label for="birth_resident_of_1">Residents of</label>
                                </div>
                            </td>
                            <!-- GodParents -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_godparents_1" type="text" class="validate" name="birth_godparents_1">
                                    <label for="birth_godparents_1">Godparents</label>
                                </div>
                            </td>
                            <!-- Other Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptismal_register_1" type="text" class="validate" name="birth_baptismal_register_1">
                                    <label for="birth_baptismal_register_1">Baptismal Register</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_volume_1" type="text" class="validate" name="birth_volume_1">
                                    <label for="birth_volume_1">Volume</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_page_1" type="text" class="validate" name="birth_page_1">
                                    <label for="birth_page_1">Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_date_issued_1" type="text" class="validate datepicker" name="birth_date_issued_1">
                                    <label for="birth_date_issued_1">Date Issued</label>
                                </div>
                            </td>
                            <!-- Parish Priest -->
                            <td>
                                <div class="input-field">
                                    <select id="birth_parish_priest_1" class="priest_select_dropdown">
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
                                    <input id="birth_first_name_2" type="text" class="validate" name="birth_first_name_2">
                                    <label for="birth_first_name_2">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_middle_name_2" type="text" class="validate" name="birth_middle_name_2">
                                    <label for="birth_middle_name_2">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_last_name_2" type="text" class="validate" name="birth_last_name_2">
                                    <label for="birth_last_name_2">Last Name</label>
                                </div>
                            </td>
                            <!-- Born Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_on_2" type="text" class="validate datepicker" name="birth_born_on_2">
                                    <label for="birth_born_on_2">Born on</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_in_2" type="text" class="validate" name="birth_born_in_2">
                                    <label for="birth_born_in_2">Born in</label>
                                </div>
                            </td>
                            <!-- Baptism Date -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptism_date_2" type="text" class="validate datepicker" name="birth_baptism_date_2">
                                    <label for="birth_baptism_date_2">Baptism Date</label>
                                </div>
                            </td>
                            <!-- Minister -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_minister_2" type="text" class="validate" name="birth_minister_2">
                                    <label for="birth_minister_2">Minister</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_first_name_2" type="text" class="validate" name="birth_father_first_name_2">
                                    <label for="birth_father_first_name_2">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_2" type="text" class="validate" name="birth_father_middle_name_2">
                                    <label for="birth_father_middle_name_2">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_last_name_2" type="text" class="validate" name="birth_father_last_name_2">
                                    <label for="birth_father_last_name_2">Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_mothers_first_name_2" type="text" class="validate" name="birth_mothers_first_name_2">
                                    <label for="birth_mothers_first_name_2">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_2" type="text" class="validate" name="birth_father_middle_name_2">
                                    <label for="birth_father_middle_name_2">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_mother_last_name_2" type="text" class="validate" name="birth_mother_last_name_2">
                                    <label for="birth_mother_last_name_2">Last Name</label>
                                </div>
                            </td>
                            <!-- Address -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_resident_of_2" type="text" class="validate" name="birth_mother_last_name_2">
                                    <label for="birth_mother_last_name_2">Residents of</label>
                                </div>
                            </td>
                            <!-- GodParents -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_godparents_2" type="text" class="validate" name="birth_godparents_2">
                                    <label for="birth_godparents_2">Godparents</label>
                                </div>
                            </td>
                            <!-- Other Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptismal_register_2" type="text" class="validate" name="birth_baptismal_register_2">
                                    <label for="birth_baptismal_register_2">Baptismal Register</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_volume_2" type="text" class="validate" name="birth_volume_2">
                                    <label for="birth_volume_2">Volume</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_page_2" type="text" class="validate" name="birth_page_2">
                                    <label for="birth_page_2">Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_date_issued_2" type="text" class="validate datepicker" name="birth_date_issued_2">
                                    <label for="birth_date_issued_2">Date Issued</label>
                                </div>
                            </td>
                            <!-- Parish Priest -->
                            <td>
                                <div class="input-field">
                                    <select id="birth_parish_priest_2" class="priest_select_dropdown">
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
                                    <input id="birth_first_name_3" type="text" class="validate" name="birth_first_name_3">
                                    <label for="birth_first_name_3">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_middle_name_3" type="text" class="validate" name="birth_middle_name_3">
                                    <label for="birth_middle_name_3">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_last_name_3" type="text" class="validate" name="birth_last_name_3">
                                    <label for="birth_last_name_3">Last Name</label>
                                </div>
                            </td>
                            <!-- Born Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_on_3" type="text" class="validate datepicker" name="birth_born_on_3">
                                    <label for="birth_born_on_3">Born on</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_in_3" type="text" class="validate" name="birth_born_in_3">
                                    <label for="birth_born_in_3">Born in</label>
                                </div>
                            </td>
                            <!-- Baptism Date -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptism_date_3" type="text" class="validate datepicker" name="birth_baptism_date_3">
                                    <label for="birth_baptism_date_3">Baptism Date</label>
                                </div>
                            </td>
                            <!-- Minister -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_minister_3" type="text" class="validate" name="birth_minister_3">
                                    <label for="birth_minister_3">Minister</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_first_name_3" type="text" class="validate" name="birth_father_first_name_3">
                                    <label for="birth_father_first_name_3">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_3" type="text" class="validate" name="birth_father_middle_name_3">
                                    <label for="birth_father_middle_name_3">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_last_name_3" type="text" class="validate" name="birth_father_last_name_3">
                                    <label for="birth_father_last_name_3">Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_mothers_first_name_3" type="text" class="validate" name="birth_mothers_first_name_3">
                                    <label for="birth_mothers_first_name_3">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_3" type="text" class="validate" name="birth_father_middle_name_3">
                                    <label for="birth_father_middle_name_3">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_mother_last_name_3" type="text" class="validate" name="birth_mother_last_name_3">
                                    <label for="birth_mother_last_name_3">Last Name</label>
                                </div>
                            </td>
                            <!-- Address -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_resident_of_3" type="text" class="validate" name="birth_mother_last_name_3">
                                    <label for="birth_mother_last_name_3">Residents of</label>
                                </div>
                            </td>
                            <!-- GodParents -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_godparents_3" type="text" class="validate" name="birth_godparents_3">
                                    <label for="birth_godparents_3">Godparents</label>
                                </div>
                            </td>
                            <!-- Other Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptismal_register_3" type="text" class="validate" name="birth_baptismal_register_3">
                                    <label for="birth_baptismal_register_3">Baptismal Register</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_volume_3" type="text" class="validate" name="birth_volume_3">
                                    <label for="birth_volume_3">Volume</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_page_3" type="text" class="validate" name="birth_page_3">
                                    <label for="birth_page_3">Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_date_issued_3" type="text" class="validate datepicker" name="birth_date_issued_3">
                                    <label for="birth_date_issued_3">Date Issued</label>
                                </div>
                            </td>
                            <!-- Parish Priest -->
                            <td>
                                <div class="input-field">
                                    <select id="birth_parish_priest_3" class="priest_select_dropdown">
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
                                    <input id="birth_first_name_4" type="text" class="validate" name="birth_first_name_4">
                                    <label for="birth_first_name_4">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_middle_name_4" type="text" class="validate" name="birth_middle_name_4">
                                    <label for="birth_middle_name_4">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_last_name_4" type="text" class="validate" name="birth_last_name_4">
                                    <label for="birth_last_name_4">Last Name</label>
                                </div>
                            </td>
                            <!-- Born Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_on_4" type="text" class="validate datepicker" name="birth_born_on_4">
                                    <label for="birth_born_on_4">Born on</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_in_4" type="text" class="validate" name="birth_born_in_4">
                                    <label for="birth_born_in_4">Born in</label>
                                </div>
                            </td>
                            <!-- Baptism Date -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptism_date_4" type="text" class="validate datepicker" name="birth_baptism_date_4">
                                    <label for="birth_baptism_date_4">Baptism Date</label>
                                </div>
                            </td>
                            <!-- Minister -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_minister_4" type="text" class="validate" name="birth_minister_4">
                                    <label for="birth_minister_4">Minister</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_first_name_4" type="text" class="validate" name="birth_father_first_name_4">
                                    <label for="birth_father_first_name_4">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_4" type="text" class="validate" name="birth_father_middle_name_4">
                                    <label for="birth_father_middle_name_4">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_last_name_4" type="text" class="validate" name="birth_father_last_name_4">
                                    <label for="birth_father_last_name_4">Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_mothers_first_name_4" type="text" class="validate" name="birth_mothers_first_name_4">
                                    <label for="birth_mothers_first_name_4">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_4" type="text" class="validate" name="birth_father_middle_name_4">
                                    <label for="birth_father_middle_name_4">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_mother_last_name_4" type="text" class="validate" name="birth_mother_last_name_4">
                                    <label for="birth_mother_last_name_4">Last Name</label>
                                </div>
                            </td>
                            <!-- Address -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_resident_of_4" type="text" class="validate" name="birth_mother_last_name_4">
                                    <label for="birth_mother_last_name_4">Residents of</label>
                                </div>
                            </td>
                            <!-- GodParents -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_godparents_4" type="text" class="validate" name="birth_godparents_4">
                                    <label for="birth_godparents_4">Godparents</label>
                                </div>
                            </td>
                            <!-- Other Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptismal_register_4" type="text" class="validate" name="birth_baptismal_register_4">
                                    <label for="birth_baptismal_register_4">Baptismal Register</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_volume_4" type="text" class="validate" name="birth_volume_4">
                                    <label for="birth_volume_4">Volume</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_page_4" type="text" class="validate" name="birth_page_4">
                                    <label for="birth_page_4">Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_date_issued_4" type="text" class="validate datepicker" name="birth_date_issued_4">
                                    <label for="birth_date_issued_4">Date Issued</label>
                                </div>
                            </td>
                            <!-- Parish Priest -->
                            <td>
                                <div class="input-field">
                                    <select id="birth_parish_priest_4" class="priest_select_dropdown">
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
                                    <input id="birth_first_name_5" type="text" class="validate" name="birth_first_name_5">
                                    <label for="birth_first_name_5">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_middle_name_5" type="text" class="validate" name="birth_middle_name_5">
                                    <label for="birth_middle_name_5">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_last_name_5" type="text" class="validate" name="birth_last_name_5">
                                    <label for="birth_last_name_5">Last Name</label>
                                </div>
                            </td>
                            <!-- Born Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_on_5" type="text" class="validate datepicker" name="birth_born_on_5">
                                    <label for="birth_born_on_5">Born on</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_in_5" type="text" class="validate" name="birth_born_in_5">
                                    <label for="birth_born_in_5">Born in</label>
                                </div>
                            </td>
                            <!-- Baptism Date -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptism_date_5" type="text" class="validate datepicker" name="birth_baptism_date_5">
                                    <label for="birth_baptism_date_5">Baptism Date</label>
                                </div>
                            </td>
                            <!-- Minister -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_minister_5" type="text" class="validate" name="birth_minister_5">
                                    <label for="birth_minister_5">Minister</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_first_name_5" type="text" class="validate" name="birth_father_first_name_5">
                                    <label for="birth_father_first_name_5">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_5" type="text" class="validate" name="birth_father_middle_name_5">
                                    <label for="birth_father_middle_name_5">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_last_name_5" type="text" class="validate" name="birth_father_last_name_5">
                                    <label for="birth_father_last_name_5">Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_mothers_first_name_5" type="text" class="validate" name="birth_mothers_first_name_5">
                                    <label for="birth_mothers_first_name_5">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_5" type="text" class="validate" name="birth_father_middle_name_5">
                                    <label for="birth_father_middle_name_5">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_mother_last_name_5" type="text" class="validate" name="birth_mother_last_name_5">
                                    <label for="birth_mother_last_name_5">Last Name</label>
                                </div>
                            </td>
                            <!-- Address -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_resident_of_5" type="text" class="validate" name="birth_mother_last_name_5">
                                    <label for="birth_mother_last_name_5">Residents of</label>
                                </div>
                            </td>
                            <!-- GodParents -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_godparents_5" type="text" class="validate" name="birth_godparents_5">
                                    <label for="birth_godparents_5">Godparents</label>
                                </div>
                            </td>
                            <!-- Other Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptismal_register_5" type="text" class="validate" name="birth_baptismal_register_5">
                                    <label for="birth_baptismal_register_5">Baptismal Register</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_volume_5" type="text" class="validate" name="birth_volume_5">
                                    <label for="birth_volume_5">Volume</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_page_5" type="text" class="validate" name="birth_page_5">
                                    <label for="birth_page_5">Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_date_issued_5" type="text" class="validate datepicker" name="birth_date_issued_5">
                                    <label for="birth_date_issued_5">Date Issued</label>
                                </div>
                            </td>
                            <!-- Parish Priest -->
                            <td>
                                <div class="input-field">
                                    <select id="birth_parish_priest_5" class="priest_select_dropdown">
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
                                    <input id="birth_first_name_6" type="text" class="validate" name="birth_first_name_6">
                                    <label for="birth_first_name_6">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_middle_name_6" type="text" class="validate" name="birth_middle_name_6">
                                    <label for="birth_middle_name_6">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_last_name_6" type="text" class="validate" name="birth_last_name_6">
                                    <label for="birth_last_name_6">Last Name</label>
                                </div>
                            </td>
                            <!-- Born Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_on_6" type="text" class="validate datepicker" name="birth_born_on_6">
                                    <label for="birth_born_on_6">Born on</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_in_6" type="text" class="validate" name="birth_born_in_6">
                                    <label for="birth_born_in_6">Born in</label>
                                </div>
                            </td>
                            <!-- Baptism Date -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptism_date_6" type="text" class="validate datepicker" name="birth_baptism_date_6">
                                    <label for="birth_baptism_date_6">Baptism Date</label>
                                </div>
                            </td>
                            <!-- Minister -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_minister_6" type="text" class="validate" name="birth_minister_6">
                                    <label for="birth_minister_6">Minister</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_first_name_6" type="text" class="validate" name="birth_father_first_name_6">
                                    <label for="birth_father_first_name_6">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_6" type="text" class="validate" name="birth_father_middle_name_6">
                                    <label for="birth_father_middle_name_6">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_last_name_6" type="text" class="validate" name="birth_father_last_name_6">
                                    <label for="birth_father_last_name_6">Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_mothers_first_name_6" type="text" class="validate" name="birth_mothers_first_name_6">
                                    <label for="birth_mothers_first_name_6">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_6" type="text" class="validate" name="birth_father_middle_name_6">
                                    <label for="birth_father_middle_name_6">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_mother_last_name_6" type="text" class="validate" name="birth_mother_last_name_6">
                                    <label for="birth_mother_last_name_6">Last Name</label>
                                </div>
                            </td>
                            <!-- Address -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_resident_of_6" type="text" class="validate" name="birth_mother_last_name_6">
                                    <label for="birth_mother_last_name_6">Residents of</label>
                                </div>
                            </td>
                            <!-- GodParents -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_godparents_6" type="text" class="validate" name="birth_godparents_6">
                                    <label for="birth_godparents_6">Godparents</label>
                                </div>
                            </td>
                            <!-- Other Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptismal_register_6" type="text" class="validate" name="birth_baptismal_register_6">
                                    <label for="birth_baptismal_register_6">Baptismal Register</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_volume_6" type="text" class="validate" name="birth_volume_6">
                                    <label for="birth_volume_6">Volume</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_page_6" type="text" class="validate" name="birth_page_6">
                                    <label for="birth_page_6">Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_date_issued_6" type="text" class="validate datepicker" name="birth_date_issued_6">
                                    <label for="birth_date_issued_6">Date Issued</label>
                                </div>
                            </td>
                            <!-- Parish Priest -->
                            <td>
                                <div class="input-field">
                                    <select id="birth_parish_priest_6" class="priest_select_dropdown">
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
                                    <input id="birth_first_name_7" type="text" class="validate" name="birth_first_name_7">
                                    <label for="birth_first_name_7">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_middle_name_7" type="text" class="validate" name="birth_middle_name_7">
                                    <label for="birth_middle_name_7">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_last_name_7" type="text" class="validate" name="birth_last_name_7">
                                    <label for="birth_last_name_7">Last Name</label>
                                </div>
                            </td>
                            <!-- Born Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_on_7" type="text" class="validate datepicker" name="birth_born_on_7">
                                    <label for="birth_born_on_7">Born on</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_in_7" type="text" class="validate" name="birth_born_in_7">
                                    <label for="birth_born_in_7">Born in</label>
                                </div>
                            </td>
                            <!-- Baptism Date -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptism_date_7" type="text" class="validate datepicker" name="birth_baptism_date_7">
                                    <label for="birth_baptism_date_7">Baptism Date</label>
                                </div>
                            </td>
                            <!-- Minister -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_minister_7" type="text" class="validate" name="birth_minister_7">
                                    <label for="birth_minister_7">Minister</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_first_name_7" type="text" class="validate" name="birth_father_first_name_7">
                                    <label for="birth_father_first_name_7">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_7" type="text" class="validate" name="birth_father_middle_name_7">
                                    <label for="birth_father_middle_name_7">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_last_name_7" type="text" class="validate" name="birth_father_last_name_7">
                                    <label for="birth_father_last_name_7">Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_mothers_first_name_7" type="text" class="validate" name="birth_mothers_first_name_7">
                                    <label for="birth_mothers_first_name_7">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_7" type="text" class="validate" name="birth_father_middle_name_7">
                                    <label for="birth_father_middle_name_7">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_mother_last_name_7" type="text" class="validate" name="birth_mother_last_name_7">
                                    <label for="birth_mother_last_name_7">Last Name</label>
                                </div>
                            </td>
                            <!-- Address -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_resident_of_7" type="text" class="validate" name="birth_mother_last_name_7">
                                    <label for="birth_mother_last_name_7">Residents of</label>
                                </div>
                            </td>
                            <!-- GodParents -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_godparents_7" type="text" class="validate" name="birth_godparents_7">
                                    <label for="birth_godparents_7">Godparents</label>
                                </div>
                            </td>
                            <!-- Other Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptismal_register_7" type="text" class="validate" name="birth_baptismal_register_7">
                                    <label for="birth_baptismal_register_7">Baptismal Register</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_volume_7" type="text" class="validate" name="birth_volume_7">
                                    <label for="birth_volume_7">Volume</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_page_7" type="text" class="validate" name="birth_page_7">
                                    <label for="birth_page_7">Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_date_issued_7" type="text" class="validate datepicker" name="birth_date_issued_7">
                                    <label for="birth_date_issued_7">Date Issued</label>
                                </div>
                            </td>
                            <!-- Parish Priest -->
                            <td>
                                <div class="input-field">
                                    <select id="birth_parish_priest_7" class="priest_select_dropdown">
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
                                    <input id="birth_first_name_8" type="text" class="validate" name="birth_first_name_8">
                                    <label for="birth_first_name_8">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_middle_name_8" type="text" class="validate" name="birth_middle_name_8">
                                    <label for="birth_middle_name_8">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_last_name_8" type="text" class="validate" name="birth_last_name_8">
                                    <label for="birth_last_name_8">Last Name</label>
                                </div>
                            </td>
                            <!-- Born Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_on_8" type="text" class="validate datepicker" name="birth_born_on_8">
                                    <label for="birth_born_on_8">Born on</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_in_8" type="text" class="validate" name="birth_born_in_8">
                                    <label for="birth_born_in_8">Born in</label>
                                </div>
                            </td>
                            <!-- Baptism Date -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptism_date_8" type="text" class="validate datepicker" name="birth_baptism_date_8">
                                    <label for="birth_baptism_date_8">Baptism Date</label>
                                </div>
                            </td>
                            <!-- Minister -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_minister_8" type="text" class="validate" name="birth_minister_8">
                                    <label for="birth_minister_8">Minister</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_first_name_8" type="text" class="validate" name="birth_father_first_name_8">
                                    <label for="birth_father_first_name_8">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_8" type="text" class="validate" name="birth_father_middle_name_8">
                                    <label for="birth_father_middle_name_8">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_last_name_8" type="text" class="validate" name="birth_father_last_name_8">
                                    <label for="birth_father_last_name_8">Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_mothers_first_name_8" type="text" class="validate" name="birth_mothers_first_name_8">
                                    <label for="birth_mothers_first_name_8">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_8" type="text" class="validate" name="birth_father_middle_name_8">
                                    <label for="birth_father_middle_name_8">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_mother_last_name_8" type="text" class="validate" name="birth_mother_last_name_8">
                                    <label for="birth_mother_last_name_8">Last Name</label>
                                </div>
                            </td>
                            <!-- Address -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_resident_of_8" type="text" class="validate" name="birth_mother_last_name_8">
                                    <label for="birth_mother_last_name_8">Residents of</label>
                                </div>
                            </td>
                            <!-- GodParents -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_godparents_8" type="text" class="validate" name="birth_godparents_8">
                                    <label for="birth_godparents_8">Godparents</label>
                                </div>
                            </td>
                            <!-- Other Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptismal_register_8" type="text" class="validate" name="birth_baptismal_register_8">
                                    <label for="birth_baptismal_register_8">Baptismal Register</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_volume_8" type="text" class="validate" name="birth_volume_8">
                                    <label for="birth_volume_8">Volume</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_page_8" type="text" class="validate" name="birth_page_8">
                                    <label for="birth_page_8">Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_date_issued_8" type="text" class="validate datepicker" name="birth_date_issued_8">
                                    <label for="birth_date_issued_8">Date Issued</label>
                                </div>
                            </td>
                            <!-- Parish Priest -->
                            <td>
                                <div class="input-field">
                                    <select id="birth_parish_priest_8" class="priest_select_dropdown">
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
                                    <input id="birth_first_name_9" type="text" class="validate" name="birth_first_name_9">
                                    <label for="birth_first_name_9">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_middle_name_9" type="text" class="validate" name="birth_middle_name_9">
                                    <label for="birth_middle_name_9">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_last_name_9" type="text" class="validate" name="birth_last_name_9">
                                    <label for="birth_last_name_9">Last Name</label>
                                </div>
                            </td>
                            <!-- Born Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_on_9" type="text" class="validate datepicker" name="birth_born_on_9">
                                    <label for="birth_born_on_9">Born on</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_in_9" type="text" class="validate" name="birth_born_in_9">
                                    <label for="birth_born_in_9">Born in</label>
                                </div>
                            </td>
                            <!-- Baptism Date -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptism_date_9" type="text" class="validate datepicker" name="birth_baptism_date_9">
                                    <label for="birth_baptism_date_9">Baptism Date</label>
                                </div>
                            </td>
                            <!-- Minister -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_minister_9" type="text" class="validate" name="birth_minister_9">
                                    <label for="birth_minister_9">Minister</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_first_name_9" type="text" class="validate" name="birth_father_first_name_9">
                                    <label for="birth_father_first_name_9">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_9" type="text" class="validate" name="birth_father_middle_name_9">
                                    <label for="birth_father_middle_name_9">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_last_name_9" type="text" class="validate" name="birth_father_last_name_9">
                                    <label for="birth_father_last_name_9">Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_mothers_first_name_9" type="text" class="validate" name="birth_mothers_first_name_9">
                                    <label for="birth_mothers_first_name_9">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_9" type="text" class="validate" name="birth_father_middle_name_9">
                                    <label for="birth_father_middle_name_9">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_mother_last_name_9" type="text" class="validate" name="birth_mother_last_name_9">
                                    <label for="birth_mother_last_name_9">Last Name</label>
                                </div>
                            </td>
                            <!-- Address -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_resident_of_9" type="text" class="validate" name="birth_mother_last_name_9">
                                    <label for="birth_mother_last_name_9">Residents of</label>
                                </div>
                            </td>
                            <!-- GodParents -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_godparents_9" type="text" class="validate" name="birth_godparents_9">
                                    <label for="birth_godparents_9">Godparents</label>
                                </div>
                            </td>
                            <!-- Other Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptismal_register_9" type="text" class="validate" name="birth_baptismal_register_9">
                                    <label for="birth_baptismal_register_9">Baptismal Register</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_volume_9" type="text" class="validate" name="birth_volume_9">
                                    <label for="birth_volume_9">Volume</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_page_9" type="text" class="validate" name="birth_page_9">
                                    <label for="birth_page_9">Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_date_issued_9" type="text" class="validate datepicker" name="birth_date_issued_9">
                                    <label for="birth_date_issued_9">Date Issued</label>
                                </div>
                            </td>
                            <!-- Parish Priest -->
                            <td>
                                <div class="input-field">
                                    <select id="birth_parish_priest_9" class="priest_select_dropdown">
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
                                    <input id="birth_first_name_10" type="text" class="validate" name="birth_first_name_10">
                                    <label for="birth_first_name_10">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_middle_name_10" type="text" class="validate" name="birth_middle_name_10">
                                    <label for="birth_middle_name_10">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_last_name_10" type="text" class="validate" name="birth_last_name_10">
                                    <label for="birth_last_name_10">Last Name</label>
                                </div>
                            </td>
                            <!-- Born Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_on_10" type="text" class="validate datepicker" name="birth_born_on_10">
                                    <label for="birth_born_on_10">Born on</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_born_in_10" type="text" class="validate" name="birth_born_in_10">
                                    <label for="birth_born_in_10">Born in</label>
                                </div>
                            </td>
                            <!-- Baptism Date -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptism_date_10" type="text" class="validate datepicker" name="birth_baptism_date_10">
                                    <label for="birth_baptism_date_10">Baptism Date</label>
                                </div>
                            </td>
                            <!-- Minister -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_minister_10" type="text" class="validate" name="birth_minister_10">
                                    <label for="birth_minister_10">Minister</label>
                                </div>
                            </td>
                            <!-- Fathers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_first_name_10" type="text" class="validate" name="birth_father_first_name_10">
                                    <label for="birth_father_first_name_10">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_10" type="text" class="validate" name="birth_father_middle_name_10">
                                    <label for="birth_father_middle_name_10">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_last_name_10" type="text" class="validate" name="birth_father_last_name_10">
                                    <label for="birth_father_last_name_10">Last Name</label>
                                </div>
                            </td>
                            <!-- Mothers Name -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_mothers_first_name_10" type="text" class="validate" name="birth_mothers_first_name_10">
                                    <label for="birth_mothers_first_name_10">First Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_father_middle_name_10" type="text" class="validate" name="birth_father_middle_name_10">
                                    <label for="birth_father_middle_name_10">Middle Name</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_mother_last_name_10" type="text" class="validate" name="birth_mother_last_name_10">
                                    <label for="birth_mother_last_name_10">Last Name</label>
                                </div>
                            </td>
                            <!-- Address -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_resident_of_10" type="text" class="validate" name="birth_mother_last_name_10">
                                    <label for="birth_mother_last_name_10">Residents of</label>
                                </div>
                            </td>
                            <!-- GodParents -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_godparents_10" type="text" class="validate" name="birth_godparents_10">
                                    <label for="birth_godparents_10">Godparents</label>
                                </div>
                            </td>
                            <!-- Other Details -->
                            <td>
                                <div class="input-field">
                                    <input id="birth_baptismal_register_10" type="text" class="validate" name="birth_baptismal_register_10">
                                    <label for="birth_baptismal_register_10">Baptismal Register</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_volume_10" type="text" class="validate" name="birth_volume_10">
                                    <label for="birth_volume_10">Volume</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_page_10" type="text" class="validate" name="birth_page_10">
                                    <label for="birth_page_10">Page</label>
                                </div>
                            </td>
                            <td>
                                <div class="input-field">
                                    <input id="birth_date_issued_10" type="text" class="validate datepicker" name="birth_date_issued_10">
                                    <label for="birth_date_issued_10">Date Issued</label>
                                </div>
                            </td>
                            <!-- Parish Priest -->
                            <td>
                                <div class="input-field">
                                    <select id="birth_parish_priest_10" class="priest_select_dropdown">
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
                <button class="btn btn-wave" id="saveBirthGroup">Save Birth</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        initiateWorkerForBirth();
        setupBirthDatePicker();
        // will hold the values
        var emptyRowsByBirth = [];
        var rowsWithValueByBirth = [];

        // will hold error records
        var errorSavingRecordsByBirth = [];


        // initiate Birth Date Picker
        function setupBirthDatePicker(){
            for(var x = 1; x <= 10; x++){
                $("#birth_born_on_"+x).pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 30, 
                    max: new Date()
                });
                $("#birth_born_on_"+x).on('mousedown',function(event){ event.preventDefault(); });
            }
        }

        /// will validate all fields
        function validateAllFieldsAndCreatePayloadForBirth(
            row,
            birth_first_name,
            birth_middle_name,
            birth_last_name,
            birth_born_on,
            birth_born_in,
            birth_father_first_name,
            birth_father_middle_name,
            birth_father_last_name,
            birth_mothers_first_name,
            birth_father_middle_name,
            birth_mother_last_name,
            birth_resident_of,
            birth_godparents,
            birth_baptismal_register,
            birth_volume,
            birth_page,
            birth_date_issued,
            birth_parish_priest,
            birth_baptism_date,
            birth_minister,
            delegated_user,
        ){
            /// Validate for all empty rows
            if(
                birth_first_name == null || birth_first_name == undefined || birth_first_name == "" &&
                birth_middle_name == null || birth_middle_name == undefined || birth_middle_name == "" &&
                birth_last_name == null || birth_last_name == undefined || birth_last_name == "" &&
                birth_born_on == null || birth_born_on == undefined || birth_born_on == "" &&
                birth_baptism_date == null || birth_baptism_date == undefined || birth_baptism_date == "" &&
                birth_minister == null || birth_minister == undefined || birth_minister == ""
            ){
                emptyRowsByBirth.push(row);
            }else{
                var payloadToCreate;
                birth_date_issued = new Date(birth_date_issued);
                birth_born_on = new Date(birth_born_on);
                birth_baptism_date = new Date(birth_baptism_date);
                var metaContent = {                    
                    "born_on":birth_born_on.getMonth()+"/"+birth_born_on.getDate()+"/"+birth_born_on.getFullYear(),
                    "born_in":birth_born_in,
                    "father_firstname":birth_father_first_name,
                    "father_middlename":birth_father_middle_name,
                    "father_lastname":birth_father_last_name,
                    "mother_firstname":birth_mothers_first_name,
                    "mother_middlename":birth_father_middle_name,
                    "mother_lastname":birth_mother_last_name,
                    "resident_of":birth_resident_of,
                    "baptism_date":birth_baptism_date.getMonth()+"/"+birth_baptism_date.getDate()+"/"+birth_baptism_date.getFullYear(),
                    "baptism_minister":birth_minister,
                    "godparents":birth_godparents,
                    "baptismal_register":birth_baptismal_register,
                    "volume":birth_volume,
                    "page":birth_page,
                    "date_issued":birth_date_issued.getMonth()+"/"+birth_date_issued.getDate()+"/"+birth_date_issued.getFullYear(),
                };
                payloadToCreate = {
                    "firstname": birth_first_name,
                    "middlename": birth_middle_name,
                    "lastname": birth_last_name,
                    "certificate_type": "baptism",
                    "priest_id": birth_parish_priest == null ? 0:birth_parish_priest,
                    "meta": JSON.stringify(metaContent),
                    "created_by": delegated_user,
                };
                rowsWithValueByBirth.push({
                    "row": row,
                    "payload": payloadToCreate,
                });
            }
        }
        // worker will do the saving of the transaction
        function initiateWorkerForBirth(){
            if(localStorage.getItem('transactionsBirth') != null){
                if(localStorage.getItem('transactionsBirth') != "[]"){
                    console.log('Starting saving sequence');

                    // TODO:: FETCH Transactions from localStorage
                    var listOfTransactions = localStorage.getItem('transactionsBirth');

                    // Convert Transaction string to iterable
                    var convertedListOfTranscations = JSON.parse(listOfTransactions);
                    
                    // Show the progress indicator
                    $("#labelValidRecordBirth").removeClass('hide');
                    $("#extraSmallLoaderForSaving").removeClass('hide');
                    $("#labelValidRecordBirth").html('Saving '+convertedListOfTranscations.length+' valid records');
                    
                    // always get the first record
                    var toSavePayload = convertedListOfTranscations[0]['payload'];
                    var currentRow = convertedListOfTranscations[0]['row'];

                    // create the condition to initiate a recursive command
                    savingRecordBybirth(currentRow, toSavePayload, convertedListOfTranscations);
                }else{
                    $("#labelValidRecordBirth").html('Batch saved done');
                    $("#labelInvalidRecordBirth").addClass('hide');
                    setTimeout(function(){
                        $("#extraSmallLoaderForSaving").addClass('hide');
                        $("#labelValidRecordBirth").addClass('hide');
                    }, 3000);
                }
            }
        }

        function savingRecordBybirth(row, payload, listOfTransactions){
            $.ajax({
                type: "POST",
                url: certificate_endpoint,
                data: JSON.stringify(payload),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(response){
                    if(response.status == 201){
                        // removing the first object of the transaction list
                        listOfTransactions.shift();
                        // remove transactions in local Storage to replace new
                        localStorage.removeItem('transactionsBirth');
                        localStorage.setItem('transactionsBirth', JSON.stringify(listOfTransactions));
                        // update the table
                        getBirthList('NA');
                        // call again initiate worker to create a recursive effect
                        initiateWorkerForBirth();
                    }else if(response.status == 400){
                        errorSavingRecordsByBirth.push({
                            "row": row,
                            "payload": payload,
                            "message": "Duplicated"
                        });
                    }else{
                        console.log('something is not right: '+response.status);
                    }
                }, error: function(e){
                    console.log(e);
                    errorSavingRecordsByBirth.push({
                        "row": row,
                        "payload": payload,
                        "message": e
                    });
                }
            });

            // TODO: log errorSavingRecords to localStorage
        }

        $('#saveBirthGroup').on('click', function(){
            isTokenExist();
            var AT = localStorage.getItem("AT");
            checkTokenValidity(AT);

            var delagatedId = parseInt(localStorage.getItem('delegatedUser'));
            var delegated_user = AT.substring(delagatedId+1, AT.length);
            
            // Validate each row of data
            for(var x = 1; x <= 10; x++){
                var birth_first_name = $("#birth_first_name_"+x).val();
                var birth_middle_name = $("#birth_middle_name_"+x).val();
                var birth_last_name = $("#birth_last_name_"+x).val();
                var birth_born_on = $("#birth_born_on_"+x).val();
                var birth_born_in = $("#birth_born_in_"+x).val();
                var birth_father_first_name = $("#birth_father_first_name_"+x).val();
                var birth_father_middle_name = $("#birth_father_middle_name_"+x).val();
                var birth_father_last_name = $("#birth_father_last_name_"+x).val();
                var birth_mothers_first_name = $("#birth_mothers_first_name_"+x).val();
                var birth_father_middle_name = $("#birth_father_middle_name_"+x).val();
                var birth_mother_last_name = $("#birth_mother_last_name_"+x).val();
                var birth_resident_of = $("#birth_resident_of_"+x).val();
                var birth_godparents = $("#birth_godparents_"+x).val();
                var birth_baptismal_register = $("#birth_baptismal_register_"+x).val();
                var birth_volume = $("#birth_volume_"+x).val();
                var birth_page = $("#birth_page_"+x).val();
                var birth_date_issued = $("#birth_date_issued_"+x).val();
                var birth_parish_priest = $("#birth_parish_priest_"+x).val();
                
                var birth_baptism_date = $("#birth_baptism_date_"+x).val();
                var birth_minister = $("#birth_minister_"+x).val();
                validateAllFieldsAndCreatePayloadForBirth(
                    x,
                    birth_first_name,
                    birth_middle_name,
                    birth_last_name,
                    birth_born_on,
                    birth_born_in,
                    birth_father_first_name,
                    birth_father_middle_name,
                    birth_father_last_name,
                    birth_mothers_first_name,
                    birth_father_middle_name,
                    birth_mother_last_name,
                    birth_resident_of,
                    birth_godparents,
                    birth_baptismal_register,
                    birth_volume,
                    birth_page,
                    birth_date_issued,
                    birth_parish_priest,
                    birth_baptism_date,
                    birth_minister,
                    delegated_user,
                );
            }
            console.log('emptyRows:: ', emptyRowsByBirth);
            console.log('rowsWithValueByBirth:: ', rowsWithValueByBirth);

            // Store rowsWithValueByBirth to localStorage
            if(rowsWithValueByBirth.length > 0){
                $("#labelInvalidRecordBirth").removeClass('hide');
                $("#labelInvalidRecordBirth").html(emptyRowsByBirth.length+' invalid records');
                if(localStorage.getItem('transactionsBirth') === null){
                    localStorage.setItem('transactionsBirth',JSON.stringify(rowsWithValueByBirth));
                }else{
                    if(localStorage.getItem('transactionsBirth') == "[]"){
                        localStorage.setItem('transactionsBirth',JSON.stringify(rowsWithValueByBirth));
                    }else{
                        // TODO:: Fetch the new transactionsBirth and update the transactionsBirth in localStorage
                    }
                }

                // Clear Input Fields
                for(var x = 1; x <= 10; x++){
                $("#birth_first_name_"+x).val('');
                $("#birth_middle_name_"+x).val('');
                $("#birth_last_name_"+x).val('');
                $("#birth_born_on_"+x).val('');
                $("#birth_born_in_"+x).val('');
                $("#birth_father_first_name_"+x).val('');
                $("#birth_father_middle_name_"+x).val('');
                $("#birth_father_last_name_"+x).val('');
                $("#birth_mothers_first_name_"+x).val('');
                $("#birth_father_middle_name_"+x).val('');
                $("#birth_mother_last_name_"+x).val('');
                $("#birth_resident_of_"+x).val('');
                $("#birth_godparents_"+x).val('');
                $("#birth_baptismal_register_"+x).val('');
                $("#birth_volume_"+x).val('');
                $("#birth_page_"+x).val('');
                $("#birth_date_issued_"+x).val('');
                $("#birth_parish_priest_"+x).val('');
            }
                
                // Clear the records since this are already stored in localStorage
                emptyRowsByBirth = [];
                rowsWithValueByBirth = [];
                
                // initaite Worker
                initiateWorkerForBirth();
            }else{
                emptyRowsByBirth = [];
                $("#labelInvalidRecordBirth").removeClass('hide');
                $("#labelInvalidRecordBirth").html('All rows are empty');
            }
        });
    });
</script>