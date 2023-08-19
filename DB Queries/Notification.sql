CREATE TABLE ArtNotification
(
	ArtNotif_ID NUMERIC IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_ArtNotif_ID PRIMARY KEY
	, ID NUMERIC (15)
	, ArtistAccountID NUMERIC
	, AccountID NUMERIC
	, Notif_Message VARCHAR (255)
	, artimage VARCHAR (255)
	, softdelete NUMERIC (5)
	 
	
)