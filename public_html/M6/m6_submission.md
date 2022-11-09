<table><tr><td> <em>Assignment: </em> HW HTML5 Canvas Game</td></tr>
<tr><td> <em>Student: </em> Anthony Dvorsky (ajd99)</td></tr>
<tr><td> <em>Generated: </em> 11/9/2022 4:47:46 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-009-F22/hw-html5-canvas-game/grade/ajd99" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Create a branch for this assignment called&nbsp;<em>M6-HTML5-Canvas</em></li><li>Pick a base HTML5 game from&nbsp;<a href="https://bencentra.com/2017-07-11-basic-html5-canvas-games.html">https://bencentra.com/2017-07-11-basic-html5-canvas-games.html</a></li><li>Create a folder inside public_html called&nbsp;<em>M6</em></li><li>Create an html5.html file in your M6 folder (do not put it in Project even if you're doing arcade)</li><li>Copy one of the base games (from the above link)</li><li>Add/Commit the baseline of the game you'll mod for this assignment&nbsp;<em>(Do this before you start any mods/changes)</em></li><li>Make two significant changes<ol><li>Static changes like hard-coded colors/values will not count at all (i.e., changing shapes/colors/values that are globally defined and set only once.</li><li>Direct copies of my class example changes will not be accepted (i.e., just having an AI player for pong, rotating canvas, or multi-ball unless you make a significant tweak to it)</li><li>Significant changes are things that change with game logic or modify how the game works. Static changes like hard-coded colors/values will not count at all (i.e., changing shapes/colors/values that are globally defined and set only once). You may however change such values through game logic during runtime. (i.e., when points are scored, boundaries are hit, some action occurs, etc)</li></ol></li><li>Evidence/Screenshots<ol><li>As best as you can, gather evidence for your first significant change and fill in the deliverable items below.</li><li>As best as you can, gather evidence for your significant change and fill in the deliverable items below.</li><li>Remember to include your ucid/date as comments in any screenshots that have code</li><li>Ensure your screenshots load and are visible from the md file in step 9</li></ol></li><li>In the M6 folder create a new file called m6_submission.md</li><li>Save your below responses, generate the markdown, and paste the output to this file</li><li>Add/commit/push all related files as necessary</li><li>Merge your pull request once you're satisfied with the .md file and the canvas game mods</li><li>Create a new pull request from dev to prod and merge it</li><li>Locally checkout dev and pull the merged changes from step 12</li></ol><p>Each missed or failed to follow instruction is eligible for -0.25 from the final grade</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Game Info </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> What game did you pick to edit/modify?</td></tr>
<tr><td> <em>Response:</em> <p>The game that I chose to modify was the Collect the Squares game.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the direct link to the html5.html file from Heroku Prod (i.e., https://mt85-prod.herokuapp.com/M6/html5.html)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ajd99-prod.herokuapp.com/M6/html5.html">https://ajd99-prod.herokuapp.com/M6/html5.html</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the pull request link for this assignment from M6-HTML5-Canvas to dev</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/tony2-5/IT202-009/pull/24">https://github.com/tony2-5/IT202-009/pull/24</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Significant Change #1 </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Describe your change/modification</td></tr>
<tr><td> <em>Response:</em> <p>The first significant change I made was when a square is collected, it<br>stays on the screen as a square of a different color. I did<br>this because it adds a cool effect to the game of painting the<br>screen as you progress through the round.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Screenshot of the change while playing (try your best as some changes may be nearly impossible to capture)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/200936975-272adc16-5ec2-4d35-992a-7e65736c9e47.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>In the image you can see blue dots and a green dot. The<br>blue dots are the squares already collected and the green dots are the<br>squares to collect.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Screenshot of the relevant lines of code that implement your change (make sure your ucid and the date are shown in comments) In the caption briefly describe/explain how the code snippet works.</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/200936975-272adc16-5ec2-4d35-992a-7e65736c9e47.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>First screenshot shows instantiation of variables needed for feature (obstacles array, permX for<br>x value of collected square, permY for y value of collected square).<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/200938692-29e1188f-551d-44e4-a3b1-aae5da5a2daa.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows two functions that will be called in game draw loop called addObstacle<br>and drawObstacle. addObstacle creates a new obstacle object with given x and y<br>location of collected square and adds it to the obstacles array. Draw obstacle<br>loops through each obstacle in the obstacles array and draws it. The if<br>obstacles.length&gt;0 statement is to fix a bug of the first square collected not<br>drawing as an obstacle.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/200938870-3d707ac1-6803-440b-8ab5-5a4964096a5a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Moved the target collision functionality in a function and added the addObstacle function<br>if the player collides with a square to add it to the obstacles<br>array.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/200939217-46442373-af9d-4249-b8bd-31da8717ef13.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>In the game drawing loop called drawObstacle to draw all of our obstacles<br>in the obstacle array.<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Significant Change #2 </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Describe your change/modification</td></tr>
<tr><td> <em>Response:</em> <p>Significant change 2: Added a timer power-up square which is yellow. This is<br>a square that, when collected, adds 3 seconds to the timer. To delay<br>the amount of timer power-ups spawning I made it so it only spawns<br>after every 4 points scored since last power-up collection.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Screenshot of the change while playing (try your best as some changes may be nearly impossible to capture)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/200942288-9bca502c-1ed0-43fc-8ee1-ee7eef56d634.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows yellow square timer power up, impossible to show it adding time to<br>timer in screenshot.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Screenshot of the relevant lines of code that implement your change (make sure your ucid and the date are shown in comments) In the caption briefly describe/explain how the code snippet works.</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/200943826-0abe16d5-f6ee-4078-82e8-1c43a4a9a44f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Initialization of timer variables (timerX for x location, timerY for y location, pointsSinceLastTimerBonus<br>for power up delay feature, recentlyCollected for power up delay feature, moveTimer() to<br>randomize timerX and timerY values)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/200944020-b03054af-2be5-439b-abc7-9382efc3115a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows moveTimer function which just randomly assigns x and y values on the<br>canvas for the timer square.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/200944289-651b3efc-7816-4d47-a933-66501139a450.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Added statement in targetCollision to check if our timer power up was recently<br>collected and if true it will count 4 point collections then reset our<br>pointsSinceLastTimeBonus variable and set recentlyCollected to false<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/200944099-8f774a74-32c4-401c-b8a7-e6a2aa5e4207.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Created timerCollision function using same logic as targetCollision just with timerX and timerY<br>variables, if timer is collected, recently collected will be set true, we will<br>move the timer, and add 3 seconds to the countdown.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/108694143/200944428-b0ddc1ac-b9ca-479f-862a-e61614e960f7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>In game loop I have timerCollision function to check for timer power up<br>collisions and an if else statement concerning the power up delay. If recentlyCollected<br>is true we draw the powerup off screen until it is recentlyCollected is<br>false where it will reappear on screen.<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Discuss </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Talk about what you learned during this assignment and the related HTML5 Canvas readings (at least a few sentences for full credit)</td></tr>
<tr><td> <em>Response:</em> <p>What I learned from this assignment was about HTML canvas and how we<br>can use it to draw, and in this assignment, how we could use<br>it to create a simple game. More specifically, I learned how to create<br>a game loop using the function requestAnimationFrame to repeatedly clear our canvas and<br>redraw the elements we want to see. I also learned about the many<br>cool features of HTML canvas, such as drawing text and shapes. This was<br>an assignment that allowed me to reinforce my javascript skills while learning a<br>new API.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-009-F22/hw-html5-canvas-game/grade/ajd99" target="_blank">Grading</a></td></tr></table>