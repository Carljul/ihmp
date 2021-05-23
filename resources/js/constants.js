
/// Development Environment
var protocol = 'http://';
var base_url = '127.0.0.1:8000';
var api_server = protocol+''+base_url+/api/;


/// Endpoints

/// ======================== Certificates
const certificate_endpoint = api_server+'certificate';
/// ======================== Priests
const priest_endpoint = api_server+'priest';
/// ======================== Templates
const template_endpoint = api_server+'template';
/// ======================== Verifying Access Token
const access_token_endpoint = api_server+'accesstoken';
