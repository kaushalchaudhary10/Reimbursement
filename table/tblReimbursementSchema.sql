DROP TABLE IF EXISTS `tblConveyance`;

CREATE TABLE IF NOT EXISTS `tblConveyance` (
  `Conveyance_dtmFrom` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Conveyance_dtmTo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Conveyance_strpurpose` varchar(50) NOT NULL,
  `Conveyance_strmode` varchar(50) NOT NULL,
  `Conveyance_intKM` int,
  `Conveyance_strInvoiceNumber` varchar(10) DEFAULT NULL,
  `Conveyance_mnyAmout` decimal(7, 2) NOT NULL,
  `Conveyance_strAttachment` varchar(2),
  `Conveyance_strShortDesc` varchar(250)
);

DROP TABLE IF EXISTS `tblHotel`;
CREATE TABLE IF NOT EXISTS `tblHotel` (
  `Hotel_dtmFrom` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Hotel_dtmTo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Hotel_strHotelName` varchar(50) NOT NULL,
  `Hotel_strInvoiceNumber` varchar(10) NOT NULL,
  `Hotel_mnyAmout` decimal(7, 2) NOT NULL,
  `Hotel_strAttachment` varchar(2) NOT NULL
);

DROP TABLE IF EXISTS `tblFood`;
CREATE TABLE IF NOT EXISTS `tblFood` (
  `Food_dtmFrom` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Food_dtmTo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Food_strInvoiceNumber` varchar(10) NOT NULL,
  `Food_mnyAmout` decimal(7, 2) NOT NULL,
  `Food_strAttachment` varchar(2) NOT NULL
);

DROP TABLE IF EXISTS `tblMobile`;
CREATE TABLE IF NOT EXISTS `tblMobile` (
  `Mobile_dtmFrom` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Mobile_dtmTo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Mobile_strInvoiceNumber` varchar(10) NOT NULL,
  `Mobile_mnyAmout` decimal(7, 2) NOT NULL,
  `Mobile_strAttachment` varchar(2) NOT NULL
);

DROP TABLE IF EXISTS `tblInternet`;
CREATE TABLE IF NOT EXISTS `tblInternet` (
  `Internet_dtmFrom` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Internet_dtmTo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Internet_strInvoiceNumber` varchar(10) NOT NULL,
  `Internet_mnyAmout` decimal(7, 2) NOT NULL,
  `Internet_strAttachment` varchar(2) NOT NULL
);

DROP TABLE IF EXISTS `tblOthers`;
CREATE TABLE IF NOT EXISTS `tblOthers` (
  `Others_dtmFrom` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Others_dtmTo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Others_strDescription` varchar(100) NOT NULL,
  `Others_strInvoiceNumber` varchar(10) ,
  `Others_mnyAmout` decimal(7, 2) NOT NULL,
  `Others_strAttachment` varchar(2)
);


