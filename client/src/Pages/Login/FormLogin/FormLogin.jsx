import React from "react";
import { useState } from "react";
import axios from "axios";
import "../CSS/FormLogin.css";
import { useNavigate } from "react-router-dom";
import { gsap } from "gsap";

export default function FormLogin() {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [showPassword, setShowPassword] = useState(false);

  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const response = await axios.post("http://localhost:8000/api/login", {
        email: email,
        password: password,
      });
      if (response.data) {
        localStorage.setItem("access_token", response.data.access_token);
        setTimeout(() => {
          // Animate the transition with gsap
          gsap.fromTo(
            ".transition",
            {
              // y: "-100vh",
              top: "57rem",
              duration: 2,
              opacity: 1,
              zIndex: 1,
            },
            {
              top: "0",
              duration: 2,
              opacity: 1,
              zIndex: 1,
              ease: "back.out(1.7)",
              onComplete: () => {
                navigate("/Home");
              },
            }
          );
        }, 500);
      }
    } catch (error) {
      console.error(error);
    }
  };

  return (
    <>
      {/* Div to make transition when login is successful */}
      <div className="transition">
        <h1>Success</h1>
        <p>You have successfully logged in!</p>
      </div>
      <div className="LoginTextContainer">
        <h1>Connexion</h1>
        <form action="" method="POST" onSubmit={handleSubmit}>
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
            <button type="submit">Sign Up</button>
          </div>
        </form>
      </div>
    </>
  );
}
