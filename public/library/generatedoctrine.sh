# ---------------------------------------
#          Virtual Machine Setup
# ---------------------------------------


   #  ==>  will generate the table in the database 
 


    cd library

    mysql -h localhost -uroot -proot zenddatabase -e 

    php doctrine.php orm:schema-tool:update --force  

   #  ==>  creating the entity with attributes and gettes ,setters 

   # php doctrine.php orm:generate-entities --generate-annotations="true"  ../application/models/ormentity/


