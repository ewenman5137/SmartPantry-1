import React from "react";
import { useState } from "react";

export default function PasswordInput() {
  const [password, setPassword] = useState("");
  const [showPassword, setShowPassword] = useState(false);

  return (
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
      <input type="checkbox" onClick={() => setShowPassword(!showPassword)} />
    </div>
  );
}
