<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Api Sil</title>

    <!-- Fonts -->
    <link rel="icon" href="{{ asset('img/logosidebard.png') }}">


    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 0;
        background-color: greenyellow
    }

    .container {
        margin: 20px;
    }

    h1 {
        font-size: 26px;
        margin-bottom: 20px;
    }

    h2 {
        font-size: 22px;
        margin-top: 20px;
    }

    h3 {
        font-size: 18px;
        margin-top: 16px;
    }

    .route {
        margin-top: 20px;
        margin-bottom: 10px;
        background-color: #f5f5f5;
        padding: 10px;
        border-radius: 5px;
    }

    .method {
        font-weight: bold;
        margin-right: 10px;
    }

    .path {
        background-color: #ffffff;
        padding: 4px 6px;
        border-radius: 4px;
    }

    .param-list {
        list-style-type: none;
        padding-left: 0;
        margin-top: 5px;
    }

    .param-item {
        margin-bottom: 5px;
    }

    .param-name {
        font-weight: bold;
    }

    .param-type {
        font-style: italic;
        margin-right: 5px;
    }

    .param-description {
        margin-left: 15px;
        color: #555;
    }

    pre {
        background-color: #f5f5f5;
        padding: 10px;
        border-radius: 5px;
        overflow-x: auto;
    }
</style>

