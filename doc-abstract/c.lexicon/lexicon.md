Lexicon
===============
2017-01-29



This document contains definitions that I found useful explaining.

I might have forgotten some definitions, so if that's the case please let me know.




- application service





Application service
======================
2017-01-29


(Duplicate of 1.zuk-overview/3.services.md)



Application services are singleton classes.
They are therefore available at any moment after the application initialization and from anywhere.

We will talk about application initialization later.

There are a few application services:

- pdo: access a database via pdo
- mailer: send mails
- logger: log system
- privilege: handles user's permissions


Note: depending on your application, you might use more or less application services.
