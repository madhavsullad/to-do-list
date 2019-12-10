// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function () {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function (ev) {

  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
	if(ev.target.className == 'checked')
		var check = 'y';
	else
		var check = 'n';
		console.log(ev.target.className);
	$(document).ready(function(){
		$.ajax({
			type: "POST",
			url: 'php/update.php',
			data: {'id': ev.target.id, 'check': check},
			success: function(response) {
				var jsonData = JSON.parse(response);
				if(jsonData.success == 'True'){
					console.log('Successfully updated');
				} else
					console.log("Filed to update");
			}
		});
	});
  }

}, false);

// Create a new list item when clicking on the "Add" button
function newElement(myInput) {
  console.log(myInput);
  var li = document.createElement("li");
  var t = document.createTextNode(myInput);
  li.appendChild(t);

  if (myInput === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  // Append "close" button
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);
  for (i = 0; i < close.length; i++) {
    close[i].onclick = function () {
      var div = this.parentElement;
      div.style.display = "none";
      call();
    }
  }
}


//Clearing the list
function removeAll() {
	var lst = document.getElementsByTagName("ul");
	lst[0].innerHTML = "";
	$(document).ready(function() {
		$.ajax({
			type: "POST",
			url: 'php/removeAll.php',
			data: {'task' : 'removeAll tasks'},
			success: function(response) {
				var jsonData = JSON.parse(response);
				if(jsonData.success == 'True') {
					console.log('Successfully all the tasks');
				} else {
					console.log('Failed to delete all the tasks');
				}
			}
		});
	});
}