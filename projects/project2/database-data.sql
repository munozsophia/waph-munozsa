drop table if exists users;
create table users(
	username varchar(50) PRIMARY KEY,
	password varchar(100) NOT NULL,
	name varchar(100) NOT NULL,
	email varchar(100) NOT NULL UNIQUE
);
INSERT INTO users(username, password, name, email) VALUES ('admin', md5('MyPa$$w0rd'), 'Admin User', 'admin@example.com');