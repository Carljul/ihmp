 
    
/// Development Environment
const protocol = 'http://';
const base_url = '127.0.0.1:8000';
const api_server = protocol+''+base_url+/api/;

/// Token Enums
const at_expire = 'expired';
const at_valid = 'valid';


/// Endpoints

/// ======================== Certificates
const certificate_endpoint = api_server+'certificate';
/// ======================== Priests
const priest_endpoint = api_server+'priest';
const all_priest_endpoint = api_server+'allPriest';
/// ======================== Templates
const template_endpoint = api_server+'template';
/// ======================== Verifying Access Token
const access_token_endpoint = api_server+'accesstoken';
/// ======================== General Controller
const general_controller_endpoint = api_server+'general';



/// Message and labels constants

