LOAD DATA LOCAL INFILE 'IP2LOCATION-LITE-DB1.IPV6.CSV'
INTO TABLE `ipv62location`
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n';
