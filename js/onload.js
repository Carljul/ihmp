
$(document).ready(function(){
    $('.parallax').parallax();
    setLogoutForm();
    // $('select').material_select(); <--- Do not use this one or it will affect the parish priest dropdown
    /// Register all dropdowns here do not use the general method of material select
    $("#selectCertificate").material_select();
    $("#selectTemplateType").material_select(); //DC: added here the dropdown for template type
    $("#selectIsTemplate").material_select(); //DC: added here the dropdown for is template
    $("#selectFilterCertificateType").material_select(); //DC: added here the dropdown for filter certificate type
    $("#selectForm").material_select();

    $('.modal').modal();
    $('.datepicker').pickadate();
    $('.datepicker').on('mousedown',function(event){ event.preventDefault(); });

    checkConnection();
    /// General functions
    // Check Server Connectivity
    function checkConnection(){
        $.ajax({
            type: "GET",
            url: general_controller_endpoint,
            success: function(response){
                // console.log(response);
            }, error: function(e){
                console.log(e);
            }
        });
    }

    // Set Logout Form
    function setLogoutForm(){
        if(localStorage.getItem('AT') != null){
            var at = localStorage.getItem('AT');
            var user_id = at.substring(33, at.length);
            $("#logout_out_link").attr('href',system_url+'logout?token_key='+at+'&user_id='+user_id);
            $("#logout-form").prop('action',system_url+'logout?token_key='+at+'&user_id='+user_id);
        }
    }
});