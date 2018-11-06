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

DROP TABLE IF EXISTS lesson;

CREATE TABLE IF NOT EXISTS lesson(
	idlesson INTEGER AUTO_INCREMENT PRIMARY KEY,
	lessonname VARCHAR(64) NOT NULL,
	gradek_5 BOOLEAN,
	grade6_8 BOOLEAN,
	grade9_12 BOOLEAN,
	description VARCHAR(4028) NOT NULL,
	lessonFile VARCHAR(32)
);

INSERT INTO lesson (lessonname, gradek_5, grade6_8, grade9_12, description) 
	VALUES ('Geometry', true, true, false, 'This is a lesson');


