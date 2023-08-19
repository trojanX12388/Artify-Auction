CREATE TABLE ArtistInquiries
(
	ArtistInquiry_ID NUMERIC IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_ArtistInquiry_ID PRIMARY KEY
	, ArtistAccountID NUMERIC 
	, ArtistName VARCHAR (255)
	, DateSent DATE
	, TimeSent Time
	, ArtistPic VARCHAR (255) 
	, Response VARCHAR (255)
	, AdminResponse VARCHAR (255) 
	 
	
)