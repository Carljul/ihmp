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



/// Database Seeding for Voyager
php artisan db:seed --class=DataTypesTableSeeder
php artisan db:seed --class=DataRowsTableSeeder