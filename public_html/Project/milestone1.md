<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Anthony Dvorsky (ajd99)</td></tr>
<tr><td> <em>Generated: </em> 11/12/2022 2:06:04 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-009-F22/it202-milestone1-deliverable/grade/ajd99" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone1 branch</li><li>Create a milestone1.md file in your Project folder</li><li>Git add/commit/push this empty file to Milestone1 (you'll need the link later)</li><li>Fill in the deliverable items<ol><li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e,&nbsp;<a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li></ol></li><li>Ensure your images display correctly in the sample markdown at the bottom</li><ol><li>NOTE: You may want to try to capture as much checklist evidence in your screenshots as possible, you do not need individual screenshots and are recommended to combine things when possible. Also, some screenshots may be reused if applicable.</li></ol><li>Save the submission items</li><li>Copy/paste the markdown from the "Copy markdown to clipboard link" or via the download button</li><li>Paste the code into the milestone1.md file or overwrite the file</li><li>Git add/commit/push the md file to Milestone1</li><li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li><li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku dev</li></ol></li><li>Make a pull request from dev to prod (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku prod</li></ol></li><li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li></ol></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201433688-9e8cc670-4356-4a1d-ae4d-cede018cd01e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing invalid email entered on registration page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201434016-23d969dc-eb1f-4b8a-825f-6fb1ff9921b4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing invalid password entered on registration page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201434145-a352ae4f-90ac-4519-a9a0-d6c7d4c6d8ce.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing validation for non matching password and confirm password<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201434342-cb190ccf-66b4-4bc0-b16b-8c9e11800ab1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing validation if email already registered<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201434518-3fff5561-b508-4565-9f7e-e5e2cf87bacc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing validation if username already registered<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201434748-9cd31c0c-52ea-4197-8652-ba2639ff490a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of registration form filled out correctly<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201434838-7d3a87e9-ea9b-47f5-bb36-1c8df474f7db.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successfully registered screenshot<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201435199-632813a1-06c9-4236-889f-f8674ab57126.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing email <a href="mailto:&#116;&#x65;&#x73;&#x74;&#x32;&#64;&#102;&#97;&#107;&#101;&#109;&#x61;&#105;&#108;&#46;&#x63;&#x6f;&#109;">&#116;&#x65;&#x73;&#x74;&#x32;&#64;&#102;&#97;&#107;&#101;&#109;&#x61;&#105;&#108;&#46;&#x63;&#x6f;&#109;</a> in row 3 successfully registered and in database from<br>previous screenshots<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/11 https://github.com/tony2-5/IT202-009/pull/35">https://github.com/tony2-5/IT202-009/pull/11 https://github.com/tony2-5/IT202-009/pull/35</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The way the form is handled and behaves is the form takes input<br>from the user and submits it using a post request. Next, on submit,<br>our javascript validation function runs, then our PHP validation. The javascript and PHP<br>validation checks whether the inputted data follows either specific regex pattern for username<br>and email, and checks whether the password is long enough and the entered<br>password and confirm password match. After the validation is matched, we next hash<br>our password because we do not store our password as plaintext for security<br>reasons. Finally, we add our data to the database using an insert statement,<br>if there is duplicate info in the database, then an error is returned<br>otherwise, the data is added successfully.&nbsp;<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201438822-ef5930a5-d9bc-4a37-9e90-48c2cafdde59.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing password mismatch validation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201439029-36e877bd-ec9b-44ed-a682-c1ac455a289c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing validation for non existing user<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201439223-1ff61cf6-8273-42c6-b7c4-cba1e014e792.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing successful login<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/12 https://github.com/tony2-5/IT202-009/pull/35">https://github.com/tony2-5/IT202-009/pull/12 https://github.com/tony2-5/IT202-009/pull/35</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The way the form is handled and behaves is the form takes input<br>from the user and submits it using a post request. Next, on submit,<br>our javascript validation function runs, then our PHP validation. The javascript validation checks<br>if the user entered a valid email or username using regex and checks<br>if the password length is longer than 8 characters. The PHP validation also<br>checks to ensure the email/username and password are correct. After validation, we use<br>a select statement to get our data from the database. Before we allow<br>the user to login we take the password the user used to login<br>and compare it with the hashed password stored in the database using password_verify<br>if it returns true we allow the user to login.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201445839-85d553ad-f101-48cd-986f-754cfc6f0f88.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing successful logout<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201446249-508ae1b5-65d1-4803-973b-735917618356.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing logged out user trying to access login protected page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/12">https://github.com/tony2-5/IT202-009/pull/12</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The way the session logic works for login is it is included in<br>nav.php, which we include on our other pages, in nav.php we have included<br>a session_start function and settings for our session. This session_start function checks to<br>see if a session id exists on the server; if not, it creates<br>a new session id. With these session ids, we can attach information from<br>our database to the session. After login, we can safely attach session data<br>to the session id by validating and checking the password with password_verify. After<br>we ensure the password is correct, we unset it and attach our database<br>data to the $_SESSION array to update the session information. To end the<br>session, when we click logout, the session data is unset and destroyed.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201476360-b10c90bb-3cb8-4c01-a525-8a45d73f2a8c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing non logged in user not being able to access login-protected page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201476543-f0a67f2a-3e09-4c4f-9db4-0851249711c5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing user without appropriate role not being able to access role protected<br>page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201476618-475fb908-98b4-44ca-89d4-8bfc46c0bf04.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Roles table showing one valid record of a user with Admin role<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201476708-e2245e28-23cc-4718-a368-d8800b0f65e6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows entry in UserRoles table for user <a href="mailto:&#x74;&#x6f;&#x6e;&#121;&#x40;&#103;&#109;&#x61;&#105;&#x6c;&#46;&#x63;&#111;&#109;">&#x74;&#x6f;&#x6e;&#121;&#x40;&#103;&#109;&#x61;&#105;&#x6c;&#46;&#x63;&#111;&#109;</a> with user_id of 1 and<br>role_id of 1 for admin<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/13 https://github.com/tony2-5/IT202-009/pull/17 https://github.com/tony2-5/IT202-009/pull/22">https://github.com/tony2-5/IT202-009/pull/13 https://github.com/tony2-5/IT202-009/pull/17 https://github.com/tony2-5/IT202-009/pull/22</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>The way the session is used to have login protected pages is by<br>checking if our session variables are set. The helper function we defined to<br>do this is called is_logged_in. This method takes two parameters a boolean redirect<br>and a destination, by default we have redirect set to false and destination<br>to login.php. If we have a page that we want to have password<br>protected we call is_logged_in with redirect set true, inside this method it checks<br>if the session variables are set and if false, and redirect is set<br>to true, it will redirect the user back to login.php with a user<br>friendly message.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>The way the session is used for role-protected pages is similar to login<br>protected pages. The helper function we have defined for role protected pages is<br>has_role. This method takes a parameter of the role we want to verify<br>our user has, and we can include it on our role protected pages.<br>The way this method works is by checking the users role we retrieve<br>from the session data against the roles key we passed into the function.<br>We then use an if statement calling this function on our role protected<br>pages and if it returns false we redirect back to home.php with a<br>user friendly message.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201482792-18e6b0bc-6684-4c8a-a961-12719a177d0a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of styled navigation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201482906-f85fc531-869d-4131-a0bc-8f40c8688307.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing form styling<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201483055-cf045d8e-9ce9-425f-b09b-38eef6eee10c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing updated UI<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201483594-e715c310-e0e9-4a13-95e7-4fb3d7e371cb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing clean data output (form and nav neatly organized)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/21">https://github.com/tony2-5/IT202-009/pull/21</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <p>The steps for styling I took were first, I did not like having<br>a background color for our nav elements, so I removed the background color<br>for the li elements in our nav. For the li elements in our<br>nav, I also kept display:inline, which keeps the list items horizontal instead of<br>vertical. Next, for the link elements in our nav, I wanted the color<br>of the links to be black, so I changed the color property to<br>black for nav li a, which targets the link elements in our nav.<br>Next, for our input elements which target the form input boxes, I thought<br>the border radius was way too drastic. To fix this, I changed it<br>from 50% to 12px, which gives a more subtle roundness to our form<br>input boxes. Finally, for the body of the page, I changed the color<br>from hot pink to a custom blue color using RGB. I also changed<br>the default text color for elements in my body to black to match<br>with the link elements in our nav.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201433688-9e8cc670-4356-4a1d-ae4d-cede018cd01e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing invalid email entered on registration page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201434016-23d969dc-eb1f-4b8a-825f-6fb1ff9921b4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing invalid password entered on registration page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201434145-a352ae4f-90ac-4519-a9a0-d6c7d4c6d8ce.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing validation for non matching password and confirm password<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/21">https://github.com/tony2-5/IT202-009/pull/21</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>The way we are converting our messages to be user-friendly is by validating<br>conditions or handling pdo errors using regex and printing out friendly messages using<br>a function we created called flash. This flash function creates, styles, and adds<br>a div to the top of our page when an error is thrown<br>that looks more friendly. The way we turn our pdo errors more friendly<br>is by using a helper function called duplicate_user_details. This function first checks if<br>there is a duplicate entry pdo error, then uses regex and preg match<br>to select the duplicate entry type from the pdo error message, finally, the<br>function has a user-friendly flash message saying whether the chosen username or email<br>is a duplicate.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201485676-c2ce06ac-d4e6-4543-8313-69f20ea21008.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing user profile page correctly prefilling email and username data<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/17">https://github.com/tony2-5/IT202-009/pull/17</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>The way the data is retrieved about the user is when the user<br>navigates to the profile page, we prefill username and email variables with data<br>from the session. We then set the value attribute for the input elements<br>that hold our username and email data to our current username and email.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201487941-4feddd75-bbf1-469a-a93a-8ece37588253.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing successful update<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201487966-f8469505-d56b-48a5-9a58-e63c4a3bd298.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing username validation message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201488011-91cfa519-26f8-4943-9eb3-235c6f477bd7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing email validation message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201488076-b6db0336-05fa-4bd9-beca-92cc27f8c7bc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing password validation message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201488112-a66d90b6-8af0-4752-9f2a-0284131632c2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing password mismatch error message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201488143-16407573-2226-4126-beac-4699cd9eeba9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing username/email already in use error message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201488241-d99382a2-143a-4a52-b77b-474fd21c228b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing Users table before user with id 1 updates user from tony<br>to tony25<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201488328-6a7c38ec-9818-40b3-bcb7-9790ded75229.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing Users table after user with id 1 updates user from tony<br>to tony25<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/17">https://github.com/tony2-5/IT202-009/pull/17</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>The way the edit logic works is on form submit, our data is<br>first going to be validated by our javascript and PHP, making sure the<br>new email or username matches our regex pattern, or our new password is<br>the correct length and matches the confirm password field. Next, if updating a<br>username or email, we can use an update statement to update our users<br>table with our new username or email where the user id we are<br>trying to update matches. We then validate with pdo that this update is<br>not a duplicate entry and if the update goes through successfully, we finally<br>update our session variables. If updating the password we first have to validate<br>that the current password the user entered is correct by selecting our hashcode<br>from the database and comparing it using password_verify. Next, we can use an<br>update statement to update our password in the users table where the user<br>id we are trying to update matches.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Issues and Project Board </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201490107-e28ee467-f53f-4d6e-a74c-fab4846eca7a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot 1 showing all issues done/closed for milestone 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/201490112-6e6556a9-934a-41cd-baaf-be5357700ef6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot 2 showing all issues done/closed for milestone 1<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Include a direct link to your Project Board</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/users/tony2-5/projects/3">https://github.com/users/tony2-5/projects/3</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Prod Application Link to Login Page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ajd99-prod.herokuapp.com/Project/login.php">https://ajd99-prod.herokuapp.com/Project/login.php</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-009-F22/it202-milestone1-deliverable/grade/ajd99" target="_blank">Grading</a></td></tr></table>