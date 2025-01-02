
# admin
TOKEN="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL3JlZ2lzdGVyIiwiaWF0IjoxNzM1NzQ3NTEzLCJleHAiOjE3MzY5NTcxMTMsIm5iZiI6MTczNTc0NzUxMywianRpIjoiQm1COUtHaWRMUFpNeTdBSiIsInN1YiI6IjEiLCJwcnYiOiI1NTRjNWFlYTRjYjI1NDAxOWUxMjA2N2E3Y2E1NDdmNjc1ZDU0NGNhIn0.GehGMoj8qX_RFoeBa9neK10bFICC4eQu2TMswsX58Z0"

#  copropietario
# TOKEN="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNzM1NzQ3OTIzLCJleHAiOjE3MzY5NTc1MjMsIm5iZiI6MTczNTc0NzkyMywianRpIjoiRHhzN3JZUXl6S0hYUTNMQSIsInN1YiI6IjIiLCJwcnYiOiI1NTRjNWFlYTRjYjI1NDAxOWUxMjA2N2E3Y2E1NDdmNjc1ZDU0NGNhIn0.yDknx-Xy28qLl_I2MJHQFuc5gUduNrhNU0BmfUT07Vg"

case $1 in
    --register-admin)
        curl -X POST -H 'accept: application/json' -H 'content-type: application/json' -d '{
        "password": "12345678",
        "email": "erick@gmail.com",
            "nombres": "erick",
            "apellido_pat": "velarde",
            "apellido_mat": "silva",
            "num_telefono": "+591 62547444",
            "rol": "admin",
            "ci": "123456789",
            "fecha_nacimiento": "2001-11-02"
        }' http://localhost:8000/api/register | jq
        ;;
    --register-coprop)
        curl -X POST -H 'accept: application/json' -H 'content-type: application/json' -d '{
        "password": "12345678",
        "email": "test@gmail.com",
            "nombres": "test",
            "apellido_pat": "test",
            "apellido_mat": "test",
            "num_telefono": "+591 6254721",
            "rol": "copropietario",
            "ci": "1458963",
            "fecha_nacimiento": "2001-11-02"
        }' http://localhost:8000/api/register | jq
        ;;
    --register-empleado)
        curl -X POST -H 'accept: application/json' -H 'content-type: application/json' -d '{
        "password": "13827575",
        "email": "fred@gmail.com",
            "nombres": "fred",
            "apellido_pat": "velarde",
            "apellido_mat": "silva",
            "num_telefono": "+591 51145575",
            "rol": "empleado",
            "ci": "13827575",
            "fecha_nacimiento": "2001-11-02"
        }' http://localhost:8000/api/register | jq
        ;;
    --login)
        curl -X POST -H 'Accept: application/json' \
        -H 'Content-Type: application/json' \
        -d '{
            "password": "12345678",
            "ci": "erick@gmail.com"
        }' http://localhost:8000/api/login | jq
        ;;
    --me)
        curl -X GET -H "Accept: application/json" -H "Authorization: Bearer $TOKEN" http://localhost:8000/api/me | jq
        ;;
    --propietario)

        curl -X GET -H "Accept: application/json" -H "Authorization: Bearer "$TOKEN http://localhost:8000/api/propietario | jq

        ;;
    --propiedades)

        curl -X GET -H "Accept: application/json" \
            -H "Authorization: Bearer "$TOKEN  \
            http://localhost:8000/api/propiedades | jq

        ;;
    --propiedades-crear)

        curl -X POST -H "Accept: application/json" \
            -H "Content-Type: application/json" \
            -H "Authorization: Bearer "$TOKEN  \
            -d '{
                    "numero_propiedad": "201",
                    "piso": "2",
                    "num_habitaciones": "4",
                    "tipo": "vivienda",
                    "estado": "desocupado"
                }' http://localhost:8000/api/propiedades/crear| jq

        ;;
    --propiedades-pagos)
        curl -X GET -H "Accept: application/json" \
            -H "Authorization: Bearer "$TOKEN  \
            http://localhost:8000/api/propiedades/pagos/2 | jq
                    ;;
    --propiedades-pagar)
        curl -X POST -H "Accept: application/json" \
            -H "Content-Type: application/json" \
            -H "Authorization: Bearer "$TOKEN  \
            -d '{
                "price": 100.0,
                "metodo": "efectivo",
                "id_propiedad": "2"
                }' http://localhost:8000/api/propiedades/pagar| jq
            ;;
    --propiedades-alquilar)
        curl -X POST -H "Accept: application/json" \
            -H "Content-Type: application/json" \
            -H "Authorization: Bearer "$TOKEN  \
            -d '{
                    "id_propiedad": "2"
                }' http://localhost:8000/api/propiedades/alquilar | jq
        ;;
    --empleados-contratar)
            # 'tipo' => 'required|string|in:indefinido,temporal,por obra',
            # 'cargo' => 'required|string|in:limpieza,seguridad',
            # 'estado' => 'required|string|in:terminado,activo,suspendido',
        curl -X POST -H "Accept: application/json" \
            -H "Content-Type: application/json" \
            -H "Authorization: Bearer "$TOKEN  \
            -d '{
                    "ci_empleado": "13827575",
                    "fecha_final": "2025-11-25",
                    "tipo": "temporal",
                    "sueldo_base": 2000.0,
                    "cargo": "limpieza",
                    "estado": "activo",
                    "nombres": "eric",
                    "apellido_pat": "velarde"
                }' http://localhost:8000/api/empleados/contratar | jq
        ;;
    --empleados-pagar)
            # 'metodo' => 'qr,efectivo',
        curl -X POST -H "Accept: application/json" \
            -H "Content-Type: application/json" \
            -H "Authorization: Bearer "$TOKEN  \
            -d '{
                    "monto": 2000.0,
                    "metodo": "efectivo",
                    "id_usuario": "2"
                }' http://localhost:8000/api/empleados/pagar | jq
        ;;
    --empleados-pagos-id)
        curl -X GET -H "Accept: application/json" \
            -H "Authorization: Bearer "$TOKEN  \
            http://localhost:8000/api/empleados/pagos/2 | jq
        ;;
    --empleados-pagos)
        curl -X GET -H "Accept: application/json" \
            -H "Authorization: Bearer "$TOKEN  \
            http://localhost:8000/api/empleados/pagos| jq
        ;;
    --empleados-despedir)
        curl -X GET -H "Accept: application/json" \
            -H "Authorization: Bearer "$TOKEN  \
            http://localhost:8000/api/empleados/despedir/2 | jq
        ;;
    *)
        echo "Invalid option"
        ;;
esac


