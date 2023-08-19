CREATE TABLE Orders
(
	Order_ID NUMERIC IDENTITY (1,1) NOT NULL
		CONSTRAINT PK_Order_ID PRIMARY KEY
	, AccountID NUMERIC 
	, Art_ID NUMERIC
	, Ammount NUMERIC  
	, Order_Date DATETIME 
	, Art_Name VARCHAR (255)
)