# jubilant-octo-goggles

admin
email- jason@gmail.com
password- jason123

customer
email- andrew@gmail.com
password- andrew



send email from xampp server

requirements
    gmail account (turn off two-factor authentication and turn on 'access for less secure apps settings')
    smtp server address- smtp.gmail.com
    port- 465
    username- your gmail address
    password- your gmail password

backup before modifying the files below
1) xampp/sendmail/sendmail
2) xampp/php/php

sendmail file
smtp_server=smtp.gmail.com
smtp_port=465
error_logfile=error.log --> uncomment if this one commented
debug_logfile=debug.log --> uncomment if this one commented
auth_username= your gmail address
auth_password= your gmail password
force_sender= your gmail address

php file
SMTP=smtp.gmail.com
smtp_port=465
sendmail_from= your gmail address
sendmail_path= "\"C:\xampp\sendmail\sendmail.exe\" -t"
set path without changing anything. if you not in C, change C.

restart apache on xampp before sending mails in contact form
