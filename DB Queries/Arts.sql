CREATE TABLE Arts
(
	Art_ID NUMERIC IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Art_ID PRIMARY KEY
	, ArtistAccountID NUMERIC 
	, Art_Name VARCHAR (255) 
	, Art_Bid NUMERIC  
	, Current_Bid NUMERIC 
	, Total_Bidders NUMERIC
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
	, Availability NUMERIC 
	, Date_Release DATE
	, Winner varchar(255)
	, ID NUMERIC
	, Certificate_ID NUMERIC
	, SignaturePic VARCHAR
	, softdelete NUMERIC
	, WaterImage1 VARCHAR (255)
	, WaterImage2 VARCHAR (255)
	, WaterImage3 VARCHAR (255)
	 
	
)