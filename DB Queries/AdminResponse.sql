CREATE TABLE AdminResponse
(
	AdminResponse_ID NUMERIC IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_AdminResponse_ID PRIMARY KEY
	, ArtistAccountID NUMERIC 
	, ArtLoverAccountID NUMERIC 
	, DateSent DATE
	, DateReceived DATE
	, TimeSent TIME
	, TimeReceived TIME
	, AdminPic VARCHAR (255) 
	, Response VARCHAR (255)
	, messageID VARCHAR (255)
	 
	
)