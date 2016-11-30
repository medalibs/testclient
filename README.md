## Pour tester en ligne http://151.80.233.151/testclient/index.php?controller=User&action=inscription

Les tables de la base sous : /data/data.sql

Table des utilisateurs

```
CREATE TABLE user (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL UNIQUE,
  pwd VARCHAR(30) NOT NULL,
  is_connected boolean not null default 0
);
```

Table des messages

```
CREATE TABLE message (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  content VARCHAR(255) ,
  from_id INT(6) NOT NULL,
  to_id INT(6) NOT NULL
);
```
