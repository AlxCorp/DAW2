'use client'
import React, { useState, useEffect } from 'react';
import ListItem from '../components/ListItem';
import AddContacts from '../components/AddContacts';

export default function Home() {
  const [users, setUsers] = useState([]);

  useEffect(() => {
    async function fetchUsers() {
      const url = "http://api.contactos.local/get";
      const response = await fetch(url);
      const data = await response.json();
      setUsers(data);
    }
    fetchUsers();
  }, []);

  const handleDeleteContact = async (id) => {
    const url = `http://api.contactos.local/del/${id}`;
    await fetch(url, { method: "DELETE" });
    setUsers(users.filter(user => user.id !== id));
  };

  const handleUpdateContact = async (name, phone, id) => {
    const url = `http://api.contactos.local/put/${id}`;
    await fetch(url, {
      method: "PUT",
      body: JSON.stringify({ id, name, phone }),
      headers: { "Content-type": "application/json; charset=UTF-8" },
    });

    const updatedUsers = users.map(user => {
      if (user.id === id) {
        return { ...user, name, phone };
      }
      return user;
    });
    setUsers(updatedUsers);
  };

  const handleAddContact = async (nombre, telefono, email) => {
    const url = "http://api.contactos.local/add";
    await fetch(url, {
      method: "POST",
      body: JSON.stringify({ nombre, telefono, email }),
      headers: { "Content-type": "application/json; charset=UTF-8" },
    });

    setUsers([{ nombre, telefono, email }, ...users]);
  };

  return (
    <div className="App">
      <div id="contact-list-container">
        <header>
          <img
            src="https://cdn-icons-png.flaticon.com/512/1250/1250592.png"
            alt="contact-icon"
            width={"80px"}
          />
          <h1 className='contact-list-container-header-h1'>Contactos</h1>
        </header>
        <ul>
          {users.length === 0 ? (
            <h1>Cargando....</h1>
          ) : (
            users.map((user) => (
              <ListItem
                key={user.id}
                id={user.id}
                nombre={user.nombre}
                telefono={user.telefono}
                email={user.email}
                handleDelete={handleDeleteContact}
                handleUpdate={handleUpdateContact}
              />
            ))
          )}
        </ul>
      </div>
      <AddContacts addContact={handleAddContact} />
    </div>
  );
}
