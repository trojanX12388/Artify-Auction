CREATE TABLE Bids
(
	Bid_ID NUMERIC IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Bid_ID PRIMARY KEY
	, AccountID NUMERIC 
	, Art_ID NUMERIC
	, Ammount NUMERIC  
	, Bid_Date DATETIME 
	, Art_Name VARCHAR (255)
)