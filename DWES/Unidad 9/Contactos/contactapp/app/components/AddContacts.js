import React, { Component } from "react";

class AddContacts extends Component {
  constructor() {
    super();
    this.state = {
      name: "",
      phone: "",
      email: "",
    };
  }

  handleChange = (inputType, e) => {
    if (inputType === "name") {
      this.setState({
        name: e.target.value,
      });
      return;
    } else if (inputType === "phone") {
        this.setState({
          phone: e.target.value,
        });
        return;
    }
    this.setState({
        email: e.target.value,
      });
  };

  handleSubmit = (e) => {
    e.preventDefault();
    const { name, phone, email } = this.state;
    const { addContact } = this.props;
    if (name && phone && email) {
      addContact(name, phone, email);
      this.setState({
        name: "",
        phone: "",
        email: "",
      });
    }
  };

  render() {
    const { name, phone, email } = this.state;
    return (
      <div id="add-contacts-container">
        <h1>Nuevo Contacto</h1>
        <form>
          <input
            placeholder="Nombre"
            value={name}
            required
            onChange={(e) => this.handleChange("name", e)}
          />
          <input
            placeholder="Teléfono"
            value={phone}
            required
            onChange={(e) => this.handleChange("phone", e)}
          />
          <input
            placeholder="Email"
            value={email}
            required
            onChange={(e) => this.handleChange("email", e)}
          />
          <br />
          <button onClick={this.handleSubmit}>Agregar Contacto</button>
        </form>
      </div>
    );
  }
}

export default AddContacts;