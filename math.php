<?php
	include_once 'header.php'
?>
				<div id ="levelSelect">
					<h2> Select Level </h2>
					<div class="btn-group">
						<button id="0" type="button" class="btn btn-info">Level 1</button>
						<button id="1" type="button" class="btn btn-info">Level 2</button>
						<button id="2" type="button" class="btn btn-info">Level 3</button>
						<button id="3" type="button" class="btn btn-info">Level 4</button>
						<button id="4" type="button" class="btn btn-info">Level 5</button>
					</div>
				</div>
				<ul class = "list-group list-group-horizontal ">
					<h1 id="problem"></h1>
					<h1>&nbsp;</h1>
					<h1 id ="answer"></h1>
				</ul>
			</div>
		</body>
		<script>
		let mult_lev = [[1,5],[3,10],[5,15],[5,20],[10,30]]		
		let add_sub_lev = [[1,10],[5,20],[10,40],[20,80],[40,160]]
		let div_lev = [[1,5],[3,8],[5,10],[8,15],[10,20]]
		let operator = ["+", "-", "x", "/"]
		let operatorNum = 0
		let x = 0
		let y = 0
		let z = 0
		let level = 0
		let length = 0
		function clearAnswer() {
			$("#answer").text("");
			$("#answer").removeClass("wrong");
			$("#answer").removeClass("success");
		}
		function getNums(range) {
			x = Math.floor( Math.random() *(range[1]+1-range[0]) ) + range[0];
			y = Math.floor( Math.random() *(range[1]+1-range[0]) ) + range[0];
			operatorNum = Math.floor(Math.random() * 4)			
			if (operatorNum == 0){
				z = x + y
			}
			else if (operatorNum == 1){
				z = x
				x = y + x
			}
			else if (operatorNum == 2){
				z = x * y
			}
			else if (operatorNum == 3){
				z = x
				x = y * x
			}
		};
		//Key press
		$(this).on('keypress', function(event) {
			$("#answer").text($("#answer").text() + String.fromCharCode(event.keyCode))
			if ($("#answer").text().length == String(z).length) {
				if ($("#answer").text() == z) {
					runMath();
					$("#answer").addClass("success");
				}
				else {
					$("#answer").addClass("wrong");
				}
				
				setTimeout(clearAnswer, 100)
			}
		});
		//Problem Generator
		function runMath() {
			getNums(mult_lev[level])
			$("#problem").text(x + " " + operator[operatorNum] + " " + y + " = ")
		};
		//Level Select
		$(document).ready(function(){
			$("button").click(function(){
				level = this.id
				$("#levelSelect").remove();
				runMath()
			});
		});
		</script>
		<style>
			.orange {
				background-color: #ff4400;
			}
			.grey {
				background-color: #262626;
				color: white;
			}
			.white {
				background-color: white;
			}
			.pt-6 {
				margin-top: 200px;
			}
			.success {				
				background-color: lightGreen;
				color: green;
			}
			.wrong {				
				background-color: pink;
				color: red;
			}
			
			
		</style>
	</html> 
