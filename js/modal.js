
$(document).ready(function(){
    $('#importExport').modal({dismissible: false});
    $('.templateDownloadDropdown').material_select();

    // ------------------------------------------- CERTIFICATE FILTER (PRINT) ------------------------------------------- //
    $("#btnCertificatePrint").click(() => {

        var divContents = document.getElementById("printDiv").innerHTML;
        var a = window.open('', '', 'height=10000, width=10000');
        a.document.write(`<html><head><link href='${system_url}/css/materialize.css' rel="stylesheet"></head>`);
        a.document.write('<body>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        setTimeout(() => {
            a.print();
            window.close();
        }, 1000)
    })


    $("#btnCertificateFilter").click((e) => {
        //get the input values
        let certificate_type = $("#selectFilterCertificateType option:selected").val();
        let dateFrom = $("#filter_date_from").val();
        let dateTo = $("#filter_date_to").val();
        let divToShow = "";
        let tableToShow = "";
        let divToHideArr = ["confirmationListFilterTableDIV", "marriageListFilterTableDIV", "birthListFilterTableDIV", "deathListFilterTableDIV"];
        //decide what div to display
        if(certificate_type == "confirmation") divToShow = "confirmationListFilterTableDIV";
        if(certificate_type == "marriage") divToShow = "marriageListFilterTableDIV";
        if(certificate_type == "baptism") divToShow = "birthListFilterTableDIV";
        if(certificate_type == "death") divToShow = "deathListFilterTableDIV";
        //set the table to show by cutting the word "DIV"
        tableToShow = divToShow.slice(0, -3)
        //removing an array value
        const index = divToHideArr.indexOf(divToShow)
        if(index > -1)divToHideArr.splice(index, 1)
        //input validations here ...
        if(dateFrom == "")return Materialize.toast('Please provide Date From!', 3000, 'red')
        if(dateTo == "")return Materialize.toast('Please provide Date To!', 3000, 'red')
        //format the date into moment js
        dateFrom = moment(dateFrom).subtract(1, 'days').format("L");
        dateTo = moment(dateTo).add(1, 'days').format("L");
        //ajax call for calling the certificates data
        $.ajax({
            type: "GET",
            url: certificate_endpoint+"/[]", //by default just add empty array
            data: {dateFrom, dateTo, certificate_type}, //declare our payload
            success: function(data){
                var html = "";
                var dataObject = data.data;
                if(certificate_type == "confirmation"){
                    if(dataObject.length == 0){
                        html+= "<tr>"
                        +"<td colspan='21'>No Records Yet</td>"
                        +"</tr>";
                        $(`#${tableToShow}`).html(html);
                    }else{
                        for(var x = 0; x < dataObject.length; x++){
                            var metaContent = JSON.parse(dataObject[x]['meta']);
                            var rootContent = dataObject[x];
                            html+='<tr>'
                            +'<!-- Record of -->'
                            +'<td><label style="font-size: 9px;">First Name</label><br>'+rootContent['firstname']+'</td>'
                            +'<td><label style="font-size: 9px;">Middle Name</label><br>'+(rootContent['middlename'] == null ? '' : rootContent['middlename'])+'</td>'
                            +'<td><label style="font-size: 9px;">Last Name</label><br>'+rootContent['lastname']+'</td>'
                            +'<!-- Confirmation Date -->';
                            var cmonth = metaContent['confirmation_month'];
                            if(cmonth == null || cmonth == undefined || cmonth == NaN){
                                html+='<td>Not Set</td>';
                            }else{
                                html+='<td>'+metaContent['confirmation_month']+'/'+metaContent['confirmation_day']+'/'+metaContent['confirmation_year']+'</td>';
                            }
                            html+='<!-- Date Issued -->';
                            var dissued = metaContent['date_issued'];
                            if(dissued == 'NaN/NaN/NaN'){
                                html+='<td>Not Set</td>';
                            }else{
                                html+='<td>'+metaContent['date_issued']+'</td>';
                            }
                            html+='<!-- Fathers Name -->'
                            +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['father_firstname']+'</td>'
                            +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['father_middlename']+'</td>'
                            +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['father_lastname']+'</td>'
                            +'<!-- Mothers Name -->'
                            +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['mother_firstname']+'</td>'
                            +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['mother_middlename']+'</td>'
                            +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['mother_lastname']+'</td>'
                            +'<!-- Confirmation by -->'
                            +'<td>'+metaContent['confirmation_by']+'</td>'
                            +'<!-- Registration Book Detail -->'
                            +'<td><label style="font-size: 9px;">Registration Book</label><br>'+metaContent['registration_book']+'</td>'
                            +'<td><label style="font-size: 9px;">Book Page</label><br>'+metaContent['book_page']+'</td>'
                            +'<td><label style="font-size: 9px;">Book Number</label><br>'+metaContent['book_number']+'</td>'

                            html+='</tr>';
                        }
                    }
                }
                if(certificate_type == "marriage"){
                    if(dataObject.length == 0){
                        html+= "<tr>"
                        +"<td colspan='21'>No Records Yet</td>"
                        +"</tr>";
                        $(`#${tableToShow}`).html(html);
                    }else{
                        for(var x = 0; x < dataObject.length; x++){
                            var metaContent = JSON.parse(dataObject[x]['meta']);
                            var rootContent = dataObject[x];
                            html+= '<tr>'
                                +'<!-- Husbands Info -->'
                                +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['husband_firstname']+'</td>'
                                +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['husband_middlename']+'</td>'
                                +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['husband_lastname']+'</td>'
                                +'<td><label style="font-size: 9px;">Civil Status</label><br>'+metaContent['husband_civil_status']+'</td>'
                                +'<td><label style="font-size: 9px;">Age</label><br>'+metaContent['husband_age']+'</td>'
                                +'<td><label style="font-size: 9px;">Birth Date</label><br>'+metaContent['husband_birthdate']+'</td>'
                                +'<td><label style="font-size: 9px;">Birth Place</label><br>'+metaContent['husband_birthplace']+'</td>'
                                +'<td><label style="font-size: 9px;">Baptism Date</label><br>'+metaContent['husband_baptismdate']+'</td>'
                                +'<!-- Wifes Info -->'
                                +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['wife_firstname']+'</td>'
                                +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['wife_middlename']+'</td>'
                                +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['wife_lastname']+'</td>'
                                +'<td><label style="font-size: 9px;">Civil Status</label><br>'+metaContent['wife_civil_status']+'</td>'
                                +'<td><label style="font-size: 9px;">Age</label><br>'+metaContent['wife_age']+'</td>'
                                +'<td><label style="font-size: 9px;">Birth Date</label><br>'+metaContent['wife_birthdate']+'</td>'
                                +'<td><label style="font-size: 9px;">Birth Place</label><br>'+metaContent['wife_birthplace']+'</td>'
                                +'<td><label style="font-size: 9px;">Baptism Date</label><br>'+metaContent['wife_baptismdate']+'</td>'
                                +'<!-- Marriage Details -->'
                                +'<td><label style="font-size: 9px;">Place of Marriage</label><br>'+metaContent['marriage_place']+'</td>'
                                +'<td><label style="font-size: 9px;">Date of Marriage</label><br>'+metaContent['marriage_date']+'</td>'
                                +'<td><label style="font-size: 9px;">Solemnize By</label><br>'+metaContent['solemnized_by']+'</td>'
                                +'<!-- Other Details -->'
                                +'<td><label style="font-size: 9px;">Marriages No.</label><br>'+metaContent['marriage_number']+'</td>'
                                +'<td><label style="font-size: 9px;">Page</label><br>'+metaContent['marriage_page']+'</td>'
                                +'<td><label style="font-size: 9px;">Line</label><br>'+metaContent['marriage_line']+'</td>'
                                +'<td><label style="font-size: 9px;">Date Issued</label><br>'+metaContent['marriage_day']+'</td>'
                                +'<!-- Priest Name -->';
                                html+='</tr>';
                        }
                    }
                }
                if(certificate_type == "baptism"){
                    if(dataObject.length == 0){
                        html+= "<tr>"
                        +"<td colspan='21'>No Records Yet</td>"
                        +"</tr>";
                        $(`#${tableToShow}`).html(html);
                    }else{
                        for(var x = 0; x < dataObject.length; x++){
                            var metaContent = JSON.parse(dataObject[x]['meta']);
                            var rootContent = dataObject[x];
                            html+= '<tr>'
                                +'<!-- Born On -->'
                                +'<td>'+metaContent['born_on']+'</td>'
                                +'<!-- Record of -->'
                                +'<td><label style="font-size: 9px;">First Name</label><br>'+rootContent['firstname']+'</td>'
                                +'<td><label style="font-size: 9px;">Middle Name</label><br>'+rootContent['middlename']+'</td>'
                                +'<td><label style="font-size: 9px;">Last Name</label><br>'+rootContent['lastname']+'</td>'
                                +'<!-- Born In -->'
                                +'<td><label style="font-size: 9px;">Born In</label><br>'+metaContent['born_in']+'</td>'
                                +'<!-- Born In -->'
                                +'<td><label style="font-size: 9px;">Baptism Date</label><br>'+metaContent['baptism_date']+'</td>'
                                +'<td><label style="font-size: 9px;">Minister</label><br>'+metaContent['baptism_minister']+'</td>'
                                +'<!-- Fathers Name -->'
                                +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['father_firstname']+'</td>'
                                +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['father_middlename']+'</td>'
                                +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['father_lastname']+'</td>'
                                +'<!-- Mothers Name -->'
                                +'<td><label style="font-size: 9px;">First Name</label><br>'+metaContent['mother_firstname']+'</td>'
                                +'<td><label style="font-size: 9px;">Middle Name</label><br>'+metaContent['mother_middlename']+'</td>'
                                +'<td><label style="font-size: 9px;">Last Name</label><br>'+metaContent['mother_lastname']+'</td>'
                                +'<!-- Residents of -->'
                                +'<td><label style="font-size: 9px;">Address</label><br>'+metaContent['resident_of']+'</td>'
                                +'<!-- Godparents -->'
                                +'<td><label style="font-size: 9px;">Godparents</label><br>'+metaContent['godparents']+'</td>'
                                +'<!-- Other Details -->'
                                +'<td><label style="font-size: 9px;">Baptismal Register</label><br>'+metaContent['baptismal_register']+'</td>'
                                +'<td><label style="font-size: 9px;">Volume</label><br>'+metaContent['volume']+'</td>'
                                +'<td><label style="font-size: 9px;">Page Number</label><br>'+metaContent['page']+'</td>'
                                +'<td><label style="font-size: 9px;">Date Issued</label><br>'+metaContent['date_issued']+'</td>'
                                +'<!-- Parish Priest -->';
                                html+='</tr>';
                        }
                    }
                }
                if(certificate_type == "death"){
                    if(dataObject.length == 0){
                        html+= "<tr>"
                        +"<td colspan='21'>No Records Yet</td>"
                        +"</tr>";
                        $(`#${tableToShow}`).html(html);
                    }else{
                        for(var x = 0; x < dataObject.length; x++){
                            var metaContent = JSON.parse(dataObject[x]['meta']);
                            var responseContent = dataObject[x];
                            html+= '<tr>'
                                    +'<!-- Decease Name -->'
                                    +'<td><label style="font-size: 9px;">First Name</label><br>'+responseContent['firstname']+'</td>'
                                    +'<td><label style="font-size: 9px;">Middle Name</label><br>'+responseContent['middlename']+'</td>'
                                    +'<td><label style="font-size: 9px;">Last Name</label><br>'+responseContent['lastname']+'</td>'
                                    +'<!-- Other Info -->'
                                    +'<td><label style="font-size: 9px;">Age</label><br>'+metaContent['age']+'</td>'
                                    +'<td><label style="font-size: 9px;">Residence of</label><br>'+metaContent['residence']+'</td>'
                                    +'<td><label style="font-size: 9px;">Date of Death</label><br>'+metaContent['date_of_death']+'</td>'
                                    +'<td><label style="font-size: 9px;">Place of Burial</label><br>'+metaContent['place_of_burial']+'</td>'
                                    +'<td><label style="font-size: 9px;">Date of Burial</label><br>'+metaContent['date_of_burial']+'</td>'
                                    +'<td><label style="font-size: 9px;">Book Number</label><br>'+metaContent['book_number']+'</td>'
                                    +'<td><label style="font-size: 9px;">Page Number</label><br>'+metaContent['page_number']+'</td>'
                                    +'<td><label style="font-size: 9px;">Registry Number</label><br>'+metaContent['registry_number']+'</td>'
                                    +'<td><label style="font-size: 9px;">Date Issued</label><br>'+metaContent['date_issued']+'</td>'
                                    +'<!-- Priest Name -->';
                            +'</tr>';
                        }
                    }
                }

                //display the div
                $(`#${divToShow}`).css("display", "block");
                //hide the other DIVS
                for(let divTohide of divToHideArr){
                    $(`#${divTohide}`).css("display", "none");
                }
                //display the data into table
                $(`#${tableToShow}`).html(html);
            }, error: function(e){
                Materialize.toast('Something Went Wrong:: '+e.responseJSON.message, 5000, 'red rounded');
                console.log('["Confirmation Error"]: '+e.responseJSON.message);
            }
        });

    })
});