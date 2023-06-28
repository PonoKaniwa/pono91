$(document).ready(function() {
 
    var searchInput = $("#search");
  
    var suggestionBox = $("#suggestion-box");
  
  
    searchInput.on("input", function() {
   
      var query = searchInput.val();
  
    
      $.ajax({
        url: "fetchSuggestions.php",
        method: "POST",
        data: { query: query },
        success: function(response) {
        
          suggestionBox.html(response);
          suggestionBox.show(); 
        }
      });
    });
  
  
    $(document).on("click", function(event) {
      if (!$(event.target).closest("#suggestion-box").length) {
        suggestionBox.hide();
      }
    });
  
  
    suggestionBox.on("click", "li", function() {
    
      var suggestion = $(this).text();
  
    
      console.log("Clicked suggestion:", suggestion);
  
     
      searchInput.val(suggestion);
  
      
      suggestionBox.hide();
      
  
      $.ajax({
        url: "getUserDetails.php",
        method: "POST",
        data: { suggestion: suggestion },
        success: function(response) {
          var userDetails = JSON.parse(response);
          $("#name").val(userDetails.name);
          $("#password").val(userDetails.password);
          $("#gender").val(userDetails.gender);
          $("#occupation").val(userDetails.occupation);
          $("#dob").val(userDetails.dob);
        }
      });
    });
  });
  