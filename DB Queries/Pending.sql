CREATE TABLE Pending
(
	Pending_ID NUMERIC IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Pending_ID PRIMARY KEY
	, ArtistAccountID NUMERIC 
	, Art_Name VARCHAR (255) 
	, Art_Bid NUMERIC   
	, Auction_Date DATE
	, Dimension VARCHAR (255)
	, Art_Type VARCHAR (255)
	, Venue VARCHAR (255)
	, Art_Image VARCHAR (255)
	, Art_Image2 VARCHAR (255)
	, Art_Image3 VARCHAR (255)
	, Bid_Time TIME
	, Artist VARCHAR (255)
	, Description VARCHAR (255) 
	 
	
)