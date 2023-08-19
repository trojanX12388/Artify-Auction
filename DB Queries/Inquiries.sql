CREATE TABLE Inquiries
(
	Inquiry_ID NUMERIC IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Inquiry_ID PRIMARY KEY
	, incomingID NUMERIC 
	, outgoingID NUMERIC 
	, DateSent DATE
	, TimeSent Time
	, Message VARCHAR (255)

	 
	
)