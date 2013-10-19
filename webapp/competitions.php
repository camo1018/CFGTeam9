<!DOCTYPE html>

<html>
  <head>
    <title>Man of Fitness | Competitions</title>
    <style>
      input[type="text"] {
        border: none;
        outline: none;
        border-color: #EEE;
      }
    </style>
  </head>
  <body>
    <h2>Challenge/Endorse a friend:</h2>
      I would like to challenge <input type="text" placeholder="name" id="name" />. I will <input id="challengeDesc" type="text" name="desc" placeholder="..." />
      <button name="submitChallenge" id="indivChallenge">Challenge!</button>
      
      <h2>Create a campaign:</h2>
      <input type="text" id="campaignName" name="campaignName" placeholder="Campaign name" />
      <input type="text" id="campaignGoal" name="campaignGoal" placeholder="Goal" />
      
      <label>Metrics<select name="campaignMetrics" id="campaignMetrics">
        <option value="km">Kilometers</option>
        <option value="mi">Miles</option>
        <option value="m">Meters</option>
        <option value="s">Seconds</option>
        <option value="min">Minutes</option>
        <option value="hr">Hours</option>
        <option value="live">Lives saved</option>
      </select></label>
      <textarea name="campDesc" id="campDesc" placeholder="Campaign Description"></textarea>
      <button name="submitCampaign" id="submitCampaign">Start this Campaign!</button>
      
      <h2>Create or Join a Group:</h2>
      <input type="text" name="groupName" id="groupName" placeholder="Group Name" />
      <textarea name="groupDesc" id="groupDesc" placeholder="Group Description"></textarea>
      <button name="submitGroup" id="submitGroup">Create this Group!</button>
  </body>
  <script src="js/global/bootstrap/jquery.js"></script>
    <script type="text/javascript">
      $('#name').on('keyup', function(){
        if($(this).val().length > 3){
          $.ajax({
            url: 'core/functions/searchOrStore.php',
            method: 'get',
            data: {query:$(this).val()},
            success: function(response){
            }
          });
        }
      });
      $('#indivChallenge').on('click', function(){
        $.ajax({
          url: 'core/functions/searchOrStore.php',
          method: 'post',
          data: {submitChallenge:'true',chalName:$('#name').val(),chaldesc:$('#challengeDesc').val()},
          success: function(response){
              $('#name').val('');
              $('#challengeDesc').val('');
              console.log(response);
          }
        });
      });
      $('#submitCampaign').on('click', function(){
        $.ajax({
          url: 'core/functions/searchOrStore.php',
          method: 'post',
          data: {submitCampaign:'true',campName:$('#campaignName').val(),campDesc:$('#campDesc').val(),campaignGoal:$('#campaignGoal').val(), campaignMetrics:$('#campaignMetrics').val()},
          success: function(response){
	    console.log(response);
            $('#campaignName').val('');
            $('#campDesc').val('');
            $('#campaignGoal').val('');
            $('#campaignMetrics').val('');
          }
        });
      });
      $('#submitGroup').on('click', function(){
        $.ajax({
          url: 'core/functions/searchOrStore.php',
          method: 'post',
          data: {submitGroup:'true',groupName:$('#groupName').val(),groupDesc:$('#groupDesc').val()},
          success: function(response){
            console.log(response);
            $('#groupName').val('');
            $('#groupDesc').val('');
          }
        });
      });
    </script>
</html>
