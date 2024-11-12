import React from "react";
import { Link } from "react-router-dom";
import { useState } from "react";
import "../CSS/FormRegister.css";

export default function FormRegister() {
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [confirm, setConfirm] = useState("");

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const response = await axios.post("http://localhost:8000/register", {
        name: name,
        email: email,
        password: password,
      });
      if (response.data) {
        localStorage.setItem("token", response.data.token);
        navigate("/Home");
      }
    } catch (error) {
      console.error(error);
    }
  };

  return (
    <div className="RegisterTextContainer">
      <h1>Join the Brigade</h1>
      <form action="" method="POST" onSubmit={handleSubmit}>
        <div className="InputContainer">
          <label htmlFor="name">Name</label>
          <input
            type="text"
            id="name"
            name="name"
            autoComplete="on"
            value=""
            onChange={(e) => setName(e.target.value)}
          />
        </div>
        <div className="InputContainer">
          <label htmlFor="email">Email:</label>
          <input
            type="email"
            id="email"
            name="email"
            autoComplete="on"
            value=""
            onChange={(e) => setEmail(e.target.value)}
          />
        </div>
        <div className="InputContainer">
          <label htmlFor="password">Password:</label>
          <input
            type="password"
            id="password"
            name="password"
            autoComplete="on"
            value=""
            onChange={(e) => setPassword(e.target.value)}
          />
        </div>
        <div className="InputContainer">
          <label htmlFor="confirm">Confirm Password</label>
          <input
            type="password"
            id="confirm"
            name="confirm"
            autoComplete="on"
            value=""
            onChange={(e) => setConfirm(e.target.value)}
          />
        </div>
        <div className="InputContainer">
          <button type="submit">Sign In</button>
        </div>
      </form>
    </div>
  );
}
