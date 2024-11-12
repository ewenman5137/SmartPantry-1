import React from "react";
import { useState } from "react";
import "../CSS/FormRegister.css";
import axios from "axios";
import { useNavigate } from "react-router-dom";

import { gsap } from "gsap";

export default function FormRegister() {
  const [Name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [confirm, setConfirm] = useState("");
  const [showPassword, setShowPassword] = useState(false);

  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    // Check if the password and confirm password match
    if (password !== confirm) {
      alert("Passwords do not match");
      return;
    }
    try {
      const response = await axios.post("http://localhost:8000/api/register", {
        Name: Name,
        email: email,
        password: password,
      });
      localStorage.setItem("Name", Name);
      localStorage.setItem("email", email);
      if (response.data) {
        console.log(response.data);
      }
    } catch (error) {
      console.error(error);
    }
    try {
      const response = await axios.post("http://localhost:8000/api/login", {
        email: email,
        password: password,
      });
      if (response.data) {
        localStorage.setItem("access_token", response.data.access_token);
        setTimeout(() => {
          // Animate the transition with gsap
          gsap.to(".RegisterTextContainer", {
            duration: 1,
            opacity: 0,
            onComplete: () => {
              navigate("/Home");
            },
          });
        }, 2000);
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
          <label htmlFor="Name">Name</label>
          <input
            type="text"
            id="Name"
            className="input"
            name="Name"
            autoComplete="on"
            value={Name}
            onChange={(e) => setName(e.target.value)}
          />
        </div>
        <div className="InputContainer">
          <label htmlFor="email">Email:</label>
          <input
            type="email"
            id="email"
            className="input"
            name="email"
            autoComplete="on"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
          />
        </div>
        <div className="InputContainer">
          <label htmlFor="password">Password:</label>
          <input
            type={showPassword ? "text" : "password"}
            id="password"
            className="input"
            name="password"
            autoComplete="on"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
          />
          <input
            type="checkbox"
            onClick={() => setShowPassword(!showPassword)}
          />
        </div>
        <div className="InputContainer">
          <label htmlFor="confirm">Confirm Password</label>
          <input
            type={showPassword ? "text" : "password"}
            id="confirm"
            name="confirm"
            className="input"
            autoComplete="on"
            value={confirm}
            onChange={(e) => setConfirm(e.target.value)}
          />
          <input
            type="checkbox"
            onClick={() => setShowPassword(!showPassword)}
          />
        </div>
        <div className="InputContainer">
          <button type="submit">Sign In</button>
        </div>
      </form>
    </div>
  );
}
