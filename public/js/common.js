//$.noConflict();

jQuery(document).ready(function ($) {
 
  const flash_element = document.querySelector('.alert-success');
  if(flash_element){
    setTimeout(() => {
      const msg = document.getElementsByClassName('alert-success')[0]; // get the first one
      if (msg) {
        msg.style.transition = 'opacity 0.5s ease-out';
        msg.style.opacity = '0';
        setTimeout(() => msg.remove(), 500);
      }
    }, 3000);
    const url = new URL(window.location.href);
    url.searchParams.delete('succMsg');
    window.history.replaceState({}, document.title, url.toString());
    }
   
   
    $(document).on('click', '.addCls', function (e) {       
      var id = $(this).attr('id');       
        $.ajax({            
            url: '/'+id,
            type: 'GET',
            success: function (response) {
                
                $('#taskModalContent').html(response);
                var myModal = new bootstrap.Modal(document.getElementById('taskModal'));
                myModal.show();
               
            },
            error: function (xhr) {
                console.error(xhr.responseText);
            }
        });
    });
    
    $(document).on('submit', '.formCls', function (e) {
        e.preventDefault();
        var formId = $(this).attr('id');
        
        //let formData = new FormData($('#'+formId)[0]);
        let form = this; // `this` is already the form element
        let formData = new FormData(form);
        console.log(formData);
        
        $.ajax({
            //url: '/addTask',
            url:'/'+formId,
            method: 'POST',
            data: formData,
            contentType: false, // Required for FormData
            processData: false, // Required for FormData
            success: function (response) {
              console.log("res"+response)
              
              window.location.href = response.redirect_url;
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function (key, value) {
                  $('#error-' + key).text(value[0]);
              });
                console.log(errors);
            }
        });
    });
   
  $(document).on('click', '.loadTask', function () {
      
      var dataId = $(this).data('id');
      
      $.ajax({
          url: taskEditUrl, // defined in web.php
          type: 'POST',
          data: {
            'taskId':dataId
          },
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
          success: function (response) {
              
              $('#taskModalContent').html(response);
              var myModal = new bootstrap.Modal(document.getElementById('taskModal'));
              myModal.show();
              //alert("sdasdsad")
              
          },
          error: function (xhr) {
              console.error(xhr.responseText);
          }
      });
    });
    $(document).on('submit', '#editTaskForm', function (e) {
      e.preventDefault();
      let formData = new FormData($('#editTaskForm')[0]);
      console.log(formData);
      
      $.ajax({
          url: '/updateTask',
          method: 'POST',
          data: formData,
          contentType: false, // Required for FormData
          processData: false, // Required for FormData
          success: function (response) {
            console.log("res"+response)
            window.location.href = response.redirect_url;
          },
          error: function (xhr) {
              let errors = xhr.responseJSON.errors;
              $.each(errors, function (key, value) {
                $('#error-' + key).text(value[0]);
            });
              console.log(errors);
          }
      });
  });
  });



