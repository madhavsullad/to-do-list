// Sync
$(document).ready(function(){
  $.ajax({ url: 'php/sync.php',
          data: 'HTML_Started',
          type: 'post',
          success: function(data) {
            var jsonData = JSON.parse(data);
            for(var i=1; i<Object.keys(jsonData).length; i+=1) {
              insertFromDb(jsonData[i].tasks, jsonData[i].timestamp, jsonData[i].checked);
            }
            console.log("Synchronized all the tasks from the Database");
          }
  });
});

//Add New Element : Calls insert.php
$(document).ready(function(){
  $('#addForm').submit(function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "php/insert.php",
      data: $(this).serialize(),
      success: function(response) {
        var jsonData = JSON.parse(response);
        newElement(jsonData.task);
        console.log("Call status:" + jsonData.success);
        console.log("Insert success status:" + jsonData.insertStat);
        location.reload(true);
      }
    });
  });
});

// remove task from db when closed
$(document).ready(function(){
  $('body').on("click", '.close', function() {
    $.ajax({
      type: "POST",
      url: "php/remove.php",
      data: { "id": $(this).parent().attr("id")},
      success: function(response) {
        var jsonData = JSON.parse(response);
        if(jsonData.success == 'True')
          console.log('Successfully remove from db');
        else if (jsonData.success == 'False'){
          console.log("Failed to remove from db");
        } else {
          console.log(jsonData.success);
        }
      }
    });
  });
});