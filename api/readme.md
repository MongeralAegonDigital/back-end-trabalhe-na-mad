# Mongeral Produt-API #

### Features:

1 - Create an product.
2 - Retrieve product list.
3 - Retrieve category list.
4 - Delete an Product.
5 - Search product using filters. 

### Install:

 1 - clone git the final test repository.
 2 - npm install.
 3 - php artisan migrate (generate tables).
 4 - php artisan serve to start API.

### Api commands

***Get an list of categories***

TYPE:GET
*/api/getCategoryList*

Returns
> {
>    "data": [
>        {
>            "id": 1,
>            "categoryName": "Durável"
>        },
>        {
>            "id": 2,
>            "categoryName": "Não durável"
>        }
>    ],
>    "meta": {
>        "pagination": {
>            "total": 2,
>            "count": 2,
>            "per_page": 15,
>            "current_page": 1,
>            "total_pages": 1,
>            "links": []
>        }
>    }
> }


***Get an list of products***

TYPE:GET
*api/getProductList*

returns
> {
>    "data": [
>        {
>            "id": 4,
>            "productName": "Produto_1",
>            "productManufacture": "14/09/2017",
>            "productSize": 1,
>            "productHeight": 1,
>            "productWeight": 1,
>            "productCategoryId": 1
>        }
>    ],
>    "meta": {
>        "pagination": {
>            "total": 7,
>            "count": 7,
>            "per_page": 1000,
>            "current_page": 1,
>            "total_pages": 1,
>            "links": []
>        }
>    }
> }

***Delete an product***

TYPE:DELETE
*/api/deleteProduct/:productId*

***Create an product***

TYPE:POST
*/api/createProduct*

Request
> {
>  "productName":"Produto 1",
>  "productManufacture":"14/09/2017",
>  "productSize":7,
>  "productHeight":7,
>  "productWeight":7,
>  "productCategoryId":7
> }

***Search an product***

TYPE:POST
*/api/search*

Request 1
> {
>  "productName":"Produto 1",
>  "productManufacture":"14/09/2017",
>  "productCategoryId":7
> }

Request 2
> {
>  "productSize":7,
>  "productHeight":7,
>  "productWeight":7,
>  "productCategoryId":7
> }

Request 3
> {
>  "productName":"Produto 1",
> }

Apache Version:
2.4.27
PHP Version:
7.1.9
MySQL Version:
5.7.19
