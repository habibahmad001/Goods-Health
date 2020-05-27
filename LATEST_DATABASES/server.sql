// update query for module_order


UPDATE goodinsured_1.modules
   SET module_order = CASE id
                     WHEN 1 THEN 1
                     WHEN 2 THEN 2
                     WHEN 3 THEN 3
                     WHEN 4 THEN 5
                     WHEN 5 THEN 7
                     WHEN 6 THEN 8
                     WHEN 7 THEN 9
                     WHEN 8 THEN 10
                     WHEN 9 THEN 16
                     WHEN 10 THEN 18
                     WHEN 11 THEN 13
                     WHEN 12 THEN 14
                     WHEN 13 THEN 15
                     WHEN 14 THEN 19
                     WHEN 15 THEN 20
                     WHEN 16 THEN 21
       		     WHEN 17 THEN 29                  
		     WHEN 18 THEN 22
                     WHEN 19 THEN 6
                     WHEN 20 THEN 23
                     WHEN 21 THEN 25
                     WHEN 22 THEN 26
                     WHEN 23 THEN 24
                     WHEN 24 THEN 17
                     WHEN 25 THEN 30
                     WHEN 26 THEN 31
                     WHEN 27 THEN 32
                     WHEN 28 THEN 33
                   END
 WHERE id BETWEEN 1 AND 28



// update query to change module name

UPDATE goodinsured_1.modules
   SET module_name = CASE id  
                     WHEN 1 THEN 'Dashboard'
                     WHEN 2 THEN  'Fast Access'  
                     WHEN 3 THEN 'Book of Business'
                     WHEN 4 THEN 'Messages & Emails'
                     WHEN 5 THEN 'Benefits'
                     WHEN 6 THEN 'Files'
                     WHEN 7 THEN 'Business TimeSheet'
                     WHEN 8 THEN 'Insurance Options'
                     WHEN 9 THEN 'Payment Center'      
                     WHEN 10 THEN 'Reports'
                     WHEN 11 THEN 'Directory'
                     WHEN 12 THEN 'Ticket'
                     WHEN 13 THEN 'Claim Management'          
                     WHEN 14 THEN 'Agent/ Broker Center'
                     WHEN 15 THEN 'User Center' 
                     WHEN 16 THEN 'Carrier Management'
       		     WHEN 17 THEN 'Product Management'                  
		     WHEN 18 THEN 'Website Management'
                     WHEN 19 THEN 'Quotes'
                     WHEN 20 THEN 'Admin Settings'     
                     WHEN 21 THEN 'Logout'
                     WHEN 22 THEN 'Collapse'
                     WHEN 23 THEN 'Profile Settings'      
                     WHEN 24 THEN 'Employee Center'
                     WHEN 25 THEN 'Family/Group'
                     WHEN 26 THEN 'Report Claim'
                     WHEN 27 THEN 'Payment'
                     WHEN 28 THEN 'Messages'
                   END
 WHERE id BETWEEN 1 AND 28



// update query to change status

UPDATE goodinsured_1.modules
   SET status = CASE id
                     WHEN 1 THEN 1
                     WHEN 2 THEN 2
                     WHEN 3 THEN 1
                     WHEN 4 THEN 1
                     WHEN 5 THEN 1
                     WHEN 6 THEN 1
                     WHEN 7 THEN 2
                     WHEN 8 THEN 1
                     WHEN 9 THEN 1
                     WHEN 10 THEN 1
                     WHEN 11 THEN 2
                     WHEN 12 THEN 2
                     WHEN 13 THEN 1
                     WHEN 14 THEN 1
                     WHEN 15 THEN 1
                     WHEN 16 THEN 1
       		     WHEN 17 THEN 2                  
		     WHEN 18 THEN 1
                     WHEN 19 THEN 1
                     WHEN 20 THEN 1
                     WHEN 21 THEN 1
                     WHEN 22 THEN 1
                     WHEN 23 THEN 1
                     WHEN 24 THEN 1
                     WHEN 25 THEN 2
                     WHEN 26 THEN 2
                     WHEN 27 THEN 2
                     WHEN 28 THEN 2
                   END
 WHERE id BETWEEN 1 AND 28






