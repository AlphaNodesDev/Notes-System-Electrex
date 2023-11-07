function open_upload_notes(){
    document.getElementById('upload-notes').style.display = 'block';
    document.getElementById('edit-semester').style.display = 'none';
    document.getElementById('edit-module').style.display = 'none';
    document.getElementById('edit-subjects').style.display = 'none';
}

function open_edit_semesters(){
    document.getElementById('upload-notes').style.display = 'none';
    document.getElementById('edit-semester').style.display = 'block';
    document.getElementById('edit-module').style.display = 'none';
    document.getElementById('edit-subjects').style.display = 'none';
}
function open_edit_modules(){
    document.getElementById('upload-notes').style.display = 'none';
    document.getElementById('edit-semester').style.display = 'none';
    document.getElementById('edit-module').style.display = 'block';
    document.getElementById('edit-subjects').style.display = 'none';
}
function open_edit_subjects(){
    document.getElementById('upload-notes').style.display = 'none';
    document.getElementById('edit-semester').style.display = 'none';
    document.getElementById('edit-module').style.display = 'none';
    document.getElementById('edit-subjects').style.display = 'block';
}

function hide_forms(){
    document.getElementById('upload-notes').style.display = 'block';
    document.getElementById('edit-semester').style.display = 'none';
    document.getElementById('edit-module').style.display = 'none';
    document.getElementById('edit-subjects').style.display = 'none';
}

function showImagePopup(element) {
    document.getElementById('fullImage').src = element.src;
    document.getElementById('imagePopup').style.display = 'block';
}

function closeImagePopup() {
    document.getElementById('imagePopup').style.display = 'none';
}

function openPopup() {
    document.getElementById("editPopup").style.display = "block";
  }
  
  function closePopup() {
    document.getElementById("editPopup").style.display = "none";
  }
  
  document.querySelector(".edit-link").addEventListener("click", openPopup);
  



  (function($) { 
    $(function() { 
  
      //  open and close nav 
      $('#navbar-toggle').click(function() {
        $('nav ul').slideToggle();
      });
  
  
      // Hamburger toggle
      $('#navbar-toggle').on('click', function() {
        this.classList.toggle('active');
      });
  
  
      // If a link has a dropdown, add sub menu toggle.
      $('nav ul li a:not(:only-child)').click(function(e) {
        $(this).siblings('.navbar-dropdown').slideToggle("slow");
  
        // Close dropdown when select another dropdown
        $('.navbar-dropdown').not($(this).siblings()).hide("slow");
        e.stopPropagation();
      });
  
  
      // Click outside the dropdown will remove the dropdown class
      $('html').click(function() {
        $('.navbar-dropdown').hide();
      });
    }); 
  })(jQuery); 
