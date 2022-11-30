
document.getElementById("foto_perfil").onchange = function(e) {
    
    let reader = new FileReader();
    
    reader.readAsDataURL(e.target.files[0]);
    
    reader.onload = function(){
        let imgPreview = document.getElementById('img-preview');
        imgPreview.src = reader.result;
    };
};