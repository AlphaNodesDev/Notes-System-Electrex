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
  