README FOR G1T5 ESD PROJECT
========================  TIBCO  =========================
File > Import > Existing studio projects into workspace

Import the following archive files in /Tibco/
1. Notification.zip
2. Order.zip
3. Users.zip
4. Restaurants.zip

Under the Project Explorer, edit the following hostname of the URL for:
- Notification.module > Resources > notification.module
  1. HttpClientResource
  2. HttpClientResource2

- Order.module > Resources > order.module
  1. HttpClientResource
  2. HttpClientResource1

========================  SQL  =============================
Load the following sql file
/sql/g1t5-bragdoof.sql

========================   GUI  =============================
Open /app/index.php in a text editor
Edit the hostname of the URL on both line 4 and line 54.

========================  APACHE  =============================
Set up an alias or place the app folder into the webroot folder C:\wamp64\www\