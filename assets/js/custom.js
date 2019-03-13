
$(document).ready(function() {

    $("#applyModal").submit(function() {

        var email = $("input#email").val();

        var project_title = $("input#project_title").val();
        if(project_title == ""){
            alert("Project Title is required");
            return false;
        }
        // alert(project_title);
    
        // email
        var description = $("textarea#description").val();
        if(description == ""){
            alert("Description is required");
            return false;
        }

        // contact_no
        var amount = $("input#amount").val();
        if(amount == ""){
            alert("Amount is required");
            return false;
        }

        var budget_total = $("input#budget_total").val();
        if(budget_total == ""){
            alert("Budget Total is required");
            return false;
        }

        var budget_breakdown = $("textarea#budget_breakdown").val();
        if(budget_breakdown == ""){
            alert("Budget Breakdown is required");
            return false;
        }

      

        var data2 = 'project_title='+ project_title
                            + '&description=' + description        
                            + '&amount=' + amount
                            + '&budget_total=' + budget_total
                            + '&budget_breakdown=' + budget_breakdown
                            + '&email=' + email

        // alert(data2);

        $.ajax({
            url: 'apply.php',
            type: "POST",
            data: data2,
            success: function(data)
            {
                // alert(data);
                // console.log('success');
                $('#applyModal').modal('hide');

            }

        });
    });



    $(document).on('click', '.view_data', function(){
        //$('#dataModal').modal();
        var employee_id = $(this).attr("id");
        $.ajax({
         url:"select.php",
         method:"POST",
         data:{employee_id:employee_id},
         success:function(data){
          $('#employee_detail').html(data);
          $('#dataModal').modal('show');
         }
        });
       }); 
});


$(document).on('click', '.view_data', function(){
    //$('#dataModal').modal();
    var employee_id = $(this).attr("id");
    $.ajax({
     url:"select.php",
     method:"POST",
     data:{employee_id:employee_id},
     success:function(data){
      $('#employee_detail').html(data);
      $('#dataModal').modal('show');
     }
    });
   }); 
  