{{--




http://sil-api.nextboostperu.com/api/auth/update
http://sil-api.nextboostperu.com/api/auth/updateall/{id}
http://sil-api.nextboostperu.com/api/auth/sede/users
http://sil-api.nextboostperu.com/api/auth/modulos
http://sil-api.nextboostperu.com/api/auth/sedes
http://sil-api.nextboostperu.com/api/auth/modulosuser
http://sil-api.nextboostperu.com/api/auth/cursouser --}}

<body class="antialiased">
    <div class="container">
        <h1>Documentación de la API</h1>

        <div class="route">
            <h3>Registra un nuevo usuario</h3>
            <p></p>
            <p class="method">POST</p>
            <p class="path"> http://sil-api.nextboostperu.com/api/auth/register</p>
            Para realizar esta solicitud, se necesita un token de usuario válido.
            <h4>Parámetros:</h4>
            <ul class="param-list">
                <li class="param-item"><span class="param-name">Usuario_dni</span> <span
                        class="param-type">(int)</span>: El DNI del usuario.</li>
                <li class="param-item"><span class="param-name">Usuario_apellidos</span> <span
                        class="param-type">(string)</span>: Los apellidos del usuario.</li>
                <li class="param-item"><span class="param-name">Usuario_fnacimiento</span> <span
                        class="param-type">(date)</span>: La fecha de nacimiento del usuario.</li>
                <li class="param-item"><span class="param-name">Usuario_sexo</span> <span class="param-type">(M or
                        F)</span>: El sexo del usuario (M para masculino, F para femenino).</li>
                <li class="param-item"><span class="param-name">Usuario_direccion</span> <span
                        class="param-type">(string)</span>: La dirección del usuario.</li>
                <li class="param-item"><span class="param-name">Usuario_distrito</span> <span
                        class="param-type">(string)</span>: El distrito del usuario.</li>
                <li class="param-item"><span class="param-name">Usuario_provincia</span> <span
                        class="param-type">(string)</span>: La provincia del usuario.</li>
                <li class="param-item"><span class="param-name">Usuario_departamento</span> <span
                        class="param-type">(string)</span>: El departamento del usuario.</li>
                <li class="param-item"><span class="param-name">Usuario_celular</span> <span
                        class="param-type">(string)</span>: El número de celular del usuario.</li>
                <li class="param-item"><span class="param-name">Usuario_status</span> <span class="param-type">(A or
                        D)</span>: El estado del usuario (A para activo, D para inactivo).</li>
                <li class="param-item"><span class="param-name">Usuario_foto</span> <span
                        class="param-type">(string)</span>: La URL de la foto del usuario.</li>
                <li class="param-item"><span class="param-name">Rol_id</span> <span class="param-type">(int)</span>: El
                    ID del rol del usuario.</li>
                <li class="param-item"><span class="param-name">name</span> <span class="param-type">(string)</span>: El
                    nombre del usuario.</li>
                <li class="param-item"><span class="param-name">email</span> <span class="param-type">(string)</span>:
                    El correo electrónico del usuario.</li>
                <li class="param-item"><span class="param-name">password</span> <span
                        class="param-type">(string)</span>: La contraseña del usuario.</li>
            </ul>

            <h3>Respuesta exitosa:</h3>
            <pre>Status Code: 200 OK</pre>
            <pre>
            {
            "message": "¡Usuario registrado exitosamente!",
            "user": {
                "Usuario_dni": 1526395922,
                "Usuario_apellidos": "Alumno p",
                "Usuario_fnacimiento": "1990-01-01",
                "Usuario_sexo": "M",
                "Usuario_direccion": "Calle Ejemplo 123",
                "Usuario_distrito": "Distrito Ejemplo",
                "Usuario_provincia": "Provincia Ejemplo",
                "Usuario_departamento": "Departamento Ejemplo",
                "Usuario_celular": "123456789",
                "Usuario_status": "A",
                "Usuario_foto": "https://cdn-icons-png.freepik.com/512/4279/4279586.png",
                "Rol_id": 4,
                "name": "Alumno",
                "email": "Alu99no@gmail.com",
                "updated_at": "2024-02-16T18:07:48.000000Z",
                "created_at": "2024-02-16T18:07:48.000000Z",
                "id": 9
            }
         }</pre>
        </div>


        <div class="route">
            <h2>Login de Usuario</h2>
            <p class="method">POST</p>
            <p class="path">/api/auth/login</p>

            <p>Permite a un usuario iniciar sesión en el sistema SIL.</p>
            <h4>Parámetros:</h4>
            {
            <ul class="param-list">
                <li class="param-item"><span class="param-name">email</span> <span class="param-type">(string)</span>:
                    El correo electrónico del usuario.</li>
                <li class="param-item"><span class="param-name">password</span> <span
                        class="param-type">(string)</span>: La contraseña del usuario.</li>
            </ul>
            }
            <h3>Respuesta exitosa:</h3>
            <pre>Status Code: 200 OK</pre>
            <pre>
                {
                    "access_token": "string",
                    "token_type": "bearer",
                    "expires_in": 3600
                }
            </pre>
        </div>

        <div class="route">
            <h3>Cerrar Sesión</h3>
            <p class="method">POST</p>
            <p class="path">http://sil-api.nextboostperu.com/api/auth/logout</p>
            <h4>Parámetros:</h4>
            <ul class="params-list">
                <li><strong>Authorization: Bearer {access_token}</strong></li>
            </ul>
            <p>Permite a un usuario cerrar sesión en el sistema SIL.</p>
        </div>
        <div class="route">
            <h3>Actualizar Token de Acceso</h3>

            <p class="method">POST</p>
            <p class="path">http://sil-api.nextboostperu.com/api/auth/refresh</p>
            <h4>Parámetros:</h4>
            <ul class="params-list">
                <li><strong>Authorization: Bearer {access_token}</strong></li>
            </ul>
            <p>respuesta exitosa</p>
            <pre>{
                    "access_token": "string",
                    "token_type": "bearer",< "expires_in" : 3600
            }</pre>

            <h3></h3>
        </div>

        <div class="route">
            <h3>Obtener Usuario Autenticado</h3>
            <p class="method">GET</p>
            <p class="path">http://sil-api.nextboostperu.com/api/auth/me </p>
            <p>Devuelve los datos del usuario autenticado.</p>
            <h4>Parámetros:</h4>
            <ul class="params-list">
                <li><strong>Authorization: Bearer {access_token}</strong></li>
            </ul>
            <pre>Status Code: 200 OK</pre>

            <pre>
                {
                    "id": 9999,
                    "Usuario_dni": 1234567890,
                    "Usuario_apellidos": "Apellido Ejemplo",
                    "Usuario_fnacimiento": "1995-05-20",
                    "Usuario_sexo": "F",
                    "Usuario_direccion": "Calle Ficticia 456",
                    "Usuario_distrito": "Distrito Ficticio",
                    "Usuario_provincia": "Provincia Ficticia",
                    "Usuario_departamento": "Departamento Ficticio",
                    "Usuario_celular": "987654321",
                    "Usuario_status": "A",
                    "Usuario_foto": "https://via.placeholder.com/150",
                    "Rol_id": 5,
                    "name": "Usuario Ficticio",
                    "email": "usuario@example.com",
                    "email_verified_at": null,
                    "created_at": "2024-02-15T05:28:56.000000Z",
                    "updated_at": "2024-02-15T05:28:56.000000Z",
                    "rol": {
                        "Rol_id": 5,
                        "Rol_nombre": "Rol Ficticio",
                        "created_at": "2024-02-08T00:44:51.000000Z",
                        "updated_at": "2024-02-08T00:44:51.000000Z",
                        "permisos": [
                            {
                                "Permiso_id": 10,
                                "Permiso_nombre": "Permiso 1",
                                "created_at": "2024-02-08T00:44:36.000000Z",
                                "updated_at": "2024-02-08T00:44:36.000000Z",
                                "pivot": {
                                    "Roles_id": 5,
                                    "Permisos_id": 10,
                                    "Permiso_estatus": 1
                                }
                            },
                            {
                                "Permiso_id": 18,
                                "Permiso_nombre": "Permiso 2",
                                "created_at": "2024-02-08T00:44:36.000000Z",
                                "updated_at": "2024-02-08T00:44:36.000000Z",
                                "pivot": {
                                    "Roles_id": 5,
                                    "Permisos_id": 18,
                                    "Permiso_estatus": 1
                                }
                            },
                            {
                                "Permiso_id": 22,
                                "Permiso_nombre": "Permiso 3",
                                "created_at": "2024-02-08T00:44:36.000000Z",
                                "updated_at": "2024-02-08T00:44:36.000000Z",
                                "pivot": {
                                    "Roles_id": 5,
                                    "Permisos_id": 22,
                                    "Permiso_estatus": 1
                                }
                            },
                            {
                                "Permiso_id": 26,
                                "Permiso_nombre": "Permiso 4",
                                "created_at": "2024-02-08T00:44:36.000000Z",
                                "updated_at": "2024-02-08T00:44:36.000000Z",
                                "pivot": {
                                    "Roles_id": 5,
                                    "Permisos_id": 26,
                                    "Permiso_estatus": 1
                                }
                            },
                            {
                                "Permiso_id": 30,
                                "Permiso_nombre": "Permiso 5",
                                "created_at": "2024-02-08T00:44:36.000000Z",
                                "updated_at": "2024-02-08T00:44:36.000000Z",
                                "pivot": {
                                    "Roles_id": 5,
                                    "Permisos_id": 30,
                                    "Permiso_estatus": 1
                                }
                            }
                        ]
                    }
                }
            </pre>
        </div>
        <div class="route">
            <h3>Obtener todos los usuarios con sus roles y permisos asignados</h3>
            <p class="method">GET</p>
            <p class="path">http://sil-api.nextboostperu.com/api/auth/users</p>
            <p>Devuelve todos los usuarios si se tiene el rol de secretaria o admin</p>
            <h4>Parámetros:</h4>
            <ul class="params-list">
                <li><strong>Authorization: Bearer {access_token}</strong></li>
            </ul>
            <pre>Status Code: 200 OK</pre>
            <pre>
                {
                "users": [
                        {
                {
                    "id": 9999,
                    "Usuario_dni": 1234567890,
                    "Usuario_apellidos": "Apellido Ejemplo",
                    "Usuario_fnacimiento": "1995-05-20",
                    "Usuario_sexo": "F",
                    "Usuario_direccion": "Calle Ficticia 456",
                    "Usuario_distrito": "Distrito Ficticio",
                    "Usuario_provincia": "Provincia Ficticia",
                    "Usuario_departamento": "Departamento Ficticio",
                    "Usuario_celular": "987654321",
                    "Usuario_status": "A",
                    "Usuario_foto": "https://via.placeholder.com/150",
                    "Rol_id": 5,
                    "name": "Usuario Ficticio",
                    "email": "usuario@example.com",
                    "email_verified_at": null,
                    "created_at": "2024-02-15T05:28:56.000000Z",
                    "updated_at": "2024-02-15T05:28:56.000000Z",
                    "rol": {
                        "Rol_id": 5,
                        "Rol_nombre": "Rol Ficticio",
                        "created_at": "2024-02-08T00:44:51.000000Z",
                        "updated_at": "2024-02-08T00:44:51.000000Z",
                        "permisos": [
                            {
                                "Permiso_id": 10,
                                "Permiso_nombre": "Permiso 1",
                                "created_at": "2024-02-08T00:44:36.000000Z",
                                "updated_at": "2024-02-08T00:44:36.000000Z",
                                "pivot": {
                                    "Roles_id": 5,
                                    "Permisos_id": 10,
                                    "Permiso_estatus": 1
                                }
                            },
                            {
                                "Permiso_id": 18,
                                "Permiso_nombre": "Permiso 2",
                                "created_at": "2024-02-08T00:44:36.000000Z",
                                "updated_at": "2024-02-08T00:44:36.000000Z",
                                "pivot": {
                                    "Roles_id": 5,
                                    "Permisos_id": 18,
                                    "Permiso_estatus": 1
                                }
                            },
                            {
                                "Permiso_id": 22,
                                "Permiso_nombre": "Permiso 3",
                                "created_at": "2024-02-08T00:44:36.000000Z",
                                "updated_at": "2024-02-08T00:44:36.000000Z",
                                "pivot": {
                                    "Roles_id": 5,
                                    "Permisos_id": 22,
                                    "Permiso_estatus": 1
                                }
                            },
                            {
                                "Permiso_id": 26,
                                "Permiso_nombre": "Permiso 4",
                                "created_at": "2024-02-08T00:44:36.000000Z",
                                "updated_at": "2024-02-08T00:44:36.000000Z",
                                "pivot": {
                                    "Roles_id": 5,
                                    "Permisos_id": 26,
                                    "Permiso_estatus": 1
                                }
                            },
                            {
                                "Permiso_id": 30,
                                "Permiso_nombre": "Permiso 5",
                                "created_at": "2024-02-08T00:44:36.000000Z",
                                "updated_at": "2024-02-08T00:44:36.000000Z",
                                "pivot": {
                                    "Roles_id": 5,
                                    "Permisos_id": 30,
                                    "Permiso_estatus": 1
                                }
                            }
                         ]
                        }
                        },...otros...
                        }

                ]
            }
            </pre>
        </div>

        <div class="route">
            <h3>Crear nueva sede</h3>
            <p class="method">POST</p>
            <p class="path">http://sil-api.nextboostperu.com/api/auth/Sede</p>
            <h4>Parámetros:</h4>
            <ul class="params-list">
                <li><strong>Authorization: Bearer {access_token}</strong></li>
            </ul>
            <pre>Status Code: 200 OK</pre>
            <ul class="param-list">
                <li class="param-item"><span class="param-name">Sede_Id </span> <span
                        class="param-type">(int)</span>:</li>
                <li class="param-item"><span class="param-name">Sede_nombre.</span> <span
                        class="param-type">(string)</span>:</li>
                <li class="param-item"><span class="param-name">Sede_direccion</span> <span
                        class="param-type">(date)</span>: </li>
                <li class="param-item"><span class="param-name">Sede_institucion</span> <span class="param-type">(M or
                        F)</span>: Sede_departamento</li>
            </ul>
        </div>

    </div>
</body>

</html>
