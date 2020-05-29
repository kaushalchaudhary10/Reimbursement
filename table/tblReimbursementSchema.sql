-- Create table for conveyance reimbursement
CREATE TABLE IF NOT EXISTS `tblConveyance` (
  `Conveyance_strID` varchar(10),
  `Conveyance_dtmFrom` datetime NOT NULL,
  `Conveyance_dtmTo` datetime NOT NULL,
  `Conveyance_strpurpose` varchar(50) NOT NULL,
  `Conveyance_strmode` varchar(50) NOT NULL,
  `Conveyance_intKM` int,
  `Conveyance_strInvoiceNumber` varchar(10) DEFAULT NULL,
  `Conveyance_mnyAmout` decimal(7, 2) NOT NULL,
  `Conveyance_strAttachment` varchar(2),
  `Conveyance_strShortDesc` varchar(250),
  PRIMARY KEY (`Conveyance_strID`)
);

-- Create table for hotel reimbursement
CREATE TABLE IF NOT EXISTS `tblHotel` (
  `Hotel_strID` varchar(10),
  `Hotel_dtmFrom` datetime NOT NULL,
  `Hotel_dtmTo` datetime NOT NULL,
  `Hotel_strHotelName` varchar(50) NOT NULL,
  `Hotel_strInvoiceNumber` varchar(10) NOT NULL,
  `Hotel_mnyAmout` decimal(7, 2) NOT NULL,
  `Hotel_strAttachment` varchar(2) NOT NULL,
  PRIMARY KEY (`Hotel_strID`)
);

-- Create table for food reimbursement
CREATE TABLE IF NOT EXISTS `tblFood` (
  `Food_strID` varchar(10),
  `Food_dtmFrom` datetime NOT NULL,
  `Food_dtmTo` datetime NOT NULL,
  `Food_strInvoiceNumber` varchar(10) NOT NULL,
  `Food_mnyAmout` decimal(7, 2) NOT NULL,
  `Food_strAttachment` varchar(2) NOT NULL,
  PRIMARY KEY (`Food_strID`)
);

-- Create table for mobile reimbursement
CREATE TABLE IF NOT EXISTS `tblMobile` (
  `Mobile_strID` varchar(10),
  `Mobile_dtmFrom` datetime NOT NULL,
  `Mobile_dtmTo` datetime NOT NULL,
  `Mobile_strInvoiceNumber` varchar(10) NOT NULL,
  `Mobile_mnyAmout` decimal(7, 2) NOT NULL,
  `Mobile_strAttachment` varchar(2) NOT NULL,
  PRIMARY KEY (`Mobile_strID`)
);

-- Create table for internet reimbursement
CREATE TABLE IF NOT EXISTS `tblInternet` (
  `Internet_strID` varchar(10),
  `Internet_dtmFrom` datetime NOT NULL,
  `Internet_dtmTo` datetime NOT NULL,
  `Internet_strInvoiceNumber` varchar(10) NOT NULL,
  `Internet_mnyAmout` decimal(7, 2) NOT NULL,
  `Internet_strAttachment` varchar(2) NOT NULL,
  PRIMARY KEY (`Internet_strID`)
);

-- Create table for others reimbursement
CREATE TABLE IF NOT EXISTS `tblOthers` (
  `Others_strID` varchar(10),
  `Others_dtmFrom` datetime NOT NULL,
  `Others_dtmTo` datetime NOT NULL,
  `Others_strDescription` varchar(100) NOT NULL,
  `Others_strInvoiceNumber` varchar(10) ,
  `Others_mnyAmout` decimal(7, 2) NOT NULL,
  `Others_strAttachment` varchar(2), 
  PRIMARY KEY (`Others_strID`)
);


