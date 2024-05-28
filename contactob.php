<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contactos</title>
    <style>
        .contact-app {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .contact-app .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .contact-app h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        .contact-app form {
            display: flex;
            flex-direction: column;
        }

        .contact-app input[type="text"],
        .contact-app input[type="tel"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .contact-app button {
            padding: 10px;
            border: none;
            background: #28a745;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .contact-app button:hover {
            background: #218838;
        }

        .contact-app ul {
            list-style: none;
            padding: 0;
        }

        .contact-app li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .contact-app li button {
            border: none;
            background: transparent;
            cursor: pointer;
            color: #dc3545;
        }

        .contact-app li button:hover {
            color: #c82333;
        }
    </style>
</head>
<body>
    <div class="contact-app">
        <div class="container">
            <h1>Lista de Contactos</h1>
            <form id="contact-form">
                <input type="text" name="nombrecontacto" id="contact-name" placeholder="Nombre" required>
                <input type="number" name="telefonocontacto" id="contact-phone" placeholder="Teléfono" required>
                <button type="submit">Añadir</button>
            </form>
            <ul id="contact-list"></ul>
        </div>
    </div>


    <form action="RegContacto.php" method="post">
                <input type="text" name="nombrecontacto" placeholder="Nombre" required>
                <input type="number" name="telefonocontacto" placeholder="Teléfono" required>
                <input type="submit" value="enviar">
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const contactForm = document.getElementById('contact-form');
            const contactName = document.getElementById('contact-name');
            const contactPhone = document.getElementById('contact-phone');
            const contactList = document.getElementById('contact-list');

            // Load contacts from localStorage
            loadContacts();

            contactForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const name = contactName.value.trim();
                const phone = contactPhone.value.trim();
                if (name !== '' && phone !== '') {
                    const contact = { name: name, phone: phone };
                    addContactToList(contact);
                    saveContact(contact);
                    contactName.value = '';
                    contactPhone.value = '';
                }
            });

            contactList.addEventListener('click', function (e) {
                if (e.target.tagName === 'BUTTON') {
                    const li = e.target.parentElement;
                    const contact = { name: li.dataset.name, phone: li.dataset.phone };
                    deleteContact(contact);
                    li.remove();
                }
            });

            function addContactToList(contact) {
                const li = document.createElement('li');
                li.textContent = `${contact.name} - ${contact.phone}`;
                li.dataset.name = contact.name;
                li.dataset.phone = contact.phone;
                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'Eliminar';
                li.appendChild(deleteButton);
                contactList.appendChild(li);
            }

            function saveContact(contact) {
                let contacts = JSON.parse(localStorage.getItem('contacts')) || [];
                contacts.push(contact);
                localStorage.setItem('contacts', JSON.stringify(contacts));
            }

            function loadContacts() {
                const contacts = JSON.parse(localStorage.getItem('contacts')) || [];
                contacts.forEach(contact => addContactToList(contact));
            }

            function deleteContact(contact) {
                let contacts = JSON.parse(localStorage.getItem('contacts')) || [];
                contacts = contacts.filter(c => c.name !== contact.name || c.phone !== contact.phone);
                localStorage.setItem('contacts', JSON.stringify(contacts));
            }
        });
    </script>
</body>
</html>
