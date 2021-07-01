--- 
customlog: 
  - 
    format: combined
    target: /etc/apache2/logs/domlogs/dentistpluss.com
  - 
    format: "\"%{%s}t %I .\\n%{%s}t %O .\""
    target: /etc/apache2/logs/domlogs/dentistpluss.com-bytes_log
documentroot: /home/dentist/public_html
group: dentist
hascgi: 0
homedir: /home/dentist
ip: 172.31.65.111
owner: root
phpopenbasedirprotect: 1
phpversion: ea-php72
port: 80
scriptalias: 
  - 
    path: /home/dentist/public_html/cgi-bin
    url: /cgi-bin/
serveradmin: webmaster@dentistpluss.com
serveralias: mail.dentistpluss.com www.dentistpluss.com
servername: dentistpluss.com
usecanonicalname: 'Off'
user: dentist
