# Library-Management-System

Library Management system is for library Manager or admin who manages the books Information and its allotment to the students.

Tools Required:

XAMPP or WAMPP server

Setup Database Connection

In browser Open “localhost/phpmyadmin/” and then create New Database.
After creating database create 3 table named

student ( `std_id`, `roll_no`, `std_name`, `std_address`, `latitude`, `longitude` ),
books ( `Book_ID`, `ISBN`, `Book_Name`, `book_description`, `Author`, `Edition`, `Year of Publication`, `Quantity`, `book_image` ) and 
allotments ( `Allot_ID`, `Roll_No`, `Student_Name`, `Book_Allot`, `Allot Date`, `Allot_Status` ).

lastly, In config.ini file write your database Name against dbname.
