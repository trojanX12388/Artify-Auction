CREATE TABLE ArtistLogin
(
	ArtistloginID NUMERIC IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_ArtistloginID PRIMARY KEY
	, Email VARCHAR (255) NOT NULL
	, Password VARCHAR (255) NOT NULL
	, Verification_Code text NOT NULL,
)