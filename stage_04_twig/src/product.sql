DROP TABLE Product;

CREATE TABLE product
(
	PROD_ID VARCHAR NOT NULL UNIQUE,
	TITLE VARCHAR (36) NOT NULL,
	PLATFORM VARCHAR (45) NOT NULL,
	PRICE VARCHAR (12) NOT NULL,
	SCREENGRAB VARCHAR (25) NOT NULL,
	DEVELOPER VARCHAR (35) NOT NULL,
	DEV_URL VARCHAR (65) NOT NULL,
	DESCRIPTION VARCHAR (45) NOT NULL,
	PRIMARY KEY (ID)
);
INSERT INTO product (PROD_ID,TITLE,PLATFORM,PRICE,SCREENGRAB,DEVELOPER,DEV_URL,DESCRIPTION)
	VALUES('BIG001', 'Bioshock','XBox 360 2007', '&euro; 6.00',
        'bioshock_ss.jpg', 'Irrational Games', 'http://irrationalgames.com/tag/bioshock/',
        'Fantasy 1st person shooter');

INSERT INTO PRODUCT (PROD_ID,TITLE,PLATFORM,PRICE,SCREENGRAB,DEVELOPER,DEV_URL,DESCRIPTION)
	VALUES('BIG002', 'Bioshock', 'PS3 2008', '&euro; 6.00', 'bioshock_ss.jpg',
        'Irrational Games', 'http://irrationalgames.com/tag/bioshock/', 'Fantasy 1st person shooter');

INSERT INTO PRODUCT (PROD_ID,TITLE,PLATFORM,PRICE,SCREENGRAB,DEVELOPER,DEV_URL,DESCRIPTION)
	VALUES('BIG003', 'Bioshock', 'Windows 2007', '&euro; 6.00', 'bioshock_ss.jpg',
        'Irrational Games', 'http://irrationalgames.com/tag/bioshock/', 'Fantasy 1st person shooter');

INSERT INTO PRODUCT (PROD_ID,TITLE,PLATFORM,PRICE,SCREENGRAB,DEVELOPER,DEV_URL,DESCRIPTION)
	VALUES('CDG003','Chili Con Carnage','PSP 2007','&euro; 6.00','chili.jpg',
        'Deadline Games [Defunct]','http://www.mobygames.com/company/deadline-games-as/','Comedy Action 3rd person shooter');

INSERT INTO PRODUCT (PROD_ID,TITLE,PLATFORM,PRICE,SCREENGRAB,DEVELOPER,DEV_URL,DESCRIPTION)
	VALUES('IE005', 'Baldur\'s Gate II','Windows','&euro; 6.00','baldursgate_ss.png',
        'Interplay Ent Corp', 'http://www.interplay.com/','Fantasy CRPG');

INSERT INTO PRODUCT (PROD_ID,TITLE,PLATFORM,PRICE,SCREENGRAB,DEVELOPER,DEV_URL,DESCRIPTION)
	VALUES('SEA004', 'The Sims 2', 'Nintendo DS 2005','&euro; 6.00','sims2_ss.jpg',
        'Electronic Arts','http://www.ea.com/','Life Simulation');

INSERT INTO PRODUCT (PROD_ID,TITLE,PLATFORM,PRICE,SCREENGRAB,DEVELOPER,DEV_URL,DESCRIPTION)
	VALUES('SEA007','The Sims 2','GameCube 2005 ','&euro; 6.00', 'sims2_ss.jpg',
        'Electronic Arts', 'http://www.ea.com/','Life Simulation');

INSERT INTO PRODUCT (PROD_ID,TITLE,PLATFORM,PRICE,SCREENGRAB,DEVELOPER,DEV_URL,DESCRIPTION)
	VALUES('PHMR02','Prince of Persia','Sega Master System 1992','&euro; 26.00',
        'prince_persia_ss.png','Broderbund Software [defunct]',
        'http://www.mobygames.com/company/brderbund-software-inc/','Fantasy');

INSERT INTO PRODUCT (PROD_ID,TITLE,PLATFORM,PRICE,SCREENGRAB,DEVELOPER,DEV_URL,DESCRIPTION)
	VALUES('PHMR75', 'Prince of Persia','Gameboy Color 1999','&euro; 26.00',
        'prince_persia_ss.png', 'Broderbund Software [defunct]',
        'http://www.mobygames.com/company/brderbund-software-inc/','Fantasy');

INSERT INTO PRODUCT (PROD_ID,TITLE,PLATFORM,PRICE,SCREENGRAB,DEVELOPER,DEV_URL,DESCRIPTION)
	VALUES('PHMR08','Prince of Persia','Amstrad PCP 1990','&euro; 26.00',
        'prince_persia_ss.png', 'Broderbund Software [defunct]',
        'http://www.mobygames.com/company/brderbund-software-inc/','Fantasy');
