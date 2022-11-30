$(function () {
    $('#form-usuario').validate({
        rules: {
            nombre: {
                required: true,
            },
            apellidoPaterno: {
                required: true,
            },
            apellidoMaterno: {
                required: true,
            },
            rol: {
                required: true,
            },
            correo: {
                required: true,
                correo: true
            },
            password: {
                required: true,
                minlength: 5
            },
            repassword: {
                required: true,
                minlength: 5,
                equalTo: "#password"
              
            },
            foto_perfil: {
                required: false,
            }
        },
        messages: {
            nombre: {
                required: 'Se requiere el nombre del usuario',
            },
            apellidoPaterno: {
                required: 'Se requiere el apellido paterno del usuario',
            },
            apellidoMaterno: {
                required: 'Se requiere el apellido paterno del usuario',
            },
            rol: {
                required: 'Se requiere el rol del usuario',
            },
            correo: {
                required: 'Se requiere el correo electrónico del usuario',
                correo: 'Se requiere un email valido'
            },
            password: {
                required: 'Se requiere la contraseña del usuario',
                minlength: 'El tamaño minimo para la contraseña es de 5 caracters'
            },
            repassword: {
                required: 'Se requiere repetir la contraseña del usuario',
                minlength: 'El tamaño minimo para la contraseña es de 5 caracteres',
                equalTo: 'La contraseña no coincide'
            },
            foto_perfil: {
                required: '',
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        }
    });
});

function previsualizar_imagen(img = '', btnImg = '') {
    
    const  loadImage = document.getElementById("#"+btnImg);
    const  previewImage = document.getElementById("#"+img);

    
    const archivos = loadImage.files;

    
    if (!archivos || !archivos.length) {
        previewImage.src = "";
        return;
    }
    
    const primerArchivo = archivos[0];

    
    const objectURL = URL.createObjectURL(primerArchivo);

    
    previewImage.src = objectURL;

}