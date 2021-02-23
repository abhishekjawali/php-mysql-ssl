# Sample code for establishing SSL connection to Aurora MySQL DB from PHP

## Setup
1. Setup PHP
2. Download RDS CA certificate (rds-ca-2019-root.pem) from https://s3.amazonaws.com/rds-downloads/rds-ca-2019-root.pem
3. Update the file with DB credentials
4. Execute
    ```
    php mysql-connect-ssl.php
    ```