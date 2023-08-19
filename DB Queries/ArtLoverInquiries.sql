CREATE TABLE ArtLoverInquiries
(
	ArtLoverInquiry_ID NUMERIC IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_ArtLoverInquiry_ID PRIMARY KEY
	, ArtLoverAccountID NUMERIC 
	, ArtLoverName VARCHAR (255)
	, DateSent DATE
	, TimeSent Time
	, ArtLoverPic VARCHAR (255) 
	, Response VARCHAR (255)
	, AdminResponse VARCHAR (255) 
	 
	
)