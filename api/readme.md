# Mongeral Produt-API #

### Features:

1. Create an product.
2. Retrieve product list.
3. Retrieve category list.
4. Delete an Product.
5. Search product using filters. 

### Install:

1. clone git the final test repository.
2. npm install.
3. php artisan migrate (generate tables).
4. php artisan serve to start API.

### Api commands

***Get an list of categories***

TYPE:GET
*/api/getCategoryList*

***Get an list of products***

TYPE:GET
*api/getProductList*

***Delete an product***

TYPE:DELETE
*/api/deleteProduct/:productId*

***Create an product***

TYPE:POST
*/api/createProduct*

Request
 {
  "productName":"Produto 1",
  "productManufacture":"14/09/2017",
  "productSize":7,
  "productHeight":7,
  "productWeight":7,
  "productCategoryId":7
 }

***Search an product***

TYPE:POST
*/api/search*

### Dependencies:

1. Apache Version 2.4.27
2. PHP Version 7.1.9
3. Laravel 5.5
4. MySQL 5.7.19


