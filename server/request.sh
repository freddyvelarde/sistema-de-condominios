
TOKEN="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL3JlZ2lzdGVyIiwiaWF0IjoxNzM1NjY1MzgxLCJleHAiOjE3MzY4NzQ5ODEsIm5iZiI6MTczNTY2NTM4MSwianRpIjoiOGcwNEVyNmRJSHV1OVpHUyIsInN1YiI6IjIiLCJwcnYiOiIxODgxODQ1NDE5NDcxMGIxY2VlYTRmMzVlYzg0Y2FkMmQ5YTY1ZWUwIn0.DFo_ArpVoMgEgkduu5B5IAZVHhZpZzxw8qhyBKzi93Y"
# TOKEN="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL3JlZ2lzdGVyIiwiaWF0IjoxNzM1NjY1NDgyLCJleHAiOjE3MzY4NzUwODIsIm5iZiI6MTczNTY2NTQ4MiwianRpIjoiRm1qRlhKN2lHYWtFbFNIciIsInN1YiI6IjMiLCJwcnYiOiIxODgxODQ1NDE5NDcxMGIxY2VlYTRmMzVlYzg0Y2FkMmQ5YTY1ZWUwIn0.ZoTjukEoT7r90JXAwYBzeoZkKQERD00Mv5kx5_8PRMw"
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
            "ci": "13827575",
            "fecha_nacimiento": "2001-11-02"
        }' http://localhost:8000/api/register | jq
        ;;
    --register-coprop)
        curl -X POST -H 'accept: application/json' -H 'content-type: application/json' -d '{
        "password": "12345678",
        "email": "fred@gmail.com",
            "nombres": "fred",
            "apellido_pat": "velarde",
            "apellido_mat": "silva",
            "num_telefono": "+591 6254721`",
            "rol": "copropietario",
            "ci": "1322h525",
            "fecha_nacimiento": "2001-11-02"
        }' http://localhost:8000/api/register | jq
        ;;
    --login)
        curl -X POST -H 'Accept: application/json' \
        -H 'Content-Type: application/json' \
        -d '{
            "password": "12345678",
            "email": "erick@gmail.com"
        }' http://localhost:8000/api/login | jq
        ;;
    --me)

        curl -X GET -H "Accept: application/json" -H "Authorization: Bearer "$TOKEN http://localhost:8000/api/me | jq

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
                    "numero_propiedad": "101",
                    "piso": "1",
                    "num_habitaciones": "4",
                    "tipo": "vivienda",
                    "estado": "desocupado"
                }' http://localhost:8000/api/propiedades/crear| jq

        ;;
    --propiedades-pagar)
        curl -X POST -H "Accept: application/json" \
            -H "Content-Type: application/json" \
            -H "Authorization: Bearer "$TOKEN  \
            -d '{
            "price": 100.0,
            "metodo": "efectivo",
            "id_propiedad": "1",
                }' http://localhost:8000/api/propiedades/pagar| jq
            ;;
    --propiedades-alquilar)
        curl -X POST -H "Accept: application/json" \
            -H "Content-Type: application/json" \
            -H "Authorization: Bearer "$TOKEN  \
            -d '{
                    "id_propiedad": "3"
                }' http://localhost:8000/api/propiedades/alquilar | jq
        ;;
    *)
        echo "Invalid option"
        ;;
esac


