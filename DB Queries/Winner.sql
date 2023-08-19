CREATE TABLE Winner
(
	Win_ID NUMERIC IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Win_ID PRIMARY KEY
	, AccountID NUMERIC 
	, Art_Name VARCHAR (255) 
	, Art_ID NUMERIC   
	, DateWon DATE
	, TimeWon Time
	, Artist VARCHAR (255)
	, Highest_Bid NUMERIC
	, Art_Image VARCHAR
	 
	
)