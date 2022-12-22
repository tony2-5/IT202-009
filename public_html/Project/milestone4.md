<table><tr><td> <em>Assignment: </em> IT202 Milestone 4 Shop Project</td></tr>
<tr><td> <em>Student: </em> Anthony Dvorsky (ajd99)</td></tr>
<tr><td> <em>Generated: </em> 12/22/2022 12:00:26 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-009-F22/it202-milestone-4-shop-project/grade/ajd99" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone4 branch</li><li>Create a new markdown file called milestone4.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone4.md</li><li>Add/commit/push the changes to Milestone4</li><li>PR Milestone4 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes</li><li>Submit the direct link to this new milestone4.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on GitHub and everywhere else. Images are only accepted from dev or prod, not localhost. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User can set their profile to public or private </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of new column on the Users table</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209030387-9be47de6-bb2a-4492-bd95-0355c8cbeee1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of profile visibility column in the Users table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of updated profile edit view</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209030478-6c9c8580-d754-4539-861d-4f6ed972c7a7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of updated profile page edit view<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot of profile view view (ensure email isn't shown publicly)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209033562-c0ecb867-3038-4a53-a7f6-9cbcbf8d04f3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of updated profile page view view<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s) links</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/79 https://github.com/tony2-5/IT202-009/pull/80">https://github.com/tony2-5/IT202-009/pull/79 https://github.com/tony2-5/IT202-009/pull/80</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add direct link to a public profile from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ajd99-prod.herokuapp.com/Project/profile.php?id=18">https://ajd99-prod.herokuapp.com/Project/profile.php?id=18</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain the logic behind how public/private profile works</td></tr>
<tr><td> <em>Response:</em> <p>The way that public/private profile works is in the Users table we added<br>a column for visibility, 1 for public, 0 for private, all profiles are<br>initially set to private. On the product details page where we have our<br>reviews, users can click to view the profiles of other users that post<br>a review. When you click on another users profile, it sends you to<br>that user&#39;s profile using a $_GET request on their Users table id. Once<br>on the profile page, we have a select statement on the Users table<br>for data where the id matches the id in the $_GET request. We<br>then check if the visibility from this select is 0 (private). If it<br>is 0, we redirect to the home page with a flash message; otherwise,<br>we display the user&#39;s review history.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> User will be able to rate a product they purchased </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Ratings table with some data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209035484-d03a782d-b8d4-4aae-8e34-afa682615ae7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Ratings table with data in it<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of the Product Details page with comments/ratings and the form to add another and the average rating</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209036049-0a874527-841a-4cda-a6ae-fdbd1bac8aca.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the Product Details page with comments/ratings and the form to add<br>another, and the average rating<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot of the error message for a user trying to rate/comment that hasn't purchased the product</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209036903-4156c359-d411-45ba-af10-09dbce7bc4ef.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of error for user trying to rate product they have not purchased<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/80">https://github.com/tony2-5/IT202-009/pull/80</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add link to a product details page with ratings/comments</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ajd99-prod.herokuapp.com/Project/product_details.php?id=1">https://ajd99-prod.herokuapp.com/Project/product_details.php?id=1</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain the logic being adding comment/rating and validations</td></tr>
<tr><td> <em>Response:</em> <p>The logic behind rating a product is first, we make sure the user<br>has purchased the product before. The way we do this is we have<br>a select statement on the Orders table joined with the OrderItems table to<br>check if the user id matches with an order that has purchased the<br>product before checking the product id from the OrderItems table. I put the<br>results of this select statement inside of an array. I check this array<br>using PHP within the HTML to see if it is empty or not.<br>If the array is empty, I display a message above the form telling<br>the user they must purchase the product before reviewing, but they are still<br>able to try and submit the form. Within the form, I have an<br>if-else statement where if the array is empty, then I have a hidden<br>form element that submits a variable to display a flash warning on submit,<br>else the form can submit, and we do an insert statement into the<br>Ratings table.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User's Purchase History Changes </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots demonstrating examples of the filters/pagination applied</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209039668-57f6f274-0c22-4380-b9e9-11a88db9c0a1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of page 1 with sort by date descending<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209039720-328e32d8-95d5-4815-a9ba-b9941dca20c1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of page 2 with sort by date descending<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209039832-0f796440-c1db-4ed7-8ba3-59cc1b91997c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot demonstrating filter by date range(dates: 12/01/2022 - 12/14/2022)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/81">https://github.com/tony2-5/IT202-009/pull/81</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to the purchase history page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ajd99-prod.herokuapp.com/Project/purchasehistory.php">https://ajd99-prod.herokuapp.com/Project/purchasehistory.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Store Owner Purchase History Changes </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots demonstrating examples of the filters/pagination applied (ensure the calculated total price is clearly visible)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209040469-4207f554-de96-4489-98db-ab25d19092ea.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of page 1 with sort by total paid ascending and calculated page<br>total visible<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209040545-36b4cb28-067d-4302-993b-534fd52d10ae.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of page 2 with sort by total paid ascending and calculated page<br>total visible<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209040601-ea7ec415-f36b-462d-ba4d-01836e216236.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot demonstrating filter by date range(dates: 12/15/2022 - 12/15/2022) page 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209040677-07531b17-028b-4efd-8902-967c34e837f1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot demonstrating filter by date range(dates: 12/15/2022 - 12/15/2022) page 2<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/81">https://github.com/tony2-5/IT202-009/pull/81</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to the store owner's purchase history page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ajd99-prod.herokuapp.com/Project/admin/store_purchasehistory.php">https://ajd99-prod.herokuapp.com/Project/admin/store_purchasehistory.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how the total price is calculated based on the filtered/paginated results</td></tr>
<tr><td> <em>Response:</em> <p>The way the total price is calculated based on the filtered/paginated results is<br>we just loop through the result array which only contains the data of<br>the page we are on with the filtering and sum the total of<br>the money_recieved column. The reason for this is because the way we did<br>pagination and filtering is using limit, offset, and where clauses with select statements<br>so that&#39;s why we getting only the money_recieved column for the Orders we<br>are currently viewing. The summing is done within the foreach loop where we<br>display our data to the page using PHP templating, and once we exit<br>this foreach loop I display the sum variable onto the page.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Add pagination to Shop </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot(s) of the newly paginated pages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209149462-19012612-0658-405a-9bfd-0016b63609b0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of shop page pagination (page 1)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209149546-bfedab0b-3e52-4bd3-8cd8-16cda3109954.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of shop page pagination (page 2)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/81">https://github.com/tony2-5/IT202-009/pull/81</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add links to related pages</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ajd99-prod.herokuapp.com/Project/shop.php">https://ajd99-prod.herokuapp.com/Project/shop.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Store Owner will be able to see all products out of stock </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the out of stock results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209150776-358df74b-eeee-4c07-874d-7f2ff7577b07.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot before filtering by out of stock<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209150917-41708037-119a-4103-b8b9-91c9a27b7508.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot after filtering by out of stock (page 1)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209151047-8b54f215-105a-42cc-804d-632a4e6e1af9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot after filtering by out of stock (page 2)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/81">https://github.com/tony2-5/IT202-009/pull/81</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add links to related page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ajd99-prod.herokuapp.com/Project/admin/list_items.php">https://ajd99-prod.herokuapp.com/Project/admin/list_items.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain your approach to this view</td></tr>
<tr><td> <em>Response:</em> <p>The way that filtering by stock status works is by using forms to<br>submit a $_GET request and altering our select query on the Products table<br>depending on which sort option is selected. The default stock sort value we<br>have is all which does not alter our select query, the other two<br>filter options inStock and outStock change the query to select where stock is<br>&gt; 0 for inStock or stock is = 0 for outStock. The way<br>the pagination works is by having two separate queries one getting the data<br>and one getting the count. We append any conditions we want those queries<br>dynamically. We can then paginate the page by using the limit keyword on<br>our queries and the offset functionality of limit to update the offset depending<br>on which page we are on.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> User can sort products by average rating on the shop page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing the sort in effect</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209179052-936100af-9901-4232-959f-7eb25e79901c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of sort by average ratings on shop page(asc), products that have never<br>been rated have empty rating slot<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209179132-c353cf2f-529d-4268-bde4-79b159309809.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of sort by average ratings on shop page(desc), products that have never<br>been rated have empty rating slot<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of the Products table (or your implementation/approach to average rating)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209179996-2bc77757-100a-460f-8db0-dcf1635e0ddd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of products table with new averageratings column<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/80">https://github.com/tony2-5/IT202-009/pull/80</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add links to related page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ajd99-prod.herokuapp.com/Project/shop.php">https://ajd99-prod.herokuapp.com/Project/shop.php</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain how you implemented the average rating recording logic and how it applies to this sort on shop</td></tr>
<tr><td> <em>Response:</em> <p>The way I implemented the average rating recording logic is on the product<br>details page, where you can post a review, after a user successfully posts<br>their review, I have a update query on the products table. What this<br>query does is it updates the averageratings column equals to a select statement<br>on the average of the ratings from the Ratings table grouped by the<br>product_id of the product the user is reviewing we get the average of<br>the ratings by using the SQL AVG() function. The way we can apply<br>this column to a sort on the shop is we can append an<br>Order By statement in our select query for the shop products and order<br>by this new averageratings column.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone4 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/209186888-3e231d31-c97f-450e-a5bf-7ecdb242333c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing project board with issues completed in done column<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-009-F22/it202-milestone-4-shop-project/grade/ajd99" target="_blank">Grading</a></td></tr></table>