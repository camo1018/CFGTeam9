DROP DATABASE manafitness;
CREATE DATABASE manafitness;
USE manafitness;

CREATE TABLE Users(
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(64) NOT NULL,
  action CHAR(1) NOT NULL,
  entity INT NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE Users_Activity(
  id INT NOT NULL AUTO_INCREMENT,
  userId INT NOT NULL,
  action CHAR(1) NOT NULL,
  entity INT NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE Groups (
  id  INT NOT NULL AUTO_INCREMENT,
  name CHAR(64) NOT NULL,
  description TEXT,
  num_followers INT NOT NULL,
  num_members INT NOT NULL,
  lives_saved INT NOT NULL,
  campaigns TEXT NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE Group_Activity(
  id INT NOT NULL AUTO_INCREMENT,
  groupId INT NOT NULL,
  action CHAR(1) NOT NULL,
  entity INT NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE Campaigns(
  id  INT NOT NULL AUTO_INCREMENT,
  name CHAR(128) NOT NULL,
  description TEXT,
  progress INT NOT NULL,
  goal INT NOT NULL,
  metric CHAR(4) NOT NULL,
  num_followers INT NOT NULL,
  num_members INT NOT NULL,
  lives_saved INT NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE Campaign_Activity(
  id INT NOT NULL AUTO_INCREMENT,
  campaignId INT NOT NULL,
  action CHAR(1) NOT NULL,
  entity INT NOT NULL,
  PRIMARY KEY(id)
);

