<table><tr><td> <em>Assignment: </em> IT202 Milestone 2 Shop Project</td></tr>
<tr><td> <em>Student: </em> Anthony Dvorsky (ajd99)</td></tr>
<tr><td> <em>Generated: </em> 12/3/2022 9:13:56 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-009-F22/it202-milestone-2-shop-project/grade/ajd99" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone2 branch</li><li>Create a new markdown file called milestone2.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone2.md</li><li>Add/commit/push the changes to Milestone2</li><li>PR Milestone2 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes to get ready for Milestone 3</li><li>Submit the direct link to this new milestone2.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on github and everywhere else. Images are only accepted from dev or prod, not local host. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Users with admin or shop owner will be able to add products </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of admin create item page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205456796-5b1b110f-becd-46de-8ed7-246b61ac5eb5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of add item page with valid data filled in<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of populated Products table clearly showing the columns</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205456855-34d82690-7aae-4f3c-8e8c-81810d03c864.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Products table containing data from previous screenshot (id 14), true false<br>is stored as 1 or 0, unit_price is multiplied by 100 to be<br>stored then divided by 100 to be displayed<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly describe the code flow for creating a Product</td></tr>
<tr><td> <em>Response:</em> <p>The way we get our form data for a newly added item into<br>the database is first, we make sure that our form data was submitted<br>by checking if our post submit variable is set. Next, we prepare an<br>insert query into our table with the columns we want to fill and<br>the values associated with them. Finally, we bind the values we insert into<br>our database with our post data and execute the query.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/50">https://github.com/tony2-5/IT202-009/pull/50</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ajd99-prod.herokuapp.com/Project/admin/add_item.php">https://ajd99-prod.herokuapp.com/Project/admin/add_item.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Any user can see visible products on the Shop Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Shop page showing 10 items without filters/sorting applied</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205459513-21e941ea-f087-4cd6-948f-0d2c4ff848e0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing 10 items on shop page with no filters or sorting<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Shop page showing both filters and a different sorting applied (should be more than 1 sample product)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205459728-b1380bfb-befa-4528-8e6f-345f20b90d1c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing shop page before items filtered with letter &quot;t&quot; and sorted by<br>ascending price<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205459597-21aca786-884d-422d-86af-d2eb97f28a15.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing shop page after items filtered with letter &quot;t&quot; and sorted by<br>ascending price<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the filter/sort logic from the code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205460244-730c5023-5707-4851-95ed-b7649e37b25e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing if statements with alternative select statements for my sort/filtering logic<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205460335-6f1e9081-9307-4ffd-ae1d-21d348487016.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing execution of SQL queries and else statement so products appear on<br>page before any filtering applied<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how the results are shown and how the filters are applied</td></tr>
<tr><td> <em>Response:</em> <p>The way the results are shown and the filters are applied is first,<br>we have a form taking in data from the user for the type<br>of filtering they want to apply. Once the user submits the form, my<br>code has various if statements to change the SQL select query based on<br>what filters the user selected. The category and text filtering was done using<br>sqls like keyword and partial matching, and the sorting was done using sqls<br>order by keyword. Once the SQL statement is executed, we bind the data<br>to a variable, and using PHP templating we loop through the selected items<br>and display table data for each item.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/51">https://github.com/tony2-5/IT202-009/pull/51</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ajd99-prod.herokuapp.com/Project/shop.php">https://ajd99-prod.herokuapp.com/Project/shop.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Show Admin/Shop Owner Product List (this is not the Shop page and should show visibility status) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of the Admin List page/results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205461504-1d4d72e1-f509-4d1d-aff2-2739f3a5b68d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing admin list page which displays all products regardless of visibility (true,<br>false)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how the results are shown</td></tr>
<tr><td> <em>Response:</em> <p>The way the results are shown are by default I have a SQL<br>query to select all from the database table. We also have an option<br>to filter by name which changes the SQL query using the like keyword<br>and partial matching on the name. The database query is executed and the<br>data is bound to a PHP variable which we then use PHP templating<br>to loop through the query results and display the data of each row<br>in the table in our html.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/50">https://github.com/tony2-5/IT202-009/pull/50</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ajd99-prod.herokuapp.com/Project/admin/add_item.php">https://ajd99-prod.herokuapp.com/Project/admin/add_item.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Admin/Shop Owner Edit button </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the edit button visible to the Admin on the Shop page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205462065-ea3d3ba5-0b45-48d3-9715-63b67709c8fc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing edit option visible for admin on the shop page for each<br>item<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the edit button visible to the Admin on the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205462142-0d749000-54d6-4818-b834-2cabeb1b2919.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing edit option visible for admin on product details page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot showing the edit button visible to the Admin on the Admin Product List Page (The admin page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205462009-7b658495-db4b-4b2c-8f3e-08a782ca55c4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing edit option visible under action column on admin list items page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a before and after screenshot of Editing a Product via the Admin Edit Product Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205462272-4e0ba23b-2729-4c1c-bd9b-86030f136998.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot before the product is edited via product edit page (going to edit<br>description, category, and unit_price)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205462322-c5dfb35f-b350-4cc5-9e1d-84d200a45599.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot after the product is edited via product edit page (edited description, category,<br>and unit_price)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>The way code works is on each page when the user has the<br>role of admin I have a link that displays that when the user<br>clicks it appends the products id to the end of the redirect link<br>using PHP templating. Once the admin is redirected to the edit page, we<br>use a get request to get the id of the product and then<br>use a SQL select query to get the data from the row which<br>has that product id. We then prefill this data into a form that<br>the user can edit and once the user edits and clicks the submit<br>button we check for a post request. Finally, we take the data from<br>the post request and we update the data of that product id&#39;s row<br>by using a SQL update query.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/53 https://github.com/tony2-5/IT202-009/pull/50">https://github.com/tony2-5/IT202-009/pull/53 https://github.com/tony2-5/IT202-009/pull/50</a> </td></tr>
<tr><td> <em>Sub-Task 7: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ajd99-prod.herokuapp.com/Project/admin/edit_item.php?id=1">https://ajd99-prod.herokuapp.com/Project/admin/edit_item.php?id=1</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Product Details Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the button (clickable item) that directs the user to the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205463489-40bf7933-86b1-451b-b2b8-07f3ac9eb748.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing products detail link<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the result of the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205463520-b75a3461-51b4-4b2e-b1d4-28dd16821736.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing the result of clicking the products detail link for bread item<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>The way the product details page works is when the user clicks the<br>product details page link it appends the products id to the end of<br>the redirect link using PHP templating. Once the user is redirected to the<br>product page, we use a get request to get the id of the<br>product and then use a SQL select query to get the data from<br>the row which has that product id. Finally, using PHP templating we display<br>the data from the select query on the page in a user-friendly way<br>ignoring the columns of data we do not want to be displayed.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/51">https://github.com/tony2-5/IT202-009/pull/51</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file (can be any specific item)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ajd99-prod.herokuapp.com/Project/product_details.php?id=1">https://ajd99-prod.herokuapp.com/Project/product_details.php?id=1</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Add to Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the success message of adding to cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205464774-f9bb8e5b-9fdf-4994-9eea-53e0a718a01d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing success message of adding bread item to cart<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the error message of adding to cart (i.e., when not logged in)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205464837-e6e9fd0e-d342-4ac4-9945-df03ca73fd6e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing redirect to login page after trying to add to cart and<br>not logged in<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Cart table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205464856-9325033f-b421-4f9c-8c99-a58a8f7eafa3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of cart table with bread item (product_id: 1)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Tell how your cart works (1 cart per user; multiple carts per user)</td></tr>
<tr><td> <em>Response:</em> <p>The way my cart works is 1 cart per user.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Explain the process of add to cart</td></tr>
<tr><td> <em>Response:</em> <p>The way that add to cart works is on our shop page, we<br>have a form with an action attribute that redirects and sends the data<br>in a post request to the cart page once the add to cart<br>button is pressed. On the cart page, once the data is received, it<br>checks if one of the values passed in with the form was &quot;add&quot;<br>and in this case, it will prepare a SQL insert statement for the<br>Cart table. The insert statement is prepared using data from the post statement,<br>the Product table where data can be selected using the product id, as<br>well as the user&#39;s user id to link the cart with the user.<br>After the data is bound and the SQL query executes, the cart information<br>is displayed using a select query that gets data for the correct user<br>and product with a join on the Product and Cart table. After executing<br>the select query, using PHP templating, I loop through the results of the<br>query and echo the desired information in the cart.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/52">https://github.com/tony2-5/IT202-009/pull/52</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> User will be able to see their Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Cart View</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205466411-9d355649-b1c6-4ee4-880b-825032b4da36.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing three items in cart view with link to product details for<br>each product (underlined blue product name), subtotal, and cart total for logged-in user<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain how the cart is being shown from a code perspective along with the subtotal and total calculations</td></tr>
<tr><td> <em>Response:</em> <p>The cart information is displayed using a select query that gets data for<br>the correct user and product with a join on the Product and Cart<br>table. After executing the select query, using PHP templating, I loop through the<br>results of the query and echo the desired information in the cart. The<br>way the subtotal calculation works is in the select query, we multiply the<br>unit_price * desired_quantity and set it as a subtotal key. The way the<br>total calculation works is there is a total variable outside our for loop<br>displaying our items in the cart and in the for loop we add<br>to this total variable using the subtotal value we get from the select<br>query.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/52">https://github.com/tony2-5/IT202-009/pull/52</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ajd99-prod.herokuapp.com/Project/cart.php">https://ajd99-prod.herokuapp.com/Project/cart.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> User can update cart quantity </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Show a before and after screenshot of Cart Quantity update</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205469786-f2076f77-22e3-4049-b4de-860c7da327b5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot before quantity update (pie item at quantity of 3)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205469807-dbd370bb-42d7-4755-9119-561e7291255f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot after quantity update (pie item updated to quantity of 1)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Show a before and after screenshot of setting Cart Quantity to 0</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205469807-dbd370bb-42d7-4755-9119-561e7291255f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot before pie item being set to quantity 0<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205469849-916e360b-3f54-47c1-b43d-782ec0b3fd01.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot after pie item being set to quantity 0<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Show how a negative quantity is handled</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205469882-acd54a66-511b-4002-87df-4dc7a7d455ee.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing how negative quantity is handled<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain the update process including how a value of 0 and negatives are handled</td></tr>
<tr><td> <em>Response:</em> <p>The way negatives are handled is for the input element on the form,<br>I have a min attribute set to 0. If somehow the user is<br>able to submit a negative value, the cart table was created with the<br>check that desired_quantity &gt; 0. The way the value of 0 is handled<br>is if the post for desired_quantity is set to 0 on submit, I<br>then prepare and execute a delete query on the cart item for the<br>specific user.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/52">https://github.com/tony2-5/IT202-009/pull/52</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Cart Item Removal </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a before and after screenshot of deleting a single item from the Cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205470029-28b5cecf-d104-4c33-a513-92e9b3885a2f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot before deleting item named table from cart<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205470080-404f97d2-9918-473a-8151-96e3ba3532bc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot after deleting item named table from cart<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a before and after screenshot of clearing the cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205470081-5a579c63-41b6-44f3-8fc9-16ea4c169b05.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot before clearing cart<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205470094-f7190b9b-b541-4b13-8fab-f65f47eaa802.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot after clearing cart<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how each delete process works</td></tr>
<tr><td> <em>Response:</em> <p>The way that the single delete process works is when the delete button<br>is pressed, a post request is made with the products id and an<br>indicator to prepare a delete query. This query is prepared to only delete<br>in the cart table where the product id and user id are equal<br>to the post request variables. Finally, we execute this statement, and this deletes<br>that row of data from the Cart table, which updates which products are<br>selected through a select query on the Cart table and displayed by looping<br>through the select query results and displaying it in the HTML using PHP<br>templating. The clear cart process works similarly, with the only difference of the<br>post request only passing an indicator to use an alternate delete query without<br>a where clause for product id, only one for user_id.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/52">https://github.com/tony2-5/IT202-009/pull/52</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 10: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone2 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205470608-9bf3768b-3579-42fd-8398-e5e3865834ef.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot 1 showing issues are done<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/205470619-23bb3763-b280-4171-8e57-822128c06daa.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot 2 showing issues are done<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a link to your herok prod project's login page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ajd99-prod.herokuapp.com/Project/login.php">https://ajd99-prod.herokuapp.com/Project/login.php</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-009-F22/it202-milestone-2-shop-project/grade/ajd99" target="_blank">Grading</a></td></tr></table>