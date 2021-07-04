 
    
/// Development Environment
const protocol = 'http://';
const base_url = '192.168.1.10/ihmp';
const api_server = protocol+''+base_url+/api/;
const system_url = protocol+''+base_url+'/';

/// Token Enums
const at_expire = 'expired';
const at_valid = 'valid';


/// Endpoints

/// ======================== Certificates
const certificate_endpoint = api_server+'certificate';
const certificate_priest_endpoint = api_server+'cerficatePriest';
/// ======================== Priests
const priest_endpoint = api_server+'priest';
/// ======================== Templates
const template_endpoint = api_server+'template';
/// ======================== Users
const user_endpoint = api_server+'user';
/// ======================== Verifying Access Token
const access_token_endpoint = api_server+'accesstoken';
/// ======================== General Controller
const general_controller_endpoint = api_server+'general';

// Months
const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

const age_limit = 18;

/// Message and labels constants
messageValidator = (Name) => "Are you sure you want to delete "+Name+" ?";
