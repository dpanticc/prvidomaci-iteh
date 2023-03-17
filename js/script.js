

  $('#dodajForm').submit(function(event){
      event.preventDefault();
      console.log("Dodaj je pokrenuto...")
      const $form = $(this);
      const $inputs = $form.find('input, select, button, textarea');
      const serijalizacija = $form.serialize();
      console.log(serijalizacija);
      $inputs.prop('disabled', true);
      request = $.ajax({
          url:'handler/add.php',
          type:'POST',
          data: serijalizacija
    
      });
    
      request.done(function(response, textStatus, jqXHR){
          if(response=="Success"){
              alert("Team is added");
              console.log("Success");
              location.reload(true);
              
          }else{
              console.log("Failed to add" + response);
              
          }
          console.log(response);
    
      });
      request.fail(function(jqXHR, textStatus, errorThrown){
          console.log("The following problem has aquired: "+textStatus, errorThrown);
      });
      request.always(function() {
          $inputs.prop('disabled', false);
        });
  });
  
  
  
  $('#deleteButton').click(function(){
      console.log("Deleting");
  
      const checked = $('input[name=checked-donut]:checked');
  
      req = $.ajax({
          url: 'handler/delete.php',
          type:'post',
          data: {'TeamID':checked.val()}
      });
  
      req.done(function(res, textStatus, jqXHR){
          if(res=="Success"){
             checked.closest('tr').remove();
             alert('Team deleted');
             console.log('Deleted');
          }else {
          console.log("Failed to delete team "+res);
          alert("Failed deleting ");
  
          }
          console.log(res);
      });
  
  });
  

  
$("#openEditModal").click(function(){
      // Get the value of the selected radio button
      console.log("Openning edit modal...")
      var teamID = $("input[name='checked-donut']:checked").val();
      console.log("Selected teamID:",teamID);
      if(teamID == null){
        alert("You need to select a team to edit! ");
        return false;
      }  
      $.ajax({
        url: "handler/get.php", // replace with the URL of the server script that retrieves team data
        method: "POST",
        data: { teamID: teamID },
        success: function(response) {
          // Populate the input fields in the izmeniModal form with the retrieved data
          var teamData = JSON.parse(response);
          $("#izmeniForm input[name='teamID']").val(teamData.teamID);
          $("#izmeniForm input[name='team']").val(teamData.team);
          $("#izmeniForm input[name='group']").val(teamData.group);
          $("#izmeniForm input[name='wins']").val(teamData.wins);
          $("#izmeniForm input[name='draws']").val(teamData.draws);
          $("#izmeniForm input[name='losses']").val(teamData.losses);
        },
        error: function(xhr, status, error) {
          // Handle error
          console.log("Error: " + error);
        }
      });
      
      $("#izmeniModal").modal('show');
    });


    $("#izmeniForm").submit(function (event) {
        event.preventDefault();
        console.log("Izmena");
        const $form = $(this);
        const $inputs = $form.find('input, select, button, textarea');
        const serializedData = $form.serialize();
        console.log(serializedData);
        let obj = $form.serializeArray().reduce(function (json, { name, value }) {
          json[name] = value;
          return json;
        }, {});
        console.log(obj);
        $inputs.prop("disabled", true);
      
        request = $.ajax({
          url: "handler/update.php",
          type: "post",
          data: serializedData,
        });
      
        request.done(function (response, textStatus, jqXHR) {
            console.log(response);
        
            
            if (response.status === 'success') {
              alert('Team is updated');
              console.log('Team is updated!');
              updateRow(obj);
              location.reload(true);
            } else {
              console.log('Team is updated ' + response.message);
              alert('Team is updated!');
              location.reload(true);
            }
          });
      
        request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error("The following error occurred: " + textStatus, errorThrown);
        });
      });

      function updateRow(obj) {

        
        console.log(obj);
        console.log(obj.teamID);
        console.log($(`#tabela tbody #tr-${obj.teamID} td`).get());
        let tds = $(`#tabela tbody #tr-${obj.teamID} td`).get();
        tds[1].textContent = obj.team;
        tds[2].textContent = obj.group;
        tds[3].textContent = obj.wins;
        tds[4].textContent = obj.draws;
        tds[5].textContent = obj.losses;

      }