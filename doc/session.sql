-- Table 'session'

DROP TABLE IF EXISTS `session` 

CREATE TABLE IF NOT EXISTS  `session` (
session_id varchar(40) DEFAULT '0' NOT NULL,
ip_address varchar(16) DEFAULT '0' NOT NULL,
user_agent varchar(50) NOT NULL,
last_activity int(10) unsigned DEFAULT 0 NOT NULL,
user_data text NOT NULL,
PRIMARY KEY (session_id)
);
