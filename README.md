LEGEND:
	(s) - string
	(a)	- array
	(l) - long text
	(b) - boolean
	(PK)- primary key/ID
	(FK)- foreign key

user
	user_id (PK)
	name (s)
	username (s)
	password (s)

priest
	priest_id (PK)
	firstname (s)
	middlename (s)
	lastname (s)
	prefix (s)


access_token
	token_id (PK)
	user_id (FK)
	token_key (s)
	token_status (s)
	expiration (s)

certificate
	certificate_id (PK)
	firstname (s)
	middlename (s)
	lastname (s)
	certificate_type (s)
	priest_id (FK)
	meta (l)
	created_by [user_id] (FK)
	created_date (s)

template 
	template_id (PK)
	template_type (s)
	content (l)
	is_template (b)


if type == "confirmation"
meta = {
	father_firstname (s)
	father_middlename (s)
	father_lastname (s)
	mother_firstname (s)
	mother_middlename (s)
	mother_lastname (s)
	confirmation_day (s)
	confirmation_month (s)
	confirmation_year (s)
	confirmation_by (s)
	first_sponsor (s)
	second_sponsor (s)
	registration_book (s)
	book_page (s)
	book_number (s)
	date_issued (s)
}


if type == "baptism"
meta = {
	born_on (s)
	born_in (s)
	father_firstname (s)
	father_middlename (s)
	father_lastname (s)
	mother_firstname (s)
	mother_middlename (s)
	mother_lastname (s)
	resident_of (s)
	baptism_date (s)
	baptism_minister (s)
	godparents (a)
	baptismal_register (s)
	volume (s)
	page (s)
	date_issued (s)
}

if type == "marriage"
meta = {
	husband_firstname
	husband_middlename
	husband_lastname
	husband_age
	husband_civil_status
	husband_birthdate
	husband_birthplace
	husband_residence
	husband_baptismdate
	husband_fathersname
	husband_mothersname
	husband_firstwitness
	husband_secondwitness
	wife_firstname
	wife_middlename
	wife_lastname
	wife_age
	wife_civil_status
	wife_birthdate
	wife_birthplace
	wife_residence
	wife_baptismdate
	wife_fathersname
	wife_mothersname
	wife_firstwitness
	wife_secondwitness
	marriage_place
	marriage_date
	solemnized_by
	marriage_number
	marriage_page
	marriage_line
	marriage_day
	marriage_month
	marriage_year
}



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