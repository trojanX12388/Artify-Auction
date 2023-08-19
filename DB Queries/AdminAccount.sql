CREATE TABLE AdminAccount
(
	AdminAccountID NUMERIC IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_AdminAccountID PRIMARY KEY
	, Email VARCHAR (255)
	, Password VARCHAR (255)
	, UserName VARCHAR (255) 
	, Verification_Code TEXT
	, MFA NUMERIC
);