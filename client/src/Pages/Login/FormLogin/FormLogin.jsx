import React from "react";
import { useState } from "react";
import axios from "axios";
import "../CSS/FormLogin.css";

export default function FormLogin() {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const response = await axios.post("http://localhost:8000/login", {
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
    <div className="LoginTextContainer">
      <h1>Connexion</h1>
      <form action="" method="POST" onSubmit={handleSubmit}>
        <div className="InputContainer">
          <label htmlFor="email">Email</label>
          <input
            type="email"
            id="email"
            name="email"
            autoComplete="on"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
          />
        </div>
        <div className="InputContainer">
          <label htmlFor="password">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            autoComplete="on"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
          />
        </div>
        <input type="hidden" name="_token" value="csrf_token()" />
        <div className="InputContainer">
          <button type="submit">Sign Up</button>
        </div>
      </form>
    </div>
  );
}
