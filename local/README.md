<!--
API List
added by Dan
date updated: May 16, 2021
-->
API:

/api/priest/            -> GET
/api/priest/1           -> GET      (fetch w/ id)
/api/priest/{}          -> POST     (insert)
/api/priest/{}          -> PUT      (update)
/api/priest/{}          -> DELETE   (delete)

/api/template/          -> GET
/api/template/1         -> GET      (fetch w/ id)
/api/template/{}        -> POST     (insert)
/api/template/{}        -> PUT      (update)
/api/template/{}        -> DELETE   (delete)


<!--
Database Schema Link
added by Dan
date updated: May 14, 2021
-->
DATABASE SCHEMA LINK: (GOOGLE DOCS)
https://docs.google.com/document/d/1UQ4LriTQrrvKfdAdIRtXFnws_Ahz9vEAzZUsEmtDnuw/edit?usp=sharing


<!--
Software Developer Agreement
added by Jul
date added: May 13, 2021
-->

Software Developer Agreement

https://docs.google.com/document/d/1QECWJZkKJkxefsHrKBkzPI6nl6XyAev-gCGGAkxbGzI/edit?usp=sharing


<!--
Materialize CSS
added by Jul
date added: May 14, 2021
Front End Scaffolding
-->
Front End Scaffold

https://materializecss.com/getting-started.html


<!-- 
    Software Manual
    Added By Jul
    date added: July 11, 2021
-->
System Manual

https://drive.google.com/file/d/1Um5liMMom2eIQrH8mw2wzyVkY7m3PZa7/view?usp=sharing


/// Database Seeding for Voyager
php artisan db:seed --class=DataTypesTableSeeder
php artisan db:seed --class=DataRowsTableSeeder


<!-- Login Flow -->
Here is an explanation on how login controller works
It will still use the login method of laravel but with the additional features
upon a successful login using laravel we will generate a 32 bit
random string delegated with userid and a encrypted username that will act
as an accessToken of the user and this token will be saved to database
this token will be use to validate users authenticity of each api endpoint call