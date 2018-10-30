USE heroku_74e889dbb88746c;
CREATE TABLE IF NOT EXISTS user(
	iduser INT AUTO_INCREMENT PRIMARY KEY, 
	username VARCHAR(256) NOT NULL,
	password VARCHAR(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS contact(
	idcontact INTEGER AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(64) NOT NULL,
	email VARCHAR(64) NOT NULL,
	message VARCHAR(1024) NOT NULL
);

CREATE TABLE IF NOT EXISTS lesson(
	idlesson INTEGER AUTO_INCREMENT PRIMARY KEY,
	lessonname VARCHAR(64) NOT NULL,
	gradek_5 bit,
	grade6_8 bit,
	grade9_12 bit,
	description VARCHAR(4028) NOT NULL,
	lessonFile VARCHAR(32)
);
