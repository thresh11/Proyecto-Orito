// import JustValidate from 'just-validate';
// new JustValidate(form, globalConfig, dictLocale);


document.addEventListener('DOMContentLoaded', function() {
    const validation = new JustValidate("#signup",{
        errorFieldCssClass: 'is-invalid',
        successFieldCssClass: 'is-valid', 
    });
    const messageError = {
        required: "El campo es obligatorio",
        email: "El correo electrónico tiene un formato invalido",
        minLength: "El campo debe contener un mínimo de 4 caracteres",
        maxLength: "El campo debe contener un máximo de 20 caracteres.",
        number: "El valor debe ser un número",
        celNumber: "El numero de celular debe tener 10 digitos",
        password: "la contraseña debe tener minimo 4 digitos",
    }

  validation
    .addField("#name", [
        {
            rule: "required",
            errorMessage: messageError.required,
            
        },
        {
            rule:'minLength',
            value: 4,
            errorMessage: messageError.minLength,
        },
        {
            rule:"maxLength",
            value: 20,
            errorMessage: messageError.maxLength,
        }
    ])

    .addField("#last_name",[
        {
            rule: "required",
            errorMessage: messageError.required,
            
        },
        {
            rule: 'minLength',
            value: 4,
            errorMessage: messageError.minLength,
        },
        {
            rule: "maxLength",
            value: 20,
            errorMessage: messageError.maxLength,
        }
    ])

    .addField("#cel",[
        {
            rule: "required",
            errorMessage: messageError.required,
            
        },
        {
            rule:'number',
            errorMessage: messageError.number,
        },
        {
            rule:'minLength',
            value: 10,
            errorMessage: messageError.celNumber,
        },
        {
            rule: "maxLength",
            value: 10,
            errorMessage: messageError.celNumber,
        }
    ])

    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        },
        {
            validator: (value) => () => {
                return fetch("validate-email.php?correo=" + encodeURIComponent(value))
                       .then(function(response) {
                           return response.json();
                       })
                       .then(function(json) {
                           return json.available;
                       });
            },
            errorMessage: "email already taken"
        }
    ])

    // .addField("#email", [
    //     {
    //         rule: "required",
    //         errorMessage: messageError.required,
    //     },
    //     {
    //         rule: "email",
    //         errorMessage: messageError.email,
    //     },
    //     {
    //         validator: (value) => () => {
    //             return fetch("validate-email.php?correo =" + encodeURIComponent(value))
    //                    .then(function(response) {
    //                        return response.json();
    //                    })
    //                    .then(function(json) {
    //                        return json.available;
    //                    });
    //         },
            
    //         errorMessage: "correo electrónico ya ocupado",
    //     }
    // ])

    .addField("#password", [
        {
            rule: "required",
            errorMessage: messageError.required,
        },
        {
            rule: 'minLength',
            value: 4,
            errorMessage: messageError.password,
        },
    ])

    .onSuccess((event) => {
        document.getElementById("signup").submit();
    });

});





    
    
    
    
    
    
    
    
    
    
